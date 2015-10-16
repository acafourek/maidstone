<?php
/**
 * If viewing a multi post page 
 */
if ( !is_front_page() && !is_singular() && !chromaticfw_is_404() ) :

	// Let child themes add content if they want to
	chromaticfw_display_loop_title_content( 'pre' );
	?>

	<div id="loop-meta">
		<div class="grid">
			<div class="grid-row">

				<div <?php chromaticfw_attr( 'loop-meta', '', 'grid-span-12' ); ?>>

					<h1 <?php chromaticfw_attr( 'loop-title' ); ?>><?php chromaticfw_loop_title(); // Displays title for archive type (multi post) pages. ?></h1>

					<?php if ( $desc = chromaticfw_get_loop_description() ) : ?>
						<div <?php chromaticfw_attr( 'loop-description' ); ?>>
							<?php echo $desc; // Displays description for archive type (multi post) pages. ?>
						</div><!-- .loop-description -->
					<?php endif; // End paged check. ?>

				</div><!-- .loop-meta -->

			</div>
		</div>
	</div>

	<?php
	// Let child themes add content if they want to
	chromaticfw_display_loop_title_content( 'post' );

/**
 * If viewing a single post/page, and the page is not set as frontpage
 */
elseif ( !is_front_page() && is_singular() && !chromaticfw_is_404() ) :

	if ( have_posts() ) :

		// Begins the loop through found posts, and load the post data.
		while ( have_posts() ) : the_post(); 

			$display_title = '';
			$display_title = apply_filters( 'display_loop_meta', $display_title );
			$pre_title_content = '';
			$pre_title_content_stretch = '';
			$pre_title_content_post = '';

			chromaticfw_display_loop_title_content( 'pre', array(
				$pre_title_content, $pre_title_content_stretch, $pre_title_content_post
				) );

			if ( $display_title !== 'hide' ) :
			?>

				<div id="loop-meta">
					<div class="grid">
						<div class="grid-row">

							<div <?php chromaticfw_attr( 'loop-meta', '', 'grid-span-12' ); ?>>
								<div class="entry-header">

									<?php
									global $post;
									$pretitle = ( !isset( $post->post_parent ) || empty( $post->post_parent ) ) ? '' : get_the_title( $post->post_parent ) . ' &raquo; ';
									?>
									<h1 <?php chromaticfw_attr( 'loop-title' ); ?>><?php the_title( $pretitle ); ?></h1>

									<?php 
									$hide_meta_info = '';
									$hide_meta_info = apply_filters( 'chromaticfw_hide_meta_info', $hide_meta_info, 'top' );
									?>
									<?php if ( !$hide_meta_info && 'top' == chromaticfw_get_option( 'post_meta_location' ) && !is_attachment() ) : ?>
										<div <?php chromaticfw_attr( 'loop-description' ); ?>>
											<?php
											if ( is_page() )
												chromaticfw_meta_info_blocks( chromaticfw_get_option('page_meta') );
											else
												chromaticfw_meta_info_blocks( chromaticfw_get_option('post_meta') );
											?>
										</div><!-- .loop-description -->
									<?php endif; ?>

								</div><!-- .entry-header -->
							</div><!-- .loop-meta -->

						</div>
					</div>
				</div>

			<?php
			endif;

			chromaticfw_display_loop_title_content( 'post', array(
				$pre_title_content, $pre_title_content_stretch, $pre_title_content_post
				) );

		endwhile;
		rewind_posts();

	endif;

endif;