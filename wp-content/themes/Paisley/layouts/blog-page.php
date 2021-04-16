<?php
/*
Template Name: Blog
*/
if(!defined('ABSPATH')) { exit; } get_header(); ?>

	<?php if(get_option('ace_full_blog')) { echo '<main class="section-wide">'; } else { echo '<main class="section" id="section">'; } ?>

		<?php ace_breadcrumb(); ?>

		<?php if(get_option('ace_blog_list_layout') == 'grid-blog') { echo '<section class="article-grid-listing">'; } ?>

		<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$the_query = new WP_Query(array('post_type' => 'post', 'paged' => $paged));
		if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>

			<?php get_template_part('content', 'list'); ?>

		<?php endwhile; ?>

		<?php if(get_option('ace_blog_list_layout') == 'grid-blog') { echo '</section>'; } ?>

		<nav class="navigation pagination" role="navigation">
			<h2 class="screen-reader-text">Posts navigation</h2>
			<?php
			echo paginate_links(array(
				'base' => str_replace('999999999', '%#%', esc_url(get_pagenum_link('999999999'))),
				'format' => '?paged=%#%',
				'mid_size'  => 5,
				'prev_text' => __('Previous', 'ace'),
				'next_text' => __('Next', 'ace'),
				'current' => max(1, get_query_var('paged')),
				'total' => $the_query->max_num_pages
			));
			?>
		</nav>

		<?php else : wp_reset_postdata(); get_template_part('content', 'none'); endif; ?>

	</main><!-- .section -->

	<?php if(!get_option('ace_full_blog')) { get_sidebar(); } ?>

<?php get_footer(); ?>
