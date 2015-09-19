<?php
/**
 * parallax-one Theme Customizer
 *
 * @package parallax-one
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function parallax_beard_customize_register( $wp_customize ) {
	/********************************************************/
	/************ LATEST NEWS OPTIONS  **************/
	/********************************************************/
	
	$wp_customize->add_setting( 'parallax_one_latest_news_limit_post', array(
		'default' => 2,
		'sanitize_callback' => 'parallax_one_sanitize_text',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'parallax_one_latest_news_limit_post', array(
		'label'    => esc_html__( 'Total posts', 'parallax-one' ),
		'section'  => 'parallax_one_latest_news_section',
		'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 2
	));
}
add_action( 'customize_register', 'parallax_beard_customize_register' );
