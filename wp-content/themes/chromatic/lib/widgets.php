<?php

/**
 * Register widgetized area and update sidebar with default widgets
 * @package Chromatic
 * @since Chromatic 1.0
 */

// remove default WordPress widgets, since it causes problems with home widget when theme is initially activated
function chromatic_do_widgets_init() { do_action( 'widgets_init' ); }
function chromatic_remove_action() { remove_action( 'init', 'wp_widgets_init', 1 ); }
add_action( 'plugins_loaded', 'chromatic_remove_action' );
add_action( 'init', 'chromatic_do_widgets_init', 1 );

function chromatic_widgets_init() {
	
	// check if sell media plugin is active
	if ( chromatic_sell_media_check() ) {
		register_sidebar( array(
			'name' => __( 'Sidebar (Sell Media Single Items)', 'chromatic' ),
			'id' => 'sell-media-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<span class="widget-title-container"><h2 class="widget-title">',
			'after_title' => '</h2></span>',
		) );
	}
	
	register_sidebar( array(
			'name' => __( 'Home', 'chromatic' ),
			'id' => 'home',
			'before_widget' => '<aside id="%1$s" class="home-widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<span class="widget-title-container"><h3 class="widget-title">',
			'after_title' => '</h3></span>',
		) );

	$widgets = array( '1', '2', '3' );
	foreach ( $widgets as $i ) {
		register_sidebar(array(
			'name' => 'Footer Widget '.$i,
			'id' => 'footer-widget-'.$i,
			'before_widget' => '<aside class="widget">',
			'after_widget' => '</aside>',
			'before_title' => '<span class="widget-title-container"><h3 class="widget-title">',
			'after_title' => '</h3></span>'
		) );
	} // end foreach
}
add_action( 'widgets_init', 'chromatic_widgets_init' );