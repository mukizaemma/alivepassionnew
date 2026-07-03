@extends('layouts.frontbase')

@section('title', 'Home Page')

@section('content')



        
    @include('frontend.includes.founder')

        <!-- about-area-start -->
    <div class="tp-about-4__area tp-about-4__space p-relative fix grey-bgs mt-60">
        <div class="container">
            <div class="row">
                <div class="offset-xl-12 wow tpfadeRight" data-wow-duration=".9s"
                data-wow-delay=".5s">
                    <div class="tp-about-4__left-side">
                        <div class="tp-about-4__section-title">
                            <h4 class="tp-section-title">Alive Passion Background</h4>
                        </div>
                        <div class="tp-about-4__content">
                            <div class="tp-about-4__text">
                                <p style="font-size: 20px; font-wight:700; text-align:justify" > {{ $about->description }} </p>

                            </div>  
                                                          
 
                        </div>
                    </div>
                </div>
                <div class="tp-about-4__wraper pb-45 d-flex justify-content-between">

                    <div class="tp-about-4__list-item d-flex align-items-start">
                    <div class="tp-about-4__list-content" style="display: flex; flex-direction: column; align-items: center; text-align: start;">
                        <div class="tp-about-4__list-icon">
                            <i class="flaticon-mission"></i>
                        </div>
                        <h4 class="tp-about-4__title-sm">Our Mission</h4>
                        <p>{{ $mission->mission }}</p>
                    </div>

                    </div>
                    <div class="tp-about-4__list-item d-flex align-items-start">
                    <div class="tp-about-4__list-content" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
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

        <!-- brand-area-start -->


        <!-- brand-area-end -->

        <!-- cta-area-start -->
    @include('frontend.includes.backImage')
        <!-- cta-area-end -->

    @include('frontend.includes.partners')
@endsection
