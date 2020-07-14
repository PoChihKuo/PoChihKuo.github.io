<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * 
 * @package the-gap
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'the-gap' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			
			<p><?php printf(/* translators: new post link*/ wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'the-gap' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, we couldn\'t find the term you\'re looking for. Please try again with some different keywords.', 'the-gap' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'the-gap' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
