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
	<?php if ( $recent->have_posts() ) : ?>
	<div id="secondary" class="widget-area front-widget-area" role="complementary">
		<?php while ( $recent->have_posts() ) : $recent->the_post(); ?>
		<div class="widget-area">
			<aside class="widget widget_text">
				<h3 class="widget-title"><?php the_title();?></h3>
				<div class="textwidget">
					<a href="<?php the_permalink();?>">
						<?php the_post_thumbnail('medium');?>
					</a>
					<?php 
						if(has_excerpt()){ //manually defined excerpts doen have "read more" tags
							the_excerpt();
							echo '<a class="read-more" href="' . get_the_permalink() . '">' . __( 'Read More &rarr;', 'maidstone' ) . '</a>';
						} else {
							the_excerpt();
						}
						?>
				</div>
			</aside>
		</div>
		<?php endwhile; ?>
	
		<?php wp_reset_postdata(); ?>
	</div>
<?php endif; ?>