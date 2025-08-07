@extends('layouts.frontbase')

@section('title', 'Home Page')

@section('content')


    @include('frontend.includes.founder')

        <!-- about-area-start -->
        {{-- <div class="tp-product-details-area pt-20 pb-20">
            <div class="container">
                @foreach ($team as $rs)
                    
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="tp-shop-details__wrapper">
                                <div class="tp-shop-details__tab-content-box">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-one" role="tabpanel"
                                        aria-labelledby="nav-one-tab">
                                        <div class="tp-shop-details__tab-big-img">
                                            <img src="{{asset('storage/images/staff').$rs->image}}" alt="">
                                        </div>
                                    </div>

                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="tp-shop-details__right-warp">
                                <h3 class="tp-shop-details__title-sm">{{ $rs->names }}</h3>
                                <div class="tp-shop-details__price">
                                <span class="text-theme">{{ $rs->position }}</span>
                            </div>

                                <div class="tp-shop-details__text">
                                <p>
                                    {{ $rs->bio }}
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}

        <!-- about-area-end -->

        <!-- team-area-start -->
        <div class="tp-team-2__area pt-115 pb-65">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-team-2__section-title pb-50 text-center">
                            <h4 class="tp-section-title">Advisory Team</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($advisors as $adv)
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s"
                    data-wow-delay=".3s">
                        <div class="tp-team-2__wrapper">
                            <div class="tp-team-2__item text-center">
                                <div class="tp-team-2__thumb">
                                    <img src="{{asset('storage/images/staff').$adv->image}}" alt="">
                                </div>
                                <div class="tp-team-2__content">
                                    <div class="tp-team-2__author-info">
                                        <a href="#"><h4 class="tp-team-2__author-name">{{ $adv->names }}</h4></a>
                                        <span>{{ $adv->position }}</span>
                                    </div>
                                    {{-- <div class="tp-team-2__social-box">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- team-area-end -->

        <!-- cta-area-start -->
            @include('frontend.includes.backImage')
        <!-- cta-area-end -->


@endsection
