<?php
/**
 * The template used for displaying products ont he shop page and the embedded tooltips
 *
 * @package Sela
 */
?>
<article id="post-product-<?php the_ID(); ?>" class="child-page">
		<?php
			
			$prod_title = get_field('product_name');
			$title = ($prod_title == '' ? get_the_title() : $prod_title);
			
			$prod_link = get_field('product_link');

			
			$imgs = array();
			if(has_post_thumbnail()){
				$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');	
				$imgs[] = $thumb[0];
			}
			$product_imgs = get_field('product_images');
			if(is_array($product_imgs) && count($product_imgs) > 0 ){
				foreach($product_imgs as $prod_img){
					$imgs[] = $prod_img['images'];
				}
			}
		?>
		<div class="entry-thumbnail">
			<?php
				foreach($imgs as $img){
					echo '<div class="item">';
					
					if($prod_link)
						echo '<a target="_blank" href="'.$prod_link.'" title="Link to learn more and purchase '.$title.'"><img src="'.$img.'" alt="Link to learn more and purchase '.$title.'"/></a>';
					else
						echo '<img src="'.$img.'" alt="Link to learn more and purchase '.$title.'" />';
					echo '</div>';
				}
			?>
		</div><!-- .entry-thumbnail -->
	
		<header class="entry-header">
			<h1 class="entry-title">
				<?php											
					if($prod_link)
						echo '<a target="_blank"  href="'.$prod_link.'" title="Link to learn more and purchase '.$title.'">'.$title.'</a>';
					else
						echo $title;
				?>
		</header><!-- .entry-header -->
	
		<div class="entry-summary">
			<?php the_content(); ?>
		</div><!-- .entry-summary -->							
	</article><!-- #post-## -->	