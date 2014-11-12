<?php
/**
 * Theme: Flat Bootstrap
 * 
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package flat-bootstrap
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function xsbf_jetpack_setup() {
	
	global $xsbf_theme_options;

	// Enable responsive video if Jetpack plugin is active
	add_theme_support( 'jetpack-responsive-videos' );

	// Enable support for the Testimonials custom post type Note we haven't 
	// included any special styling, just handle displaying the pages.
	if( ! empty ( $xsbf_theme_options['testimonials']) ) {
		add_theme_support( 'jetpack-testimonial' );
	 }

	// Enable infinite scroll	
	add_theme_support( 'infinite-scroll', array(
		//'type'			 => 'click',
		'container' 	 => 'main',
		'footer_widgets' => array(
			'sidebar-2', // Footer
			'sidebar-4', // Page Bottom
		),		
		'footer'    	 => 'page',
	) );
}
add_action( 'after_setup_theme', 'xsbf_jetpack_setup' );

/**
 * Allow excerpts on Jetpack portfolio entries
 */
add_action('init', 'xsbf_jetpack_portfolio_add_excerpt', 100);
function xsbf_jetpack_portfolio_add_excerpt()
{
	add_post_type_support('jetpack-portfolio', 'excerpt');
}

/**
 * Remove Jetpack sharing (sharedaddy) from excerpt.
 */
function xsbf_remove_sharedaddy() {
    remove_filter( 'the_excerpt', 'sharing_display', 19 );
}
add_action( 'loop_start', 'xsbf_remove_sharedaddy' );