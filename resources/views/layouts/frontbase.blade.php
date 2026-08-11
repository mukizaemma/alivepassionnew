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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/alive-custom.css') }}">
</head>

@php
    $overlayHeader = request()->routeIs([
        'backgroundDetails', 'team', 'testimonials', 'showPrograms', 'singleProgram',
        'posts', 'impacts', 'gallery', 'contacts', 'campaigns', 'campaign',
    ]);
@endphp
<body class="{{ request()->routeIs('home') ? 'is-home' : ($overlayHeader ? 'has-page-hero' : '') }}">

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

    @if($setting && $setting->getWhatsappUrl())
        <a class="alive-whatsapp" href="{{ $setting->getWhatsappUrl() }}" target="_blank" rel="noopener noreferrer" aria-label="Chat with us on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    @endif

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
            
            <div class="tpoffcanvas__donate mb-4">
                <a class="tp-btn w-100" href="{{ optional($setting)->getDonateUrl() ?? \App\Models\Setting::DEFAULT_DONATE_URL }}" target="_blank" rel="noopener noreferrer">Donate</a>
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
                                        <a href="{{ $setting->facebook ?? '' }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{ $setting->instagram ?? '' }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
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
            <div class="container-fluid alive-header-wrap">
                <div class="row align-items-center flex-nowrap alive-header-row">
                    <div class="col-auto">
                        <div class="tp-header-3__logo">
                            <a href="{{route('home')}}">
                                <img src="{{asset('storage\images').$setting->logo}}" alt="{{ $setting->company ?? 'Alive Passion Ministries' }}">
                            </a>
                        </div>
                    </div>
                    <div class="col d-none d-xl-block">
                        <div class="tp-header-3__main-menu">
                            <nav class="tp-main-menu-content">
                                <ul>
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li class="has-dropdown"><a href="{{route('backgroundDetails')}}">About</a>
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
                                    <li><a href="{{route('posts')}}">Activities</a></li>
                                    <li><a href="{{route('impacts')}}">Impact</a></li>
                                    <li><a href="{{route('gallery')}}">Gallery</a></li>
                                    <li><a href="{{route('contacts')}}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-auto">
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
                                            <a class="tp-btn" href="{{ optional($setting)->getDonateUrl() ?? \App\Models\Setting::DEFAULT_DONATE_URL }}" target="_blank" rel="noopener noreferrer">Donate</a>
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

    <footer class="alive-footer">
        <div class="tp-footer__area">
            <div class="tp-footer__bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-45 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".2s">
                            <div class="tp-footer__widget">
                                <div class="tp-footer__logo">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('storage/images') . ($setting->logo ?? '') }}" alt="{{ $setting->company ?? 'Alive Passion Ministries' }}" height="90">
                                    </a>
                                </div>
                                <p class="alive-footer__brand-name">Alive Passion Ministries</p>
                                <p class="alive-footer__tagline">Love. Serve. Transform. A Gospel-centered ministry restoring dignity in Bugesera, Rwanda.</p>
                                <div class="alive-footer__socials">
                                    <a href="{{ $setting->facebook ?? '' }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{ $setting->instagram ?? '' }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                                    @if(!empty($setting->youtube))
                                        <a href="{{ $setting->youtube }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 mb-45 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                            <div class="tp-footer__widget">
                                <h4 class="tp-footer__widget-title-3">Quick Links</h4>
                                <div class="tp-footer__list">
                                    <ul>
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="{{ route('backgroundDetails') }}">About Us</a></li>
                                        <li><a href="{{ route('showPrograms') }}">Our Programs</a></li>
                                        <li><a href="{{ route('posts') }}">Recent Activities</a></li>
                                        <li><a href="{{ route('impacts') }}">Our Impact</a></li>
                                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                        <li><a href="{{ route('contacts') }}">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-45 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".4s">
                            <div class="tp-footer__widget">
                                <h4 class="tp-footer__widget-title-3">Our Programs</h4>
                                <div class="tp-footer__list">
                                    <ul>
                                        @foreach ($programs as $rs)
                                            <li><a href="{{ route('singleProgram', $rs->slug) }}">{{ $rs->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 mb-45 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
                            <div class="tp-footer__widget">
                                <h4 class="tp-footer__widget-title-3">Contact Us</h4>
                                <div class="tp-footer__contact-list">
                                    @if(!empty($setting->address))
                                    <div class="tp-footer__contact-item alive-footer__contact-item d-flex align-items-start">
                                        <div class="tp-footer__icon"><i class="flaticon-map" aria-hidden="true"></i></div>
                                        <div class="tp-footer__text">
                                            <a href="https://share.google/A6v7gQBjDhgp4NiUD" target="_blank" rel="noopener noreferrer">{{ $setting->address }}</a>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="tp-footer__contact-item alive-footer__contact-item d-flex align-items-center">
                                        <div class="tp-footer__icon"><i class="flaticon-phone" aria-hidden="true"></i></div>
                                        <div class="tp-footer__text">
                                            <a href="tel:{{ $setting->phone ?? '' }}">{{ $setting->phone ?? '' }}</a>
                                        </div>
                                    </div>
                                    <div class="tp-footer__contact-item alive-footer__contact-item d-flex align-items-center">
                                        <div class="tp-footer__icon"><i class="flaticon-mail" aria-hidden="true"></i></div>
                                        <div class="tp-footer__text">
                                            <a href="mailto:{{ $setting->email ?? '' }}">{{ $setting->email ?? '' }}</a>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="tp-footer__widget-title-3 mt-35">Stay Connected</h4>
                                <form class="alive-footer__subscribe" action="{{ route('subscribe') }}" method="POST">
                                    @csrf
                                    <input type="email" name="email" placeholder="Your email address" required>
                                    <button type="submit" class="tp-btn">Subscribe</button>
                                </form>
                                @if(session('success'))
                                    <p class="alive-footer__flash">{{ session('success') }}</p>
                                @endif
                                @error('email')
                                    <p class="alive-footer__flash">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- copyright-area-start -->
        <div class="tp-copyright__area tp-copyright__bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="tp-copyright__text text-center text-sm-start">
                            <span>
                            &copy; {{ $setting->company ?? 'Alive Passion Ministries' }},
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            | Site Developed by
                            </span>
                            <a href="https://iremetech.com" target="_blank" rel="noopener noreferrer">Ireme Technologies</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="tp-copyright__social text-center text-sm-end">
                            <a href="{{ $setting->facebook ?? '' }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $setting->instagram ?? '' }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
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
    <script>
        (function () {
            var section = document.getElementById('alive-impact');
            var layer = section && section.querySelector('.alive-impact__parallax');
            if (!section || !layer || section.classList.contains('alive-impact--light')) {
                return;
            }
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                return;
            }

            var ticking = false;
            function update() {
                var rect = section.getBoundingClientRect();
                var view = window.innerHeight || 1;
                if (rect.bottom < 0 || rect.top > view) {
                    ticking = false;
                    return;
                }
                var progress = (view - rect.top) / (view + rect.height);
                layer.style.transform = 'translate3d(0, ' + ((progress - 0.5) * 120) + 'px, 0)';
                ticking = false;
            }

            window.addEventListener('scroll', function () {
                if (!ticking) {
                    window.requestAnimationFrame(update);
                    ticking = true;
                }
            }, { passive: true });
            update();
        })();
    </script>



</body>

</html>