<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HealthSource
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'hs' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div id="header-grid">
			
			
			<div class="site-branding">

				<div class="logo-container">
					<?php the_custom_logo(); ?>
				</div>
				
				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><a href="<?php get_home_url(); ?>"><?php echo $description; /* WPCS: xss ok. */ ?></a></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->
				
			<div class="site-header-links">

				<div class="site-link-header">
					<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu' ) ); ?>
				</div>

				<div class="site-search-header">	
					<?php get_search_form(); ?>
				</div>

				<div class="site-navigation-header">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle btn btn-block" aria-controls="primary-menu" aria-expanded="false">Navigation</button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
			</div><!--.site-header-links-->

		</div><!--#header-grid-->
	</header><!-- #masthead -->

