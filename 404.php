<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * 
 * @package the-gap
 */

get_header(); ?>

<div class="page-content-header">
    <div class="inner-content">	 <!-- inner-container of page header -->   
	
		<div class="entry-header"> <!-- page title of page -->  
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</div><!-- entry-header end  -->
		
    </div>	<!-- header inner content end -->
	
	
</div><!-- page header end -->

<div id="inner-content" class="inner-content"> <!-- inner-container of page content area -->  

	<div id="primary" class="content-area"> <!-- primary area(except sidebar) of page content area -->  
	

		<main id="main" class="site-main" role="main"> <!-- main content of page --> 

			<section class="error-404 not-found">
				<header class="alert-container">
					<h2 class="alert-title"><?php esc_html_e( 'Sorry, we couldn\'t find the page you\'re looking for.', 'the-gap' ); ?></h2>
				</header><!-- .page-header -->
				<div class="alert-description">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'the-gap' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- page-content end-->
			</section><!-- error-404 end-->

		</main><!-- #main end-->
	</div><!-- #primary end-->

</div><!-- inner-content end-->
<?php get_footer(); ?>
