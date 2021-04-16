<h5 class="post-related-title"><?php _e('You may also like', 'ace'); ?></h5>
<ul class="post-related">
  <?php
  $tags = wp_get_post_tags($post->ID);
  if ($tags) { $tag_ids = array(); foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
  $args = array(
  'tag__in' => $tag_ids,
  'post__not_in' => array($post->ID),
  'posts_per_page' => 3,
  'ignore_sticky_posts' => 1,
  'orderby' => 'rand'
  );
  $my_query = new wp_query($args);
  if ($my_query->have_posts()) { while($my_query->have_posts()) { $my_query->the_post();
  ?>
    <li>
      <?php if (has_post_thumbnail()) { ?>
        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('post_thumb'); ?></a>
      <?php } ?>
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </li>
  <?php } wp_reset_query(); } } ?>
</ul>
