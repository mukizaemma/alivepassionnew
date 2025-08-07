@extends('layouts.frontbase')


@section('content')

    <!-- service-area-start -->

    
    <div class="tp-donate__area p-relative fix">
        <div class="tp-donate__shape-3 d-none d-lg-block">
            <img src="assets/img/donate/donate-shape-1-4.png" alt="">
        </div>
        <div class="tp-donate__bg">
            <div class="container">
                <div class="row align-items-center">
                    <div style="padding: 30px; background: #f8f8f8; border-radius: 10px; margin-bottom: 40px; text-align: center;">
                        <h2 style="color: #444; font-size: 28px; margin-bottom: 15px;">💛 Why Your Support Matters</h2>
                        <p style="font-size: 16px; color: #333; line-height: 1.7; margin-bottom: 20px;">
                            Deep in the heart of Bugesera District, many families face daily struggles — from malnutrition and poverty to lack of education and shelter. At <strong>Alive Passion</strong>, we are walking alongside the most vulnerable: children without sponsors, elderly with no homes, youth lacking direction, and women without income.
                        </p>
                        <p style="font-size: 16px; color: #333; line-height: 1.7; margin-bottom: 20px;">
                            Through child sponsorship, malnutrition support, vocational training like sewing, and spiritual guidance, we offer practical and lasting solutions that restore dignity and build a sustainable future. <strong>Your donation fuels this mission</strong> — providing food, training, discipleship, and shelter to those who need it most.
                        </p>
                        <p style="font-size: 16px; color: #333; line-height: 1.7; margin-bottom: 20px;">
                            🟡 <strong>Click “Donate Now”</strong> on our website to immediately impact lives.<br>
                            🔵 Interested in sponsoring a child, equipping a training center, or donating a sewing machine? 
                            <strong>Contact us today</strong> or connect with a team member through our <em>Team</em> page for details and partnership opportunities.
                        </p>
                        <p style="font-size: 16px; color: #444; font-weight: bold; margin-top: 30px;">
                            👉 Every donation goes beyond charity — it brings hope, stability, and transformation. Explore the causes below and choose where your heart leads you.
                        </p>
                    </div>

                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <div class="tp-donate__section-title">
                            <h4 class="tp-section-title">Our Causes</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="tp-donate__section-arrow d-flex justify-content-start justify-content-md-end pb-50">
                            <div class="test-next">
                                <button><i class="far fa-arrow-left"></i></button>
                            </div>
                            <div class="test-prev">
                                <button><i class="far fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-container tp-donate__active">


                    <div class="swiper-wrapper">
                        @foreach ($campaigns as $campaign)
                        <div class="swiper-slide">
                            <div class="tp-donate__item vh-100">
                                <div class="tp-donate__thumb p-relative fix">
                                    <img src="{{ asset('storage/images/campaigns/' . $campaign->image) }}" alt="" height="250px">
                              
                                </div>
                                <div class="tp-donate__content">
                                    <div class="tp-donate__text">
                                        <a href="{{ route('campaign',['slug'=>$campaign->slug]) }}">
                                            <h5 class="tp-donate__title">{{ $campaign->title }}
                                            </h5>
                                        </a>
                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($campaign->description), 100) }}</p>
                                    </div>
                                    <div class="tp-donate-progress">
                                        <div class="tp-donate-progress-item fix">
                                            <span class="progress-count">{{ $campaign->percentage }}%</span>
                                            <div class="progress">
                                                <div class="progress-bar wow slideInLeft" data-wow-duration="1s"
                                                    data-wow-delay=".3s" role="progressbar" data-width="42%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 58%; visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: slideInLeft;">
                                                </div>
                                            </div>
                                            <div class="progress-goals">
                                                <span>Raised <b> ${{ $campaign->raised }}</b></span>
                                                <span>Goal <b> ${{ $campaign->goal }}</b></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tp-donate__button">
                                        <a class="tp-grey-btn" href="{{ route('campaigns') }}">Donate Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>                            
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- service-area-end -->

        <!-- cta-area-start -->
            @include('frontend.includes.backImage')
        <!-- cta-area-end -->

    @include('frontend.includes.partners')
@endsection
