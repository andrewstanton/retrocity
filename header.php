<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Retrocity
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">	
		<div class="container">	
						
			<div class="row">
				<div class="col-md-auto">
					<div class="logo-container">
						<a href="<?php echo get_home_url(); ?>" title="<?php echo get_bloginfo();?> Home Page">
							<img src="<?php echo get_template_directory_uri() . '/imgs/logo.png';?>"
								alt="<?php echo bloginfo('name');?>"/>
						</a>
					</div>
				</div>
				<div class="col-md">
					<div class="header-top">
					<?php
						if(has_nav_menu('social')){
							wp_nav_menu( array( 'theme_location' => 'social', 'menu_id' => 'social-menu' ) ); 
						}
					?>
					</div>
					<div class="header-bottom">
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle btn btn-block" aria-controls="primary-menu" aria-expanded="false">
								<i class="fas fa-bars"></i> Navigation
							</button>
							<?php
								wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );
							?>
						</nav><!-- #site-navigation -->
					</div>
				</div><!--col-->
			</div><!--row-->

		</div><!--container-->
	
	</header><!-- #masthead -->

