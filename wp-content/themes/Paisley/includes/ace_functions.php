<?php
// ==================================================================
// Post author
// ==================================================================
function ace_post_author() {
  if(get_option('ace_blog_author')) {
    echo _e('by','ace');
    echo ' <span itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name">';
    the_author();
    echo '</span></span>';
  }
}

// ==================================================================
// Post author biography
// ==================================================================
function ace_post_author_bio() {
  if(get_option('ace_blog_author_bio')) { ?>
    <section class="post-author-bio">
      <?php echo get_avatar(get_the_author_meta('email') , 64); ?>
      <?php echo get_the_author_meta('description'); ?>
    </section>
  <?php }
}

// ==================================================================
// Social media icons
// ==================================================================
function ace_social_icons() {
  if(get_option('ace_footer_icons') == true) { ?>
  <section class="ace-social-icons-wrap">
    <ul class="ace-social-icons">
      <?php if(get_option('ace_twitter')) { ?><li><a href="<?php echo get_option('ace_twitter'); ?>" class="fab fa-twitter radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>Twitter</span></a></li><?php } ?>
      <?php if(get_option('ace_facebook')) { ?><li><a href="<?php echo get_option('ace_facebook'); ?>" class="fab fa-facebook-f radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>Facebook</span></a></li><?php } ?>
      <?php if(get_option('ace_pinterest')) { ?><li><a href="<?php echo get_option('ace_pinterest'); ?>" class="fab fa-pinterest radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>Pinterest</span></a></li><?php } ?>
      <?php if(get_option('ace_instagram')) { ?><li><a href="<?php echo get_option('ace_instagram'); ?>" class="fab fa-instagram radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>Instagram</span></a></li><?php } ?>
      <?php if(get_option('ace_google_plus')) { ?><li><a href="<?php echo get_option('ace_google_plus'); ?>" class="fab fa-google-plus radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>Google Plus</span></a></li><?php } ?>
      <?php if(get_option('ace_flickr')) { ?><li><a href="<?php echo get_option('ace_flickr'); ?>" class="fab fa-flickr radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>Flickr</span></a></li><?php } ?>
      <?php if(get_option('ace_linkedin')) { ?><li><a href="<?php echo get_option('ace_linkedin'); ?>" class="fab fa-linkedin radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>LinkedIn</span></a></li><?php } ?>
      <?php if(get_option('ace_youtube')) { ?><li><a href="<?php echo get_option('ace_youtube'); ?>" class="fab fa-youtube radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>YouTube</span></a></li><?php } ?>
      <?php if(get_option('ace_vimeo')) { ?><li><a href="<?php echo get_option('ace_vimeo'); ?>" class="fab fa-vimeo-square radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>Vimeo</span></a></li><?php } ?>
      <?php if(get_option('ace_bloglovin')) { ?><li><a href="<?php echo get_option('ace_bloglovin'); ?>" class="fa fa-plus radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>BlogLovin</span></a></li><?php } ?>
      <?php if(get_option('ace_tumblr')) { ?><li><a href="<?php echo get_option('ace_tumblr'); ?>" class="fab fa-tumblr radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>Tumblr</span></a></li><?php } ?>
      <?php if(get_option('ace_houzz')) { ?><li><a href="<?php echo get_option('ace_houzz'); ?>" class="fab fa-houzz radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>Houzz</span></a></li><?php } ?>
      <?php if(get_option('ace_rss')) { ?><li><a href="<?php echo get_option('ace_rss'); ?>" class="fa fa-rss radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>RSS Feed</span></a></li><?php } ?>
      <?php if(get_option('ace_email')) { ?><li><a href="mailto:<?php echo antispambot(get_option('ace_email')); ?>" class="fa fa-envelope radius-50" <?php if(get_option('ace_icons_new_windows')) echo 'target="_blank"'; ?>><span>Email</span></a></li><?php } ?>
    </ul>
  </section>
  <?php }
}

// ==================================================================
// Theme custom css
// ==================================================================
function ace_css() {
  if(get_option('ace_css')) { ?>
    <style type="text/css">
      <?php echo stripslashes(get_option('ace_css')); ?>
    </style>
  <?php }
}
add_action('wp_head', 'ace_css');

// ==================================================================
// Theme options colors
// ==================================================================
function ace_theme_css() { ?>
  <style type="text/css">

    <?php if(get_option('ace_h1')) { ?>h1 {color: <?php echo get_option('ace_h1'); ?>;}<?php } ?>
    <?php if(get_option('ace_h2')) { ?>h2 {color: <?php echo get_option('ace_h2'); ?>;}<?php } ?>
    <?php if(get_option('ace_h3')) { ?>h3 {color: <?php echo get_option('ace_h3'); ?>;}<?php } ?>
    <?php if(get_option('ace_h4')) { ?>h4 {color: <?php echo get_option('ace_h4'); ?>;}<?php } ?>
    <?php if(get_option('ace_h5')) { ?>h5 {color: <?php echo get_option('ace_h5'); ?>;}<?php } ?>
    <?php if(get_option('ace_h6')) { ?>h6 {color: <?php echo get_option('ace_h6'); ?>;}<?php } ?>

    <?php if(get_option('ace_link')) { ?>a {color: <?php echo get_option('ace_link'); ?>;} <?php } ?>
    <?php if(get_option('ace_link_hover')) { ?>a:hover {color: <?php echo get_option('ace_link_hover'); ?>;}<?php } ?>

    <?php if(get_option('ace_nav_bar')) { ?>.nav, .nav ul ul, .nav .menu, .menu-click {background: <?php echo get_option('ace_nav_bar'); ?>;} <?php } ?>
    <?php if(get_option('ace_nav_bar')) { ?>.nav ul ul, .nav ul ul li {border-color: <?php echo get_option('ace_nav_bar'); ?>;} <?php } ?>
    <?php if(get_option('ace_nav_link')) { ?>
    .footer-nav a,
    .nav a,
  	.nav ul li.has-sub > a:after,
  	.nav ul ul li.has-sub > a:after,
  	.nav ul li.page_item_has_children > a:after,
  	.nav ul ul li.menu-item-has-children > a:after,
  	.menu-click,
    .menu-click:before {
      color: <?php echo get_option('ace_nav_link'); ?>;
     }
     <?php } ?>
    <?php if(get_option('ace_nav_link_hover')) { ?>
    .footer-nav a:hover,
    .nav a:hover,
    .footernav .current-menu-item > a,
    .footernav .current-menu-ancestor > a,
    .footernav .current_page_item > a,
    .footernav .current_page_ancestor > a
    .nav a:hover,
    .nav .current-menu-item > a,
    .nav .current-menu-ancestor > a,
    .nav .current_page_item > a,
    .nav .current_page_ancestor > a,
    .menu-open:before {
      color: <?php echo get_option('ace_nav_link_hover'); ?>;
    }
    <?php } ?>
    <?php if(get_option('ace_nav_submenu_border_color')) { ?>.nav ul ul, .nav ul ul li {border-color: <?php echo get_option('ace_nav_submenu_border_color'); ?>;}<?php } ?>

    <?php if(get_option('ace_link')) { ?>
  	.sc-flex-direction-nav li a.sc-flex-next .fa,
  	.sc-flex-direction-nav li a.sc-flex-prev .fa {
      color: <?php echo get_option('ace_link'); ?>;
    }
    <?php } ?>

    <?php if(get_option('ace_link')) { ?>
    .responsiveslides_tabs li.responsiveslides_here a,
  	.sc-flex-control-nav li a.sc-flex-active,
  	.sc-flex-control-nav li a:hover,
    .nivo-controlNav a.active,
    .pagination a:hover,
	   .pagination .current {
      background: <?php echo get_option('ace_link'); ?>;
    }
    <?php } ?>

    <?php if(get_option('ace_button_bg')) { ?>
    button,
    .post-button,
    .input-button,
    input[type=submit],
    div.wpforms-container-full .wpforms-form button {
      background: <?php echo get_option('ace_button_bg'); ?>;
      <?php if(get_option('ace_button_border')) { ?>border: 1px solid <?php echo get_option('ace_button_border'); ?>;<?php } ?>
      <?php if(get_option('ace_button_text')) { ?>color: <?php echo get_option('ace_button_text'); ?>;<?php } ?>
    }
    <?php } ?>

    <?php if(get_option('ace_button_bg_hover')) { ?>
    button:hover,
    .post-button:hover,
    .input-button:hover,
    input[type=submit]:hover,
    div.wpforms-container-full .wpforms-form button:hover {
      background: <?php echo get_option('ace_button_bg_hover'); ?>;
      <?php if(get_option('ace_button_border_hover')) { ?>border: 1px solid <?php echo get_option('ace_button_border_hover'); ?>;<?php } ?>
      <?php if(get_option('ace_button_text_hover')) { ?>color: <?php echo get_option('ace_button_text_hover'); ?>;<?php } ?>
    }
    <?php } ?>

    <?php if(get_option('ace_button_bg')) { ?>.side-search-form .sideform-button  {color: <?php echo get_option('ace_button_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_button_bg_hover')) { ?>.side-search-form .sideform-button:hover {color: <?php echo get_option('ace_button_bg_hover'); ?>;}<?php } ?>

    <?php if(get_option('ace_button_bg')) { ?>
    .nav li.nav-button a {
      background: <?php echo get_option('ace_button_bg'); ?>;
      <?php if(get_option('ace_button_text')) { ?>color: <?php echo get_option('ace_button_text'); ?>;<?php } ?>
    }
    <?php } ?>
  	<?php if(get_option('ace_button_bg_hover')) { ?>
    .nav li.nav-button a:hover,
		.nav li.nav-button .current-menu-item > a,
		.nav li.nav-button .current-menu-ancestor > a,
		.nav li.nav-button .current_page_item > a,
		.nav li.nav-button .current_page_ancestor > a {
      background: <?php echo get_option('ace_button_bg_hover'); ?>;
      <?php if(get_option('ace_button_text_hover')) { ?>color: <?php echo get_option('ace_button_text_hover'); ?>;<?php } ?>
    }
    <?php } ?>

    <?php if(get_option('ace_text_color')) { ?>body {color: <?php echo get_option('ace_text_color'); ?>;}<?php } ?>
    <?php if(get_option('ace_border_color')) { ?>.side-widget, .widget_categories ul li, .footer-inner-wrap {border-color: <?php echo get_option('ace_border_color'); ?>;}<?php } ?>
    <?php if(get_option('ace_border_color')) { ?>.article .post-date:before {background: <?php echo get_option('ace_border_color'); ?>;}<?php } ?>

    <?php if(get_option('ace_page_post_title')) { ?>.article .page-title {color: <?php echo get_option('ace_page_post_title'); ?>;}<?php } ?>
    <?php if(get_option('ace_page_post_title_link')) { ?>.article .post-title a {color: <?php echo get_option('ace_page_post_title_link'); ?>;}<?php } ?>
    <?php if(get_option('ace_page_post_title_link_hover')) { ?>.article .post-title a:hover {color: <?php echo get_option('ace_page_post_title_link_hover'); ?> !important;}<?php } ?>

    <?php if(get_option('ace_post_category_bg')) { ?>.article .post-list-category {background: <?php echo get_option('ace_post_category_bg'); ?> !important;}<?php } ?>
    <?php if(get_option('ace_post_category_link')) { ?>.article .post-list-category a {color: <?php echo get_option('ace_post_category_link'); ?> !important;}<?php } ?>

    <?php if(get_option('ace_post_comment_meta_bg')) { ?>.article .post-meta {background: <?php echo get_option('ace_post_comment_meta_bg'); ?> !important;}<?php } ?>
    <?php if(get_option('ace_post_comment_meta_text')) { ?>.article .post-meta {color: <?php echo get_option('ace_post_comment_meta_text'); ?> !important;}<?php } ?>

    <?php if(get_option('ace_button_bg')) { ?>#cancel-comment-reply-link, a.comment-reply-link {background: <?php echo get_option('ace_button_bg'); ?>; <?php if(get_option('ace_button_text')) { ?>color: <?php echo get_option('ace_button_text'); ?>;<?php } ?>}<?php } ?>

    <?php if(get_option('ace_sidebar_widget_title')) { ?>.side-widget h3 {color: <?php echo get_option('ace_sidebar_widget_title'); ?>;}<?php } ?>
    <?php if(get_option('ace_footer_widget_title')) { ?>.footer-widget h4 {color: <?php echo get_option('ace_footer_widget_title'); ?>;}<?php } ?>

    <?php if(get_option('ace_footer_background')) { ?>.footer-inner-wrap {background: <?php echo get_option('ace_footer_background'); ?>;}<?php } ?>
    <?php if(get_option('ace_footer_text')) { ?>.footer {color: <?php echo get_option('ace_footer_text'); ?>;}<?php } ?>
    <?php if(get_option('ace_footer_credit_background')) { ?>.footer {background: <?php echo get_option('ace_footer_credit_background'); ?>;}<?php } ?>
    <?php if(get_option('ace_footer_credit_text')) { ?>.footer-copy {color: <?php echo get_option('ace_footer_credit_text'); ?>;}<?php } ?>

    <?php if(get_option('ace_caption_bg')) { ?>.responsiveslides-slide li .responsiveslides-caption {background: <?php echo get_option('ace_caption_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_caption_text')) { ?>.responsiveslides-slide li .responsiveslides-caption h3 {color: <?php echo get_option('ace_caption_text'); ?>;}<?php } ?>
    <?php if(get_option('ace_arrow_bg')) { ?>.responsiveslides .next, .responsiveslides .prev {background-color: <?php echo get_option('ace_arrow_bg'); ?>;}<?php } ?>

    <?php if(get_option('ace_accordion_bg')) { ?>.accordion-title {background-color: <?php echo get_option('ace_accordion_bg'); ?>; color: <?php echo get_option('ace_accordion_text'); ?>;}<?php } ?>
    <?php if(get_option('ace_accordion_bg_hover')) { ?>.accordion-open {background-color: <?php echo get_option('ace_accordion_bg_hover'); ?>; color: <?php echo get_option('ace_accordion_text_hover'); ?>;}<?php } ?>

    <?php if(get_option('ace_widget_twitter_bg')) { ?>ul.social-icons .fa-twitter {color: <?php if(get_option('ace_widget_twitter_bg')) { echo get_option('ace_widget_twitter_bg'); } else { echo '#cccccc'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_fb_bg')) { ?>ul.social-icons .fa-facebook-f {color: <?php if(get_option('ace_widget_fb_bg')) { echo get_option('ace_widget_fb_bg'); } else { echo '#cccccc'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_email_bg')) { ?>ul.social-icons .fa-envelope {color: <?php if(get_option('ace_widget_email_bg')) { echo get_option('ace_widget_email_bg'); } else { echo '#cccccc'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_rss_bg')) { ?>ul.social-icons .fa-rss {color: <?php if(get_option('ace_widget_rss_bg')) { echo get_option('ace_widget_rss_bg'); } else { echo '#cccccc'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_google_bg')) { ?>ul.social-icons .fa-google-plus {color: <?php if(get_option('ace_widget_google_bg')) { echo get_option('ace_widget_google_bg'); } else { echo '#cccccc'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_flickr_bg')) { ?>ul.social-icons .fa-flickr {color: <?php if(get_option('ace_widget_flickr_bg')) { echo get_option('ace_widget_flickr_bg'); } else { echo '#cccccc'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_linkedin_bg')) { ?>ul.social-icons .fa-linkedin {color: <?php if(get_option('ace_widget_linkedin_bg')) { echo get_option('ace_widget_linkedin_bg'); } else { echo '#cccccc'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_youtube_bg')) { ?>ul.social-icons .fa-youtube {color: <?php if(get_option('ace_widget_youtube_bg')) { echo get_option('ace_widget_youtube_bg'); } else { echo '#cccccc'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_vimeo_bg')) { ?>ul.social-icons .fa-vimeo-square {color: <?php if(get_option('ace_widget_vimeo_bg')) { echo get_option('ace_widget_vimeo_bg'); } else { echo '#cccccc'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_instagram_bg')) { ?>ul.social-icons .fa-instagram {color: <?php if(get_option('ace_widget_instagram_bg')) { echo get_option('ace_widget_instagram_bg'); } else { echo '#cccccc'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_bloglovin_bg')) { ?>ul.social-icons .fa-plus {color: <?php if(get_option('ace_widget_bloglovin_bg')) { echo get_option('ace_widget_bloglovin_bg'); } else { echo '#cccccc'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_pinterest_bg')) { ?>ul.social-icons .fa-pinterest-p {color: <?php if(get_option('ace_widget_pinterest_bg')) { echo get_option('ace_widget_pinterest_bg'); } else { echo '#cccccc'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_tumblr_bg')) { ?>ul.social-icons .fa-tumblr {color: <?php if(get_option('ace_widget_tumblr_bg')) { echo get_option('ace_widget_tumblr_bg'); } else { echo '#cccccc'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_houzz_bg')) { ?>ul.social-icons .fa-houzz {color: <?php echo get_option('ace_widget_houzz_bg'); ?>;}<?php } ?>

    <?php if(get_option('ace_widget_twitter_bg_hover')) { ?>ul.social-icons .fa-twitter:hover {color: <?php if(get_option('ace_widget_twitter_bg_hover')) { echo get_option('ace_widget_twitter_bg_hover'); } else { echo '#269dd5'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_fb_bg_hover')) { ?>ul.social-icons .fa-facebook-f:hover {color: <?php if(get_option('ace_widget_fb_bg_hover')) { echo get_option('ace_widget_fb_bg_hover'); } else { echo '#0c42b2'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_email_bg_hover')) { ?>ul.social-icons .fa-envelope:hover {color: <?php if(get_option('ace_widget_email_bg_hover')) { echo get_option('ace_widget_email_bg_hover'); } else { echo '#aaaaaa'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_rss_bg_hover')) { ?>ul.social-icons .fa-rss:hover {color: <?php if(get_option('ace_widget_rss_bg_hover')) { echo get_option('ace_widget_rss_bg_hover'); } else { echo '#f49000'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_google_bg_hover')) { ?>ul.social-icons .fa-google-plus:hover {color: <?php if(get_option('ace_widget_google_bg_hover')) { echo get_option('ace_widget_google_bg_hover'); } else { echo '#fd3000'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_flickr_bg_hover')) { ?>ul.social-icons .fa-flickr:hover {color: <?php if(get_option('ace_widget_flickr_bg_hover')) { echo get_option('ace_widget_flickr_bg_hover'); } else { echo '#fc0077'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_linkedin_bg_hover')) { ?>ul.social-icons .fa-linkedin:hover {color: <?php if(get_option('ace_widget_linkedin_bg_hover')) { echo get_option('ace_widget_linkedin_bg_hover'); } else { echo '#0d5a7b'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_youtube_bg_hover')) { ?>ul.social-icons .fa-youtube:hover {color: <?php if(get_option('ace_widget_youtube_bg_hover')) { echo get_option('ace_widget_youtube_bg_hover'); } else { echo '#ff0000'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_vimeo_bg_hover')) { ?>ul.social-icons .fa-vimeo-square:hover {color: <?php if(get_option('ace_widget_vimeo_bg_hover')) { echo get_option('ace_widget_vimeo_bg_hover'); } else { echo '#00c1f8'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_instagram_bg_hover')) { ?>ul.social-icons .fa-instagram:hover {color: <?php if(get_option('ace_widget_instagram_bg_hover')) { echo get_option('ace_widget_instagram_bg_hover'); } else { echo '#194f7a'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_bloglovin_bg_hover')) { ?>ul.social-icons .fa-plus:hover {color: <?php if(get_option('ace_widget_bloglovin_bg_hover')) { echo get_option('ace_widget_bloglovin_bg_hover'); } else { echo '#00c4fd'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_pinterest_bg_hover')) { ?>ul.social-icons .fa-pinterest-p:hover {color: <?php if(get_option('ace_widget_pinterest_bg_hover')) { echo get_option('ace_widget_pinterest_bg_hover'); } else { echo '#c70505'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_tumblr_bg_hover')) { ?>ul.social-icons .fa-tumblr:hover {color: <?php if(get_option('ace_widget_tumblr_bg_hover')) { echo get_option('ace_widget_tumblr_bg_hover'); } else { echo '#304d6b'; } ?>;}<?php } ?>
    <?php if(get_option('ace_widget_houzz_bg_hover')) { ?>ul.social-icons .fa-houzz:hover {color: <?php echo get_option('ace_widget_houzz_bg_hover'); ?>;}<?php } ?>

    <?php if(get_option('ace_icons_border')) { ?>.footer-icons {border-color: <?php echo get_option('ace_icons_border'); ?>;}<?php } ?>

    <?php if(get_option('ace_rss_bg')) { ?>ul.ace-social-icons .fa-rss {background: <?php echo get_option('ace_rss_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_twitter_bg')) { ?>ul.ace-social-icons .fa-twitter {background: <?php echo get_option('ace_twitter_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_facebook_bg')) { ?>ul.ace-social-icons .fa-facebook-f {background: <?php echo get_option('ace_facebook_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_pinterest_bg')) { ?>ul.ace-social-icons .fa-pinterest-p {background: <?php echo get_option('ace_pinterest_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_email_bg')) { ?>ul.ace-social-icons .footer-email {background: <?php echo get_option('ace_email_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_flickr_bg')) { ?>ul.ace-social-icons .fa-flickr {background: <?php echo get_option('ace_flickr_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_linkedin_bg')) { ?>ul.ace-social-icons .fa-linkedin {background: <?php echo get_option('ace_linkedin_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_youtube_bg')) { ?>ul.ace-social-icons .fa-youtube {background: <?php echo get_option('ace_youtube_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_vimeo_bg')) { ?>ul.ace-social-icons .fa-vimeo-square {background: <?php echo get_option('ace_vimeo_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_google_plus_bg')) { ?>ul.ace-social-icons .fa-google-plus {background: <?php echo get_option('ace_google_plus_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_instagram_bg')) { ?>ul.ace-social-icons .fa-instagram {background: <?php echo get_option('ace_instagram_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_bloglovin_bg')) { ?>ul.ace-social-icons .fa-plus {background: <?php echo get_option('ace_bloglovin_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_tumblr_bg')) { ?>ul.ace-social-icons .fa-tumblr {background: <?php echo get_option('ace_tumblr_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_houzz_bg')) { ?>ul.ace-social-icons .fa-houzz {color: <?php echo get_option('ace_houzz_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_email_bg')) { ?>ul.ace-social-icons .fa-envelope {background: <?php echo get_option('ace_email_bg'); ?>;}<?php } ?>

    <?php if(get_option('ace_rss_bg_hover')) { ?>ul.ace-social-icons .fa-rss:hover {background: <?php echo get_option('ace_rss_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_twitter_bg_hover')) { ?>ul.ace-social-icons .fa-twitter:hover {background: <?php echo get_option('ace_twitter_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_facebook_bg_hover')) { ?>ul.ace-social-icons .fa-facebook-f:hover {background: <?php echo get_option('ace_facebook_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_pinterest_bg_hover')) { ?>ul.ace-social-icons .fa-pinterest-p:hover {background: <?php echo get_option('ace_pinterest_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_email_bg_hover')) { ?>ul.ace-social-icons .footer-email:hover {background: <?php echo get_option('ace_email_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_flickr_bg_hover')) { ?>ul.ace-social-icons .fa-flickr:hover {background: <?php echo get_option('ace_flickr_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_linkedin_bg_hover')) { ?>ul.ace-social-icons .fa-linkedin:hover {background: <?php echo get_option('ace_linkedin_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_youtube_bg_hover')) { ?>ul.ace-social-icons .fa-youtube:hover {background: <?php echo get_option('ace_youtube_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_vimeo_bg_hover')) { ?>ul.ace-social-icons .fa-vimeo-square:hover {background: <?php echo get_option('ace_vimeo_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_google_plus_bg_hover')) { ?>ul.ace-social-icons .fa-google-plus:hover {background: <?php echo get_option('ace_google_plus_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_instagram_bg_hover')) { ?>ul.ace-social-icons .fa-instagram:hover {background: <?php echo get_option('ace_instagram_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_bloglovin_bg_hover')) { ?>ul.ace-social-icons .fa-plus:hover {background: <?php echo get_option('ace_bloglovin_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_tumblr_bg_hover')) { ?>ul.ace-social-icons .fa-tumblr:hover {background: <?php echo get_option('ace_tumblr_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_houzz_bg_hover')) { ?>ul.ace-social-icons .fa-houzz:hover {color: <?php echo get_option('ace_houzz_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_email_bg_hover')) { ?>ul.ace-social-icons .fa-envelope:hover {background: <?php echo get_option('ace_email_bg_hover'); ?>;}<?php } ?>

  	<?php if(get_option('ace_newsletter_bg')) { ?>.newsletter-section {background: <?php echo get_option('ace_newsletter_bg'); ?>;}<?php } ?>
  	<?php if(get_option('ace_newsletter_text')) { ?>.newsletter-section {color: <?php echo get_option('ace_newsletter_text'); ?>;}<?php } ?>

    <?php if(get_option('ace_hide_comment')) { ?>.nocomments {display: none;}<?php } ?>

    <?php if(get_option('ace_blog_layout') == 'blog-sidebar-content') { ?>
    .section {float: right;}
    .aside {float: left;}
    <?php } ?>

    <?php if(class_exists('Jetpack') && Jetpack::is_module_active('infinite-scroll')) : ?>
    .pagination {display: none !important;}
    .infinite-scroll .woocommerce-pagination {display: block !important;}
    <?php endif; ?>

    <?php if(get_option('ace_disable_google_fonts')) { ?>body {font-family: Arial, Verdana, Tahoma, Sans-serif;}<?php } ?>

    <?php if(get_option('ace_button_bg_hover')) { ?>
    .wp-block-button .wp-block-button__link:hover {
    background: <?php echo get_option('ace_button_bg_hover'); ?>;
    <?php if(get_option('ace_button_text_hover')) { ?>color: <?php echo get_option('ace_button_text_hover'); ?>;<?php } ?>
    }
    .wp-block-button.is-style-outline .wp-block-button__link:hover {
    background: transparent;
    border-color: <?php echo get_option('ace_button_bg_hover'); ?>;
    color: <?php echo get_option('ace_button_bg_hover'); ?>;
    }
    <?php } ?>

  </style>
<?php }
add_action('wp_head', 'ace_theme_css');

// ==================================================================
// Breadcrumb
// ==================================================================
function ace_breadcrumb() {
  if(get_option('ace_enable_breadcrumb')) { echo get_breadcrumb(); }
}

// ==================================================================
// Sticky menu
// ==================================================================
if(get_option('ace_sticky_menu')) {
  function ace_sticky_menu_script(){ ?>
	<script type="text/javascript">
	/* <![CDATA[ */
	var $ = jQuery.noConflict();
	jQuery(document).ready(function($){ // START

    if($('.nav').length){

    	var stickyMenu = document.querySelector(".nav");
    	var navPosition = $('.nav').offset();
    	window.onscroll = function() {
    		if($(window).scrollTop() > navPosition.top){
    		stickyMenu.classList.add("fixed-menu");
    		stickyMenu.style.top = 0;
    	  } else {
    		stickyMenu.classList.remove("fixed-menu");
    	  };
    	}

    }

	}); // END
	/* ]]> */
	</script>
  <?php }
  add_action('wp_footer', 'ace_sticky_menu_script', 100);
}

// ==================================================================
// Header background
// ==================================================================
function ace_header_background() {
	if(is_page()) {
		if(has_post_thumbnail()) { the_post_thumbnail_url(); } else {
			if(get_option('ace_header_bg')) { echo esc_url(get_option('ace_header_bg')); } else { echo get_template_directory_uri(); echo '/images/header-default.jpg';}
		}
	} else {
		if(get_option('ace_header_bg')) { echo esc_url(get_option('ace_header_bg')); } else { echo get_template_directory_uri(); echo '/images/header-default.jpg';}
	}
}

// ==================================================================
// Heading
// ==================================================================
function ace_heading() {
  if(get_header_image() == true) { ?>
    <a href="<?php echo esc_url(home_url()); ?>">
      <img src="<?php header_image(); ?>" class="aligncenter" style="width:calc(<?php echo get_custom_header()->width; ?>px/2); height:auto;" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
    </a>
	<section class="hidden">
		<?php if(is_home() || is_front_page()) { ?>
			<h1><a href="<?php echo esc_url(home_url()); ?>" class="header-title"><?php bloginfo('name'); ?></a></h1>
			<p class="hidden"><?php bloginfo('description'); ?></p>
		<?php } else { ?>
			<h5><a href="<?php echo esc_url(home_url()); ?>" class="header-title"><?php bloginfo('name'); ?></a></h5>
			<p class="hidden"><?php bloginfo('description'); ?></p>
		<?php } ?>
	</section>
  <?php } elseif(is_home() || is_front_page()) { ?>
      <h1><a href="<?php echo esc_url(home_url()); ?>" class="header-title"><?php bloginfo('name'); ?></a></h1>
      <p class="header-desc"><?php bloginfo('description'); ?></p>
  <?php } else { ?>
      <h5><a href="<?php echo esc_url(home_url()); ?>" class="header-title"><?php bloginfo('name'); ?></a></h5>
      <p class="header-desc"><?php bloginfo('description'); ?></p>
  <?php }
}

// ==================================================================
// Footer heading
// ==================================================================
function ace_footer_heading() {
?>
  <?php if(is_home() || is_front_page()) { ?>
      <h1 class="footer-title"><a href="<?php echo esc_url(home_url()); ?>" class="header-title"><?php bloginfo('name'); ?></a></h1>
  <?php } else { ?>
      <h5 class="footer-title"><a href="<?php echo esc_url(home_url()); ?>" class="header-title"><?php bloginfo('name'); ?></a></h5>
  <?php }
}

// ==================================================================
// Header scripts
// ==================================================================
function ace_header_scripts() {
	if(get_option('ace_header_scripts')) { echo stripslashes_deep(get_option('ace_header_scripts')); }
}
add_action('wp_head', 'ace_header_scripts');

// ==================================================================
// Footer scripts
// ==================================================================
function ace_footer_scripts() {
	if(get_option('ace_footer_scripts')) { echo stripslashes_deep(get_option('ace_footer_scripts')); }
}
add_action('wp_footer', 'ace_footer_scripts');

// ==================================================================
// Privacy policy
// ==================================================================
function ace_footer_privacy() {
	if(function_exists('the_privacy_policy_link')) {
		if(!get_option('ace_privacy')) {
			the_privacy_policy_link('', '');
		}
	}
}

// ==================================================================
// Newsletter
// ==================================================================
function ace_newsletter_section() { ?>
	<section class="newsletter-section">
    <?php echo do_shortcode(stripslashes_deep(get_option('ace_newsletter'))); ?>
	</section>
<?php }

// ==================================================================
// Newsletter on top
// ==================================================================
function ace_newsletter_top() {
	if(get_option('ace_newsletter_location') == 'Top') {
		if(get_option('ace_newsletter_home')) {
			if(is_front_page()) {
				if(get_option('ace_newsletter')) {
					ace_newsletter_section();
				}
			}
		} else {
			if(get_option('ace_newsletter')) {
				ace_newsletter_section();
			}
		}
	} elseif(get_option('ace_newsletter_location') == 'Both') {
		if(get_option('ace_newsletter_home')) {
			if(is_front_page()) {
				if(get_option('ace_newsletter')) {
					ace_newsletter_section();
				}
			}
		} else {
			if(get_option('ace_newsletter')) {
				ace_newsletter_section();
			}
		}
	}


}

// ==================================================================
// Newsletter on bottom
// ==================================================================
function ace_newsletter_bottom() {
	if(get_option('ace_newsletter_location') == 'Bottom') {
		if(get_option('ace_newsletter_home')) {
			if(is_front_page()) {
				if(get_option('ace_newsletter')) {
					ace_newsletter_section();
				}
			}
		} else {
			if(get_option('ace_newsletter')) {
				ace_newsletter_section();
			}
		}
	} elseif(get_option('ace_newsletter_location') == 'Both') {
		if(get_option('ace_newsletter_home')) {
			if(is_front_page()) {
				if(get_option('ace_newsletter')) {
					ace_newsletter_section();
				}
			}
		} else {
			if(get_option('ace_newsletter')) {
				ace_newsletter_section();
			}
		}
	}
}

// ==================================================================
// Add terms before comment
// ==================================================================
if(get_option('ace_comment_text')) {

	function ace_text_before_comment_form() {
		$text_before_comment = stripslashes_deep(get_option('ace_comment_text'));
		$commenter = wp_get_current_commenter();
		echo '<div class="disclaim comment-disclaim"><i class="fa fa-exclamation-circle"></i>&nbsp;' .$text_before_comment. '</div>';
	}
	add_action('comment_form_after_fields', 'ace_text_before_comment_form');

}

// ==================================================================
// Cookie consent
// ==================================================================
if(get_option('ace_enable_consent')) {

  function ace_cookie() { ?>

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script type="text/javascript">
    window.addEventListener("load", function() {
    window.cookieconsent.initialise({

        "palette": {
            "popup": {
                "background": "<?php if(get_option('ace_cookie_bg')) { echo get_option('ace_cookie_bg'); } else { echo '#222'; } ?>",
                "text": "<?php if(get_option('ace_cookie_text')) { echo get_option('ace_cookie_text'); } else { echo '#fff'; } ?>"
            },
            "button": {
                "background": "<?php if(get_option('ace_cookie_button')) { echo get_option('ace_cookie_button'); } else { echo '#000'; } ?>",
                "text": "<?php if(get_option('ace_cookie_button_text')) { echo get_option('ace_cookie_button_text'); } else { echo '#fff'; } ?>"
            }
        },

        "theme": "edgeless",
        "position": "bottom",

        "content": {
            "message": "<?php if(get_option('ace_cookie_content')) { echo get_option('ace_cookie_content'); } ?>",
            "dismiss": "<?php if(get_option('ace_cookie_dismiss')) { echo get_option('ace_cookie_dismiss'); } ?>",
            "link": "<?php if(get_option('ace_cookie_read')) { echo get_option('ace_cookie_read'); } ?>",
            "href": "<?php if(get_option('ace_cookie_read_link')) { echo get_option('ace_cookie_read_link'); } ?>"
        },

        "cookie": {
            "expiryDays": <?php if(get_option('ace_cookie_expire')) { echo get_option('ace_cookie_expire'); } ?>,
        },


    })
    });
    </script>

  <?php }
  add_action('wp_footer', 'ace_cookie');

}
