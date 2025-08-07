@extends('layouts.frontbase')

@section('title', 'Home Page')

@section('content')


        <!-- breadcrumb-area-start -->
        <div class="tp-breadcrumb__area p-relative fix tp-breadcrumb-height" data-background="{{ asset('storage/images/' . $about->image) }}" style="height: 450px; width: 80%; margin: 0 auto;">
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
                            <h3 class="tp-breadcrumb__title text-center">Our Programs</h3>
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

    <!-- service-area-start -->

    
    <div class="tp-blog-2__area pt-20 pb-90">
        <div class="container">
            <div class="row">
                @foreach ($programs as $rs)
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s"
                data-wow-delay=".3s">
                    <div class="tp-blog-2__item vh-100">
                        <a href="{{route('singleProgram',['slug'=>$rs->slug])}}">
                            <div class="tp-blog-2__thumb p-relative">
                                <img src="{{ asset('storage/images/programs/' . $rs->image) }}" alt="" style="height: 250px; object-fit: cover;">
                            </div>
                        </a>
                        <div class="tp-blog-2__content">
                            <div class="tp-blog-2__tag">
                                <h5 class="tp-donate__title">{{ $rs->title }}</h5>
                            </div>


                            <div class="tp-about-3__text">
                                @php
                                $words = Str::limit($rs->description, 100, '...');
                                @endphp

                                <p style="font-size: 20px; font-wight:700; text-align:justify" > {{ $words }} </p>

                                @if(strlen($rs->description) > 100)
                                <a href="{{route('singleProgram',['slug'=>$rs->slug])}}">
                                    <div class="tp-blog-2__link text-center">
                                        <span>Read More<i class="flaticon-arrow-right"></i><span>
                                    </span></span></div>
                                </a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- service-area-end -->

        <!-- cta-area-start -->
            @include('frontend.includes.backImage')
        <!-- cta-area-end -->

  @include('frontend.includes.partners')
@endsection
