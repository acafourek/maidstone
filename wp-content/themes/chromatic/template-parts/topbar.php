<?php
$topbar_left = is_active_sidebar( 'topbar-left' );
$topbar_right = is_active_sidebar( 'topbar-right' );

if ( !$topbar_left && !$topbar_right )
	return;

// Display Topbar
?>

<div id="topbar" class="grid-stretch invert-typo">
	<div class="grid">
		<div class="grid-row">
			<div class="grid-span-12">

				<div class="table table-fixed">
					<?php if ( $topbar_left ): ?>
						<div id="topbar-left" class="table-cell-mid">
							<?php dynamic_sidebar( 'topbar-left' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( $topbar_right ): ?>
						<div id="topbar-right" class="table-cell-mid">
							<?php dynamic_sidebar( 'topbar-right' ); ?>
						</div>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>
</div>