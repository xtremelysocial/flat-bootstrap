<?php 
/**
 * Theme: Flat Bootstrap
 * 
 * Functions that handle theme features not directly related to tags used in templates
 *
 * Includes functions to handle full-width pages, images with captions, variable column
 * footer, etc.
 *
 * @package flat-bootstrap
 */

/* Helper function to determine if a page or post template is full width or not.
 * This function is used to add container tags and handle images on full-width pages
 * differently.
 */
if ( ! function_exists('xsbf_is_fullwidth') ) :
function xsbf_is_fullwidth() {

	/* for pages, check the page template */
	if ( is_page() AND ( + 
		is_page_template( 'page-fullpostsnoheader.php' ) OR + 
		is_page_template( 'page-fullwidth-noheader.php' ) OR + 
		is_page_template( 'page-fullwidth.php' ) OR +
		is_page_template( 'page-fullwithposts.php' ) OR +
		is_page_template( 'page-fullwithsubpages.php' )
		)
		) {
			return true;

	/* for posts, check the single template */
	} elseif ( is_single() ) {
		$current_template = get_single_template();
		$fullwidth_template = get_query_template( 'single-fullwidth' );
		if ( $current_template and $current_template == $fullwidth_template ) {
			return true;
		}
	}
	return false;
}
endif; // end ! function_exists

/*
 * This function adds a container div to full-width pages right after the page content
 * so that other plugin's content is contained. Note that this is run with a priority of
 * 5 (default is 10) so it runs before other plugins.
 */
if ( ! function_exists('xsbf_add_container') ) :
add_filter( 'the_content', 'xsbf_add_container', 5, 1 ); 
function xsbf_add_container( $content ) {

	// If the page template is full-width. Do it on all posts just in case its full
	// width as well.
	//if ( xsbf_is_fullwidth() OR is_single() ) {
	if ( xsbf_is_fullwidth() ) {
		$content .= '<div id="after-content" class="after-content">'
			.'<div class="container ">';
	}
	return $content;
}
endif; // end ! function_exists

/*
 * This function ends the container div on full-width pages Note that this is run with a
 * priority of 1999 (default is 10) so it runs after other plugins. If you run into a
 * stubborn plugin, you can make this as high of a number as you need to.
 */
if ( ! function_exists('xsbf_end_container') ) :
add_filter( 'the_content', 'xsbf_end_container', 1999, 1 ); 
function xsbf_end_container( $content ) {

	// If the page template is full-width. Do it on all posts just in case its full
	// width as well.
	//if ( xsbf_is_fullwidth() OR is_single() ) {
	if ( xsbf_is_fullwidth() ) {
		$content .= '</div><!-- .after-content -->'
			.'</div><!-- .container -->';
	}
	return $content;
}
endif; // end ! function_exists

/**
 * Filter the single post template and change to full-width if custom field
 * 'fullwidth' is true.
 */
if ( ! function_exists( 'xsbf_single_template' ) ) :
add_filter( 'single_template', 'xsbf_single_template' );
function xsbf_single_template( $single_template ) {

	// If this post is full-width then use that template. Note locate_template
	// first looks for it in a child theme, then in the parent directory.
	$fullwidth = get_post_meta( get_the_ID(), '_fullwidth', $single = true );
	if ( $fullwidth ) {
    	$single_template = locate_template( array ( 'single-fullwidth.php' ) );
    }
    return $single_template;
}
endif; // end ! function_exists

/**
 * Filter the image caption shortcode for full-width images, so we can float the caption
 * over the image. Code largely stolen from core WordPress wp-includes/media.php.
 */
if ( ! function_exists( 'xsbf_img_caption' ) ) :
add_filter('img_caption_shortcode', 'xsbf_img_caption', 10, 3 );
function xsbf_img_caption ( $null, $attr, $content ) {

	global $content_width;

	// Extract the passed-in arguments to individual variables
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));

	// If image is not full-width, then don't mess with it.
	//if ( 1 > (int) $width OR empty ( $caption ) OR $content_width > $width )
	if ( 1 > (int) $width OR $content_width > $width ) return null;
	
	// If we aren't on a full-width page or post, then don't mess with it either
	if( ! xsbf_is_fullwidth() ) return null;

	// Strip off all but the <img> tag and parse it
	$content_img = strip_tags ( $content, '<img>' );
	$image_tag = simplexml_load_string ( $content_img );

	// If tag malformed, then bail
	if ( ! $image_tag OR ! $image_tag['src'] ) return null;

	// Ok, let's build the HTML to match our "cover" or "section" images
	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

	// If image height over 600px, then set the div to "cover"
	//if ( $image_tag['height'] >= 600 ) $div_class = "cover-image";
	//else $div_class = "section-image";
	$div_class = "section-image";
	
	// Since using absolute positioning, need a <p> tag if no other tags.
	$caption = str_ireplace ( array ( '<br />', '<br>' ), '', $caption ); 
	if ( $caption == strip_tags ( $caption, '<h1><h2><p>' ) ) {
		$caption = '<p>' . $caption . '</p>';
	}

	return '<div ' . $id . 'class="' . $div_class . ' ' . $image_tag['class'] . '"'
		. ' style="background-image: url(\'' . $image_tag['src'] . '\');'
		. $image_tag['style'] . ' ">'
		. '<div class="' . $div_class . '-overlay">'
		. $caption
		. '</div></div>';	
}
endif; // end ! function_exists

/*
 * Limit embedded content (video) width to fit within the theme. Width can be overriden
 * with theme options. Height is automatically calculated at a 16:9 ratio unless its 
 * also overidden in the theme options.
 * TO-DO: Consider replacing all this with fitvid.js to automatically resize
 */
add_filter( 'embed_defaults', 'xsbf_embed_defaults' );
function xsbf_embed_defaults ( $defaults ) {
	global $xsbf_theme_options;
	if ( $xsbf_theme_options['embed_video_width'] ) {
		$defaults['width'] = $xsbf_theme_options['embed_video_width'];
		if ( $xsbf_theme_options['embed_video_height'] ) {
			$defaults['height'] = $xsbf_theme_options['embed_video_height'];
		} else {
			$defaults['height'] = ceil ( $defaults['width'] * 9 / 16 );
		}
	}
	return $defaults;
}

/*
 * Remove stupid WordPress <p></p> tags and comments. This just traps the easy ones.
 * TO-DO: Expand this to catch all possible scenarios. 
 */
if ( ! function_exists( 'xsbf_filter_ptags' ) ) :
add_filter('the_content', 'xsbf_filter_ptags');
function xsbf_filter_ptags ( $content ) {
/*
	$content = str_ireplace( '<p></p>', '', $content );
	$content = preg_replace( '/<!--(.|\s)*?-->/', '', $content );
	$content = str_ireplace( '<p> </p>', '', $content );
    //$content = preg_replace( array ( '/<p><\/p>/', '/<p><!--.*--><\/p>/', '/<p><!--.*-->/', '/<p><!--\/.*--><\/p>/' ), '', $content );
*/
	// Remove all comments
	$content = preg_replace( '/<!--(.|\s)*?-->/', '', $content );
	// Remove all <p></p> tags that are empty or only have whitespace between them
	$content = preg_replace( '|<p>(\s)*</p>|', '', $content );
	return $content;
}
endif; // end ! function_exists

/**
 * Add custom section to WordPress post/page editor
 */
if ( ! function_exists( 'xsbf_add_custom_box' ) ) :
add_action( 'add_meta_boxes', 'xsbf_add_custom_box' );
function xsbf_add_custom_box() {
    $screens = array( 'post', 'page' );
    foreach ( $screens as $screen ) {
        add_meta_box(
            'xsbf_options',
            __( 'Additional Post / Page Options', 'flat-bootstrap' ),
            'xsbf_inner_custom_box',
            $screen,
            'normal',
            'high'
        );
    }
}
endif; // end ! function_exists

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
if ( ! function_exists( 'xsbf_inner_custom_box' ) ) :
function xsbf_inner_custom_box( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'xsbf_inner_custom_box', 'xsbf_inner_custom_box_nonce' );

	// Retrieve existing value from the database and use the value for the form.
	$value = get_post_meta( $post->ID, '_subtitle', true );

	echo '<label for="xsbf_post_subtitle">';
	   _e( "Subtitle (displays under the title in the content header)", 'flat-bootstrap' );
	echo '</label> ';
	echo '<textarea id="xsbf_post_subtitle" name="xsbf_post_subtitle" rows="2" cols="80"  class="form-control" style="width: 100%;">'
	. esc_attr( $value ) 
	. '</textarea>';
  	
	// For posts, also add option to set to full-width
	if ( 'post' == $post->post_type ) {
		$value = get_post_meta( $post->ID, '_fullwidth', true );
		$checked = $value ? 'checked' : '';
		
		echo '<input type="checkbox" name="xsbf_post_template" value="xsbf_post_template" ' . $checked . '>';
		echo '<label for="xsbf_post_template">';
		   _e( "Display post full-width (no sidebar)?", 'flat-bootstrap' );
		echo '</label> ';
	} //endif 'post'
}
endif; // end ! function_exists

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
if ( ! function_exists( 'xsbf_save_postdata' ) ) :
add_action( 'save_post', 'xsbf_save_postdata' );
function xsbf_save_postdata( $post_id ) {

	/*
	* We need to verify this came from the our screen and with proper authorization,
	* because save_post can be triggered at other times.
	*/

	// Check if our nonce is set.
	if ( ! isset( $_POST['xsbf_inner_custom_box_nonce'] ) )
	return $post_id;

	$nonce = $_POST['xsbf_inner_custom_box_nonce'];

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $nonce, 'xsbf_inner_custom_box' ) )
	  return $post_id;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
	  return $post_id;

	// Check the user's permissions.
	if ( 'page' == $_POST['post_type'] ) {

	if ( ! current_user_can( 'edit_page', $post_id ) )
		return $post_id;

	} else {

	if ( ! current_user_can( 'edit_post', $post_id ) )
		return $post_id;
	}

	/* OK, its safe for us to save the data now. */
	$post_subtitle = sanitize_text_field( $_POST['xsbf_post_subtitle'] );
	update_post_meta( $post_id, '_subtitle', $post_subtitle );

	if ( 'post' == $_POST['post_type'] ) {
		$post_fullwidth = $_POST['xsbf_post_template'] ? true : false;
		update_post_meta( $post_id, '_fullwidth', $post_fullwidth );
	}
}
endif; // end ! function_exists

/**
 * Add Bootstrap class for thumbnails to user profile pics (avatars)
 */
if ( ! function_exists( 'xsbf_get_avatar' ) ) :
add_filter ('get_avatar', 'xsbf_get_avatar', 10, 5);
function xsbf_get_avatar ( $avatar, $id_or_email, $size, $default, $alt ) {
	$avatar = str_replace ( "avatar-{$size}", "avatar-{$size} thumbnail", $avatar );
	//$avatar = str_replace ( "avatar-{$size}", "avatar-{$size} img-circle", $avatar );
	return $avatar;
}
endif; // end ! function_exists

/**
 * Adjust the number of columns for the footer based on how many widgets were added.
 * This is Bootstrap-specific using col-sm-n.
 */
if ( ! function_exists( 'xsbf_footer_filter' ) ) :
add_filter('xsbf_footer' , 'xsbf_footer_filter' , 10 , 1);
function xsbf_footer_filter( $footer ) {

	/* Find and count all the <aside> tags. One per active widget */
	preg_match_all ( '|<aside[^>]+>(.*)</[^>]+>|U', $footer, $matches );
	$num_widgets = count ( $matches[0] ); 

	// Store a counter so we can add clearfix to the 4 column layout
	static $counter; $counter++;

	// Set the Bootstrap column CSS based on number of widgets. Allow up to 4.
	if ( $num_widgets >= 4 ) {
		$footer = str_ireplace( 'class="widget col-sm-4', 'class="widget col-sm-6 col-lg-3 ', $footer );
		if ( $counter == 2) $footer = str_ireplace( '</aside>', '</aside><div class="clearfix hidden-lg"></div>', $footer );
	} elseif ( $num_widgets == 3 ) {
		// This is already the default, but if default changed then uncomment this
		//$footer = str_ireplace( 'class="widget col-sm-4', 'class="widget col-md-4 ', $footer );
	} elseif ( $num_widgets == 2 ) {
		$footer = str_ireplace( 'class="widget col-sm-4', 'class="widget col-sm-6 ', $footer );
	} else {
		$footer = str_ireplace( 'class="widget col-sm-4', 'class="widget col-sm-12 ', $footer );
	}
    return $footer;
}
endif; // end ! function_exists

/*
 * Add some "quicktag" buttons to the WordPress HTML editor. Note these don't appear in 
 * the visual editor, only when in "text" (HTML) mode.
 */
if ( ! function_exists( 'xsbf_add_quicktags' ) ) :
add_action( 'admin_print_footer_scripts', 'xsbf_add_quicktags' );
function xsbf_add_quicktags() {
    if (wp_script_is('quicktags')){
?>
    <script type="text/javascript">
    QTags.addButton( 'xs_fullwidth', 'fullwidth', '<div class="section bg-gray"><div class="container">', '</div><!-- container --></div><!-- section -->', 'x', 'Section (eg bg-darkgreen, bg-midnightblue)', 1 );
    QTags.addButton( 'xs_featured', 'featured', '<div class="section-featured bg-midnightblue"><div class="container">', '</div><!-- container --></div><!-- section -->', 'y', 'Section (eg bg-darkgreen, bg-midnightblue)', 2 );
    </script>
<?php
    }
}
endif; // end ! function_exists
