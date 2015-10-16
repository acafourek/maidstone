<?php
/**
 * Theme Options displayed in admin
 *
 * @package chromaticfw
 * @subpackage chromatic
 * @since chromatic 1.0
 */

/**
 * Filter the default typography option values for the theme
 * For a list of available font faces, see "/hoot/options/includes/fonts.php"
 *
 * @since 1.0
 * @param array $typography array of 'size', 'face', 'style' and 'color'
 * @return  array
 */
function chromaticoptions_default_typography( $typography ) {
	$theme_typography = array(
		'size' => '14px',
		'face' => '"Lato", sans-serif',
		'style' => 'normal',
		'color' => '#444444' );
	return wp_parse_args( $theme_typography, $typography );
}
add_filter( 'chromaticfw_of_default_typography', 'chromaticoptions_default_typography' );

/**
 * Filter the widget areas added for 'Widgetized Template'
 *
 * @since 1.0
 * @param array $defaults
 * @return  array
 */
function chromaticoptions_widgetized_template_widget_areas( $default ) {
	return $default;
}
add_filter( 'chromaticfw_widgetized_template_widget_areas', 'chromaticoptions_widgetized_template_widget_areas' );

/**
 * Filter the admin panel intro buttons
 *
 * @since 1.0
 * @param array $buttons
 * @return array
 */
function chromaticoptions_intro_buttons( $buttons ) {
	$buttons = array(
		'demo'    => array( 'text'   => __( 'Demo', 'chromatic'),
							'button' => 'secondary',
							'url'    => 'http://demo.wphoot.com/chromatic/',
							'icon'   => 'eye' ),
		'docs'    => array( 'text'   => __( 'Documentation', 'chromatic'),
							'button' => 'secondary',
							'url'    => 'http://wphoot.com/docs/chromatic/',
							'icon'   => 'book' ),
		'support' => array( 'text'   => __( 'Support Forums', 'chromatic'),
							'button' => 'secondary',
							'url'    => 'http://wphoot.com/support/',
							'icon'   => 'support' ),
		'rate' =>    array( 'text'   => __( '5<i class="fa fa-star"></i> Rate the Theme', 'chromatic'),
							'button' => 'secondary',
							'url'    => 'https://wordpress.org/support/view/theme-reviews/chromatic#postform',
							'icon'   => 'none' ),
		);
	$buttons['premium'] = array('text'   => __( 'Go Premium', 'chromatic'),
								'button' => 'primary',
								'url'    => esc_url( 'http://wphoot.com/themes/chromatic/' ),
								'icon'   => 'cubes' );
	return $buttons;
}
add_filter( 'chromaticoptions_intro_buttons', 'chromaticoptions_intro_buttons' );

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * Child themes can modify the options array using the 'chromaticfw_theme_options' filter hook.
 *
 * @since 1.0
 */
function chromaticoptions_options() {

	// define a directory path for using image radio buttons
	$imagepath =  trailingslashit( CHROMATICFW_THEMEURI ) . 'admin/images/';

	$options = array();

	$options[] = array(
		'name' => __('General', 'chromatic'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Site Options', 'chromatic'),
		'type' => 'subheading');

	$options[] = array(
		'name' => __('Site Logo', 'chromatic'),
		'desc' => sprintf( __('Use %sSite Title%s as text logo', 'chromatic'), '<a href="' . admin_url('/') . 'options-general.php" target="_blank">', '</a>' ),
		'id' => 'logo',
		'class' => 'logo_selector',
		'std' => 'text',
		'type' => 'radio',
		'options' => array(
			'text' => __('Plain Text', 'chromatic'),
			'image' => __('Image Logo', 'chromatic'), ) );

		$options[] = array(
			'std' => '<div class="show-on-select" data-selector="logo_selector">',
			'type' => 'html');

		$options[] = array(
			'name' => __('Site Title Icon (Optional)', 'chromatic'),
			'desc' => __('Leave empty to hide icon.', 'chromatic'),
			'id' => 'site_title_icon',
			'class' => 'show-on-select-block logo_selector-text hide',
			'type' => 'icon');

		$options[] = array(
			'name' => __('Show Tagline', 'chromatic'),
			'desc' => __('Display site description as tagline below logo.', 'chromatic'),
			'id' => 'show_tagline',
			'class' => 'show-on-select-block logo_selector-text hide',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => __('Upload Logo', 'chromatic'),
			'id' => 'logo_image',
			'class' => 'show-on-select-block logo_selector-image hide',
			'type' => 'upload');

		$options[] = array(
			'std' => '</div>',
			'type' => 'html');

	$options[] = array(
		'name' => __('Custom Favicon', 'chromatic'),
		'desc' => __('Recommnended dimensions are 32x32 pixels.', 'chromatic'),
		'id' => 'favicon',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Site Info Text (footer)', 'chromatic'),
		'desc' => sprintf( __('Text shown in footer. Useful for showing copyright info etc.<br />Use the <code>&lt;!--default--&gt;</code> tag to show the default Info Text.<br />Use the <code>&lt;!--year--&gt;</code> tag to insert the current year.<br />Always use %sHTML codes%s for symbols. For example, the HTML for &copy; is <code>&amp;copy;</code>', 'chromatic'), '<a href="http://ascii.cl/htmlcodes.htm" target="_blank">', '</a>' ),
		'id' => 'site_info',
		'std' => '<!--default-->',
		'type' => 'textarea',
		'settings' => array( 'rows' => 3 ) );

	$options[] = array(
		'name' => __('Sitewide Styling', 'chromatic'),
		'type' => 'subheading');

	$options[] = array(
		'name' => __('Accent Color', 'chromatic'),
		'id' => 'accent_color',
		'std' => '#40c2a6',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Font Color on Accent Color', 'chromatic'),
		'id' => 'accent_font',
		'std' => '#ffffff',
		'type' => 'color' );

	if ( current_theme_supports( 'woocommerce' ) ) :
	$options[] = array(
		'name' => __('Woocommerce Styling', 'chromatic'),
		'desc' => sprintf( __('Looks like you are using Woocommerce. Install %sthis plugin%s to change colors and styles for WooCommerce elements like buttons etc.', 'chromatic'), '<a href="https://wordpress.org/plugins/woocommerce-colors/" target="_blank">', '</a>' ),
		'type' => 'info');
	endif;

	$options[] = array(
		'name' =>  __('Site Background', 'chromatic'),
		'id' => 'background',
		'std' => array(
			'color' => '#ffffff', ),
		'type' => 'background', );

	$options[] = array(
		'name' =>  __('Site Box Background', 'chromatic'),
		'desc' => __("This background will be used only if one of the <strong>'boxed'</strong> options is selected in the <strong>'Site Layout'</strong> option in the Layout tab above.", 'chromatic'),
		'id' => 'box_background',
		'std' => array(
			'color' => '#ffffff', ),
		'type' => 'background', );

	$options[] = array(
		'name' => __('Layout', 'chromatic'),
		'type' => 'heading');

	$options[] = array(
		'name' => __("Site Layout - Boxed vs Stretched", 'chromatic'),
		'desc' => __("For boxed layouts, both backgrounds (site and box) can be set in the 'General > Styling' tab above.<br /><br />For Stretched Layout, only site background is available.", 'chromatic'),
		'id' => "site_layout",
		'std' => "stretch",
		'type' => 'radio',
		'options' => array(
			'boxed' => __('Boxed layout', 'chromatic'),
			'stretch' => __('Stretched layout (full width)', 'chromatic'), ) );

	$options[] = array(
		'name' => __("Max. Site Width (pixels)", 'chromatic'),
		'id' => "site_width",
		'std' => "1260",
		'type' => 'radio',
		'options' => array(
			'1260' => __('1260px (wide)', 'chromatic'),
			'1080' => __('1080px (standard)', 'chromatic'), ) );

	$options[] = array(
		'name' => __("Sidebar Layout (Site-wide)", 'chromatic'),
		'desc' => __("Set the default sidebar width and position for your entire site.<br />* Wide Right Sidebar<br />* Narrow Right Sidebar<br />* No Sidebar", 'chromatic'),
		'id' => "sidebar",
		'std' => "wide-right",
		'type' => "images",
		'options' => array(
			'wide-right' => $imagepath . 'sidebar-wide-right.png',
			'narrow-right' => $imagepath . 'sidebar-narrow-right.png',
			'none' => $imagepath . 'sidebar-none.png', )
	);

	$options[] = array(
		'name' => __("Sidebar Layout (for Pages)", 'chromatic'),
		'desc' => __("Set the default sidebar width and position for pages.<br />* Wide Right Sidebar<br />* Narrow Right Sidebar<br />* No Sidebar", 'chromatic'),
		'id' => "sidebar_pages",
		'std' => "wide-right",
		'type' => "images",
		'options' => array(
			'wide-right' => $imagepath . 'sidebar-wide-right.png',
			'narrow-right' => $imagepath . 'sidebar-narrow-right.png',
			'none' => $imagepath . 'sidebar-none.png', )
	);

	$options[] = array(
		'name' => __("Sidebar Layout (for single Posts)", 'chromatic'),
		'desc' => __("Set the default sidebar width and position for single posts.<br />* Wide Right Sidebar<br />* Narrow Right Sidebar<br />* No Sidebar", 'chromatic'),
		'id' => "sidebar_posts",
		'std' => "wide-right",
		'type' => "images",
		'options' => array(
			'wide-right' => $imagepath . 'sidebar-wide-right.png',
			'narrow-right' => $imagepath . 'sidebar-narrow-right.png',
			'none' => $imagepath . 'sidebar-none.png', )
	);

	if ( current_theme_supports( 'woocommerce' ) ) :
	$options[] = array(
		'name' => __("Sidebar Layout (Woocommerce Shop/Archives)", 'chromatic'),
		'desc' => __("Set the default sidebar width and position for WooCommerce shop and archives pages like product categories etc.<br />* Wide Right Sidebar<br />* Narrow Right Sidebar<br />* No Sidebar", 'chromatic'),
		'id' => "sidebar_wooshop",
		'std' => "wide-right",
		'type' => "images",
		'options' => array(
			'wide-right' => $imagepath . 'sidebar-wide-right.png',
			'narrow-right' => $imagepath . 'sidebar-narrow-right.png',
			'none' => $imagepath . 'sidebar-none.png', )
	);
	$options[] = array(
		'name' => __("Sidebar Layout (Woocommerce Single Product Page)", 'chromatic'),
		'desc' => __("Set the default sidebar width and position for WooCommerce product pages<br />* Wide Right Sidebar<br />* Narrow Right Sidebar<br />* No Sidebar", 'chromatic'),
		'id' => "sidebar_wooproduct",
		'std' => "wide-right",
		'type' => "images",
		'options' => array(
			'wide-right' => $imagepath . 'sidebar-wide-right.png',
			'narrow-right' => $imagepath . 'sidebar-narrow-right.png',
			'none' => $imagepath . 'sidebar-none.png', )
	);
	endif;

	$options[] = array(
		'name' => __("Footer Layout", 'chromatic'),
		'desc' => sprintf( __('Once you save the settings here, you can add content to footer columns using the %sWidgets Management screen%s.', 'chromatic'), '<a href="' . admin_url('/') . 'widgets.php" target="_blank">', '</a>' ),
		'id' => "footer",
		'std' => "3-1",
		'type' => "images",
		'options' => array(
			'1-1' => $imagepath . '1-1.png',
			'2-1' => $imagepath . '2-1.png',
			'2-2' => $imagepath . '2-2.png',
			'2-3' => $imagepath . '2-3.png',
			'3-1' => $imagepath . '3-1.png',
			'3-2' => $imagepath . '3-2.png',
			'3-3' => $imagepath . '3-3.png',
			'3-4' => $imagepath . '3-4.png',
			'4-1' => $imagepath . '4-1.png', )
	);

	$options[] = array(
		'name' => __('Content', 'chromatic'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Archives (Blog, Cats, Tags)', 'chromatic'),
		'type' => 'subheading');

	$options[] = array(
		'name' => __('Post Items Content', 'chromatic'),
		'desc' => __('Content to display for each post in the list', 'chromatic'),
		'id' => 'archive_post_content',
		'std' => 'excerpt',
		'type' => 'radio',
		'options' => array(
			'excerpt' => __('Post Excerpt', 'chromatic'),
			'full-content' => __('Full Post Content', 'chromatic'), ) );

	$options[] = array(
		'name' => __('Meta Information for Post List Items', 'chromatic'),
		'desc' => __('Check which meta information to display for each post item in the archive list.', 'chromatic'),
		'id' => 'archive_post_meta',
		'std' => array(
			'author' => '1',
			'date' => '1',
			'cats' => '1',
			'comments' => '1', ),
		'type' => 'multicheck',
		'options' => array(
			'author' => __('Author', 'chromatic'),
			'date' => __('Date', 'chromatic'),
			'cats' => __('Categories', 'chromatic'),
			'tags' => __('Tags', 'chromatic'),
			'comments' => __('No. of comments', 'chromatic') ) );

	$options[] = array(
		'name' => __("Excerpt Length", 'chromatic'),
		'desc' => __("Number of words in excerpt. Default is 105. Leave empty if you dont want to change it.", 'chromatic'),
		'id' => 'excerpt_length',
		'type' => 'text');

	$options[] = array(
		'name' => __("'Read More' Text", 'chromatic'),
		'desc' => __("Replace the default 'Read More' text. Leave empty if you dont want to change it.", 'chromatic'),
		'id' => 'read_more',
		'type' => 'text');

	$options[] = array(
		'name' => __('Single (Posts, Pages)', 'chromatic'),
		'type' => 'subheading');

	$options[] = array(
		'name' => __('Display Featured Image', 'chromatic'),
		'desc' => __('Display featured image at the beginning of post/page content.', 'chromatic'),
		'id' => 'post_featured_image',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Meta Information on Posts', 'chromatic'),
		'desc' => __("Check which meta information to display on an individual 'Post' page", 'chromatic'),
		'id' => 'post_meta',
		'std' => array(
			'author' => '1',
			'date' => '1',
			'cats' => '1',
			'tags' => '1',
			'comments' => '1', ),
		'type' => 'multicheck',
		'options' => array(
			'author' => __('Author', 'chromatic'),
			'date' => __('Date', 'chromatic'),
			'cats' => __('Categories', 'chromatic'),
			'tags' => __('Tags', 'chromatic'),
			'comments' => __('No. of comments', 'chromatic') ) );

	$options[] = array(
		'name' => __('Meta Information on Page', 'chromatic'),
		'desc' => __("Check which meta information to display on an individual 'Page' page", 'chromatic'),
		'id' => 'page_meta',
		'std' => array(
			'author' => '1',
			'date' => '1',
			'comments' => '1', ),
		'type' => 'multicheck',
		'options' => array(
			'author' => __('Author', 'chromatic'),
			'date' => __('Date', 'chromatic'),
			'comments' => __('No. of comments', 'chromatic') ) );

	$options[] = array(
		'name' => __('Meta Information location', 'chromatic'),
		'id' => 'post_meta_location',
		'std' => 'top',
		'type' => 'radio',
		'options' => array(
			'top' => __('Top (below title)', 'chromatic'),
			'bottom' => __('Bottom (after content)', 'chromatic'), ) );

	$options[] = array(
		'name' => __('Previous/Next Posts', 'chromatic'),
		'desc' => __('Display links to Prev/Next Post links at the end of content.', 'chromatic'),
		'id' => 'post_prev_next_links',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Contact Form', 'chromatic'),
		'desc' => sprintf( __('This theme comes bundled with CSS required to style %sContact-Form-7%s forms. Simply install and activate the plugin to add Contact Forms to your pages.', 'chromatic'), '<a href="https://wordpress.org/plugins/contact-form-7/" target="_blank">', '</a>'),
		'type' => 'info' );

	if ( current_theme_supports( 'woocommerce' ) ) :
	$options[] = array(
		'name' => __('WooCommerce', 'chromatic'),
		'type' => 'subheading');
	$wooproducts = range( 0, 99 );
	for ( $wpr=0; $wpr < 4; $wpr++ )
		unset( $wooproducts[$wpr] );
	$options[] = array(
		'name' => __("Total Products per page", 'chromatic'),
		'desc' => __("Total number of products to show on the Shop page", 'chromatic'),
		'id' => "wooshop_products",
		'std' => "12",
		'type' => "select",
		'options' => $wooproducts
	);
	$options[] = array(
		'name' => __("Product Columns", 'chromatic'),
		'desc' => __("Number of products to show in 1 row on the Shop page", 'chromatic'),
		'id' => "wooshop_product_columns",
		'std' => "3",
		'type' => "select",
		'options' => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5' )
	);
	endif;

	if ( current_theme_supports( 'chromaticfw-widgetized-template' ) ) :

	$options[] = array(
		'name' => __('Templates', 'chromatic'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Widgetized Template', 'chromatic'),
		'type' => 'subheading');

	$options[] = array(
		'name' => __('How to use this template', 'chromatic'),
		'desc' => sprintf( __( "<p>'Widgetized Template' is a special Page Template which is often used to create a Customized Front Page.</p><ol><li>Create a %sNew Page%s. In the <strong>'Page Attributes'</strong> option box select the <strong>'Widgetized Template'</strong> in the <strong>'Template'</strong> dropdown.</li><li>Goto %sSetting > Reading%s menu. In the <strong>'Front page displays'</strong> option, select <strong>'A static page'</strong> and select the page you created in previous step.</li></ol>", 'chromatic'), '<a href="' . admin_url('/') . 'post-new.php?post_type=page" target="_blank">', '</a>', '<a href="' . admin_url('/') . 'options-reading.php" target="_blank">', '</a>'),
		'type' => 'info' );

	$slider1_label = __('HTML Slider', 'chromatic');
	$slider2_label = __('Image Slider', 'chromatic');

	$options[] = array(
		'name' => __('Widget Areas Order', 'chromatic'),
		'desc' => sprintf( __("Sort different sections of the 'Widgetized Template' in the order you want them to appear.<br />You can disable areas by clicking the 'eye' icon.<br /><br />You can add content to widget areas from the %sWidgets Management screen%s.<br /><br />'Page Content' is the actual content of the page on which this template is applied. This can be used in special situations for creating extra customizable content.", 'chromatic'), '<a href="' . admin_url('/') . 'widgets.php" target="_blank">', '</a>' ),
		'id' => 'widgetized_template_sections',
		'std' => array(
			'slider_html' => '1,1',
			'slider_img'  => '2,1',
			'area_a'      => '3,1',
			'area_b'      => '4,1',
			'area_c'      => '5,1',
			'area_d'      => '6,1',
			'content'     => '7,0', ),
		'type' => 'sortlist',
		'settings' => array(
			'hideable' => true,
			),
		'options' => array(
			'slider_html' => $slider1_label,
			'slider_img'  => $slider2_label,
			'area_a'      => __('Widget Area A', 'chromatic'),
			'area_b'      => __('Widget Area B', 'chromatic'),
			'area_c'      => __('Widget Area C', 'chromatic'),
			'area_d'      => __('Widget Area D-left / D-right', 'chromatic'),
			'content'     => __('Page Content', 'chromatic'), ) );

	$options[] = array(
		'name' => __('Widget Area D Widths', 'chromatic'),
		'desc' => __('Widths for D-Left and D-Right Areas', 'chromatic'),
		'id' => 'widgetized_template_area_d_width',
		'std' => '50-50',
		'type' => 'select',
		'options' => array(
			'50-50' => __('50 50', 'chromatic'),
			'33-66' => __('33 66', 'chromatic'),
			'66-33' => __('66 33', 'chromatic'),
			'25-75' => __('25 75', 'chromatic'),
			'75-25' => __('75 25', 'chromatic'), ) );

	$options[] = array(
		'name' => $slider1_label,
		'type' => 'subheading');

	$options[] = array(
		'name' => __("Slider Width (in Stretched Site Layout)", 'chromatic'),
		'desc' => __("Enable this to stretch the slider to Full Screen Width.<br />Note: This option is useful only if the <strong>'Site Layout'</strong> is set to <strong>'Stretched (full width)'</strong> in the 'Layout' tab above.", 'chromatic'),
		'id' => "wt_html_slider_width",
		'std' => "boxed",
		'type' => "images",
		'options' => array(
			'boxed' => $imagepath . 'slider-width-boxed.png',
			'stretch' => $imagepath . 'slider-width-stretch.png', )
	);

	$options[] = array(
		'name' => __('Slides', 'chromatic'),
		'desc' => __('Premium version of this theme comes with capability to create <strong>Unlimited slides</strong>.', 'chromatic'),
		'id' => 'wt_html_slider',
		'std' => array( 'g0' => array(), 'g1' => array(), 'g2' => array(), 'g3' => array() ),
		'type' => 'group',
		'settings' => array(
			'title' => __( 'Slide', 'chromatic' ),
			'add_button' => __( 'Add New Slide', 'chromatic' ),
			'remove_button' => __( 'Remove Slide', 'chromatic' ),
			),
		'fields' => array(
			array(
				'name' => __('To hide this slide, simply leave the Image and Content empty.', 'chromatic'),
				'type' => 'info'),
			array(
				'name' => __('Slide Image', 'chromatic'),
				'desc' => __('The main showcase image.', 'chromatic'),
				'id' => 'image',
				'type' => 'upload'),
			array(
				'name' => __('Content', 'chromatic'),
				'desc' => __('You can use the <code>&lt;h3&gt;Lorem Ipsum Dolor&lt;/h3&gt;</code> tag to create styled heading.', 'chromatic'),
				'id' => 'content',
				'std' => '<h3>Lorem Ipsum Dolor</h3>'."\n".'<p>This is a sample description text for the slide.</p>',
				'type' => 'textarea',
				'settings' => array( 'rows' => 4 ) ),
			array(
				'name' => __('Button Text', 'chromatic'),
				'id' => 'button',
				'type' => 'text'),
			array(
				'name' => __('Button URL', 'chromatic'),
				'desc' => __('Leave empty if you do not want to show the button.', 'chromatic'),
				'id' => 'url',
				'type' => 'text'),
			array(
				'name' =>  __('Slide Background', 'chromatic'),
				'id' => 'background',
				'std' => array(
					'color' => '#ffffff' ),
				'type' => 'background',
				'options' => array(
					'attachment' => false,
					'repeat' => false,
					'position' => false, ) ),
			), );

	$options[] = array(
		'name' => $slider2_label,
		'type' => 'subheading');

	$options[] = array(
		'name' => __("Slider Width (in Stretched Site Layout)", 'chromatic'),
		'desc' => __("Enable this to stretch the slider to Full Screen Width.<br />Note: This option is useful only if the <strong>'Site Layout'</strong> is set to <strong>'Stretched (full width)'</strong> in the 'Layout' tab above.", 'chromatic'),
		'id' => "wt_img_slider_width",
		'std' => "boxed",
		'type' => "images",
		'options' => array(
			'boxed' => $imagepath . 'slider-width-boxed.png',
			'stretch' => $imagepath . 'slider-width-stretch.png', )
	);

	$options[] = array(
		'name' => __('Slides', 'chromatic'),
		'desc' => __('Premium version of this theme comes with capability to create <strong>Unlimited slides</strong>.', 'chromatic'),
		'id' => 'wt_img_slider',
		'std' => array( 'g0' => array(), 'g1' => array(), 'g2' => array(), 'g3' => array() ),
		'type' => 'group',
		'settings' => array(
			'title' => __( 'Slide', 'chromatic' ),
			'add_button' => __( 'Add New Slide', 'chromatic' ),
			'remove_button' => __( 'Remove Slide', 'chromatic' ),
			),
		'fields' => array(
			array(
				'name' => __('To hide this slide, simply leave the Image empty.', 'chromatic'),
				'type' => 'info'),
			array(
				'name' => __('Slide Image', 'chromatic'),
				'desc' => __('The main showcase image.', 'chromatic'),
				'id' => 'image',
				'type' => 'upload'),
			array(
				'name' => __('Slide Caption (optional)', 'chromatic'),
				'id' => 'caption',
				'type' => 'text'),
			array(
				'name' => __('Slide Link', 'chromatic'),
				'desc' => __('Leave empty if you do not want to link the slide.', 'chromatic'),
				'id' => 'url',
				'type' => 'text'),
			), );

	endif; // end 'chromaticfw-widgetized-template' supported theme options

	// Add Premium Tab
	$options_premium = include_once( trailingslashit( CHROMATICFW_THEMEDIR ) . 'admin/premium.php' );
	if ( is_array( $options_premium ) && !empty( $options_premium ) ) {

		$premium = '';
		foreach ( $options_premium as $option_premium ) {
			$premium .= '<div class="section section-info section-premium-info">';
			if ( !empty( $option_premium['desc'] ) ) {
				$premium .= '<div class="premium-info">';
				$premium .= '<div class="premium-info-text controls">';
				if ( !empty( $option_premium['name'] ) )
					$premium .= '<h4 class="heading">' . $option_premium['name'] . '</h4>';
				$premium .= $option_premium['desc'];
				$premium .= '</div>';
				if ( !empty( $option_premium['img'] ) )
					$premium .= '<div class="premium-info-img explain">' .
								'<img src="' . esc_url( $imagepath . $option_premium['img'] ) . '" />' .
								'</div>';
				$premium .= '<div class="clear"></div>';
				$premium .= '</div>';
			} elseif ( !empty( $option_premium['name'] ) ) {
				$premium .= '<h4 class="heading">' . $option_premium['name'] . '</h4>';
			}
			if ( !empty( $option_premium['std'] ) )
				$premium .= $option_premium['std'];
			$premium .= '</div>';
		}

		$options[] = array(
			'name' => __('Premium Options', 'chromatic'),
			'type' => 'heading');
		$options[] = array(
			'std' => $premium,
			'type' => 'html');
	}

	/* Return ChromaticFw Options Array */
	return $options;
}