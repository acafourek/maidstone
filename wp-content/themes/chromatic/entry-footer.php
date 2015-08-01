<?php
/**
 * The template for displaying posts footers
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */
?>

<footer class="entry-meta clearfix"<?php if ( is_front_page() ) { ?> <?php } ?>>

    <?php do_action( 'chromatic_before_meta' ); ?>

	<?php if( is_singular() && get_post_type() == "portfolio" ) { ?>
		<?php
			$chromatic_date = get_post_meta( get_the_ID(), '_chromatic_date', true );
			$chromatic_client = get_post_meta( get_the_ID(), '_chromatic_client', true );
			$chromatic_clienturl = get_post_meta( get_the_ID(), '_chromatic_clienturl', true ); ?>
			<div>
			<?php
			if( $chromatic_client != "" ) {
				echo "<strong>" . __( 'Client:', 'chromatic' ) . "</strong> ";
				if( $chromatic_clienturl != "" ) { echo '<a href="' . $chromatic_clienturl . '">'; }
					echo $chromatic_client;
				if( $chromatic_clienturl != "" ) { echo "</a>"; }
				echo "<br />";
			}
			if( $chromatic_date != "" ){ echo "<strong>" . __( 'Date:', 'chromatic' ) . "</strong> " . $chromatic_date."<br />"; }

			echo get_the_term_list( $post->ID, 'pcategory', '<strong>Categories:</strong> ', ', ', '' )."<br />";
			echo get_the_term_list( $post->ID, 'ptag', '<strong>Tags:</strong> ', ', ', '' ); ?>
			</div>
		<?php } elseif( is_singular() && get_post_type() == "post" ){ ?>
			<div>
			<?php echo "Categories: " . get_the_category_list( __( ', ', 'chromatic' ) ); ?><br />
			<?php the_tags(); ?>

			</div>
	<?php } ?>

    <div class="left">
		<?php if( (get_post_type( $post->ID ) == "post" || is_search()) && is_single() ) { ?>
			<?php   chromatic_pub_date(); ?>
		<?php } ?>
        <?php if ( is_singular() ) : ?>
            <?php edit_post_link( __( 'Edit', 'chromatic' ), '<span class="edit-link">', '</span>' ); ?>
        <?php endif; ?>

    </div>

    <div class="right">
        <?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?><span class="genericon genericon-comment"></span>
            <?php comments_popup_link( __( 'Leave a comment', 'chromatic' ), __( '1', 'chromatic' ), __( '%', 'chromatic' ), 'comments-link' ); ?>
        <?php endif; ?>
		<a id="like-<?php the_ID(); ?>" class="like-count genericon genericon-medium genericon-star" href="#" <?php chromatic_liked_class(); ?>>
            <?php chromatic_post_liked_count(); ?>
        </a>
    </div>

    <?php do_action( 'chromatic_after_meta' ); ?>

</footer><!-- #entry-meta -->