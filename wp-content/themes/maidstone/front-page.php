<?php
/**
 * Template Name: Front Page
 *
 * @package Sela
 */

get_header(); ?>

	<div id="primary" class="content-area front-page-content-area">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="hero">

				<?php if ( has_post_thumbnail() ) : ?>
				<figure class="hero-content">
					<?php the_post_thumbnail( 'sela-hero-thumbnail' ); ?>
					<div class="hero-content-overlayer">
						<div class="hero-container-outer">
							<div class="hero-container-inner">
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<header class="entry-header">
										<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
									</header><!-- .entry-header -->

									<div class="entry-content">
										<?php the_content(); ?>
										<br />
										<?php 
											if ( has_nav_menu ( 'social' ) )
												wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links', ) );
										?>
									</div><!-- .entry-content -->
								</article><!-- #post-## -->
							</div><!-- .hero-container-inner -->
						</div><!-- .hero-container-outer -->
					</div><!-- .hero-content-overlayer -->
				</figure><!-- .hero-content -->

				<?php else : ?>
					<?php get_template_part( 'content', 'page' ); ?>
				<?php endif; ?>

			</div><!-- .hero -->
		<?php endwhile; ?>
	</div><!-- #primary -->

	<?php get_sidebar( 'front-page' ); ?>

	<div id="front-page-testimonials" class="front-testimonials testimonials">
		<div class="map-embed">
			<a id="embed-8353153" href="https://roadtrippers.com/map?a2=t%218353153&lat=36.43690&lng=-96.55704&utm_campaign=trip&utm_medium=share&utm_source=embed&z=4">The Great American Tour of 2015 on Roadtrippers</a><br><script>!function(d,l,h,w,id){var a = d.getElementById(id);var ifr = d.createElement("iframe");ifr.src = l;ifr.height = h;ifr.width = w;a.parentNode.insertBefore(ifr, a);a.parentNode.removeChild(a);}(document,"https://roadtrippers.com/embedded/trips/8353153",500,600,"embed-8353153");</script>
		</div>
	</div>
<?php get_sidebar( 'footer' ); ?>
<?php get_footer(); ?>