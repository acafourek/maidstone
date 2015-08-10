<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header">
		<?php do_action( 'chromatic_before_title' ); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php
  			$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
  			if ($children) { ?>
  				<ul class="subpage">
  					<?php echo $children; ?>
  				</ul>
  		<?php } ?>
  	<?php do_action( 'chromatic_after_title' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php do_action( 'chromatic_before_content' ); ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'chromatic' ), 'after' => '</div>' ) ); ?>
            <?php if ( is_singular() ) { ?>
                <?php edit_post_link( __( 'Edit', 'chromatic' ), '<p class="edit-link">', '</p>' ); ?>
            <?php } ?>
        <?php do_action( 'chromatic_after_content' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
