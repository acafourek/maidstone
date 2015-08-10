<?php

/**
 * Chromatic helper functions and definitions
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */

/**
 * GPP Post Thumbnail markup. Use jQuery to get data attributes on page for fancy presentations
 *
 * @since 1.0
 */
function chromatic_post_thumbnail($size = NULL,$post_id = false ) {  /*customized for Dakota */
	if(!$post_id){
	    global $post;
	    $post_id = $post->ID;
	}
	    
    $thumb = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post_id )); 
    $large = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' );
    $title = get_the_title( get_post_thumbnail_id( $post_id ) );

    echo '<img src="' . $thumb . '" title="' . $title . '" data-image_large="' .  $large[0] . '" data-image_thumb="' .  $thumb . '" class="aligncenter" />';

}

/**
 * Check theme options for thumbnail orientation
 *
 * @since 1.0
 */
function chromatic_image_orientation() {

    if ( get_option( gpp_get_current_theme_id() . '_options' ) ) {

        $options = get_option( gpp_get_current_theme_id() . '_options' );

        if ( ! empty( $options['chromatic_orientation'] ) && $options[ 'chromatic_orientation' ] == 'vertical' )
            return 'vertical';
        elseif ( ! empty( $options['chromatic_orientation'] ) && $options[ 'chromatic_orientation' ] == 'horizontal' )
            return 'horizontal';
        else
            return 'thumbnail';

    } else {

        return 'vertical';

    }

}

/**
 * Count the number of footer widgets to enable dynamic classes for the footer
 */
function chromatic_footer_widget_class() {
    $count = 0;

    if ( is_active_sidebar( 'footer-widget-1' ) )
        $count++;

    if ( is_active_sidebar( 'footer-widget-2' ) )
        $count++;

    if ( is_active_sidebar( 'footer-widget-3' ) )
        $count++;

    $class = '';

    switch ( $count ) {
        case '1':
            $class = 'one';
            break;
        case '2':
            $class = 'two';
            break;
        case '3':
            $class = 'three';
            break;
    }

    if ( $class )
        echo 'class="' . $class . '"';
}

remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'chromatic_gallery_shortcode');

//replace default gallery shortcode by image slider if not blog category
function chromatic_gallery_shortcode($attr) {

    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $attr['orderby'] ) )
            $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }

    // Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
        return $output;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

	$selector = "gallery-{$instance}";

    $swshortcode = '<div class="flexslider" id="'.$selector.'"><div class="flexslider-gpp-controls"><span class="genericon genericon-external flex-full-screen"></span><span class="genericon genericon-draggable flex-grid-view"></span></div>
            <ul class="slides">';
			   $counter = 0;
               foreach ( $attachments as $attachment ) :
                    $_post = get_post( $attachment );
                    $url = wp_get_attachment_url($_post->ID);
                    $post_title = esc_attr($_post->post_title);
                    $large_image = wp_get_attachment_image($_post->ID, 'large');
                    $caption = get_post_field('post_excerpt', $_post->ID);

                $swshortcode .= '<li>' . $large_image;
                if ($caption) {
                    $swshortcode .= '<p class="flex-caption">' . $caption . '</p>';
                }
                $swshortcode .= '</li>';
			$counter++;
            endforeach;

    $swshortcode .= '</ul>';
	$swshortcode .= "<ul class='flexslider-grid' style='display:none;'>";
	$counter = 0;
    foreach ( $attachments as $attachment ) {
		$_post = get_post( $attachment );
		$url = wp_get_attachment_url($_post->ID);
		$large_image = wp_get_attachment_image($_post->ID, 'large');
		$swshortcode .= "<li class='portfolio' id='".$selector."-".$counter."'>" . wp_get_attachment_image( $_post->ID, chromatic_image_orientation() ) . "</li>";
	$counter++;
    } 
	$swshortcode .= "</ul>";
	$swshortcode .= '</div>';

    return $swshortcode;

}

/**
 * Check if Sell Media is active plugin in options array
 *
 * @since Chromatic 1.5
 */
function chromatic_sell_media_check(){
	$plugins = get_option( 'active_plugins' );
	if ( in_array ( 'sell-media/sell-media.php', $plugins ) )
		return true;
}

/**
 * Get theme version number from WP_Theme object (cached)
 *
 * @since Chromatic 1.5
*/
function chromatic_get_theme_version() {
	$chromatic_theme_file = get_template_directory() . '/style.css';
	$chromatic_theme = new WP_Theme( basename( dirname( $chromatic_theme_file ) ), dirname( dirname( $chromatic_theme_file ) ) );
	return $chromatic_theme->get( 'Version' );
}

/**
 * Check if item is part of a taxonomy
 */
function chromatic_sell_media_item_has_taxonomy_terms( $post_id=null, $taxonomy=null ) {

    $terms = wp_get_post_terms( $post_id, $taxonomy );

    if ( empty ( $terms ) )
        return false;
    else
        return true;

}

/**
 * Print attached image keywords
 */
function chromatic_sell_media_image_keywords( $post_id=null ) {

    $product_terms = wp_get_object_terms( $post_id, 'keywords' );
    if ( !empty( $product_terms ) ) {
        if ( !is_wp_error( $product_terms ) ) {
            foreach ( $product_terms as $term ) {
                echo '<a href="' . get_term_link( $term->slug, 'keywords' ) . '">' . $term->name . '</a> ';
            }
        }
    }
}
?>