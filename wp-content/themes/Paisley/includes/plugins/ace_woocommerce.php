<?php
// ==================================================================
// WooCommerce support
// ==================================================================
function woocommerce_support() {
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'woocommerce_support');

// ==================================================================
// WooCommerce lightbox
// ==================================================================
function ace_woo_lightbox() {
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'ace_woo_lightbox');

// ==================================================================
// Check if WooCommerce activated and add WooCommerce stylesheet
// ==================================================================
if(class_exists('WooCommerce')) {

  // ==================================================================
  // WooCommerce stylesheet
  // ==================================================================
  function ace_theme_woo_style(){
    wp_enqueue_style('ace-woocommerce', get_template_directory_uri() . '/includes/plugins/woocommerce.css', null, array(), 'all');
  }
  add_action('wp_enqueue_scripts', 'ace_theme_woo_style');

  // ==================================================================
  // WooCommerce number of product per page
  // ==================================================================
  $numperpage = get_option('ace_woo_number_per_page');;
  //add_filter('loop_shop_per_page', create_function('$cols', 'return ' . $numperpage . ';'), 20);

  // ==================================================================
  // WooCommerce colors settings options
  // ==================================================================
  function ace_woo_colors_settings() { ?>
  <style type="text/css">

    <?php if(get_option('ace_link')) { ?>.woocommerce .woocommerce-breadcrumb a {color: <?php echo get_option('ace_link'); ?>;}<?php } ?>
    <?php if(get_option('ace_link_hover')) { ?>.woocommerce .woocommerce-breadcrumb a:hover {color: <?php echo get_option('ace_link_hover'); ?>;}<?php } ?>

    <?php if(get_option('ace_link')) { ?>
    .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
      background: <?php echo get_option('ace_link'); ?>;
    }
    <?php } ?>

    <?php if(get_option('ace_button_bg')) { ?>
    .woocommerce #respond input#submit.alt,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt,
    .woocommerce #respond input#submit,
    .woocommerce a.button,
    .woocommerce button.button,
    .woocommerce input.button,
    .post-button,
    .input-button,
    input[type=submit] {
      background: <?php echo get_option('ace_button_bg'); ?>;
      <?php if(get_option('ace_button_border')) { ?>border: 1px solid <?php echo get_option('ace_button_border'); ?>;<?php } ?>
      <?php if(get_option('ace_button_text')) { ?>color: <?php echo get_option('ace_button_text'); ?>;<?php } ?>
    }
    <?php } ?>

    <?php if(get_option('ace_button_bg_hover')) { ?>
    .woocommerce #respond input#submit.alt:hover,
    .woocommerce a.button.alt:hover,
    .woocommerce button.button.alt:hover,
    .woocommerce input.button.alt:hover,
    .woocommerce #respond input#submit:hover,
    .woocommerce a.button:hover,
    .woocommerce button.button:hover,
    .woocommerce input.button:hover,
    .post-button:hover,
    .input-button:hover,
    input[type=submit]:hover {
      background: <?php echo get_option('ace_button_bg_hover'); ?>;
      <?php if(get_option('ace_button_border_hover')) { ?>border: 1px solid <?php echo get_option('ace_button_border_hover'); ?>;<?php } ?>
      <?php if(get_option('ace_button_text_hover')) { ?>color: <?php echo get_option('ace_button_text_hover'); ?>;<?php } ?>
    }
    <?php } ?>

    <?php if(get_option('ace_button_bg')) { ?>.woo-cart-icon, .woocommerce span.onsale, .woocommerce span.sold_out {background: <?php echo get_option('ace_button_bg'); ?>; color: <?php echo get_option('ace_button_text'); ?>}<?php } ?>
    <?php if(get_option('ace_button_text')) { ?>.woo-cart-icon .fa-shopping-cart, .woocommerce span.onsale, .woocommerce span.sold_out {color: <?php echo get_option('ace_button_text'); ?>;}<?php } ?>

    <?php if(get_option('ace_button_bg_hover')) { ?>.woo-cart-icon:hover, .woocommerce span.onsale:hover, .woocommerce span.sold_out:hover {background: <?php echo get_option('ace_button_bg_hover'); ?>; color: <?php echo get_option('ace_button_text_hover'); ?>}<?php } ?>
    <?php if(get_option('ace_button_bg_hover')) { ?>.woo-cart-icon:hover .fa-shopping-cart, .woocommerce span.onsale:hover, .woocommerce span.sold_out:hover {color: <?php echo get_option('ace_button_text_hover'); ?>}<?php } ?>

    <?php if(get_option('ace_link')) { ?>
    .woocommerce nav.woocommerce-pagination ul li a:focus,
    .woocommerce nav.woocommerce-pagination ul li a:hover,
    .woocommerce nav.woocommerce-pagination ul li span.current {
      background: <?php echo get_option('ace_link'); ?>;
    }
    <?php } ?>

  </style>
  <?php }
  add_action('wp_head', 'ace_woo_colors_settings');

}

// ==================================================================
// WooCommerce number of product per row and style
// ==================================================================
if(get_option('ace_woo_number_per_row')) {

  function ace_loop_columns() {
    $woonum = get_option('ace_woo_number_per_row');
    return $woonum;
  }
  //add_filter('loop_shop_columns', 'ace_loop_columns');

  function ace_loop_columns_css() {
    if(get_option('ace_woo_number_per_row') == 1) { ?>
      <style type="text/css">
      @media all and (min-width: 800px) {
        .woocommerce ul.products li.product,
        .woocommerce-page ul.products li.product {width: 100%;}
      }
      </style>
    <?php } elseif(get_option('ace_woo_number_per_row') == 2) { ?>
      <style type="text/css">
      @media all and (min-width: 800px) {
        .woocommerce ul.products li.product,
        .woocommerce-page ul.products li.product {width: 48%;}
      }
      </style>
    <?php } elseif(get_option('ace_woo_number_per_row') == 3) { ?>
      <style type="text/css">
      @media all and (min-width: 800px) {
        .woocommerce ul.products li.product,
        .woocommerce-page ul.products li.product {width: 30.666%;}
      }
      </style>
    <?php }
  }
  //add_filter('wp_head', 'ace_loop_columns_css');

}

// ==================================================================
// Out of stock
// ==================================================================
add_action('woocommerce_before_single_product_summary', function() {
  global $product;
  if(!$product->is_in_stock()) {
    echo '<span class="sold_out">'. __('Out of stock', 'ace') .'</span>';
  }
});
add_action('woocommerce_before_shop_loop_item_title', function() {
  global $product;
  if(!$product->is_in_stock()) {
    echo '<span class="sold_out">'. __('Out of stock', 'ace') .'</span>';
  }
});

// ==================================================================
// Backorder
// ==================================================================
add_action('woocommerce_before_single_product_summary', function() {
  global $product;
  if($product->is_on_backorder()) {
    echo '<span class="sold_out">'. __('Backorder', 'ace') .'</span>';
  }
});
add_action('woocommerce_before_shop_loop_item_title', function() {
  global $product;
  if($product->is_on_backorder()) {
    echo '<span class="sold_out">'. __('Backorder', 'ace') .'</span>';
  }
});

// ==================================================================
// WooCommerce breadcrumb delimiter
// ==================================================================
function ace_woo_breadcrumb_delimiter($defaults) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' &raquo; ';
	return $defaults;
}
add_filter('woocommerce_breadcrumb_defaults', 'ace_woo_breadcrumb_delimiter');

// ==================================================================
// WooCommerce gallery thumbnail
// ==================================================================
add_filter('woocommerce_gallery_thumbnail_size', function($size) {
	return array('300', '300');
});

// ==================================================================
// WooCommerce and EDD cart icon on menu
// ==================================================================
if(get_option('ace_woo_cart_menu')) {

  function ace_wp_nav_menu_woo($items, $args, $ajax = false) {
    // Top Navigation Area Only
    if ((isset($ajax) && $ajax) || (property_exists($args, 'theme_location') && $args->theme_location === 'top_menu')) {
      // WooCommerce
      if (class_exists('woocommerce')) {
        $css_class = 'menu-item menu-item-type-cart menu-item-type-woocommerce-cart';
        // Is this the cart page?
        if (is_cart())
          $css_class .= ' ';
          $items .= '<li class="' . esc_attr($css_class) . '">';
          $items .= '<a class="cart-contents" href="' . esc_url(wc_get_cart_url()) . '"><i class="fas fa-shopping-cart"></i>';
          $items .= wp_kses_data(WC()->cart->get_cart_total()) . '<span class="count">' .  wp_kses_data(sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count(), 'ace'), WC()->cart->get_cart_contents_count())) . '</span>';
          $items .= '</a>';
          $items .= '</li>';
      }
    }
    return $items;
  }
  add_filter('wp_nav_menu_items', 'ace_wp_nav_menu_woo', 10, 2);

  // ==================================================================
  // WooCommerce cart icon AJAX on menu
  // ==================================================================
  function ace_woo_add_to_cart_fragments($fragments) {
    $fragments['li.menu-item-type-woocommerce-cart'] = ace_wp_nav_menu_woo('', new stdClass(), true);
    return $fragments;
  }
  add_filter('woocommerce_add_to_cart_fragments', 'ace_woo_add_to_cart_fragments');

}

// ==================================================================
// WooCommerce floating cart icon
// ==================================================================
if(get_option('ace_woo_cart_float')) {

  // ==================================================================
  // WooCommerce cart icons
  // ==================================================================
  function ace_woo_cart_count() {
    if(class_exists('WooCommerce')) {
        $count = WC()->cart->cart_contents_count;
        ?><a class="woo-cart-icon" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'ace'); ?>"><?php if ($count > 0) { echo $count; } else { echo '<i class="fas fa-shopping-cart"></i>';  } ?></a><?php
    }
  }

  // ==================================================================
  // WooCommerce cart icons AJAX
  // ==================================================================
  function ace_header_add_to_cart_fragment($fragments) {
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="woo-cart-icon" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'ace'); ?>"><?php if ($count > 0) { echo $count; } else { echo '<i class="fas fa-shopping-cart"></i>';  } ?></a><?php
    $fragments['a.woo-cart-icon'] = ob_get_clean();
    return $fragments;
  }
  add_filter('woocommerce_add_to_cart_fragments', 'ace_header_add_to_cart_fragment');

}
