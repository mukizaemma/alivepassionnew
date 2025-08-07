@extends('layouts.frontbase')

@section('title', 'Home Page')

@section('content')


        <!-- breadcrumb-area-start -->
        <div class="tp-breadcrumb__area p-relative fix tp-breadcrumb-height" data-background="{{ asset('storage/images/' . $about->image2) }}" style="height: 500px; width: 80%; margin: 0 auto;">
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
                            <h3 class="tp-breadcrumb__title text-center">Our Recent Updates</h3>
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

    <!-- service-area-start -->

    
    <div class="tp-blog-2__area pt-120 pb-90">
        <div class="container">
            {{-- <div class="row">
                <div class="col-xl-12">
                    <div class="tp-blog-2__section-title pb-50 text-center">
                        <h4 class="tp-section-title">Recent Updates</h4>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                @foreach ($news as $blog)
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s"
                data-wow-delay=".3s">
                    <div class="tp-blog-2__item">
                        <a href="{{route('postSingle',$blog->slug)}}">
                            <div class="tp-blog-2__thumb p-relative">
                                <img src="{{ asset('storage/images/news/' . $blog->image) }}" alt="">
                            </div>
                        </a>
                        <div class="tp-blog-2__content">
                            <div class="{{route('postSingle',$blog->slug)}}">
                            </div>
                            <a href="{{route('postSingle',$blog->slug)}}"><h4 class="tp-blog-2__title-sm">{{$blog->title}}</h4></a>
                            <span class="tp-blog-2__meta-3">{{$blog->created_at->format('d M,Y')}}</span>
                            <a href="{{route('postSingle',$blog->slug)}}">
                                <div class="tp-blog-2__link text-center">
                                    <span>Read More<i class="flaticon-arrow-right"></i><span>
                                </span></span></div>
                            </a>
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
