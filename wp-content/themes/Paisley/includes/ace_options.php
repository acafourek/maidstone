<?php
// ==================================================================
// Add Colorpicker
// ==================================================================
function ace_farbtastic_script() {
	wp_enqueue_style('farbtastic');
	wp_enqueue_script('farbtastic');
}
add_action('admin_enqueue_scripts', 'ace_farbtastic_script');

function ace_enqueue_color_picker() {
	wp_enqueue_script('wp-color-picker');
	wp_enqueue_style('wp-color-picker');
}
add_action('admin_enqueue_scripts', 'ace_enqueue_color_picker');

// ==================================================================
// Add uploader
// ==================================================================
function print_media_scripts() {
	wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'print_media_scripts');

// ==================================================================
// Category listing
// ==================================================================
$categories = get_categories('hide_empty=0&orderby=name');
  $wp_cats = array();
  foreach ($categories as $category_list) {
    $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
  }
array_unshift($wp_cats, 'Choose a category');

// ==================================================================
// Page listing
// ==================================================================
$pages = get_pages('hide_empty=0&orderby=name');
  $wp_pages = array();
  foreach ($pages as $page_list) {
    $wp_pages[$page_list->ID] = $page_list->post_title;
  }
array_unshift($wp_pages, 'Choose a page');

// ==================================================================
// Include the libraries
// ==================================================================
include_once('ace_libraries.php');


function mytheme_add_admin() {

  global $themename, $shortname, $options;

  if(isset ($_GET['page']) && ($_GET['page'] == basename(__FILE__))) {
    if(isset ($_REQUEST['action']) && ('save' == $_REQUEST['action'])) {
      foreach ($options as $value) {
        if(array_key_exists('id', $value)) {
          if(isset($_REQUEST[ $value['id'] ])) {
            update_option($value['id'], $_REQUEST[ $value['id'] ] );
          } else {
            delete_option($value['id']);
          }
        }
      }
      header("Location: themes.php?page=".basename(__FILE__)."&saved=true");
      die;
    } else if(isset ($_REQUEST['action']) && ('reset' == $_REQUEST['action'])) {
      foreach ($options as $value) {
        if(array_key_exists('id', $value)) {
          delete_option($value['id']);
        }
      }
      header("Location: themes.php?page=".basename(__FILE__)."&reset=true");
      die;
    }

  }

add_theme_page(__('Theme Options','ace'), __('Theme Options','ace'), 'administrator', basename(__FILE__), 'mytheme_admin', 10);

}

function mytheme_admin() {
  global $themename, $shortname, $options;
  if(isset($_REQUEST['saved'])) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
  if(isset($_REQUEST['reset'])) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/includes/style.css" type="text/css" media="screen" />

<div class="wrap">

  <h1><?php _e('Theme Options', 'ace'); ?></h1>

	<div id="options-form">

		<div id="options-header">
			<h1><span class="dashicons dashicons-admin-generic" style="font-size:1.3em; margin-right:10px;"></span> Ace<span>Panel</span></h1>
      <div class="meta"><a href="<?php echo esc_url('http://help.bluchic.com'); ?>" target="_blank">Documentation<a/> | <a href="<?php echo esc_url('http://help.bluchic.com/submit-a-ticket/'); ?>" target="_blank">Support Ticket</a> | <a href="<?php echo esc_url('https://twitter.com/bluchic'); ?>" target="_blank">Twitter</a> | <a href="<?php echo esc_url('https://www.facebook.com/bluchic'); ?>" target="_blank">Facebook</a> | <a href="<?php echo esc_url('https://www.pinterest.com/hibluchic'); ?>" target="_blank">Pinterest</a> | <a href="<?php echo esc_url('https://www.instagram.com/hibluchic/'); ?>">Instagram</a></div>
		</div>

	<form method="post">

		<ul class="toplist">
			<li><a class="current" href="#general"><?php _e('General settings','ace'); ?></a></li>
			<li><a href="#colors"><?php _e('Colors settings','ace'); ?></a></li>
			<li><a href="#extra"><?php _e('Extra inputs settings','ace'); ?></a></li>
			<li><a href="#entry"><?php _e('Entry settings','ace'); ?></a></li>
			<li><a href="#404"><?php _e('404 page settings','ace'); ?></a></li>
			<li><a href="#newsletter"><?php _e('Newsletter settings','ace'); ?></a></li>
			<?php if(class_exists('WooCommerce')) { ?><li><a href="#woocommerce"><?php _e('WooCommerce settings','ace'); ?></a></li><?php } ?>
			<?php if(class_exists('LifterLMS')) { ?><li><a href="#lifterlms"><?php _e('LifterLMS settings','ace'); ?></a></li><?php } ?>
			<li><a href="#cookie"><?php _e('Cookie consent settings','ace'); ?></a></li>
			<li class="span">
				<input type="submit" name="action" value="<?php esc_attr_e('Save settings','ace'); ?>" class="button-primary" />
				<input type="hidden" name="action" value="save" />
			</li>
		</ul>

	<div id="slide">

<?php
//// ==================================================================
// Text input
//// ==================================================================
?>
<?php foreach ($options as $value) { if($value['type'] == 'text') { ?>

  <div class="wrap">
    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
	<input onfocus="this.select();" type="text" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="<?php echo stripslashes(get_option($value['id'])); ?>" /><br />
    <div class="note"><?php echo $value['note']; ?></div>
  </div>

<?php
//// ==================================================================
// Textarea input
//// ==================================================================
?>
<?php } elseif($value['type'] == 'textarea') { ?>

  <div class="wrap">
    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php echo stripslashes(get_option($value['id'])); ?></textarea><br />
    <div class="note"><?php echo $value['note']; ?></div>
  </div>

<?php
//// ==================================================================
// Visual editor
//// ==================================================================
?>
<?php } elseif($value['type'] == 'editor') { ?>

  <div class="wrap">
    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <?php
    $settings = array(
      'wpautop' => true,
      'media_buttons' => false,
   );
    if(function_exists('wp_editor')) { wp_editor(stripslashes(get_option($value['id'])), $value['id'], $settings); } else { ?>
    <textarea class="tinyMCE-editor" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php echo stripslashes(get_option($value['id'])); ?></textarea><br />
    <?php } ?>
    <div class="note"><?php echo $value['note']; ?></div>
  </div>

<?php
//// ==================================================================
// Dropdown select
//// ==================================================================
?>
<?php } elseif($value['type'] == 'select') { ?>

  <div class="wrap">
    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
      <?php foreach ($value['options'] as $option) { ?>
      <option <?php if(get_option($value['id']) == $option) { echo ' selected="selected"'; } elseif($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
      <?php } ?>
    </select><br />
    <div class="note"><?php echo $value['note']; ?></div>
  </div>

<?php
//// ==================================================================
// Checkbox
//// ==================================================================
?>
<?php } elseif($value['type'] == 'checkbox') { ?>

  <div class="wrap">
    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; } else { $checked = "";}?>
    <label><input type="checkbox" name="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /> &ndash; <?php echo $value['note']; ?></label>
  </div>

<?php
//// ==================================================================
// Radio
//// ==================================================================
?>
<?php } elseif($value['type'] == 'radio') { ?>

  <div class="wrap">
    <h3><?php echo $value['name']; ?></h3>
    <?php foreach ($value['options'] as $option) { ?>
      <label for="<?php echo $option; ?>">
      <input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $option; ?>" value="<?php echo $option; ?>" <?php if(get_option($value['id']) == $option) { echo ' checked="checked"'; } elseif($option == $value['std']) { echo ' checked="checked"'; } ?> /> <?php echo $option; ?>
      </label>
    <?php } ?>
  </div>

<?php
//// ==================================================================
// Image checkbox
//// ==================================================================
?>
<?php } elseif($value['type'] == 'image') { ?>

  <div class="wrap">
    <h3><?php echo $value['name']; ?></h3>
    <?php foreach ($value['options'] as $option) { ?>
      <label for="<?php echo $option['name']; ?>" class="image-label">
      <img src="<?php echo get_template_directory_uri(); ?>/includes/images/<?php echo $option['value']; ?>" class="select-img" alt="<?php echo $option['name']; ?>" <?php if(get_option($value['id']) == $option['name']) { echo ' class="current"'; } elseif($option == $value['std']) { echo ' class="current"'; } ?> /><br />
      <input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $option['name']; ?>" value="<?php echo $option['name']; ?>" <?php if(get_option($value['id']) == $option['name']) { echo ' checked="checked"'; } elseif($option['name'] == $value['std']) { echo ' checked="checked"'; } ?> />
      <?php echo $option['desc']; ?>
      </label>
    <?php } ?>
  </div>

<?php
//// ==================================================================
// Thumbnail input (side-by-side input)
//// ==================================================================
?>
<?php } elseif($value['type'] == 'thumb') { ?>

  <div class="thumbnail">
    <label><input class="thumb-input" onfocus="this.select();" type="text" name="<?php echo $value['id']; ?>" value="<?php if(get_option($value['id']) != "") { echo get_option($value['id']); } else { echo $value['std']; } ?>" /> <?php echo $value['note']; ?></label>
  </div>

<?php
//// ==================================================================
// Media upload
//// ==================================================================
?>
<?php } elseif($value['type'] == 'upload') { ?>

  <div class="wrap">
    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <?php if(get_option($value['id']) != '') { ?><p><img src="<?php echo get_option($value['id']); ?>" alt="<?php echo $value['name']; ?>" /></p><?php } ?>
    <input type="text" class="<?php echo $value['id']; ?>_image" name="<?php echo $value['id']; ?>" value="<?php if(get_option($value['id']) != "") { echo get_option($value['id']); } else { echo $value['std']; } ?>" />
    <a href="#" class="<?php echo $value['id']; ?> button"><?php _e('Upload','ace'); ?></a>
    <div class="note"><a href="media-upload.php?keepThis=true&amp;TB_iframe=true" class="<?php echo $value['id']; ?>"><?php _e('Upload an image','ace'); ?></a> <?php _e('and copy-paste the file URL or enter an image URL','ace'); ?> <em><?php _e('(including http://)','ace'); ?></em>.<br /><?php _e('Preferable size at','ace'); ?> <?php echo $value['size']; ?> <?php _e('pixel','ace'); ?>.</div>

    <script type="text/javascript">
    /* <![CDATA[ */
    jQuery(document).ready(function($) { // START

    $('.<?php echo $value['id']; ?>').click(function(e) {
      e.preventDefault();
      var image = wp.media({
        title: 'Upload Image',
        multiple: false
      }).open()
      .on('select', function(e){
        var uploaded_image = image.state().get('selection').first();
        console.log(uploaded_image);
        var image_url = uploaded_image.toJSON().url;
        $('.<?php echo $value['id']; ?>_image').val(image_url);
      });
    });

    }); // END
    /* ]]> */
    </script>

  </div>

<?php
//// ==================================================================
// Date picker
//// ==================================================================
?>
<?php } elseif($value['type'] == 'date') { ?>

  <div class="wrap">
    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <input onfocus="this.select();" type="text" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="<?php echo get_option($value['id']); ?>" /><br />
    <div class="note"><?php echo $value['note']; ?></div>
  </div>

  <script type="text/javascript">
  /* <![CDATA[ */
		jQuery(document).ready(function($) { // START
			$("#<?php echo $value['id']; ?>").Zebra_DatePicker();
		}); // END
  /* ]]> */
  </script>

<?php
//// ==================================================================
// Colour picker
//// ==================================================================
?>
<?php } elseif($value['type'] == 'color') { ?>

  <div class="wrap">
    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <label for="<?php echo $value['id']; ?>"><input type="text" class="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="<?php if(get_option($value['id']) != "") { echo get_option($value['id']); } else { echo $value['std']; } ?>" /> <!--<span class="<?php echo $value['id']; ?> button" style="padding:4px 10px; border: 1px solid #dfdfdf;"><?php _e('Select','ace'); ?></span>--></label>
    <div class="<?php echo $value['note']; ?>"><em><?php _e('Default color: ','ace'); ?><?php echo $value['std']; ?></em></div>
  </div>

  <script type="text/javascript">
  /* <![CDATA[ */
  jQuery(document).ready(function($) { // START
    //jQuery('.<?php echo $value['note']; ?>').hide();
    //jQuery('.<?php echo $value['note']; ?>').farbtastic(".<?php echo $value['id']; ?>");
    //jQuery(".<?php echo $value['id']; ?>").click(function(){jQuery('.<?php echo $value['note']; ?>').fadeToggle()});

    jQuery('.<?php echo $value['id']; ?>').wpColorPicker();

  }); // END
  /* ]]> */
  </script>

<?php
//// ==================================================================
// Class
//// ==================================================================
?>
<?php } elseif($value['type'] == 'class') { echo $value['class']; ?>

<?php
//// ==================================================================
// Title
//// ==================================================================
?>
<?php } elseif($value['type'] == 'title') { ?><h4><?php echo $value['note']; ?></h4>

<?php
//// ==================================================================
// Info
//// ==================================================================
?>
<?php } elseif($value['type'] == 'info') { ?><p><?php echo $value['note']; ?></p>

<?php
//// ==================================================================
// Screenshot
//// ==================================================================
?>
<?php } elseif($value['type'] == 'screenshot') { ?><img src="<?php echo get_template_directory_uri(); ?>/includes/images/<?php echo $value['note']; ?>" class="screenshot" alt="" title="" />

<?php } elseif($value['type'] == 'header') { } }?>

	</div><!-- #slide -->

	<script type="text/javascript">
	/* <![CDATA[ */
	jQuery(document).ready(function($) { // START

		var divWrapper = $('#slide > div');
		divWrapper.hide().filter(':first').show();
			$('ul.toplist li a').click(function () {
				if(this.className.indexOf('current') == -1){
					divWrapper.hide(); divWrapper.filter(this.hash).fadeIn('slow');
						$('ul.toplist li a').removeClass('current');
						$(this).addClass('current');
				}
			return false;
		});

	}); // END
	/* ]]> */
	</script>

	<div class="options-buttons">
		<input type="submit" name="action" value="<?php esc_attr_e('Save settings','ace'); ?>" class="button-primary alignright" />
		<input type="hidden" name="action" value="save" />
		</form>
			<form method="post">
				<input type="submit" name="action" value="<?php esc_attr_e('Reset all settings','ace'); ?>" class="button alignleft" />
				<input type="hidden" name="action" value="reset" />
			</form>
	</div>

	</div><!-- #options-form -->

<?php }
add_action('admin_menu', 'mytheme_add_admin');

global $options;
foreach ($options as $value) {
	if (isset($value['id']) && get_option($value['id']) === FALSE && isset($value['std'])) {
		$value['id'] = $value['std'];
	} elseif (isset($value['id'])) {
		$value['id'] = get_option($value['id']);
	}
}

function dp_settings($key) {
	global $settings;
	return $settings[$key];
}
