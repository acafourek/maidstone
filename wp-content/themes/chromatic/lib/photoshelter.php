<?php
/**
 * PhotoShelter Integration
 * Do not edit this file unless you know what you're doing
 */

if ( ! function_exists( 'chromatic_photoshelter_meta' ) ) :

    function chromatic_photoshelter_meta(){

		global $gpp_google_fonts;

        echo '<!-- BeginHeader --><link rel="stylesheet" type="text/css" href="' . $gpp_google_fonts . '" /><!-- EndHeader -->',"\n";

		$theme = wp_get_theme();

		$options = get_option( gpp_get_current_theme_id() . '_options' );

		// Alt CSS Styles
		if ( isset ( $options['chromatic_alt_css'] ) && '' != $options['chromatic_alt_css']) {
		    $style = get_template_directory_uri() . '/css/' . $options['chromatic_alt_css'] . '.css';
		} else {
		    $style = get_template_directory_uri() . '/css/default.css';
		}

        echo '<meta name="ps_configurator" content="thmNm=' . $theme['Name'] . ';thmVsn=' . $theme['Version'] . ';thmFmly=' . $theme['Template'] . ';hd_bgn=BeginHeader;hd_end=EndHeader;ft_bgn=BeginFooter;ft_end=EndFooter;scptInc=https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js;scptInc=//html5shiv.googlecode.com/svn/trunk/html5.js;scptInc=' . get_template_directory_uri() . '/js/menu.js;lnkInc=' . get_bloginfo('stylesheet_url') . ';lnkInc=' . $style . '" />',"\n";

    }
    add_action( 'wp_head', 'chromatic_photoshelter_meta' );

endif;