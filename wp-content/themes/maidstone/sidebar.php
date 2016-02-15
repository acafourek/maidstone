<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package Sela
 */
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="secondary" class="widget-area sidebar-widget-area" role="complementary">
		<div class="sidebar_bio">
		<?php 
			$dakota = get_user_by('login','dakota');
			echo get_avatar($dakota->ID,150);
			
			$dakota_meta = get_user_meta($dakota->ID);
			echo '<p>'.$dakota_meta['description'][0].'</p>';
			wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links', ) );
		?>
		</div>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #secondary -->
<?php endif; 
/* notquite there
	if(is_single()){
		rewind_posts();
		while ( have_posts() ) : the_post();
			echo do_shortcode('[jetpack-related-posts]');
		endwhile;
	}
*/
?>
