<?php
/**
 * The template for displaying posts in the Quote Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
        <div class="entry-summary">
        	<?php do_action( 'chromatic_before_content' ); ?>
        	<?php the_excerpt(); ?>
        	<?php do_action( 'chromatic_after_content' ); ?>
        </div><!-- .entry-summary -->
	<?php else : ?>
    	<div class="entry-content">
    		<?php do_action( 'chromatic_before_content' ); ?>
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'chromatic' ) ); ?>
            <?php
                $quote_name = get_post_meta($post->ID, '_format_quote_source_name', true);
                $quote_url = get_post_meta($post->ID, '_format_quote_source_url', true);
            ?>
            <?php if ( isset( $quote_name ) && $quote_name <> '') { ?>
                <p class="quote-author"><?php if(isset($quote_url) && $quote_url <> '') { ?><a href="<?php echo $quote_url; ?>">&mdash; <?php echo $quote_name; ?></a>
            <?php } else { ?>
                &mdash; <?php echo $quote_name; ?>
            <?php } ?>
                </p>
            <?php } ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'chromatic' ), 'after' => '</div>' ) ); ?>
            <?php do_action( 'chromatic_after_content' ); ?>
        </div><!-- .entry-content -->
    <?php endif; ?>

    <?php get_template_part( 'entry', 'footer' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->