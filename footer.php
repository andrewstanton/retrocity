<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Retrocity
 */

?>



	<footer id="colophon" class="site-footer">

	<div class="container">
		<div class="footer-nav">
				<?php 
				if(has_nav_menu('footer')){
					wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) );
				} ?>
			</div>

			<div class="site-info">
				&copy; <?php echo date('Y'); ?> 
				<?php echo get_bloginfo(); ?>
			</div><!-- .site-info -->

	</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
