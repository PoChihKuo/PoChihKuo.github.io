<?php
/**
 * Search form Template
 *

 */

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	
	<input type="search" class="search-field" 
	placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 
	'the-gap' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	
	<button type="submit" class="search-submit">
	
		<i class="fa fa-search"></i>
			<span class="screen-reader-text">
				<?php echo esc_html_x( 'Search', 'submit button', 'the-gap' ); ?>
			</span>
			
	</button>

</form>

