<?php

/**
 * Template part for displaying page content in page.php
 * 
 * @package the-gap
**/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<!-- Content area of the page  -->
	<div class="page-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links clear">' . esc_html__( 'Pages:', 'the-gap' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

<!-- Edit link to edit page  -->
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="page-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'the-gap' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
