<?php
/**
 * Theme: Flat Bootstrap
 * 
 * Implements the WordPress Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

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
 * @see xsbf_custom_header_setup().
 */
function xsbf_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
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
		/*.navbar-brand {
			position: relative;
			clip: auto;
		}*/
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
 * @see xsbf_custom_header_setup().
 */
if ( ! function_exists( 'xsbf_admin_header_style' ) ) :
 function xsbf_admin_header_style() {
	$header_image = get_header_image();
?>
	<style type="text/css" id="xsbf-admin-header-css">
	.appearance_page_custom-header #headimg {
		border: none;
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		<?php
		if ( ! empty( $header_image ) ) {
			echo 'background: url(' . esc_url( $header_image ) . ') no-repeat scroll top; background-size: 1600px auto;';
		} ?>
		padding: 0 20px;
	}
	#headimg .home-link {
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		margin: 0 auto;
		max-width: 1040px;
		<?php
		if ( ! empty( $header_image ) || display_header_text() ) {
			echo 'min-height: 200px;';
		} ?>
		width: 100%;
	}

	<?php // Hide site title and tagline if user asked for that ?>
	<?php if ( ! display_header_text() ) : ?>
	#headimg h1,
	#headimg h2 {
		position: absolute !important;
		clip: rect(1px 1px 1px 1px); /* IE7 */
		clip: rect(1px, 1px, 1px, 1px);
	}
	<?php endif; ?>

	#headimg h1 {
		font: bold 41px/45px Raleway, Arial, 'Helvetica Neue', sans-serif;
		margin: 25px 0 11px;
	}
	#headimg h1 a {
		text-decoration: none;
	}
	#headimg h2 {
		font: 300 24px/26px Raleway, Arial, 'Helvetica Neue', sans-serif;
		margin: 10px 0 25px;
		/*text-shadow: none;*/
	}
	.default-header img {
		max-width: 230px;
		width: auto;
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
 * @return void
 */
if ( ! function_exists( 'xsbf_admin_header_image' ) ) :
function xsbf_admin_header_image() {
	?>
	<div id="headimg" style="background: url(<?php header_image(); ?>) no-repeat scroll top; background-size: 1600px auto;">
		<?php $style = ' style="color:#' . get_header_textcolor() . ';"'; ?>
		<div class="home-link">
			<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="#"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="desc" class="displaying-header-text"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></h2>
		</div>
	</div>
<?php 
}
endif; // ! function_exists
