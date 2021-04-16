<?php if(!defined('ABSPATH')) { exit; } get_header(); ?>

  <main role="main" class="section" id="section">

    <?php echo ace_breadcrumb(); ?>

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

      <?php get_template_part('content', 'list'); ?>

    <?php endwhile; ?>

      <?php echo ace_get_pagination_links(); ?>

    <?php else : get_template_part('content', 'none'); endif; ?>

  </main><!-- .section -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
