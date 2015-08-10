<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */

get_header(); ?>

	<section id="primary" class="clearfix">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<?php global $post; $post_id = $post-> ID; ?>

			<header class="page-header clearfix">
				<h1 class="page-title">
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'chromatic' ), '<span>' . get_the_date() . '</span>' );
						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'chromatic' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'chromatic' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
						elseif ( is_category() ) :
							printf( __( 'Category Archives: %s', 'chromatic' ), '&nbsp;<span>' . single_cat_title( '', false ) . '</span>' );
						elseif ( 'portfolio' == get_post_type() ) :
							_e( 'Portfolio', 'chromatic' );
						elseif ( has_post_format(get_post_format(),$post_id) ) :
							printf( __( '%s Archives', 'chromatic' ), '<span>' . get_post_format() . '</span>' );
						else :
							_e( 'Archives', 'chromatic' );
						endif;
					?>
				</h1>
				<div id="controls">
					<a id="show_grid" class="control genericon genericon-draggable" href="javascript:void(0);"><?php _e( 'Show Grid', 'chromatic' ); ?></a>
	                <a id="show_list" class="control genericon genericon-menu" href="javascript:void(0);"><?php _e( 'Show List', 'chromatic' ); ?></a>
				</div>
				<?php
					if ( is_category() ) {
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					}
				?>
			</header>

			<?php rewind_posts(); ?>

			<?php //chromatic_content_nav( 'nav-above' ); ?>

			<div class="portfolios" style="display:none">
				<div id="content-inner">
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'portfolio' ); ?>
					<?php endwhile; ?>
				</div><!-- #content-inner -->
			</div><!-- .portfolios -->

			<?php chromatic_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

				<header class="entry-header">
					<span class="banner-bg"></span>
					<h1 class="entry-title fancy"><?php _e( 'Nothing Found', 'chromatic' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'chromatic' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->

			</article><!-- #post-0 -->

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>