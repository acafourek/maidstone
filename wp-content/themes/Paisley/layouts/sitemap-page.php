<?php
/*
Template Name: Sitemap
*/
if(!defined('ABSPATH')) { exit; } get_header(); ?>

  <main class="section">

    <?php ace_breadcrumb(); ?>

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

    <article <?php post_class('article article-page'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

      <header class="post-header">
        <h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
      </header>

      <div class="post-content entry-content" itemprop="text">

        <?php the_content(); ?>

        <?php ace_get_link_pages(); ?>

        <section class="split-columns">
        <article class="colleft">
          <h3><?php _e('Pages', 'ace'); ?></h3>
          <ul>
            <?php wp_list_pages('depth=1&sort_column=menu_order&title_li='); ?>
          </ul>
        </article>
        <article class="colright">
          <h3><?php _e('Categories', 'ace'); ?></h3>
          <ul>
            <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>
          </ul>
        </article>
        </section>

        <?php
        $cats = get_categories();
        foreach ($cats as $cat) {
        query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
        ?>
        <h2><?php echo $cat->cat_name; ?></h2>
        <ul class="sitemaps-category">
          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
          <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> <span class="alignright"><small><?php _e('Comment', 'ace'); ?> (<?php echo $post->comment_count ?>)</small></span></li>
          <?php endwhile; endif; wp_reset_query(); ?>
        </ul>
        <?php } ?>

      </div><!-- .post-content -->

    </article><!-- .article -->

    <?php endwhile; endif; ?>

  </main><!-- .section -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
