<?php
/**
 * Retrocity Theme Customizer
 *
 * @package Retrocity
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hs_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	$wp_customize->add_setting( 'hs_facebook' , array(
		'default' => 'http://facebook.com/{your facebook page}',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_setting( 'hs_twitter' , array(
		'default' => 'http://twitter.com/{your twitter page}',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_setting( 'hs_instagram' , array(
		'default' => 'http://instagram.com/{your instagram page}',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'hs_facebook',
		array(
			'label' => __( 'Facebook', 'hs' ),
			'type' => 'text',
						'section' => 'title_tagline'
						)
	));
	
	$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'hs_twitter',
		array(
			'label' => __( 'Twitter', 'hs' ),
			'type' => 'text',
						'section' => 'title_tagline'
						)
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'hs_instagram',
			array(
				'label' => __( 'Instagram', 'hs' ),
				'type' => 'text',
							'section' => 'title_tagline'
							)
		));

}
add_action( 'customize_register', 'hs_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hs_customize_preview_js() {
	wp_enqueue_script( 'hs_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hs_customize_preview_js' );



