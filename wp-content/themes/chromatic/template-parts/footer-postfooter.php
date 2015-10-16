<?php
$site_info = chromaticfw_get_option( 'site_info' );
$site_info = str_replace( "<!--year-->" , date_i18n( 'Y' ) , $site_info );
if ( !empty( $site_info ) ) :
?>
	<div id="post-footer" class="grid-stretch">
		<div class="grid">
			<div class="grid-row">
				<div class="grid-span-12">
					<p class="credit small">
						<?php
						if ( trim( $site_info ) == '<!--default-->' ) {
							printf(
								/* Translators: 1 is current year, 2 is site name/link, 3 is Theme name/link, 4 is WordPress name/link */
								__( 'Copyright &#169; %1$s %2$s. Designed using %3$s. Powered by %4$s.', 'chromatic' ), 
								date_i18n( 'Y' ), chromaticfw_get_site_link(), chromaticfw_get_wp_theme_link( apply_filters( 'chromaticfw_footer_wp_theme_link', 'https://wordpress.org/themes/chromatic/' ) ), chromaticfw_get_wp_link()
							);
						} else {
							echo $site_info;
						} ?>
					</p><!-- .credit -->
				</div>
			</div>
		</div>
	</div>
<?php
endif;
?>