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
		<script type="text/javascript">
// 		    jQuery.bigfoot({
/*
			    buttonMarkup: "<div class='bigfoot-footnote__container'>
			    <button href='#' class='bigfoot-footnote__button' rel='footnote'
			    id='{{SUP:data-footnote-backlink-ref}}'
     data-footnote-number='{{FOOTNOTENUM}}'
     data-footnote-identifier='{{FOOTNOTEID}}'
     alt='See Footnote {{FOOTNOTENUM}}'
     data-footnote-content='{{FOOTNOTECONTENT}}'>

     <svg class='bigfoot-footnote__button__circle' viewbox='0 0 6 6' preserveAspectRatio='xMinYMin'><circle r='3' cx='3' cy='3' fill='white'></circle></svg>
     <svg class='bigfoot-footnote__button__circle' viewbox='0 0 6 6' preserveAspectRatio='xMinYMin'><circle r='3' cx='3' cy='3' fill='white'></circle></svg>
     <svg class='bigfoot-footnote__button__circle' viewbox='0 0 6 6' preserveAspectRatio='xMinYMin'><circle r='3' cx='3' cy='3' fill='white'></circle></svg>
     
  </button>
</div>"
*/
		    });
		</script>
</body>
</html>
