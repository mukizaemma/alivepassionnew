        <div class="tp-brand-2__area">
            <div class="container">
                <div class="tp-brand-2__border">
                        <div class="tp-about-4__section-title">
                            <h4 class="tp-section-title">Our Partners</h4>
                        </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tp-brand-2__wrapper">
                                <div class="swiper-container tp-brand-2__active">
                                    <div class="swiper-wrapper">
                                        @foreach ($partners as $partner)
                                        <div class="swiper-slide">
                                            <div class="tp-brand-2__item text-center">
                                                <a href="{{ $partner->website }}" target="_blank">
                                                    <img src="{{ asset('storage/images/partners') . $partner->image }}" alt="" style="height: 90px; object-fit: contain;">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>