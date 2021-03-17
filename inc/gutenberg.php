<?php
/**
 * Theme: 	Flat Bootstrap
 * File:	gutenberg.php
 * 
 * Add color pallette and block styling for Gutenberg
 *
 * This loads our blocks and colors css stylesheets
 *
 * @package flat-bootstrap
 */

/**
 * Enable theme support for the new WordPress Editor ("Project Gutenberg").
 */
if ( ! function_exists('xsbf_gutenberg_setup') ) :
add_action( 'after_setup_theme', 'xsbf_gutenberg_setup' );
function xsbf_gutenberg_setup() {

	// Enables alignwide and alignfull options
	add_theme_support( 'align-wide' );
	
	// Enables and loads the stylesheet editor-styles.css (TO-DO: DOUBLE CHECK THIS WORKS)
	add_theme_support( 'editor-styles' );	
	
	// Enable responsive embeds, such as youtube, etc. already built into Gutenberg. Nice!
	add_theme_support( 'responsive-embeds' );
	
	// Load Gutenbergs basic styling
	// TO-DO: ONCE WE FINISH ALL STYLES, CONSIDER REMOVING DEFAULTS?
	add_theme_support( 'wp-block-styles' );

	// Enable support for our color palette in the editor
	add_theme_support( 'editor-color-palette', array(
		array(
			'name' => __( 'White', 'flat-bootstrap' ),
			'slug' => 'white',
			'color' => '#fff',
		),
		array(
			'name' => __( 'Offwhite', 'flat-bootstrap' ),
			'slug' => 'offwhite',
			'color' => '#f2f2f2',
		),
		array(
			'name' => __( 'Light Gray', 'flat-bootstrap' ),
			'slug' => 'lightgray',
			'color' => '#ebebeb',
		),
		array(
			'name' => __( 'Gray', 'flat-bootstrap' ),
			'slug' => 'gray',
			'color' => '#e7e7e7',
		),
		array(
			'name' => __( 'Dark Gray', 'flat-bootstrap' ),
			'slug' => 'darkgray',
			'color' => '#e0e0e0',
		),
		array(
			'name' => __( 'Light Green', 'flat-bootstrap' ),
			'slug' => 'lightgreen',
			'color' => '#1abc9c',
		),
		array(
			'name' => __( 'Dark Green', 'flat-bootstrap' ),
			'slug' => 'darkgreen',
			'color' => '#16a085',
		),
		array(
			'name' => __( 'Bright Green', 'flat-bootstrap' ),
			'slug' => 'brightgreen',
			'color' => '#2ecc71',
		),
		array(
			'name' => __( 'Dark Bright Green', 'flat-bootstrap' ),
			'slug' => 'darkbrightgreen',
			'color' => '#27ae60',
		),
		array(
			'name' => __( 'Yellow', 'flat-bootstrap' ),
			'slug' => 'yellow',
			'color' => '#f1c40f',
		),
		array(
			'name' => __( 'Light Orange', 'flat-bootstrap' ),
			'slug' => 'lightorange',
			'color' => '#f39c12',
		),
		array(
			'name' => __( 'Orange', 'flat-bootstrap' ),
			'slug' => 'orange',
			'color' => '#e67e22',
		),
		array(
			'name' => __( 'Dark Orange', 'flat-bootstrap' ),
			'slug' => 'darkorange',
			'color' => '#d35400',
		),
		array(
			'name' => __( 'Blue', 'flat-bootstrap' ),
			'slug' => 'blue',
			'color' => '#3498db',
		),
		array(
			'name' => __( 'Dark Blue', 'flat-bootstrap' ),
			'slug' => 'darkblue',
			'color' => '#2980b9',
		),
		array(
			'name' => __( 'Midnight Blue', 'flat-bootstrap' ),
			'slug' => 'midnightblue',
			'color' => '#34495e',
		),
		array(
			'name' => __( 'Dark Midnight Blue', 'flat-bootstrap' ),
			'slug' => 'darkmidnightblue',
			'color' => '#2c3e50',
		),
		array(
			'name' => __( 'Purple', 'flat-bootstrap' ),
			'slug' => 'purple',
			'color' => '#9b59b6',
		),
		array(
			'name' => __( 'Dark Purple', 'flat-bootstrap' ),
			'slug' => 'darkpurple',
			'color' => '#8e44ad',
		),
		array(
			'name' => __( 'Red', 'flat-bootstrap' ),
			'slug' => 'red',
			'color' => '#ff7878',
		),
		array(
			'name' => __( 'Bright Red', 'flat-bootstrap' ),
			'slug' => 'brightred',
			'color' => '#e74c3c',
		),
		array(
			'name' => __( 'Dark Red', 'flat-bootstrap' ),
			'slug' => 'darkred',
			'color' => '#c0392b',
		),
		array(
			'name' => __( 'Almost Black', 'flat-bootstrap' ),
			'slug' => 'almostblack',
			'color' => '#2f2f2f',
		),
		array(
			'name' => __( 'Not Quite Black', 'flat-bootstrap' ),
			'slug' => 'notquiteblack',
			'color' => '#222',
		),
		array(
			'name' => __( 'Black', 'flat-bootstrap' ),
			'slug' => 'black',
			'color' => '#000',
		),
	) );
		
	// Enable support for custom font sizes in the editor to match our theme
	// TO-DO: SET THESE NAMES TO BLOCK EDITOR DEFAULTS... JUST CHANGE SIZES
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => __( 'small', 'flat-bootstrap' ),
			'shortName' => __( 'S', 'flat-bootstrap' ),
			'size' => 14, // Match "small" (80% of p)
			'slug' => 'small'
		),
		array(
			'name' => __( 'regular', 'flat-bootstrap' ),
			'shortName' => __( 'M', 'flat-bootstrap' ),
			'size' => 18, // Match p
			'slug' => 'regular'
		),
		array(
			'name' => __( 'medium', 'flat-bootstrap' ),
			'shortName' => __( 'M', 'flat-bootstrap' ),
			'size' => 22, // Match "lead"
			'slug' => 'medium'
		),
		array(
			'name' => __( 'large', 'flat-bootstrap' ),
			'shortName' => __( 'L', 'flat-bootstrap' ),
			'size' => 28, // Match h3
			'slug' => 'large'
		),
		array(
			'name' => __( 'larger', 'flat-bootstrap' ),
			'shortName' => __( 'XL', 'flat-bootstrap' ),
			'size' => 34, // Match h2
			'slug' => 'larger'
		),
		array(
			'name' => __( 'huge', 'flat-bootstrap' ),
			'shortName' => __( 'XXL', 'flat-bootstrap' ),
			'size' => 41, // Match h1
			'slug' => 'huge'
		)
	) );
	
	// Register additional block STYLES
	// TO-DO: BUILD OUT MORE OF THESE
	
	// Image - Bordered (6px radius)
	register_block_style(
		'core/image',
		array(
			'name'         => 'bordered-image',
			'label'        => 'Bordered',
			'style_handle' => 'bordered-image',
		)
	);
	
	// Group - Thin and Thick Bottom Border
	register_block_style(
		'core/group',
		array(
			'name'         => 'thin-bottom-border',
			'label'        => 'Thin Bottom Border',
			'style_handle' => 'thin-bottom-border',
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'         => 'thick-bottom-border',
			'label'        => 'Thick Bottom Border',
			'style_handle' => 'thick-bottom-border',
		)
	);

	// Register additional block PATTERNS
	// TO-DO: BUILD OUT MORE OF THESE
	register_block_pattern( 
		'flat-bootstrap/call-to-action',
    	array(
			'title'       => __( 'Call to Action', 'flat-bootstrap' ),
			//'categories'  => array( 'buttons', 'text' ),
			'description' => _x( 'Colored section with title, text, and a button.', 'Block pattern description', 'flat-bootstrap' ),
			'content'	  => '<!-- wp:group {"align":"full","backgroundColor":"red","textColor":"white"} -->
	<div class="wp-block-group alignfull has-white-color has-red-background-color has-text-color has-background"><div class="wp-block-group__inner-container"><!-- wp:heading {"textAlign":"center","align":"wide","textColor":"white"} -->
	<h2 class="alignwide has-text-align-center has-white-color has-text-color"><strong>Redefining Your Brand</strong></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"white"} -->
	<p class="has-text-align-center has-white-color has-text-color"><strong><em>We help startups define a clear brand identity and digital strategy that will scale as their business grows. </em></strong></p>
	<!-- /wp:paragraph -->

	<!-- wp:button {"borderRadius":5,"backgroundColor":"red","textColor":"white","align":"center","className":"is-style-outline"} -->
	<div class="wp-block-button aligncenter is-style-outline"><a class="wp-block-button__link has-white-color has-red-background-color has-text-color has-background" href="#" style="border-radius:5px">View Case Study</a></div>
	<!-- /wp:button --></div></div>
	<!-- /wp:group -->'
		)
	);
			
} // end function xsbf_gutenberg_setup
endif; // end ! function_exists

/**
 * Enqueue our Gutbenberg CSS script for frontend
 *
 * @since 1.0.0
 */
function xsbf_gutenberg_load_css() {
	wp_enqueue_style(
		'theme-gutenberg', 
		get_template_directory_uri() . '/css/theme-gutenberg.css', 
		array( 'bootstrap', 'theme-base', 'theme-flat' ), 
		filemtime( get_template_directory_uri() . '/css/theme-gutenberg.css' )
	);
	
	add_editor_style( 'css/theme-gutenberg.css' );

}
add_action( 'after_setup_theme', 'xsbf_gutenberg_load_css' );
//add_action( 'wp_enqueue_scripts', 'xsbf_gutenberg_load_css' );
