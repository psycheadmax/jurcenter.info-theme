<?php
/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage Jurcenter.info
 * @since Jurcenter.info 1.0
 */

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}
remove_filter('the_content', 'wpautop');
function enqueue_styles() {
	wp_enqueue_style( 'jurcenter.info-style', get_stylesheet_uri());
// 	wp_register_style('font-style', 'http://fonts.googleapis.com/css?family=Oswald:400,300');
// 	wp_enqueue_style( 'font-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
	wp_register_script('html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
	wp_enqueue_script('html5-shim');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');