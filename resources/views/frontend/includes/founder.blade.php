    <div class="tp-about-4__area tp-about-4__space p-relative fix grey-bg mt-60 mb-30">
        <div class="tp-about-4__bg" data-background="{{ asset('storage/images/' . $about->image) }}">

        </div>
        <div class="tp-about-4__shape d-none d-xxl-block">
            <img src="" alt="">               
        </div>
        <div class="container">
            <div class="row">
                <div class="offset-xl-6 offset-lg-6 col-xl-6 col-lg-6 wow tpfadeRight" data-wow-duration=".9s"
                data-wow-delay=".5s">
                    <div class="tp-about-4__left-side">
                        <div class="tp-about-4__section-title">
                            <h4 class="tp-section-title">The Founder</h4>
                        </div>
                        <div class="tp-about-4__content">
                            <div class="tp-about-4__text">
                                <p>{{ $about->donations }}</p>
                            </div>                                
   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>