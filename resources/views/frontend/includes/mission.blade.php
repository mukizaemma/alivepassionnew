<section class="alive-mission">
    <div class="container">
        <div class="alive-mission__grid">
            <article class="alive-mission__item wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".2s">
                <div class="alive-mission__icon">
                    <i class="flaticon-mission"></i>
                </div>
                <h3>Our Mission</h3>
                <p>{{ $mission->mission ?? 'To share the Gospel and restore dignity through compassionate care in Bugesera, Rwanda.' }}</p>
            </article>

            <div class="alive-mission__heart" aria-hidden="true">
                <i class="flaticon-heart"></i>
            </div>

            <article class="alive-mission__item wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".35s">
                <div class="alive-mission__icon">
                    <i class="flaticon-vision"></i>
                </div>
                <h3>Our Vision</h3>
                <p>{{ $mission->vision ?? 'Communities transformed by the love of Christ — spiritually, socially, and economically.' }}</p>
            </article>
        </div>
    </div>
</section>
