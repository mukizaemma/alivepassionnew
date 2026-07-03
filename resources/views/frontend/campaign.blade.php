@extends('layouts.frontbase')

@section('content')



        <div class="tp-event-details__area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="tp-event-details__left-box">
                            <div class="tp-event-details__thumb p-relative pb-35">
                                <img src="{{ asset('storage/images/campaigns/' . $campaign->image) }}" alt="{{ $campaign->title }}">
                            </div>
                            <h4 class="tp-event-details__title">{{ $campaign->title }}</h4>

                            <div class="tp-event-details__text pb-20">
                                <p>{!! $campaign->description !!}</p>
                            </div>

                            <div class="pb-35">
                                <p style="font-size: 16px; color: #333;">
                                    Your support helps us reach <strong>{{ $campaign->goal }} USD</strong> to make this project a reality.
                                    Every donation brings us closer — <strong>{{ $campaign->percentage }}%</strong> of the goal has been raised so far.
                                </p>
                            </div>

                            <div class="tp-donation-details__progress-box grey-bg d-flex align-items-center justify-content-between mb-50">
                                <div class="tp-donation-details__progress">
                                    <div class="tp-donation-details__progress-item fix">
                                        <span class="progress-count">{{ $campaign->percentage }}%</span>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft"
                                                data-wow-duration="1s"
                                                data-wow-delay=".3s"
                                                role="progressbar"
                                                aria-valuenow="{{ $campaign->percentage }}"
                                                aria-valuemin="0"
                                                aria-valuemax="100"
                                                style="width: {{ $campaign->percentage }}%; visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: slideInLeft;">
                                            </div>
                                        </div>
                                        <div class="progress-goals">
                                            <span>Raised <b>${{ number_format($campaign->raised) }}</b></span>
                                            <span>Goal <b>${{ number_format($campaign->goal) }}</b></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tp-donation-details__button d-none d-xl-block">
                                    <a class="tp-btn" href="{{ $campaign->donationUrl ?? '#' }}">Donate Now</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-4">
                        <div class="tp-event-details__right-box"> 

                            <div class="sidebar__widget mb-30">
                                <h3 class="sidebar__widget-title">Testimonials</h3>
                                <div class="sidebar__widget-content">
                                    <div class="sidebar__post">

                                        @foreach ($testimonials as $rs)
                                        <div class="rc__post mb-10 d-flex align-items-center">
                                        <div class="rc__post-thumb mr-20">
                                            <a href="{{ route('testimony',['id'=>$rs->id]) }}"><img src="{{ asset('storage/images/testimonies/' . $rs->image) }}" alt="" width="100px"></a>
                                        </div>
                                        <div class="rc__post-content">
                                            {{-- <div class="rc__meta">
                                                <span><i class="flaticon-comment"></i>
                                                02 Comments</span>
                                            </div> --}}
                                            <h3 class="rc__post-title">
                                                <a href="{{ route('testimony',['id'=>$rs->id]) }}">{{ $rs->title }}</a>
                                            </h3>
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


    @include('frontend.includes.partners')
@endsection
