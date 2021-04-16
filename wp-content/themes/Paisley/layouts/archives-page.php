<?php
/*
Template Name: Archives
*/
if(!defined('ABSPATH')) { exit; } get_header(); ?>

  <main class="section">

    <?php ace_breadcrumb(); ?>

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

    <article <?php post_class('article article-page'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/Article">

      <header class="post-header">
        <h1 class="page-title entry-title" itemprop="name"><?php the_title(); ?></h1>
      </header>

      <div class="post-content">

        <?php the_content(); ?>

        <?php ace_get_link_pages(); ?>

        <ul>
          <?php wp_tag_cloud('taxonomy=Artist&format=list&smallest=11px&largest11px'); ?>
        </ul>

        <?php get_search_form();?>

        <hr />

        <section class="split-columns">
        <article class="colleft">
          <h3><?php _e('Archives by month:', 'ace'); ?></h3>
          <ul>
            <?php wp_get_archives('type=monthly'); ?>
          </ul>
        </article>
        <article class="colright">
          <h3><?php _e('Archives by category:', 'ace'); ?></h3>
          <ul>
            <?php wp_list_categories('sort_column=name&title_li='); ?>
          </ul>
        </article>
        </section>

      </div><!-- .post-content -->

    </article><!-- .article -->

    <?php endwhile; endif; ?>

  </main><!-- .section -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
