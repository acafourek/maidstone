<?php

/**
 * Register new custom post types
 * @package Chromatic
 * @since Chromatic 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Register new post type */
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'chromatic_ps_portfolio_create_type' );

function chromatic_ps_portfolio_create_type() {


	register_post_type('portfolio',
		array(
			'labels' => array(
				'name'						=> __('Portfolios','chromatic'),
				'singular_name' 			=> __('Portfolio','chromatic'),
				'add_new'					=> __('Add New', 'chromatic'),
				'add_new_item'				=> __('Add Portfolio', 'chromatic'),
				'new_item'					=> __('Add Portfolio', 'chromatic'),
				'view_item'					=> __('View Portfolio', 'chromatic'),
				'search_items' 				=> __('Search Portfolios', 'chromatic'),
				'edit_item' 				=> __('Edit Portfolio', 'chromatic'),
				'all_items'					=> __('All Portfolios', 'chromatic'),
				'not_found'					=> __('No Portfolio found', 'chromatic'),
				'not_found_in_trash'		=> __('No Portfolio found in Trash', 'gridpsace')
			),
			'taxonomies'	=> array('pcategory', 'ptag'),
			'public' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array( 'slug' => 'portfolio', 'with_front' => false ),
			'query_var' => true,
			'supports' => array('title','revisions','thumbnail','author','editor'),
			'menu_position' => 5,
			'menu_icon' => get_template_directory_uri() .'/images/portfolio.png',
			'has_archive' => true
		)
	);
}