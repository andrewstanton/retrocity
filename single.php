<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Retrocity
 */

get_header(); ?>


	<?php
		get_template_part( 'template-parts/banner' );
	?>


	<main id="main" class="site-main" role="main">

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content-single', get_post_format() );

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->

<?php
get_footer();
