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
	?>
	
	<h1 class="page-title">
		<?php echo the_title(); ?>
	</h1>

	<?php
	// The Loop
	if ( $latest_posts_query->have_posts() ) { ?>
	
	<div class="index-post-area section">

		<div class="post-home-section">
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
	
	</div>

	<div class="p-4">
		<div class="wrapper">
			<div class="responsive-embed-bandcamp">
				<iframe style="border: 0;" src="https://bandcamp.com/EmbeddedPlayer/album=2237554796/size=large/bgcol=ffffff/linkcol=0687f5/tracklist=false/artwork=small/transparent=true/" seamless><a href="http://retrocity.bandcamp.com/album/mixtape">Mixtape by Retrocity</a></iframe>
			</div>
		</div>
	</div>
	
	<?php
		/* Restore original Post Data */
		wp_reset_postdata();
	} // endif
	?>

