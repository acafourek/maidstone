<?php
/**
 * Data Sets
 *
 * @package hoot
 * @subpackage framework
 * @since hoot 2.0.0
 */

/**
 * Get background repeat settings
 *
 * @param string $return array to return icons|sections|list/empty
 * @return array
 */
if ( !function_exists( 'hoot_enum_icons' ) ):
function hoot_enum_icons( $return = 'list' ) {
	$return = ( empty( $return ) ) ? 'list' : $return;
	$default = Hoot_Options_Helper::icons( $return );
	return apply_filters( 'hoot_enum_icons', $default, $return );
}
endif;

/**
 * Get background repeat settings
 *
 * @return array
 */
if ( !function_exists( 'hoot_enum_background_repeat' ) ):
function hoot_enum_background_repeat() {
	$default = array(
		'no-repeat' => __( 'No Repeat', 'chromatic' ),
		'repeat-x'  => __( 'Repeat Horizontally', 'chromatic' ),
		'repeat-y'  => __( 'Repeat Vertically', 'chromatic' ),
		'repeat'    => __( 'Repeat All', 'chromatic' ),
		);
	return apply_filters( 'hoot_enum_background_repeat', $default );
}
endif;

/**
 * Get background positions
 *
 * @return array
 */
if ( !function_exists( 'hoot_enum_background_position' ) ):
function hoot_enum_background_position() {
	$default = array(
		'top left'      => __( 'Top Left', 'chromatic' ),
		'top center'    => __( 'Top Center', 'chromatic' ),
		'top right'     => __( 'Top Right', 'chromatic' ),
		'center left'   => __( 'Middle Left', 'chromatic' ),
		'center center' => __( 'Middle Center', 'chromatic' ),
		'center right'  => __( 'Middle Right', 'chromatic' ),
		'bottom left'   => __( 'Bottom Left', 'chromatic' ),
		'bottom center' => __( 'Bottom Center', 'chromatic' ),
		'bottom right'  => __( 'Bottom Right', 'chromatic')
		);
	return apply_filters( 'hoot_enum_background_position', $default );
}
endif;

/**
 * Get background attachment settings
 *
 * @return array
 */
if ( !function_exists( 'hoot_enum_background_attachment' ) ):
function hoot_enum_background_attachment() {
	$default = array(
		'scroll' => __( 'Scroll Normally', 'chromatic' ),
		'fixed'  => __( 'Fixed in Place', 'chromatic'),
		);
	return apply_filters( 'hoot_enum_background_attachment', $default );
}
endif;

/**
 * Get background types
 *
 * @return array
 */
if ( !function_exists( 'hoot_enum_background_type' ) ):
function hoot_enum_background_type() {
	$default = array(
		'predefined' => __( 'Predefined Pattern', 'chromatic' ),
		'custom'     => __( 'Custom Image', 'chromatic' ),
		);
	return apply_filters( 'hoot_enum_background_type', $default );
}
endif;

/**
 * Get background patterns
 *
 * @return array
 */
if ( !function_exists( 'hoot_enum_background_pattern' ) ):
function hoot_enum_background_pattern() {
	$relative = trailingslashit( substr( trailingslashit( HOOT_IMAGES ) . 'patterns' , ( strlen( THEME_URI ) + 1 ) ) );
	$default = array(
		0 => trailingslashit( HOOT_IMAGES ) . 'patterns/0_preview.jpg',
		$relative . '1.png' => trailingslashit( HOOT_IMAGES ) . 'patterns/1_preview.jpg',
		$relative . '2.png' => trailingslashit( HOOT_IMAGES ) . 'patterns/2_preview.jpg',
		$relative . '3.png' => trailingslashit( HOOT_IMAGES ) . 'patterns/3_preview.jpg',
		$relative . '4.png' => trailingslashit( HOOT_IMAGES ) . 'patterns/4_preview.jpg',
		$relative . '5.png' => trailingslashit( HOOT_IMAGES ) . 'patterns/5_preview.jpg',
		$relative . '6.png' => trailingslashit( HOOT_IMAGES ) . 'patterns/6_preview.jpg',
		$relative . '7.png' => trailingslashit( HOOT_IMAGES ) . 'patterns/7_preview.jpg',
		$relative . '8.png' => trailingslashit( HOOT_IMAGES ) . 'patterns/8_preview.jpg',
		);
	return apply_filters( 'hoot_enum_background_pattern', $default );
}
endif;

/**
 * Get background attachment
 *
 * @return array
 */
if ( !function_exists( 'hoot_enum_background_attachment' ) ):
function hoot_enum_background_attachment() {
	$default = array(
		'scroll' => __( 'Scroll Normally', 'chromatic' ),
		'fixed'  => __( 'Fixed in Place', 'chromatic')
		);
	return apply_filters( 'hoot_enum_background_attachment', $default );
}
endif;

/**
 * Get font sizes.
 *
 * Returns an indexed array of all recognized font sizes.
 * Values are integers and represent a range of sizes from
 * smallest to largest.
 *
 * @return array
 */
if ( !function_exists( 'hoot_enum_font_sizes' ) ):
function hoot_enum_font_sizes( $min = 9, $max = 82 ) {
	static $cache = array();
	if ( empty( $cache ) || $min != 9 || $max != 82 ) {
		$range = wp_parse_args( apply_filters( 'hoot_enum_font_sizes', array() ), array(
			'min' => $min,
			'max' => $max,
			) );
		$sizes = range( $range['min'], $range['max'] );
		$sizes = array_map( 'absint', $sizes );
	}
	if ( empty( $cache ) && $min == 9 && $max -= 82 )
		$cache = $sizes;
	return $sizes;
}
endif;

/**
 * Get font sizes for optiosn array
 *
 * Returns an indexed array of all recognized font sizes.
 * Values are integers and represent a range of sizes from
 * smallest to largest.
 *
 * @return array
 */
if ( !function_exists( 'hoot_enum_font_sizes_array' ) ):
function hoot_enum_font_sizes_array( $min = 9, $max = 82, $postfix = 'px' ) {
	$sizes = hoot_enum_font_sizes( $min, $max );
	$output = array();
	foreach ( $sizes as $size )
		$output[ $size ] = $size . $postfix;
	return $output;
}
endif;

/**
 * Get font faces.
 *
 * Returns an array of all recognized font faces.
 * Keys are intended to be stored in the database
 * while values are ready for display in in html.
 *
 * @param string $return array to return websafe|google-fonts|empty/list
 * @return array
 */
if ( !function_exists( 'hoot_enum_font_faces' ) ):
function hoot_enum_font_faces( $return = '' ) {
	$default = ( empty( $return ) || $return == 'list' ) ?
		array_merge( Hoot_Options_Helper::fonts('websafe'), Hoot_Options_Helper::fonts('google-fonts') ):
		Hoot_Options_Helper::fonts($return);
	return apply_filters( 'hoot_enum_font_faces', $default, $return );
}
endif;

/**
 * Get font styles.
 *
 * Returns an array of all recognized font styles.
 * Keys are intended to be stored in the database
 * while values are ready for display in in html.
 *
 * @return array
 */
if ( !function_exists( 'hoot_enum_font_styles' ) ):
function hoot_enum_font_styles() {
	$default = array(
		'none'                     => __( 'None', 'chromatic' ),
		'italic'                   => __( 'Italic', 'chromatic' ),
		'bold'                     => __( 'Bold', 'chromatic' ),
		'bold italic'              => __( 'Bold Italic', 'chromatic' ),
		'lighter'                  => __( 'Light', 'chromatic' ),
		'lighter italic'           => __( 'Light Italic', 'chromatic' ),
		'uppercase'                => __( 'Uppercase', 'chromatic' ),
		'uppercase italic'         => __( 'Uppercase Italic', 'chromatic' ),
		'uppercase bold'           => __( 'Uppercase Bold', 'chromatic' ),
		'uppercase bold italic'    => __( 'Uppercase Bold Italic', 'chromatic' ),
		'uppercase lighter'        => __( 'Uppercase Light', 'chromatic' ),
		'uppercase lighter italic' => __( 'Uppercase Light Italic', 'chromatic' )
		);
	return apply_filters( 'hoot_enum_font_styles', $default );
}
endif;

/**
 * Get social profiles and icons
 *
 * Returns an array of all recognized social profiles.
 * Keys are intended to be stored in the database
 * while values are ready for display in in html.
 *
 * @return array
 */
if ( !function_exists( 'hoot_enum_social_profiles' ) ):
function hoot_enum_social_profiles() {
	return apply_filters( 'hoot_enum_social_profiles', array(
		'fa-amazon'         => __( 'Amazon', 'chromatic' ),
		'fa-behance'        => __( 'Behance', 'chromatic' ),
		'fa-bitbucket'      => __( 'Bitbucket', 'chromatic' ),
		'fa-btc'            => __( 'BTC', 'chromatic' ),
		'fa-codepen'        => __( 'Codepen', 'chromatic' ),
		'fa-delicious'      => __( 'Delicious', 'chromatic' ),
		'fa-deviantart'     => __( 'Deviantart', 'chromatic' ),
		'fa-digg'           => __( 'Digg', 'chromatic' ),
		'fa-dribbble'       => __( 'Dribbble', 'chromatic' ),
		'fa-dropbox'        => __( 'Dropbox', 'chromatic' ),
		'fa-envelope'       => __( 'Email', 'chromatic' ),
		'fa-facebook'       => __( 'Facebook', 'chromatic' ),
		'fa-flickr'         => __( 'Flickr', 'chromatic' ),
		'fa-foursquare'     => __( 'Foursquare', 'chromatic' ),
		'fa-github'         => __( 'Github', 'chromatic' ),
		'fa-google-plus'    => __( 'Google Plus', 'chromatic' ),
		'fa-instagram'      => __( 'Instagram', 'chromatic' ),
		'fa-jsfiddle'       => __( 'JS Fiddle', 'chromatic' ),
		'fa-lastfm'         => __( 'Last FM', 'chromatic' ),
		'fa-linkedin'       => __( 'Linkedin', 'chromatic' ),
		'fa-mixcloud'       => __( 'Mixcloud', 'chromatic' ),
		'fa-paypal'         => __( 'Paypal', 'chromatic' ),
		'fa-pinterest'      => __( 'Pinterest', 'chromatic' ),
		'fa-reddit'         => __( 'Reddit', 'chromatic' ),
		'fa-rss'            => __( 'RSS', 'chromatic' ),
		'fa-scribd'         => __( 'Scribd', 'chromatic' ),
		'fa-skype'          => __( 'Skype', 'chromatic' ),
		'fa-slack'          => __( 'Slack', 'chromatic' ),
		'fa-slideshare'     => __( 'Slideshare', 'chromatic' ),
		'fa-soundcloud'     => __( 'Soundcloud', 'chromatic' ),
		'fa-spotify'        => __( 'Spotify', 'chromatic' ),
		'fa-stack-exchange' => __( 'Stack Exchange', 'chromatic' ),
		'fa-stack-overflow' => __( 'Stack Overflow', 'chromatic' ),
		'fa-steam'          => __( 'Steam', 'chromatic' ),
		'fa-stumbleupon'    => __( 'Stumbleupon', 'chromatic' ),
		'fa-trello'         => __( 'Trello', 'chromatic' ),
		'fa-tripadvisor'    => __( 'Trip Advisor', 'chromatic' ),
		'fa-tumblr'         => __( 'Tumblr', 'chromatic' ),
		'fa-twitch'         => __( 'Twitch', 'chromatic' ),
		'fa-twitter'        => __( 'Twitter', 'chromatic' ),
		'fa-vimeo-square'   => __( 'Vimeo', 'chromatic' ),
		'fa-wikipedia-w'    => __( 'Wikipedia', 'chromatic' ),
		'fa-wordpress'      => __( 'Wordpress', 'chromatic' ),
		'fa-xing'           => __( 'Xing', 'chromatic' ),
		'fa-y-combinator'   => __( 'Y Combinator', 'chromatic' ),
		'fa-yelp'           => __( 'Yelp', 'chromatic' ),
		'fa-youtube'        => __( 'Youtube', 'chromatic' ),
	) );
}
endif;