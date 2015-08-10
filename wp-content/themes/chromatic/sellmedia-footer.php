<?php
/**
 * The template for displaying posts footers
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */
?>

<footer class="entry-meta entry-meta-sellmedia clearfix"<?php if ( is_front_page() ) { ?> style="display:none"<?php } ?>>

    <?php do_action( 'chromatic_before_meta' ); ?>

    <div class="left">
			<?php sell_media_item_buy_button( $post->ID, 'text', 'Buy' ); ?>
    </div>

    <div class="right">
		<a id="like-<?php the_ID(); ?>" class="like-count genericon genericon-medium genericon-star" href="#" <?php chromatic_liked_class(); ?>>
            <?php chromatic_post_liked_count(); ?>
        </a>
    </div>

    <?php do_action( 'chromatic_after_meta' ); ?>

</footer><!-- #entry-meta -->