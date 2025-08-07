<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $setting->company ?? ''}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage\images').$setting->logo}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    <!-- preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end  -->

    <!-- back-to-top-start  -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="far fa-angle-double-up"></i>
    </button>
    <!-- back-to-top-end  -->

        <!-- tp-offcanvus-area-start -->
    <div class="tpoffcanvas-area">
        <div class="tpoffcanvas">
            <div class="tpoffcanvas__close-btn">
                <button class="close-btn"><i class="fal fa-times"></i></button>
            </div>
            <div class="tpoffcanvas__logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('storage/images') . ($setting->logo ?? '') }}" alt="">
                </a>
            </div>
            <div class="tpoffcanvas__title">
                
            </div>
            <div class="tp-main-menu-mobile d-xl-none"></div>
            <div class="tpoffcanvas__contact-info">
                <div class="tpoffcanvas__contact-title">
                    <h5>Contact us</h5>
                </div>
                <ul>
                    <li>
                    <i class="fa-light fa-location-dot"></i>
                    <a  target="_blank">{{ $setting->address }}</a>
                    </li>
                    <li>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:{{ $setting->email ?? '' }}">{{ $setting->email ?? '' }}</a>
                    </li>
                    <li>
                    <i class="fal fa-phone-alt"></i>
                    <a href="tel:{{ $setting->phone ?? '' }}">{{ $setting->phone ?? '' }}</a>
                    </li>
                </ul>
            </div>
            
            <div class="tpoffcanvas__social">
                <div class="row align-items-center">
                    <div class="col-12 mt-5">
                        <div class="tp-copyright__socials text-center text-sm-start">
                            <a href="{{ $setting->facebook ?? '' }}" class="btn btn-secondary" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $setting->instagram ?? '' }}" class="btn btn-secondary" target="_blank"><i class="fab fa-instagram"></i></a>
                            {{-- <a href="{{ $setting->youtube ?? '' }}" class="btn btn-secondary" target="_blank"><i class="fab fa-youtube"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
    <div class="body-overlay"></div>
    <!-- tp-offcanvus-area-end -->

    <header class="tp-header-height">
                <!-- header-top-area-start -->
        <div class="tp-header-top-3__area grey-bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-5 col-md-7 col-12 col-sm-12">
                        <div class="tp-header-top-3__left-box text-center text-md-start">
                            <ul>
                                <li><span>Connect with us</span></li>
                                <li>
                                    <div class="tp-header-top-3__social">
                                        <a href="{{ $setting->facebook ?? '' }}" class="btn btn-secondary" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{ $setting->instagram ?? '' }}" class="btn btn-secondary" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </div>  
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-md-5">
                        <div class="tp-header-top-3__right-box text-end">
                            <ul>
                                <li class="location"><i class="flaticon-map"></i><a target="_blank" href="https://share.google/A6v7gQBjDhgp4NiUD">{{ $setting->address }}</a></li>
                                <li class="email"><i class="flaticon-phone"></i><a href="cal:{{ $setting->phone }}">{{ $setting->phone }}</a></li>
                                <li class="email"><i class="flaticon-mail"></i><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-top-area-end -->
        <!-- header-area-start -->
        <div id="header-sticky" class="tp-header-3__area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-1 col-lg-6 col-md-4 col-7">
                        <div class="tp-header-3__logo">
                            <a href="{{route('home')}}">
                                <img src="{{asset('storage\images').$setting->logo}}" alt="" width="90px">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-10 d-none d-xl-block">
                        <div class="tp-header-3__main-menu">
                            <nav class="tp-main-menu-content">
                                <ul>
                                    <li><a href="{{route('home')}}">Home</a>
                                    </li>
                                    <li class="has-dropdown"><a href="{{route('home')}}">About</a>
                                        <ul class="submenu tp-submenu">
                                            <li><a href="{{route('backgroundDetails')}}">Our Background</a></li>
                                            <li><a href="{{route('team')}}">Our Team</a></li>
                                            <li><a href="{{route('testimonials')}}">Testimonials</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown"><a href="{{ route('showPrograms') }}">Programs</a>
                                        <ul class="submenu tp-submenu">
                                            @foreach($programs as $rs)
                                                <li><a href="{{route('singleProgram',$rs->slug)}}">{{$rs->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="has-dropdown"><a href="{{ route('campaigns') }}">Get Involved</a>
                                        <ul class="submenu tp-submenu">
                                            @foreach($campains as $rs)
                                                <li><a href="{{route('campaign',$rs->slug)}}">{{$rs->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    {{-- <li><a href="{{route('campaigns')}}">Our Cause</a></li> --}}
                                    <li><a href="{{route('posts')}}">Updates</a></li>
                                    <li><a href="{{route('gallery')}}">Gallery</a></li>
                                    <li><a href="{{route('contacts')}}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-6 col-md-8 col-5">
                        <div class="tp-header-3__right-box">
                            <div class="tp-header-3__right-action text-end">
                                <ul class="d-flex align-items-center justify-content-end">
                                    {{-- <li>
                                        <div class="tp-header-3__icon-box d-none d-md-block">
                                            <button class="search-open-btn"><i class="flaticon-loupe"></i></button><a href="{{ route('login') }}"><i class="flaticon-user"></i></a>
                                        </div>
                                    </li>                                     --}}
                                    <li>
                                        <div class="tp-header-3__btn d-none d-md-block">
                                            <a class="tp-btn" href="{{ route('campaigns') }}">Donate Now</a>
                                        </div>
                                    </li>  
                                    <li>
                                        <div class="tp-header-3__bar d-xl-none">
                                            <button class="tp-menu-bar"><i class="fa-solid fa-bars-staggered"></i></button>
                                        </div>
                                    </li>                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-area-end -->
    </header>

    <main>
        
        @yield('content')
    </main>

    <footer>
        <!-- footer-area-start -->
        <div class="tp-footer__area">
            <div class="tp-footer__bg" data-background="#">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-sm-12 mb-45 wow tpfadeUp" data-wow-duration=".9s"
                    data-wow-delay=".3s">
                            <div class="tp-footer__widget footer-2-col-1">
                                <div class="tp-footer__logo">
                                    <a href="index.html">
                                        <img src="{{asset('storage\images').$setting->logo}}" alt="" height="90px">
                                    </a>
                                </div>
                                <div class="tp-footer__text">
                                    <p style="color:#fff">
                                        Every child sponsored, every woman trained, every soul discipled — is a life forever changed.
                                    </p>
                                </div>
                                <div class="tp-footer__contact-list">
                                    <div class="tp-footer__contact-item pb-20 d-flex about-items-center">
                                        <div class="tp-footer__icon">
                                            <i class="flaticon-mail"></i>
                                        </div>
                                        <div class="tp-footer__text">
                                             <a href="mailto:{{$setting->email ?? ''}}" style="color:#fff">{{$setting->email ?? ''}}</a>
                                        </div>
                                    </div>
                                    <div class="tp-footer__contact-item d-flex about-items-center">
                                        <div class="tp-footer__icon">
                                            <i aria-hidden="true" class="flaticon-phone"></i>
                                        </div>
                                        <div class="tp-footer__text">                                            
                                             <a href="tel:{{$setting->phone ?? ''}}" style="color:#fff">{{$setting->phone ?? ''}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xl-2 col-lg-2 col-md-6 mb-45 wow tpfadeUp" data-wow-duration=".9s"
                    data-wow-delay=".5s">
                            <div class="tp-footer__widget footer-2-col-2">
                                <h4 class="tp-footer__widget-title-3">Useful Links</h4>
                                <div class="tp-footer__list">
                                    <ul>
                                        <li><a href="{{ route('home') }}" style="color:#fff">Home</a></li>
                                        <li><a href="{{ route('backgroundDetails') }}" style="color:#fff">About Us</a></li>
                                        <li><a href="{{ route('showPrograms') }}" style="color:#fff">Programs</a></li>
                                        <li><a href="{{ route('testimonials') }}" style="color:#fff">Testimonials</a></li>
                                        <li><a href="{{ route('posts') }}" style="color:#fff">Updates</a></li>
                                        <li><a href="{{ route('contacts') }}" style="color:#fff">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-xl-4 col-lg-4 col-sm-12 mb-45 wow tpfadeUp" data-wow-duration=".9s"
                    data-wow-delay=".7s">
                            <div class="tp-footer__widget footer-2-col-3">
                                <h4 class="tp-footer__widget-title-3">Our Causes</h4>
                                <div class="tp-footer__list">
                                    <ul>
                                        @foreach ($campains as $rs)
                                            <li><a href="{{ route('campaign',['slug'=>$rs->slug]) }}" style="color:#fff">{{ $rs->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-sm-12 mb-45 wow tpfadeUp" data-wow-duration=".9s"
                    data-wow-delay=".9s">
                            <div class="tp-footer__widget footer-2-col-4 ">
                                <div class="tp-footer__donate-box tp-copyright__bg p-3">
                                    <h4 class="tp-footer__donate-title-sm">We don’t just give <br> we walk with them until they rise</h4>
                                    <a class="tp-btn theme-2-bg" href="{{ route('campaigns') }}">Get Involved</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-area-end -->

        <!-- copyright-area-start -->
        <div class="tp-copyright__area tp-copyright__bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="tp-copyright__text text-center text-sm-start">
                            <span style="color: #fff !important">
                            &copy; Alive Passion,
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            | Site Developed by
                            </span>
                             <a href="https://iremetech.com"
                                target="_blank" style="color: #fff">Ireme Technologies</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="tp-copyright__social text-center text-sm-end">
                            <a href="{{ $setting->facebook ?? '' }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $setting->instagram ?? '' }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- copyright-area-end -->

    </footer>


    <!-- JS here -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/purecounter.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>



</body>

</html>