<?php
/**
 * The default template for displaying related post grid
 
 * 
 * @package the-gap
 * 
 */

?>

<div class="item-wrap">
	<div id="post-<?php the_ID(); ?>">
		<div class="image-container">
			<figure class="image-thumb">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php echo get_the_post_thumbnail($post->ID, array(300,300), array('title' => '')); ?>
				</a>
				
			</figure>
		</div>
		
		<?php if (!is_single()){ ?>
		
		<div class="the-gap-related-post-body">
			
			<h6 class="the-gap-related-post-title"><?php the_title(); ?></h6>
	
					<span><time datetime="<?php esc_attr( the_time( get_option( 'date_format' ) ));?>"><i class="fa fa-clock-o"></i> <?php esc_attr( the_time( get_option( 'date_format' ) ));?></time></span>
					<span><i class="fa fa-bookmark-o"></i> <?php the_category(','); ?></span>
		
		</div>
		<?php } ?>
		
		<?php if (is_single()){ ?>
		
		<div class="the-gap-related-single-body">
			
			<h6 class="post-single-title"><?php the_title(); ?></h6>
			<div class="post-single-description">
			<div class="single-related-meta">
					<span><time datetime="<?php esc_attr( the_time( get_option( 'date_format' ) ));?>"><i class="fa fa-clock-o"></i> <?php esc_attr( the_time( get_option( 'date_format' ) ));?></time></span>
					<span><i class="fa fa-bookmark-o"></i> <?php the_category(','); ?></span>
			
			</div>
				
			
				
			</div>


		</div>
		<?php } ?>
	</div>
</div>