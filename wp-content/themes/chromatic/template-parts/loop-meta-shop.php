<?php

// Apply this to only woocommerce pages
if ( !is_woocommerce() )
	return;

/**
 * If viewing a multi product page 
 */
if ( !is_product() && !is_singular() ) :

	// Let child themes add content if they want to
	chromaticfw_display_loop_title_content( 'pre' );
	?>

	<div id="loop-meta">
		<div class="grid">
			<div class="grid-row">

				<div <?php chromaticfw_attr( 'loop-meta', '', 'grid-span-12' ); ?>>

					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h1 <?php chromaticfw_attr( 'loop-title' ); ?>><?php woocommerce_page_title(); ?></h1>
					<?php endif; ?>
					<div <?php chromaticfw_attr( 'loop-description' ); ?>>
						<?php do_action( 'woocommerce_archive_description' ); ?>
					</div><!-- .loop-description -->

				</div><!-- .loop-meta -->

			</div>
		</div>
	</div>

	<?php
	// Let child themes add content if they want to
	chromaticfw_display_loop_title_content( 'post' );

/**
 * If viewing a single product
 */
elseif ( is_product() ) :

	add_filter( 'display_loop_meta', 'chromaticfw_hide_loop_meta_woo_product' );
	get_template_part( 'template-parts/loop-meta' );

endif;

/**
 * Hide title area on single product page
 *
 * @since 1.8
 * @access public
 * @return void
 */
function chromaticfw_hide_loop_meta_woo_product() {
	return 'hide';
} ?>