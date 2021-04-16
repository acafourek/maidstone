<?php
/*
Template Name: Full width no title
Template Post Type: post
*/
if(!defined('ABSPATH')) { exit; } get_header(); ?>

	<main class="section-wide">

		<?php ace_breadcrumb(); ?>

		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

			<article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

			  <article class="post-content entry-content" itemprop="text">

				<?php the_content(); ?>

				<?php ace_get_link_pages(); ?>

				<?php if(get_option('ace_post_signature')) { ?>
				  <span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
					<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
					  <img src="<?php echo esc_url(get_option('ace_post_signature')); ?>" alt="<?php the_author(); ?>" class="post-signature" />
					  <meta itemprop="url" content="<?php echo esc_attr(get_option('ace_post_signature')); ?>" />
					</span>
					<meta itemprop="name" content="<?php the_author(); ?>" />
				  </span>
				<?php } ?>

				<?php if(function_exists('ace_post_author_bio')) { ace_post_author_bio(); } ?>

			  </article><!-- .post-content -->

			  <footer class="post-footer">

				<section class="post-meta">
				  <?php if(!get_option('ace_hide_date')) { ?><time datetime="<?php the_time(get_option('date_format')); ?>" itemprop="datePublished" class="updated"><?php the_time(get_option('date_format')); ?></time><?php } ?>
				  <?php if(get_option('ace_blog_author')) { ?><?php _e('by','ace'); ?> <span itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php the_author(); ?></span></span><?php } ?>
				  <?php if(!get_option('ace_hide_comment')) { ?> | <?php comments_popup_link(__('0 comments', 'ace'), __('1 Comment', 'ace'), __('% Comments', 'ace')); ?><?php } ?>
				</section><!-- .post-meta -->

				<?php if(get_option('ace_show_tag')) { the_tags('<p class="post-tags">Tags: ', ', ', '</p>'); } ?>

				<ul class="footer-navi">
				  <?php previous_post_link('<li class="previous" rel="prev">&laquo; %link</li>'); ?>
				  <?php next_post_link('<li class="next" rel="next">%link &raquo;</li>'); ?>
				</ul>

				<?php if(get_option('ace_post_banner')) { ?>
				  <section class="post-banner">
				  <?php echo stripslashes_deep(get_option('ace_post_banner')); ?>
				  </section>
				<?php } ?>

				<?php if(get_option('ace_enable_related')) { get_template_part('layouts/related'); } ?>

			  </footer><!-- .post-footer -->

			  <?php comments_template('/comments.php', true); ?>

			</article><!-- .article -->

		<?php endwhile; endif; ?>

	</main><!-- .section -->

<?php get_footer(); ?>
