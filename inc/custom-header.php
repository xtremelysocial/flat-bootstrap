<?php
/**
 * Theme: Flat Bootstrap
 * 
 * Implements the WordPress Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package flat-bootstrap
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses xsbf_header_style()
 *
 * @package flat-bootstrap
 */
if ( ! function_exists( 'xsbf_custom_header_setup' ) ) :
add_action( 'after_setup_theme', 'xsbf_custom_header_setup' );
function xsbf_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'xsbf_custom_header_args', array(
		//'default-image'          => '',
		'default-text-color'     => '555555',
		/*'width'                  => 1600,
		'height'                 => 200,*/
		'default-image' 		=> get_template_directory_uri() . '/images/headers/briefcase.jpg',
		'width' 				=> 1600,
		'height' 				=> 700, //large: home 700, other 400; mobile home 480, other 340 mobile; images are 900
		'flex-width'             => true,
		'flex-height'            => true,
		'header-text'            => true,
		'wp-head-callback'       => 'xsbf_header_style'
	) ) );

	//The %2$s references the child theme directory (ie the stylesheet directory), use 
	// %s to reference the parent directory.
	register_default_headers( array(
		'abstract' => array(
			'url'           => '%s/images/headers/abstract.jpg',
			'thumbnail_url' => '%s/images/headers/abstract-thumbnail.jpg',
			'description'   => __( 'Abstract', 'flat-bootstrap' )
		),
		'book' => array(
			'url'           => '%s/images/headers/book.jpg',
			'thumbnail_url' => '%s/images/headers/book-thumbnail.jpg',
			'description'   => __( 'Book', 'flat-bootstrap' )
		),
		'briefcase' => array(
			'url'           => '%s/images/headers/briefcase.jpg',
			'thumbnail_url' => '%s/images/headers/briefcase-thumbnail.jpg',
			'description'   => __( 'Briefcase', 'flat-bootstrap' )
		),
		'camera' => array(
			'url'           => '%s/images/headers/camera.jpg',
			'thumbnail_url' => '%s/images/headers/camera-thumbnail.jpg',
			'description'   => __( 'Camera', 'flat-bootstrap' )
		),
		'city' => array(
			'url'           => '%s/images/headers/city.jpg',
			'thumbnail_url' => '%s/images/headers/city-thumbnail.jpg',
			'description'   => __( 'City', 'flat-bootstrap' )
		),
		'desk' => array(
			'url'           => '%s/images/headers/desk.jpg',
			'thumbnail_url' => '%s/images/headers/desk-thumbnail.jpg',
			'description'   => __( 'Desk', 'flat-bootstrap' )
		),
		'guitar' => array(
			'url'           => '%s/images/headers/guitar.jpg',
			'thumbnail_url' => '%s/images/headers/guitar-thumbnail.jpg',
			'description'   => __( 'Guitar', 'flat-bootstrap' )
		),
		'notepad' => array(
			'url'           => '%s/images/headers/notepad.jpg',
			'thumbnail_url' => '%s/images/headers/notepad-thumbnail.jpg',
			'description'   => __( 'Notepad', 'flat-bootstrap' )
		),
		'skyline' => array(
			'url'           => '%s/images/headers/skyline.jpg',
			'thumbnail_url' => '%s/images/headers/skyline-thumbnail.jpg',
			'description'   => __( 'Skyline', 'flat-bootstrap' )
		),
	) );
	
}
endif; //end ! function_exists

if ( ! function_exists( 'xsbf_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * This function handles BOTH previewing in the customizer as well as the actual display
 * of the header in the front-end. This function ONLY needs to handle hiding or displaying
 * the site title and custom header text color. All other styles are from the front-end 
 * CSS.
 *
 * @see xsbf_custom_header_setup().
 */
function xsbf_header_style() {

	// get_header_textcolor() returns 'blank' if hiding site title and tagline or returns
	// any hex color value. HEADER_TEXTCOLOR is always the default color.
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	if ( HEADER_TEXTCOLOR == $header_text_color AND ! display_header_text() ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css" id="custom-header-css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		/*.site-branding {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}*/
		.site-title {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
		.navbar-default .navbar-brand {
		  color: #16a085;
		}
		.navbar-default .navbar-brand:hover,
		.navbar-default .navbar-brand:focus {
		  color: #19b798;
		}		
		.navbar-brand {
			position: relative;
			clip: auto;
		}
	<?php
		// If the user has set a custom color for the text use that
		elseif ( HEADER_TEXTCOLOR != $header_text_color ) :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
		.site-title a:hover,
		.site-title a:active,
		.site-title a:focus {
			opacity: 0.75;
		}
	<?php endif; ?>

	<?php if ( display_header_text() ) : ?>
		.navbar-brand {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php endif; ?>
	</style>
	<?php
} //endfunction xsbf_header_style

endif; // ! function_exists
