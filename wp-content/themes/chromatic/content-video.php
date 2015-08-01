<?php
/**
 * The template for displaying posts in the Video Post Format on index and archive pages
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
    <div class="post-format-content">
     <?php
		$video = get_post_meta($post->ID, '_format_video_embed', true);
		echo $video; ?>
    </div>

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

    <?php get_template_part( 'entry', 'footer' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->