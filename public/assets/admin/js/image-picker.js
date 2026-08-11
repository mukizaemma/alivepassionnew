(function () {
    const cache = {};

    function qs(root, sel) {
        return root.querySelector(sel);
    }

    function loadImages(picker) {
        const folder = picker.dataset.folder || '';
        const grid = qs(picker, '[data-picker-grid]');
        if (cache[folder]) {
            renderGrid(picker, cache[folder]);
            return;
        }

        fetch('/admin/media?folder=' + encodeURIComponent(folder), {
            headers: { 'Accept': 'application/json' },
            credentials: 'same-origin'
        })
            .then(function (res) { return res.json(); })
            .then(function (data) {
                cache[folder] = data.images || [];
                renderGrid(picker, cache[folder]);
            })
            .catch(function () {
                grid.innerHTML = '<div class="alive-image-picker__empty">Could not load images.</div>';
            });
    }

    function renderGrid(picker, images) {
        const grid = qs(picker, '[data-picker-grid]');
        const query = (qs(picker, '[data-picker-search]').value || '').toLowerCase();
        const filtered = images.filter(function (img) {
            return !query || (img.filename + ' ' + img.folder).toLowerCase().indexOf(query) !== -1;
        });

        if (!filtered.length) {
            grid.innerHTML = '<div class="alive-image-picker__empty">No images found.</div>';
            return;
        }

        grid.innerHTML = filtered.map(function (img) {
            return '<button type="button" class="alive-image-picker__card" data-path="' + img.path + '" data-filename="' + img.filename + '">' +
                '<img src="' + img.url + '" alt="' + img.filename + '">' +
                '<span>' + img.filename + '</span>' +
                '</button>';
        }).join('');
    }

    function selectExisting(picker, path, filename) {
        qs(picker, '[data-picker-existing]').value = path;
        qs(picker, '[data-picker-file], input[type="file"]').value = '';
        const selected = qs(picker, '[data-picker-selected]');
        selected.classList.remove('d-none');
        qs(picker, '[data-picker-selected-name]').textContent = filename;
        picker.querySelectorAll('.alive-image-picker__card').forEach(function (card) {
            card.classList.toggle('is-selected', card.getAttribute('data-path') === path);
        });
    }

    function initPicker(picker) {
        picker.querySelectorAll('[data-picker-tab]').forEach(function (tab) {
            tab.addEventListener('click', function () {
                const target = tab.getAttribute('data-picker-tab');
                picker.querySelectorAll('[data-picker-tab]').forEach(function (btn) {
                    btn.classList.toggle('active', btn === tab);
                });
                picker.querySelectorAll('[data-picker-panel]').forEach(function (panel) {
                    panel.classList.toggle('d-none', panel.getAttribute('data-picker-panel') !== target);
                });
                if (target === 'library') {
                    loadImages(picker);
                }
            });
        });

        picker.addEventListener('click', function (event) {
            const card = event.target.closest('.alive-image-picker__card');
            if (card) {
                selectExisting(picker, card.getAttribute('data-path'), card.getAttribute('data-filename'));
            }
        });

        const search = qs(picker, '[data-picker-search]');
        if (search) {
            search.addEventListener('input', function () {
                renderGrid(picker, cache[picker.dataset.folder || ''] || []);
            });
        }

        const fileInput = picker.querySelector('input[type="file"]');
        if (fileInput) {
            fileInput.addEventListener('change', function () {
                if (!fileInput.files.length) {
                    return;
                }
                qs(picker, '[data-picker-existing]').value = '';
                qs(picker, '[data-picker-selected]').classList.add('d-none');
                const preview = qs(picker, '[data-picker-upload-preview]');
                const url = URL.createObjectURL(fileInput.files[0]);
                preview.innerHTML = '<img src="' + url + '" alt="Preview"><span>New upload</span>';
            });
        }

        const clearBtn = qs(picker, '[data-picker-clear]');
        if (clearBtn) {
            clearBtn.addEventListener('click', function () {
                qs(picker, '[data-picker-existing]').value = '';
                qs(picker, '[data-picker-selected]').classList.add('d-none');
                picker.querySelectorAll('.alive-image-picker__card').forEach(function (card) {
                    card.classList.remove('is-selected');
                });
            });
        }

        const form = picker.closest('form');
        if (form) {
            form.addEventListener('submit', function (event) {
                if (!fileInput || !fileInput.hasAttribute('data-picker-required')) {
                    return;
                }
                const hasFile = fileInput.files && fileInput.files.length;
                const hasExisting = qs(picker, '[data-picker-existing]').value;
                if (!hasFile && !hasExisting) {
                    event.preventDefault();
                    alert('Please upload a new image or select an existing one.');
                    fileInput.focus();
                }
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.alive-image-picker').forEach(initPicker);
    });
})();
