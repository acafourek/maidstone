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
		
	</footer><!-- #colophon -->

	<?php do_action( 'chromatic_after_footer' ); ?>

</div><!-- #page -->
<!-- EndFooter -->

<?php wp_footer(); ?>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '754399517962790',
	      xfbml      : true,
	      version    : 'v2.2'
	    });
	  };
	
	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>
	<div id="fb-root"></div>
	<!-- /twitter js -->
	<script type="text/javascript" async src="//platform.twitter.com/widgets.js"></script>
	</body>
</html>