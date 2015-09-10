<?php

/**
 *	Enqueue Styles
 */
if( !function_exists( 'pbeard_enqueue_styles' ) ) {
	add_action( 'wp_enqueue_scripts', 'pbeard_enqueue_styles' );
	function pbeard_enqueue_styles() {
	    wp_enqueue_style( 'pbeard_style', esc_url( get_template_directory_uri() ) . '/style.css', array('parallax-one-style') );

	    //===========================cdx
		wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
	    //===========================cdx
	}
}


/**
 *	Enqueue Scripts
 */
if( !function_exists( 'accountantlaw_enqueue_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'accountantlaw_enqueue_scripts' );
	function accountantlaw_enqueue_scripts() {
		wp_enqueue_script( 'pbeard_scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array(), '1.0', true );
	}
}