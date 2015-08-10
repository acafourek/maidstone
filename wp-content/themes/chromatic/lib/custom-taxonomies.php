<?php

/**
 * Register new custom taxonomies
 * @package Chromatic
 * @since Chromatic 1.0
 */


/*-----------------------------------------------------------------------------------*/
/* Register taxonomy for new post type */
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'chromatic_ps_portfolio_taxonomy', 0 );

function chromatic_ps_portfolio_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Categories', 'taxonomy general name', 'chromatic' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name', 'chromatic' ),
    'search_items' =>  __( 'Search Categories', 'chromatic' ),
    'all_items' => __( 'All Categories', 'chromatic' ),
    'parent_item' => __( 'Parent Category', 'chromatic' ),
    'parent_item_colon' => __( 'Parent Category:', 'chromatic' ),
    'edit_item' => __( 'Edit Category', 'chromatic' ),
    'update_item' => __( 'Update Category', 'chromatic' ),
    'add_new_item' => __( 'Add New Category', 'chromatic' ),
    'new_item_name' => __( 'New Category Name', 'chromatic' ),
    'menu_name' => __( 'Categories', 'chromatic' )
  );
	register_taxonomy('pcategory','portfolio',array(
				'hierarchical' => true,
				'labels' => $labels,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'pcategory' )
	));
}

add_action( 'init', 'chromatic_ps_portfolio_tags', 1 );

function chromatic_ps_portfolio_tags() {
	register_taxonomy( 'ptag', 'portfolio', array(
				'hierarchical' => false,
				'update_count_callback' => '_update_post_term_count',
				'label' => __('Tags', 'chromatic'),
				'query_var' => true,
				'rewrite' => array( 'slug' => 'ptags' )
	)) ;
}