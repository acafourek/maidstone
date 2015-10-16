<?php
/**
 * The sidebar containing the front page widget areas.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package Sela
 */
	$args = array( 
		'posts_per_page' => 3,
	);
	$recent = new WP_Query($args); ?>
	<?php if ( $recent->have_posts() ) : 
		$loc = false; //dummy var to see if we've set a current location
	?>
	<div id="secondary" class="widget-area front-widget-area" role="complementary">
		<?php while ( $recent->have_posts() ) : $recent->the_post(); ?>
		<div class="widget-area">
			<aside class="widget widget_text">
				<div class="textwidget">
					<a href="<?php the_permalink();?>">
						<?php 
						get_the_image(array(
							'size' => 'medium',
							'scan' => true
						));
					?>	
					</a>
					<h3 class="widget-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php 
						echo da_custom_excerpt($post);
						?>
				</div>
			</aside>
		</div>
		<?php 
			endwhile; ?>
	
		<?php wp_reset_postdata(); ?>
	</div>
	<div id="secondary" class="widget-area front-widget-area" role="complementary">
		<?php echo do_shortcode('[instagram-feed]');?>
	</div>
<?php endif; ?>