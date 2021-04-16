<?php
//// ==================================================================
// Theme options settings
//// ==================================================================
$themename  = 'Theme';
$shortname  = 'ace_';
$options    = array (

array(
  'name'  =>  'Theme',
  'type'  =>  'header'
),

//// ==================================================================
// General
//// ==================================================================
array('type'=>'class', 'class'=>'<div id="general">'),
array(
  'name'  =>  'Header background image',
  'id'    =>  $shortname.'header_bg',
  'type'  =>  'upload',
  "size"  =>  '1600x420 or larger',
  'note'  =>  '',
  'std'   =>  '',
),
array(
  'name'  => 'Sticky menu',
  'id'    => $shortname.'sticky_menu',
  'type'  => 'checkbox',
  'note'  => 'Check to stick menu on top.',
),
array(
  'name'  => 'Colorbox',
  'id'    => $shortname.'disable_colorbox',
  'type'  => 'checkbox',
  'note'  => 'Disable Colorbox pop-up',
),
/*
array(
  'name'  => 'Infinite scrolling',
  'id'    => $shortname.'infinite_scroll',
  'type'  => 'checkbox',
  'note'  => 'Check to use infinite scroll loading of posts.',
),
*/
array(
  'name'  => 'Open new windows',
  'id'    => $shortname.'new_window',
  'type'  => 'checkbox',
  'note'  => 'Check to open blog link in new windows.',
),
array(
  'name'    =>  'Blog layout',
  'id'      =>  $shortname.'blog_layout',
  'type'    =>  'image',
  'std'     =>  'blog-content-sidebar',
  'options' =>  array(
    array('name'  => 'blog-content-sidebar', 'value' => 'blog-content-sidebar.gif', 'desc'=>'Content - Sidebar'),
    array('name'  => 'blog-sidebar-content', 'value' => 'blog-sidebar-content.gif', 'desc'=>'Sidebar - Content'),
 ),
),
array(
  'name'  =>  'Footer credit',
  'id'    =>  $shortname.'footer_credit',
  'type'  =>  'textarea',
  'note'  =>  '',
),
array(
  'name'  => 'Privacy link at footer',
  'id'    => $shortname.'privacy',
  'type'  => 'checkbox',
  'note'  => 'Disable privacy link at footer',
),
array(
  'name'  => 'Text before comment',
  'id'    => $shortname.'comment_text',
  'type'  => 'textarea',
  'note'  => 'Text before comment. You can place privacy concern or terms before the comment form',
),
array('type'=>'class', 'class'=>'</div>'),

//// ==================================================================
// Colors
//// ==================================================================
array('type'=>'class', 'class'=>'<div id="colors">'),
// ============================== Overall
array(
  'type'  => 'title',
  'note'  => 'Overall',
),
array(
  'name'  => 'Text color',
  'id'    => $shortname.'text_color',
  'type'  => 'color',
  'note'  => 'text_color',
  'std'   => '#444444',
),
array(
  'name'  => 'Border color',
  'id'    => $shortname.'border_color',
  'type'  => 'color',
  'note'  => 'border_color',
  'std'   => '#e6e6e6',
),
// ============================== Menu
array(
  'type'  => 'title',
  'note'  => 'Menu',
),
array(
  'name'  => 'Menu bar color',
  'id'    => $shortname.'nav_bar',
  'type'  => 'color',
  'note'  => 'nav_bar',
  'std'   => '#ffffff',
),
array(
  'name'  => 'Menu link color',
  'id'    => $shortname.'nav_link',
  'type'  => 'color',
  'note'  => 'nav_link',
  'std'   => '#000000',
),
array(
  'name'  => 'Menu link hover hover color',
  'id'    => $shortname.'nav_link_hover',
  'type'  => 'color',
  'note'  => 'nav_link_hover',
  'std'   => '#fc477e',
),
array(
  'name'  => 'Submenu border color',
  'id'    => $shortname.'nav_submenu_border_color',
  'type'  => 'color',
  'note'  => 'nav_submenu_border_color',
  'std'   => '#eeeeee',
),
// ============================== Page/Post Title
array(
  'type'  => 'title',
  'note'  => 'Page/Post Title',
),
array(
  'name'  => 'Page title color',
  'id'    => $shortname.'page_post_title',
  'type'  => 'color',
  'note'  => 'page_page_title',
  'std'   => '#000000',
),
array(
  'name'  => 'Post title link color',
  'id'    => $shortname.'page_post_title_link',
  'type'  => 'color',
  'note'  => 'page_post_title_link',
  'std'   => '#000000',
),
array(
  'name'  => 'Post title link hover color',
  'id'    => $shortname.'page_post_title_link_hover',
  'type'  => 'color',
  'note'  => 'page_post_title_link_hover',
  'std'   => '#fc477e',
),
// ============================== Post Category
array(
  'type'  => 'title',
  'note'  => 'Post Category',
),
array(
  'name'  => 'Category background color',
  'id'    => $shortname.'post_category_bg',
  'type'  => 'color',
  'note'  => 'post_category_bg',
  'std'   => '#fff1ee',
),
array(
  'name'  => 'Category link color',
  'id'    => $shortname.'post_category_link',
  'type'  => 'color',
  'note'  => 'post_category_link',
  'std'   => '#000000',
),// ============================== Post Comment Meta
array(
  'type'  => 'title',
  'note'  => 'Post Comment Meta',
),
array(
  'name'  => 'Comment meta background color',
  'id'    => $shortname.'post_comment_meta_bg',
  'type'  => 'color',
  'note'  => 'post_comment_meta_bg',
  'std'   => '#fff1ee',
),
array(
  'name'  => 'Comment meta text color',
  'id'    => $shortname.'post_comment_meta_text',
  'type'  => 'color',
  'note'  => 'post_comment_meta_text',
  'std'   => '#000000',
),
// ============================== Sidebar
array(
  'type'  => 'title',
  'note'  => 'Sidebar Widget',
),
array(
  'name'  => 'Sidebar widget title color',
  'id'    => $shortname.'sidebar_widget_title',
  'type'  => 'color',
  'note'  => 'sidebar_widget_title',
  'std'   => '#000000',
),
// ============================== Footer
array(
  'type'  => 'title',
  'note'  => 'Footer',
),
array(
  'name'  => 'Footer background color',
  'id'    => $shortname.'footer_background',
  'type'  => 'color',
  'note'  => 'footer_background',
  'std'   => '#ffffff',
),
array(
  'name'  => 'Footer widget title color',
  'id'    => $shortname.'footer_widget_title',
  'type'  => 'color',
  'note'  => 'footer_widget_title',
  'std'   => '#222222',
),
array(
  'name'  => 'Footer text color',
  'id'    => $shortname.'footer_text',
  'type'  => 'color',
  'note'  => 'footer_text',
  'std'   => '#444444',
),
array(
  'name'  => 'Footer credit background color',
  'id'    => $shortname.'footer_credit_background',
  'type'  => 'color',
  'note'  => 'footer_credit_background',
  'std'   => '#fff1ee',
),
array(
  'name'  => 'Footer credit text color',
  'id'    => $shortname.'footer_credit_text',
  'type'  => 'color',
  'note'  => 'footer_credit_text',
  'std'   => '#666666',
),
// ============================== Links
array(
  'type'  => 'title',
  'note'  => 'Links',
),
array(
  'name'  => 'Link color',
  'id'    => $shortname.'link',
  'type'  => 'color',
  'note'  => 'link',
  'std'   => '#fc477e',
),
array(
  'name'  => 'Link hover color',
  'id'    => $shortname.'link_hover',
  'type'  => 'color',
  'note'  => 'link_hover',
  'std'   => '#000000',
),
// ============================== Heading
array(
  'type'  => 'title',
  'note'  => 'Heading',
),
array(
  'name'  => 'H1 color',
  'id'    => $shortname.'h1',
  'type'  => 'color',
  'note'  => 'h1',
  'std'   => '#000000',
),
array(
  'name'  => 'H2 color',
  'id'    => $shortname.'h2',
  'type'  => 'color',
  'note'  => 'h2',
  'std'   => '#000000',
),
array(
  'name'  => 'H3 color',
  'id'    => $shortname.'h3',
  'type'  => 'color',
  'note'  => 'h3',
  'std'   => '#444444',
),
array(
  'name'  => 'H4 color',
  'id'    => $shortname.'h4',
  'type'  => 'color',
  'note'  => 'h4',
  'std'   => '#444444',
),
array(
  'name'  => 'H5 color',
  'id'    => $shortname.'h5',
  'type'  => 'color',
  'note'  => 'h5',
  'std'   => '#555555',
),
array(
  'name'  => 'H6 color',
  'id'    => $shortname.'h6',
  'type'  => 'color',
  'note'  => 'h6',
  'std'   => '#555555',
),
// ============================== Button
array(
  'type'  => 'title',
  'note'  => 'Button',
),
array(
  'name'  => 'Background color',
  'id'    => $shortname.'button_bg',
  'type'  => 'color',
  'note'  => 'button_bg',
  'std'   => '#000000',
),
array(
  'name'  => 'Border color',
  'id'    => $shortname.'button_border',
  'type'  => 'color',
  'note'  => 'button_border',
  'std'   => '#000000',
),
array(
  'name'  => 'Text color',
  'id'    => $shortname.'button_text',
  'type'  => 'color',
  'note'  => 'button_text',
  'std'   => '#ffffff',
),
array(
  'name'  => 'Hover background color',
  'id'    => $shortname.'button_bg_hover',
  'type'  => 'color',
  'note'  => 'button_bg_hover',
  'std'   => '#fc477e',
),
array(
  'name'  => 'Hover border color',
  'id'    => $shortname.'button_border_hover',
  'type'  => 'color',
  'note'  => 'button_border_hover',
  'std'   => '#fc477e',
),
array(
  'name'  => 'Hover text color',
  'id'    => $shortname.'button_text_hover',
  'type'  => 'color',
  'note'  => 'button_text_hover',
  'std'   => '#ffffff',
),
// ============================== Accordion
array(
  'type'  => 'title',
  'note'  => 'Accordion',
),
array(
  'name'  => 'Background color',
  'id'    => $shortname.'accordion_bg',
  'type'  => 'color',
  'note'  => 'accordion_bg',
  'std'   => '#000000',
),
array(
  'name'  => 'Text color',
  'id'    => $shortname.'accordion_text',
  'type'  => 'color',
  'note'  => 'accordion_text',
  'std'   => '#ffffff',
),
array(
  'name'  => 'Hover background color',
  'id'    => $shortname.'accordion_bg_hover',
  'type'  => 'color',
  'note'  => 'accordion_bg_hover',
  'std'   => '#fc477e',
),
array(
  'name'  => 'Hover text color',
  'id'    => $shortname.'accordion_text_hover',
  'type'  => 'color',
  'note'  => 'accordion_text_hover',
  'std'   => '#ffffff',
),
// ============================== Social Media
array(
  'type'  => 'title',
  'note'  => 'Widget Social Media Icons',
),
array(
  'name'  => 'Twitter icon color',
  'id'    => $shortname.'widget_twitter_bg',
  'type'  => 'color',
  'note'  => 'widget_twitter_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Twitter icon hover color',
  'id'    => $shortname.'widget_twitter_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_twitter_bg_hover',
  'std'   => '#269dd5',
),
array(
  'name'  => 'Facebook icon color',
  'id'    => $shortname.'widget_fb_bg',
  'type'  => 'color',
  'note'  => 'widget_fb_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Facebook icon hover color',
  'id'    => $shortname.'widget_fb_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_fb_bg_hover',
  'std'   => '#0c42b2',
),
array(
  'name'  => 'Email icon color',
  'id'    => $shortname.'widget_email_bg',
  'type'  => 'color',
  'note'  => 'widget_email_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Email icon hover color',
  'id'    => $shortname.'widget_email_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_email_bg_hover',
  'std'   => '#aaaaaa',
),
array(
  'name'  => 'RSS Feed icon color',
  'id'    => $shortname.'widget_rss_bg',
  'type'  => 'color',
  'note'  => 'widget_rss_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'RSS Feed icon hover color',
  'id'    => $shortname.'widget_rss_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_rss_bg_hover',
  'std'   => '#f49000',
),
array(
  'name'  => 'Google Plus icon color',
  'id'    => $shortname.'widget_google_bg',
  'type'  => 'color',
  'note'  => 'widget_google_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Google Plus icon hover color',
  'id'    => $shortname.'widget_google_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_google_bg_hover',
  'std'   => '#fd3000',
),
array(
  'name'  => 'Flickr icon color',
  'id'    => $shortname.'widget_flickr_bg',
  'type'  => 'color',
  'note'  => 'widget_flickr_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Flickr icon hover color',
  'id'    => $shortname.'widget_flickr_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_flickr_bg_hover',
  'std'   => '#fc0077',
),
array(
  'name'  => 'Linkedin icon color',
  'id'    => $shortname.'widget_linkedin_bg',
  'type'  => 'color',
  'note'  => 'widget_linkedin_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Linkedin icon hover color',
  'id'    => $shortname.'widget_linkedin_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_linkedin_bg_hover',
  'std'   => '#0d5a7b',
),
array(
  'name'  => 'YouTube icon color',
  'id'    => $shortname.'widget_youtube_bg',
  'type'  => 'color',
  'note'  => 'widget_youtube_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'YouTube icon hover color',
  'id'    => $shortname.'widget_youtube_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_youtube_bg_hover',
  'std'   => '#ff0000',
),
array(
  'name'  => 'Vimeo icon color',
  'id'    => $shortname.'widget_vimeo_bg',
  'type'  => 'color',
  'note'  => 'widget_vimeo_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Vimeo icon hover color',
  'id'    => $shortname.'widget_vimeo_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_vimeo_bg_hover',
  'std'   => '#00c1f8',
),
array(
  'name'  => 'Instagram icon color',
  'id'    => $shortname.'widget_instagram_bg',
  'type'  => 'color',
  'note'  => 'widget_instagram_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Instagram icon hover color',
  'id'    => $shortname.'widget_instagram_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_instagram_bg_hover',
  'std'   => '#194f7a',
),
array(
  'name'  => 'BlogLovin icon color',
  'id'    => $shortname.'widget_bloglovin_bg',
  'type'  => 'color',
  'note'  => 'widget_bloglovin_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'BlogLovin icon hover color',
  'id'    => $shortname.'widget_bloglovin_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_bloglovin_bg_hover',
  'std'   => '#00c4fd',
),
array(
  'name'  => 'Pinterest icon color',
  'id'    => $shortname.'widget_pinterest_bg',
  'type'  => 'color',
  'note'  => 'widget_pinterest_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Pinterest icon hover color',
  'id'    => $shortname.'widget_pinterest_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_pinterest_bg_hover',
  'std'   => '#c70505',
),
array(
  'name'  => 'Tumblr icon color',
  'id'    => $shortname.'widget_tumblr_bg',
  'type'  => 'color',
  'note'  => 'widget_tumblr_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Tumblr icon hover color',
  'id'    => $shortname.'widget_tumblr_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_tumblr_bg_hover',
  'std'   => '#304d6b',
),
array(
  'name'  => 'Houzz icon color',
  'id'    => $shortname.'widget_houzz_bg',
  'type'  => 'color',
  'note'  => 'widget_houzz_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Houzz icon hover color',
  'id'    => $shortname.'widget_houzz_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_houzz_bg_hover',
  'std'   => '#7ac142',
),
array('type'=>'class', 'class'=>'</div>'),

//// ==================================================================
// Extra inputs
//// ==================================================================
array('type'=>'class', 'class'=>'<div id="extra">'),
array(
  'name'  => 'Header script(s)',
  'id'    => $shortname.'header_scripts',
  'type'  => 'textarea',
  'note'  => 'Place your necessary code here, anything that needs to be placed before <strong>&#60;/head&#62;</strong>.',
),
array(
  'name'  => 'Footer script(s)',
  'id'    => $shortname.'footer_scripts',
  'type'  => 'textarea',
  'note'  => 'Place your necessary code here, anything that needs to be placed before <strong>&#60;/body&#62;</strong>.',
),
array(
  'name'  => 'Header banner',
  'id'    => $shortname.'header_banner',
  'type'  => 'textarea',
  'note'  => 'Show banner ad on top of the site.',
),
array(
  'name'  => 'Custom CSS',
  'id'    => $shortname.'css',
  'type'  => 'textarea',
  'note'  => 'Add some custom CSS to your theme.',
),
array('type'=>'class','class'=>'</div>'),

//// ==================================================================
// Entry
//// ==================================================================
array('type'=>'class', 'class'=>'<div id="entry">'),
array(
  'name'  => 'Enable Breadcrumb navigation',
  'id'    => $shortname.'enable_breadcrumb',
  'type'  => 'checkbox',
  'note'  => 'Enable <strong>breadcrumb navigation</strong>',
),
array(
  'name'  => 'Post banner',
  'id'    => $shortname.'post_banner',
  'type'  => 'textarea',
  'note'  => 'Insert banner at the bottom of a blog post',
),
array(
  'name'  => 'Hide post date',
  'id'    => $shortname.'hide_date',
  'type'  => 'checkbox',
  'note'  => 'Check to <strong>hide date</strong> on blog post.',
),
array(
  'name'  => 'Hide post category',
  'id'    => $shortname.'hide_category',
  'type'  => 'checkbox',
  'note'  => 'Check to <strong>hide category</strong> on blog post.',
),
array(
  'name'  => 'Hide post comment',
  'id'    => $shortname.'hide_comment',
  'type'  => 'checkbox',
  'note'  => 'Check to <strong>hide disabled comment notification</strong> on blog post.',
),
array(
  'name'  => 'Show post tags',
  'id'    => $shortname.'show_tag',
  'type'  => 'checkbox',
  'note'  => 'Check to <strong>show post tags</strong> on blog post.',
),
array(
  'name'  => 'Show blog author',
  'id'    => $shortname.'blog_author',
  'type'  => 'checkbox',
  'note'  => 'Check to <strong>show blog author</strong> on blog post.',
),
array(
  'name'  => 'Show blog author biography',
  'id'    => $shortname.'blog_author_bio',
  'type'  => 'checkbox',
  'note'  => 'Check to <strong>show blog author biography</strong> on blog post.',
),
array(
  'name'  => 'Author signature',
  'id'    => $shortname.'post_signature',
  'std'   => '',
  'type'  => 'upload',
  'note'  => 'Upload a signature at the bottom of a blog post',
  'size'  => 'any appropriate',
),
array(
  'name'  => 'Enable related post',
  'id'    => $shortname.'enable_related',
  'type'  => 'checkbox',
  'note'  => 'Enable <strong>related posts</strong>. <em>Works by relevant "Post Tag"</em>',
),
array('type'=>'class', 'class'=>'</div>'),

//// ==================================================================
// Newsletter
//// ==================================================================
array('type'=>'class','class'=>'<div id="newsletter">'),

array(
	'name'    =>  'Newsletter location',
	'id'      => $shortname.'newsletter_location',
	'type'    => 'select',
	'std'     => '30',
	'options' => array('Top', 'Bottom', 'Both'),
	'note'    => '',
),

array(
	'name'	=> 'Newsletter bar background color',
	'id'		=> $shortname.'newsletter_bg',
	'type'	=> 'color',
	'note'	=> 'newsletter_bg',
	'std'		=> '#fff1ee',
),
array(
	'name'	=> 'Newsletter text color',
	'id'		=> $shortname.'newsletter_text',
	'type'	=> 'color',
	'note'	=> 'newsletter_text',
	'std'		=> '#333333',
),
array(
	'name'  => '',
	'id'    => $shortname.'newsletter_home',
	'type'  => 'checkbox',
	'note'  => 'Show newsletter on homepage only',
),
array(
	'name'  => 'Newsletter',
	'id'    => $shortname.'newsletter',
	'type'  => 'textarea',
	'note'  => 'Kindly use appropriate class for your newsletter form, such as:<br />
	<strong>.newsletter-section-form</strong> for &lt;form&gt;<br />
	<strong>.newsletter-section-form-input</strong> for &lt;input&gt;<br />
	<strong>.newsletter-section-form-button</strong> for submit button<br />
	A quick example of form:<br />
	&lt;form action="" method="post" class="newsletter-section-form"&gt;<br />
	&lt;input type="text" class="newsletter-section-form-input" placeholder="Name" /&gt;<br />
	&lt;input type="email" class="newsletter-section-form-input" placeholder="Email" /&gt;<br />
	&lt;input type="submit" class="newsletter-section-form-button" value="Subscribe" /&gt;<br />
	&lt;/form&gt;',
),
array('type'=>'class','class'=>'</div>'),

//// ==================================================================
// 404 Error
//// ==================================================================
array('type'=>'class', 'class'=>'<div id="404">'),
array(
  'name'  => '404 Page Content',
  'id'    => $shortname.'404_page',
  'type'  => 'editor',
  'note'  => '',
),
array('type'=>'class', 'class'=>'</div>'),

//// ==================================================================
// WooCommerce
//// ==================================================================
array('type'=>'class', 'class'=>'<div id="woocommerce">'),
array(
  'name'  => 'Floating cart icon',
  'id'    => $shortname.'woo_cart_float',
  'type'  => 'checkbox',
  'note'  => 'Show floating cart icon on top right',
),
array(
  'name'  => 'Shop breadcrumb',
  'id'    => $shortname.'woo_breadcrumb',
  'type'  => 'checkbox',
  'note'  => 'Display shop page breadcrumb',
),
array(
  'name'  => 'Product page layout',
  'id'    => $shortname.'woo_full_width',
  'type'  => 'checkbox',
  'note'  => 'Remove sidebar on product page',
),
array('type'=>'class', 'class'=>'</div>'),

//// ==================================================================
// LifterLMS
//// ==================================================================
array('type'=>'class', 'class'=>'<div id="lifterlms">'),
array(
	'name'  => 'Show full width on course page',
	'id'    => $shortname.'lifterlms_course_width',
	'type'  => 'checkbox',
	'note'  => 'Show full width on course page',
),
array(
	'name'  => 'Show full width on lesson page',
	'id'    => $shortname.'lifterlms_lesson_width',
	'type'  => 'checkbox',
	'note'  => 'Show full width on lesson page',
),
array('type'=>'class', 'class'=>'</div>'),

//// ==================================================================
// Cookie
//// ==================================================================
array('type'=>'class', 'class'=>'<div id="cookie">'),
array(
	'name'  => 'Enable cookie consent bar',
	'id'    => $shortname.'enable_consent',
	'type'  => 'checkbox',
	'note'  => 'Enable cookie consent bar',
),
array(
	'name'    =>  'Cookie expire day',
	'id'      => $shortname.'cookie_expire',
	'type'    => 'select',
	'std'     => '30',
	'options' => array('7', '14', '30', '60', '90', '365'),
	'note'    => 'Number of days the cookie expired and required consent again',
),
array(
	'name'  => 'Cookie consent',
	'id'    => $shortname.'cookie_content',
	'type'  => 'textarea',
	'note'  => '',
),
array(
	'name'	=> 'Close button text',
	'id'	=> $shortname.'cookie_dismiss',
	'type'	=> 'text',
	'note'	=> '',
),
array(
	'name'	=> 'Read more text',
	'id'	=> $shortname.'cookie_read',
	'type'	=> 'text',
	'note'	=> '',
),
array(
	'name'	=> 'Cookie policy page',
	'id'	=> $shortname.'cookie_read_link',
	'type'	=> 'text',
	'note'	=> '',
),

array(
	'name'	=> 'Cookie bar background colour',
	'id'	=> $shortname.'cookie_bg',
	'type'	=> 'color',
	'note'	=> 'cookie_bg',
	'std'	=> '#222222',
),
array(
	'name'	=> 'Cookie bar text colour',
	'id'	=> $shortname.'cookie_text',
	'type'	=> 'color',
	'note'	=> 'cookie_text',
	'std'	=> '#ffffff',
),
array(
	'name'	=> 'Cookie bar button colour',
	'id'	=> $shortname.'cookie_button',
	'type'	=> 'color',
	'note'	=> 'cookie_button',
	'std'	=> '#000000',
),
array(
	'name'	=> 'Cookie bar button text colour',
	'id'	=> $shortname.'cookie_button_text',
	'type'	=> 'color',
	'note'	=> 'cookie_button_text',
	'std'	=> '#ffffff',
),
array('type'=>'class', 'class'=>'</div>'),

);
