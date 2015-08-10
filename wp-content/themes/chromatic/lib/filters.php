<?php

/**
 * Extends the body_class function for improved css targeting
 * @package Chromatic
 * @since Chromatic 1.0
 */

/**
 * Filters the body_class and adds the appropriate browser class
 */
$chromatic_options = get_option( gpp_get_current_theme_id() . '_options' );

function chromatic_browser_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone, $gpp;

	// device sniffing
	if($is_lynx) $classes[] = 'browser-lynx';
	elseif($is_gecko) $classes[] = 'browser-gecko';
	elseif($is_opera) $classes[] = 'browser-opera';
	elseif($is_NS4) $classes[] = 'browser-ns4';
	elseif($is_safari) $classes[] = 'browser-safari';
	elseif($is_chrome) $classes[] = 'browser-chrome';
	elseif($is_IE) $classes[] = 'browser-ie';
	else $classes[] = '';
	if($is_iphone) $classes[] = 'browser-iphone';

	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) $classes[] = 'single-author';

	// Adds image orientation class
	$classes[] = chromatic_image_orientation();

	if ( has_nav_menu( 'footer' ) )
		$classes[] = 'has-top-menu';

	// Do we have a header image?
	$header_image = get_header_image();
    if ( $header_image ) $classes[] = 'has-header-image';

    //welcome message ?
    if( isset( $gpp['chromatic_message'] ) && ( $gpp['chromatic_message'] != '' ) && is_home() )
    	$classes[] = 'has-welcome-msg';
    else
    	$classes[] = 'no-welcome-msg';

    //Slideshow Size
    if( !isset( $gpp['chromatic_slideshow_size'] ) || ( $gpp['chromatic_slideshow_size'] == 'cover' ) )
    	$classes[] = 'cover-image';
    else
    	$classes[] = 'contain-image';

	return $classes;
}
// Filter body_class with the function above
add_filter( 'body_class', 'chromatic_browser_class' );

// Show/Hide Sidebar
function chromatic_sidebar_class($classes) {
	$classes[] = 'sidebar-hidden';
	return $classes;
}

if ( isset( $chromatic_options['chromatic_sidebar'] ) && $chromatic_options['chromatic_sidebar'] == 'hide' ) {
	// Filter body_class with the function above
	add_filter( 'body_class', 'chromatic_sidebar_class' );
}

// Show/Hide Sidebar
function chromatic_footer_class($classes) {
	$classes[] = 'show-footer';
	return $classes;
}

if ( isset( $chromatic_options['chromatic_footer'] ) && $chromatic_options['chromatic_footer'] == 'show' ) {
	// Filter body_class with the function above
	add_filter( 'body_class', 'chromatic_footer_class' );
}

// Add home link to menu
function chromatic_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'chromatic_page_menu_args' );

// Add custom class to nav menu items
function chromatic_custom_nav_class($classes, $item){

	if( $item->object == "page"){ 
		$template = get_post_meta( $item->object_id, '_wp_page_template', true );
		if ( $template == "page-lightbox.php" ) {
			$classes[] = "lightbox-menu";
		}
	}
	return $classes;
}
add_filter('nav_menu_css_class' , 'chromatic_custom_nav_class' , 10 , 2);

add_filter('nav_menu_css_class' , 'chromatic_custom_nav_class' , 10 , 2);
 
// Use custom thumbnail for Sell Media posts
add_filter( 'sell_media_thumbnail', 'chromatic_sell_media_thumbnail' );
function chromatic_sell_media_thumbnail(){
	return 'sell_media_item';
}