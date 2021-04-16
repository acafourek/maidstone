<?php if(!defined('ABSPATH')) { exit; } get_header(); ?>

  <?php if(get_option('ace_full_blog')) { echo '<main class="section-wide" id="section">'; } else { echo '<main class="section" id="section">'; } ?>

    <?php ace_breadcrumb(); ?>

    <?php if(have_posts()) : ?>

      <?php the_archive_title('<h3 class="pagetitle">', '</h3>'); ?>
      <?php the_archive_description('<div class="pagetitle-desc">', '</div>'); ?>

    <?php while(have_posts()) : the_post(); ?>

      <?php get_template_part('content', 'list'); ?>

    <?php endwhile; ?>

      <?php ace_get_pagination_links(); ?>

    <?php else : get_template_part('content', 'none'); endif; ?>

  </main><!-- .section -->

  <?php if(get_option('ace_full_blog')) { } else { get_sidebar(); } ?>

<?php get_footer(); ?>
