<?php
/**
 * Theme: Flat Bootstrap
 * 
 * This template is called from other page and archive templates to display the content
 * header, which is essentially the header for the page. If there is a wide featured
 * image, it displays that with the page title and subtitle/description overlaid on it.
 * Otherwise, it just displays the text on a colored background.
 *
 * @package flat-bootstrap
 */
?>

<?php if ( have_posts() ) : ?>

	<?php 
	/**
	 * GET AND/OR INITIALIZE VARIABLES WE NEED
	 */
	 global $xsbf_theme_options;
	 global $content_width;
	 $custom_header_location = isset ( $xsbf_theme_options['custom_header_location'] ) ? $xsbf_theme_options['custom_header_location'] : 'content-header';
	 //$custom_header_location = 'content-header'; /* force Flat Bootstrap to display header image below navbar */
	 $image_url = $image_width = $image_type = null;
	 $title = $subtitle = $description = null;
	 
	/**
	 * FIRST CHECK FOR A FEATURED IMAGE BECAUSE IF ITS WIDE ENOUGH, IT WILL OVERRIDE ANY
	 * CUSTOM HEADER IMAGE.
	 */
	if ( is_singular() AND has_post_thumbnail() ) {
		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		$image_width = $featured_image[1];
	} elseif ( is_home() AND ! is_front_page() ) {
		$home_page = get_option ( 'page_for_posts' );
		if ( $home_page ) $post = get_post( $home_page );
		if ( $post ) {
			$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
			$image_width = $featured_image[1];
		}
	}

	/**
	 * IF THAT FEATURED IMAGE IS WIDE ENOUGH (>1170px), THEN USE IT AS A CONTENT HEADER
	 */
	// If that featured image is full-width (>1170px wide), then use it
	if ( $content_width AND $image_width >= $content_width ) {
		$image_url = $featured_image[0];
		$image_type = 'featured';

	/**
	 * OTHERWISE, IF WE HAVE A CUSTOM HEADER IMAGE, THEN USE THAT
	 */
	// If custom header not already displayed (via header.php), then use it here
	} elseif ( $custom_header_location != 'header' AND get_header_image() ) {
		$image_url = get_header_image();
		$image_type = 'header';
		$image_width = get_custom_header()->width;
	} //endif $image_width

	/* 
	 * GET THE TEXT TO DISPLAY ON THE IMAGE OR CONTENT HEADER SECTION 
	 */

	// If on the front page and there is no custom header or featured image, do nothing
	//if ( $custom_header_location == 'header' AND is_front_page() AND $image_type == 'header') {
	//if ( ( $custom_header_location == 'header' AND is_front_page() AND $image_type == 'header') OR ( is_home() AND is_front_page() ) ) {
	if ( $custom_header_location != 'content-header' AND is_front_page() AND ! $image_type ) {
		// Do nothing
	
	// Otherwise, if on "home" page and header image, then display it with the site title
	// and description
	} elseif ( $custom_header_location != 'header' AND is_front_page() AND $image_type == 'header' ) {
		$title = get_bloginfo('name');
		$subtitle = get_bloginfo('description');

	// However, if the "home" page is set to the blog and there isn't a header image,
	// then don't do anything.
	} elseif ( is_home() AND is_front_page() ) {
		// Do nothing
	
	// If home page is static and we are on the blog page
	} elseif ( is_home() AND ! is_front_page() ) {
		$home_page = get_option ( 'page_for_posts' );
		if ( $home_page ) $post = get_post( $home_page );
		if ( $post ) {
			$title = $post->post_title;
		} else {
			$title = __( 'Blog', 'flat-bootstrap' );
		}
		$subtitle = get_post_meta( $home_page, '_subtitle', $single = true );

	// Otherwise if we have a featured image, try to get text from the image
	} elseif ( $image_type == 'featured' ) {
		$attachment_post = get_post( get_post_thumbnail_id() );
		if ( $attachment_post AND ( $attachment_post->post_excerpt OR $attachment_post->post_content ) ) {
			$title = $attachment_post->post_title;
			$subtitle = $attachment_post->post_excerpt;
			$description = $attachment_post->post_content;
		} elseif ( is_front_page() ) {
			$title = get_bloginfo('name');
			$subtitle = get_bloginfo('description');
		} else {
			$title = get_the_title();
			$subtitle = get_post_meta( get_the_ID(), '_subtitle', $single = true );
		}

	// If search, include the search term in the title
	} elseif ( is_search() ) {
		$title = sprintf( __( 'Search Results for: %s', 'flat-bootstrap' ), '<span>' . get_search_query() . '</span>' );

	// Could use get_the_archive_title() here, but it adds "Category: "
	} elseif ( is_category() ) {
		$title = single_cat_title( null, false );
 		$subtitle = get_the_archive_description();

	// Could use get_the_archive_title() here, but it adds "Tag: "
	} elseif ( is_tag() ) {
		$title = single_tag_title( null, false );
 		$subtitle = get_the_archive_description();

	// Handle archive pages. These functions as of WordPress v4.1.0. Note that Jetpack
	// portfolios and testimonial titles are now handled in /inc/jetpack.php.
 	} elseif ( is_archive() ) {
 		$title = get_the_archive_title();
 		$subtitle = get_the_archive_description();

	// Handle regular pages and posts. Note that subtitle is a custom field we added to
	// this theme. is_singular() handles single pages, posts, and even custom post types.
	} elseif ( is_page() OR is_singular() ) {
 		$title = get_the_title();
		$subtitle = get_post_meta( get_the_ID(), '_subtitle', $single = true );

	// This should never happen, but this is here to catch issues
	} else {
		$title = get_the_title();
		$subtitle = __( 'We don\'t know what page type this is. Check content-header.php.', 'flat-bootstrap' );

	} //endif is_home()

	/* 
	 * IF WE FOUND A LARGE FEATURED IMAGE OR CUSTOM HEADER, THEN DISPLAY IT AS A BACK-
	 * GROUND WITH THE TEXT AS AN OVERLAY.
	 */
	if ( $image_url ) :

		// Set larger image size on front page
		if ( is_front_page() ) {
			$image_class = 'cover-image';
			$overlay_class = 'cover-image-overlay';
		} else {
			$image_class = 'section-image';
			$overlay_class = 'section-image-overlay';
		}
						
		// Display the image and text
		?>
		<header class="content-header-image">
			<div class="<?php echo $image_class; ?>" style="background-image: url('<?php echo $image_url; ?>')">
				<div class="<?php echo $overlay_class; ?>">
				<h1 class="header-image-title"><?php echo $title; ?></h1>
				<?php if ( $subtitle ) echo '<h2 class="header-image-caption">' . $subtitle . '</h2>'; ?>
				<?php if ( $description ) echo '<p class="header-image-description">' . $description . '</p>'; ?> 

				<?php				
				// Only for static home page, show a scroll down icon
				if ( is_front_page() ) {
					echo '<div class="spacer"></div>';
					echo '<a href="#pagetop" class="scroll-down smoothscroll"><span class="glyphicon glyphicon-chevron-down"></span></a>';
				}
				?>
				
				</div><!-- .cover-image-overlay or .section-image-overlay -->
			</div><!-- .cover-image or .section-image -->
		</header><!-- content-header-image -->

		<a id="pagetop"></a>
		<?php 
		if ( ! is_page_template( 'page-landing.php' ) ) {	
			get_sidebar( 'pagetop' );
		}
		?>

	<?php
	/* 
	 * OTHERWISE IF NO IMAGE, DISPLAY THE PAGE TOP WIDGET AREA, THEN THEN JUST DISPLAY
	 * TEXT WITH "CONTENT-HEADER" CSS STYLE
	 */
	elseif ( $title ) :
	?>
		<a id="pagetop"></a>
		<?php 
		if ( ! is_page_template( 'page-landing.php' ) ) {	
			get_sidebar( 'pagetop' );
		}
		?>
		<header class="content-header">
		<div class="container">
		<h1 class="page-title"><?php echo $title; ?></h1>
		<?php if ( $subtitle ) printf( '<h3 class="page-subtitle taxonomy-description">%s</h3>', $subtitle ); ?>
		</div>
		</header>

	<?php endif; // $image_url ?>

<?php endif; // have_posts() ?>
