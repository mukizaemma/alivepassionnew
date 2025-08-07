    <div class="tp-donate__area p-relative fix">
        <div class="tp-donate__shape-3 d-none d-lg-block">
            <img src="assets/img/donate/donate-shape-1-4.png" alt="">
        </div>
        <div class="tp-donate__bg">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <div class="tp-donate__section-title">
                            <h4 class="tp-section-title">Our Causes</h4>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="tp-donate__section-arrow d-flex justify-content-start  justify-content-md-end pb-50">
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
                            <div class="tp-donate__item">
                                <div class="tp-donate__thumb p-relative fix">
                                    <img src="{{ asset('storage/images/campaigns/' . $campaign->image) }}" alt="" style="height: 250px; object-fit: cover;">
                                    <div class="tp-donate__thumb-shape">
                                        {{-- <img src="{{ asset('storage/images/campaigns/' . $campaign->image) }}" alt="" style="height: 200px; object-fit: cover;"> --}}
                                        <div class="tp-donate__thumb-text">
                                            <span>{{ $campaign->program->title }}</span>
                                        </div>
                                    </div>
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
                                        <a class="tp-grey-btn" href="{{ route('campaign',['slug'=>$campaign->slug]) }}">Donate Now</a>
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