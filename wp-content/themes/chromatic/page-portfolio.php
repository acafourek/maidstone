<?php
/*
Template Name: Portfolio
*/
get_header(); ?>

<section id="primary" class="clearfix">
    <div id="content" role="main">

    <?php
    global $paged;
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
    $args = array(
		'post_type'=>'portfolio',
		'paged' => $paged
    );

    $temp = $wp_query;
    $wp_query = null;

    $wp_query = new WP_Query();
    $wp_query->query( $args );

    ?>

	<?php if ( $wp_query->have_posts() ) : ?>

		<header class="page-header clearfix">
			<h1 class="page-title"><?php echo the_title(); ?></h1>
            <div id="controls">
				<a id="show_grid" class="control genericon genericon-draggable" href="javascript:void(0);"><?php _e( 'Show Grid', 'chromatic' ); ?></a>
                <a id="show_list" class="control genericon genericon-menu" href="javascript:void(0);"><?php _e( 'Show List', 'chromatic' ); ?></a>
            </div>
		</header>

        <div class="portfolios" style="display:none">
            <div id="content-inner">
            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                <?php $do_not_duplicate = $post->ID; ?>

    			<?php get_template_part( 'content', 'portfolio' ); ?>

            <?php endwhile;  ?>
    		</div><!-- #content-inner -->
        </div><!-- .portfolios -->
        <?php chromatic_content_nav( 'nav-below' ); ?>
    <?php else : ?>

    	<article id="post-0" class="post no-results not-found">
    		<header class="entry-header">
    			<h1 class="entry-title"><?php _e( 'Nothing Found', 'chromatic' ); ?></h1>
    		</header><!-- .entry-header -->

    		<div class="entry-content">
    			<p><?php _e( 'If you are trying to set Portfolio as a homepage and you are seeing this, you most likely do not have any Portfolio posts. Please go to Portfolios -> Add New in your wp-admin and start creating your portfolios.', 'chromatic' ); ?></p>
    		</div><!-- .entry-content -->

    	</article><!-- #post-0 -->

    <?php endif; wp_reset_query(); ?>

    </div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>