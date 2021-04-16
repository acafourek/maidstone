<?php if(!defined('ABSPATH')) { exit; } get_header(); ?>

  <main class="section">

    <?php ace_breadcrumb(); ?>

    <article class="article" itemscope itemtype="https://schema.org/CreativeWork">

      <article class="post-content entry-content" itemprop="text">

		<h1 class="not-found-title shake"><?php _e('Oops! 404 Not Found', 'ace'); ?></h1>

        <p class="not-found-text"><?php if(get_option('ace_404_page')) { echo stripslashes_deep(get_option('ace_404_page')); } else { echo _e('The page you are looking for has not been found. How about search it out?', 'ace'); } ?></p>

        <section class="split-columns">
          <article class="col1">&nbsp;</article>
          <article class="col2"><?php get_search_form(); ?></article>
          <article class="col3">&nbsp;</article>
        </section>

      </article><!-- .post-content -->

    </article><!-- .article -->

  </main><!-- .section -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
