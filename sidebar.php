<?php 

/**
 * 
 *
 * @package: the-gap
 */

?>

<!-- BEGIN sidebar -->
<?php 
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}?>
<aside id="secondary" class="sidebar" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'the-gap' ); ?>">
	<?php
   
        dynamic_sidebar( 'sidebar-1' ); 
  
		?>
   	

	
</aside>
<!-- END sidebar -->
