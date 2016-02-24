<?php
/**
 * Template Name: Shop Page
 *
 * @package Sela
 */

get_header(); 
?>
<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'hero' ); ?>

	<?php endwhile; ?>

	<?php rewind_posts(); ?>

	<div class="content-wrapper full-width <?php echo sela_additional_class(); ?>">
		<div id="primary" class="content-area grid-page-content-area ">
			<div id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<header class="entry-header">
							<h1 class="entry-title"><?php the_title(); ?></h1>
						</header><!-- .entry-header -->
					
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->					
					</article><!-- #post-## -->
				<?php endwhile; // end of the loop. ?>
				<?php
					$product_args = array(
						'post_type' => 'product',
						'posts_per_page' => -1	
					);
					$product_query = new WP_Query( $product_args );
					if( $product_query->have_posts() ):			
						echo '<div class="child-pages grid">';
						while( $product_query->have_posts() ) : $product_query->the_post(); 
				?>
							<article id="post-product-<?php the_ID(); ?>" class="child-page">
								<?php
									
									$prod_title = get_field('product_name');
									$title = ($prod_title == '' ? get_the_title() : $prod_title);
									
									$prod_link = get_field('product_link');

									
									$imgs = array();
									if(has_post_thumbnail()){
										$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');	
										$imgs[] = $thumb[0];
									}
									$product_imgs = get_field('product_images');
									if(is_array($product_imgs) && count($product_imgs) > 0 ){
										foreach($product_imgs as $prod_img){
											$imgs[] = $prod_img['images'];
										}
									}
								?>
								<div class="entry-thumbnail">
									<?php
										foreach($imgs as $img){
											echo '<div class="item">';
											
											if($prod_link)
												echo '<a target="_blank" href="'.$prod_link.'" title="Link to learn more and purchase '.$title.'"><img src="'.$img.'" alt="Link to learn more and purchase '.$title.'"/></a>';
											else
												echo '<img src="'.$img.'" alt="Link to learn more and purchase '.$title.'" />';
											echo '</div>';
										}
									?>
								</div><!-- .entry-thumbnail -->
							
								<header class="entry-header">
									<h1 class="entry-title">
										<?php											
											if($prod_link)
												echo '<a target="_blank"  href="'.$prod_link.'" title="Link to learn more and purchase '.$title.'">'.$title.'</a>';
											else
												echo $title;
										?>
								</header><!-- .entry-header -->
							
								<div class="entry-summary">
									<?php the_content(); ?>
								</div><!-- .entry-summary -->							
							</article><!-- #post-## -->		
				<?php
						endwhile;
						echo '</div>';
					endif;
					wp_reset_query();	
					
				?>
				
			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- .content-wrapper -->
	
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.entry-thumbnail').each(function(i, obj) {
				$(this).owlCarousel({			
				  navigation : false, // Show next and prev buttons
				  slideSpeed : 300,
				  paginationSpeed : 400,
				  singleItem:true,
				  autoPlay: false //default to 5 sec
				});
			});
			
	 
	});
	</script>

<?php get_footer(); ?>