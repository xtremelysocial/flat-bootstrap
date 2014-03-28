<?php
/**
 * Theme: Flat Bootstrap
 * 
 * Theme Functions, includes, etc.
 *
 * @package flat-bootstrap
 */

/**
 * Theme options. Can override in child theme. For theme developers, this is array so 
 * you can add these items to the customizer and store them all as a single options entry.
 * 
 * Parameters:
 * background_color - Hex code for default background color without the #. eg) ffffff
 * content_width - Only for determining "full width" image. Actual width in Bootstrap.css.
 * 		1170 for screens over 1200px resolution, otherwise 970.
 * embed_video_width - Sets the width of videos that use the <embed> tag. This defaults
 * 		to the smallest width of content with a sidebar before the sidebar collapses.
 *		The height is automatically set at a 16:9 ratio unless overridden.
 * embed_video_height - Leave empty to automatically set at a 16:9 ratio to the width
 * post_formats - WordPress extra post formats. i.e. 'aside', 'image', 'video', 'quote',
 * 		'link'
 * touch_support - Whether to load touch support for carousels (sliders)
 * fontawesome - Whether to load font-awesome font set or not
 * bootstrap_gradients - Whether to load Bootstrap "theme" CSS for gradients
 * navbar_classes - One or more of navbar-default, navbar-inverse, navbar-fixed-top, etc.
 * image_keyboard_nav - Whether to load javascript for using the keyboard to navigate
 		image attachment pages
 */
$defaults = array(
	'background_color' 		=> 'f2f2f2',
	'content_width' 		=> 1170,
	'embed_video_width' 	=> 600,
	'embed_video_height' 	=> null, // i.e. calculate it automatically
	'post_formats' 			=> null,
	'touch_support' 		=> true,
	'fontawesome' 			=> true,
	'bootstrap_gradients' 	=> false,
	'navbar_classes'		=> 'navbar-default navbar-static-top',
	'image_keyboard_nav' 	=> true
);
if ( isset ( $theme_options ) AND is_array ( $theme_options ) AND ! empty ( $theme_options ) ) {
	$theme_options = wp_parse_args( $theme_options, $defaults );
} else {
	$theme_options = $defaults;
}

// Plugins expect this as discreet variable, so set it
$content_width = $theme_options['content_width'];

/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
if ( ! function_exists( 'xsbf_setup' ) ) :
function xsbf_setup() {

	global $theme_options;

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails on posts and pages. As of WordPress v2.9.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 640, 360, $crop = true );

	// This theme uses wp_nav_menu() in two locations. As of WordPress v3.0.
	register_nav_menus( array(
		'primary' 	=> __( 'Header Menu', 'flat-bootstrap' ),
		'footer' 	=> __( 'Footer Menu', 'flat-bootstrap' ),
	) );

	// This feature outputs HTML5 markup for the comment forms, search forms and 
	// comment lists. As of WordPress v3.6.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );
	
	// Add editor CSS to style the WordPress visual post / page editor. Ours mainly
	// pulls in all of our front-end CSS.
	add_editor_style( '/css/editor-style.css' );

	// Setup the WordPress core custom background feature. As of WordPress v3.4. This 
	// theme is full-width up to 1600px, so background will only show when user's
	// screen is wider than that.
	add_theme_support( 'custom-background', apply_filters( 'xsbf_custom_background_args', array(
			'default-color' => $theme_options['background_color'],
			'default-image' => '',
		) ) );

	// Enable support for Post Formats. Note we haven't included any special styling. 
	// Look at TwentyEleven theme for this.  As of WordPress v3.1.
	if( ! empty ( $theme_options['post_formats']) ) {
		add_theme_support( 'post-formats', $theme_options['post_formats'] );
	 }

	// Make theme available for translation. Translations can be filed in the /languages/
	// directory. If you want to translate this theme, please contact me!
	load_theme_textdomain( 'flat-bootstrap', get_template_directory() . '/languages' );

} // end function
add_action( 'after_setup_theme', 'xsbf_setup' );
endif; // end ! function_exists

/**
 * Register widgetized areas
 */
if ( ! function_exists('xsbf_widgets_init') ) :
function xsbf_widgets_init() {

	// Put sidebar first as this is standard in almost all WordPress themes
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'flat-bootstrap' ),
		'id'            => 'sidebar-1',
		'description' 	=> __( 'Main sidebar (right or left)', 'flat-bootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Put footer next as most themes put them here. Default # columns is 3.
	register_sidebar( array(
		'name' 			=> __( 'Footer', 'flat-bootstrap' ),
		'id' 			=> 'sidebar-2',
		'description' 	=> __( 'Optional site footer widgets. Add 1-4 widgets here to display in columns.', 'flat-bootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget col-sm-4 clearfix %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h2 class="widget-title">',
		'after_title' 	=> '</h2>',
	) );

	// Page Top (After Header) Widget Area. Single column.
	register_sidebar( array(
		'name' 			=> __( 'Page Top', 'flat-bootstrap' ),
		'id' 			=> 'sidebar-3',
		'description' 	=> __( 'Optional section after the header. This is a single column area that spans the full width of the page.', 'flat-bootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix"><div class="container">',
		'before_title' 	=> '<h2 class="widget-title">',
		'after_title' 	=> '</h2>',
		'after_widget' 	=> '</div><!-- container --></aside>',
	) );

	// Page Bottom (Before Footer) Widget Area. Single Column.
	register_sidebar( array(
		'name' 			=> __( 'Page Bottom', 'flat-bootstrap' ),
		'id' 			=> 'sidebar-4',
		'description' 	=> __( 'Optional section before the footer. This is a single column area that spans the full width of the page.', 'flat-bootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix"><div class="container">',
		'before_title' 	=> '<h2 class="widget-title">',
		'after_title' 	=> '</h2>',
		'after_widget' 	=> '</div><!-- container --></aside>',
	) );

} //end function
add_action( 'widgets_init', 'xsbf_widgets_init' );
endif; // end ! function_exists

/**
 * Load CSS Styles and Javascript Files
 */
if ( ! function_exists('xsbf_scripts') ) :
function xsbf_scripts() {

	global $theme_options;

	/* STYLESHEETS */
	
	// Load our custom version of Bootsrap CSS. Can easily override in a child theme.
	wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '3.1.0', 'all' );
	wp_enqueue_style( 'bootstrap');

	// If desired, load up the bootstrap-theme CSS for a full gradient look. Note you'll
	// need to style other theme elements to match.
	if ( $theme_options['bootstrap_gradients'] ) {
		wp_register_style('bootstrap-theme', get_template_directory_uri() . '/bootstrap/css/bootstrap-theme.min.css', array(), '3.1.0', 'all' );
		wp_enqueue_style( 'bootstrap-theme');
	}
	
	// Our base WordPress CSS that handles default margins, paddings, etc.
	wp_register_style('theme-base', get_template_directory_uri() . '/css/theme-base.css', '', '20140217', 'all' );
	wp_enqueue_style( 'theme-base');

	// Our base theme CSS that adds colored sections and padding.
	wp_register_style('theme-flat', get_template_directory_uri() . '/css/theme-flat.css', array('bootstrap'), '20140217', 'all' );
	wp_enqueue_style( 'theme-flat');

	// Add font-awesome support	
	if ( isset ( $theme_options['fontawesome'] ) AND $theme_options['fontawesome'] ) {
		wp_register_style('font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), '4.0.3', 'all' );
		wp_enqueue_style( 'font-awesome');
	}

	// This theme's stylesheet, which contains the theme-specific CSS for coloring
	// content header, footer, etc.
	wp_enqueue_style( 'xtremelysocial-style', get_stylesheet_uri() );

	/* JAVASCRIPT */

	// Bootsrap core javascript. Load from CDN. Update version#'s after testing.
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '3.1.0', true );

	// ONLY for single posts and pages, load javascript for touch carousels and smooth
	// scrolling.
	if ( is_singular() ) {
		wp_enqueue_script( 'theme', get_template_directory_uri() . '/js/theme.js', array('jquery', 'jquerymobile'), '20140217', true );

		// jquery mobile script is a custom download with ONLY "touch" functions.
		if ( $theme_options['touch_support'] ) {
			wp_enqueue_script( 'jquerymobile', get_template_directory_uri() . '/jquerymobile/jquery.mobile.custom.min.js', array('jquery'), '1.4.0', true );
		}
	}

	// Optional script from _S theme to allow keyboard nvigation through image pages
	if ( $theme_options['image_keyboard_nav'] AND is_singular() AND wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20120202' );
	}
	
	// For single pages or posts, add javascript to reply inline
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// For IE8 or older, load HTML5 compatibility files
	preg_match ( '|MSIE\s([0..9]*)|', $_SERVER['HTTP_USER_AGENT'], $browser );
	if ( $browser AND $browser[1] < 9 ) {
		wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/html5/html5shiv.js', null, '3.7.0' );
		wp_enqueue_script( 'respond', get_template_directory_uri() . '/html5/respond.min.js', null, '1.4.2' );
	}

} // end function
add_action( 'wp_enqueue_scripts', 'xsbf_scripts' );
endif; // end ! function_exists

/**
 * LOAD OUR REQUIRED AND OPTIONAL INCLUDE FILES FOR VARIOUS THEME FEATURES
 */
if ( ! function_exists('xsbf_load_includes') ) :
function xsbf_load_includes() {

	/**
	 * REQUIRED INCLUDE FILES
	 */

	// Custom template tags for this theme. This is needed for sure.
	require_once get_template_directory() . '/inc/template-tags.php';

	// Functions not related to template tags. This is needed for sure.
	require_once get_template_directory() . '/inc/theme-functions.php';

	//Overide the standard WordPress nav menu with Bootstrap divs, data attributes, and CSS
	require_once get_template_directory() . '/inc/bootstrap-navmenu.php';

	/**
	 * OPTIONAL INCLUDE FILES
	 */
 
	// Implement the WordPress Custom Header feature. Optional.
	include_once get_template_directory() . '/inc/custom-header.php';

	// WordPress Theme Customizer. Optional.
	include_once get_template_directory() . '/inc/customizer.php';

	// Custom functions that act independently of the theme templates. Optional.
	include_once get_template_directory() . '/inc/extras.php';

	// Jetpack compatibility file to handle endless posts. Optional.
	include_once get_template_directory() . '/inc/jetpack.php';

	// Recommend plugins that compliment this theme. Optional.
	include_once get_template_directory() . '/inc/xsbf-plugin-recommendations.php';

} // end function
xsbf_load_includes();
endif; // end ! function_exists
