<?php
/**
 * The sidebar containing the footer page widget areas.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package Sela
 */

?>

<div id="tertiary" class="widget-area footer-widget-area" role="complementary">
	<div id="widget-area-2" class="widget-area current-location">
		<h3 class="widget-title">Last Seen</h3>
		<?php
			$loc = mb_get_latest_foursquare_location();
			if($loc){
		?>
				<h4><i class="fa fa-map"></i></h4>
				<p><?php echo $loc; ?></p>
		<?php
			}
		?>
	</div><!-- #widget-area-2 -->


	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div id="widget-area-3" class="widget-area current-location">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div><!-- #widget-area-3 -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<div id="widget-area-4" class="widget-area current-location">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div><!-- #widget-area-4 -->
	<?php endif; ?>
</div><!-- #tertiary -->
