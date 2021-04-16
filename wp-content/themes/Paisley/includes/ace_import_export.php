<?php
/*
Plugin Name: Migrate Site Settings
Plugin URI: http://developingelegance.com/
Description: This plugin saves your Wordpress site preferences for import into another Wordpress site, making deployment of many sites with the same preferences easy.
Version: 0.1
Author: Tim Mahoney
Author URI: http://timothymahoney.com/
License: GPLv2
*/
/*
Copyright 2010  Tim Mahoney  (email : tim@developingelegance.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

http://www.gnu.org/licenses/gpl.txt
*/


if(!class_exists('ace_site_settings')){

class ace_site_settings {
// List of options we want to save.
// Next version, maybe make a page where the user can select these themselves?
  var $optionstosave = array(

	"ace_404_page",
	"ace_accordion_bg",
	"ace_accordion_bg_hover",
	"ace_accordion_text",
	"ace_accordion_text_hover",
	"ace_bloglovin",
	"ace_bloglovin_bg",
	"ace_bloglovin_bg_hover",
	"ace_blog_author",
	"ace_blog_author_bio",
	"ace_blog_layout",
	"ace_border_color",
	"ace_button_bg",
	"ace_button_bg_hover",
	"ace_button_border",
	"ace_button_border_hover",
	"ace_button_text",
	"ace_button_text_hover",
	"ace_css",
	"ace_email",
	"ace_email_bg",
	"ace_email_bg_hover",
	"ace_enable_related",
	"ace_facebook",
	"ace_facebook_bg",
	"ace_facebook_bg_hover",
	"ace_favicon",
	"ace_flickr",
	"ace_flickr_bg",
	"ace_flickr_bg_hover",
	"ace_footer_background",
	"ace_footer_credit",
	"ace_footer_credit_background",
	"ace_footer_credit_text",
	"ace_footer_icons",
	"ace_footer_scripts",
	"ace_footer_text",
	"ace_footer_widget_title",
	"ace_google_plus",
	"ace_google_plus_bg",
	"ace_google_plus_bg_hover",
	"ace_h1",
	"ace_h2",
	"ace_h3",
	"ace_h4",
	"ace_h5",
	"ace_h6",
	"ace_header_banner",
	"ace_header_bg",
	"ace_header_scripts",
	"ace_icons_border",
	"ace_infinite_scroll",
	"ace_instagram",
	"ace_instagram_bg",
	"ace_instagram_bg_hover",
	"ace_link",
	"ace_linkedin",
	"ace_linkedin_bg",
	"ace_linkedin_bg_hover",
	"ace_link_hover",
	"ace_nav_bar",
	"ace_nav_link",
	"ace_nav_link_active_hover",
	"ace_nav_link_hover",
	"ace_nav_submenu_border_color",
	"ace_page_post_title",
	"ace_page_post_title_link",
	"ace_page_post_title_link_hover",
	"ace_pinterest",
	"ace_pinterest_bg",
	"ace_pinterest_bg_hover",
	"ace_post_banner",
	"ace_post_category_bg",
	"ace_post_category_link",
	"ace_post_comment_meta_bg",
	"ace_post_comment_meta_text",
	"ace_post_signature",
	"ace_rss",
	"ace_rss_bg",
	"ace_rss_bg_hover",
	"ace_sidebar_widget_title",
	"ace_sticky_menu",
	"ace_text_color",
	"ace_tumblr",
	"ace_tumblr_bg",
	"ace_tumblr_bg_hover",
	"ace_twitter",
	"ace_twitter_bg",
	"ace_twitter_bg_hover",
	"ace_vimeo",
	"ace_vimeo_bg",
	"ace_vimeo_bg_hover",
	"ace_widget_bloglovin_bg",
	"ace_widget_bloglovin_bg_hover",
	"ace_widget_email_bg",
	"ace_widget_email_bg_hover",
	"ace_widget_fb_bg",
	"ace_widget_fb_bg_hover",
	"ace_widget_flickr_bg",
	"ace_widget_flickr_bg_hover",
	"ace_widget_google_bg",
	"ace_widget_google_bg_hover",
	"ace_widget_instagram_bg",
	"ace_widget_instagram_bg_hover",
	"ace_widget_linkedin_bg",
	"ace_widget_linkedin_bg_hover",
	"ace_widget_pinterest_bg",
	"ace_widget_pinterest_bg_hover",
	"ace_widget_rss_bg",
	"ace_widget_rss_bg_hover",
	"ace_widget_tumblr_bg",
	"ace_widget_tumblr_bg_hover",
	"ace_widget_twitter_bg",
	"ace_widget_twitter_bg_hover",
	"ace_widget_vimeo_bg",
	"ace_widget_vimeo_bg_hover",
	"ace_widget_youtube_bg",
	"ace_widget_youtube_bg_hover",
	"ace_woo_breadcrumb",
	"ace_woo_full_width",
	"ace_woo_number_per_page",
	"ace_woo_number_per_row",
	"ace_youtube",
	"ace_youtube_bg",
	"ace_youtube_bg_hover",

 );


  function __construct() {
    add_action('admin_menu', array($this, 'addOptionsPage'));
  }

  public function addOptionsPage() {
    add_theme_page('Theme Settings', 'Theme Settings', 'administrator', basename(__FILE__), array($this,'optionsPageView'));
  }

  public function optionsPageView() {

    // If there's a file upload, process it.
    if(isset($_POST['fileuploadsubmit'])) {

      // If there's a file upload error, notify the user
      if($_FILES["xmlfile"]["error"] > 0 || $_FILES["xmlfile"]["type"] != "text/xml") {
        echo "Error: " . $_FILES["xmlfile"]["error"] . "<br />";
      } else {
        // load the file
        $xml = simplexml_load_file($_FILES["xmlfile"]["tmp_name"]);
      }

      //Build a list of status updates to tell the user what has been changed.
      $status = "<ol>";
      foreach($xml as $key => $setting) {
        // Trim the SimpleXML crap out of the setting string.
        $setting_final = trim((string)$setting);
          if(get_option($key) != $setting_final) {
            $status .= '<li>Setting "'.$key.'" used to be '.get_option($key).' and has successfully been set to '.$setting_final.'</li>';
            // Update the option
            update_option($key, $setting_final);
          }
      }
    $status .= "</ol>";

    }

  if(isset($_POST['deletexmlsubmit'])) {
  $path = "..";
  $directory = opendir($path);
    while($entryName = readdir($directory)) {
      $dirArray[] = $entryName;
    }
  closedir($directory);
  foreach($dirArray as $file) {
    $ext = substr($file, strrpos($file, '.') + 1);
    // echo $ext;
    if($ext == "xml"){
      unlink($path.'/'.$file);
    }
  }

} ?>

<div class="wrap">
  <div id="icon-themes" class="icon32"><br /></div>
  <h2>Import/Export Theme Settings</h2>

  <?php
  $xml = $this->generateXMLString();
  if(isset($_POST['generatexmlsubmit'])) {
    $filename = $this->generateXMLFile($xml);
  }
  ?>
  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
  <p><input type="submit" name="generatexmlsubmit" class="button" value="Generate XML file"> <input type="submit" name="deletexmlsubmit" class="button" value="Delete all XML files" onclick="javascript:return confirm('Are you sure you want to delete all XML files?')"></p>
  <?php if(isset($_POST['generatexmlsubmit'])) { ?>
    <p>Right Click and Save Target As: <a href="../<?php echo $filename; ?>" target="_blank"><?php echo $filename; ?></a></p>
  <?php } ?>
  <p><input type="file" name="xmlfile"><input type="submit" class="button" name="fileuploadsubmit" value="Upload New Settings" onclick="javascript:return confirm('Are you sure you want to replace the settings?')"></p>
  <?php
  if(isset($status)) {
    echo '<h4>Update Results</h4>';
      if($status != "<ol></ol>") {
        echo $status;
      } else {
        echo 'No Changes Needed';
      }
  } else {
    echo '<h4>Current Settings in XML format</h4>';
    echo '<pre>'.htmlentities($xml).'</pre>';
  }
  ?>
  </form>
  <?php
  }

  /*
  * generateXMLString
  * This function generates the XML displayed on the Admin page, and will be used to save the file.
  */
  public function generateXMLString() {
    $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
    $xml .= '<site_settings>'."\n";
    foreach($this->optionstosave as $ots){
      $option = get_option($ots);
      $option = htmlentities($option);
      $xml .= "\t<".$ots.">".$option."</".$ots.">\n";
    }
    $xml .= '</site_settings>';
    return $xml;
  }

  /*
  * generateXMLFile
  * Save the file to the plugin folder so that the user can download it.
  */
  public function generateXMLFile($xmlString) {
    $filename = "ace_".md5(time()).".xml";
    $myFile = "../".$filename;
    $fh = fopen($myFile, 'w');
    fwrite($fh, $xmlString);
    fclose($fh);
    return $filename;
  }

}
}

global $migrateSettings;
$migrateSettings = new ace_site_settings();
