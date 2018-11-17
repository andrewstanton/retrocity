<?php
/**
 * Retrocity functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Retrocity
 */

if ( ! function_exists( 'hs_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hs_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Retrocity, use a find and replace
	 * to change 'hs' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'hs', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'hs-index', 966, 555, true);
	add_post_type_support( 'page', 'excerpt' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'hs' ),
		'social' => esc_html__( 'Social', 'hs' ),
		'footer' => esc_html__( 'Footer', 'hs'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo
	add_theme_support( 'custom-logo', array(
		'width' => 245,
		'height' => 60,
		'flex-height' => true,
		'flex-width' => true,
	));

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'hs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hs_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hs_content_width', 640 );
}
add_action( 'after_setup_theme', 'hs_content_width', 0 );


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function hs_content_image_sizes_attr( $sizes, $size ) {
	if ( is_singular() ) {
		$width = $size[0];
		if ( 610 <= $width ) {
			$sizes = '(min-width: 990px) 720px, (min-width: 1300px) 610px, 95vw';
		}
		return $sizes;
	}
}
add_filter( 'wp_calculate_image_sizes', 'hs_content_image_sizes_attr', 10, 2 );


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function hs_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_singular() ) {
		$attr['sizes'] = '(min-width: 990px) 720px, (min-width: 1300px) 820px, 95vw';
	} else {
		$attr['sizes'] = '(min-width: 990px) 955px, (min-width: 1300px) 966px, 95vw';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'hs_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Enqueue scripts and styles.
 */
function hs_scripts() {
	//Styles
	wp_enqueue_style( 'hs-main', get_template_directory_uri() . '/style.min.css' );
	
	wp_enqueue_style( 'hs-fa', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css' );

	wp_enqueue_script( 'hs-navigation', get_template_directory_uri() . '/dist/app.min.js', array('jquery'), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'hs_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load SVG icon functions.
 */
require get_template_directory() . '/inc/icon-functions.php';
