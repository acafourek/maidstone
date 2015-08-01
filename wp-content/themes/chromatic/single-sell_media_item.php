<?php
/**
 * The Template for displaying all single sell media items.
 *
 * @package Chromatic
 * @since 0.1
 */
get_header(); ?>

<div id="sell-media-single" class="sell-media">
	<div id="content" role="main">

	<?php while ( have_posts() ) : the_post(); ?>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->
		<div class="sell-media-content">
			<div class="chromatic-breadcrumbs">
				<a href="<?php print get_post_type_archive_link( 'sell_media_item' ); ?>"><?php $obj = get_post_type_object( 'sell_media_item' ); echo $obj->rewrite['slug']; ?></a>
				<span class="sep">&raquo;</span>  
				<span class="sm-breadcrumbs-collections">
				<?php
				if ( true == chromatic_sell_media_item_has_taxonomy_terms( $post->ID, 'collection' ) ) {
					echo sell_media_collections( $post->ID ) . '</span>';
				}
				?>
				</span>
				<span class="sep">&raquo;</span> 
				<?php echo the_title( '', false ); ?>
			</div>
			<?php sell_media_item_icon( get_post_meta( $post->ID, '_sell_media_attachment_id', true ), 'large' ); ?>
			<span class="sm-fullscreen genericon genericon-external"></span>
			<div class="item-description"><?php the_content(); ?></div>
			<?php do_action( 'sell_media_single_bottom_hook' ); ?>
		</div>

		<div class="sell-media-meta">
			<?php sell_media_item_buy_button( $post->ID, 'button sell-media-buy-button-success', 'Purchase' ); ?>
			<?php $min_price = sell_media_item_min_price( $post->ID, false ); ?>
			<?php if ( ! empty( $min_price ) ) { ?>
				<div class="sell-media-meta-price">
					<?php _e( 'Starting at', 'sell_media' ); ?>:
					<?php echo sell_media_get_currency_symbol() . $min_price; ?>
				</div>
			<?php } ?>
			<p class="sell-media-lightbox"><a href="javascript:void(0);" title="<?php _e( 'Lightbox', 'sell_media' ); ?>" class="add-to-lightbox" id="lightbox-<?php echo $post->ID; ?>" data-id="<?php echo $post->ID; ?>"><?php _e( 'Save', 'sell_media' ); ?></a></p>
			
			<p class="like">
			<a id="like-<?php the_ID(); ?>" class="like-count genericon genericon-medium genericon-star" href="#" <?php chromatic_liked_class(); ?>>
				<?php chromatic_post_liked_count(); ?></a> <?php _e( ' people like this', 'sell_media' ); ?></p>
				
			<ul class="sell-media-sidebar-item-details">
				<li class="filename"><span class="title"><?php _e( 'File ID', 'sell_media' ); ?>:</span> <?php echo get_the_id(); ?></li>
				<li><span class="title"><?php _e( 'Creator', 'sell_media' ); ?>:</span>
					<?php
						if( true == chromatic_sell_media_item_has_taxonomy_terms( $post->ID, 'creator' ) ) {
							$creators = wp_get_post_terms( $post->ID, 'creator' );
							$creatorlist = "";
							foreach ( $creators as $creator ) {
								$creatorlist .= $creator->name . ", ";
							}
							echo rtrim( $creatorlist, ", " );
						} else {
					?>
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="collection"><?php echo get_the_author(); ?></a>
					<?php } ?>

				<?php if ( true == chromatic_sell_media_item_has_taxonomy_terms( $post->ID, 'collection' ) ) { ?>
					<li class="collections"><span class="title"><?php _e( 'Collections', 'sell_media' ); ?>:</span> <?php sell_media_collections( $post->ID ); ?></li>
				<?php } ?>

				<?php if ( true == chromatic_sell_media_item_has_taxonomy_terms( $post->ID, 'licenses' ) ) { ?>
					<li class="licenses"><span class="title"><?php _e( 'Licenses', 'sell_media' ); ?>:</span>
						<?php
						$licenses = wp_get_post_terms( $post->ID, 'licenses' );
						foreach ( $licenses as $license ) {
							echo $license->name . " ";
						}
						?>
					</li>
				<?php } ?>

				<?php if ( true == chromatic_sell_media_item_has_taxonomy_terms( $post->ID, 'keywords' ) ) { ?>
					<li class="keywords"><span class="title"><?php _e( 'Keywords', 'sell_media' ); ?>:</span> <?php chromatic_sell_media_image_keywords( $post->ID ); ?></li>
				<?php } ?>
			</ul>

			<?php if ( is_active_sidebar( 'sell-media-sidebar' ) ) : ?>
				<aside id="sell-media-sidebar" class="sell-media-sidebar">
					<?php dynamic_sidebar( 'sell-media-sidebar' ); ?>
				</aside>
			<?php endif; ?>
		</div><!-- .sell-media-meta -->

	<?php endwhile; ?>
	</div><!-- #content -->
</div><!-- #sell_media-single .sell_media -->

<?php get_footer(); ?>