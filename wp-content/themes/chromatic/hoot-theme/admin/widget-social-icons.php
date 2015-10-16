<?php
/**
 * Social Icons Widget
 *
 * @package chromaticfw
 * @subpackage chromatic
 * @since chromatic 1.0
 */

/**
* Class ChromaticFw_Social_Icons_Widget
*/
class ChromaticFw_Social_Icons_Widget extends ChromaticFw_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'chromaticfw-social-icons-widget',

			//name
			__( 'Hoot > Social Icons', 'chromatic' ),

			//widget_options
			array(
				'description'	=> __('Display Social Icons', 'chromatic'),
				'class'			=> 'chromaticfw-social-icons-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Icon Size', 'chromatic' ),
					'id'		=> 'size',
					'type'		=> 'select',
					'std'		=> 'medium',
					'options'	=> array(
						'small'		=> __( 'Small', 'chromatic' ),
						'medium'	=> __( 'Medium', 'chromatic' ),
						'large'		=> __( 'Large', 'chromatic' ),
						'huge'		=> __( 'Huge', 'chromatic' ),
					),
				),
				array(
					'name'		=> __( 'Social Icons', 'chromatic' ),
					'id'		=> 'icons',
					'type'		=> 'group',
					'options'	=> array(
						'item_name'	=> __( 'Icon', 'chromatic' ),
					),
					'fields'	=> array(
						array(
							'name'		=> __( 'Social Icon', 'chromatic' ),
							'id'		=> 'icon',
							'type'		=> 'select',
							'options'	=> array(
								'fa-behance'	=> __( 'Behance', 'chromatic' ),
								'fa-bitbucket'	=> __( 'Bitbucket', 'chromatic' ),
								'fa-btc'		=> __( 'BTC', 'chromatic' ),
								'fa-codepen'	=> __( 'Codepen', 'chromatic' ),
								'fa-delicious'	=> __( 'Delicious', 'chromatic' ),
								'fa-deviantart'	=> __( 'Deviantart', 'chromatic' ),
								'fa-digg'		=> __( 'Digg', 'chromatic' ),
								'fa-dribbble'	=> __( 'Dribbble', 'chromatic' ),
								'fa-dropbox'	=> __( 'Dropbox', 'chromatic' ),
								'fa-envelope'	=> __( 'Email', 'chromatic' ),
								'fa-facebook'	=> __( 'Facebook', 'chromatic' ),
								'fa-flickr'		=> __( 'Flickr', 'chromatic' ),
								'fa-foursquare'	=> __( 'Foursquare', 'chromatic' ),
								'fa-github'		=> __( 'Github', 'chromatic' ),
								'fa-google-plus'=> __( 'Google Plus', 'chromatic' ),
								'fa-instagram'	=> __( 'Instagram', 'chromatic' ),
								'fa-lastfm'		=> __( 'Last FM', 'chromatic' ),
								'fa-linkedin'	=> __( 'Linkedin', 'chromatic' ),
								'fa-pinterest'	=> __( 'Pinterest', 'chromatic' ),
								'fa-reddit'		=> __( 'Reddit', 'chromatic' ),
								'fa-rss'		=> __( 'RSS', 'chromatic' ),
								'fa-skype'		=> __( 'Skype', 'chromatic' ),
								'fa-slack'		=> __( 'Slack', 'chromatic' ),
								'fa-slideshare'	=> __( 'Slideshare', 'chromatic' ),
								'fa-soundcloud'	=> __( 'Soundcloud', 'chromatic' ),
								'fa-stack-exchange'	=> __( 'Stack Exchange', 'chromatic' ),
								'fa-stack-overflow'	=> __( 'Stack Overflow', 'chromatic' ),
								'fa-steam'		=> __( 'Steam', 'chromatic' ),
								'fa-stumbleupon'=> __( 'Stumbleupon', 'chromatic' ),
								'fa-tumblr'		=> __( 'Tumblr', 'chromatic' ),
								'fa-twitch'		=> __( 'Twitch', 'chromatic' ),
								'fa-twitter'	=> __( 'Twitter', 'chromatic' ),
								'fa-vimeo-square'=> __( 'Vimeo', 'chromatic' ),
								'fa-wordpress'	=> __( 'Wordpress', 'chromatic' ),
								'fa-yelp'		=> __( 'Yelp', 'chromatic' ),
								'fa-youtube'	=> __( 'Youtube', 'chromatic' ),
							),
						),
						array(
							'name'		=> __( 'URL', 'chromatic' ),
							'id'		=> 'url',
							'type'		=> 'text',
							'sanitize'	=> 'url',
						),
					),
				),
			)
		);
	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( chromaticfw_locate_widget( 'social-icons' ) ); // Loads the widget/social-icons or template-parts/widget-social-icons.php template.
	}

}

/**
 * Register Widget
 */
function chromaticfw_social_icons_widget_register(){
	register_widget('ChromaticFw_Social_Icons_Widget');
}
add_action('widgets_init', 'chromaticfw_social_icons_widget_register');