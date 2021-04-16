<section class="comment-box">

	<?php if(post_password_required()) { return; } ?>

	<?php if(have_comments()) : ?>
	<h4 id="comments"><?php comments_number(__('0 comments', 'ace'), __('1 Comment', 'ace'), __('% Comments', 'ace')); ?> <?php _e('on', 'ace'); ?> <?php the_title(); ?></h4>

	<?php the_comments_navigation(); ?>

	<ol class="commentlist">
		<?php wp_list_comments(array('style' => 'ul', 'short_ping' => true, 'avatar_size' => 42)); ?>
	</ol>

	<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php if(!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
		<p class="no-comments"><?php _e('Comments are closed.', 'ace'); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</section>
