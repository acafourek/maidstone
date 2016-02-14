<?php
/**
 * Content Blocks Widget
 *
 * @package hoot
 * @subpackage chromatic
 * @since chromatic 1.0
 */

/**
* Class Hoot_Content_Blocks_Widget
*/
class Hoot_Content_Blocks_Widget extends Hoot_WP_Widget {

	function __construct() {

		$settings['id'] = 'hoot-content-blocks-widget';
		$settings['name'] = __( 'Hoot > Content Blocks', 'chromatic' );
		$settings['widget_options'] = array(
			'description'	=> __('Display Styled Content Blocks.', 'chromatic'),
			'class'			=> 'hoot-content-blocks-widget', // CSS class applied to frontend widget container via 'before_widget' arg
		);
		$settings['control_options'] = array();
		$settings['form_options'] = array(
			//'name' => can be empty or false to hide the name
			array(
				'name'		=> __( 'Blocks Style', 'chromatic' ),
				'id'		=> 'style',
				'type'		=> 'images',
				'std'		=> 'style1',
				'options'	=> array(
					'style1'	=> trailingslashit( HOOT_THEMEURI ) . 'admin/images/content-block-style-1.png',
					'style2'	=> trailingslashit( HOOT_THEMEURI ) . 'admin/images/content-block-style-2.png',
					'style3'	=> trailingslashit( HOOT_THEMEURI ) . 'admin/images/content-block-style-3.png',
					'style4'	=> trailingslashit( HOOT_THEMEURI ) . 'admin/images/content-block-style-4.png',
				),
			),
			array(
				'name'		=> __( 'No. Of Columns', 'chromatic' ),
				'id'		=> 'columns',
				'type'		=> 'select',
				'std'		=> '3',
				'options'	=> array(
					'1'	=> __( '1', 'chromatic' ),
					'2'	=> __( '2', 'chromatic' ),
					'3'	=> __( '3', 'chromatic' ),
					'4'	=> __( '4', 'chromatic' ),
					'5'	=> __( '5', 'chromatic' ),
				),
			),
			array(
				'name'		=> __( 'Icon Style', 'chromatic' ),
				'desc'		=> __( "Not applicable if 'Featured Image' is seected below.", 'chromatic' ),
				'id'		=> 'icon_style',
				'type'		=> 'select',
				'std'		=> 'circle',
				'options'	=> array(
					'none'		=> __( 'None', 'chromatic' ),
					'circle'	=> __( 'Circle', 'chromatic' ),
					'square'	=> __( 'Square', 'chromatic' ),
				),
			),
			array(
				'name'		=> __( 'Border', 'chromatic' ),
				'desc'		=> __( 'Top and bottom borders.', 'chromatic' ),
				'id'		=> 'border',
				'type'		=> 'select',
				'std'		=> 'none none',
				'options'	=> array(
					'line line'	=> __( 'Top - Line || Bottom - Line', 'chromatic' ),
					'line shadow'	=> __( 'Top - Line || Bottom - Shadow', 'chromatic' ),
					'line none'	=> __( 'Top - Line || Bottom - None', 'chromatic' ),
					'shadow line'	=> __( 'Top - Shadow || Bottom - Line', 'chromatic' ),
					'shadow shadow'	=> __( 'Top - Shadow || Bottom - Shadow', 'chromatic' ),
					'shadow none'	=> __( 'Top - Shadow || Bottom - None', 'chromatic' ),
					'none line'	=> __( 'Top - None || Bottom - Line', 'chromatic' ),
					'none shadow'	=> __( 'Top - None || Bottom - Shadow', 'chromatic' ),
					'none none'	=> __( 'Top - None || Bottom - None', 'chromatic' ),
				),
			),
			array(
				'name'		=> __( "Use 'Featured Image' of page instead of icons.", 'chromatic' ),
				'id'		=> 'image',
				'type'		=> 'checkbox',
			),
			array(
				'name'		=> __( "Display excerpt instead of full content (Read More link will be automatically inserted if no Custom Link URL is provided below)", 'chromatic' ),
				'id'		=> 'excerpt',
				'type'		=> 'checkbox',
			),
			array(
				'name'		=> __( 'Content Boxes', 'chromatic' ),
				'id'		=> 'boxes',
				'type'		=> 'group',
				'options'	=> array(
					'item_name'	=> __( 'Content Box', 'chromatic' ),
				),
				'fields'	=> array(
					array(
						'name'		=> __('Icon', 'chromatic'),
						'desc'		=> __( "Not applicable if 'Featured Image' is selected above.", 'chromatic' ),
						'id'		=> 'icon',
						'type'		=> 'icon'),
					array(
						'name'		=> __( 'Page', 'chromatic' ),
						'id'		=> 'page',
						'type'		=> 'select',
						'options'	=> Hoot_WP_Widget::get_wp_list('page'),
					),
					array(
						'name'		=> __('Link Text (optional)', 'chromatic'),
						'id'		=> 'link',
						'type'		=> 'text'),
					array(
						'name'		=> __('Link URL (optional)', 'chromatic'),
						'id'		=> 'url',
						'std'		=> 'http://',
						'type'		=> 'text',
						'sanitize'	=> 'url'),
				),
			),
		);

		$settings = apply_filters( 'hoot_content_blocks_widget_settings', $settings );

		parent::__construct( $settings['id'], $settings['name'], $settings['widget_options'], $settings['control_options'], $settings['form_options'] );

	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( hoot_locate_widget( 'content-blocks' ) ); // Loads the widget/content-blocks or template-parts/widget-content-blocks.php template.
	}

}

/**
 * Register Widget
 */
function hoot_content_blocks_widget_register(){
	register_widget('Hoot_Content_Blocks_Widget');
}
add_action('widgets_init', 'hoot_content_blocks_widget_register');