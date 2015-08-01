<?php
get_header(); ?>

<section id="primary" class="portfolios">
	<div id="content" role="main">

	<?php if ( have_posts() ) : ?>
		<?php global $post; $post_id = $post-> ID; ?>
		<header class="page-header">
			<h1 class="page-title">
				<?php printf( __( 'Archives: %s', 'chromatic' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
			</h1>
			<div id="controls">
				<a id="show_grid" class="control genericon genericon-draggable" href="javascript:void(0);"><?php _e( 'Show Grid', 'chromatic' ); ?></a>
                <a id="show_list" class="control genericon genericon-menu" href="javascript:void(0);"><?php _e( 'Show List', 'chromatic' ); ?></a>
			</div>
		</header>

		<?php rewind_posts(); ?>

		<div id="content-inner">

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'portfolio' ); ?>

              <?php endwhile; ?>

		</div><!-- #content-inner -->

		<?php chromatic_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', 'chromatic' ); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'chromatic' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-0 -->

	<?php endif; ?>

	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>