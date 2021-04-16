<?php
// ==================================================================
// Regsiter buttons
// ==================================================================
function register_button1($buttons) {
  array_push($buttons, '|','ace_hr','ace_2columns','ace_3columns','ace_3halfcolumns','|','ace_boxw','ace_boxd','ace_boxq');
  return $buttons;
}

// ==================================================================
// Regsiter buttons
// ==================================================================
function register_button2($buttons) {
  array_push($buttons, 'ace_dropcap','ace_full_width','ace_slider','ace_pullquote','ace_lightbox','ace_tooltips','ace_buttons','ace_accordion');
  return $buttons;
}

// ==================================================================
// Add plugin
// ==================================================================
function add_plugin($plugin_array) {
  $plugin_array[ 'ace' ] = get_template_directory_uri() .'/includes/js/editor_plugin.js';
  return $plugin_array;
}

// ==================================================================
// Add TinyMCE
// ==================================================================
function ace_button() {
  if(! current_user_can('edit_posts') && ! current_user_can('edit_pages')) { return; }
  if(get_user_option('rich_editing') == 'true') {
    add_filter('mce_external_plugins', 'add_plugin');
    add_filter('mce_buttons', 'register_button1');
    add_filter('mce_buttons_2', 'register_button2');
  }
}
add_action('init', 'ace_button');
/*
function ace_quicktags()
{ ?>
<script type="text/javascript" charset="utf-8">
// <![CDATA[
edbuttonlength = edButtons.length;
edbuttonlength_t = edbuttonlength;
//alert(edButtons);
edButtons[ edbuttonlength++ ] = new edButton('ed_left', 'Left', '[left]', '[/left]'); // 0
edButtons[ edbuttonlength++ ] = new edButton('ed_right', 'Right', '[right]', '[/right]'); // 1
edButtons[ edbuttonlength++ ] = new edButton('ed_col1', 'Column 1', '[col1]', '[/col1]'); // 2
edButtons[ edbuttonlength++ ] = new edButton('ed_col2', 'Column 2', '[col2]', '[/col2]'); // 3
edButtons[ edbuttonlength++ ] = new edButton('ed_col3', 'Column 3', '[col3]', '[/col3]'); // 4
edButtons[ edbuttonlength++ ] = new edButton('ed_tooltips', 'Tooltips', '[tooltip text="TooltipText"]', '[/tooltip]'); // 5
edButtons[ edbuttonlength++ ] = new edButton('ed_lightbox', 'Lightbox', '[lightbox title="LightboxTitle" url="PageURL"]', '[/lightbox]'); // 6
edButtons[ edbuttonlength++ ] = new edButton('ed_button', 'Button', '[button url="URL"]', '[/button]'); // 7
edButtons[ edbuttonlength++ ] = new edButton('ed_warning', 'Warning', '[warning]', '[/warning]'); // 8
edButtons[ edbuttonlength++ ] = new edButton('ed_disclaim', 'Disclaim', '[disclaim]', '[/disclaim]'); // 9
edButtons[ edbuttonlength++ ] = new edButton('ed_question', 'Question', '[question]', '[/question]'); // 10
edButtons[ edbuttonlength++ ] = new edButton('ed_accordion', 'Accordion', '[accordion title="Title"]', '[/accordion]'); // 11
edButtons[ edbuttonlength++ ] = new edButton('ed_line', 'Line', '[line]', ''); // 12
edButtons[ edbuttonlength++ ] = new edButton('ed_email', 'Email', '[contact email="Your_Email" subject="Email_Subject" message="Thank_you_Message"]', ''); // 13
edButtons[ edbuttonlength++ ] = new edButton('ed_pullquote', 'Pull Quote','[pullquote width="300" float="left"]', '[/pullquote]'); // 14
edButtons[ edbuttonlength++ ] = new edButton('ed_col3half2', 'Column 3 Half 2', '[col3_2]', '[/col3_2]'); // 15
edButtons[ edbuttonlength++ ] = new edButton('ed_col3half1', 'Column 3 Half 1', '[col3_1]', '[/col3_1]'); // 16
edButtons[ edbuttonlength++ ] = new edButton('ed_slider', 'Slider', '[slide id="Slider_id"]', '[/slide]'); // 17
edButtons[ edbuttonlength++ ] = new edButton('ed_slider_img', 'Slider Image', '[images src="http://image.jpg" title="image title" caption="image caption" url="url"]'); // 18
//]]>

(function(){
if(typeof jQuery === 'undefined') { return; }
  jQuery(document).ready(function() {
  jQuery('#ed_toolbar').append('<input type="button" value="Left Column" id="ed_left" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t);" title="Left" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Right Column" id="ed_right" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+1);" title="Right"/>');
  jQuery('#ed_toolbar').append('<input type="button" value="Column 1" id="ed_col1" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+2);" title="Column 1" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Column 2" id="ed_col2" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+3);" title="Column 2" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Column 3" id="ed_col3" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+4);" title="Column 3" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Column 3 Half 2" id="ed_col3half2" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+15);" title="Column 3 half 2" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Column 3 Half 1" id="ed_col3half1" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+16);" title="Column 3 half 1" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Tooltips" id="ed_tooltips" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+5);" title="Tooltips" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Lightbox Content" id="ed_lightbox" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+6);" title="Lightbox Content" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Button" id="ed_button" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+7);" title="Button" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Warning Box" id="ed_warning" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+8);" title="Warning" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Disclaim Box" id="ed_disclaim" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+9);" title="Disclaim" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Question Box" id="ed_question" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+10);" title="Question" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Slider" id="ed_slider" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+17);" title="Slider" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Slider Image" id="ed_slider_img" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+18);" title="Slider Image" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Pull Quote" id="ed_pullquote" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+14);" title="Pull Quote" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Accordion" id="ed_accordion" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+11);" title="Accordion" />');
  jQuery('#ed_toolbar').append('<input type="button" value="Line" id="ed_line" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+12);" title="Line" />');
  });
}());
// ]]>

</script>
<?php }
add_action('admin_enqueue_scripts', 'ace_quicktags');
add_action('edit_form_advanced', 'ace_quicktags');
add_action('edit_page_form', 'ace_quicktags');

function ace_editor_plugin() {
  wp_enqueue_script('ace-editor', get_template_directory_uri().'/includes/js/editor_plugin.js', array('quicktags'), '', false);
}
add_action('admin_print_footer_scripts', 'ace_editor_plugin');
*/

function load_my_quicktags_inline() {
  if (wp_script_is('quicktags')) { ?>
  <script type="text/javascript" charset="utf-8">
  // <![CDATA[
  /* QTags.addButton('BUTTON_ID', 'BUTTON_NAME', 'OPENING', 'CLOSING', 'SHORTKEY'); */
  QTags.addButton('ed_full_width', 'Full Width','[full_width background="#ffffff" image=""]', '[/full_width]', '');
  QTags.addButton('ed_left', 'Left', '[left]', '[/left]', '');
  QTags.addButton('ed_right', 'Right', '[right]', '[/right]', '');
  QTags.addButton('ed_col1', 'Column 1', '[col1]', '[/col1]', '');
  QTags.addButton('ed_col2', 'Column 2', '[col2]', '[/col2]', '');
  QTags.addButton('ed_col3', 'Column 3', '[col3]', '[/col3]', '');
  QTags.addButton('ed_col3half2', 'Column 3 Half 2', '[col3_2]', '[/col3_2]', '');
  QTags.addButton('ed_col3half1', 'Column 3 Half 1', '[col3_1]', '[/col3_1]', '');
  QTags.addButton('ed_accordion', 'Accordion', '[accordion title="Title"]', '[/accordion]', '');
  QTags.addButton('ed_dropcap', 'Dropcap', '[dropcap]', '[/dropcap]', '');
  QTags.addButton('ed_button', 'Button', '[button url="URL"]', '[/button]', '');
  QTags.addButton('ed_warning', 'Warning', '[warning]', '[/warning]', '');
  QTags.addButton('ed_disclaim', 'Disclaim', '[disclaim]', '[/disclaim]', '');
  QTags.addButton('ed_question', 'Question', '[question]', '[/question]', '');
  QTags.addButton('ed_line', 'Line', '[line]', '', '');
  QTags.addButton('ed_slider', 'Slider', '[slide id="Slider_id"]', '[/slide]', '');
  QTags.addButton('ed_slider_img', 'Slider Image', '[images src="http://image.jpg" title="image title" caption="image caption" url="url"]', '');
  QTags.addButton('ed_lightbox', 'Lightbox', '[lightbox title="LightboxTitle" url="PageURL"]', '[/lightbox]', '');
  QTags.addButton('ed_tooltips', 'Tooltips', '[tooltip text="TooltipText"]', '[/tooltip]', '');
  QTags.addButton('ed_pullquote', 'Pull Quote','[pullquote width="300" float="left"]', '[/pullquote]', '');
  // ]]>
  </script>
  <?php }
}
add_action('admin_print_footer_scripts', 'load_my_quicktags_inline');

// ==================================================================
// Plugin Conflict
// ==================================================================
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if(is_plugin_active('codestyling-localization/codestyling-localization.php')) {
  remove_action('admin_enqueue_scripts', 'ace_quicktags');
  remove_action('admin_enqueue_scripts', 'ace_editor_plugin');
}
if(is_plugin_active('nextgen-gallery/nggallery.php')) {
  remove_action('admin_enqueue_scripts', 'ace_quicktags');
  remove_action('admin_enqueue_scripts', 'ace_editor_plugin');
}
