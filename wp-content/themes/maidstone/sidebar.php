<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package Sela
 */
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="secondary" class="widget-area sidebar-widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #secondary -->
<?php endif; 
	if(is_single()){
		rewind_posts();
		while ( have_posts() ) : the_post();
			echo do_shortcode('[jetpack-related-posts]');
		endwhile;
	}
?>
