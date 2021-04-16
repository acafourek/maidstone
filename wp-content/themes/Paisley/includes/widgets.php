<?php
// ==================================================================
// Widget - Sidebar 1
// ==================================================================
function ace_right_widgets_1_init() {
  register_sidebar(array(
    'name'          => __('Right Widget', 'ace'),
    'id'            => 'right-widget-1',
    'class'         => '',
    'description'   => 'Right side widget area',
    'before_widget' => '<article class="side-widget widget %2$s" id="%1$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
 ));
}
add_action('widgets_init', 'ace_right_widgets_1_init');

// ==================================================================
// Widget - Footer 1
// ==================================================================
function ace_footer_widgets_1_init() {
  register_sidebar(array(
    'name'          => __('Footer Widget 1', 'ace'),
    'id'            => 'footer-widget-1',
    'class'         => '',
    'description'   => 'Footer widget area.',
    'before_widget' => '<article class="footer-widget widget %2$s" id="%1$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
 ));
}
add_action('widgets_init', 'ace_footer_widgets_1_init');
// ==================================================================
// Widget - Footer 2
// ==================================================================
function ace_footer_widgets_2_init() {
  register_sidebar(array(
    'name'          => __('Footer Widget 2', 'ace'),
    'id'            => 'footer-widget-2',
    'class'         => '',
    'description'   => 'Footer widget area.',
    'before_widget' => '<article class="footer-widget widget %2$s" id="%1$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
 ));
}
add_action('widgets_init', 'ace_footer_widgets_2_init');
// ==================================================================
// Widget - Footer 3
// ==================================================================
function ace_footer_widgets_3_init() {
  register_sidebar(array(
    'name'          => __('Footer Widget 3', 'ace'),
    'id'            => 'footer-widget-3',
    'class'         => '',
    'description'   => 'Footer widget area.',
    'before_widget' => '<article class="footer-widget widget %2$s" id="%1$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
 ));
}
add_action('widgets_init', 'ace_footer_widgets_3_init');
// ==================================================================
// Widget - Footer 4
// ==================================================================
function ace_footer_widgets_4_init() {
  register_sidebar(array(
    'name'          => __('Footer Widget 4', 'ace'),
    'id'            => 'footer-widget-4',
    'class'         => '',
    'description'   => 'Footer widget area.',
    'before_widget' => '<article class="footer-widget widget %2$s" id="%1$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
 ));
}
add_action('widgets_init', 'ace_footer_widgets_4_init');
// ==================================================================
// Widget - Footer 5
// ==================================================================
function ace_footer_widgets_5_init() {
  register_sidebar(array(
    'name'          => __('Footer Widget 5', 'ace'),
    'id'            => 'footer-widget-5',
    'class'         => '',
    'description'   => 'Footer widget area.',
    'before_widget' => '<article class="footer-widget widget %2$s" id="%1$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
 ));
}
add_action('widgets_init', 'ace_footer_widgets_5_init');

// ==================================================================
// Widget - Instagram
// ==================================================================
function ace_footer_widgets_instagram_init() {
  register_sidebar(array(
    'name'          => __('Instagram Widget', 'ace'),
    'id'            => 'footer-widget-instagram',
    'class'         => '',
    'description'   => 'Instagram widget area.',
    'before_widget' => '<article class="footer-instagram-widget widget %2$s" id="%1$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
 ));
}
add_action('widgets_init', 'ace_footer_widgets_instagram_init');
