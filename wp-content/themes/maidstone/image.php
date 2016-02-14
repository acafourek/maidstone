<?php
	//redirect all attachment page requests to the post it's connected to
if($post->post_parent === 0)
	wp_redirect($post->guid);  //no parent so redirect to image file
else
	wp_redirect(get_permalink($post->post_parent));
	
exit;