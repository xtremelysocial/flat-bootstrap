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
 * @uses xsbf_admin_header_style()
 * @uses xsbf_admin_header_image()
 *
 * @package flat-bootstrap
 */
if ( ! function_exists( 'xsbf_custom_header_setup' ) ) :
function xsbf_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'xsbf_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '555555',
		'width'                  => 1600,
		'height'                 => 200,
		'flex-width'             => true,
		'flex-height'            => true,
		'header-text'            => true,
		'wp-head-callback'       => 'xsbf_header_style',
		'admin-head-callback'    => 'xsbf_admin_header_style',
		'admin-preview-callback' => 'xsbf_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'xsbf_custom_header_setup' );
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
	if ( HEADER_TEXTCOLOR == $header_text_color AND ! display_header_text() ) 
		return;

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
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
}
endif; // xsbf_header_style

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * This function is NOT used by the Customizer, just the stand-alone header upload screen.
 * Since the front-end CSS is not loaded in Admin, all the heading styles need to be 
 * inlined here to match the front-end CSS, including the image, h1, and h2 styles. This
 * function does NOT need to handle hiding or displaying text as that is handled by core
 * WordPress.
 *
 * @see xsbf_custom_header_setup().
 */
if ( ! function_exists( 'xsbf_admin_header_style' ) ) :
 function xsbf_admin_header_style() {
	$header_image = get_header_image();
?>
	<style type="text/css" id="xsbf-admin-header-css">
	/* This should match the CSS for the custom header */
	.appearance_page_custom-header #headimg {
		border: none;
		min-height: 200px;
		padding-left: 20px;
	}

	#headimg h1 {
		font: bold 41px/45px Raleway, Arial, 'Helvetica Neue', sans-serif;
		margin: 55px 0 2px;
	}
	#headimg h1 a {
		text-decoration: none;
	}
	#headimg h2 {
		font: 300 24px/26px Raleway, Arial, 'Helvetica Neue', sans-serif;
	}

	<?php // If text color not overriden, use default link color ?>
	<?php if ( HEADER_TEXTCOLOR == get_header_textcolor() ) : ?>
	#headimg h1 a {
		color: #16a085 !important;
	}
	#headimg h1 a:hover,
	#heading h1 a:active,
	#heading h1 a:focus {
		color: #19b798 !important;
	}
	<?php // Otherwise, set the link color to what the user selected ?>
	<?php else : ?>
	#headimg h1 a {
		color: <?php get_header_textcolor(); ?> !important;
	}	
	#headimg h1 a:hover,
	#headimg h1 a:active,
	#headimg h1 a:focus {
		opacity: 0.75;
	}
	<?php endif; ?>

	</style>
<?php
}
endif; // ! function_exists

/**
 * Output markup to be displayed on the Appearance > Header admin panel.
 *
 * This callback overrides the default markup displayed there.
 *
 * This needs to output the HTML that ties to the inline CSS above to style the custom
 * header image, site title, and tagline.
 *
 * @return void
 */
if ( ! function_exists( 'xsbf_admin_header_image' ) ) :
function xsbf_admin_header_image() {
	?>
	<div id="headimg" style="background: url(<?php header_image(); ?>) no-repeat scroll top; background-size: 1600px auto;">
	<div id="headimg">
		<?php $style = ' style="color:#' . get_header_textcolor() . ';"'; ?>
		<div class="home-link">
			<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="#"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="desc" class="displaying-header-text"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></h2>
		</div>
	</div>
<?php 
}
endif; // ! function_exists
