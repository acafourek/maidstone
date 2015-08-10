<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */
?>

	<?php do_action( 'chromatic_before_footer' ); ?>

	<!-- BeginFooter -->
	<footer id="colophon" role="contentinfo">

	<?php if ( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) ) : ?>

		<div id="footer-widgets" <?php chromatic_footer_widget_class(); ?>>

		<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
			<div id="widget-1" class="widget">
				<?php dynamic_sidebar( 'footer-widget-1' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
			<div id="widget-2" class="widget">
				<?php dynamic_sidebar( 'footer-widget-2' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
			<div id="widget-3" class="widget">
				<?php dynamic_sidebar( 'footer-widget-3' ); ?>
			</div>
		<?php endif; ?>

		</div><!-- end #footer-widgets -->

	<?php endif; // end check if any footer widgets are active ?>
		<div id="site-generator">
			<?php if ( has_nav_menu( 'footer' ) ) wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'menu-footer-menu secondary clearfix' ) ); ?>
			<div id="footer-credits">
			<?php do_action( 'chromatic_credits' ); ?>
			<?php _e( 'Powered by', 'chromatic' ); ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'chromatic' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'chromatic' ); ?>" ><?php printf( __( '%s', 'chromatic' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'chromatic' ), '<a href="http://graphpaperpress.com/themes/chromatic/">Chromatic</a>', '<a href="http://graphpaperpress.com/">Graph Paper Press</a>' ); ?>			</div>
		</div>
	</footer><!-- #colophon -->

	<?php do_action( 'chromatic_after_footer' ); ?>

</div><!-- #page -->
<!-- EndFooter -->

<?php wp_footer(); ?>

</body>
</html>