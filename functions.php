<?php
/**
 * Core functions and definitions for Visionary Theme.
 *
 * @package 	Visionary
 */

require_once( 'inc/class-visionary-theme.php' );

/**
 * Start the theme. 
 */
visionary_get_theme();

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
if ( ! defined( 'VISIONARY_DEBUG' ) ) {
	define( 'VISIONARY_DEBUG', false );
}

/**
 * Return the one true instance of the Visionary_Theme.
 * 
 * @return 	Visionary_Theme
 * @since 	1.0.0
 */
function visionary_get_theme() {
	return Visionary_Theme::get_instance();
}