<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */

get_header(); ?>

<?php $options = get_option( gpp_get_current_theme_id() . '_options' ); ?>

<section id="primary" class="clearfix">
	<div id="site-intro" class="fancy">
		<?php if ( isset( $options['chromatic_message'] ) && '' != $options['chromatic_message'] ) : ?>
			<h2 class="section-title"><?php echo stripslashes_deep( $options['chromatic_message'] ); ?></h2>
		<?php endif; ?>
	</div>
	<?php if ( is_home() ) { 
	?>
			<?php
			//	Homepage Slideshow - customized logic here
			if (isset($gpp['slideshow_enabled']) && $gpp['slideshow_enabled'] == 'yes' && isset( $gpp['slideshow_enabled'])  && $gpp['slideshow_enabled'] == 'yes' ) { 
					$args= array(
						'post_type' => 'post',
						'category_name' => 'featured',
						'posts_per_page'=> 5
					);
					$feat_query = new WP_Query( $args );
					
					if($feat_query->have_posts()):
				?>
						<div class="flexslider">
					        <ul class="slides">	
								<?php while ( $feat_query->have_posts() ) : $feat_query->the_post(); ?>
									<li>
										<?php 
											$thumb = get_post_thumbnail_id(get_the_ID()); 
											$attachment = wp_get_attachment_image_src($thumb,'slider');
											if($attachment)
												echo '<img src='.$attachment[0].' class="attachment-slide" draggable="true" />';
										?>
										<div class="slide-button-wrap container">
											<div class="flex-caption">
												<h2 class="home-slide-title">
													<a href="<?php the_permalink();?>" title="Read all of <?php the_title(); ?>"><?php the_title(); ?></a>
												</h2>
													<?php echo da_custom_excerpt($post);?>
											</div>
										</div>
									</li>
								<?php endwhile; ?>
							</ul> <!-- .slides -->
						</div> <!-- .flexslider -->
				<?php
					endif;
					
					// Reset Post Data
					wp_reset_postdata();
				} //end isset check
			} //end is_home check
		?>
		<div id="controls">
			<a id="show_grid" class="control genericon genericon-draggable" href="javascript:void(0);"><?php _e( 'Show Grid', 'chromatic' ); ?></a>
	        <a id="show_list" class="control genericon genericon-menu" href="javascript:void(0);"><?php _e( 'Show List', 'chromatic' ); ?></a>
		</div>
    <div class="portfolios" style="display:none">

    <?php 
    	$feat = get_term_by( 'name', 'Featured', 'category');
    	$cat_args = array(
    		'taxonomy' => 'category',
    		'term_args' => array(
				'parent' => 0,
				'exclude' => $feat->term_id
			)
		); 

		$categories = apply_filters( 'taxonomy-images-get-terms', $cat_args );
		if ( $categories ) :
        
        foreach($categories as $cat){   
	?>
			<article <?php post_class( 'portfolio' ); ?>>
			    <div class="entry-content">
			        <a href="<?php echo get_category_link( $cat->term_id ); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'chromatic' ), the_title_attribute( 'echo=0' ) ) ); ?>"  rel="bookmark" class="thumb">
						<?php echo wp_get_attachment_image( $cat->image_id);?>
			        </a>
			
			        <div class="entry-text">
			            <header class="entry-header">
				            <span class="banner-bg"></span>
			                <h2 class="entry-title">
			                    <a href="<?php echo get_category_link( $cat->term_id ); ?>" title="<?php echo $cat->name;?>" rel="bookmark">
			                        <?php echo $cat->name; ?>
			                    </a>
			                </h2>							 
			                <p class="entry-meta">
			                    <?php echo $cat->description; ?>
			                </p>
			            </header><!-- .entry-header -->
			            <div class="entry-summary">
			            	<?php
		            			$recent_args = array(
								    'posts_per_page' => 3,
								    'cat' => $cat->term_id,
								    'post_type' => 'post',
								    'post_status' => 'publish',
								 );
		            			$recent_query = new WP_Query( $recent_args );
		            			
		            			if($recent_query->have_posts()):
		            				echo '<ul class="recent-posts-list">';

			            			while ( $recent_query->have_posts() ) : $recent_query->the_post();
								?>
										<li>
											<a href="<?php the_permalink();?>">
									 			<?php 
									 				if ( has_post_thumbnail() ) :
									                	chromatic_post_thumbnail();
													else : ?>
										                <img src="<?php echo get_template_directory_uri(); ?>/images/no-image-<?php echo chromatic_image_orientation(); ?>.png" class="wp-post-image" alt="<?php _e( 'Set a Featured Image', 'chromatic'); ?>" />
									            <?php 
									            	endif; 
									            ?>
											</a>
									            <div class="post-info">
										            <h4>
												 		<a href="<?php the_permalink();?>"><?php the_title();?></a>
										            </h4>
										            	<?php echo da_custom_excerpt($post);?>
									            </div>
									 	</li>
								<?php
			            			endwhile;
								echo '</ul>';
		            			endif; //ecnd if have posts
		            			// Reset Post Data
		            			wp_reset_postdata();
							?>	
			               </div>
			        </div><!-- .entry-text -->
			
			    </div><!-- .entry-content -->
			    <footer class="entry-meta clearfix" style="bottom: 0px; opacity: 1;">					
				    <div class="left">
				    </div>
				    <div class="right">
				    	<a href="<?php echo get_category_link( $cat->term_id ); ?>" title="<?php echo $cat->name;?>" rel="bookmark">
							Browse more posts in the <?php echo $cat->name; ?> Category &raquo;
			            </a>
				    </div>
				</footer>
			</article>
           

        <?php 
        	} //end foreach
			endif; //end cat check 
		?>

    </div><!-- .portfolios -->
</section><!-- #primary -->

<?php get_footer(); ?>