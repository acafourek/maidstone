<?php

/**
 * Adding javascripts and css to theme
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */

add_action( 'wp_enqueue_scripts', 'chromatic_register_scripts' );
// Register our scripts for easier
function chromatic_register_scripts() {
	wp_register_script( 'selectivizr', get_template_directory_uri() . '/js/selectivizr.min.js', array( 'jquery' ), chromatic_get_theme_version() );
	wp_register_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), chromatic_get_theme_version());
	wp_register_script( 'flexslider', get_template_directory_uri() . '/js/flexslider/jquery.flexslider-min.js');
    wp_register_script( 'jcookie', get_template_directory_uri() . '/js/jquery.cookie.js', array( 'jquery' ), chromatic_get_theme_version() );
	wp_register_script( 'chromatic-fullscreen', get_template_directory_uri() . '/js/fullscreenapi.js', array( 'jquery' ), chromatic_get_theme_version() );

    wp_register_script( 'chromatic_scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery', 'flexslider', 'fitvids' ), chromatic_get_theme_version() );
	wp_enqueue_script( 'chromatic-sharrre', get_template_directory_uri() . '/js/jquery.sharrre-1.3.4.min.js', array( 'jquery' ), chromatic_get_theme_version() );
		
	// AJAX url variable
	wp_localize_script( 'chromatic_scripts', 'chromatic',
		array(
			'ajaxurl'=>admin_url('admin-ajax.php'),
			'ajaxnonce' => wp_create_nonce('ajax-nonce')
			)
		);

}

add_action( 'wp_enqueue_scripts', 'chromatic_enqueue_scripts' );

// Wrap all required scripts in one function for easier enqueue
function chromatic_enqueue_scripts() {
	global $gpp;
	// Enqueue site-wide
	wp_enqueue_script('jquery');
	wp_enqueue_script('selectivizr');
	wp_enqueue_script('fitvids');
    wp_enqueue_script('flexslider');
    wp_enqueue_script('jcookie');
    wp_enqueue_script('chromatic-fullscreen');
    wp_enqueue_script('chromatic_scripts');

    // AJAX url variable
    wp_localize_script( 'chromatic_scripts', 'chromatic',
   	    array(
   		'ajaxurl'=>admin_url('admin-ajax.php'),
   		'ajaxnonce' => wp_create_nonce('ajax-nonce')
        )
    );

    // since Chromatic 1.1
    wp_enqueue_style( 'style', get_stylesheet_uri(), '', chromatic_get_theme_version() );

	if ( chromatic_sell_media_check() == true )
		wp_enqueue_style( 'chromatic-sell-media', get_template_directory_uri() . '/css/sell-media.css', '', chromatic_get_theme_version() );

	if( isset ( $gpp['chromatic_alt_css'] ) && '' != $gpp['chromatic_alt_css'] ) {
        wp_enqueue_style( 'alt-style', get_template_directory_uri() . '/css/' . $gpp['chromatic_alt_css'] . '.css', array( 'style' ) );
    }
    else {
        wp_enqueue_style( 'alt-style', get_template_directory_uri() . '/css/default.css', array( 'style' ) );
    }
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/js/flexslider/flexslider.css', array( 'style' ) );

	// load comments script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}