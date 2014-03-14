<?php
/**
 * Theme: Flat Bootstrap
 * 
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package bootstrap-flat
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function xsbf_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'xsbf_jetpack_setup' );
