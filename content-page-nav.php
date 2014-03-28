<?php
/**
 * Theme: Flat Bootstrap
 * 
 * The template used for displaying next / previous page links
 *
 * @package flat-bootstrap
 */
?>

<?php
	$link_pages = wp_link_pages( array(
		'next_or_number'   	=> 'next',
		'before' 			=> '<li>',
		'after'  			=> '</li>',
		'nextpagelink'     	=> __( 'Next page &rarr;', 'flat-bootstrap' ),
		'previouspagelink' 	=> __( '&larr; Previous page', 'flat-bootstrap' ),
		'echo'				=> false
	) );
	if ( $link_pages ) echo '<ul class="pager">' . $link_pages . '</ul>';
