<?php
/**
 * Add custom css to frontend.
 *
 * @package hoot
 * @subpackage chromatic
 * @since chromatic 1.0
 */

// Add action at 5 for adding css rules (premium hooks in at 6-9).
// Child themes can hook in at priority 10.
add_action( 'hoot_dynamic_cssrules', 'hoot_dynamic_cssrules', 5 );

/**
 * Custom CSS built from user theme options
 * For proper sanitization, always use functions from hoot/includes/sanitization.php
 * and hoot/customizer/sanitization.php
 *
 * @since 1.0
 * @access public
 */
function hoot_dynamic_cssrules() {

	/*** Settings Values ***/

	/* Lite Settings */

	$settings = array();
	$settings['grid_width']           = intval( hoot_get_mod( 'site_width', 1260 ) ) . 'px';
	$settings['accent_color']         = hoot_get_mod( 'accent_color' );
	$settings['accent_color_dark']    = hoot_color_increase( $settings['accent_color'], 20, 20 );
	$settings['accent_font']          = hoot_get_mod( 'accent_font' );
	$settings['site_layout']          = hoot_get_mod( 'site_layout' );

	extract( apply_filters( 'hoot_custom_css_settings', $settings, 'lite' ) );

	/*** Add Dynamic CSS ***/

	/* Hoot Grid */

	hoot_add_css_rule( array(
						'selector'  => '.grid',
						'property'  => 'max-width',
						'value'     => $grid_width,
						'idtag'     => 'grid_width',
					) );

	/* Base Typography and HTML */

	hoot_add_css_rule( array(
						'selector'  => 'a',
						'property'  => 'color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color',
					) ); // Overridden in premium

	hoot_add_css_rule( array(
						'selector'  => '.invert-typo',
						'property'  => array(
							'background' => array( $accent_color, 'accent_color' ),
							'color'      => array( $accent_font, 'accent_font' ),
							),
					) );

	hoot_add_css_rule( array(
						'selector'  => '.invert-typo a, .invert-typo a:hover, .invert-typo h1, .invert-typo h2, .invert-typo h3, .invert-typo h4, .invert-typo h5, .invert-typo h6, .invert-typo .title',
						'property'  => 'color',
						'value'     => $accent_font,
						'idtag'     => 'accent_font',
					) );

	hoot_add_css_rule( array(
						'selector'  => 'input[type="submit"], #submit, .button',
						'property'  => array(
							'background' => array( $accent_color, 'accent_color' ),
							'color'      => array( $accent_font, 'accent_font' ),
							),
					) );

	hoot_add_css_rule( array(
						'selector'  => 'input[type="submit"]:hover, #submit:hover, .button:hover',
						'property'  => array(
							'background' => array( $accent_color_dark, 'accent_color' ),
							'color'      => array( $accent_font, 'accent_font' ),
							),
					) );

	/* Layout */

	hoot_add_css_rule( array(
						'selector'  => 'body',
						'property'  => 'background',
						'idtag'     => 'background',
					) );

	if ( $site_layout == 'boxed' ) {
		hoot_add_css_rule( array(
						'selector'  => '#page-wrapper',
						'property'  => 'background',
						'idtag'     => 'box_background',
					) );
	}

	/* Header */

	hoot_add_css_rule( array(
						'selector'  => '#site-title, #site-title a',
						'property'  => 'color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color',
					) ); // Overridden in premium

	/* Sidebars and Widgets */

	hoot_add_css_rule( array(
						'selector'  => '.content-block-icon',
						'property'  => array(
							'color'        => array( $accent_color, 'accent_color' ),
							'background'   => array( $accent_font, 'accent_font' ),
							'border-color' => array( $accent_color, 'accent_color' ),
							),
					) );

	hoot_add_css_rule( array(
						'selector'  => '.content-block-icon.icon-style-square',
						'property'  => array(
							'color'        => array( $accent_font, 'accent_font' ),
							'background'   => array( $accent_color, 'accent_color' ),
							),
					) );

	hoot_add_css_rule( array(
						'selector'  => '.content-blocks-widget .content-block:hover .content-block-icon.icon-style-circle',
						'property'  => array(
							'color'        => array( $accent_font, 'accent_font' ),
							'background'   => array( $accent_color, 'accent_color' ),
							),
					) );

	hoot_add_css_rule( array(
						'selector'  => '.content-blocks-widget .content-block:hover .content-block-icon.icon-style-square',
						'property'  => array(
							'color'        => array( $accent_color, 'accent_color' ),
							'background'   => array( $accent_font, 'accent_font' ),
							),
					) );

	/* Light Slider */

	hoot_add_css_rule( array(
						'selector'  => '.lSSlideOuter .lSPager.lSpg > li:hover a, .lSSlideOuter .lSPager.lSpg > li.active a',
						'property'  => 'background-color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color',
					) );

}