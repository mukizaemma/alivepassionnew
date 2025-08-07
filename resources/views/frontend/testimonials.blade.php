@extends('layouts.frontbase')

@section('title', 'Home Page')

@section('content')


        <!-- breadcrumb-area-start -->
        <div class="tp-breadcrumb__area p-relative fix tp-breadcrumb-height" data-background="{{ asset('storage/images/' . $about->image2) }}" style="height: 500px; width: 80%; margin: 0 auto;" >
            <div class="tp-breadcrumb__shape-1 z-index-5">
                <img src="assets/img/breadcrumb/breadcrumb-shape-1.png" alt="">
            </div>
            <div class="tp-breadcrumb__shape-2 z-index-5">
                <img src="assets/img/breadcrumb/breadcrumb-shape-2.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-breadcrumb__content z-index-5">
                            <h3 class="tp-breadcrumb__title text-center">Our Testimonials</h3>
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

    <!-- testimonial-area-start -->
    @include('frontend.includes.testimonials')
    <!-- testimonial-area-end -->

        <!-- cta-area-start -->
            @include('frontend.includes.backImage')
        <!-- cta-area-end -->

  @include('frontend.includes.partners')
@endsection
