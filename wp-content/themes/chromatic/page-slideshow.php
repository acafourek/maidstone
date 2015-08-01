<?php
/*
Template Name: Slideshow
 */

/**
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */
get_header(); ?>

<section id="primary" class="clearfix page-slideshow">
        <div id="content" role="main">
            <div id="content-inner">

				<div id="slider-wrap">
						<?php
						// Get Slides
							$post_subtitrare = get_post( $post->ID );
							$content = $post_subtitrare-> post_content;
							$pattern = get_shortcode_regex();
							preg_match( "/$pattern/s", $content, $match );
							if( isset( $match[2] ) && ( $match[2]  == "gallery" ) ) {
								$atts = shortcode_parse_atts( $match[3] );
								$images = isset( $atts['ids'] ) ? explode( ',', $atts['ids'] ) : false;
							} else {
								$slides = $gpp['slide_show'];
								$images = explode( ',', $slides );
							}
						?>

						<div id="home-slider">
							<div class="flexslider home-slider">
						        <ul class="slides">

									<?php
									foreach( $images as $id ) {

										$attachment_caption = get_post_field('post_excerpt', $id);
										$attachment_title = get_post_field('post_title', $id);

										?>
										<li>
											<div class="slide <?php if ( empty( $attachment_title ) ) echo "slide-no-title" ?>">
												<?php echo wp_get_attachment_image( $id, "slide", 0 ); ?>
												<div class="slide-button-wrap container">

													<?php if ( ! empty ( $attachment_title ) || ! empty ( $attachment_caption ) ) { ?>
														<div class="flex-caption">
															<?php if ( ! empty ( $attachment_title ) ) { ?>
																<h2 class="home-slide-title">
																	<?php echo $attachment_title; ?>
																</h2>
															<?php } ?>

															<?php if ( ! empty ( $attachment_caption ) ) {
																echo '<p class="slider-caption">' . $attachment_caption . '</p>'; } ?>
														</div>
													<?php } ?>
												</div>
											</div>
										</li>
									<?php } ?>
								</ul> <!-- .slides -->
							</div> <!-- .flexslider -->
						</div> <!-- #home-slider -->
					</div>

        </div><!-- .content -->
    </div><!-- .inner -->
</section><!-- #primary -->

<?php get_footer(); ?>