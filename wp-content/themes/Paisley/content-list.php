    <article <?php post_class('article article-list'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

      <section class="post-thumbnail">

        <?php if(has_post_thumbnail()) { ?>
          <a href="<?php the_permalink(); ?>" <?php if(get_option('ace_new_window')) { echo 'target="_blank"'; } ?>><?php the_post_thumbnail('post_thumb', array('class'=>'aligncenter post-thumb')); ?></a>
        <?php } else { ?>
          <a href="<?php the_permalink(); ?>" <?php if(get_option('ace_new_window')) { echo 'target="_blank"'; } ?>><img src="<?php echo get_template_directory_uri(); ?>/images/post-thumb.jpg" alt="<?php the_title(); ?>" class="aligncenter" /></a>
        <?php } ?>
        <?php if(!get_option('ace_hide_category')) { ?><section class="post-list-category"><?php the_category(', '); ?></section><?php } ?>
      </section>

      <?php if(get_post_meta($post->ID, 'ace_title', true)) {} else { ?>
      <header class="post-header">
        <h2 class="post-title entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>" rel="<?php esc_attr_e('bookmark', 'ace'); ?>" title="<?php the_title_attribute(); ?>" <?php if(get_option('ace_new_window')) { echo 'target="_blank"'; } ?>><?php the_title(); ?></a></h2>
        <?php if(!get_option('ace_hide_date')) { ?><time datetime="<?php the_time(get_option('date_format')); ?>" itemprop="datePublished" class="post-date updated"><?php the_time(get_option('date_format')); ?></time><?php } ?>
      </header>
      <?php } ?>

    </article><!-- .article -->
