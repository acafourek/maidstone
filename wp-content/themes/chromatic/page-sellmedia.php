<?php
/*
Template Name: Sell Media Items
*/
get_header(); ?>

<section id="primary" class="clearfix sell-media">
    <div id="content" role="main">
		<header class="page-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div id="controls">
				<a id="show_grid" class="control genericon genericon-draggable" href="javascript:void(0);"><?php _e( 'Show Grid', 'chromatic' ); ?></a>
                <a id="show_list" class="control genericon genericon-menu" href="javascript:void(0);"><?php _e( 'Show List', 'chromatic' ); ?></a>
			</div>
		</header><!-- .entry-header -->
    <?php
    global $paged;
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
	?>
	<div id="content-inner">
		<?php if ( chromatic_sell_media_check() == true ) : ?>

				<?php
				$args = array(
					'post_type' => 'sell_media_item',
					'post_status' => 'publish',
					'paged' => $paged
				);

				$wp_query = null;

				$wp_query = new WP_Query();
				$wp_query->query( $args );
				?>

				<?php if ( $wp_query->have_posts() ) : ?>

				<section id="sellmediahome sell-media">

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
								<article class="sell-media-grid  portfolio <?php echo $end; ?>">
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
				<?php sell_media_pagination_filter(); ?>
			<?php endif; wp_reset_query(); $args = null; $i = 0; ?>
		<?php endif; ?>

    </div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>