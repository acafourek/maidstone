<?php if(!defined('ABSPATH')) { exit; } get_header(); ?>

  <main class="section-wide">

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

    <article class="article article-page" itemscope itemtype="https://schema.org/CreativeWork">

      <header class="post-header">
        <h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
      </header>

      <article class="post-content entry-content" itemprop="text">

        <img src="<?php echo esc_url(wp_get_attachment_url($post->ID)); ?>" alt="<?php the_title(); ?>" class="aligncenter" />

        <article class="attachment-desc"><?php the_content(); ?></article>

      </article><!-- .post-content -->

    </article><!-- .article -->

    <?php endwhile; endif; ?>

  </main><!-- .section -->

<?php get_footer(); ?>
