<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Retrocity
 */

?>

<div class="section">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="container">

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

        <div class="post-body">

            <?php the_content(); ?>

        </div>

    </div>

</article><!-- #post-## -->

</div>