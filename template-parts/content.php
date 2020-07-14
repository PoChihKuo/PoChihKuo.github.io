<?php

/**
 * Template part for displaying posts
 *
 * 
 * @package The Gap
**/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php

	$hcstyle = '';
	
	$post_style = get_theme_mod('post_style','style1');
	$col_no = get_theme_mod('post_column_no','1a');
	if ($col_no == '1a')
	{
		$post_style = 'style2';
	}
	
	if ($post_style == 'style2'){
		if (has_post_thumbnail()){
	
			$hcstyle .= "thumb";				
		}else {
			$hcstyle .= "w_thumb";	
		}
	}
?>
	<div class="post-thumbnail <?php echo esc_attr($hcstyle); ?>">

			<?php	
			if( has_post_thumbnail()) {
				
				$thumbnail_sizes = get_theme_mod( 'thumbnail-sizes','full'); ?>
				<div class="post-thumbnail-img">
				<?php the_post_thumbnail($thumbnail_sizes); ?>
				<div class="entry-date-abs">
			<?php the_time( get_option( 'date_format' ) ); ?>
			</div>	
				</div>
			
			<?php } ?>

	</div>
	
	<div class="header-content <?php echo esc_attr($hcstyle); ?>">
	<header class="entry-header">
		<div class="title-meta">
		 <!-- To display categories on the top of the post title -->
			<?php echo wp_kses_post(get_the_category_list());?>
		
		<!-- To display titles of blog post -->
		<?php
		
		$post_style = get_theme_mod('post_style','style1');
		$col_no = get_theme_mod('post_column_no','1a');
		if ($col_no == '1a')
		{
			$post_style = 'style2';
		}
		
		if ( is_single() ){
			the_title( '<h1 class="entry-title">', '</h1>' );
		}
		
		elseif (( is_home() || is_front_page()) && ($col_no == '2'|| $col_no == '3' || $post_style ='style2')){
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		
		}
		else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		
		}
		// To display meta of blog post -->	
		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php the_gap_posted_on(); ?>
			</div>
			<?php
		endif; ?>
		
		
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php $excerpt = get_theme_mod('enable-excerpt','1');
			if (($excerpt == '1')) {  
				the_excerpt();
						
			} else {			
						the_content( sprintf( 
						__( 'Continue reading%s', 'the-gap' ), 
					'<span class="screen-reader-text">  '.get_the_title().'</span>' ) );
			}	?>							
	</div> <!-- end entry content -->
	</div> <!-- end header content -->

	<footer class="entry-footer">
	<?php if ( 'post' === get_post_type() ) {
	$get_tags = get_the_tag_list( '', esc_html__( ', ', 'the-gap' ) );
		if ( $get_tags ) {
			printf(/* translators: tag link*/ '<div class="tags-links">' . esc_html__( 'Tagged %1$s', 'the-gap' ) . '</div>', wp_kses_post($get_tags)); // WPCS: XSS OK.
		}
	}?>
	</footer><!-- entry footer -->

</article><!-- #post-## -->

