<?php
/**
 * Define the Tabs appearing on the Theme Options page
 * Tabs contains sections
 * Options are assigned to both Tabs and Sections
 * See README.md for a full list of option types
 */

$logo = get_template_directory_uri() . "/images/logo.png";

$general_settings_tab = array(
    "name" => "general_tab",
    "title" => __( "General", "gpp" ),
    "sections" => array(
        "general_section_1" => array(
            "name" => "general_section_1",
            "title" => __( "General", "gpp" ),
            "description" => ""
        )
    )
);

gpp_register_theme_option_tab( $general_settings_tab );

$colors_tab = array(
    "name" => "colors_tab",
    "title" => __( "Colors", "gpp" ),
    "sections" => array(
        "colors_section_1" => array(
            "name" => "colors_section_1",
            "title" => __( "Colors", "gpp" ),
            "description" => ""
        )
    )
);

gpp_register_theme_option_tab( $colors_tab );

$layout_tab = array(
    "name" => "layout_tab",
    "title" => __( "Layout", "gpp" ),
    "sections" => array(
        "layout_section_1" => array(
            "name" => "layout_section_1",
            "title" => __( "Colors", "gpp" ),
            "description" => ""
        )
    )
);

gpp_register_theme_option_tab( $layout_tab );

$slideshow_tab = array(
    "name" => "slideshow_tab",
    "title" => __( "Slideshow", "gpp" ),
    "sections" => array(
        "slideshow_section_1" => array(
            "name" => "slideshow_section_1",
            "title" => __( "Slideshow", "gpp" ),
            "description" => ""
        )
    )
);

gpp_register_theme_option_tab( $slideshow_tab );

 /**
 * The following example shows you how to register theme options and assign them to tabs and sections:
*/
$options = array(
    'chromatic_logo' => array(
        "tab" => "general_tab",
        "name" => "chromatic_logo",
        "title" => "Logo",
        "description" => __( "Use a transparent png or jpg image", "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "image",
        "default" => $logo
    ),

    'chromatic_custom_favicon' => array(
        "tab" => "general_tab",
        "name" => "chromatic_custom_favicon",
        "title" => "Favicon",
        "description" => __( "Use a transparent png or ico image", "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "image",
        "default" => ""
    ),

    'font' => array(
        "tab" => "general_tab",
        "name" => "font",
        "title" => "Headline Font",
        "description" => __( '<a href="' . get_option('siteurl') . '/wp-admin/admin-ajax.php?action=fonts&font=header&height=600&width=640" class="thickbox">Preview and choose a font</a>', "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "select",
        "default" => "Abel:400",
        "valid_options" => gpp_font_array()
    ),

    'font_alt' => array(
        "tab" => "general_tab",
        "name" => "font_alt",
        "title" => "Body Font",
        "description" => __( '<a href="' . get_option('siteurl') . '/wp-admin/admin-ajax.php?action=fonts&font=body&height=600&width=640" class="thickbox">Preview and choose a font</a>', "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "select",
        "default" => "Lora:400,700,400italic",
        "valid_options" => gpp_font_array()
    ),
    'chromatic_alt_css' => array(
        "tab" => "colors_tab",
        "name" => "chromatic_alt_css",
        "title" => "Color",
        "description" => __( "Select a color palette", "gpp" ),
        "section" => "colors_section_1",
        "since" => "1.0",
        "id" => "colors_section_1",
        "type" => "select",
        "default" => "",
        "valid_options" => array(
            "default" => array(
                "name" => "default",
                "title" => __( "Default", "gpp" )
            ),
            "dark" => array(
                "name" => "dark",
                "title" => __( "Dark", "gpp" )
            ),
	        "spring" => array(
	            "name" => "spring",
	            "title" => __( "Spring", "gpp" )
	        ),
		    "summer" => array(
	            "name" => "summer",
	            "title" => __( "Summer", "gpp" )
	        ),
		    "fall" => array(
	            "name" => "fall",
	            "title" => __( "Fall", "gpp" )
	        )
        )
    ),

    "css" => array(
        "tab" => "colors_tab",
        "name" => "css",
        "title" => "Custom CSS",
        "description" => __( "Add some custom CSS to your theme.", "gpp" ),
        "section" => "colors_section_1",
        "since" => "1.0",
        "id" => "colors_section_1",
        "type" => "textarea",
        "sanitize" => "html",
        "default" => ""
    ),

	"chromatic_message" => array(
        "tab" => "layout_tab",
        "name" => "chromatic_message",
        "title" => "Welcome Message",
        "description" => __( "A short message to introduce your site to visitors.", "gpp" ),
        "section" => "layout_section_1",
        "since" => "1.0",
        "id" => "layout_section_1",
        "type" => "textarea",
        "sanitize" => "html",
        "default" => ""
    ),
	
	"chromatic_sidebar" => array(
        "tab" => "layout_tab",
        "name" => "chromatic_sidebar",
        "title" => __( "Sidebar", "gpp" ),
        "description" => __( "Keep sidebar open at all times", "gpp" ),
        "section" => "layout_section_1",
        "since" => "1.0",
        "id" => "layout_section_1",
        "type" => "select",
	    "default" => "hide",
        "valid_options" => array(
	        "show" => array(
	            "name" => "show",
	            "title" => __( "Keep open at all times", "gpp" )
	        ),
			"hide" => array(
	            "name" => "hide",
	            "title" => __( "Open on click", "gpp" )
	        )
	   )
    ),

	"chromatic_footer" => array(
	    "tab" => "layout_tab",
	    "name" => "chromatic_footer",
	    "title" => __( "Footer", "gpp" ),
	    "description" => __( "Show footer at all times.", "gpp" ),
	    "section" => "layout_section_1",
	    "since" => "1.0",
	    "id" => "layout_section_1",
	    "type" => "select",
	    "default" => "hide",
	    "valid_options" => array(
	        "show" => array(
	            "name" => "show",
	            "title" => __( "Keep open at all times", "gpp" )
	        ),
			"hide" => array(
	            "name" => "hide",
	            "title" => __( "Open on click", "gpp" )
	        )
	   )
	),

	"chromatic_slideshow_size" => array(
	    "tab" => "layout_tab",
	    "name" => "chromatic_slideshow_size",
	    "title" => __( "Slideshow Size", "gpp" ),
	    "description" => __( "Select slideshow size", "gpp" ),
	    "section" => "layout_section_1",
	    "since" => "1.0",
	    "id" => "layout_section_1",
	    "type" => "select",
	    "default" => "cover",
	    "valid_options" => array(
	        "cover" => array(
	            "name" => "cover",
	            "title" => __( "Cover the image", "gpp" )
	        ),
			"contain" => array(
	            "name" => "contain",
	            "title" => __( "Contain the image", "gpp" )
	        )
	   )
	),

	"chromatic_orientation" => array(
	    "tab" => "layout_tab",
	    "name" => "chromatic_orientation",
	    "title" => "Homepage Portfolio Thumbnail Orientation",
	    "description" => __( "Select an image orientation layout.", "gpp" ),
	    "section" => "layout_section_1",
	    "since" => "1.0",
	    "id" => "layout_section_1",
	    "type" => "select",
	    "default" => "1",
		"valid_options" => array(
	        "horizontal" => array(
	            "name" => "horizontal",
	            "title" => __( "Horizontal", "gpp" )
	        ),
	        "thumbnail" => array(
	            "name" => "thumbnail",
	            "title" => __( "Square", "gpp" )
	        ),
			"vertical" => array(
	            "name" => "vertical",
	            "title" => __( "Vertical", "gpp" )
	        )
	   )
	),
	
	"chromatic_grids" => array(
	    "tab" => "layout_tab",
	    "name" => "chromatic_grids",
	    "title" => "Grid Columns",
	    "description" => __( "Select number of columns.", "gpp" ),
	    "section" => "layout_section_1",
	    "since" => "1.0",
	    "id" => "layout_section_1",
	    "type" => "select",
	    "default" => "three-columns",
		"valid_options" => array(
	        "horizontal" => array(
	            "name" => "two-columns",
	            "title" => __( "Two", "gpp" )
	        ),
	        "thumbnail" => array(
	            "name" => "three-columns",
	            "title" => __( "Three", "gpp" )
	        ),
			"vertical" => array(
	            "name" => "four-columns",
	            "title" => __( "Four", "gpp" )
	        )
	   )
	),

	"chromatic_cen" => array(
	    "tab" => "layout_tab",
	    "name" => "chromatic_cen",
	    "title" => "Select an option",
	    "description" => __( "Choose what you want to show on Archive pages.", "gpp" ),
	    "section" => "layout_section_1",
	    "since" => "1.0",
	    "id" => "layout_section_1",
	    "type" => "select",
	    "default" => "none",
		"valid_options" => array(
	        "none" => array(
	            "name" => "none",
	            "title" => __( "Hide Excerpts and Content", "gpp" )
	        ),
	        "the_excerpt" => array(
	            "name" => "the_excerpt",
	            "title" => __( "The Excerpt", "gpp" )
	        ),
			"the_content" => array(
	            "name" => "the_content",
	            "title" => __( "The Content", "gpp" )
	        )
	   )
	),

	"chromatic_blog_cat" => array(
        "tab" => "layout_tab",
        "name" => "chromatic_blog_cat",
        "title" => __( "Blog Categories", "gpp" ),
        "description" => __( "Choose Categories for blog page.", "gpp" ),
        "section" => "layout_section_1",
        "since" => "1.0",
        "id" => "layout_section_1",
        "type" => "checkbox",
	    "default" => "",
        "valid_options" => gpp_get_taxonomy_list()
    ),

	"slideshow_enabled" => array(
	    "tab" => "slideshow_tab",
	    "name" => "slideshow_enabled",
	    "title" => "Enable Slideshow",
	    "description" => __( "Enable homepage slideshow.", "gpp" ),
	    "section" => "slideshow_section_1",
	    "since" => "1.0",
	    "id" => "slideshow_section_1",
	    "type" => "select",
	    "default" => "",
		"valid_options" => array(
		        "yes" => array(
		            "name" => "yes",
		            "title" => __( "Yes", "gpp" )
		        ),
		        "no" => array(
		            "name" => "no",
		            "title" => __( "No", "gpp" )
		        )
	    )
	),

	"slide_show" => array(
	    "tab" => "slideshow_tab",
	    "name" => "slide_show",
	    "title" => "Slideshow Images",
	    "description" => __( "Select or create a gallery of images to use in the homepage slideshow.", "gpp" ),
	    "section" => "slideshow_section_1",
	    "since" => "1.0",
	    "id" => "slideshow_section_1",
	    "type" => "gallery",
	    "default" => ""
	)

);

gpp_register_theme_options( $options );
