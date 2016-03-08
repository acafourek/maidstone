<?php
/**
 * The template for displaying the footer.
 *
 * @package Sela
 */
?>

	</div><!-- #content -->

	<?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer">
		<?php if ( has_nav_menu ( 'social' ) ) : ?>
			<?php wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links', ) ); ?>
		<?php endif; ?>

		<div class="site-info"  role="contentinfo">
			&copy; <?php echo date('Y').' '.get_bloginfo('name');?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
	<!-- GPSMycity Track Code -->
	<LINK rel="stylesheet" type="text/css" href="http://www.gpsmycity.com/d/smart-banner/smart-app-banner.css">
	<SCRIPT src="http://www.gpsmycity.com/d/smart-banner/smart-app-banner.js"></SCRIPT>
	<SCRIPT>
		sbobj = new SmartBanner({
		title: "Inspiring Travel Articles",
		author: "GPSmyCity.com, Inc.",
		button: 'View',
		store_url: {
		ios: 'http://www.gpsmycity.com/dlnk/?view=owner&id=2401&aff='
		},
		force_url: 1,
		icon_url: "http://www.gpsmycity.com/d/apple-touch-icon.png",
		force_icon: 1
		});
	
	if (sbobj.type == "ios")
	sbobj.display();
	</SCRIPT>
</html>
