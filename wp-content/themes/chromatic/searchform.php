<?php

echo '<div class="searchbody">';

	echo '<form method="get" class="searchform" action="' . esc_url( home_url( '/' ) ) . '" >';

		echo '<label for="s" class="screen-reader-text">' . __( 'Search', 'chromatic' ) . '</label>';
		echo '<i class="fa fa-search"></i>';
		echo '<input type="text" class="searchtext" name="s" placeholder="' . __( 'Type Search Term...', 'chromatic' ) . '" />';
		echo '<input type="submit" class="submit forcehide" name="submit" value="' . esc_attr( 'Search', 'chromatic' ) . '" />';

	echo '</form>';

echo '</div><!-- /searchbody -->';