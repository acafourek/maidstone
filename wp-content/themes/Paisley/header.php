<!DOCTYPE html>
<!--[if IE 7]><html id="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
<style type="text/css">
.header {background-image: url('<?php ace_header_background(); ?>'); background-size: cover; background-position: center center;}
</style>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

<?php if(function_exists('wp_body_open')) wp_body_open(); ?>

<span class="back-top"><i class="fa fa-angle-up"></i></span>

<?php if(get_option('ace_header_banner')) { echo '<section class="header-banner">'; echo stripslashes_deep(get_option('ace_header_banner')); echo '</section>'; } ?>

<?php if(get_option('ace_woo_cart_float')) { echo ace_woo_cart_count(); } ?>

<section class="wrap">

<nav class="nav" id="nav" itemscope itemtype="https://schema.org/SiteNavigationElement">
	<label for="show-menu"><div class="menu-click">Menu</div></label>
	<input type="checkbox" id="show-menu" class="checkbox-menu hidden" role="button">
	<div class="menu-wrap">
		<?php wp_nav_menu('theme_location=top_menu&container_class=menu&menu_class=main-menu&fallback_cb=false&show_home=1'); ?>
	</div>
</nav><!-- .nav -->

<header class="header" id="header" itemscope itemtype="https://schema.org/WPHeader">
  <?php ace_heading(); ?>
</header><!-- .header -->

<?php ace_newsletter_top(); ?>

<section class="container">
