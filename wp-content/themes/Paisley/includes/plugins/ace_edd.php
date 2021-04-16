<?php
// ==================================================================
// Check if Easy Digital Downloads activated and add EDD stylesheet
// ==================================================================
if( class_exists( 'Easy_Digital_Downloads' ) ) {

  // ==================================================================
  // Easy Digital Downloads stylesheet
  // ==================================================================
  function ace_theme_edd_style() {
    wp_enqueue_style( 'ace-edd', get_template_directory_uri() . '/includes/plugins/edd.css', null, array(), 'all' );
  }
  add_action( 'wp_enqueue_scripts', 'ace_theme_edd_style' );
  // ==================================================================
  // Easy Digital Downloads colors settings options
  // ==================================================================
  function ace_edd_colors_settings() { ?>
  <style type="text/css">

    <?php if( get_option( 'ace_link' ) ) { ?>
		#edd_download_pagination a:hover,
		#edd_download_pagination .current {
      background: <?php echo get_option( 'ace_link' ); ?>;
    }
    <?php } ?>

    <?php if( get_option( 'ace_button_bg' ) ) { ?>
    .edd-add-to-cart,
    .edd_go_to_checkout,
    .edd-submit {
      background: <?php echo get_option( 'ace_button_bg' ); ?> !important;
      <?php if( get_option( 'ace_button_border' ) ) { ?>border: 1px solid <?php echo get_option( 'ace_button_border' ); ?> !important;<?php } ?>
      <?php if( get_option( 'ace_button_text' ) ) { ?>color: <?php echo get_option( 'ace_button_text' ); ?> !important;<?php } ?>
    }
    <?php } ?>

    <?php if( get_option( 'ace_button_bg_hover' ) ) { ?>
    .edd-add-to-cart:hover,
    .edd_go_to_checkout:hover,
    .edd-submit:hover {
      background: <?php echo get_option( 'ace_button_bg_hover' ); ?> !important;
      <?php if( get_option( 'ace_button_border_hover' ) ) { ?>border: 1px solid <?php echo get_option( 'ace_button_border_hover' ); ?> !important;<?php } ?>
      <?php if( get_option( 'ace_button_text_hover' ) ) { ?>color: <?php echo get_option( 'ace_button_text_hover' ); ?> !important;<?php } ?>
    }
    <?php } ?>

  </style>
  <?php }
  add_action( 'wp_head', 'ace_edd_colors_settings' );

}