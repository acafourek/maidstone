<?php if(!defined('ABSPATH')) { exit; } get_header(); ?>

	<?php if(get_option('ace_woo_full_width')) { echo '<main class="section-wide">'; } else { echo '<main class="section">'; } ?>

		<?php if(get_option('ace_woo_breadcrumb')) { woocommerce_breadcrumb(); } ?>

		<article <?php post_class('article article-page woocommerce-page'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

			<?php woocommerce_content(); ?>

			<?php ace_get_link_pages(); ?>

		</article><!-- .article -->

	</main><!-- .section -->

	<?php if(!get_option('ace_woo_full_width')) { get_sidebar(); } ?>

<?php get_footer(); ?>
