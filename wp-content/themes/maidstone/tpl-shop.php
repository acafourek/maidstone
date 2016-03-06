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
							get_template_part( 'content', 'product' );	
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