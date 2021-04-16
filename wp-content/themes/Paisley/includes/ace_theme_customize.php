<?php
// ==================================================================
// START register theme customize
// ==================================================================
function ace_customize_register($wp_customize){

// ====================================================================================================================================
// Register customize panel
// ====================================================================================================================================
$wp_customize->add_panel('ace_theme_panel', array(
    'title' => 'Bluchic Theme',
    'description' => '',
    'priority' => 1000,
));

// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
$wp_customize->add_section('ace_theme_setup', array(
	'title'       => __('General settings', 'ace'),
	'priority'    => 1001,
  'description' => '',
  'panel'       => 'ace_theme_panel',
));
// ==================================================================
// Header background image
// ==================================================================
$wp_customize->add_setting('ace_header_bg', array(
  'default'     => '',
  'capability'  => 'edit_theme_options',
  'type'        => 'option',
));
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ace_header_bg', array(
  'label'     => __('Header background image', 'ace'),
  'section'   => 'ace_theme_setup',
  'settings'  => 'ace_header_bg',
)));
// ================================================================== Sticky menu
$wp_customize->add_setting('ace_sticky_menu', array(
  'capability'        => 'edit_theme_options',
  'type'              => 'option',
));
$wp_customize->add_control('ace_sticky_menu', array(
  'settings'  => 'ace_sticky_menu',
  'label'     => __('Sticky menu', 'ace'),
  'section'   => 'ace_theme_setup',
  'type'      => 'checkbox',
));
// ================================================================== Disable Colorbox
$wp_customize->add_setting('ace_disable_colorbox', array(
  'capability'  => 'edit_theme_options',
  'type'        => 'option',
));
$wp_customize->add_control('ace_disable_colorbox', array(
  'settings'  => 'ace_disable_colorbox',
  'label'     => __('Disable Colorbox pop-up', 'ace'),
  'section'   => 'ace_theme_setup',
  'type'      => 'checkbox',
));
// ==================================================================
// Infinite scrolling
// ==================================================================
/*
$wp_customize->add_setting('ace_infinite_scroll', array(
  'capability'  => 'edit_theme_options',
  'type'        => 'option',
));
$wp_customize->add_control('ace_infinite_scroll', array(
  'settings'  => 'ace_infinite_scroll',
  'label'     => __('Infinite scrolling', 'ace'),
  'section'   => 'ace_theme_setup',
  'type'      => 'checkbox',
));
*/
// ==================================================================
// Open new windows
// ==================================================================
$wp_customize->add_setting('ace_new_window', array(
  'capability'  => 'edit_theme_options',
  'type'        => 'option',
));
$wp_customize->add_control('ace_new_window', array(
  'settings'  => 'ace_new_window',
  'label'     => __('Open new windows', 'ace'),
  'section'   => 'ace_theme_setup',
  'type'      => 'checkbox',
));
// ================================================================== Blog layout
$wp_customize->add_setting('ace_blog_layout', array(
  'capability'        => 'edit_theme_options',
  'type'              => 'option',
));
$wp_customize->add_control('ace_blog_layout', array(
  'settings'  => 'ace_blog_layout',
  'label'     => __('Blog layout', 'ace'),
  'section'   => 'ace_theme_setup',
  'type'      => 'radio',
  'choices'   => array(
    'blog-content-sidebar'  => 'Content - Sidebar',
    'blog-sidebar-content'   => 'Sidebar - Content',
 ),
));
// ==================================================================
// Footer credit
// ==================================================================
$wp_customize->add_setting('ace_footer_credit', array(
  'default'     => '',
  'capability'  => 'edit_theme_options',
  'type'        => 'option',
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_footer_credit', array(
  'label'     => __('Footer credit', 'ace'),
  'section'   => 'ace_theme_setup',
  'settings'  => 'ace_footer_credit',
	'type'      => 'textarea',
)));
// ================================================================== Footer privacy link
$wp_customize->add_setting('ace_privacy', array(
  'capability'  => 'edit_theme_options',
  'type'        => 'option',
));
$wp_customize->add_control('ace_privacy', array(
  'settings'  => 'ace_privacy',
  'label'     => __('Disable privacy link at footer', 'ace'),
  'section'   => 'ace_theme_setup',
  'type'      => 'checkbox',
));
// ================================================================== Text before comment
$wp_customize->add_setting('ace_comment_text', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
    'type'              => 'option',
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_comment_text', array(
  'label'     => __('Text before comment', 'ace'),
  'section'   => 'ace_theme_setup',
  'settings'  => 'ace_comment_text',
  'type'      => 'textarea',
)));


// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
$wp_customize->add_section('ace_theme_color', array(
	'title'       => __('Colors settings', 'ace'),
	'priority'    => 1002,
  'description' => '',
  'panel'       => 'ace_theme_panel',
));
// ==================================================================
// Overall
// ==================================================================
// ================================================================== Text
$wp_customize->add_setting('ace_text_color', array(
	'default'           => '#444444',
	'sanitize_callback' => 'sanitize_hex_color',
	'type'              => 'option',
	'capability'        => 'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_text_color', array(
	'label'     => __('Text color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_text_color',
	'priority'  => 1,
)));
// ================================================================== Border
$wp_customize->add_setting('ace_border_color', array(
	'default'           =>  '#e6e6e6',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_border_color', array(
	'label'     => __('Border color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_border_color',
	'priority'  => 2,
)));
// ==================================================================
// Menu
// ==================================================================
$wp_customize->add_setting('ace_nav_bar', array(
	'default'           =>  '#ffffff',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_nav_bar', array(
	'label'     => __('Menu bar color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_nav_bar',
	'priority'  => 3,
)));
// ================================================================== Menu
$wp_customize->add_setting('ace_nav_link', array(
	'default'           =>  '#000000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_nav_link', array(
	'label'     => __('Menu link color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_nav_link',
	'priority'  => 4,
)));
// ================================================================== Menu
$wp_customize->add_setting('ace_nav_link_hover', array(
	'default'           =>  '#fc477e',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_nav_link_hover', array(
	'label'     => __('Menu link hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_nav_link_hover',
	'priority'  => 5,
)));
// ================================================================== Menu
$wp_customize->add_setting('ace_nav_submenu_border_color', array(
	'default'           =>  '#eeeeee',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_nav_submenu_border_color', array(
	'label'     => __('Submenu border color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_nav_submenu_border_color',
	'priority'  => 6,
)));
// ==================================================================
// Page/Post Title
// ==================================================================
// ================================================================== Page/Post Title
$wp_customize->add_setting('ace_page_post_title', array(
	'default'           =>  '#000000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_page_post_title', array(
	'label'     => __('Page title color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_page_post_title',
	'priority'  => 7,
)));
// ================================================================== Page/Post Title
$wp_customize->add_setting('ace_page_post_title_link', array(
	'default'           =>  '#000000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_page_post_title_link', array(
	'label'     => __('Post title link color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_page_post_title_link',
	'priority'  => 8,
)));
// ================================================================== Page/Post Title
$wp_customize->add_setting('ace_page_post_title_link_hover', array(
	'default'           =>  '#fc477e',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_page_post_title_link_hover', array(
	'label'     => __('Post title link hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_page_post_title_link_hover',
	'priority'  => 9,
)));
// ==================================================================
// Post Category
// ==================================================================
// ================================================================== Post Category
$wp_customize->add_setting('ace_post_category_bg', array(
	'default'           =>  '#fff1ee',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_post_category_bg', array(
	'label'     => __('Category background color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_post_category_bg',
	'priority'  => 10,
)));
// ================================================================== Post Category
$wp_customize->add_setting('ace_post_category_link', array(
	'default'           =>  '#000000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_post_category_link', array(
	'label'     => __('Category link color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_post_category_link',
	'priority'  => 11,
)));
// ==================================================================
// Post Comment Meta
// ==================================================================
// ================================================================== Post Comment Meta
$wp_customize->add_setting('ace_post_comment_meta_bg', array(
	'default'           =>  '#fff1ee',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_post_comment_meta_bg', array(
	'label'     => __('Comment meta background color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_post_comment_meta_bg',
	'priority'  => 12,
)));
// ================================================================== Post Comment Meta
$wp_customize->add_setting('ace_post_comment_meta_text', array(
	'default'           =>  '#000000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_post_comment_meta_text', array(
	'label'     => __('Comment meta text color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_post_comment_meta_text',
	'priority'  => 13,
)));
// ==================================================================
// Sidebar
// ==================================================================
// ================================================================== Sidebar
$wp_customize->add_setting('ace_sidebar_widget_title', array(
	'default'           =>  '#000000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_sidebar_widget_title', array(
	'label'     => __('Sidebar widget title color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_sidebar_widget_title',
	'priority'  => 14,
)));
// ==================================================================
// Footer
// ==================================================================
// ================================================================== Footer
$wp_customize->add_setting('ace_footer_background', array(
	'default'          =>  '#ffffff',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_footer_background', array(
	'label'     => __('Footer background color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_footer_background',
	'priority'  => 15,
)));
// ================================================================== Footer
$wp_customize->add_setting('ace_footer_widget_title', array(
	'default'           =>  '#222222',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_footer_widget_title', array(
	'label'     => __('Footer widget title color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_footer_widget_title',
	'priority'  => 16,
)));
// ================================================================== Footer
$wp_customize->add_setting('ace_footer_text', array(
	'default'           =>  '#444444',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_footer_text', array(
	'label'     => __('Footer text color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_footer_text',
	'priority'  => 17,
)));
// ================================================================== Footer
$wp_customize->add_setting('ace_footer_credit_background', array(
	'default'           =>  '#fff1ee',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_footer_credit_background', array(
	'label'     => __('Footer credit background color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_footer_credit_background',
	'priority'  => 18,
)));
// ================================================================== Footer
$wp_customize->add_setting('ace_footer_credit_text', array(
	'default'           =>  '#666666',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_footer_credit_text', array(
	'label'     => __('Footer credit text color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_footer_credit_text',
	'priority'  => 19,
)));
// ==================================================================
// Link
// ==================================================================
// ================================================================== Link
$wp_customize->add_setting('ace_link', array(
	'default'           =>  '#fc477e',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_link', array(
	'label'     => __('Link color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_link',
	'priority'  => 20,
)));
// ================================================================== Link
$wp_customize->add_setting('ace_link_hover', array(
	'default'           =>  '#000000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_link_hover', array(
	'label'     => __('Link hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_link_hover',
	'priority'  => 21,
)));
// ==================================================================
// Heading
// ==================================================================
// ================================================================== Heading
$wp_customize->add_setting('ace_h1', array(
	'default'           =>  '#000000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_h1', array(
	'label'     => __('H1 color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_h1',
	'priority'  => 22,
)));
// ================================================================== Heading
$wp_customize->add_setting('ace_h2', array(
	'default'           =>  '#000000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_h2', array(
	'label'     => __('H2 color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_h2',
	'priority'  => 23,
)));
// ================================================================== Heading
$wp_customize->add_setting('ace_h3', array(
	'default'           =>  '#444444',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_h3', array(
	'label'     => __('H3 color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_h3',
	'priority'  => 24,
)));
// ================================================================== Heading
$wp_customize->add_setting('ace_h4', array(
	'default'           =>  '#444444',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_h4', array(
	'label'     => __('H4 color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_h4',
	'priority'  => 25,
)));
// ================================================================== Heading
$wp_customize->add_setting('ace_h5', array(
	'default'           =>  '#555555',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_h5', array(
	'label'     => __('H5 color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_h5',
	'priority'  => 26,
)));
// ================================================================== Heading
$wp_customize->add_setting('ace_h6', array(
	'default'           =>  '#555555',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_h6', array(
	'label'     => __('H6 color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_h6',
	'priority'  => 27,
)));
// ==================================================================
// Button
// ==================================================================
// ================================================================== Button
$wp_customize->add_setting('ace_button_bg', array(
	'default'           =>  '#000000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_button_bg', array(
	'label'     => __('Button background color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_button_bg',
	'priority'  => 28,
)));
// ================================================================== Button
$wp_customize->add_setting('ace_button_border', array(
	'default'           =>  '#000000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_button_border', array(
	'label'     => __('Button border color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_button_border',
	'priority'  => 29,
)));
// ================================================================== Button
$wp_customize->add_setting('ace_button_text', array(
	'default'           =>  '#ffffff',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_button_text', array(
	'label'     => __('Button text color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_button_text',
	'priority'  => 30,
)));
// ================================================================== Button
$wp_customize->add_setting('ace_button_bg_hover', array(
	'default'           =>  '#fc477e',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_button_bg_hover', array(
	'label'     => __('Button hover background color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_button_bg_hover',
	'priority'  => 31,
)));
// ================================================================== Button
$wp_customize->add_setting('ace_button_border_hover', array(
	'default'           =>  '#fc477e',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_button_border_hover', array(
	'label'     => __('Button hover border color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_button_border_hover',
	'priority'  => 32,
)));
// ================================================================== Button
$wp_customize->add_setting('ace_button_text_hover', array(
	'default'           =>  '#ffffff',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_button_text_hover', array(
	'label'     => __('Button hover text color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_button_text_hover',
	'priority'  => 33,
)));
// ==================================================================
// Accordion
// ==================================================================
// ================================================================== Accordion
$wp_customize->add_setting('ace_accordion_bg', array(
	'default'           =>  '#000000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_accordion_bg', array(
	'label'     => __('Accordion background color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_accordion_bg',
	'priority'  => 34,
)));
// ================================================================== Accordion
$wp_customize->add_setting('ace_accordion_text', array(
	'default'           =>  '#ffffff',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_accordion_text', array(
	'label'     => __('Accordion text color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_accordion_text',
	'priority'  => 35,
)));
// ================================================================== Accordion
$wp_customize->add_setting('ace_accordion_bg_hover', array(
	'default'           =>  '#fc477e',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_accordion_bg_hover', array(
	'label'     => __('Accordion hover background color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_accordion_bg_hover',
	'priority'  => 36,
)));
// ================================================================== Accordion
$wp_customize->add_setting('ace_accordion_text_hover', array(
	'default'           =>  '#ffffff',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_accordion_text_hover', array(
	'label'     => __('Accordion hover text color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_accordion_text_hover',
	'priority'  => 37,
)));
// ==================================================================
// Socail Media
// ==================================================================
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_twitter_bg', array(
	'default'           =>  '#cccccc',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_twitter_bg', array(
	'label'     => __('Twitter icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_twitter_bg',
	'priority'  => 38,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_twitter_bg_hover', array(
	'default'           =>  '#269dd5',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_twitter_bg_hover', array(
	'label'     => __('Twitter icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_twitter_bg_hover',
	'priority'  => 39,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_fb_bg', array(
	'default'           =>  '#cccccc',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_fb_bg', array(
	'label'     => __('Facebook icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_fb_bg',
	'priority'  => 40,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_fb_bg_hover', array(
	'default'           =>  '#0c42b2',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_fb_bg_hover', array(
	'label'     => __('Facebook icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_fb_bg_hover',
	'priority'  => 41,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_email_bg', array(
	'default'           =>  '#cccccc',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_email_bg', array(
	'label'     => __('Email icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_email_bg',
	'priority'  => 42,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_email_bg_hover', array(
	'default'           =>  '#aaaaaa',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_email_bg_hover', array(
	'label'     => __('Email icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_email_bg_hover',
	'priority'  => 43,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_rss_bg', array(
	'default'           =>  '#cccccc',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_rss_bg', array(
	'label'     => __('RSS Feed icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_rss_bg',
	'priority'  => 44,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_rss_bg_hover', array(
	'default'           =>  '#f49000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_rss_bg_hover', array(
	'label'     => __('RSS Feed icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_rss_bg_hover',
	'priority'  => 45,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_google_bg', array(
	'default'           =>  '#cccccc',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_google_bg', array(
	'label'     => __('Google Plus icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_google_bg',
	'priority'  => 46,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_google_bg_hover', array(
	'default'           =>  '#fd3000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_google_bg_hover', array(
	'label'     => __('Google Plus icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_google_bg_hover',
	'priority'  => 47,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_flickr_bg', array(
	'default'           =>  '#cccccc',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_flickr_bg', array(
	'label'     => __('Flickr icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_flickr_bg',
	'priority'  => 48,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_flickr_bg_hover', array(
	'default'           =>  '#fc0077',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_flickr_bg_hover', array(
	'label'     => __('Flickr icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_flickr_bg_hover',
	'priority'  => 49,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_linkedin_bg', array(
	'default'           =>  '#cccccc',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_linkedin_bg', array(
	'label'     => __('LinkedIn icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_linkedin_bg',
	'priority'  => 50,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_linkedin_bg_hover', array(
	'default'           =>  '#0d5a7b',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_linkedin_bg_hover', array(
	'label'     => __('LinkedIn icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_linkedin_bg_hover',
	'priority'  => 51,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_youtube_bg', array(
	'default'           =>  '#cccccc',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_youtube_bg', array(
	'label'     => __('YouTube icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_youtube_bg',
	'priority'  => 52,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_youtube_bg_hover', array(
	'default'           =>  '#ff0000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_youtube_bg_hover', array(
	'label'     => __('YouTube icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_youtube_bg_hover',
	'priority'  => 53,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_vimeo_bg', array(
	'default'           =>  '#cccccc',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_vimeo_bg', array(
	'label'     => __('Vimeo icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_vimeo_bg',
	'priority'  => 54,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_vimeo_bg_hover', array(
	'default'           =>  '#00c1f8',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_vimeo_bg_hover', array(
	'label'     => __('Vimeo icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_vimeo_bg_hover',
	'priority'  => 55,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_instagram_bg', array(
	'default'           =>  '#cccccc',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_instagram_bg', array(
	'label'     => __('Instagram icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_instagram_bg',
	'priority'  => 56,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_instagram_bg_hover', array(
	'default'           =>  '#194f7a',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_instagram_bg_hover', array(
	'label'     => __('Instagram icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_instagram_bg_hover',
	'priority'  => 57,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_bloglovin_bg', array(
	'default'           =>  '#cccccc',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_bloglovin_bg', array(
	'label'     => __('BlogLovin icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_bloglovin_bg',
	'priority'  => 58,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_bloglovin_bg_hover', array(
	'default'           =>  '#00c4fd',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_bloglovin_bg_hover', array(
	'label'     => __('BLogLovin icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_bloglovin_bg_hover',
	'priority'  => 59,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_pinterest_bg', array(
	'default'           =>  '#cccccc',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_pinterest_bg', array(
	'label'     => __('Pinterest icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_pinterest_bg',
	'priority'  => 60,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_pinterest_bg_hover', array(
	'default'           =>  '#c70505',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_pinterest_bg_hover', array(
	'label'     => __('Pinterest icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_pinterest_bg_hover',
	'priority'  => 61,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_tumblr_bg', array(
	'default'           =>  '#cccccc',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_tumblr_bg', array(
'label'     => __('Tumblr icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_tumblr_bg',
	'priority'  => 62,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_tumblr_bg_hover', array(
	'default'           =>  '#304d6b',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_tumblr_bg_hover', array(
'label'     => __('Tumblr icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_tumblr_bg_hover',
	'priority'  => 63,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_houzz_bg', array(
	'default'           =>  '#000000',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_houzz_bg', array(
'label'     => __('Houzz icon color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_houzz_bg',
	'priority'  => 64,
)));
// ================================================================== Social Media
$wp_customize->add_setting('ace_widget_houzz_bg_hover', array(
	'default'           =>  '#7ac142',
	'sanitize_callback' =>  'sanitize_hex_color',
	'type'              =>  'option',
	'capability'        =>  'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_houzz_bg_hover', array(
'label'     => __('Houzz icon hover color', 'ace'),
	'section'   => 'ace_theme_color',
	'settings'  => 'ace_widget_houzz_bg_hover',
	'priority'  => 65,
)));



// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
$wp_customize->add_section('ace_theme_extra', array(
	'title'       => __('Extra inputs settings', 'ace'),
	'priority'    => 1003,
  'description' => '',
  'panel'       => 'ace_theme_panel',
));
// ==================================================================
// Header script(s)
// ==================================================================
$wp_customize->add_setting('ace_header_scripts', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => '',
    'type'              => 'option',
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_header_scripts', array(
  'label'     => __('Header script(s)', 'ace'),
  'section'   => 'ace_theme_extra',
  'settings'  => 'ace_header_scripts',
	'type'      => 'textarea',
	'priority'  => 1,
)));
// ==================================================================
// Footer script(s)
// ==================================================================
$wp_customize->add_setting('ace_footer_scripts', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => '',
    'type'              => 'option',
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_footer_scripts', array(
  'label'     => __('Footer script(s)', 'ace'),
  'section'   => 'ace_theme_extra',
  'settings'  => 'ace_footer_scripts',
	'type'      => 'textarea',
	'priority'  => 2,
)));
// ==================================================================
// Header banner
// ==================================================================
$wp_customize->add_setting('ace_header_banner', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
    'type'              => 'option',
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_header_banner', array(
  'label'     => __('Header banner', 'ace'),
  'section'   => 'ace_theme_extra',
  'settings'  => 'ace_header_banner',
	'type'      => 'textarea',
	'priority'  => 3,
)));
// ==================================================================
// Custom CSS
// ==================================================================
$wp_customize->add_setting('ace_css', array(
  'capability'          => 'edit_theme_options',
  'sanitize_callback'   => 'wp_strip_all_tags',
  'type'                => 'option',
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_css', array(
  'label'     => __('Custom CSS', 'ace'),
  'section'   => 'ace_theme_extra',
  'settings'  => 'ace_css',
	'priority'  => 4,
	'type'      => 'textarea',
)));


// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
$wp_customize->add_section('ace_theme_entry', array(
	'title'       => __('Entry settings', 'ace'),
	'priority'    => 1004,
  'description' => '',
  'panel'       => 'ace_theme_panel',
));
// ==================================================================
// Enable Breadcrumb navigation
// ==================================================================
$wp_customize->add_setting('ace_enable_breadcrumb', array(
  'capability'  => 'edit_theme_options',
  'type'        => 'option',
));
$wp_customize->add_control('ace_enable_breadcrumb', array(
  'settings'  => 'ace_enable_breadcrumb',
  'label'     => __('Enable Breadcrumb navigation', 'ace'),
  'section'   => 'ace_theme_entry',
  'type'      => 'checkbox',
	'priority'  => 1,
));
// ================================================================== Post banner
$wp_customize->add_setting('ace_post_banner', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
    'type'              => 'option',
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_post_banner', array(
  'label'     => __('Post banner', 'ace'),
  'section'   => 'ace_theme_entry',
  'settings'  => 'ace_post_banner',
	'type'      => 'textarea',
	'priority'  => 1,
)));
// ==================================================================
// Hide post date
// ==================================================================
$wp_customize->add_setting('ace_hide_date', array(
  'capability'        => 'edit_theme_options',
  'type'              => 'option',
));
$wp_customize->add_control('ace_hide_date', array(
  'settings'  => 'ace_hide_date',
  'label'     => __('Hide post date', 'ace'),
  'section'   => 'ace_theme_entry',
  'type'      => 'checkbox',
	'priority'  => 2,
));

// ==================================================================
// Hide post category
// ==================================================================
$wp_customize->add_setting('ace_hide_category', array(
  'capability'        => 'edit_theme_options',
  'type'              => 'option',
));
$wp_customize->add_control('ace_hide_category', array(
  'settings'  => 'ace_hide_category',
  'label'     => __('Hide post category', 'ace'),
  'section'   => 'ace_theme_entry',
  'type'      => 'checkbox',
	'priority'  => 3,
));

// ==================================================================
// Hide post comment
// ==================================================================
$wp_customize->add_setting('ace_hide_comment', array(
  'capability'        => 'edit_theme_options',
  'type'              => 'option',
));
$wp_customize->add_control('ace_hide_comment', array(
  'settings'  => 'ace_hide_comment',
  'label'     => __('Hide post comment', 'ace'),
  'section'   => 'ace_theme_entry',
  'type'      => 'checkbox',
	'priority'  => 4,
));

// ==================================================================
// Hide post tags
// ==================================================================
$wp_customize->add_setting('ace_show_tag', array(
  'capability'        => 'edit_theme_options',
  'type'              => 'option',
));
$wp_customize->add_control('ace_show_tag', array(
  'settings'  => 'ace_show_tag',
  'label'     => __('Show post tags', 'ace'),
  'section'   => 'ace_theme_entry',
  'type'      => 'checkbox',
	'priority'  => 5,
));

// ==================================================================
// Blog author
// ==================================================================
$wp_customize->add_setting('ace_blog_author', array(
  'capability'  => 'edit_theme_options',
  'type'        => 'option',
));
$wp_customize->add_control('ace_blog_author', array(
  'settings'  => 'ace_blog_author',
  'label'     => __('Show blog author', 'ace'),
  'section'   => 'ace_theme_entry',
  'type'      => 'checkbox',
	'priority'  => 6,
));
// ==================================================================
// Blog author biography
// ==================================================================
$wp_customize->add_setting('ace_blog_author_bio', array(
  'capability'  => 'edit_theme_options',
  'type'        => 'option',
));
$wp_customize->add_control('ace_blog_author_bio', array(
  'settings'  => 'ace_blog_author_bio',
  'label'     => __('Show blog author biography', 'ace'),
  'section'   => 'ace_theme_entry',
  'type'      => 'checkbox',
	'priority'  => 7,
));
// ================================================================== Author signature
$wp_customize->add_setting('ace_post_signature', array(
  'capability'        => 'edit_theme_options',
  'type'              => 'option',
));
$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'ace_post_signature', array(
  'label'      => __('Author signature', 'ace'),
  'section'    => 'ace_theme_entry',
  'settings'   => 'ace_post_signature',
	'priority'  => 7,
)));
// ==================================================================
// Enable related post
// ==================================================================
$wp_customize->add_setting('ace_enable_related', array(
  'capability'  => 'edit_theme_options',
  'type'        => 'option',
));
$wp_customize->add_control('ace_enable_related', array(
  'settings'  => 'ace_enable_related',
  'label'     => __('Enable related post', 'ace'),
  'section'   => 'ace_theme_entry',
  'type'      => 'checkbox',
	'priority'  => 8,
));

// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
$wp_customize->add_section('ace_theme_404', array(
	'title'       => __('404 page settings', 'ace'),
	'priority'    => 1007,
  'description' => '',
  'panel'       => 'ace_theme_panel',
));
// ==================================================================
// 404 Error
// ==================================================================
$wp_customize->add_setting('ace_404_page', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
    'type'              => 'option',
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_404_page', array(
  'label'     => __('404 Page Content', 'ace'),
  'section'   => 'ace_theme_404',
  'settings'  => 'ace_404_page',
	'type'      => 'textarea',
	'priority'  => 1,
)));

// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
$wp_customize->add_section('ace_theme_newsletter', array(
	'title'       => __('Newsletter settings', 'ace'),
	'priority'    => 1008,
	'description' => '',
	'panel'       => 'ace_theme_panel',
));
// ================================================================== Newsletter location
$wp_customize->add_setting('ace_newsletter_location', array(
	'capability'  => 'edit_theme_options',
	'type'        => 'option',
	'default'     => 'Top',
));
$wp_customize->add_control('ace_newsletter_location', array(
	'settings'  => 'ace_newsletter_location',
	'label'     => __('Newsletter location', 'ace'),
	'section'   => 'ace_theme_newsletter',
	'type'      => 'radio',
	'default'   => 'Top',
	'choices'   => array(
		'Top'       => 'Top',
		'Bottom'    => 'Bottom',
		'Both'      => 'Both',
	),
));
// ================================================================== Newsletter background
$wp_customize->add_setting('ace_newsletter_bg', array(
	'default'           => '#fff1ee',
	'sanitize_callback' => 'sanitize_hex_color',
	'type'              => 'option',
	'capability'        => 'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_newsletter_bg', array(
	'label'     => __('Newsletter bar background color', 'ace'),
	'section'   => 'ace_theme_newsletter',
	'settings'  => 'ace_newsletter_bg',
)));
// ================================================================== Newsletter text
$wp_customize->add_setting('ace_newsletter_text', array(
	'default'           => '#333333',
	'sanitize_callback' => 'sanitize_hex_color',
	'type'              => 'option',
	'capability'        => 'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_newsletter_text', array(
	'label'     => __('Newsletter text color', 'ace'),
	'section'   => 'ace_theme_newsletter',
	'settings'  => 'ace_newsletter_text',
)));
// ================================================================== Show newsletter on homepage only
$wp_customize->add_setting('ace_newsletter_home', array(
	'capability'  => 'edit_theme_options',
	'type'        => 'option',
));
$wp_customize->add_control('ace_newsletter_home', array(
	'settings'  => 'ace_newsletter_home',
	'label'     => __('Show newsletter on homepage only', 'ace'),
	'section'   => 'ace_theme_newsletter',
	'type'      => 'checkbox',
));
// ================================================================== Newsletter code
$wp_customize->add_setting('ace_newsletter', array(
  'capability'  => 'edit_theme_options',
  'type'        => 'option',
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_newsletter', array(
	'label'     => __('Newsletter', 'ace'),
	'section'   => 'ace_theme_newsletter',
	'settings'  => 'ace_newsletter',
	'type'      => 'textarea',
)));

    if(class_exists('WooCommerce')) {
    // ====================================================================================================================================
    // Register theme customize section
    // ====================================================================================================================================
    $wp_customize->add_section('ace_theme_woocommerce', array(
        'title'       => __('WooCommerce settings', 'ace'),
        'priority'    => 1009,
      'description' => '',
      'panel'       => 'ace_theme_panel',
   ));
    // ================================================================== WooCommerce cart
    $wp_customize->add_setting('ace_woo_cart_float', array(
      'capability'  => 'edit_theme_options',
      'type'        => 'option',
   ));
    $wp_customize->add_control('ace_woo_cart_float', array(
      'settings'  => 'ace_woo_cart_float',
      'label'     => __('Show floating cart icon on top right', 'ace'),
      'section'   => 'ace_theme_woocommerce',
      'type'      => 'checkbox',
   ));
    // ================================================================== WooCommerce breadcrumb
    $wp_customize->add_setting('ace_woo_breadcrumb', array(
      'capability'  => 'edit_theme_options',
      'type'        => 'option',
   ));
    $wp_customize->add_control('ace_woo_breadcrumb', array(
      'settings'  => 'ace_woo_breadcrumb',
      'label'     => __('Display shop page breadcrumb', 'ace'),
      'section'   => 'ace_theme_woocommerce',
      'type'      => 'checkbox',
   ));
    // ================================================================== WooCommerce layout
    $wp_customize->add_setting('ace_woo_full_width', array(
      'capability'  => 'edit_theme_options',
      'type'        => 'option',
   ));
    $wp_customize->add_control('ace_woo_full_width', array(
      'settings'  => 'ace_woo_full_width',
      'label'     => __('Remove sidebar on product page', 'ace'),
      'section'   => 'ace_theme_woocommerce',
      'type'      => 'checkbox',
   ));
    }


    if(class_exists('LifterLMS')) {
    // ====================================================================================================================================
    // Register theme customize section
    // ====================================================================================================================================
	$wp_customize->add_section('ace_theme_lifterlms', array(
		'title'       => __('LifterLMS settings', 'ace'),
		'priority'    => 1011,
		'description' => '',
		'panel'       => 'ace_theme_panel',
	));
	// ================================================================== WooCommerce menu cart
	$wp_customize->add_setting('ace_lifterlms_course_width', array(
		'capability'    => 'edit_theme_options',
		'type'          => 'option',
	));
	$wp_customize->add_control('ace_lifterlms_course_width', array(
		'settings'  => 'ace_lifterlms_course_width',
		'label'     => __('Show full width on course page', 'ace'),
		'section'   => 'ace_theme_lifterlms',
		'type'      => 'checkbox',
	));
	// ================================================================== WooCommerce menu cart
	$wp_customize->add_setting('ace_lifterlms_lesson_width', array(
		'capability'    => 'edit_theme_options',
		'type'          => 'option',
	));
	$wp_customize->add_control('ace_lifterlms_lesson_width', array(
		'settings'  => 'ace_lifterlms_lesson_width',
		'label'     => __('Show full width on lesson page', 'ace'),
		'section'   => 'ace_theme_lifterlms',
		'type'      => 'checkbox',
	));
    }


// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
$wp_customize->add_section('ace_cookie_consent', array(
    'title'       => __('Cookie consent settings', 'ace'),
    'priority'    => 1050,
    'description' => '',
    'panel'       => 'ace_theme_panel',
));
// ================================================================== Enable cookie consent bar
$wp_customize->add_setting('ace_enable_consent', array(
    'capability'  => 'edit_theme_options',
    'type'        => 'option',
));
$wp_customize->add_control('ace_enable_consent', array(
    'settings'  => 'ace_enable_consent',
    'label'     => __('Enable cookie consent bar', 'ace'),
    'section'   => 'ace_cookie_consent',
    'type'      => 'checkbox',
));
// ================================================================== Cookie expire day
$wp_customize->add_setting('ace_cookie_expire', array(
    'capability'    => 'edit_theme_options',
    'type'          => 'option',
    'default'       => '',
));
$wp_customize->add_control('ace_cookie_expire', array(
    'settings'  => 'ace_cookie_expire',
    'label'    	=> __('Cookie expire day', 'ace'),
    'section'   => 'ace_cookie_consent',
    'type'     	=> 'select',
    'default'  	=> '',
    'choices'   => array(
        '7'     => '7',
        '14'    => '14',
        '30'    => '30',
        '60'    => '60',
        '90'    => '90',
        '365'   => '365',
   ),
));
// ================================================================== Cookie content
$wp_customize->add_setting('ace_cookie_content', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
    'type'              => 'option',
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_cookie_content', array(
    'label'     => __('Cookie consent', 'ace'),
    'section'   => 'ace_cookie_consent',
    'settings'  => 'ace_cookie_content',
    'type'      => 'textarea',
)));
// ================================================================== Close button text
$wp_customize->add_setting('ace_cookie_dismiss', array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
    'type'              => 'option',
));
$wp_customize->add_control('ace_cookie_dismiss', array(
    'label'     => __('Close button text', 'ace'),
    'section'   => 'ace_cookie_consent',
    'settings'  => 'ace_cookie_dismiss',
));
// ================================================================== Read more text
$wp_customize->add_setting('ace_cookie_read', array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
    'type'              => 'option',
));
$wp_customize->add_control('ace_cookie_read', array(
    'label'     => __('Read more text', 'ace'),
    'section'   => 'ace_cookie_consent',
    'settings'  => 'ace_cookie_read',
));
// ================================================================== Cookie policy page
$wp_customize->add_setting('ace_cookie_read_link', array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    'type'              => 'option',
));
$wp_customize->add_control('ace_cookie_read_link', array(
    'label'     => __('Cookie policy page', 'ace'),
    'section'   => 'ace_cookie_consent',
    'settings'  => 'ace_cookie_read_link',
));
// ================================================================== Cookie bar background colour
$wp_customize->add_setting('ace_cookie_bg', array(
    'default'           => '#222222',
    'sanitize_callback' => 'sanitize_hex_color',
    'type'              => 'option',
    'capability'        => 'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_cookie_bg', array(
    'label'     => __('Cookie bar background colour', 'ace'),
    'section'   => 'ace_cookie_consent',
    'settings'  => 'ace_cookie_bg',
)));
// ================================================================== Cookie bar background colour
$wp_customize->add_setting('ace_cookie_text', array(
    'default'           => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
    'type'              => 'option',
    'capability'        => 'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_cookie_text', array(
    'label'     => __('Cookie bar text colour', 'ace'),
    'section'   => 'ace_cookie_consent',
    'settings'  => 'ace_cookie_text',
)));
// ================================================================== Cookie bar button colour
$wp_customize->add_setting('ace_cookie_button', array(
    'default'           => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'type'              => 'option',
    'capability'        => 'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_cookie_button', array(
    'label'     => __('Cookie bar button colour', 'ace'),
    'section'   => 'ace_cookie_consent',
    'settings'  => 'ace_cookie_button',
)));
// ================================================================== Cookie bar button text colour
$wp_customize->add_setting('ace_cookie_button_text', array(
    'default'           => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
    'type'              => 'option',
    'capability'        => 'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_cookie_button_text', array(
    'label'     => __('Cookie bar background colour', 'ace'),
    'section'   => 'ace_cookie_consent',
    'settings'  => 'ace_cookie_button_text',
)));

// ==================================================================
// END register theme customize
// ==================================================================
}
add_action('customize_register', 'ace_customize_register');
