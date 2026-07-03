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
                                    <div class="col-xl-12">
                                        <div class="tp-slider-3__content alive-hero-content">
                                            <span class="alive-hero-eyebrow">{{ $setting->company ?? 'Alive Passion Ministries' }}</span>
                                            <h2 class="tp-slider-3-title alive-hero-title">{{ $slide->heading }}</h2>
                                            <a class="tp-btn theme-2-bg alive-hero-cta" href="{{ $setting->getDonateUrl() }}" target="_blank" rel="noopener noreferrer">Get Involved</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
