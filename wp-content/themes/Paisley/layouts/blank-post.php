<?php
/*
Template Name: Blank
Template Post Type: post
*/
if(!defined('ABSPATH')) { exit; } ?>
<!DOCTYPE html>
<!--[if IE 7]><html id="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
<style type="text/css">
.header {background-image: url('<?php if(get_option('ace_header_bg')) { echo stripslashes_deep(get_option('ace_header_bg')); } else { echo get_template_directory_uri(); echo '/images/header-default.jpg';} ?>'); background-size: cover; background-position: center center;}
</style>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

<section class="wrap">

  <main class="section-wide blank-page-template">

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

    <article <?php post_class('article article-page'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

      <article class="post-content entry-content" itemprop="text">

        <?php the_content(); ?>

        <?php ace_get_link_pages() ?>

        <?php comments_template('/comments.php', true); ?>

      </article><!-- .post-content -->

    </article><!-- .article -->

    <?php endwhile; endif; ?>

  </main><!-- .section-wide -->

</section><!-- .wrap -->

<?php wp_footer(); ?>

</body>
</html>
