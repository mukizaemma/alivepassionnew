@extends('layouts.frontbase')

@section('content')


        <!-- contact-area-start -->
        <div class="tp-contact__area">
            <div class="container">
                <div class="tp-contact__bg">
                    <div class="tp-contact__wrapper d-flex align-items-center justify-content-between">
                        <div class="tp-contact__item d-flex align-items-center">
                            <div class="tp-contact__icon">
                              <span><i class="flaticon-phone"></i></span>
                            </div>
                            <div class="tp-contact__text">
                                <a href="tel:{{ $contact->phone ?? '' }}">{{ $contact->phone ?? '' }}</a>
                                <a href="tel:{{ $contact->phone1 ?? '' }}">{{ $contact->phone2 ?? '' }}</a>
                            </div>
                        </div>                        
                        <div class="tp-contact__item d-flex align-items-center">
                            <div class="tp-contact__icon">
                              <span><i class="flaticon-email"></i></span>
                            </div>
                            <div class="tp-contact__text">
                                <a href="mailto:{{ $contact->email ?? '' }}">{{ $contact->email ?? '' }}</a>
                                {{-- <a href="mailto:infocompany@gmail.com">infocompany@gmail.com</a> --}}
                            </div>
                        </div>
                        <div class="tp-contact__item d-flex align-items-center">
                            <div class="tp-contact__icon">
                              <span><i class="flaticon-location"></i></span>
                            </div>
                            <div class="tp-contact__text">
                                <a href="#">{{ $contact->address ?? '' }} <br> Rwanda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact-area-end -->


        <!-- form-area-start -->
        <div class="tp-contact-form__area tp-contact-form__space">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 wow tpfadeLeft" data-wow-duration=".9s"
                    data-wow-delay=".3s">
                        <div class="tp-contact-form__left-box">
                            <span class="tp-contact-form__subtitle">CONTACT FORM</span>
                            <p>if it's easier for you, fill the bellow form to let us know how you would like to partner with you</p>
                            <div class="tp-contact-form__social-box">
                            <a href="{{ $setting->facebook ?? '' }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $setting->instagram ?? '' }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 wow tpfadeRight" data-wow-duration=".9s"
                    data-wow-delay=".7s">
                        <div class="tp-contact-form__form-box">
                        <form class="form" action="{{ route('sendMessage') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                                <div class="row">
                                    <div class="col-xl-6 mb-30">
                                        <div class="tp-contact-form__input-box">
                                            <input type="text" placeholder="Your Name" name="names">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 mb-30">
                                        <div class="tp-contact-form__input-box">
                                            <input type="email" placeholder="Your Email" name="email">
                                        </div>
                                    </div>
                                    {{-- <div class="col-xl-6 mb-30">
                                        <div class="tp-contact-form__input-box">
                                            <input type="text" placeholder="Phone" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 mb-30">
                                        <div class="tp-contact-form__input-box">
                                            <input type="text" placeholder="Subject" name="">
                                        </div>
                                    </div> --}}
                                    <div class="col-xl-12 mb-30">
                                        <div class="tp-contact-form__textarea-box">
                                            <textarea placeholder="Write Your Message" name="message"></textarea>
                                        </div>
                                    </div>
                                </div>   
                                <div class="tp-contact-form__button">
                                <button class="tp-btn" type="submit">Send Your Message</button>
                            </div>                             
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- form-area-end -->


        <!-- location-area-start -->
        <div class="tp-location__area">
            <div class="container-fluid g-0">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-location__info-box">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.8149122684067!2d30.187276500000007!3d-2.2232867999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19c4a9b783053fc5%3A0x791e763c54874e94!2sAlive%20Passion%20Worship%20Church!5e0!3m2!1sen!2srw!4v1754544578562!5m2!1sen!2srw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- location-area-end -->


    @include('frontend.includes.backImage')
    @include('frontend.includes.partners')

@endsection
