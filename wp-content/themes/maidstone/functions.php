<?php

add_filter('widget_text', 'do_shortcode'); //render shortcodes if placed into sidebar widgets

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
	        $excerpt = '<p>'.strip_shortcodes($post->post_excerpt).'... <a class="read-more" href="'. get_permalink( $post->ID ) . '">' . 'Read More &rarr;' . '</a></p>';
	    else
	        $excerpt = '<p>'.wp_trim_words( strip_shortcodes($post->post_content) , $length, '... <a class="read-more" href="'. get_permalink( $post->ID ) . '">' . 'Read More &rarr;' . '</a>' ).'</p>';
	
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
		wp_enqueue_style( 'sela', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
		wp_enqueue_style( 'mapglyphs', get_stylesheet_directory_uri() . '/inc/mapglyphs/2.0/mapglyphs.css');
		
		if(is_front_page() || is_page_template( 'tpl-shop.php' )){
			wp_enqueue_style( 'owl', get_stylesheet_directory_uri() . '/inc/owl-carousel/owl.carousel.css');
			wp_enqueue_style( 'owl-theme', get_stylesheet_directory_uri() . '/inc/owl-carousel/owl.theme.css'); 
			
			wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/inc/owl-carousel/owl.carousel.min.js', array( 'jquery' ),'1.3.3', true );		
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'da_scripts' );


	/// STORE
		add_action( 'init', 'da_registrations' );
	 
		function da_registrations() {
			
			///POST TYPES
				//Reg Products
				$product_labels = array(
					'name'               => _x( 'Products', 'post type general name', 'bid-core' ),
					'singular_name'      => _x( 'Product', 'post type singular name', 'bid-core' ),
					'menu_name'          => _x( 'Products', 'admin menu', 'bid-core' ),
					'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'bid-core' ),
					'add_new'            => _x( 'Add New', 'Product', 'bid-core' ),
					'add_new_item'       => __( 'Add New Product', 'bid-core' ),
					'new_item'           => __( 'New Product', 'bid-core' ),
					'edit_item'          => __( 'Edit Product', 'bid-core' ),
					'view_item'          => __( 'View Product', 'bid-core' ),
					'all_items'          => __( 'All Products', 'bid-core' ),
					'search_items'       => __( 'Search Products', 'bid-core' ),
					'parent_item_colon'  => __( 'Parent Products:', 'bid-core' ),
					'not_found'          => __( 'No Products found.', 'bid-core' ),
					'not_found_in_trash' => __( 'No Products found in Trash.', 'bid-core' )
				);
			
				$product_args = array(
					'labels'             => $product_labels,
					'public'             => true,
					'publicly_queryable' => true,
					'show_ui'            => true,
					'show_in_menu'       => true,
					'query_var'          => true,
					'rewrite'            => array( 'slug' => 'product',  "with_front" => false ),
					'capability_type'    => 'post',
					'has_archive'        => true,
					'hierarchical'       => false,
					'menu_position'      => 4,
					'menu_icon'			 => 'dashicons-store',
					'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' )
				);
			
				register_post_type( 'Product', $product_args );
		}
//// META BOXES
	add_filter( 'rwmb_meta_boxes', 'mb_register_meta_boxes' );
	function mb_register_meta_boxes( $meta_boxes ){
	    $prefix = 'meta_';

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
/* removed in favor of analyticator plugin
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
*/

//disable jetpack open graph
add_filter( 'jetpack_enable_opengraph', '__return_false', 99 );


function da_fb_js(){
	?>
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','//connect.facebook.net/en_US/fbevents.js');
	
	fbq('init', '872701106181311');
	fbq('track', "PageView");</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=872701106181311&ev=PageView&noscript=1"
	/></noscript>
	
	<script>fbq('track', 'ViewContent');</script>
	<!-- End Facebook Pixel Code -->
	<?php
}
add_action( 'wp_print_footer_scripts', 'da_fb_js',1 );

/***
	Geo Archive Support
***/
	function da_register_geo_tax(){
		$labels = array(
			'name'              => _x( 'Locations', 'taxonomy general name' ),
			'singular_name'     => _x( 'Location', 'taxonomy singular name' ),
		);
	
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,  //change later to false
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'location' ),
		);
	
		register_taxonomy( 'location', array( 'post' ), $args );
	}
	add_action('init','da_register_geo_tax');
	
	
	function da_getGeoData($geoAddress,$levels=array('country')) {
		/** from http://stackoverflow.com/a/15343386/2395464
			$geoAddreess = full address, zip code, or latitude and longitude
			$level = array of country,administrative_area_level_1,administrative_area_level_2, etc - per Google maps response
		**/
	    $url = 'http://maps.google.com/maps/api/geocode/json?address=' . $geoAddress .'&sensor=false'; 
	    $get     = file_get_contents($url);
	    $geoData = json_decode($get);
	    if (json_last_error() !== JSON_ERROR_NONE) {
	        throw new \InvalidArgumentException('Invalid geocoding results');
	    }
	
	    if(isset($geoData->results[0])) {
		    $data = array();
	        foreach($geoData->results[0]->address_components as $addressComponent) {
		        foreach($levels as $lev){
					if(in_array($lev, $addressComponent->types)) {
		                $data[$lev] = $addressComponent;
		                unset($levels[$lev]);
		            }
		        }
	        }
	        return $data;
	    }
	    return null;
	}
	function da_update_post_location($post_id){
		// Autosave, do nothing
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		        return;
		// AJAX? Not used here
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) 
		        return;
		// Check user permissions
		if ( ! current_user_can( 'edit_post', $post_id ) )
		        return;
		// Return if it's a post revision
		if ( false !== wp_is_post_revision( $post_id ) )
		        return;
			
		$loc = get_post_meta($post_id,'meta_loc',true);
		if(!$loc)
			return;
		
		$areas = da_getGeoData($loc,array('country','administrative_area_level_1','locality'));		
		
		if(isset($areas['country'])){
			$country = term_exists($areas['country']->long_name, 'location');
			if($country == 0 || is_null($country)){ //country exist?
				$country = wp_insert_term(
					$areas['country']->long_name,
					'location',
					array(
						'slug' => $areas['country']->short_name
					)
				);
				update_term_meta(intval($country['term_id']), 'map_glyph', sanitize_title($areas['country']->short_name)); //wp_insert_term doesnt return slug so we fake it here
			} //end country
		}
		
		if(isset($areas['administrative_area_level_1'])){
			$region = term_exists($areas['administrative_area_level_1']->long_name, 'location');
			if($region == 0 || is_null($region)){ //state/region exist?				
				//Add region
				$region = wp_insert_term(
					$areas['administrative_area_level_1']->long_name,
					'location',
					array(
						'slug' => $areas['administrative_area_level_1']->short_name,
						'parent' => intval($country['term_id'])
					)
				);
				update_term_meta(intval($region['term_id']), 'map_glyph', sanitize_title($areas['country']->short_name.' '.$areas['administrative_area_level_1']->short_name)); //combine country+state
			} //end region		
		}
		
		//Bottom to top, add to Locations Taxonomy
		if(isset($areas['locality'])){
			$local = term_exists($areas['locality']->long_name, 'location');  //city exists?
			if($local == 0 || is_null($local)){
				//Add city
				$local = wp_insert_term(
					$areas['locality']->long_name,
					'location',
					array(
						'parent' => intval($region['term_id'])
					)
				);
			} //end local check	
		}
		
		wp_set_object_terms( $post_id, array(intval($country['term_id']), intval($region['term_id']), intval($local['term_id'])), 'location', true );
	}
	add_action('publish_post','da_update_post_location',10,1);
	add_action('da_provision_location_data','da_update_post_location',10,1);