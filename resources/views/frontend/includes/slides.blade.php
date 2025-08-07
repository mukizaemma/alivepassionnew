<div class="tp-slider-3__area p-relative">
    {{-- <div class="tp-slider-3__icon smooth">
        <a href="#service" class="arrow-scroll-btn"><i class="flaticon-down-arrow"></i></a>
    </div> --}}


    <!-- Slider Wrapper (80% width and centered) -->
    <div class="tp-slider-3__wrapper" style="width: 80%; margin: 0 auto;">
        <div class="swiper-container tp-slider-3__active">
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    <div class="swiper-slide">
                        <div class="tp-slider-3__bg z-index fix p-relative"
                             style="background-image: url('{{ asset('storage/images/slides/' . $slide->image) }}'); 
                                    background-size: contain; 
                                    background-position: center; 
                                    background-repeat: no-repeat; 
                                    height: 700px; 
                                    border-radius: 10px !important; 
                                    overflow: hidden;">
                        

                            <div class="tp-slider-3__text">
                                <h3 class="tp-slider-3__big-text"></h3>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="tp-slider-3__content text-center">
                                            <h2 class="tp-slider-3-title pb-30" style="color: #1e5f3d">{{ $slide->heading }}</h2>
                                            <a class="tp-btn theme-2-bg" href="{{ route('campaigns') }}">Get Involved</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- tp-slider-3__bg -->
                    </div> <!-- swiper-slide -->
                @endforeach
            </div>
        </div>
    </div>
</div>
