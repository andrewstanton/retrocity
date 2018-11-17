<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Retrocity
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hs' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

	<?php
	
	if ( is_front_page() ) {
	
	// Get the 6 latest posts
	$args = array(
		'posts_per_page' => 6
	);

	$latest_posts_query = new WP_Query( $args );

	// The Loop
	if ( $latest_posts_query->have_posts() ) { ?>
	
	<div class="index-post-area section container">

	<?php
		//Posts Put On Home Page
		while ( $latest_posts_query->have_posts() ) {

			$latest_posts_query->the_post();
			
			// Get the standard index page content
			get_template_part( 'template-parts/content', get_post_format() );
			}
		}
	?>
	
	</div>
	
	<?php
		/* Restore original Post Data */
		wp_reset_postdata();
	} // endif
	?>

