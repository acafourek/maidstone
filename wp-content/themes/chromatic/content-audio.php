<?php
/**
 * The template for displaying posts in the Aside Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php do_action( 'chromatic_before_title' ); ?>
		<?php if ( is_singular() ) { ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php } else { ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php esc_attr( sprintf( __( 'Permalink to %s', 'chromatic' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php } ?>
		<?php do_action( 'chromatic_after_title' ); ?>
	</header><!-- .entry-header -->

    <div class="entry-post-format">
        <?php $audio = get_post_meta($post->ID, '_format_audio_embed', true);  ?>
        <?php if ( isset( $audio ) && '' != $audio ) : ?>
            <div class="entry-attachment">
                <audio controls id="player">
                    <source src="<?php echo $audio; ?>">
                </audio>
            </div>
        <?php else : ?>
            <?php
            // Get attached audio files
            $args = array(
                'numberposts'       => -1,
                'post_type'         => 'attachment',
                'post_mime_type'    => 'audio',
                'post_parent'       => get_the_ID()
            );
            $attachments = get_posts( $args );
            // Reverse array to display them in chronological form instead of reverse chronological
            $attachments = array_reverse( $attachments );
            if ( count( $attachments ) && ! post_password_required() ) : ?>
                <div class="entry-attachment">
                    <audio controls id="player">
                        <?php foreach( $attachments as $attachment ) : ?>
                            <source src="<?php echo wp_get_attachment_url( $attachment -> ID ); ?>">
                        <?php endforeach; ?>
                    </audio>
                </div><!-- .entry-attachment -->
            <?php endif; ?>
        <?php endif; ?>
    </div><!-- .entry-post-format -->

	<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
	<div class="entry-summary">
		<?php do_action( 'chromatic_before_content' ); ?>
		<?php the_excerpt(); ?>
		<?php do_action( 'chromatic_after_content' ); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php do_action( 'chromatic_before_content' ); ?>
        <?php if ( is_singular() ) { ?>
          <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'chromatic' ) ); ?>
        <?php } else { ?>
            <?php chromatic_custom_content(); ?>
        <?php } ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'chromatic' ), 'after' => '</div>' ) ); ?>
		<?php do_action( 'chromatic_after_content' ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

    <?php get_template_part( 'entry', 'footer' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
