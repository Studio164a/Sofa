<?php
/**
 * Core functions and definitions for Sofa Theme.
 *
 * @package 	Sofa
 */

require_once( 'inc/class-sofa-theme.php' );

/**
 * Start the theme. 
 */
sofa_get_theme();

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

/**
 * Define whether we're in debug mode. 
 *
 * This is set to false by default. If set to true, 
 * scripts and stylesheets are NOT cached or minified 
 * to make debugging easier. 
 */
if ( ! defined( 'SOFA_DEBUG' ) ) {
	define( 'SOFA_DEBUG', false );
}

/**
 * Return the one true instance of the Sofa_Theme.
 * 
 * @return 	Sofa_Theme
 * @since 	1.0.0
 */
function sofa_get_theme() {
	return Sofa_Theme::get_instance();
}