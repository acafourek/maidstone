    <article <?php post_class('article hentry'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/Article">

      <header class="post-header">
        <h3 class="entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>" rel="<?php esc_attr_e('bookmark', 'ace'); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
      </header>
      <?php the_excerpt(); ?>

    </article><!-- .article -->
