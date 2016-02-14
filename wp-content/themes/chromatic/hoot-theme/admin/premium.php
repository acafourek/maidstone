<?php
/**
 * Premium Theme Options displayed in admin
 *
 * @package hoot
 * @subpackage chromatic
 * @since chromatic 1.2
 * @return array Return Hoot Options array to be merged to the original Options array
 */

$hoot_options_premium = array();
$imagepath =  trailingslashit( HOOT_THEMEURI ) . 'admin/images/';

$hoot_options_premium[] = array(
	'name' => __('Upgrade to Chromatic Premium', 'chromatic'),
	'std' => __("If you've enjoyed using Chromatic, you're going to love Chromatic Premium. It's a robust upgrade to Chromatic that gives you many useful features.", 'chromatic'),
	);

$hoot_options_premium[] = array(
	'name' => __('Complete Style Customization', 'chromatic'),
	'desc' => __('Chromatic Premium lets you select unlimited colors for different sections of your site.<hr>Select pre-existing backgrounds for site sections like header, footer etc or upload your own background images/patterns.', 'chromatic'),
	'img' => $imagepath . 'premium-style.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Fonts and Typography Control', 'chromatic'),
	'desc' => __('Assign different typography (fonts, text size, font color) to menu, topbar, logo, content headings, sidebar, footer etc.', 'chromatic'),
	'img' => $imagepath . 'premium-typography.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Unlimites Sliders, Unlimites Slides', 'chromatic'),
	'desc' => __('Chromatic Premium allows you to create unlimited sliders with as many slides as you need.<hr>You can use these sliders on your Homepage widgetized template, or add them anywhere using shortcodes - like in your Posts, Sidebars or Footer.', 'chromatic'),
	'img' => $imagepath . 'premium-sliders.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('600+ Google Fonts', 'chromatic'),
	'desc' => __("With the integrated Google Fonts library, you can find the fonts that match your site's personality, and there's over 600 options to choose from.", 'chromatic'),
	'img' => $imagepath . 'premium-googlefonts.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Shortcodes with Easy Generator', 'chromatic'),
	'desc' => __('Enjoy the flexibility of using shortcodes throughout your site with Chromatic premium. These shortcodes were specially designed for this theme and are very well integrated into the code to reduce loading times, thereby maximizing performance!<hr>Use shortcodes to insert buttons, sliders, tabs, toggles, columns, breaks, icons, lists, and a lot more design and layout modules.<hr>The intuitive Shortcode Generator has been built right into the Edit screen, so you dont have to hunt for shortcode syntax.', 'chromatic'),
	'img' => $imagepath . 'premium-shortcodes.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Image Carousels', 'chromatic'),
	'desc' => __('Add carousels to your post, in your sidebar, on your frontpage or in your footer. A simple drag and drop interface allows you to easily create and manage carousels.', 'chromatic'),
	'img' => $imagepath . 'premium-carousels.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __("Floating 'Sticky' Header &amp; 'Goto Top' button (optional)", 'chromatic'),
	'desc' => __("The floating header follows the user down your page as they scroll, which means they never have to scroll back up to access your navigation menu, improving user experience.<hr>Or, use the 'Goto Top' button appears on the screen when users scroll down your page, giving them a quick way to go back to the top of the page.", 'chromatic'),
	'img' => $imagepath . 'premium-header-top.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('3 Blog Layouts (including pinterest type mosaic)', 'chromatic'),
	'desc' => __('Chromatic Premium gives you the option to display your post archives in 3 different layouts including a mosaic type layout similar to pinterest.', 'chromatic'),
	'img' => $imagepath . 'premium-blogstyles.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Custom Widgets', 'chromatic'),
	'desc' => __('Custom widgets crafted and designed specifically for Chromatic Premium Theme to give you the flexibility of adding stylized content.', 'chromatic'),
	'img' => $imagepath . 'premium-widgets.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Menu Icons', 'chromatic'),
	'desc' => __('Select from over 500 icons for your main navigation menu links.', 'chromatic'),
	'img' => $imagepath . 'premium-menuicons.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Premium Background Patterns (CC0)', 'chromatic'),
	'desc' => __('Chromatic Premium comes with many additional premium background patterns. You can always upload your own background image/pattern to match your site design.', 'chromatic'),
	'img' => $imagepath . 'premium-backgrounds.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Automatic Image Lightbox and WordPress Gallery', 'chromatic'),
	'desc' => __('Automatically open image links on your site with the integrates lightbox in Chromatic Premium.<hr>Automatically convert standard WordPress galleries to beautiful lightbox gallery slider.', 'chromatic'),
	'img' => $imagepath . 'premium-lightbox.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Developers love {LESS}', 'chromatic'),
	'desc' => __('CSS is passe. Developers love the modularity and ease of using LESS, which is why Chromatic Premium comes with properly organized LESS files for the main stylesheet. You can even turn on less.js during development to increase productivity.', 'chromatic'),
	'img' => $imagepath . 'premium-lesscss.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Easy Import/Export', 'chromatic'),
	'desc' => __('Moving to a new host? Or applying a new child theme? Easily import/export your customizer settings with just a few clicks - right from the backend.', 'chromatic'),
	'img' => $imagepath . 'premium-import-export.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Custom Javascript &amp; Google Analytics', 'chromatic'),
	'std' => __("Easily insert any javascript snippet to your header without modifying the code files. This helps in adding scripts for Google Analytics, Adsense or any other custom code.", 'chromatic'),
	);

$hoot_options_premium[] = array(
	'name' => __('Custom CSS', 'chromatic'),
	'std' => __("Add custom CSS to your theme right from the backend. If you are not a developer yourself, you can count on our support staff to help you with CSS snippets to get the look you're after. Best of all, your changes will persist across theme updates.", 'chromatic'),
	);

$hoot_options_premium[] = array(
	'name' => __('Continued Updates', 'chromatic'),
	'std' => __("You'll help support the continued development of Chromatic - ensuring it works with future versions of WordPress for years to come.", 'chromatic'),
	);

$hoot_options_premium[] = array(
	'name' => __('Premium Priority Support', 'chromatic'),
	'desc' => __('Need help setting up Chromatic? Upgrading to Chromatic Premium gives you prioritized support. We have a growing support team ready to help you with your questions.', 'chromatic'),
	'img' => $imagepath . 'premium-support.jpg',
	);

$hoot_options_premium[] = array(
	'std' => '<a class="button button-primary button-buy-premium" href="http://wphoot.com/themes/chromatic/" target="_blank">' . __('Buy Now', 'chromatic') . '</a>', );