<?php
/**
 *
 * @package Sela
 */

get_header(); 

while ( have_posts() ) : the_post(); 
	$home = $post;
endwhile;
?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
	 
			$("#owl-demo").owlCarousel({
			
			  navigation : true, // Show next and prev buttons
			  slideSpeed : 300,
			  paginationSpeed : 400,
			  singleItem:true,
			  autoPlay: true //default to 5 sec
			});
	 
	});
	</script>
	<div id="primary" class="content-area front-page-content-area">
		<?php 
			$args = array(
				'posts_per_page' => 5,
				'category_name' => 'featured'
			);
			$fp_query = new WP_Query( $args );
			if($fp_query->have_posts() ):	
				echo '<div class="hero"><div id="owl-demo" class="owl-carousel owl-theme">';
				$count = 1;
				
				$featured = $fp_query->posts;
				array_unshift($featured, $home);
				foreach($featured as $feature){
					global $post;
					$post = $feature;
					setup_postdata( $post ); 
					
					if(!has_post_thumbnail())
						continue; //only show posts with thumbnails
?>
					<div class="item">
						<?php the_post_thumbnail( 'sela-hero-thumbnail' ); ?>
						<div class="hero-content-overlayer">
						<div class="hero-container-outer">
							<div class="hero-container-inner">
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<header class="entry-header">
										<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
									</header><!-- .entry-header -->

									<div class="entry-content">
										<?php 
											if($count == 1)
												the_content(); 
											else
												echo da_custom_excerpt($post);
										?>
										<br />
										<?php 
											if ( $count == 1 && has_nav_menu ( 'social' ) )
												wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links', ) );
										?>
									</div><!-- .entry-content -->
								</article><!-- #post-## -->
							</div><!-- .hero-container-inner -->
						</div><!-- .hero-container-outer -->
					</div><!-- .hero-content-overlayer -->
					</div> <!-- /item -->
<?php
					$count++;
					wp_reset_postdata();
				} //end foreach
				echo '</div></div>';
			endif;
			wp_reset_query();		
?>

	</div><!-- #primary -->

	<?php get_sidebar( 'front-page' ); ?>

	<div id="front-page-testimonials" class="front-testimonials testimonials">
		<div class="map-embed">
			<a id="embed-8353153" href="https://roadtrippers.com/map?a2=t%218353153&lat=36.43690&lng=-96.55704&utm_campaign=trip&utm_medium=share&utm_source=embed&z=4">The Great American Tour of 2015 on Roadtrippers</a><br><script>!function(d,l,h,w,id){var a = d.getElementById(id);var ifr = d.createElement("iframe");ifr.src = l;ifr.height = h;ifr.width = w;a.parentNode.insertBefore(ifr, a);a.parentNode.removeChild(a);}(document,"https://roadtrippers.com/embedded/trips/8353153",500,600,"embed-8353153");</script>
		</div>
	</div>
<?php get_sidebar( 'footer' ); ?>
<?php get_footer(); ?>