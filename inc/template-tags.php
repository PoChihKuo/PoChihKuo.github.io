<?php

/**

 * 
 * @package the-gap
 * @since   1.0.0
 */

/**
 * Prints the current post-date/time and author information.
 */
if ( ! function_exists( 'the_gap_posted_on' ) ) :
function the_gap_posted_on() {
	
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	/* translators: author */
	$byline = sprintf(_x( 'By %s', 'post author', 'the-gap' ),'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>');
	
	echo '<span class="posted-on">' . esc_html( get_the_date()) . '</span><span class="byline"> ' . wp_kses_post($byline). '</span>';
	
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'the-gap' ), __( '1 Comment', 'the-gap' ), __( '% Comments', 'the-gap' ) );
		echo '</span>';
	}

}
endif;



if ( ! function_exists( 'the_gap_single_posted_on' ) ) :
function the_gap_single_posted_on() {
	
	$get_time = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$get_time = '<time class="entry-date published" datetime="%1$s">%2$s</time>
		<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$get_time = sprintf( $get_time,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	/* translators: post publishing date */
	$posted_on = sprintf(esc_html_x( 'Posted on %s', 'post date', 'the-gap' ),'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . esc_html( get_the_date() ) . '</a>');
	
	
	
	$byline = sprintf(
	/* translators: author */
		esc_html_x( 'By %s', 'post author', 'the-gap' ),
		'<span class="author vcard"><a class="url fn n" 
		href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' 
		. esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . wp_kses_post($posted_on) . '</span><span class="byline"> ' 
	. wp_kses_post($byline) . '</span>';

	echo '<span class="comments-link">';
	comments_popup_link( esc_html__( 'No Comment', 'the-gap' ), esc_html__( '1 Comment', 'the-gap' ), esc_html__( '% Comments', 'the-gap' ) );
	echo '</span>';

}
endif;


if ( ! function_exists( 'the_gap_single_posted_meta' ) ) :
function the_gap_single_posted_meta() {

	$byline = sprintf(
	/* translators: author */
		esc_html_x( 'By %s', 'post author', 'the-gap' ),
		'<span class="author vcard"><a class="url fn n" 
		href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' 
		. esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' 
	. wp_kses_post($byline) . '</span>';

	
}
endif;

if ( ! function_exists( 'the_gap_single_posted_meta_time_author' ) ) :
function the_gap_single_posted_meta_time_author() {
	
	$get_time = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$get_time = '<time class="entry-date published" datetime="%1$s">%2$s</time>
		<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$get_time = sprintf( $get_time,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	/* translators: post publishing date */
	$posted_on = sprintf(esc_html_x( 'On %s', 'post date', 'the-gap' ),'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . esc_html( get_the_date() ) . '</a>');
	
	
	
	$byline = sprintf(
	/* translators: author */
		esc_html_x( 'By %s', 'post author', 'the-gap' ),
		'<span class="author vcard"><a class="url fn n" 
		href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' 
		. esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . wp_kses_post($posted_on) . '</span><span class="byline"> ' 
	. wp_kses_post($byline) . '</span>';
	
}
endif;

if ( ! function_exists( 'the_gap_single_posted_time' ) ) :
function the_gap_single_posted_time() {
	
	
	$get_time = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$get_time = '<time class="entry-date published" datetime="%1$s">%2$s</time>
		<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$get_time = sprintf( $get_time,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	/* translators: post publishing date */
	$posted_on = sprintf(esc_html_x( 'Posted on %s', 'post date', 'the-gap' ),'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . esc_html( get_the_date() ) . '</a>');
	
	echo '<span class="posted-on">' . wp_kses_post($posted_on) . '</span>';
	
}
endif;
/*---------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'the_gap_entry_footer' ) ) :

function the_gap_entry_footer() {
	
	
	$byline = sprintf(
	/* translators: author */
		esc_html_x( 'By %s', 'post author', 'the-gap' ),
		'<span class="author vcard"><a class="url fn n" 
		href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' 
		. esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' 
	. wp_kses_post($byline) . '</span>';
	

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: comment link */
		comments_popup_link( sprintf( wp_kses( __( 'No Comment<span class="screen-reader-text"> on %s</span>', 'the-gap' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
	
		sprintf(
			/* translators: edit link */
			esc_html__( 'Edit %s', 'the-gap' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;


if ( ! function_exists( 'the_gap_single_entry_footer' ) ) :

function the_gap_single_entry_footer() {
	
	
	$byline = sprintf(
	/* translators: author */
		esc_html_x( 'By %s', 'post author', 'the-gap' ),
		'<span class="author vcard"><a class="url fn n" 
		href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' 
		. esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' 
	. wp_kses_post($byline) . '</span>';
	

	
		echo '<span class="comments-link">';
		/* translators: comment link */
		comments_popup_link( sprintf( wp_kses( __( 'No Comment<span class="screen-reader-text"> on %s</span>', 'the-gap' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	

	edit_post_link(
		sprintf(
			/* translators: edit link */
			esc_html__( 'Edit %s', 'the-gap' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;


/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
 
function the_gap_blog_categorized() {
	if ( false === ( $all_cats = get_transient( 'the_gap_categories' ) ) ) {
		
		$all_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		) );

		
		$all_cats = count( $all_cats );

		set_transient( 'the_gap_categories', $all_cats );
	}

	if ( $all_cats > 1 ) {
		
		return true;
	} else {
		
		return false;
	}
}


// post queries


function the_gap_post_queries( $query ) {
  
  if (!is_admin() && $query->is_main_query() ){
	  
	  
	
	$blog_categories = get_theme_mod('the_gap_index_category_control','');
	
	
	$query->set( 'cat', $blog_categories );
	
	$exclde = get_theme_mod('exclude-category');
	
	if ($exclde != ''){
		
	$exclde_categories = explode(',', $exclde);
	
	$exclude_cats ='';
	$exclude_categories = array();
	
	foreach($exclde_categories as $exclde_cat){
		
		$exclde_cats = get_cat_ID($exclde_cat);
		$exclude_cats = '-';
		$exclude_cats .= $exclde_cats;
		$exclude_categories[] = $exclude_cats;
	
	}
	
	$query->set( 'category__not_in', $exclude_categories );
	}

  }
}
add_action( 'pre_get_posts', 'the_gap_post_queries' );


/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Flush out the transients used in the_gap_blog_categorized.
 */
function the_gap_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	
	delete_transient( 'the_gap_categories' );
}
add_action( 'edit_category', 'the_gap_category_transient_flusher' );
add_action( 'save_post',     'the_gap_category_transient_flusher' );
