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
	 $image_url = $image_width = $image_type = null;
	 $title = $subtitle = $description = null;
	 
	/**
	 * CHECK FOR A WIDE FEATURED IMAGE OR AN UPLOADED CUSTOM HEADER IMAGE
	 */
	 // First get the featured image, if there is one
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

	// If that featured image is full-width (>1170px wide), then use it
	if ( $content_width AND $image_width >= $content_width ) {
		$image_url = $featured_image[0];
		$image_type = 'featured';

	// If custom header not already displayed (via header.php), then use it here
	} elseif ( $custom_header_location != 'header' AND get_header_image() ) {
		$image_url = get_header_image();
		$image_type = 'header';
		$image_width = get_custom_header()->width;
	} //endif $image_width

	/* 
	 * GET THE TEXT TO DISPLAY ON THE IMAGE OR CONTENT HEADER SECTION 
	 */
	 
	// If header image and its already been displayed (via header.php), do nothing
	////if ( is_home() AND is_front_page() AND $custom_header_location == 'header' ) {
	//if ( $custom_header_location == 'header' AND is_front_page() AND ! $image_url ) {
	if ( $custom_header_location == 'header' AND is_front_page() AND $image_type == 'header' ) {
		// Do nothing
	
	// Otherwise, if header image, then display it with the site title and description
	//} elseif ( is_home() AND is_front_page() AND $custom_header_location != 'header' ) {
	} elseif ( $custom_header_location != 'header' AND is_front_page() AND $image_type == 'header' ) {
		$title = get_bloginfo('name');
		$subtitle = get_bloginfo('description');

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

	} elseif ( is_post_type_archive( 'jetpack-portfolio' ) OR is_tax ( 'jetpack-portfolio-type' ) OR is_tax ( 'jetpack-portfolio-tag' ) ) {
		$title = __( 'Portfolio', 'flat-bootstrap' );

		if ( is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
			$subtitle = single_term_title( null, false );
		}

	} elseif ( is_post_type_archive( 'jetpack-testimonial' ) OR $post->post_type == 'jetpack-testimonial' ) {
		$testimonial_options = get_theme_mod( 'jetpack_testimonials' );
		if ( $testimonial_options ) { 
			$title = $testimonial_options['page-title'];
		} else {
			$title = __( 'Testimonials', 'flat-bootstrap' );
		}

		if ( !is_post_type_archive( 'jetpack-testimonial' ) AND $post->post_type == 'jetpack-testimonial' ) {
			$subtitle = get_the_title();
		}

	} elseif ( is_page() OR is_single() ) { 
		$title = get_the_title();
			
	} elseif ( is_category() ) {
		$title = single_cat_title( null, false );

	} elseif ( is_tag() ) {
		$title = single_tag_title( null, false );

	} elseif ( is_author() ) {
		// Queue the first post, that way we know what author we're dealing with
		the_post();
		$title = sprintf( __( 'Author: %s', 'flat-bootstrap' ), '<span class="vcard">' . get_the_author() . '</span>' );
		// Since we called the_post() above, we need to rewind the loop back to the beginning that way we can run the loop properly, in full.
		rewind_posts();

	} elseif ( is_search() ) {
		$title = sprintf( __( 'Search Results for: %s', 'flat-bootstrap' ), '<span>' . get_search_query() . '</span>' );

	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'flat-bootstrap' ), '<span>' . get_the_date() . '</span>' );

	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'flat-bootstrap' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'flat-bootstrap' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
	
	} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
		$title = __( 'Asides', 'flat-bootstrap' );

	} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
		$title = __( 'Images', 'flat-bootstrap');

	} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
		$title = __( 'Videos', 'flat-bootstrap' );

	} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
		$title = __( 'Quotes', 'flat-bootstrap' );

	} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
		$title = __( 'Links', 'flat-bootstrap' );

	} else {
		$title = __( 'Archives', 'flat-bootstrap' );

	} //endif is_home()

	/*
	 * IF TITLE THEN GET SUBTITLE, FIRST FROM THE TERM DESCRIPTION, THEN FROM OUR CUSTOM
	 * PAGE TITLE
	 */
	if ( $title AND ! $subtitle ) {
		$subtitle = term_description();
		if ( ! $subtitle AND is_singular() ) $subtitle = get_post_meta( get_the_ID(), '_subtitle', $single = true );
	}
		
	/* 
	 * IF WE HAVE AN IMAGE, THEN DISPLAY IT WITH THE TEXT AS AN OVERLAY 
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

	<?php
	/* 
	 * IF NO IMAGE, THEN DISPLAY TEXT IN CONTENT HEADER 
	 */

	elseif ( $title ) :
	?>
		<header class="content-header">
		<div class="container">
		<h1 class="page-title"><?php echo $title; ?></h1>
		<?php if ( $subtitle ) printf( '<h3 class="page-subtitle taxonomy-description">%s</h3>', $subtitle ); ?>
		</div>
		</header>

	<?php endif; // $image_url ?>

<?php endif; // have_posts() ?>

<a id="pagetop"></a>

<?php 
/** 
 * DISPLAY THE PAGE TOP (AFTER HEADER) WIDGET AREA
 */
get_sidebar( 'pagetop' );