<?php
/**
 * Chromatic functions and definitions
 * @package Chromatic
 * @since Chromatic 1.0
 */

/* Theme Options */
if ( file_exists( get_template_directory() . '/options/options.php' ) )
	require( get_template_directory() . '/options/options.php' );
if ( file_exists( get_template_directory() . '/theme-options.php' ) )
	require( get_template_directory() . '/theme-options.php' );

// Run the chromatic_pre hook
do_action( 'chromatic_pre' );

// Set the content width based on the theme's design and stylesheet
if ( ! isset( $content_width ) )
	$content_width = 1600; /* pixels */

// Get Theme Options
$gpp = get_option( gpp_get_current_theme_id() . '_options' );

add_action( 'chromatic_init', 'chromatic_theme_support' );
/**
 * This function activates default theme features
 *
 * @since 1.0
 */
function chromatic_theme_support() {

	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'gallery', 'image', 'video', 'quote' ) );
	add_editor_style();
	add_theme_support( 'custom-background' );

}

add_action( 'chromatic_init', 'chromatic_load_files' );
/**
 * This function loads all the files and features
 *
 * @since 1.0
 */
function chromatic_load_files() {

	// Load Functions
	require_once( get_template_directory() . '/lib/comments.php' );
	require_once( get_template_directory() . '/lib/custom-post-types.php' );
	require_once( get_template_directory() . '/lib/custom-header.php' );
	require_once( get_template_directory() . '/lib/custom-taxonomies.php' );
	require_once( get_template_directory() . '/lib/custom-post-type-extra-info.php' );
	require_once( get_template_directory() . '/lib/filters.php' );
	require_once( get_template_directory() . '/lib/formats.php' );
	require_once( get_template_directory() . '/lib/helper-functions.php' );
	require_once( get_template_directory() . '/lib/likes.php' );
	require_once( get_template_directory() . '/lib/photoshelter.php' );
	require_once( get_template_directory() . '/lib/postnav.php' );
	require_once( get_template_directory() . '/lib/posts.php' );
	require_once( get_template_directory() . '/lib/scripts.php' );
	require_once( get_template_directory() . '/lib/widgets.php' );

}

add_action( 'chromatic_init', 'chromatic_theme_setup' );
/**
 * This function setups up the theme defaults
 *
 * @since 1.0
 */
function chromatic_theme_setup() {

	// Set additiona image sizes
	set_post_thumbnail_size( 520, 520, true ); // default square thumbnail
	add_image_size( 'horizontal', 650, 385, true ); // horizontal images
	add_image_size( 'vertical', 520, 600, true ); // vertical images
	// updating thumbnail and image sizes
update_option( 'thumbnail_size_w', 520, true );
	update_option( 'thumbnail_size_h', 520, true );
	update_option( 'medium_size_w', 400, true );
	update_option( 'medium_size_h', '', true );
/*  custom for dakota
	update_option( 'large_size_w', 1600, true );
	update_option( 'large_size_h', '', true );
*/
	add_image_size( 'sell_media_item', 520, 520, true ); // sell media images

	// This theme uses wp_nav_menu() in one location
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'chromatic' ),
		'footer' => __( 'Footer Menu', 'chromatic' )
	) );

	// used for theme localization
	load_theme_textdomain( 'chromatic', get_template_directory() );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

}


// Run the chromatic_init hook
do_action( 'chromatic_init' );

// Run the chromatic_setup hook
do_action( 'chromatic_setup' );

/**
 * Flush your rewrite rules for custom post type and taxonomies added in theme
 * @package Chromatic
 * @since Chromatic 1.3.1
 * @author Thad Allender
 */
function chromatic_flush_rewrite_rules() {
    global $pagenow, $wp_rewrite;

    if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
        $wp_rewrite->flush_rules();
}

add_action( 'load-themes.php', 'chromatic_flush_rewrite_rules' );

// Get Categories
function getCategories( $taxonomy = null, $firstblank = false ) {

	if ( is_null( $taxonomy ) )
		$taxonomy = 'category';

	$args = array(
		'hide_empty' => 0
		);

	$terms_obj = get_terms( $taxonomy, $args );
	$items = array();
	$terms = array();
	if( $firstblank ) {
		$terms[''] = '-- Choose One --';
	}
	foreach ( $terms_obj as $tt ) {
		$terms[$tt->term_id]['name'] = $tt->term_id;
		$terms[$tt->term_id]['title'] = $tt->name;

	}

	return $terms;
}

/**
 * Register Widgets
 */
require_once ( get_template_directory() . '/lib/widgets/sell-media-share.php'); // share media widget