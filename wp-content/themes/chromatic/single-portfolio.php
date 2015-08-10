<?php
/**
 * The Template for displaying single portfolio custom posts.
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */

get_header(); ?>

		<section id="primary">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php do_action( 'chromatic_before_title' ); ?>
						<?php if ( is_singular() ) { ?>
							<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php } else { ?>
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php esc_attr( sprintf( __( 'Permalink to %s', 'chromatic' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<?php } ?>
						<?php do_action( 'chromatic_after_title' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<div class="chromatic-breadcrumbs">
							<a href="<?php print get_post_type_archive_link( 'portfolio' ); ?>"><?php $obj = get_post_type_object( 'portfolio' ); echo $obj->rewrite['slug']; ?></a>
							<span class="sep">&raquo;</span>  
							<span class="portfolio-breadcrumbs-cats">
							<?php
							$portfolios = wp_get_post_categories( $post->ID );
							echo get_the_term_list( $post->ID, 'pcategory', '', '', '' );
							if ( ! empty( $portfolios ) ) {
								foreach ( $portfolios as $portfolio_cat )
								echo $portfolio_cat;
							}
							?>
							</span>
							<span class="sep">&raquo;</span> 
							<?php echo the_title( '', false ); ?>
						</div>
						<?php do_action( 'chromatic_before_content' ); ?>
						<?php the_content(); ?>
						<?php do_action( 'chromatic_after_content' ); ?>
					</div><!-- .entry-content -->

					<?php get_template_part( 'entry', 'footer' ); ?>

				</article><!-- #post-<?php the_ID(); ?> -->

				<?php chromatic_content_nav( 'nav-below' ); ?>

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</section><!-- #primary -->

<?php get_footer(); ?>