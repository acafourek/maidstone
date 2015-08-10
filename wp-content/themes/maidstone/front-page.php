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


				<figure class="hero-content">
					<?php 
						get_the_image(array(
							'size' => has_image_size( 'sela-hero-thumbnail' ) ? 'sela-hero-thumbnail' : 'thumbnail',
							'scan' => true
						));
					?>											
					<div class="hero-content-overlayer">
						<div class="hero-container-outer">
							<div class="hero-container-inner">
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<header class="entry-header">
										<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
									</header><!-- .entry-header -->

									<div class="entry-content">
										<?php the_content(); ?>
									</div><!-- .entry-content -->
									<?php edit_post_link( __( 'Edit', 'sela' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
								</article><!-- #post-## -->
							</div><!-- .hero-container-inner -->
						</div><!-- .hero-container-outer -->
					</div><!-- .hero-content-overlayer -->
				</figure><!-- .hero-content -->

			</div><!-- .hero -->
		<?php endwhile; ?>
	</div><!-- #primary -->

	<?php get_sidebar( 'front-page' ); ?>

	<?php
		$testimonials = new WP_Query( array(
			'post_type'      => 'jetpack-testimonial',
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'posts_per_page' => 2,
			'no_found_rows'  => true,
		) );
	?>

	<div id="front-page-testimonials" class="front-testimonials testimonials">
		<div class="map-embed">
			<a id="embed-8353153" href="https://roadtrippers.com/map?a2=t%218353153&lat=36.43690&lng=-96.55704&utm_campaign=trip&utm_medium=share&utm_source=embed&z=4">The Great American Tour of 2015 on Roadtrippers</a><br><script>!function(d,l,h,w,id){var a = d.getElementById(id);var ifr = d.createElement("iframe");ifr.src = l;ifr.height = h;ifr.width = w;a.parentNode.insertBefore(ifr, a);a.parentNode.removeChild(a);}(document,"https://roadtrippers.com/embedded/trips/8353153",500,600,"embed-8353153");</script>
		</div>
	</div>
<!--  removed in favor of showing roadtrippers map
	<?php if ( $testimonials->have_posts() ) : ?>
	<div id="front-page-testimonials" class="front-testimonials testimonials">
		<div class="grid-row">
		<?php
			while ( $testimonials->have_posts() ) : $testimonials->the_post();
				 get_template_part( 'content', 'testimonial' );
			endwhile;
			wp_reset_postdata();
		?>
		</div>
	</div><!-- .testimonials -->
	<?php endif; ?>
-->

<?php get_sidebar( 'footer' ); ?>
<?php get_footer(); ?>