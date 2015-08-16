<?php
/**
 * The template used for displaying child page on the grid template.
 *
 * @package Sela
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'child-page' ); ?>>
	<?php if ( '' != get_the_post_thumbnail() ) : ?>
	<div class="entry-thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'sela' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="<?php the_ID(); ?>">
			<?php the_post_thumbnail( 'sela-grid-thumbnail' ); ?>
		</a>
	</div><!-- .entry-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php echo da_custom_excerpt($post); ?>
	</div><!-- .entry-summary -->
</article><!-- #post-## -->
