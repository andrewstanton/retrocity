<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Retrocity
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-body-content">

		<?php 
			$feat_image = wp_get_attachment_url( get_post_thumbnail_id());
			if($feat_image):
		?>
		
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<div class="entry-image">
				<img src="<?php echo $feat_image; ?>" />
			</div>
		</a>

		<?php endif; ?>
		
		<header class="entry-header">
			<?php hs_the_category_list(); ?>
			<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<span class="post-entry-date">Posted On <?php echo the_date('F d, Y')?></span>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				echo get_the_excerpt();
			?>
		</div><!-- .entry-content -->

		<div class="entry-link">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="more-link">Read More</a>
		</div>

	</div><!--post-body-content-->

</article><!-- #post-## -->
