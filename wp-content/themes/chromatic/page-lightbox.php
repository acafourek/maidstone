<?php
/*
 Template Name: Lightbox
 *
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="sell-media-archive" class="sell-media">
		<div id="content" class="site-content" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="page-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<div class="entry-content">
					<?php the_content() ?>
					<?php echo do_shortcode( '[sell_media_lightbox]' ); ?>
					<?php edit_post_link( __( 'Edit', 'chromatic' ), '<p class="edit-link">', '</p>' ); ?>
				</div><!-- .entry-content -->
			</article>
		</div><!-- #content .site-content -->
	</div>
</div><!-- #primary .content-area -->

<?php get_footer(); ?>