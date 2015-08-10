<?php
/**
 * The sidebar containing the front page widget areas.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package Sela
 */
	$args = array(
		
	);
	$the_query = new WP_Query( $args ); ?>
	
	<?php if ( $the_query->have_posts() ) : ?>
	<div id="secondary" class="widget-area front-widget-area" role="complementary">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div class="widget-area">
			<h3 class="widget-title"><?php the_title();?></h3>
			<div class="textwidget">
				<a href="<?php the_permalink();?>">
					<?php the_post_thumbnail('medium');?>
				</a>
				<p><?php the_excerpt();?></p></div>
		<?php endwhile; ?>
	
		<?php wp_reset_postdata(); ?>
<?php endif; ?>