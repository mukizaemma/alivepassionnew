@extends('layouts.frontbase')

@section('content')

    <!-- slider-area-start -->
    @include('frontend.includes.slides')
    <!-- slider-area-end -->
    
    <!-- about-area-start -->

        <div class="tp-about-4__area tp-about-4__space p-relative fix grey-bg mt-60">
        <div class="container">
            <div class="row">
                <div class="offset-xl-12 wow tpfadeRight" data-wow-duration=".9s"
                data-wow-delay=".5s">
                    <div class="tp-about-4__left-side">
                        <div class="tp-about-4__section-title text-center">
                            <h4 class="tp-section-title alive-section-title">About Us</h4>
                        </div>
                        <div class="tp-about-4__content">
                            <div class="tp-about-4__text">
                                <div class="tp-about-4__text">
                                @php
                                $words = Str::limit($about->description, 400, '...');
                                @endphp

                                <p class="alive-about-text">{{ $words }}</p>

                                @if(strlen($about->description) > 400)
                                
                                <div class="tp-about-3__btn text-center">
                                    <a class="tp-btn" href="{{route('backgroundDetails')}}">Read More</a>
                                </div>
                                @endif
                            </div>

                            </div>  
                                                          
 
                        </div>
                    </div>
                </div>
                <div class="tp-about-4__wraper pb-45 d-flex justify-content-between gap-4 flex-wrap">

                    <div class="tp-about-4__list-item d-flex align-items-start alive-mission-card">
                    <div class="tp-about-4__list-content text-center w-100">
                        <div class="tp-about-4__list-icon">
                            <i class="flaticon-mission"></i>
                        </div>
                        <h4 class="tp-about-4__title-sm">Our Mission</h4>
                        <p>{{ $mission->mission }}</p>
                    </div>

                    </div>
                    <div class="tp-about-4__list-item d-flex align-items-start alive-mission-card">
                    <div class="tp-about-4__list-content text-center w-100">
                        <div class="tp-about-4__list-icon">
                            <i class="flaticon-vision"></i>
                        </div>
                        <h4 class="tp-about-4__title-sm">Our Vision</h4>
                        <p>{{ $mission->vision }}</p>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-area-end -->
     
    <!-- service-area-start -->
    @include('frontend.includes.services')
    <!-- service-area-end -->

    <!-- donate-area-start -->
    @include('frontend.includes.campaigns')
    <!-- donate-area-end -->

    <!-- cta-area-start -->
    @include('frontend.includes.backImage')
    <!-- cta-area-end -->

    <!-- testimonial-area-start -->
    
    @include('frontend.includes.testimonials')
    <!-- testimonial-area-end -->


    @include('frontend.includes.founder')
    @include('frontend.includes.partners')


@endsection