<?php
// ==================================================================
// Shortcodes auto formatting
// ==================================================================
function parse_shortcode_content($content) {
  $content = trim(wpautop(do_shortcode($content)));
  if(substr($content, 0, 4) == '</p>')
    $content = substr($content, 4);
  if(substr($content, -3, 3) == '<p>')
    $content = substr($content, 0, -3);
    $content = str_replace(array('<p></p>'), '', $content);
    $content = str_replace(array('<p>  </p>'), '', $content);
  return $content;
}
add_filter('the_content', 'shortcode_unautop', 100);

// ==================================================================
// Slider
// ==================================================================
function slide($atts, $content = null) {
  $content = parse_shortcode_content($content);
  extract(shortcode_atts(array(
    'id'  => 'Slide_ID',
 ), $atts));
  $output = '';
  $output .= '
    <section class="sc-flexslider">
      <ul class="'.$id.'">
      '.do_shortcode($content).'
      </ul>
    </section>
  ';
  $output .= '
	<script type="text/javascript">
	/* <![CDATA[ */
	var $ = jQuery.noConflict();
	jQuery(document).ready(function($) {
		$(".sc-flexslider").flexslider({
			namespace:		"sc-flex-",
			selector:		".'.$id.' > li",
			smoothHeight:	true,
			animation:		"fade",
			prevText:		"<i class=\"fa fa-angle-left\"></i>",
			nextText:		"<i class=\"fa fa-angle-right\"></i>",
		});
	});
	/* ]]> */
	</script>';

  return $output;

}
add_shortcode('slide', 'slide');

  // ==================================================================
  // Slider images
  // ==================================================================
  function slide_image($atts, $content = null) {
    $content = parse_shortcode_content($content);
    extract(shortcode_atts(array(
      'src'     => 'http://image.jpg',
      'title'   => 'image title',
      'caption' => 'image caption',
      'url'     => 'url',
   ), $atts));
  $output = '';

  $output .= '<li>';

  if($url == ''):
    $output .= '';
  elseif($url !== ''):
    $output .= '<a href="'.$url.'">';
  endif;

  $output .= '<img src="'.$src.'" alt="'.$title.'" />';

  if($url == ''):
    $output .= '';
  elseif($url !== ''):
    $output .= '</a>';
  endif;

  if($caption == ''):
    $output .= '';
  elseif($caption !== ''):
    $output .= '<p class="caption">'.$caption.'</p>';
  endif;

  $output .= '</li>';
  return $output;


    //return '<li><img src="'.$src.'" alt="'.$title.'" /><p class="caption">'.$caption.'</p></li>';
  }
  add_shortcode('images', 'slide_image');

// ==================================================================
// Full width
// ==================================================================
function full_width_code($atts, $content = null) {
	extract(shortcode_atts(array(
		'background' => 'ffffff',
		'image' => ''
	), $atts));
	$content = parse_shortcode_content($content);
	return '<section style="background-color:'.$background.'; background-image:url('.$image.');" class="full-width-bar"><article class="full-width-content">'.do_shortcode($content).'</article></section>';
}
add_shortcode('full_width', 'full_width_code');

// ==================================================================
// Split content left/right
// ==================================================================
function column_left($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<section class="split-columns"><article class="colleft">'.do_shortcode($content).'</article>';
}
function column_right($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="colright">'.do_shortcode($content).'</article></section>';
}
add_shortcode('left', 'column_left');
add_shortcode('right', 'column_right');

// ==================================================================
// Split content 3 columns
// ==================================================================
function column_1($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<section class="split-columns"><article class="col1">'.do_shortcode($content).'</article>';
}
function column_2($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="col2">'.do_shortcode($content).'</article>';
}
function column_3($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="col3">'.do_shortcode($content).'</article></section>';
}
add_shortcode('col1', 'column_1');
add_shortcode('col2', 'column_2');
add_shortcode('col3', 'column_3');

// ==================================================================
// Split content 3 half columns
// ==================================================================
function column_3_2($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<section class="split-columns"><article class="col3-2">'.do_shortcode($content).'</article>';
}
function column_3_1($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="col3-1">'.do_shortcode($content).'</article></section>';
}
add_shortcode('col3_2', 'column_3_2');
add_shortcode('col3_1', 'column_3_1');

// ==================================================================
// Split content 4 columns
// ==================================================================
function column_4_1($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<section class="split-columns"><article class="col4-1">'.do_shortcode($content).'</article>';
}
function column_4_2($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="col4-2">'.do_shortcode($content).'</article>';
}
function column_4_3($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="col4-3">'.do_shortcode($content).'</article>';
}
function column_4_4($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="col4-4">'.do_shortcode($content).'</article></section>';
}
add_shortcode('col4_1', 'column_4_1');
add_shortcode('col4_2', 'column_4_2');
add_shortcode('col4_3', 'column_4_3');
add_shortcode('col4_4', 'column_4_4');

// ==================================================================
// Split content 5 columns
// ==================================================================
function column_5_1($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<section class="split-columns"><article class="col5-1">'.do_shortcode($content).'</article>';
}
function column_5_2($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="col5-2">'.do_shortcode($content).'</article>';
}
function column_5_3($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="col5-3">'.do_shortcode($content).'</article>';
}
function column_5_4($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="col5-4">'.do_shortcode($content).'</article>';
}
function column_5_5($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="col5-5">'.do_shortcode($content).'</article></section>';
}
add_shortcode('col5_1', 'column_5_1');
add_shortcode('col5_2', 'column_5_2');
add_shortcode('col5_3', 'column_5_3');
add_shortcode('col5_4', 'column_5_4');
add_shortcode('col5_5', 'column_5_5');

// ==================================================================
// Tooltip
// ==================================================================
function tooltip($atts, $content = null) {
  extract(shortcode_atts(
    array(
    "text" => null
   ), $atts)
 );
  return '<span class="tooltip">'.do_shortcode($content).'<span class="tip">'.$text.'</span></span>';
}
add_shortcode('tooltip', 'tooltip');

// ==================================================================
// Break line
// ==================================================================
function line() {
  return '<hr class="line" />';
}
add_shortcode('line', 'line');

// ==================================================================
// Warning box
// ==================================================================
function warning($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="warning"><i class="fa fa-times-circle"></i> '.do_shortcode($content).'</article>';
}
add_shortcode('warning', 'warning');

// ==================================================================
// Querstion box
// ==================================================================
function question($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="question"><i class="fa fa-question-circle"></i> '.do_shortcode($content).'</article>';
}
add_shortcode('question', 'question');

// ==================================================================
// Disclaimer box
// ==================================================================
function disclaim($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<article class="disclaim"><i class="fa fa-exclamation-circle"></i> '.do_shortcode($content).'</article>';
}
add_shortcode('disclaim', 'disclaim');

// ==================================================================
// Button
// ==================================================================
function button_code($atts, $content = null) {
  extract(shortcode_atts(
    array(
    'url'	=> 'http://',
    'color'	=> '',
   ), $atts)
 );
  return '<a href="'.$url.'" class="post-button" style="background-color:'.$color.'">'.do_shortcode($content).'</a>';
}
add_shortcode('button', 'button_code');

// ==================================================================
// Lightbox
// ==================================================================
function lightbox($atts, $content = null) {
  extract(shortcode_atts(
    array(
    'title' => 'TITLE',
    'url'   => 'URL',
   ), $atts)
 );
  return '<a class="colorbox-iframe" href="'.$url.'" title="'.$title.'">'.do_shortcode($content).'</a>';
}
add_shortcode('lightbox', 'lightbox');

// ==================================================================
// Pullquote
// ==================================================================
function pullquote($atts, $content = null) {
  extract(shortcode_atts(
    array(
    'width' => '300',
    'float' => 'left',
   ), $atts)
 );
  // $content = parse_shortcode_content($content);
  return '<blockquote class="pullquote" style="float:'.$float.'; width:'.$width.'px">'.do_shortcode($content).'</blockquote>';
}
add_shortcode('pullquote', 'pullquote');

// ==================================================================
// Accordion
// ==================================================================
function accordion_code($atts, $content = null) {
  extract(shortcode_atts(
    array(
    'title' => 'TITLE'
   ), $atts)
 );
  // $content = parse_shortcode_content($content);
  return '<section class="accordion-wrap"><article class="accordion-title">'.$title.'</article><article class="accordion-content">'.do_shortcode($content).'</article></section>';
}
add_shortcode('accordion', 'accordion_code');

// ==================================================================
// Dropcap
// ==================================================================
function dropcap($atts, $content = null) {
  // $content = parse_shortcode_content($content);
  return '<span class="dropcap-letter">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap', 'dropcap');
