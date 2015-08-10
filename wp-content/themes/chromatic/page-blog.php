<?php
/*
Template Name: Blog
 */

/**
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */

get_header(); ?>

<section id="primary" class="clearfix">

    <?php

		$options = get_option( 'chromatic_options' );
		$blogcat = "";		
		if( isset( $gpp['chromatic_blog_cat'] ) && "" != $gpp['chromatic_blog_cat'] ) {
			foreach( $gpp['chromatic_blog_cat'] as $catid ) {
				$blogcat .= get_cat_ID( $catid ) . ",";
			}
		}		
		$blogcat = rtrim( $blogcat, "," );
		
        global $paged, $more;
        $more = 0;
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
        $args = array(
            'paged' => $paged,
			'cat' => $blogcat
        );

        $temp = $wp_query;
        $wp_query = null;

        $wp_query = new WP_Query();
        $wp_query->query( $args );

        ?>
        <div id="content" role="main">
            <div id="content-inner">
            <?php if ( have_posts() ) : ?>
			<header class="page-header">
            	<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
                <?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>
                    <?php $do_not_duplicate = $post -> ID; ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php esc_attr( sprintf( __( 'Permalink to %s', 'chromatic' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						</header>
						<div class="entry-content">
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'chromatic' ) ); ?>
						</div>

						<?php get_template_part( 'entry', 'footer' ); ?>
					</article>

                <?php endwhile; chromatic_content_nav( 'nav-below' ); wp_reset_query(); $wp_query = $temp; ?>

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
        </div><!-- .content -->
    </div><!-- .inner -->
</section><!-- #primary -->

<?php get_footer(); ?>