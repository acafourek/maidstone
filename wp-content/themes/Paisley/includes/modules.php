<?php
// ==================================================================
// Theme scripts
// ==================================================================
function ace_theme_scripts(){
	wp_enqueue_style('ace-style', get_stylesheet_uri(), null, array(), 'all');
	if(is_singular() && comments_open() && get_option('thread_comments')) wp_enqueue_script('comment-reply');
	wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/flexslider.js', array('jquery'), null, true);
	wp_enqueue_script('fitvids', get_template_directory_uri() . '/js/fitvids.js', array('jquery'), null, true);
	wp_enqueue_script('doubletaptogo', get_template_directory_uri() . '/js/doubletaptogo.js', array('jquery'), null, true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, false);
}
add_action('wp_enqueue_scripts', 'ace_theme_scripts', 1);

// ==================================================================
// Theme stylesheet on footer
// ==================================================================
function ace_theme_footer_css(){
	wp_enqueue_script('prefixfree', '//cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js', array('jquery'), null, true);
	wp_enqueue_style('google-webfont', '//fonts.googleapis.com/css?family=Lato:300,700,300italic,700italic|Suranna', '', 'all');
}
add_action('wp_footer', 'ace_theme_footer_css');

// ==================================================================
// Conditional scripts
// ==================================================================
function ace_conditional_scripts() { ?>
	<!--[if lt IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
<?php }
add_action('wp_head', 'ace_conditional_scripts');

// ==================================================================
// Content width
// ==================================================================
if(! isset($content_width)) {
	$content_width = 980;
}

// Theme Setup
// ====================================================================================================================================
function ace_theme_setup() {
// ====================================================================================================================================

  // ==================================================================
  // Custom header
  // ==================================================================
  add_theme_support('custom-header', array(
    'default-image'          => get_template_directory_uri() . '/images/header_title.png',
    'random-default'         => false,
    'width'                  => 900,
    'height'                 => 300,
    'flex-height'            => true,
    'flex-width'             => true,
    'default-text-color'     => '000000',
    'header-text'            => true,
    'uploads'                => true,
    'wp-head-callback'       => '',
    'admin-head-callback'    => 'ace_admin_header_style',
 ));

  function ace_header_image_text() {
  $text_color = get_header_textcolor();
  // ifno custom color for text is set, let's bail.
  if(display_header_text() && $text_color === get_theme_support('custom-header', 'default-text-color'))
  return;
  // ifwe get this far, we have custom styles.
  ?>
    <style type="text/css">
    <?php if(!display_header_text()) : ?>
      .header h1,
      .header h5,
      .header-desc {display: none;}
    <?php elseif($text_color != get_theme_support('custom-header', 'default-text-color')) : ?>
      .header-title {color: #<?php echo esc_attr($text_color); ?>;}
    <?php endif; ?>
    </style>
  <?php
  }
  add_action('wp_head', 'ace_header_image_text');

  // ==================================================================
  // Custom background
  // ==================================================================
  add_theme_support('custom-background', array('default-color' => 'ffffff'));

  // ==================================================================
  // Language
  // ==================================================================
  load_theme_textdomain('ace', get_template_directory() . '/languages');

  // ==================================================================
  // Post thumbnail
  // ==================================================================
  add_theme_support('post-thumbnails');

    add_image_size('post_thumb', 600, 760, true);
    add_image_size('related_thumb', 180, 180, true);

  // ==================================================================
  // Add default posts and comments RSS feed links to head
  // ==================================================================
  add_theme_support('automatic-feed-links');

	// ==================================================================
	// Add wide image support
	// ==================================================================
	add_theme_support('align-wide');

  // ==================================================================
  // Menu location
  // ==================================================================
  register_nav_menu('top_menu', __('Top Menu', 'ace'));
  register_nav_menu('footer_menu', __('Footer Menu', 'ace'));

  // ==================================================================
  // Visual editor stylesheet
  // ==================================================================
  add_editor_style('editor.css');

  // ==================================================================
  // Shortcode in excerpt
  // ==================================================================
  add_filter('the_excerpt', 'do_shortcode');

  // ==================================================================
  // Shortcode in widget
  // ==================================================================
  add_filter('widget_text', 'do_shortcode');

  // ==================================================================
  // Clickable link in content
  // ==================================================================
  add_filter('the_content', 'make_clickable');

  // ==================================================================
  // Remove version generator
  // ==================================================================
  remove_action('wp_head', 'wp_generator');

  // ==================================================================
  // Remove title on archive page
  // ==================================================================
  function ace_remove_archive_title_label($title) {
    if(is_category()) {
      $title = single_cat_title('', false);
    } elseif(is_tag()) {
      $title = single_tag_title('', false);
    } elseif(is_author()) {
      $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    } elseif(is_year()) {
      $title = sprintf(__('Year: %s', 'ace'), get_the_date(_x('Y', 'yearly archives date format', 'ace')));
    } elseif(is_month()) {
      $title = sprintf(__('Month: %s', 'ace'), get_the_date(_x('F Y', 'monthly archives date format', 'ace')));
    } elseif(is_day()) {
      $title = sprintf(__('Day: %s', 'ace'), get_the_date(_x('F j, Y', 'daily archives date format', 'ace')));
    }
  return $title;
  }
  add_filter('get_the_archive_title', 'ace_remove_archive_title_label');

  // ==================================================================
  // Add "Home" in menu
  // ==================================================================
  function ace_home_page_menu($args) {
    $args[ 'show_home' ] = true;
    return $args;
  }
  add_filter('wp_page_menu_args', 'ace_home_page_menu');

  // ==================================================================
  // Header title tag
  // ==================================================================
  add_theme_support('title-tag');

	// ==================================================================
	// Add theme support for selective refresh for widgets
	// ==================================================================
	add_theme_support('customize-selective-refresh-widgets');

  // ==================================================================
  // HTML5 Support
  // ==================================================================
	add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
	));

  // ==================================================================
  // Jetpack infinite scroll
  // ==================================================================
  add_theme_support('infinite-scroll', array(
	  'container'	=> 'section',
	  'footer'		=> false,
	  'render'		=> 'ace_loop_infinite_scroll',
 ));

  // ==================================================================
  // Flush rewrite rules
  // ==================================================================
  function ace_flush_rewrite_rules() {
    flush_rewrite_rules();
  }
  add_action('after_switch_theme', 'ace_flush_rewrite_rules');

// Theme Setup
// ====================================================================================================================================
}
add_action('after_setup_theme', 'ace_theme_setup');
// ====================================================================================================================================

// ==================================================================
// Jetpack infinite scroll
// ==================================================================
function ace_loop_infinite_scroll() {
  while(have_posts()) : the_post();
    get_template_part('content', 'list');
  endwhile;
}

// ==================================================================
// Excerpt
// ==================================================================
function ace_excerpt_more($output) {
  return $output . '<p><a href="'. get_permalink() . '" class="post-read-more">' .__('Continue Reading', 'ace') .'</a></p>';
}
add_filter('get_the_excerpt', 'ace_excerpt_more');

// ==================================================================
// Remove auto format
// ==================================================================
function ace_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
	foreach ($pieces as $piece) {
		if(preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}
	return $new_content;
}
//remove_filter('the_content', 'wpautop');
//remove_filter('the_content', 'wptexturize');
//add_filter('the_content', 'ace_formatter', 99);
function raw_formatting($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return do_shortcode($content);
}
add_shortcode('raw', 'raw_formatting');

// ==================================================================
// Add thumbnail column on post listing
// ==================================================================
function ace_thumbnail_column($columns) {
  $columns[ 'thumbnail' ] = 'Thumbnail';
  return $columns;
}
add_filter('manage_posts_columns', 'ace_thumbnail_column');

function ace_show_thumbnail_column($name) {
  global $post;
  switch ($name) {
    case 'thumbnail':
    $thumbnail = get_the_post_thumbnail($post->ID, array(64,64));
    echo $thumbnail;
  }
}
add_action('manage_posts_custom_column', 'ace_show_thumbnail_column');

// ==================================================================
// Login error message
// ==================================================================
function ace_failed_login() {
  return 'The login information you have entered is incorrect.';
}
add_filter('login_errors', 'ace_failed_login');

// ==================================================================
// Recent posts
// ==================================================================
function ace_recent_posts($no_posts = 10, $excerpts = true) {
  global $wpdb;
  $request = "SELECT ID, post_title, post_excerpt FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='post' ORDER BY post_date DESC LIMIT $no_posts";
  $posts = $wpdb->get_results($request);
    if($posts) {
      foreach ($posts as $posts) {
        $post_title = stripslashes($posts->post_title);
        $permalink = get_permalink($posts->ID);
        $output .= '<li><a href="' . $permalink . '" rel="bookmark" title="Permanent Link: ' . htmlspecialchars($post_title, ENT_COMPAT) . '">' . htmlspecialchars($post_title) . '</a></li>';
      }
    } else {
      $output .= '<li>No posts found</li>';
    }
  echo $output;
}

// ==================================================================
// Get first image from post
// ==================================================================
function ace_get_thumb() {
  global $post, $posts;
  $first_img = '';
  ob_start(); ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  return $first_img;
}

// ==================================================================
// Custom excerpt length
// ==================================================================
function ace_excerpt($num) {
  $limit = $num+1;
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  array_pop($excerpt);
  $excerpt = implode(" ",$excerpt)."...";
  echo $excerpt;
}

// ==================================================================
// Comment time
// ==================================================================
function ace_time_ago($type = 'comment') {
  $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
  return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago', 'ace');
}

// ==================================================================
// Custom comment style
// ==================================================================
function comment_style($comment, $args, $depth) {
  $GLOBALS[ 'comment' ] = $comment; ?>
  <li <?php comment_class(); ?>>
    <article class="comment-content" id="comment-<?php comment_ID(); ?>">
      <div class="comment-meta">
        <?php echo get_avatar($comment, $size = '32'); ?>
        <?php printf(__('<h6>%s</h6>', 'ace'), get_comment_author_link()) ?>
        <small><?php printf(__('%1$s at %2$s', 'ace'), get_comment_date(), get_comment_time()) ?> (<?php printf(__('%s', 'ace'), ace_time_ago()) ?>)</small>
      </div>
    <?php if($comment->comment_approved == '0') : ?><em><?php _e('Your comment is awaiting moderation', 'ace') ?>.</em><br /><?php endif; ?>
    <?php comment_text() ?>
    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args[ 'max_depth' ]))) ?>
    </article>
<?php }

// ==================================================================
// WordPress header title backward compatibility
// ==================================================================
if(! function_exists('_wp_render_title_tag')) :
  function ace_theme_render_title() {
  echo wp_title();
  }
  add_action('wp_head', 'ace_theme_render_title');
endif;

// ==================================================================
// Add internal lightbox
// ==================================================================
function ace_add_themescript() {
  if(!is_admin()){
    wp_enqueue_script('jquery');
    wp_enqueue_script('thickbox', null, array('jquery'));
  }
}
add_action('init','ace_add_themescript');

function ace_wp_thickbox_script() {
  ?>
  <script type="text/javascript">
  if(typeof tb_pathToImage != 'string') {
      var tb_pathToImage = "<?php echo site_url().'/wp-includes/js/thickbox'; ?>/loadingAnimation.gif";
    }
  if(typeof tb_closeImage != 'string') {
      var tb_closeImage = "<?php echo site_url().'/wp-includes/js/thickbox'; ?>/tb-close.png";
    }
  </script>
  <?php
  wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');
}
add_action('wp_head', 'ace_wp_thickbox_script');

if(!get_option('ace_disable_colorbox')) {
	// ==================================================================
	// Add colorbox
	// ==================================================================
	function ace_colorbox_replace($content) {
		$pattern		= '/<a(.*?)href="(.*?).(bmp|gif|jpeg|jpg|png)"(.*?)>/i';
		$replacement	= '<a$1href="$2.$3" rel="colorbox" class="colorbox"$4>';
		$content		= preg_replace($pattern, $replacement, $content);
		return $content;
	}
	add_filter('the_content', 'ace_colorbox_replace');

	function ace_add_colorbox_rel($attachment_link) {
		$attachment_link = str_replace('a href' , 'a rel="colorbox-cats" class="colorbox-cats" href' , $attachment_link);
		return $attachment_link;
	}
	add_filter('wp_get_attachment_link' , 'ace_add_colorbox_rel');

	function ace_colorbox_script(){
		wp_enqueue_style('colorbox', get_template_directory_uri() . '/js/colorbox/colorbox.css', null, array(), 'all');
		wp_enqueue_script('colorbox', get_template_directory_uri() . '/js/colorbox/jquery.colorbox-min.js', array('jquery'), null, true);
	}
	add_action('wp_enqueue_scripts', 'ace_colorbox_script');

	function ace_colorbox_javascript() { ?>
		<script type="text/javascript">
		/* <![CDATA[ */
		var $ = jQuery.noConflict();
		jQuery(document).ready(function($){ // START
			$('.colorbox-cats').colorbox({ rel:"colorbox-cats", maxWidth:"100%", maxHeight:"100%" });
			$('.colorbox').colorbox({ rel:"colorbox", maxWidth:"100%", maxHeight:"100%" });
			$('.colorbox-video').colorbox({ iframe:true, innerWidth:"80%", innerHeight:"80%" });
			$('.colorbox-iframe').colorbox({ iframe:true, width:"80%", height:"80%" });
		}); // END
		/* ]]> */
		</script>
	<?php }
	add_action('wp_footer', 'ace_colorbox_javascript', 100);
}

// ==================================================================
// Populate content
// ==================================================================
function ace_default_editor_content($content) {
  global $post_type;
  switch($post_type) {
    case 'post':
      $content = '';
    break;
    case 'page':
      $content = '';
    break;
    case 'sliders':
      $content = 'DO NOT PLACE IMAGE HERE';
    break;
  }
  return $content;
}
add_filter('default_content', 'ace_default_editor_content');

// ==================================================================
// Breadcrumb
// ==================================================================
function get_breadcrumb() {
  $space = '&raquo;';
  $name = __('Home', 'ace'); //text for the 'Home' link
  $before = '<span class="current">';
  $after = '</span>';

  if(!is_home() && !is_front_page() || is_paged()) {
    echo '<div class="breadcrumb" itemprop="breadcrumb">';
      global $post;
      $home = esc_url(home_url());
    echo '<a href="' . $home . '">' . $name . '</a> ' . $space . ' ';

    if(is_category()) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
        if($thisCat->parent != 0) echo (get_category_parents($parentCat, TRUE, ' ' . $space . ' '));
          echo $before . __('Archive by category &#39;', 'ace');
            single_cat_title();
          echo '&#39;' . $after;

    } elseif(is_day()) {

      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $space . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $space . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif(is_month()) {

      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $space . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif(is_year()) {

      echo $before . get_the_time('Y') . $after;

    } elseif(is_single() && !is_attachment()) {

      if(get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
          echo $post_type->labels->singular_name;
          echo '&nbsp;';
          echo $space;
          echo '&nbsp;';
          echo $before;
            the_title();
          echo $after;
      } else {
        $cat = get_the_category();
        $cat = $cat[0];
          echo get_category_parents($cat, TRUE, ' ' . $space . ' ');
          echo $before;
            the_title();
          echo $after;
      }

    } elseif(!is_single() && !is_page() && get_post_type() != 'post') {

      $post_type = get_post_type_object(get_post_type());
        echo $before;
        echo $post_type->labels->singular_name;
        echo $after;
        echo '&nbsp;';
        echo $space;
        echo '&nbsp;';
        echo $before;
          the_title();
        echo $after;

    } elseif(is_page() && !$post->post_parent) {

      echo $before;
        the_title();
      echo $after;

    } elseif(is_page() && $post->post_parent) {

      $parent_id= $post->post_parent;
      $breadcrumbs = array();
        while($parent_id) {
          $page = get_page($parent_id);
          $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
          $parent_id= $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
          foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $space . ' ';
            echo $before;
              the_title();
            echo $after;

    } elseif(is_search()) {

      echo $before . __('Search results for &#39;', 'ace') . get_search_query() . '&#39;' . $after;

    } elseif(is_tag()) {

      echo $before . __('Posts tagged &#39;', 'ace');
        single_tag_title();
      echo '&#39;' . $after;

    } elseif(is_author()) {

      global $author;
      $userdata = get_userdata($author);
        echo $before . __('Articles posted by ', 'ace') . $userdata->display_name . $after;

    } elseif(is_404()) {

      echo $before . 'Error 404' . $after;

    }

    if(get_query_var('paged')) {
      if(is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
        echo __('Page', 'ace') . ' ' . get_query_var('paged');
      if(is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
    }
    echo '</div>';
  }

}

// ==================================================================
// Post/page pagination
// ==================================================================
function ace_get_link_pages() {
  wp_link_pages(
    array(
    'before'           => '<p class="page-pagination"><span class="page-pagination-title">' . __('Pages:', 'ace') . '</span>',
    'after'            => '</p>',
    'link_before'      => '<span class="page-pagination-number">',
    'link_after'       => '</span>',
    'next_or_number'   => 'number',
    'nextpagelink'     => __('Next page', 'ace'),
    'previouspagelink' => __('Previous page', 'ace'),
    'pagelink'         => '%',
    'echo'             => 1
   )
 );
}

// ==================================================================
// Pagination (WordPress)
// ==================================================================
function ace_get_pagination_links() {
  the_posts_pagination(array(
    'mid_size'  => 5,
    'prev_text' => __('Previous', 'ace'),
    'next_text' => __('Next', 'ace'),
 ));
}

// ==================================================================
// Jetpack and Colorbox conflict
// ==================================================================
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if(is_plugin_active('jetpack/jetpack.php')) {
	function ace_remove_colorbox_filters() {
		remove_filter('the_content', 'ace_colorbox_replace');
		remove_filter('wp_get_attachment_link' , 'ace_add_colorbox_rel');
		remove_action('wp_enqueue_scripts', 'ace_colorbox_script');
		remove_action('wp_footer', 'ace_colorbox_javascript', 100);
	}
	add_action('after_setup_theme', 'ace_remove_colorbox_filters');
}
