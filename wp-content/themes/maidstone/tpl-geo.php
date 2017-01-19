<?php
/**
 * Template Name: Geographic Archives
 *
 * @package Sela
 */

get_header();
?>

	<div class="content-wrapper full-width <?php echo sela_additional_class(); ?>">
		<div id="primary" class="content-area grid-page-content-area ">
			<div id="content" class="site-content published" role="main">
				<?php
					//run mass updates
/*
					$the_query = new WP_Query( array(
						'posts_per_page' => -1,
						'post_type' => 'post'
					 ));
					if( $the_query->have_posts() ):
						while( $the_query->have_posts() ) : $the_query->the_post();
						//error_log(get_the_title());
						do_action('da_provision_location_data',get_the_ID());
						endwhile;
					endif;
					wp_reset_query();
*/

					$loc_args = array(
						'parent' => 0
					);
					if(isset($_GET['loc'])){
						$loc = get_term_by('slug',$_GET['loc'],'location');
						$loc_args['parent'] = $loc->term_id;
					}

					$locations = get_terms('location',$loc_args);
					echo '<ul class="loc_list">';
						foreach($locations as $location){
							///Placeholder for facking data updates
							if($location->name == "United Kingdom")
								update_term_meta($location->term_id,'map_glyph','uk');

							echo '<li><a href="'.get_bloginfo('home').'/location/'.$location->slug.'"><span class="map-icon"><i class="mg map-'.get_term_meta($location->term_id,'map_glyph',true).'"></i></span>'.$location->name.'</a></li>';
						}
					echo '</ul>';
				?>
				<div class="map-credit">
					Thanks to <a href="http://mapglyphs.com/"><i class="mg map-wrld"></i>Map Glyphs</a> for awesome icons
				</div>

			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- .content-wrapper -->


<?php get_footer(); ?>
