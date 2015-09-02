<?php

/// IMAGES
	add_action('after_setup_theme','da_add_image_size');
	function da_add_image_size(){
		add_image_size( 'slider',1200,450,true); //custom dakota
	}

/// WIDGETS
	add_action('widgets_init','mb_remove_widgets',11);
	function mb_remove_widgets(){
		unregister_sidebar( 'sidebar-5' );
		unregister_sidebar( 'sidebar-6' );
		unregister_sidebar( 'sidebar-7' );
		unregister_sidebar( 'sidebar-2' );
	}
	
	function da_exclude_widget_categories($args){
		$exclude = "1,5"; // The IDs of the excluding categories
		$args["exclude"] = $exclude;
		return $args;
	}
	add_filter("widget_categories_args","da_exclude_widget_categories");

//CUSTOMIZE ADMIN
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

/// OPEN GRAPH
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

/// EXCERPTS
	function da_excerpt_more( $more ) {
		return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . '... read more' . '</a>';
	}
	add_filter( 'excerpt_more', 'da_excerpt_more' );
	
	function da_custom_excerpt($post,$length = 75) { 
	    if( strlen($post->post_excerpt) > 0 )
	        $excerpt = '<p>'.$post->post_excerpt.'... <a class="read-more" href="'. get_permalink( $post->ID ) . '">' . 'Read More &rarr;' . '</a></p>';
	    else
	        $excerpt = '<p>'.wp_trim_words( $post->post_content , $length, '... <a class="read-more" href="'. get_permalink( $post->ID ) . '">' . 'Read More &rarr;' . '</a>' ).'</p>';
	
	    return $excerpt;
	}
	
	//Custom excerpt length
	function mb_custom_excerpt_length( $length ) {
		return 60;
	}
	add_filter( 'excerpt_length', 'mb_custom_excerpt_length', 999 );

/// SCRIPTS
	function da_scripts() {
		wp_enqueue_script( 'jquery' );		
		wp_enqueue_style( 'maidstone', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
	}
	
	add_action( 'wp_enqueue_scripts', 'da_scripts' );

//// META BOXES
	add_filter( 'rwmb_meta_boxes', 'mb_register_meta_boxes' );
	function mb_register_meta_boxes( $meta_boxes ){
	    $prefix = 'meta_';
	    // 1st meta box
	    $meta_boxes[] = array(
	        'id'       => 'location',
	        'title'    => 'Geo Data',
	        'pages'    => array( 'post'),
	        'context'  => 'normal',
	        'priority' => 'high',
	        'fields' => array(
	            array(
					'id'   => $prefix.'loc_address',
					'name' => __( 'Address', 'maidstone' ),
					'type' => 'text',
				),
				array(
					'id'            => $prefix.'loc',
					'name'          => __( 'Post Location', 'maidstone' ),
					'type'          => 'map',
					'address_field' => $prefix.'loc_address',
				),
	        )
	    );
	    
	    $meta_boxes[] = array(
	        'id'       => 'external',
	        'title'    => '<span class="dashicons dashicons-admin-links"></span> External Link',
	        'pages'    => array( 'page'),
	        'context'  => 'normal',
	        'priority' => 'high',
	        'fields' => array(
	            array(
					'id'   => $prefix.'external_link',
					'name' => __( 'Link', 'maidstone' ),
					'type' => 'url',
					'desc' => 'URL for this page to link to from the Work page.'
				),
	        )
	    );
	    return $meta_boxes;
	}
	
/// LOCATION DATA

	function mb_get_placename($latlong=false){
		//was originally inteded to fetch "latest location" but now we're using foursquare. Left this for future use to get latlong placenames
		//expects lat/long and returns placename from Google Maps API
		if(!$latlong)
			return false;
		$query_args = array(
			'key' => 'AIzaSyBEpLnCJ-7yWBkMuhstS6x9m4b_s-PQ6NM',
			'latlng' => $latlong
		);
		$query_url = 'https://maps.googleapis.com/maps/api/geocode/json?'.build_query($query_args);
		$place = wp_remote_get($query_url);
		if($place['response']['code'] == 200){
			$result = json_decode($place['body']);
			$result = $result->results; //dumb formatting
			foreach($result as $addr){
				if($addr->types[0] == "locality")
					return $addr->formatted_address;
			}
		}	
	}
	
	function mb_get_latest_foursquare_location(){
		require_once 'inc/FoursquareApi.php';
		$foursquare = new FoursquareApi(FOURSQUARE_ACCESS, FOURSQUARE_SECRET);
		$foursquare->SetAccessToken(FOURSQUARE_USER_TOKEN);
		
		$user = $foursquare->GetPrivate("users/self/checkins");
		$data = json_decode($user);
		
		if($data->meta->code !== 200)
			return false;
		
		$city = $data->response->checkins->items[0]->venue->location->city;
		$state = $data->response->checkins->items[0]->venue->location->state; 
		$country = $data->response->checkins->items[0]->venue->location->country; 
		
		$location = "";
		if($city)
			$location .= $city;
		if($state)
			$location .= ', '.$state;
			
		if($country && ($country !== "United States"))
		 	$location .= $country;
		
		return $location;
	}
	
/// HEADER
	function mb_ga_code(){
		echo "
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-16122526-26', 'auto');
		  ga('send', 'pageview');
		
		</script>
		";
	}
	add_action('wp_head','mb_ga_code');
	
////SOCIAL
	/*
function mb_social_share(){ 
		if(!is_single())
			return false;
			
		include_once('inc/hs-social-media-buttons/hs-social-buttons.php');
	    $social_links = get_option('hssocial_badges');
		if($social_links):
    ?>
	        <ul class="social-profiles clearfix">
		        <?php if ($social_links['hssocial_facebook'])?>
			        <li class="facebook-like"><a href="<?php echo $social_links['hssocial_facebook'];?>" title="Like <?php echo get_bloginfo('name');?> on Facebook"></a></li>
			    <?php if ($social_links['hssocial_twitter'])?>
		        	<li class="twitter-follow"><a href="https://twitter.com/intent/follow?screen_name=<?php echo $social_links['hssocial_twitter'];?>"></a></li>
		       <?php if ($social_links['hssocial_instagram'])?>
		        	<li class="instagram-follow"><a target="_blank" href="<?php echo $social_links['hssocial_instagram'];?>"></a></li>
		        <?php if ($social_links['hssocial_pintrest'])?>
		        	<li class="pintrest-follow"><a target="_blank" href="<?php echo $social_links['hssocial_pintrest'];?>"></a></li>

		        <span class="stretcher"></span>
	        </ul>
	<?php
		endif;
	}	
	add_action('wp_footer','mb_social_share');
	
	function mb_social_share_config(){
		include_once('inc/hs-social-media-buttons/hs-social-buttons.php');
	}

	add_action('admin_init','mb_social_share_config');
*/

//disable jetpack open graph
add_filter( 'jetpack_enable_opengraph', '__return_false', 99 );
