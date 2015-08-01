<?php
/*
 Template Name: Collections
 *
 * @package Chromatic
 * @since ALbedo 1.0
 */

get_header(); ?>
<div id="primary" class="content-area collections-template sell-media">
	<div id="sell-media-archive">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div id="controls">
					<a id="show_grid" class="control genericon genericon-draggable" href="javascript:void(0);"><?php _e( 'Show Grid', 'chromatic' ); ?></a>
	                <a id="show_list" class="control genericon genericon-menu" href="javascript:void(0);"><?php _e( 'Show List', 'chromatic' ); ?></a>
				</div>
			</header><!-- .entry-header -->
			<?php if ( chromatic_sell_media_check() ) : ?>
				<?php
					global $theme_options;
					$sellmedia_options = sell_media_get_plugin_options();

				?>
					<div class="portfolios grid">
						<div id="main-collections" class="sell-media-grid-container">
							<?php

							$taxonomy = 'collection';
							$term_ids = array();
							foreach( get_terms( $taxonomy ) as $term_obj ){
							    $password = sell_media_get_term_meta( $term_obj->term_id, 'collection_password', true );
							    if ( $password ) $term_ids[] = $term_obj->term_id;
							}

							$args = array(
							    'orderby' => 'name',
								'hide_empty' => true,
								'number' => get_option('posts_per_page '),
								'parent' => 0,
								'exclude' => $term_ids
							);

							$terms = get_terms( $taxonomy, $args );

							// Randomize Taxonomies
							shuffle( $terms );

							if ( empty( $terms ) )
								return;

							$count = count( $terms );

							foreach( $terms as $term ) :
								$args = array(
										'post_status' => 'publish',
										'taxonomy' => 'collection',
										'field' => 'slug',
										'term' => $term->slug,
										'tax_query' => array(
											array(
					                            'taxonomy' => 'collection',
					                            'field' => 'id',
					                            'terms' => $term_ids,
					                            'operator' => 'NOT IN'
					                            )
											)
								        );
								$posts = New WP_Query( $args );
								$post_count = $posts->found_posts;

								if ( $post_count != 0 ) : ?>
									<article class="sell-media-grid portfolio third">
										<?php
										$args = array(
												'posts_per_page' => 1,
												'taxonomy' => 'collection',
												'field' => 'slug',
												'term' => $term->slug
												);

										$posts = New WP_Query( $args );
										?>

										<?php foreach( $posts->posts as $post ) : ?>
											<?php $term_id = $term->term_id; ?>
											<div class="entry-content">
												<?php
												//Get Post Attachment ID
												$sell_media_attachment_id = get_post_meta( $post->ID, '_sell_media_attachment_id', true );
												if ( $sell_media_attachment_id ){
													$attachment_id = $sell_media_attachment_id;
												} else {
													$attachment_id = get_post_thumbnail_id( $post->ID );
												}
												?>
												<a href="<?php echo get_term_link( $term->slug, $taxonomy ); ?>" class="collection thumb">
													<?php 
													$collection_attachment_id = sell_media_get_term_meta( $term->term_id, 'collection_icon_id', true );
													if ( ! empty ( $collection_attachment_id ) ) {
														print wp_get_attachment_image( $collection_attachment_id, chromatic_image_orientation() );
													} else {
														sell_media_item_icon( $attachment_id, chromatic_image_orientation() );
													} ?>

												</a>
												<div class="entry-text hide" style="display:none;">
													<header class="entry-header">
														<?php do_action( 'chromatic_before_title' ); ?>
														<h2 class="entry-title">
															<a href="<?php echo get_term_link( $term->slug, $taxonomy ); ?>" rel="bookmark">
															<?php echo $term->name; ?>
															</a>
														</h2>
														<p class="entry-meta">
															<span class="collection-count">
																<?php echo '<span class="count">' . $post_count . '</span>' .  __( ' images in ', 'chromatic' ) . '<span class="collection">' . $term->name . '</span>' . __(' collection', 'chromatic'); ?>
															</span>
															<span class="collection-price">
																<?php echo __( 'Starting at ', 'chromatic' ) . '<span class="price">' . sell_media_get_currency_symbol() . $sellmedia_options->default_price . '</span>' ?>
															</span>
														</p>
													</header><!-- .entry-header -->
													<div class="entry-summary" style="display:none;">
														<?php echo term_description( $term_id, 'collection' ); ?>
													</div>
												</div><!-- .entry-text -->
											</div><!-- .entry-content  -->
											
										<?php endforeach; ?>
									</article>
								<?php endif; ?>
						    <?php endforeach; ?>
						</div><!-- .sell-media-grid-container -->
					</div><!-- .portfolios grid -->
			<?php else : ?>
				<?php _e( 'Please activate Sell Media plugin to use this page.', 'chromatic' ); ?>
			<?php endif; ?>

		</div><!-- #content .site-content -->
	</div>
</div><!-- #primary .content-area -->
<?php get_footer(); ?>