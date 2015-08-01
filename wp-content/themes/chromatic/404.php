<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */

get_header(); ?>

	<section id="primary">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Well this is somewhat embarrassing, isn&rsquo;t it?', 'chromatic' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'chromatic' ); ?></p>

					<?php get_search_form(); ?>


					<div class="widget">
						<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'chromatic' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>


				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

	</section><!-- #primary -->

<?php get_footer(); ?>