<?php
/**
 * Theme: Flat Bootstrap
 * 
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package flat-bootstrap
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link. Not used.
 */
/*
add_filter( 'wp_page_menu_args', 'xsbf_page_menu_args' );
function xsbf_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
*/

/**
 * Adds custom classes to the array of body classes.
 */
if ( ! function_exists( 'xsbf_body_classes' ) ) :
add_filter( 'body_class', 'xsbf_body_classes' );
function xsbf_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds classes for various sizes of featured images. Our theme overrides the 
	// custom header with a large featured image.
	if ( has_post_thumbnail() ) {
		$classes[] = 'featured-image';

		global $post, $content_width;
		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
		$image_width = $featured_image[1];
		if ( $content_width AND $image_width >= $content_width ) {
			if ( is_home() ) {
				$classes[] = 'has-cover-image';
			} else {
				$classes[] = 'has-section-image';
			} //endif is_home
		} //endif $content_width

	// If custom header and not overridden, then add class for that
	} elseif ( get_header_image() ) {
		$classes[] = 'has-header-image';
	} //endif has_post_thumbnail

	return $classes;
}
endif; // end ! function_exists

/**
 * Filter in a link to a content ID attribute for the next/previous image links on 
 * image attachment pages
 */
if ( ! function_exists( 'xsbf_enhanced_image_navigation' ) ) :
add_filter( 'attachment_link', 'xsbf_enhanced_image_navigation', 10, 2 );
function xsbf_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
endif; // end ! function_exists
