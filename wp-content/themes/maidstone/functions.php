<?php

add_action('after_setup_theme','da_add_image_size');
function da_add_image_size(){
	add_image_size( 'slider',1200,450,true); //custom dakota
}

add_action('widgets_init','mb_remove_widgets',11);
function mb_remove_widgets(){
	unregister_sidebar( 'sidebar-5' );
	unregister_sidebar( 'sidebar-6' );
	unregister_sidebar( 'sidebar-7' );
}
function da_scripts() {
	
	wp_enqueue_style( 'maidstone', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
}

add_action( 'wp_enqueue_scripts', 'da_scripts' );


function da_add_remove_contactmethods( $contactmethods ) {
        $contactmethods['twitter'] = 'Twitter';
        $contactmethods['facebook'] = 'Facebook';
        // this will remove existing contact fields
        unset($contactmethods['aim']);
        unset($contactmethods['yim']);
        unset($contactmethods['jabber']);
        return $contactmethods;
}
add_filter('user_contactmethods','da_add_remove_contactmethods',10,1);

add_action('wp_head','da_opengraph');
function da_opengraph(){
	//expands on the WP Open Graph plugin
	
	if(is_single()){
		global $post;
		echo '<meta property="article:published_time" content="'.$post->post_date.'" />';
		echo '<meta property="article:modified_time" content="'.$post->post_modified.'" />';
		echo '<meta property="article:author" content="'.get_the_author_meta( 'facebook', $post->post_author ).'" />';
		
		$category = get_the_category($post->ID); 
		if($category[0]->cat_name)
			echo '<meta property="article:section" content="'.$category[0]->cat_name.'" />';
		
		$posttags = get_the_tags();
		if ($posttags) {
		  foreach($posttags as $tag) {
		    echo '<meta property="article:tag" content="'.$tag->name.'" />';
		  }
		}
	}
	
}


function da_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . '... read more' . '</a>';
}
add_filter( 'excerpt_more', 'da_excerpt_more' );

function da_custom_excerpt($post,$length = 75) { 
    if( strlen($post->post_excerpt) > 0 )
        $excerpt = '<p>'.$post->post_excerpt.'<a class="read-more" href="'. get_permalink( $post->ID ) . '">' . '... read more' . '</a></p>';
    else
        $excerpt = '<p>'.wp_trim_words( $post->post_content , $length, '<a class="read-more" href="'. get_permalink( $post->ID ) . '">' . '... read more' . '</a>' ).'</p>';

    return $excerpt;
}

//Custom excerpt length
	function mb_custom_excerpt_length( $length ) {
		return 60;
	}
	add_filter( 'excerpt_length', 'mb_custom_excerpt_length', 999 );
	
	function mb_new_excerpt_more( $more ) {
		return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More &rarr;', 'maidstone' ) . '</a>';
	}
	add_filter( 'excerpt_more', 'mb_new_excerpt_more' );