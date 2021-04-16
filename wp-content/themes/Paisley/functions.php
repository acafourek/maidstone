<?php if(!defined('ABSPATH')) { exit; }
// ==================================================================
// Included libraries
// ==================================================================
require_once(get_template_directory() . '/includes/ace_functions.php');
require_once(get_template_directory() . '/includes/ace_import_export.php');
require_once(get_template_directory() . '/includes/ace_options.php');
require_once(get_template_directory() . '/includes/ace_pattern.php');
require_once(get_template_directory() . '/includes/ace_theme_customize.php');
require_once(get_template_directory() . '/includes/custom_widgets.php');
require_once(get_template_directory() . '/includes/meta_boxes.php');
require_once(get_template_directory() . '/includes/modules.php');
require_once(get_template_directory() . '/includes/quicktags.php');
require_once(get_template_directory() . '/includes/shortcodes.php');
require_once(get_template_directory() . '/includes/widgets.php');
require_once(get_template_directory() . '/includes/plugins/ace_woocommerce.php');

if (get_option('ace_infinite_scroll')) {
  // ==================================================================
  // Infinite Scroll
  // ==================================================================
  function infinite_scroll_js() {
    if(! is_singular()) { ?>

    <script type='text/javascript'>
    /* <![CDATA[ */
    var infinite_scroll = {
      loading: {
        img: "<?php echo get_template_directory_uri(); ?>/images/content_loading.gif",
        msgText: "<?php _e('Loading more posts...', 'ace'); ?>",
        finishedMsg: "<?php _e('All posts loaded.', 'ace'); ?>"
      },
      "nextSelector":".pagination a",
      "navSelector":".pagination",
      "itemSelector":".article",
      "contentSelector":".section"
    };
    jQuery(infinite_scroll.contentSelector).infinitescroll(infinite_scroll);
    /* ]]> */
    </script>

    <?php
    }
  }
  add_action('wp_footer', 'infinite_scroll_js', 100);
}

// ==================================================================
// WordPress dashicons
// ==================================================================
function ace_load_dashicons_front_end() {
  wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ace_load_dashicons_front_end');

// ==================================================================
// Theme activate notice bar
// ==================================================================
function ace_theme_admin_notice(){
	global $pagenow;
	if ( $pagenow == 'themes.php' ) {
		echo '<div class="notice notice-success is-dismissible">
		<p><strong>Bluchic theme activated.</strong> Follow our <strong><a href="'.esc_url('http://help.bluchic.com/?utm_source=getting-started&utm_medium=theme-options&utm_campaign=theme-options-getting-started').'" target="_blank">documentation</a></strong> to get your theme set up. If you run into any difficulty, we\'re here to help with direct, personal support! Just <strong><a href="'.esc_url('http://help.bluchic.com/submit-a-ticket?utm_source=getting-started&utm_medium=theme-options&utm_campaign=theme-options-getting-started').'" target="_blank">submit a support ticket</a></strong>.</p>
		</div>';
	}
}
add_action('admin_notices', 'ace_theme_admin_notice');

// ==================================================================
// LifterLMS sidebar
// ==================================================================
function ace_llms_sidebar_function($id) {
	$my_sidebar_id = 'right-widget-1'; // replace this with your theme's sidebar ID
	return $my_sidebar_id;
}
add_filter('llms_get_theme_default_sidebar', 'ace_llms_sidebar_function');

// ==================================================================
// LifterLMS support
// ==================================================================
function ace_llms_theme_support(){
	add_theme_support('lifterlms-sidebars');
}
add_action('after_setup_theme', 'ace_llms_theme_support');

// ==================================================================
// LifterLMS container
// ==================================================================
function my_content_wrapper_open() {
	echo '<main class="section" id="section">';
}
add_action('lifterlms_before_main_content', 'my_content_wrapper_open', 10);

function my_content_wrapper_close() {
	echo '</main>';
}
add_action('lifterlms_after_main_content', 'my_content_wrapper_close', 10);
