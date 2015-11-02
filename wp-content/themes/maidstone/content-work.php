<?php
/**
 * The template used for displaying child page on the work template.
 *
 * @package Sela
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'child-page published-work' ); ?>>
	<?php if ( '' != get_the_post_thumbnail() ) : ?>
	<div class="entry-thumbnail">
		<?php
			if($link = get_post_meta(get_the_ID(),'meta_external_link',true))
				echo '<a href="'.$link.'" title="Browse Maidstone Buttermilk content by Dakota Arkin published on '.get_the_title().'">';
				
			the_post_thumbnail( 'sela-grid-thumbnail' );

			if($link)
				echo '</a>';
		?>
	</div><!-- .entry-thumbnail -->
	<?php endif; ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php edit_post_link( __( 'Edit', 'sela' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
