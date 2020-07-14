<?php
/**
 * Post Related Functions.
 * @author  Kudrat E Khuda
 * @author url  themenextlevel.com
 * @package the-gap

 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// The Metabox class
class The_Gap_Post_Metaboxes {
	private $post_types;

	/**
	 * Metabox constructor
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		
		add_action( 'add_meta_boxes', array( $this, 'the_gap_add_custom_box' ));
		add_action( 'pre_post_update', array( $this, 'the_gap_save_custom_meta_more') );
		add_action( 'pre_post_update', array( $this, 'the_gap_save_custom_meta' ));
		
		
		// Load scripts for the metabox
		add_action( 'admin_enqueue_scripts', array( $this, 'the_gap_metabox_color_enqueue' ) );
		
		
	}
	
/**
 * Add Meta Box
 *
 */



public function the_gap_add_custom_box() {
	
	$id = array('nl-page-layout','nl-page-layout','display-slider-info','nl-hide-and-show','nl-hide-and-show');
	
	$title = array(__('Select Layout','the-gap'),__('Select Layout','the-gap'),__('Page Header','the-gap'),__('Page Header','the-gap'));
	
	$callback = array('the_gap_page_layout','the_gap_page_layout','the_gap_hide_and_show','the_gap_hide_and_show');
	
	$screen = array('page','post','page','post');
	
	$context = array('side','side','normal','normal');
	
	$priority = array('default','default','high','high');
	
	
	for($i=0; $i < 4; $i++) {
		
		
		add_meta_box( $id[$i], $title[$i], array( $this, $callback[$i] ), $screen[$i], $context[$i], $priority[$i]);
		
	}
	
}

/* ======================================================================== */
public function the_gap_get_default_page_layouts() {

	$page_layout = array(
		'default-layout' => array(
			'id'    => 'the_gap_page_layout',
			'value' => 'default',
			'label' => __( 'Default', 'the-gap' )
		),
		'rightbar'       => array(
			'id'    => 'the_gap_page_layout',
			'value' => 'rightbar',
			'label' => __( 'Rightbar', 'the-gap' )
		),
		'leftbar'        => array(
			'id'    => 'the_gap_page_layout',
			'value' => 'leftbar',
			'label' => __( 'Leftbar', 'the-gap' )
		),
		
		'center'         => array(
			'id'    => 'the_gap_page_layout',
			'value' => 'nosidebar',
			'label' => __( 'No Sidebar', 'the-gap' )
		)
	);

	return $page_layout;

}

/* ========================================================================
 *
 * Displays metabox to for select layout option
 *
 * ======================================================================== */
 
public function the_gap_page_layout() {
	global $post;

	$page_layout = $this->the_gap_get_default_page_layouts();
	

	// Use nonce for verification  
	
	wp_nonce_field( 'the_gap_meta_box_layout', 'the_gap_meta_box_layout_nonce' );

	foreach ( $page_layout as $field ) {
		$layout_meta = get_post_meta( $post->ID, $field['id'], true );
		if ( empty( $layout_meta ) ) {
			$layout_meta = 'default';
		}
		?>
        <label class="nl-post-format-icon">
            <input class="nl-post-format" type="radio" name="<?php echo esc_attr($field['id']); ?>" value="<?php echo esc_attr($field['value']); ?>" <?php checked( $field['value'], $layout_meta ); ?>/>
			<?php echo esc_html($field['label']); ?></label><br />
		<?php
	}
	
	
	
}

public function the_gap_hide_and_show() {
	global $post;

	wp_nonce_field( 'the_gap_theme_show_hide', 'the_gap_theme_show_hide_nonce' );
	
 $meta = get_post_meta( $post->ID );
	
		?>
    
	 
	<p>
	<label for="the_gap_hide_page_header">
            <input type="checkbox" name="the_gap_hide_page_header" id="the_gap_hide_page_header" value="yes" <?php if ( isset ( $meta['the_gap_hide_page_header'] ) ) checked( $meta['the_gap_hide_page_header'][0], 'yes' ); ?> />
            <?php esc_html_e( 'Hide Page Header', 'the-gap' )?>
        </label>
	</p>
	
	<p>
    <label for="the_gap_page_header_bg_color" class="the_gap_page_header_bg_color"><?php esc_html_e( 'Page Header Background Color', 'the-gap' )?></label>
    <input name="the_gap_page_header_bg_color" type="text" value="<?php if ( isset ( $meta['the_gap_page_header_bg_color'] ) ) echo esc_attr($meta['the_gap_page_header_bg_color'][0]); ?>" class="page_header_bg_color" />
	</p>
	
	
	
	<?php
}	



/* ========================================================================
 *
 * save the custom metabox data
 *
 * ======================================================================== */
public function the_gap_save_custom_meta( $post_id ) {

	$page_layout = $this->the_gap_get_default_page_layouts();

	if ( ! isset( $_POST['the_gap_meta_box_layout_nonce'] ) )              
			return $post_id;

	$nonce = sanitize_text_field( wp_unslash($_POST['the_gap_meta_box_layout_nonce']));

	if ( ! wp_verify_nonce( $nonce, 'the_gap_meta_box_layout' ) )
			return $post_id;

	// Stop WP from clearing custom fields on autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	$the_gap_post_type = '';
	if ( isset( $_POST['post_type'] ) ) {
		$the_gap_post_type = sanitize_text_field( wp_unslash( $_POST['post_type'] ) );
	}
	
	$posts_all = array('post', 'page');
	if (in_array($the_gap_post_type, $posts_all)) {
	
		if ( ! current_user_can( 'edit_post', $post_id ) || ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	}

	foreach ( $page_layout as $field ) {
		//Execute this saving function
		$old = get_post_meta( $post_id, $field['id'], true );
		
		$new = isset( $_POST[ $field['id'] ] ) ? sanitize_text_field( wp_unslash($_POST[ $field['id'] ])) : 'default';
		
		$new = the_gap_sanitize_sidebar(wp_unslash($new));
		
		if ( $new && $new != $old ) {
			update_post_meta( $post_id, $field['id'], $new );
		} elseif ( '' == $new && $old ) {
			delete_post_meta( $post_id, $field['id'], $old );
		}
	} // end foreach  
		
	
}



public function the_gap_save_custom_meta_more( $post_id ) {

	

	if ( ! isset( $_POST['the_gap_theme_show_hide_nonce'] ) )
			return $post_id;

		$nonce = sanitize_text_field( wp_unslash($_POST['the_gap_theme_show_hide_nonce']));

		if ( ! wp_verify_nonce( $nonce, 'the_gap_theme_show_hide' ) )
			return $post_id;
		
	// Stop WP from clearing custom fields on autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	$the_gap_post_type = '';
	if ( isset( $_POST['post_type'] ) ) {
		$the_gap_post_type = sanitize_text_field( wp_unslash( $_POST['post_type'] ) );
	}
	
	$posts_all = array('post', 'page');
	if (in_array($the_gap_post_type, $posts_all)) {
	
		if ( ! current_user_can( 'edit_post', $post_id ) || ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	}

	
		//Execute this saving function
	
		
		$old = get_post_meta( $post_id, 'the_gap_hide_page_header', true );
		if ( isset( $_POST['the_gap_hide_page_header'] ) ) {
			//the_gap_sanitize_checkbox
		$new = sanitize_text_field(wp_unslash($_POST['the_gap_hide_page_header'])) ;
		}
		
		if ( $new && $new != $old ) {
			update_post_meta( $post_id, 'the_gap_hide_page_header', $new );
		} elseif ( '' == $new && $old ) {
			delete_post_meta( $post_id, 'the_gap_hide_page_header', $old );
		}
		


		if( isset( $_POST[ 'the_gap_page_header_bg_color' ] ) ) {
				$the_gap_page_header_background_color = sanitize_hex_color( wp_unslash( $_POST['the_gap_page_header_bg_color']) );
				update_post_meta( $post_id, 'the_gap_page_header_bg_color', $the_gap_page_header_background_color );
		}

}


public function the_gap_metabox_color_enqueue() {
		global $pagenow;
	$posts_all = array('post', 'page');
    // get current admin screen, or null
    $screen = get_current_screen();
    // verify admin screen object
    if (is_object($screen)) {
        // enqueue only for specific post types
        if (in_array($screen->post_type, $posts_all)) {
     
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'the_gap_meta_box_color_js', get_template_directory_uri() . '/inc/js/meta-box-color.js', array( 'wp-color-picker' ) );
		}
	}
}


public function the_gap_admin_styles(){
   
   $posts_all = array('post', 'page');
     // get current admin screen, or null
    $screen = get_current_screen();
    // verify admin screen object
    if (is_object($screen)) {
        // enqueue only for specific post types
        if (in_array($screen->post_type, $posts_all)) {
        wp_enqueue_style( 'the_gap_meta_box_styles', get_template_directory_uri() . '/assets/css/meta-box-styles.css' );
    	}
	}
}

}

$The_Gap_Post_Metabox = new The_Gap_Post_Metaboxes();