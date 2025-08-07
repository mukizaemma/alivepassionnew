    <div class="tp-blog-2__area tp-blog-2__space">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-blog-2__section-title pb-50 text-center">
                        <h4 class="tp-section-title">Our Programs</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($programs as $rs)
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s"
                data-wow-delay=".3s">
                    <div class="tp-blog-2__item">
                        <a href="{{route('singleProgram',['slug'=>$rs->slug])}}">
                            <div class="tp-blog-2__thumb p-relative">
                                <img src="{{ asset('storage/images/programs/' . $rs->image) }}" alt="" style="height: 250px; object-fit: cover;">
                            </div>
                        </a>
                        <div class="tp-blog-2__content ">
                            <div class="tp-blog-2__tag">
                                <a href="{{route('singleProgram',['slug'=>$rs->slug])}}"><h5 class="tp-donate__title">{{ $rs->title }}</h5></a>
                            </div>


                            <div class="tp-about-3__text">
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($rs->description), 100) }}</p>

                                <a href="{{route('singleProgram',['slug'=>$rs->slug])}}">
                                    <div class="tp-blog-2__link text-center">
                                        <span>Read More<i class="flaticon-arrow-right"></i><span>
                                    </span></span></div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>