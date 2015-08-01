
<?php
/**
 * The main loop content template file.
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */
?>




<?php do_action( 'chromatic_before_article' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio' ); ?>>
    <div class="entry-content">

        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'chromatic' ), the_title_attribute( 'echo=0' ) ) ); ?>"  rel="bookmark" class="thumb">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php chromatic_post_thumbnail(); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/no-image-<?php echo chromatic_image_orientation(); ?>.png" class="wp-post-image" alt="<?php _e( 'Set a Featured Image', 'chromatic'); ?>" />
            <?php endif; ?>
        </a>

        <div class="entry-text hide" style="display:none;">
            <header class="entry-header">
                <?php do_action( 'chromatic_before_title' ); ?>
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'chromatic' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <p class="entry-meta">
                    <?php chromatic_pub_date(); ?> <span class="fancy"><?php _e( 'by', 'chromatic' ); ?></span> <?php the_author_posts_link(); ?>
                </p>
                <?php do_action( 'chromatic_after_title' ); ?>
            </header><!-- .entry-header -->

            <div class="entry-summary" style="display:none;">
                <?php do_action( 'chromatic_before_content' ); ?>
                <?php the_excerpt(); ?>
                <p class="entry-meta hide">
				<?php if( get_post_type() == "portfolio" ) { ?>
					<?php
						$chromatic_date = get_post_meta( get_the_ID(), '_chromatic_date', true );
						$chromatic_client = get_post_meta( get_the_ID(), '_chromatic_client', true );
						$chromatic_clienturl = get_post_meta( get_the_ID(), '_chromatic_clienturl', true ); ?>

                        <?php
                        if( $chromatic_client != "" ) {
                            echo '<span class="fancy">Client:</span> ';
                            if( $chromatic_clienturl != "" ) { echo '<a href="' . $chromatic_clienturl . '">'; }
                                echo $chromatic_client;
                            if( $chromatic_clienturl != "" ) { echo "</a>"; }
                            echo "<br />";
                        }
                        if( $chromatic_date != "" ){
                            echo '<span class="fancy">Date:</span> ' . $chromatic_date . "<br />";
                        }

						echo get_the_term_list( $post->ID, 'pcategory', '<span class="fancy">Categories:</span> ', ', ', '' )."</br>";
						echo get_the_term_list( $post->ID, 'ptag', '<span class="fancy">Tags:</span> ', ', ', '' ); ?>

					<?php } else { ?>
						<span class="fancy">
						<?php _e( 'Categories:', 'chromatic' ); ?></span> <?php the_category( ', ' ); ?> <?php the_tags( '&bull; <span class="fancy">Tags: </span>', ', ', '' ); ?>
					<?php } ?>
				</p>

			   <?php do_action( 'chromatic_after_content' ); ?>
            </div><!-- .entry-summary -->

            <?php get_template_part( 'entry', 'footer' ); ?>
        </div><!-- .entry-text -->

    </div><!-- .entry-content -->

</article>

<?php do_action( 'chromatic_after_article' ); ?>