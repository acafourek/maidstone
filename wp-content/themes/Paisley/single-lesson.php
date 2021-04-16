<?php if(!defined('ABSPATH')) { exit; } get_header(); ?>

    <?php if(get_option('ace_lifterlms_lesson_width')) { echo '<main role="main" class="section-wide" id="section">'; } else { echo '<main role="main" class="section" id="section">'; } ?>

		<?php ace_breadcrumb(); ?>

		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

		<article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

			<header class="post-header">
				<h1 class="page-title entry-title" itemprop="headline"><a itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" href="<?php the_permalink(); ?>" rel="<?php esc_attr_e('bookmark', 'ace'); ?>" title="<?php the_title_attribute(); ?>" <?php if (get_option('ace_new_window')) { echo 'target="_blank"'; } ?>><?php the_title(); ?></a></h1>
			</header>

			<article class="post-content entry-content" itemprop="text">

				<?php the_content(); ?>

				<?php echo ace_get_link_pages(); ?>

			</article><!-- .post-content -->

		</article><!-- .article -->

		<?php endwhile; else: get_template_part('content', 'none'); endif; ?>

	</main><!-- .section -->

    <?php if(!get_option('ace_lifterlms_lesson_width')) { get_sidebar(); } ?>

	<script type="text/javascript">
	/* <![CDATA[ */
	var $ = jQuery.noConflict();
	jQuery(document).ready(function($){ // START

		$(".entry-content").fitVids({
			customSelector: 'iframe[src*="fast.wistia.net"]'
		});

	}); // END
	/* ]]> */
	</script>

<?php get_footer(); ?>
