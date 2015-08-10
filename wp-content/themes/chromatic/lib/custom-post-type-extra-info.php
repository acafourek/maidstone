<?php

/**
 * Register extra info to admin menu fot portfolio post type
 * @package Chromatic
 * @since Chromatic 1.0
 */

/* ************************* */
function chromatic_add_custom_meta_boxes() {

	// Define the custom attachment for posts
	add_meta_box(
		'wp_custom_attachment',
		'Portfolio Details',
		'chromatic_custom_attachment',
		'portfolio',
		'normal',
		'high'
	);

} // end chromatic_add_custom_meta_boxes
add_action('add_meta_boxes', 'chromatic_add_custom_meta_boxes');


function chromatic_custom_attachment() {

	wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');
	$html="";


	$portfolio_date = get_post_meta(get_the_ID(), '_chromatic_date', true);
	$client = get_post_meta(get_the_ID(), '_chromatic_client', true);
	$client_url = get_post_meta(get_the_ID(), '_chromatic_clienturl', true);

	$html .= '
	<div class="custom-meta-data">

			<span style="width: 70px;float:left;">Date:</span> <input type="text" class="chromatic_date" id="chromatic_date" name="chromatic_date" value="'.$portfolio_date.'" ><br />
			<span style="width: 70px;float:left;">Client:</span> <input type="text" class="chromatic_client" id="chromatic_client" name="chromatic_client" value="'.$client.'" ><br />
			<span style="width: 70px;float:left;">Client URL:</span> <input type="text" class="chromatic_clienturl" id="chromatic_clienturl" name="chromatic_clienturl" value="'.$client_url.'" ><br />

		';

	$html .= '
	</div>';


	echo $html;

} // end chromatic_custom_attachment


function chromatic_save_custom_meta_data($id) {
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	  return $id;
	} // end if

	if(!current_user_can('edit_page', $id)) {
		return $id;
	} // end if


		if( isset( $_POST['chromatic_date'] ) ) {
			update_post_meta($id, '_chromatic_date', $_POST['chromatic_date']);
		}
		if( isset( $_POST['chromatic_client'] ) ) {
			update_post_meta($id, '_chromatic_client', $_POST['chromatic_client']);
		}
		if( isset( $_POST['chromatic_clienturl'] ) ) {
			update_post_meta($id, '_chromatic_clienturl', $_POST['chromatic_clienturl']);
		}

} // end save_custom_meta_data
add_action('save_post', 'chromatic_save_custom_meta_data');


/* function update_edit_form() {
    echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form'); */

// ADDS EXTRA INFO TO ADMIN MENU FOR PORTFOLIO POST TYPE
add_filter('manage_edit-portfolio_columns', 'chromatic_add_new_portfolio_columns');
function chromatic_add_new_portfolio_columns($portfolios_columns) {
	$new_columns['cb'] = '<input type="checkbox" />';
	$new_columns['title'] = _x('Title', 'column name','chromatic');
	$new_columns['pcategory'] = __('Categories', 'chromatic');
	$new_columns['ptag'] = __('Tags', 'chromatic');
	$new_columns['date'] = _x('Date', 'column name', 'chromatic');
	return $new_columns;
}

// Add to admin_init function
add_action('manage_portfolio_posts_custom_column', 'chromatic_manage_portfolio_columns', 10, 3);
function chromatic_manage_portfolio_columns($column_name, $id) {
global $post;
	switch ($column_name) {
		case 'pcategory':
			// Get the collections
			$gcats = "";

			$pcategories = get_the_terms( $post->ID, 'pcategory');
			if($pcategories != ""){
				foreach($pcategories as $pcategory){
					$gcats .= " <a href=edit.php?post_type=portfolio&pcategory=".$pcategory->slug.">".$pcategory->name."</a>,";
				}
			}
			echo substr($gcats,0,-1);
			break;
		case 'ptag':
			// Get the collections
			$gtags = "";
			$ptags = get_the_terms( $post->ID, 'ptag');
			if($ptags != ""){
				foreach($ptags as $ptag){
					$gtags .= " <a href=edit.php?post_type=portfolio&ptag=".$ptag->slug.">".$ptag->name."</a>,";
				}
			}
			echo substr($gtags,0,-1);
			break;
		default:
			break;
	} // end switch
}


?>