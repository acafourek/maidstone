<?php if(!defined('ABSPATH')) { exit; } get_header(); ?>

  <?php if(get_post_meta($post->ID, 'ace_wide', true)) { echo '<main class="section-wide">'; } else { echo '<main class="section">'; } ?>

    <?php ace_breadcrumb(); ?>

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

    <article <?php post_class('article article-page'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

      <?php if(get_post_meta($post->ID, 'ace_title', true)) {} else { ?>
      <header class="post-header">
        <h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
      </header>
      <?php } ?>

      <article class="post-content entry-content" itemprop="text">

        <?php the_content(); ?>

        <?php ace_get_link_pages(); ?>

        <?php comments_template('/comments.php', true); ?>

      </article><!-- .post-content -->


    </article><!-- .article -->

    <?php endwhile; endif; ?>

  </main><!-- .section -->

  <?php if(get_post_meta($post->ID, 'ace_wide', true)) {} else { get_sidebar(); } ?>

<?php get_footer(); ?>
