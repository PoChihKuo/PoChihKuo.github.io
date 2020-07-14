;(function($) {

   'use strict'
   
   
	var scrollUp = function() {
		$(window).scroll(function() {
			if ( $(this).scrollTop() > 850 ) {
				$('#scroll-up').addClass('visible');
			} else {
				$('#scroll-up').removeClass('visible');
			}
		});

		$('#scroll-up').on('click', function() {
			$("html, body").animate({ scrollTop: 0 }, 900);
			return false;
		});
	};
	
	var onePage = function() {
		
		jQuery(function($) {
			
			$('#main-navigation a[href*="#"]').on('click',function (e) {
			
			var target = this.hash;
			var $target = $(target);
			$('#main-navigation a[href*="#"]').addClass('active');

			if ( $target.length ) {
				e.preventDefault();
				$('html, body').animate({
					'scrollTop': $target.offset().top - 100
				}, 900, 'swing');
				
				
			}
			
			});
			
		});
	};
	
		var responsiveMenu = function() {
		

		$(window).on('load resize', function() {
			
				if ( window.innerWidth <= 1024 ) {
					
					
					$('#main-navigation').removeClass('main-menu');
					$('#main-navigation').addClass('mob-nav');
					$('#main-navigation.mob-nav').hide();
					$('#main-navigation.mob-nav .sub-menu').hide();
					
					$('#main-navigation.mob-nav').find( '.menu-item-has-children > a' ).after('<button class="submenu-btn"></button>');
					
					$('.menu-btn').removeClass('focus');
					$('.menu-btn').show();
					
				} else {
					
					$('#main-navigation').addClass('main-menu');
					$('#main-navigation').removeClass('mob-nav');
					$('#main-navigation.main-menu').show();
					$('#main-navigation.mob-nav .submenu').removeAttr('style');
					$('.hide-mob-menu').removeClass('show');
					$('.submenu-btn').remove();
					$('.menu-btn').hide();
				}
			
			});
			
				$('.menu-btn').on('click', function() {
					var headerFix = $('#site-header').offset().top;
					$('#main-navigation.mob-nav').slideToggle(300);
					$(this).toggleClass('focus');
					$(this).offset().top = headerFix;
					$('.hide-mob-menu').addClass('show');
					$('.hide-mob-menu-btm').addClass('show');
					
					
				});

				$(document).on('click', '#main-navigation.mob-nav li .submenu-btn', function(e) {
					$(this).toggleClass('focus');
					
					$(this).toggleClass('focus').next('ul').slideToggle(300);
					e.stopImmediatePropagation()
				});
				
				
				$('.hide-mob-menu').on('click', function() {
					$('#main-navigation.mob-nav').hide();
					
				});
				$('.hide-mob-menu-btm').on('click', function() {
					$('#main-navigation.mob-nav').hide();
					
				});
				
				
		};
	
		var searchToggle = function() {
			
			var icons = ['#main-navigation .search-icon','.prod-search-icon','.page-search-icon'];
			var containers = ['.search-container .nl-search-box','.search-container.woo .nl-search-box','.search-container.same .nl-search-box'];
			var hides = ['#main-navigation .hide-search-box','.search-container.woo .hide-search-box','.search-container.same .hide-search-box'];
			
			jQuery.each(icons, function (index, icon){
		
			jQuery(icon).on("click", function() {
				jQuery(containers[index]).toggleClass("visible");
					
				});
			});
			
			jQuery.each(hides, function (index, hide){
				jQuery(hide).on("click", function() {
			
					jQuery(containers[index]).toggleClass("visible");
				});
			});
			
		};
		
		
		var headerCart = function() {
		
			var headerCartLink = jQuery('.header-cart-container .header-cart-inner-container').children('a');

		    headerCartLink.on( 'focus', function(){
		        jQuery(this).parents('.header-cart-container').addClass('focus');
		    });
		    headerCartLink.on( 'focusout', function(){
		        jQuery(this).parents('.header-cart-container').removeClass('focus');
		    });
		};
		
		var menuFocus = function() {
		
			var menuFocusLink = jQuery('#main-navigation.main-menu ul li').children('a');

		    menuFocusLink.on( 'focus', function(){
		        jQuery(this).parents('#main-navigation.main-menu li').addClass('focused');
				
				
		    });
		    menuFocusLink.on( 'focusout', function(){
		        jQuery(this).parents('#main-navigation.main-menu li').removeClass('focused');
				
		    });
		};
		
		var menuToggle = function() {
			
		 jQuery(".sidebar-icon").click( function() {
		    
		    jQuery(".right-side-menu").toggleClass("visible");
		     
		  });
		 
		  jQuery(".hide-menu-toggle").click( function() {
			  
		    jQuery(".right-side-menu").removeClass("visible");
			
		    
		  });
		  
		};
		
		var mediaSlider = function() {
			var speed = $('#media_data').data('speed');
			if (speed == ''){speed = 5000;};
			var slidestyle = $('#media_data').data('slidestyle');
			if (slidestyle == ''){slidestyle = 'slide';};
			var sliders = ['.widget-slider.flexsliders','.media-slider.flexsliders'];
			$.each(sliders, function (index, slider){
			jQuery(slider).flexslider({
			animation: slidestyle,
			slideshowSpeed:speed,
			animationSpeed:600,
			pauseOnHover:false,
			controlNav:true,
			directionNav:true,
			animationLoop:true,
		});
		});
		};
		
		var featureSlider = function() {
			var speed = $('#feature_data').data('speed');
			var slidertype = $('#feature_data').data('slidertype');
			var slidestyle = $('#feature_data').data('slidestyle');
			if (speed == ''){speed = 5000;};
			
			if (slidertype == 'slide'){
			jQuery('.flexsliders.feature-slider').flexslider({
			animation: slidestyle,
			slideshowSpeed:speed,
			animationSpeed:600,
			pauseOnHover:false,
			controlNav:true,
			directionNav:true,
		});
			};
			
			if (slidertype == 'carousel'){
			jQuery('.flexsliders.feature-slider').flexslider({
			animation: slidestyle,
			slideshowSpeed:speed,
			animationSpeed:600,
			pauseOnHover:false,
			controlNav:false,
			directionNav:true,
			itemWidth:340,
			itemMargin:10,
			minItems:1,
			maxItems: 3,
			move: 1,
		});
			};
			
		};
		
		var productSlider = function() {
		jQuery('.product-slider').slick({
				infinite: true,
				slidesToShow: 1,
				autoplay: true,
				dots: true,
				arrows: true,
				centerMode: true,
				centerPadding: '0',
				autoplaySpeed: 2000
				
		});
		};
		
			var productBrand = function() {
		jQuery('.brand-items-container').slick({
			
			autoplay: true,
			 autoplaySpeed:2000,
			infinite: true,
			 arrows: true,
			 centerMode: true,
			centerPadding: '0',
			slidesToShow: 5,
				
				responsive: [
		 {
		  breakpoint: 1280,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '0',
			slidesToShow: 3
		  }
		},
		{
		  breakpoint: 1024,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '20px',
			slidesToShow: 2
		  }
		},
		{
		  breakpoint: 768,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '20px',
			slidesToShow: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: true,
			
			centerMode: true,
			centerPadding: '20px',
			slidesToShow: 1
		  }
		}
	  ]
	  
				
			});
			
		};	
		
		
		
		var productCarousel = function() {
			
		$( '.product_list_widget').each( function() {
			var $this = $( this );
			var number = $this.data('number');
			var enable = $this.data('enable');
			if (enable == 'slider'){
			jQuery(this).slick({
			 autoplay: true,
			 autoplaySpeed: 2000,
			infinite: true,
			 arrows: true,
			 centerMode: true,
	  centerPadding: '0',
	  slidesToShow:number,
	 
			
			responsive: [
		 {
		  breakpoint: 1280,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '0',
			slidesToShow: 3
		  }
		},
		{
		  breakpoint: 1024,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '0',
			slidesToShow: 2
		  }
		},
		{
		  breakpoint: 768,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '20px',
			slidesToShow: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: true,
			
			centerMode: true,
			centerPadding: '20px',
			slidesToShow: 1
		  }
		}
	  ]
		 });
			};
		});
		};	
	
	
		var headerAnimatetext = function() {
			 var mediatitle = $('#media_type').data('mediaheading');
			 var mediaanimate = $('#media_type').data('mediaanimate');
			if (mediaanimate == 'yes') {
			jQuery(".nl-media-ovr-title span").typed({
				strings: [mediatitle],
				typeSpeed:35,
				backDelay:3000,
				loop: true,
		
			});
			};
		};
		
		var videoAnimatetext = function() {
			 var videotitle = $('#videotype').data('videotxt');
			 var videoanimate = $('#videotype').data('videoanimate');
			if (videoanimate == 'yes') {
			jQuery(".video-media-ovr-title span").typed({
				strings: [videotitle],
				typeSpeed:35,
				backDelay:3000,
				loop: true,
		
			});
			};
		};
			
		var featureAnimatetext = function() {
			var enable = jQuery( 'h3.nl-slide-feature-title span').data('enable');
			if (enable == 'yes') {
			jQuery( 'h3.nl-slide-feature-title span').each( function() {
			var $this = $( this );
			
			 var featuretitle = $this.data('title');
			 
			
			jQuery(this).typed({
            strings: [featuretitle],
            typeSpeed:35,
			backDelay:3000,
			loop: true,
		
			});
			
			});
			};
		};
		
		
		
		
		var stickyHeader = function() {
			if (the_gap_sticky == 1)	{
				if (the_gap_headerAlign != 'inline'){
					
				if ($("#site-header").is('*')) {
					var elem = $('#site-header');
					var offset = elem.offset();
					
					var elcontent = $('#content');
					var offsets = elcontent.offset();
					var topValues =  offsets.top;
					
					var topValue =  offset.top + elem.height();
					var width = elem.width();
					
					$(window).on('load scroll', function() {
					var y = $(this).scrollTop();
					if (y >= topValues) {  
						if ($('#site-header').hasClass('fixed')){	 
						}else{
							$('#site-header').addClass('fixed');
							$('.topbar-text').addClass('fixed');
							$('.topbar-social').addClass('fixed');
							$('.branding').addClass('both');
							$('#main-navigation.main-menu').addClass('both');
							$('#main-navigation.main-menu').addClass('woo2');
							$('#main-navigation.main-menu').addClass('sameline');
							
							
							
							$('#site-header').css({
								top: '0px',
								
								width:width,
							});
							
							
							
							$('#site-header').animate({ 
								top: '0',
							}, 500, function() {	
							});
							
							
							
						}
					} else {	
						if ($('#site-header').hasClass('fixed')){	 	
							$('#site-header').removeClass('fixed');
							$('.topbar-text').removeClass('fixed');
							$('.topbar-social').removeClass('fixed');
							$('.branding').removeClass('both');
							$('#main-navigation.main-menu').removeClass('both');
							$('#main-navigation.main-menu').removeClass('woo2');
							$('#main-navigation.main-menu').removeClass('sameline');
							
		
							$('#site-header').fadeOut('fast', function(){ 
							$('#site-header').fadeIn('fast');
							});
						}
					}
				});
			}
			
			} 
			
			
			}
		};
		
	$(function() {
		
	onePage();
	stickyHeader();
	scrollUp();
	menuToggle();
	responsiveMenu();
	searchToggle();
	headerCart();
	menuFocus();
	mediaSlider();
	featureSlider();
	productSlider();
	productBrand();
	headerAnimatetext();
	productCarousel();
	featureAnimatetext();
	videoAnimatetext();
	
	
	  	});
})(jQuery);