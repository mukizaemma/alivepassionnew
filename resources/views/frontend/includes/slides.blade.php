<div class="tp-slider-3__area p-relative custom-banner">
    <div class="tp-slider-3__wrapper">
        <div class="swiper-container tp-slider-3__active">
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    <div class="swiper-slide">
                        <div class="tp-slider-3__bg z-index fix p-relative alive-hero-slide"
                             style="background-image: url('{{ asset('storage/images/slides/' . $slide->image) }}');">
                            <div class="alive-hero-overlay" aria-hidden="true"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-10">
                                        <div class="tp-slider-3__content alive-hero-content">
                                            <p class="alive-hero-brand">
                                                {{ config('alive.hero.eyebrow') }}
                                            </p>
                                            <h1 class="tp-slider-3-title alive-hero-title">
                                                {{ config('alive.hero.title_before') }}
                                                <span>{{ config('alive.hero.title_accent') }}</span>
                                            </h1>
                                            <p class="alive-hero-copy">
                                                {{ $slide->heading ?: config('alive.hero.subtitle') }}
                                            </p>
                                            <div class="alive-hero-actions">
                                                <a class="alive-btn-outline" href="#alive-about">Learn More</a>
                                                <a class="tp-btn theme-2-bg alive-hero-cta" href="{{ $setting->getDonateUrl() }}" target="_blank" rel="noopener noreferrer">Donate</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#alive-about" class="alive-hero-scroll" aria-label="Scroll to about section">
                                <span>Scroll</span>
                                <i class="far fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
