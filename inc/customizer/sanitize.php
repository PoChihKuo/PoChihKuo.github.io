<?php

/* ======================================================================== *
 * Customizer sanitize functions
 * ======================================================================== */


//Sanitize Text
function the_gap_sanitize_text( $value ) {
	
	return sanitize_text_field( $value );
	
}

//Sanitize Integer
function the_gap_sanitize_integer( $input ) {
		if( is_numeric( $input ) ) {
		return intval( $input );
	}
}

//Sanitize Checkboxes
function the_gap_sanitize_checkbox($input) {
	  if ( $input == 1 ) {
		 return '1';
	  } else {
		 return '';
	  }
}

//Sanitize Choices
function the_gap_sanitize_choices( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function the_gap_sanitize_widget_choices( $input) {
		
		$social_list = the_gap_fontawesome_social_list();
		$social_lists = array();
		foreach($social_list as $key=>$value){
			$social_lists[]= $key;
		}
 
    if ( in_array( $input, $social_lists ) ) {
        return $input;
    } else {
		return '';
	}
}


function the_gap_sanitize_sidebar( $input ) {
    if ( in_array( $input, array( 'default', 'rightbar', 'leftbar','nosidebar' ), true ) ) {
        return $input;
    }
}



function the_gap_sanitize_widget_style( $input ) {
    if ( in_array( $input, array( 'style1', 'style2', 'style3','style4','none'  ), true ) ) {
        return $input;
    }
}

function the_gap_sanitize_widget_align( $input ) {
    if ( in_array( $input, array( 'left', 'center' ), true ) ) {
        return $input;
    }
}

// Topbar Social Link target
 function the_gap_sanitize_social_link_target( $input ) {
    if ( in_array( $input, array( '_self', '_blank'), true ) ) {
        return $input;
    }
}

// sanatize text
function the_gap_sanitize_text2( $input ) {
    return wp_kses_post( force_balance_tags( esc_attr($input) ) );
}



function the_gap_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}



 


 
 	
		

	
	


