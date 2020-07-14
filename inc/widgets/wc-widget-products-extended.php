<?php
/**
 * List products. One widget to rule them all.
 * @author 		WooThemes
 * @package WooCommerce/Widgets
 * @version 3.3.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Widget products.
 */
class The_Gap_Widget_Products extends WC_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_products';
		$this->widget_description = __( "A list of The Gap store's products.", 'the-gap' );
		$this->widget_id          = 'woocommerce_product_list';
		$this->widget_name        = __( 'The Gap Product List', 'the-gap' );
		$this->settings           = array(
			'title'       => array(
				'type'  => 'text',
				'std'   => __( 'Products', 'the-gap' ),
				'label' => __( 'Title', 'the-gap' ),
			),
			'number'      => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 5,
				'label' => __( 'Number of products to show', 'the-gap' ),
			),
			'show'        => array(
				'type'    => 'select',
				'std'     => '',
				'label'   => __( 'Show', 'the-gap' ),
				'options' => array(
					''         => __( 'All products', 'the-gap' ),
					'featured' => __( 'Featured products', 'the-gap' ),
					'onsale'   => __( 'On-sale products', 'the-gap' ),
				),
			),
			'orderby'     => array(
				'type'    => 'select',
				'std'     => 'date',
				'label'   => __( 'Order by', 'the-gap' ),
				'options' => array(
					'date'  => __( 'Date', 'the-gap' ),
					'price' => __( 'Price', 'the-gap' ),
					'rand'  => __( 'Random', 'the-gap' ),
					'sales' => __( 'Sales', 'the-gap' ),
				),
			),
			'order'       => array(
				'type'    => 'select',
				'std'     => 'desc',
				'label'   => _x( 'Order', 'Sorting order', 'the-gap' ),
				'options' => array(
					'asc'  => __( 'ASC', 'the-gap' ),
					'desc' => __( 'DESC', 'the-gap' ),
				),
			),
			'hide_free'   => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide free products', 'the-gap' ),
			),
			'show_hidden' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show hidden products', 'the-gap' ),
			),
			'enable_slider'  => array(
				'type'    => 'select',
				'std'     => 'slider',
				'label'   => __( 'Slider Show/Hide', 'the-gap' ),
				'options' => array(
					'slider'  => __( 'Enable Slider', 'the-gap' ),
					'grid' => __( 'Enable Grid', 'the-gap' ),
					
				),
			),
			'slider_number'  => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 4,
				'label' => __( 'Number of products to show per slide', 'the-gap' ),
			),
		);

		parent::__construct();
	}

	/**
	 * Query the products and return them.
	 *
	 * @param array $args     Arguments.
	 * @param array $instance Widget instance.
	 *
	 * @return WP_Query
	 */
	public function get_products( $args, $instance ) {
		$number                      = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];
		$show                        = ! empty( $instance['show'] ) ? sanitize_title( $instance['show'] ) : $this->settings['show']['std'];
		
		$orderby                     = ! empty( $instance['orderby'] ) ? sanitize_title( $instance['orderby'] ) : $this->settings['orderby']['std'];
		$order                       = ! empty( $instance['order'] ) ? sanitize_title( $instance['order'] ) : $this->settings['order']['std'];
		
		$slider_number  = ! empty( $instance['slider_number'] ) ? absint( $instance['slider_number'] ) : $this->settings['slider_number']['std'];
		$enable_slider   = ! empty( $instance['enable_slider'] ) ? sanitize_title( $instance['enable_slider'] ) : $this->settings['enable_slider']['std'];

		$product_visibility_term_ids = wc_get_product_visibility_term_ids();

		$query_args = array(
			'posts_per_page' => $number,
			'post_status'    => 'publish',
			'post_type'      => 'product',
			'no_found_rows'  => 1,
			'order'          => $order,
			'meta_query'     => array(),
			'tax_query'      => array(
				'relation' => 'AND',
			),
		); // WPCS: slow query ok.

		if ( empty( $instance['show_hidden'] ) ) {
			$query_args['tax_query'][] = array(
				'taxonomy' => 'product_visibility',
				'field'    => 'term_taxonomy_id',
				'terms'    => is_search() ? $product_visibility_term_ids['exclude-from-search'] : $product_visibility_term_ids['exclude-from-catalog'],
				'operator' => 'NOT IN',
			);
			$query_args['post_parent'] = 0;
		}

		if ( ! empty( $instance['hide_free'] ) ) {
			$query_args['meta_query'][] = array(
				'key'     => '_price',
				'value'   => 0,
				'compare' => '>',
				'type'    => 'DECIMAL',
			);
		}

		if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) {
			$query_args['tax_query'][] = array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'term_taxonomy_id',
					'terms'    => $product_visibility_term_ids['outofstock'],
					'operator' => 'NOT IN',
				),
			); // WPCS: slow query ok.
		}

		switch ( $show ) {
			case 'featured':
				$query_args['tax_query'][] = array(
					'taxonomy' => 'product_visibility',
					'field'    => 'term_taxonomy_id',
					'terms'    => $product_visibility_term_ids['featured'],
				);
				break;
			case 'onsale':
				$product_ids_on_sale    = wc_get_product_ids_on_sale();
				$product_ids_on_sale[]  = 0;
				$query_args['post__in'] = $product_ids_on_sale;
				break;
		}

		switch ( $orderby ) {
			case 'price':
				$query_args['meta_key'] = '_price'; // WPCS: slow query ok.
				$query_args['orderby']  = 'meta_value_num';
				break;
			case 'rand':
				$query_args['orderby'] = 'rand';
				break;
			case 'sales':
				$query_args['meta_key'] = 'total_sales'; // WPCS: slow query ok.
				$query_args['orderby']  = 'meta_value_num';
				break;
			default:
				$query_args['orderby'] = 'date';
		}

		return new WP_Query( apply_filters( 'woocommerce_products_widget_query_args', $query_args ) );
	}

	/**
	 * Output widget.
	 *
	 * @param array $args     Arguments.
	 * @param array $instance Widget instance.
	 *
	 * @see WP_Widget
	 */
	public function widget( $args, $instance ) {
		if ( $this->get_cached_widget( $args ) ) {
			return;
		}

		ob_start();

$slider_number  = ! empty( $instance['slider_number'] ) ? absint( $instance['slider_number'] ) : $this->settings['slider_number']['std'];
$enable_slider   = ! empty( $instance['enable_slider'] ) ? sanitize_title( $instance['enable_slider'] ) : $this->settings['enable_slider']['std'];

$show                        = ! empty( $instance['show'] ) ? sanitize_title( $instance['show'] ) : $this->settings['show']['std'];
$orderby                     = ! empty( $instance['orderby'] ) ? sanitize_title( $instance['orderby'] ) : $this->settings['orderby']['std'];
$order                       = ! empty( $instance['order'] ) ? sanitize_title( $instance['order'] ) : $this->settings['order']['std'];
					
		$products = $this->get_products( $args, $instance );
		
		if ( $products && $products->have_posts() ) {
			$this->widget_start( $args, $instance );
			
			
			
			$id = the_gap_html_id('products');
			$class = '.';
			$class .= $id;

			echo wp_kses_post( apply_filters( 'woocommerce_before_widget_product_list', '<ul data-number="'.$slider_number.'" data-enable="'.$enable_slider.'" class="product_list_widget custom '.$id.'">' ) );

			$template_args = array(
				'widget_id'   => $args['widget_id'],
				'show_rating' => true,
			);

			while ( $products->have_posts() ) {
				
				$products->the_post();
				wc_get_template( 'content-widget-product.php', $template_args );
				
			}

			echo wp_kses_post( apply_filters( 'woocommerce_after_widget_product_list', '</ul>' ) );
	
			$this->widget_end( $args );
		}

		wp_reset_postdata();
		
		
		echo $this->cache_widget( $args, ob_get_clean() ); // WPCS: XSS ok.
	}
}
