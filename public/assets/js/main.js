(function ($) {
	"use strict";


	$('.tp-last-menu nav > ul > li').slice(-3).addClass('menu-last');

	var windowOn = $(window)
	///////////////////////////////////////////////////
	// 01. PreLoader Js
	windowOn.on('load',function () {
		$('#loading').fadeOut(500);
	});

	///////////////////////////////////////////////////
	// 02. SubMenu Dropdown Toggle
	if ($('.tp-main-menu nav > ul > li.has-dropdown > a').length) {
		$('.tp-main-menu nav > ul > li.has-dropdown > a').append('<i class="fal fa-angle-down"></i>');
	}

	$('.tp-service-3__item').on('mouseenter', function () {
		$(this).addClass('active').parent().siblings().find('.tp-service-3__item').removeClass('active');
	});

    ///////////////////////////////////////////////////
	// 03. scroll-to-target 
	windowOn.on('scroll', function () {
		var scroll = windowOn.scrollTop();
		if (scroll < 500) {
			$('.scroll-to-target').removeClass('open');

		} else {
			$('.scroll-to-target').addClass('open');
		}
	});
	
	///////////////////////////////////////////////////
	// 04. Scroll Up Js
	if ($('.scroll-to-target').length) {
		$(".scroll-to-target").on('click', function () {
		var target = $(this).attr('data-target');
		// animate
		$('html, body').animate({
			scrollTop: $(target).offset().top
		}, 1000);
	
		});
	}

	// 04. Scroll Up Js
	if ($('.scroll-to-target-2').length) {
		$(".scroll-to-target-2").on('click', function () {
		var target = $(this).attr('data-target');
		// animate
		$('html, body').animate({
			scrollTop: $(target).offset().top
		}, 1000);
	
		});
	}
	function smoothScrollTop() {
		$('.smooth a').on('click', function (event) {
			var target = $(this.getAttribute('href'));
			if (target.length) {
				event.preventDefault();
				$('html, body').stop().animate({
					scrollTop: target.offset().top - 150
				}, 1000);
			}
		});
	}
	smoothScrollTop();
	
    ///////////////////////////////////////////////////
	// 05. wow animation
	var wow = new WOW(
		{
		  mobile: true,
		}
	  );
	  wow.init();
	var windowOn = $(window);

	///////////////////////////////////////////////////
	// 06. PreLoader Js
	windowOn.on('load',function() {
		$("#loading").fadeOut(500);
	});

	window.onload()
	  


	///////////////////////////////////////////////////
	// 07. Sticky Header Js
	windowOn.on('scroll', function () {
		var scroll = windowOn.scrollTop();
		if (scroll < 400) {
			$("#header-sticky").removeClass("header-sticky");
		} else {
			$("#header-sticky").addClass("header-sticky");
		}
	});

	if ($('.tp-header-height').length > 0) {
		var headerHeight = document.querySelector(".tp-header-height");      
		var setHeaderHeight = headerHeight.offsetHeight;	
		$(".tp-header-height").each(function () {
			$(this).css({
				'height' : setHeaderHeight + 'px'
			});
		});
				
		$(".tp-header-height.header-sticky").each(function () {
			$(this).css({
				'height' : inherit,
			});
		});
	  }

	
	$(window).on('load', function () {

		$('#preloader').delay(350).fadeOut('slow');

		$('body').delay(350).css({ 'overflow': 'visible' });

	})

	////////////////////////////////////////////////////
	// 09. Sidebar Js
	$(".tp-menu-bar").on("click", function () {
		$(".tpoffcanvas").addClass("opened");
		$(".body-overlay").addClass("apply");
	});
	$(".close-btn").on("click", function () {
		$(".tpoffcanvas").removeClass("opened");
		$(".body-overlay").removeClass("apply");
	});
	$(".body-overlay").on("click", function () {
		$(".tpoffcanvas").removeClass("opened");
		$(".body-overlay").removeClass("apply");
	});

	///////////////////////////////////////////////////
	// 10. Magnific Js
	$(".popup-video").magnificPopup({
		type: "iframe",
	});

	////////////////////////////////////////////////////
	// 11. Data CSS Js
	$("[data-background").each(function () {
		$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
	});

	$("[data-width]").each(function () {
		$(this).css("width", $(this).attr("data-width"));
	});

	$("[data-bg-color]").each(function () {
		$(this).css("background-color", $(this).attr("data-bg-color"));
	});

	////////////////////////////////////////////////////
	// 21. Counter Js
	if ($(".purecounter").length) {
		new PureCounter({
			filesizing: true,
			selector: ".filesizecount",
			pulse: 2,
		});
		new PureCounter();
	}

	////////////////////////////////////////////////////
	// 14. magnificPopup Js
	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		}
	});

	////////////////////////////////////////////////////
	// 03. Search Js
	$(".search-open-btn").on("click", function () {
		$(".search__popup").addClass("search-opened");
	});
		
	$(".search-close-btn").on("click", function () {
		$(".search__popup").removeClass("search-opened");
	});
	
	////////////////////////////////////////////////////
	// 13. Swiper Js
	const postboxswiper = new Swiper('.postbox__thumb-slider-active', {
		// Optional parameters
		loop: true,
		slidesPerView: 1,
		autoplay:false,
		spaceBetween:0,
		breakpoints: {
			'1600': {
				slidesPerView: 1,
			},
			'1400': {
				slidesPerView:1,
			},
			'1200': {
				slidesPerView: 1,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},

		// Navigation arrows
		navigation: {
			nextEl: '.postbox-arrow-next',
			prevEl: '.postbox-arrow-prev',
		},
	  });

	////////////////////////////////////////////////////
	// 13. Swiper Js
	const missionswiper = new Swiper('.tp-mission-2__active', {
		// Optional parameters
		loop: true,
		slidesPerView: 1,
		arrows:true,
		autoplay:false,
		spaceBetween: 30,
		breakpoints: {
			'1600': {
				slidesPerView: 3,
			},
			'1400': {
				slidesPerView: 3,
			},
			'1200': {
				slidesPerView: 2,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
				arrows:false,
			},
			'0': {
				slidesPerView: 1,
				arrows:false,
			},
		},
		// Navigation arrows
		navigation: {
			nextEl: '.test-prev',
			prevEl: '.test-next',
		},
	  });

	////////////////////////////////////////////////////
	// 13. Swiper Js
	const brandswiper = new Swiper('.tp-brand-2__active', {
		// Optional parameters
		loop: true,
		slidesPerView: 1,
		arrows:true,
		autoplay:false,
		breakpoints: {
			'1600': {
				slidesPerView: 5,
			},
			'1400': {
				slidesPerView: 5,
			},
			'1200': {
				slidesPerView: 4,
			},
			'992': {
				slidesPerView: 4,
			},
			'768': {
				slidesPerView: 3,
			},
			'576': {
				slidesPerView: 2,
				arrows:false,
			},
			'0': {
				slidesPerView: 1,
				arrows:false,
			},
		},

		// Navigation arrows
		navigation: {
			nextEl: '.test-prev',
			prevEl: '.test-next',
		},
	  });

	////////////////////////////////////////////////////
	// 13. Swiper Js
	const testiswiper = new Swiper('.tp-testimonial__active', {
		// Optional parameters
		loop: true,
		slidesPerView: 3,
		arrows:true,
		autoplay:false,
		spaceBetween: 30,
		centeredSlides: true,
		breakpoints: {
			'1400': {
				slidesPerView: 3,
			},
			'1200': {
				slidesPerView: 2,
				centeredSlides: false,
			},
			'992': {
				slidesPerView: 1,
				centeredSlides: false,
			},
			'768': {
				slidesPerView: 1,
				centeredSlides: false,
			},
			'576': {
				slidesPerView: 1,
				arrows:false,
				centeredSlides: false,
			},
			'0': {
				slidesPerView: 1,
				arrows:false,
				centeredSlides: false,
			},
			
		a11y: false,
		},
		// Navigation arrows
		navigation: {
			nextEl: '.test-prev',
			prevEl: '.test-next',
		},
	  });

	////////////////////////////////////////////////////
	// 13. Swiper Js
	const testi2swiper = new Swiper('.tp-testimonial-2__active', {
		// Optional parameters
		loop: true,
		slidesPerView: 1,
		arrows:true,
		autoplay:false,
		spaceBetween: 30,
		breakpoints: {
			'1200': {
				slidesPerView: 1,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
				arrows:false,
			},
			'0': {
				slidesPerView: 1,
				arrows:false,
			},
		},

		  // scrollbar
		  scrollbar: {
			el: ".tp-scrollbar",
			clickable: true,
		},
		// Navigation arrows
		navigation: {
			nextEl: '.test-prev',
			prevEl: '.test-next',
		},
	  });
	////////////////////////////////////////////////////
	// 13. Swiper Js
	const testi3swiper = new Swiper('.tp-testimonial-3__active', {
		// Optional parameters
		loop: true,
		slidesPerView: 1,
		arrows:true,
		autoplay:false,
		spaceBetween: 30,
		breakpoints: {
			'1200': {
				slidesPerView: 2,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
				arrows:false,
			},
			'0': {
				slidesPerView: 1,
				arrows:false,
			},
		},

		  // scrollbar
		  scrollbar: {
			el: ".tp-scrollbar",
			clickable: true,
		},
		// Navigation arrows
		navigation: {
			nextEl: '.test-prev',
			prevEl: '.test-next',
		},
		pagination: {
			el: ".tp-testimonial-slider-dots",
			clickable:true,
		  },
	  });
	////////////////////////////////////////////////////
	// 13. Swiper Js
	const donationswiper = new Swiper('.tp-donate__active', {
		// Optional parameters
		loop: true,
		slidesPerView: 1,
		arrows:true,
		autoplay:false,
		spaceBetween: 30,
		breakpoints: {
			'1200': {
				slidesPerView: 3,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 1,
				arrows:false,
			},
			'0': {
				slidesPerView: 1,
				arrows:false,
			},
		},

		  // scrollbar
		  scrollbar: {
			el: ".tp-scrollbar",
			clickable: true,
		},
		// Navigation arrows
		navigation: {
			nextEl: '.test-prev',
			prevEl: '.test-next',
		},
	  });

	////////////////////////////////////////////////////
	// 13. Swiper Js
	const tpslider3 = new Swiper('.tp-slider-3__active', {
		loop: true,
		slidesPerView: 1,
		arrows:true,
		autoplay:true,
		effect:'fade',
		breakpoints: {
			'1200': {
				slidesPerView: 1,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
				arrows:false,
			},
			'0': {
				slidesPerView: 1,
				arrows:false,
			},
		},
		// Navigation arrows
		navigation: {
			nextEl: '.test-prev',
			prevEl: '.test-next',
		},
	  });
	////////////////////////////////////////////////////
	// 13. Swiper Js
	const tpslider = new Swiper('.tp-slider__active', {
		loop: true,
		slidesPerView: 1,
		arrows:true,
		autoplay:true,
		effect:'fade',
		breakpoints: {
			'1200': {
				slidesPerView: 1,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
				arrows:false,
			},
			'0': {
				slidesPerView: 1,
				arrows:false,
			},
		},
		// Navigation arrows
		navigation: {
			prevEl: '.slider-prev',
			nextEl: '.slider-next',
		},
	  });



	// 20. Show Login Toggle Js
	$('#showlogin').on('click', function () {
		$('#checkout-login').slideToggle(900);
	});

	/*-------------------------

		showcoupon toggle function

	--------------------------*/

	$('#showcoupon').on('click', function () {

		$('#checkout_coupon').slideToggle(900);

	});


	/*-------------------------

		Create an account toggle function

	--------------------------*/

	$('#cbox').on('click', function () {

		$('#cbox_info').slideToggle(900);

	});



	/*-------------------------

		Create an account toggle function

	--------------------------*/

	$('#ship-box').on('click', function () {

		$('#ship-box-info').slideToggle(1000);

	});


	////////////////////////////////////////////////////
	// 15. MagnificPopup video view Js
	$(".popup-video").magnificPopup({
	   type: "iframe",
    });

	////////////////////////////////////////////////////
	//26.isotope
	$('.grid').imagesLoaded(function () {
		// init Isotope
		var $grid = $('.grid').isotope({
			itemSelector: '.grid-item',
			percentPosition: true,
			layoutMode: 'fitRows',
			masonry: {
				// use outer width of grid-sizer for columnWidth
				columnWidth: 1,
			},
			
		});
		

		// filter items on button click
		$('.masonary-menu').on('click', 'button', function () {
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({ 
				filter: filterValue,
				animationOptions: {
					duration: 10000,
					easing: "linear",
					queue: true
				}
			});
			
		});

		//for menu active class
		$('.masonary-menu button').on('click', function (event) {
			$(this).siblings('.active').removeClass('active');
			$(this).addClass('active');
			event.preventDefault();
		});

	});	
 

	////////////////////////////////////////////////////
	// 03. Search Js
	$(".search-open-btn").on("click", function () {
		$(".search__popup").addClass("search-opened");
	});
		
	$(".search-close-btn").on("click", function () {
		$(".search__popup").removeClass("search-opened");
	});
	
	////////////////////////////////////////////////////
	// 16. Cart Quantity Js
	$('.tp-cart-minus').on('click', function () {
		var $input = $(this).parent().find('input');
		var count = Number($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});

	$('.tp-cart-plus').on('click', function () {
		var $input = $(this).parent().find('input');
		$input.val(Number($input.val()) + 1);
		$input.change();
		return false;
	});


	/* Price filter active */

	if ($("#slider-range").length) {

		$("#slider-range").slider({

			range: true,

			min: 0,

			max: 500,

			values: [75, 300],

			slide: function (event, ui) {

				$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);

			}

		});

		$("#amount").val("$" + $("#slider-range").slider("values", 0) +

			" - $" + $("#slider-range").slider("values", 1));

		$('#filter-btn').on('click', function () {

			$('.filter-widget').slideToggle(1000);

		});

	}


	function tp_ecommerce() {
		$('.tp-cart-minus').on('click', function () {
			var $input = $(this).parent().find('input');
			var count = parseInt($input.val()) - 1;
			count = count < 1 ? 1 : count;
			$input.val(count);
			$input.change();
			return false;
		});
	
		$('.tp-cart-plus').on('click', function () {
			var $input = $(this).parent().find('input');
			$input.val(parseInt($input.val()) + 1);
			$input.change();
			return false;
		});
	
		

		$('.tp-checkout-payment-item label').on('click', function () {
			$(this).siblings('.tp-checkout-payment-desc').slideToggle(400);
			
		});
		

		$('.tp-color-variation-btn').on('click', function () {
			$(this).addClass('active').siblings().removeClass('active');
		});
		

		$('.tp-size-variation-btn').on('click', function () {
			$(this).addClass('active').siblings().removeClass('active');
		});
	
		////////////////////////////////////////////////////
		// 17. Show Login Toggle Js
		$('.tp-checkout-login-form-reveal-btn').on('click', function () {
			$('#tpReturnCustomerLoginForm').slideToggle(400);
		});
	
		////////////////////////////////////////////////////
		// 18. Show Coupon Toggle Js
		$('.tp-checkout-coupon-form-reveal-btn').on('click', function () {
			$('#tpCheckoutCouponForm').slideToggle(400);
		});
	
		////////////////////////////////////////////////////
		// 19. Create An Account Toggle Js
		$('#cbox').on('click', function () {
			$('#cbox_info').slideToggle(900);
		});
	
		////////////////////////////////////////////////////
		// 20. Shipping Box Toggle Js
		$('#ship-box').on('click', function () {
			$('#ship-box-info').slideToggle(1000);
		});

	}
	tp_ecommerce();
	
	// 08. Nice Select Js
	$('select').niceSelect();


	if($('.tp-main-menu-content').length && $('.tp-main-menu-mobile').length){
		let navContent = document.querySelector(".tp-main-menu-content").outerHTML;
		let mobileNavContainer = document.querySelector(".tp-main-menu-mobile");
		mobileNavContainer.innerHTML = navContent;
	
	
		let arrow = $(".tp-main-menu-mobile .has-dropdown > a");
	
		arrow.each(function () {
			let self = $(this);
			let arrowBtn = document.createElement("BUTTON");
			arrowBtn.classList.add("dropdown-toggle-btn");
			arrowBtn.innerHTML = "<i class='fal fa-angle-right'></i>";
	
			self.append(function () {
			  return arrowBtn;
			});
	
			self.find("button").on("click", function (e) {
			  e.preventDefault();
			  let self = $(this);
			  self.toggleClass("dropdown-opened");
			  self.parent().toggleClass("expanded");
			  self.parent().parent().addClass("dropdown-opened").siblings().removeClass("dropdown-opened");
			  self.parent().parent().children(".tp-submenu").slideToggle();
			});
	
		});
	}


})(jQuery);