<?php
/**
 * Clean up gallery_shortcode()
 *
 * Re-create the [gallery] shortcode and use thumbnails styling from Bootstrap
 * The number of columns must be a factor of 12.
 * @link http://getbootstrap.com/components/#thumbnails
 * 
 * Largely taken from the roots starter theme:
 * @link https://github.com/roots/roots/blob/master/lib/gallery.php
 */

/*
 * Remove the default WordPress Gallery and replace it with our own. We also don't need
 * WordPress to load its own gallery styles. Note that we stil will allow plugins to 
 * override ours with add_filter('post_gallery').
 */
//if (current_theme_supports('bootstrap-gallery')) {
  remove_shortcode('gallery');
  add_shortcode('gallery', 'xsbf_gallery');
  add_filter('use_default_gallery_style', '__return_null');
//}

function xsbf_gallery($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if (!empty($attr['ids'])) {
	if (empty($attr['orderby'])) {
	  $attr['orderby'] = 'post__in';
	}
	$attr['include'] = $attr['ids'];
	}

	$output = apply_filters('post_gallery', '', $attr);

	if ($output != '') {
	return $output;
	}

	if (isset($attr['orderby'])) {
	$attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
	if (!$attr['orderby']) {
	  unset($attr['orderby']);
	}
	}

	extract(shortcode_atts(array(
	'order'      => 'ASC',
	'orderby'    => 'menu_order ID',
	'id'         => $post->ID,
	'itemtag'    => '',
	'icontag'    => '',
	'captiontag' => '',
	'columns'    => 3, // This is the WordPress default and shouldn't be changed
	'size'       => 'thumbnail',
	'include'    => '',
	'exclude'    => '',
	'link'       => ''
	), $attr));

	//echo "columns (arg)={$columns}<br />"; //TEST
	$id = intval($id);

	/*
	* Bootstrap supports 1-4 or 6 columns. For 6 columns, drop it to 3 on medium screens.
	* For 4 columsn, drop it to 2 on small screens.
	*/
	//$columns = ( 12 % $columns == 0 ) ? $columns : 3;
	//$grid = sprintf('col-sm-%1$s col-lg-%1$s', 12/$columns);
	if ( $columns == 1 ) {
		$bs_columns = 12;
		$grid = 'col-lg-12';
	} elseif ( $columns == 2 OR $columns == 3 ) {
		$bs_columns = 12 / $columns;
		$grid = "col-md-{$bs_columns}";
	} elseif ( $columns == 4 ) {
		$bs_columns = 3;
		$grid = 'col-lg-3 col-md-6';
	} else {
		$columns = 6;
		$bs_columns = 2;
		$grid = 'col-lg-2 col-md-4';
	}
	//echo "columns={$columns}<br />"; //TEST
	//echo "bs_columns={$bs_columns}<br />"; //TEST
	//$grid = sprintf('col-sm-%1$s col-lg-%1$s', $bs_columns);
	//$grid = sprintf('col-md-%1$s col-lg-%2$s', $bs_columns * 2, $bs_columns);
	//$grid = sprintf('col-lg-%1$s', $bs_columns );

	if ($order === 'RAND') {
	$orderby = 'none';
	}

	if (!empty($include)) {
	$_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

	$attachments = array();
	foreach ($_attachments as $key => $val) {
	  $attachments[$val->ID] = $_attachments[$key];
	}
	} elseif (!empty($exclude)) {
	$attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
	} else {
	$attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
	}

	if (empty($attachments)) {
	return '';
	}

	if (is_feed()) {
	$output = "\n";
	foreach ($attachments as $att_id => $attachment) {
	  $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
	}
	return $output;
	}

	$unique = (get_query_var('page')) ? $instance . '-p' . get_query_var('page'): $instance;
	$output = '<div class="gallery gallery-' . $id . '-' . $unique . '">';

	$i = 0;
	foreach ($attachments as $id => $attachment) {
	switch($link) {
	  case 'file':
		$image = wp_get_attachment_link($id, $size, false, false);
		break;
	  case 'none':
		$image = wp_get_attachment_image($id, $size, false, array('class' => 'thumbnail'));
		break;
	  default:
		$image = wp_get_attachment_link($id, $size, true, false);
		break;
	}
	$output .= ($i % $columns == 0) ? '<div class="row gallery-row">': '';
	$output .= '<div class="' . $grid .'">' . $image;

	if (trim($attachment->post_excerpt)) {
	  //TRN:DEL $output .= '<div class="caption hidden">' . wptexturize($attachment->post_excerpt) . '</div>';
	  $output .= '<div class="wp-caption-text gallery-caption">' . wptexturize($attachment->post_excerpt) . '</div>'; //TRN:ADD
	}

	$output .= '</div>';
	$i++;
	$output .= ($i % $columns == 0) ? '</div>' : '';
	}

	$output .= ($i % $columns != 0 ) ? '</div>' : '';
	$output .= '</div>';

	return $output;
}

/**
 * Add Bootstrap thumbnail class to images
 */
add_filter('wp_get_attachment_link', 'xsbf_attachment_link_class', 10, 1);
function xsbf_attachment_link_class($html) {
	//echo htmlspecialchars ( $html ); //TEST
	$html = str_replace('<a', '<a class="thumbnail"', $html);
	return $html;
}