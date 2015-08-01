<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */

get_header(); ?>

<?php $options = get_option( gpp_get_current_theme_id() . '_options' ); ?>

<section id="primary" class="clearfix">
	<div id="site-intro" class="fancy">
		<?php if ( isset( $options['chromatic_message'] ) && '' != $options['chromatic_message'] ) : ?>
			<h2 class="section-title"><?php echo stripslashes_deep( $options['chromatic_message'] ); ?></h2>
		<?php endif; ?>
	</div>
	<?php if ( is_home() ) { ?>
			<?php
			//	Homepage Slideshow
			if ( '' <> $gpp['slide_show'] && isset($gpp['slideshow_enabled']) && $gpp['slideshow_enabled'] == 'yes' || '' <> $gpp['slide_show'] && isset( $gpp['slideshow_enabled'])  && $gpp['slideshow_enabled'] == 'yes' ) { ?>

				<?php
				// Get Slides
				$slides = $gpp['slide_show'];
				$images = explode( ',', $slides );
				?>
				<div id="slider-wrap">
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
			<?php } ?>
		<?php } ?>
		<div id="controls">
			<a id="show_grid" class="control genericon genericon-draggable" href="javascript:void(0);"><?php _e( 'Show Grid', 'chromatic' ); ?></a>
	        <a id="show_list" class="control genericon genericon-menu" href="javascript:void(0);"><?php _e( 'Show List', 'chromatic' ); ?></a>
		</div>
    <div class="portfolios" style="display:none">

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', 'portfolio' ); ?>

        <?php endwhile; ?>

        <?php chromatic_content_nav( 'nav-below' ); ?>

        <?php else : ?>

            <article id="post-0" class="post no-results not-found">

                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'Nothing Found', 'chromatic' ); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <p><?php _e( "It seems we can't find what you're looking for. Perhaps searching can help.", 'chromatic' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .entry-content -->

            </article><!-- #post-0 -->

        <?php endif; ?>

    </div><!-- .portfolios -->

	<?php if ( chromatic_sell_media_check() == true ) : ?>

		<?php
		$args = array(
			'post_type' => 'sell_media_item',
			'post_status' => 'publish'
		);

		$wp_query = null;

		$wp_query = new WP_Query();
		$wp_query->query( $args );
		?>

		<?php if ( $wp_query->have_posts() ) : ?>

		<?php $thumbOrientation = chromatic_image_orientation(); ?>

		<section id="sellmediahome" class="portfolio-<?php echo $thumbOrientation; ?> sell-media">
			<div id="sell-media-intro" class="fancy"><h2 class="section-title"><?php _e('Buy ', 'chromatic'); ?><?php $obj = get_post_type_object( 'sell_media_item' ); echo $obj->rewrite['slug']; ?></h2></div>
			<div class="portfolios grid">
				<div class="sell-media-grid-container">

					<?php $i = 0; ?>
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); $i++; ?>
						<?php
							if ( $i %3 == 0)
								$end = ' end';
							else
								$end = null;
						?>
						<article class="sell-media-grid third portfolio <?php echo $end; ?>">
							<?php
							//Get Post Attachment ID
							$sell_media_attachment_id = get_post_meta( $post->ID, '_sell_media_attachment_id', true );
							if ( $sell_media_attachment_id ){
								$attachment_id = $sell_media_attachment_id;
							} else {
								$attachment_id = get_post_thumbnail_id( $post->ID );
							}
							?>
							<div class="entry-content">
								<a href="<?php the_permalink(); ?>" class="thumb"><?php sell_media_item_icon( $attachment_id, chromatic_image_orientation() ); ?></a>
								<div class="entry-text hide" style="display:none;">
									<header class="entry-header">
										<?php do_action( 'chromatic_before_title' ); ?>
										<h2 class="entry-title">
											<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'chromatic' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
											<?php the_title(); ?>
											</a>
										</h2>
										<p class="entry-meta">
											<?php chromatic_pub_date(); ?> <span class="fancy"><?php _e( 'by', 'chromatic' ); ?></span> <?php the_author_posts_link(); ?>
										</p>
									</header><!-- .entry-header -->
									<div class="entry-summary" style="display:none;">
										<?php the_excerpt(); ?>
									</div>
										<?php get_template_part( 'sellmedia', 'footer' ); ?>
								</div><!-- .entry-text -->
							</div><!-- .entry-content  -->
						</article>
					<?php endwhile; ?>
				</div>
			</div> <!-- .portfolios grid -->
		</section><!-- #sellmediahome -->
	<?php endif; wp_reset_query(); $args = null; $i = 0; ?>

	<?php endif; ?>

</section><!-- #primary -->

<?php get_footer(); ?>