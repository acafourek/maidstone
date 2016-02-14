<?php
/**
 * Call To Action Widget
 *
 * @package hoot
 * @subpackage chromatic
 * @since chromatic 1.0
 */

/**
* Class Hoot_CTA_Widget
*/
class Hoot_CTA_Widget extends Hoot_WP_Widget {

	function __construct() {

		$settings['id'] = 'hoot-cta-widget';
		$settings['name'] = __( 'Hoot > Call To Action', 'chromatic' );
		$settings['widget_options'] = array(
			'description'	=> __('Display Call To Action block.', 'chromatic'),
			'class'			=> 'hoot-cta-widget', // CSS class applied to frontend widget container via 'before_widget' arg
		);
		$settings['control_options'] = array();
		$settings['form_options'] = array(
			//'name' => can be empty or false to hide the name
			array(
				'name'		=> __( 'Headline', 'chromatic' ),
				'id'		=> 'headline',
				'type'		=> 'text',
			),
			array(
				'name'		=> __( 'Description', 'chromatic' ),
				'id'		=> 'description',
				'type'		=> 'textarea',
			),
			array(
				'name'		=> __( 'Button Text', 'chromatic' ),
				'desc'		=> __( 'Leave empty if you dont want to show button', 'chromatic' ),
				'id'		=> 'button_text',
				'type'		=> 'text',
				'std'		=> __( '-- LEARN MORE --', 'chromatic' ),
			),
			array(
				'name'		=> __( 'URL', 'chromatic' ),
				'desc'		=> __( 'Leave empty if you dont want to show button', 'chromatic' ),
				'id'		=> 'url',
				'type'		=> 'text',
				'sanitize'	=> 'url',
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
		);

		$settings = apply_filters( 'hoot_cta_widget_settings', $settings );

		parent::__construct( $settings['id'], $settings['name'], $settings['widget_options'], $settings['control_options'], $settings['form_options'] );

	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( hoot_locate_widget( 'cta' ) ); // Loads the widget/cta or template-parts/widget-cta.php template.
	}

}

/**
 * Register Widget
 */
function hoot_cta_widget_register(){
	register_widget('Hoot_CTA_Widget');
}
add_action('widgets_init', 'hoot_cta_widget_register');