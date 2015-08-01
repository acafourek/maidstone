<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Chromatic
 * @since Chromatic 1.0
 */
?><!DOCTYPE html>

<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->

<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php $options = get_option( gpp_get_current_theme_id() . '_options' ); ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="initial-scale=1.0, width=device-width" />
	<meta name="google-site-verification" content="QM1z3ug6vLefjS8nNXhbfuyxaRew_Bsc9FnfzGvk8ao" />
	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged, $gpp;

		wp_title( '|', true, 'right' );

		// Add the blog name.
		bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'chromatic' ), max( $paged, $page ) );

		?>
	</title>
	<?php if ( isset ( $options[ 'chromatic_custom_favicon' ] ) && '' != $options[ 'chromatic_custom_favicon' ] ) : ?>
		<link rel="shortcut icon" href="<?php echo esc_url( $options[ 'chromatic_custom_favicon' ] ); ?>" />
	<?php endif; ?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-16122526-26', 'auto');
	  ga('send', 'pageview');
	
	</script>

</head>

<body lang="en" <?php body_class(); ?>>
<?php $background_image = get_background_image(); ?>
<?php if ( ! empty( $background_image ) ) { ?>
	<div class="parallax-bg" style="background:url('<?php background_image(); ?>')"></div>
<?php } ?>
<?php $thumbOrientation = chromatic_image_orientation(); ?>
<?php $cats = getCategories(); ?>
	<?php do_action( 'chromatic_before_page' ); ?>

	<!-- BeginHeader -->
	<div id="page" class="clearfix hfeed <?php echo $options['chromatic_grids']; ?> portfolio-<?php echo $thumbOrientation; ?>">
	<?php if ( has_nav_menu( 'footer-menu' ) ) wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'menu-footer-menu social clearfix', 'container' => '', ) ); ?>

	    <?php do_action( 'chromatic_before_header' ); ?>
	
		<?php $header_image = get_header_image(); ?>

		<header id="branding" role="banner" <?php if ( ! empty( $header_image ) ) { ?> style="background:url('<?php header_image(); ?>')" <?php } ?>>
			
			<hgroup>
			    	<?php if ( isset( $options['chromatic_logo'] ) && '' != $options['chromatic_logo'] ) : ?>
						<?php if ( isset( $options['chromatic_sidebar'] ) && $options['chromatic_sidebar'] == 'show' ) { ?>
							<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img class="sitetitle" src="<?php echo esc_url( $options['chromatic_logo'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
							</a>
						<?php } else { ?>
			    	<img class="sitetitle sidebar-hidden sidebar-toggle" src="<?php echo esc_url( $options['chromatic_logo'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
						<?php } ?>
			    	<?php endif; ?>
				<h1 id="site-title" class="sidebar-hidden site-title">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h1>
				<h2 id="site-description" class="sidebar-hidden site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>

			<div id="sidebar">
			<nav id="access" role="navigation" class="sidebar-hidden">
	            <h1 class="assistive-text"><?php _e( 'Main menu', 'chromatic' ); ?></h1>
	            <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'chromatic' ); ?>"><?php _e( 'Skip to content', 'chromatic' ); ?></a></div>
			    <?php if ( has_nav_menu( 'primary' ) ) : ?>
		        	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu clearfix' ) ); ?>
		        <?php else : ?>
		        	<ul class="menu clearfix">
		        	<?php
						$args = array(
							'depth'        => 1,
							'title_li'     => '',
							'link_before'  => '',
							'link_after'   => ''
						);
						wp_list_pages( $args );
					?>
					</ul>
		        <?php endif; 
			        $social_links = get_option('hssocial_badges');
		        ?>
		        <ul class="social-profiles clearfix">
			        <?php if ($social_links['hssocial_facebook'])?>
				        <li class="facebook-like"><a href="<?php echo $social_links['hssocial_facebook'];?>" title="Like <?php echo get_bloginfo('name');?> on Facebook"></a></li>
				    <?php if ($social_links['hssocial_twitter'])?>
			        	<li class="twitter-follow"><a href="https://twitter.com/intent/follow?screen_name=<?php echo $social_links['hssocial_twitter'];?>"></a></li>
			       <?php if ($social_links['hssocial_instagram'])?>
			        	<li class="instagram-follow"><a target="_blank" href="<?php echo $social_links['hssocial_instagram'];?>"></a></li>
			        <?php if ($social_links['hssocial_pintrest'])?>
			        	<li class="pintrest-follow"><a target="_blank" href="<?php echo $social_links['hssocial_pintrest'];?>"></a></li>

			        <span class="stretcher"></span>
		        </ul>
	        </nav><!-- #access -->
			</div><!-- #sidebar -->
			<?php if ( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' )) : ?>
					<?php if ( isset( $options['chromatic_footer'] ) && $options['chromatic_footer'] != 'show' ) { ?>
						<div id="widgets-toggle">
							<span class="genericon genericon-collapse toggle-icon"></span>
						</div>
					<?php } ?>
					<span id="widgets-toggle-info"><?php _e('Show footer', 'chromatic'); ?></span>
			<?php endif; ?>
		</header><!-- #branding -->
		<!-- EndHeader -->

	<?php do_action( 'chromatic_after_header' ); ?>