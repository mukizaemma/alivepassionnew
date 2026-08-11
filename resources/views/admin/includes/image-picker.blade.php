@php
    $name = $name ?? 'image';
    $folder = trim($folder ?? '', '/');
    $required = $required ?? false;
    $label = $label ?? 'Image';
    $current = isset($current) ? ltrim((string) $current, '/') : null;
    $existingName = $existingName ?? 'existing_'.$name;
    $pickerId = $pickerId ?? 'picker-'.preg_replace('/[^a-zA-Z0-9_-]/', '-', $name);
    $help = $help ?? 'Images larger than 700KB are compressed automatically. Smaller files are kept as uploaded.';
    $currentUrl = $currentUrl ?? ($current ? asset('storage/images/'.($folder !== '' ? $folder.'/' : '').$current) : null);
@endphp

<div class="alive-image-picker" id="{{ $pickerId }}" data-folder="{{ $folder }}" data-name="{{ $name }}">
    <label class="form-label fw-semibold">{{ $label }}</label>
    <p class="text-muted small mb-2">{{ $help }}</p>

    <ul class="nav nav-pills alive-image-picker__tabs mb-3" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" data-picker-tab="upload">Upload new</button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" data-picker-tab="library">Select existing</button>
        </li>
    </ul>

    <div class="alive-image-picker__panel" data-picker-panel="upload">
        <input type="file" class="form-control" name="{{ $name }}" id="{{ $pickerId }}-file" accept="image/*" @if($required && !$current) data-picker-required="1" @endif>
        <div class="alive-image-picker__preview mt-2" data-picker-upload-preview>
            @if($currentUrl)
                <img src="{{ $currentUrl }}" alt="Current image">
                <span>Current image</span>
            @endif
        </div>
    </div>

    <div class="alive-image-picker__panel d-none" data-picker-panel="library">
        <input type="search" class="form-control mb-2" placeholder="Search images..." data-picker-search>
        <div class="alive-image-picker__grid" data-picker-grid>
            <div class="alive-image-picker__empty">Loading images…</div>
        </div>
    </div>

    <input type="hidden" name="{{ $existingName }}" value="" data-picker-existing>
    <div class="alive-image-picker__selected d-none mt-2" data-picker-selected>
        Selected: <strong data-picker-selected-name></strong>
        <button type="button" class="btn btn-sm btn-link" data-picker-clear>Clear</button>
    </div>
</div>
