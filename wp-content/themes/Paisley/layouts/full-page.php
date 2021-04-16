<?php
/*
Template Name: Full width
*/
if(!defined('ABSPATH')) { exit; } get_header(); ?>

  <main class="section-wide">

    <?php ace_breadcrumb(); ?>

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

    <article <?php post_class('article article-page'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

      <header class="post-header">
        <h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
      </header>

      <article class="post-content entry-content" itemprop="text">

        <?php the_content(); ?>

        <?php ace_get_link_pages(); ?>

        <?php comments_template('/comments.php', true); ?>

      </article><!-- .post-content -->

    </article><!-- .article -->

    <?php endwhile; endif; ?>

  </main><!-- .section -->

<?php get_footer(); ?>
