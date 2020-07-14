

(function( $ ) {
 
    wp.customize.bind( 'ready', function() { // Ready?

    var customize = this; // Customize object alias.
	
	
	var titleControls = customize.section( 'site-title' ).controls();
		titleControls.splice(0,1);
		
	
	var logoOnly = ['logo-heading','custom_logo'];
	var titleOnly = ['blogname','site-title-text-color','site-title-color-heading','site-title-text-color-opacity','site-title-font-size','site-title-font-heading','site-title-font-family',
			'site-title-line-height','site-title-letter-spacing',
			'site-title-font-weight','site-title-font-style','site-title-transformation'];
	
	
	
	
	customize( 'site-title-type', function( value ) {
		
		
		value.bind( function( newval ) {
		

		if ( 'three' == newval ) {	
		
			
			_.each(titleControls , function(titleControl){
					var setting = titleControl.id;
				customize.control(setting).deactivate({duration: 0});

			});
	
		}

	
	if ( 'one' == newval ) {	
		
		_.each(the_gap_title_only, function(title){
					
				customize.control(title).activate({duration: 0});

			});
			
		_.each(logoOnly, function(logocontrol){
			
				customize.control(logocontrol).deactivate({duration: 0});

		});
		
	}
		
	if ( 'two' == newval ) {	
		
			
		_.each(the_gap_title_only, function(title){
					
				customize.control(title).deactivate({duration: 0});

			});
			
		_.each(logoOnly, function(logocontrol){
			
				customize.control(logocontrol).activate({duration: 0});

		});
		
		
	}
	
	
	
	    });
		
	});

	//header media type
	
	var headerImages = customize.section( 'header_image' ).controls();
		headerImages.splice(0,1);
		
	
	customize( 'header-media-type', function( value ) {
		
		
		value.bind( function( newval ) {
		

		if ( 'none' == newval ) {	
		
			
			_.each(headerImages , function(headerImage){
					var setting = headerImage.id;
				customize.control(setting).deactivate({duration: 0});

			});
	
		}

	
	if ( 'image' == newval ) {	
		
		
					
			_.each(headerImages , function(headerImage){
					var setting = headerImage.id;
				customize.control(setting).deactivate({duration: 0});

			});
			
			
			
			_.each(the_gap_media_image_only, function(the_gap_media_image){
			
				customize.control(the_gap_media_image).activate({duration: 0});

			});
			
	
	}
		
	if ( 'video' == newval ) {	
		
		_.each(headerImages , function(headerImage){
					var setting = headerImage.id;
				customize.control(setting).deactivate({duration: 0});

			});
			
			
			
			_.each(the_gap_media_video_only, function(the_gap_media_video){
			
				customize.control(the_gap_media_video).activate({duration: 0});

			});
			
		
		
	}
	
		if ( 'slide' == newval ) {	
		
		_.each(headerImages , function(headerImage){
					var setting = headerImage.id;
				customize.control(setting).deactivate({duration: 0});

			});
			
			
			
			_.each(the_gap_media_slide_only, function(the_gap_media_slide){
			
				customize.control(the_gap_media_slide).activate({duration: 0});

			});
	
	}
	
	
	
	    });
		
	});
	
		
		
		wp.customize( 'site-background-type' ,function( value ) {
		
			value.bind( function( newval ) {
				
				if(newval == 'one'){
					
				customize.control('background_color').activate({duration: 0});
				
				customize.control('site-background-color-heading').activate({duration: 0});
				
				customize.control('background_image').deactivate({duration: 0});
				customize.control('site-content-background-color').activate({duration: 0});
				customize.control('site-content-text-color').activate({duration: 0});
				customize.control('site-content-background-color-opacity').activate({duration: 0});
				customize.control('site-content-text-color-opacity').activate({duration: 0});
				customize.control('site-content-link-color').activate({duration: 0});
				
				}
				
				if(newval == 'two'){
					customize.control('background_image').activate({duration: 0});
					customize.control('background_color').deactivate({duration: 0});
					customize.control('site-background-color-heading').deactivate({duration: 0});
					customize.control('site-content-background-color-opacity').deactivate({duration: 0});
					customize.control('site-content-text-color-opacity').deactivate({duration: 0});
					customize.control('site-content-background-color').deactivate({duration: 0});
					customize.control('site-content-text-color').deactivate({duration: 0});
					customize.control('site-content-link-color').deactivate({duration: 0});
				}
				
			
			
			} );
		
		});


		//SCROLL UP 
		var scrollUp = customize.section( 'scroll-up' ).controls();
		scrollUp.splice(0,1);
		
		wp.customize( 'hide-scrollup' ,function( value ) {
					
	
			value.bind( function( newval ) {
				if (newval == 1){
		_.each( scrollUp, function ( controlsetting ) {
					var setting = controlsetting.id;
					
				customize.control(setting).deactivate({duration: 0});
				
					});
				}
						if (newval != 1){
		_.each( scrollUp, function ( controlsetting ) {
					var setting = controlsetting.id;
					
				customize.control(setting).activate({duration: 0});
				
					});
				}
		} );
	});	
		
		
	// PAGING 


	
	var paginations = customize.section( 'pagination' ).controls();
		paginations.splice(0,1);
		
		
		
		wp.customize( 'hide-paging' ,function( value ) {
					

			value.bind( function( newval ) {
				if (newval == 1){
		_.each( paginations, function ( controlsetting ) {
					var setting = controlsetting.id;
					
				customize.control(setting).deactivate({duration: 0});
				
					});
				}
				
				
						if (newval != 1){
		_.each( paginations, function ( controlsetting ) {
					var setting = controlsetting.id;
					
				customize.control(setting).activate({duration: 0});
				
					});
					
				}
				
				
				
		} );
	});	
		


	

	
	//ENABLE SITE LAYOUT

var sitelayouts = customize.section( 'site-layout' ).controls();
		sitelayouts.splice(0,1);
	
	wp.customize( 'site-layout' ,function( value ) {
					

			value.bind( function( newval ) {
				
				if (newval == 'full-width'){
		_.each( sitelayouts, function ( controlsetting ) {
					var setting = controlsetting.id;
					
				customize.control(setting).deactivate({duration: 0});
				
					});
				}
				
				
				if (newval == 'boxed'){
		_.each( sitelayouts, function ( controlsetting ) {
					var setting = controlsetting.id;
					
				customize.control(setting).activate({duration: 0});
				
					});
						

					
				}
				
				
				
		} );
	});	
	
	
	// TOPBAR SECTION
	
	
	var topbarControls = ['topbar-layout','topbar-color-heading','topbar-background-color','topbar-background-color-opacity','topbar-border-heading',
	'topbar-bottom-border-color','topbar-bottom-border-color-opacity','topbar-bottom-border-width','topbar-bottom-border-style'];
	
	// Enable Topbar
	customize('hide-topbar',function( value ) {
		value.bind( function( newval ) {
			if ( 1 == newval) {
			
			_.each(topbarControls , function(topbarControl){
			
				customize.control(topbarControl).deactivate({duration: 0});
				

				});
			customize.section( 'topbar-contact' ).deactivate({duration: 0});
			customize.section( 'topbar-social' ).deactivate({duration: 0});
			
			}
			else {
			var headerAlign = wp.customize.instance('site-header-alignment').get();
			_.each(topbarControls , function(topbarControl){
			
				customize.control(topbarControl).activate({duration: 0});
				

				});
				
				if (headerAlign == 'center'){
					
					customize.control('topbar-layout').deactivate({duration: 0});
				
				}else {
				
					customize.control('topbar-layout').activate({duration: 0});
			
				}
				
			customize.section( 'topbar-contact' ).activate({duration: 0});
			customize.section( 'topbar-social' ).activate({duration: 0});
			}
		} );
	});
	
	
	customize('site-header-alignment',function( value ) {
		
		value.bind( function( newval ) {
			
			var hideTopbar = wp.customize.instance('hide-topbar').get();
			if (hideTopbar != 1){
				if ( 'center' == newval) {
			
			
				customize.control('topbar-layout').deactivate({duration: 0});
				
			
				}
				else {
			
				customize.control('topbar-layout').activate({duration: 0});
				
			
				}
			
			
				
			}
		} );
	});

	
	
	// topbar contact
	
	
		wp.customize( 'contact-number' ,function( value ) {
					

			
				value.bind( function( newval ) {
					
					if (newval == 1){
						
					for (i = 1; i < 2; i++) { 
						var contact = 'topbar-contact-input' + i;
						customize.control(contact).activate({duration: 0});
					}
					for (i = 1; i < 2; i++) { 
						var contact = 'topbar-contact-icon' + i;
						customize.control(contact).activate({duration: 0});
					}
					for (i = 1; i < 2; i++) { 
						var contact = 'topbar-text-url' + i;
						customize.control(contact).activate({duration: 0});
					}
					
					customize.control('topbar-contact-input2').deactivate({duration: 0});
					customize.control('topbar-contact-icon2').deactivate({duration: 0});
					customize.control('topbar-text-url2').deactivate({duration: 0});
					customize.control('topbar-contact-input3').deactivate({duration: 0});
					customize.control('topbar-contact-icon3').deactivate({duration: 0});
					customize.control('topbar-text-url3').deactivate({duration: 0});
					
					}
					
					if (newval == 2){
						
					for (i = 1; i < 3; i++) { 
						var contact = 'topbar-contact-input' + i;
						customize.control(contact).activate({duration: 0});
					}
					for (i = 1; i < 3; i++) { 
						var contact = 'topbar-contact-icon' + i;
						customize.control(contact).activate({duration: 0});
					}
					for (i = 1; i < 3; i++) { 
						var contact = 'topbar-text-url' + i;
						customize.control(contact).activate({duration: 0});
					}
					
					customize.control('topbar-contact-input3').deactivate({duration: 0});
					customize.control('topbar-contact-icon3').deactivate({duration: 0});
					customize.control('topbar-text-url3').deactivate({duration: 0});
					
					}
					
					
					if (newval == 3){
					for (i = 1; i < 4; i++) { 
						var contact = 'topbar-contact-input' + i;
						customize.control(contact).activate({duration: 0});
					}
					for (i = 1; i < 4; i++) { 
						var contact = 'topbar-contact-icon' + i;
						customize.control(contact).activate({duration: 0});
					}
					customize.control('topbar-text-url3').activate({duration: 0});
					}
					
					
				});
		
			});
	
		// topbar social


	wp.customize( 'social-number' ,function( value ) {
					

			
				value.bind( function( newval ) {
					
				if (newval == '2'){
					for (i = 1; i < 3; i++) { 
						var social = 'topbar-social-url' + i;
						customize.control(social).activate({duration: 0});
					}
					for (i = 1; i < 3; i++) { 
						var social = 'topbar-social-icon' + i;
						customize.control(social).activate({duration: 0});
					}
					for (i = 3; i < 9; i++) { 
						var social = 'topbar-social-url' + i;
						customize.control(social).deactivate({duration: 0});
					}
					for (i = 3; i < 9; i++) { 
						var social = 'topbar-social-icon' + i;
						customize.control(social).deactivate({duration: 0});
					}
				}
					
					
				if (newval == 3){
					for (i = 1; i < 4; i++) { 
						var social = 'topbar-social-url' + i;
						customize.control(social).activate({duration: 0});
					}
					for (i = 1; i < 4; i++) { 
						var social = 'topbar-social-icon' + i;
						customize.control(social).activate({duration: 0});
					}
					for (i = 4; i < 9; i++) { 
						var social = 'topbar-social-url' + i;
						customize.control(social).deactivate({duration: 0});
					}
					for (i = 4; i < 9; i++) { 
						var social = 'topbar-social-icon' + i;
						customize.control(social).deactivate({duration: 0});
					}
				}
					
				if (newval == 4){
					for (i = 1; i < 5; i++) { 
						var social = 'topbar-social-url' + i;
						customize.control(social).activate({duration: 0});
					}
					for (i = 1; i < 5; i++) { 
						var social = 'topbar-social-icon' + i;
						customize.control(social).activate({duration: 0});
					}
					for (i = 5; i < 9; i++) { 
						var social = 'topbar-social-url' + i;
						customize.control(social).deactivate({duration: 0});
					}
					for (i = 5; i < 9; i++) { 
						var social = 'topbar-social-icon' + i;
						customize.control(social).deactivate({duration: 0});
					}
				}
					
				if (newval == 5){
					for (i = 1; i < 6; i++) { 
						var social = 'topbar-social-url' + i;
						customize.control(social).activate({duration: 0});
					}
					for (i = 1; i < 6; i++) { 
						var social = 'topbar-social-icon' + i;
						customize.control(social).activate({duration: 0});
					}
					
					for (i = 6; i < 9; i++) { 
						var social = 'topbar-social-url' + i;
						customize.control(social).deactivate({duration: 0});
					}
					for (i = 6; i < 9; i++) { 
						var social = 'topbar-social-icon' + i;
						customize.control(social).deactivate({duration: 0});
					}
				}
					
				if (newval == '6'){
					for (i = 1; i < 7; i++) { 
						var social = 'topbar-social-url' + i;
						customize.control(social).activate({duration: 0});
					}
					for (i = 1; i < 7; i++) { 
						var social = 'topbar-social-icon' + i;
						customize.control(social).activate({duration: 0});
					}
					
					for (i = 7; i < 9; i++) { 
						var social = 'topbar-social-url' + i;
						customize.control(social).deactivate({duration: 0});
					}
					for (i = 7; i < 9; i++) { 
						var social = 'topbar-social-icon' + i;
						customize.control(social).deactivate({duration: 0});
					}
				}
					
				
					
				if (newval == '7'){
					for (i = 1; i < 8; i++) { 
						var social = 'topbar-social-url' + i;
						customize.control(social).activate({duration: 0});
					}
					for (i = 1; i < 8; i++) { 
						var social = 'topbar-social-icon' + i;
						customize.control(social).activate({duration: 0});
					}
					
					for (i = 8; i < 9; i++) { 
						var social = 'topbar-social-url' + i;
						customize.control(social).deactivate({duration: 0});
					}
					for (i = 8; i < 9; i++) { 
						var social = 'topbar-social-icon' + i;
						customize.control(social).deactivate({duration: 0});
					}
					
				}
					
				if (newval == '8'){
					for (i = 1; i < 9; i++) { 
						var social = 'topbar-social-url' + i;
						customize.control(social).activate({duration: 0});
					}
					for (i = 1; i < 9; i++) { 
						var social = 'topbar-social-icon' + i;
						customize.control(social).activate({duration: 0});
					}
					
				}
				
					
		
				
					
		});
		
	});

	
	customize('ovr_heights',function( value ) {
		
		value.bind( function( newval ) {
			
			
			
			if ( 'all' == newval) {
		
				customize.control('header_ovl_style').deactivate({duration: 0});
			}
			else {
			
				customize.control('header_ovl_style').activate({duration: 0});
				
			
				}
			
		} );
	});
	




 });
 
})( jQuery );