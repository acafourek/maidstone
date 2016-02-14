<?php
/**
 * The Template for displaying all single products.
 */
?>

<?php get_header( 'shop' ); ?>

<?php
// Template modification Hook
do_action( 'hoot_template_before_content_grid', 'single-product.php' );
?>

<div class="grid">

	<main <?php hoot_attr( 'content' ); ?>>

		<?php
		// Template modification Hook
		do_action( 'hoot_template_main_start', 'single-product.php' );

		/**
		 * woocommerce_before_main_content hook
		 *
		 * removed @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
		?>

		<?php if ( have_posts() ) : ?>

			<div id="content-wrap">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'single-product' ); ?>

				<?php endwhile; ?>

			</div><!-- #content-wrap -->

			<?php
			// Template modification Hook
			do_action( 'hoot_template_after_content_wrap', 'single-product.php' );
			?>

		<?php else : ?>

			<?php
			// Loads the template-parts/error.php template.
			get_template_part( 'template-parts/error' );
			?>

		<?php endif; ?>

		<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * removed @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );

		// Template modification Hook
		do_action( 'hoot_template_main_end', 'single-product.php' );
		?>

	</main><!-- #content -->

	<?php
	/**
	 * woocommerce_sidebar hook
	 *
	 * @hooked woocommerce_get_sidebar - 10
	 */
	do_action( 'woocommerce_sidebar' );
	?>

</div><!-- .grid -->

<?php get_footer( 'shop' ); ?>