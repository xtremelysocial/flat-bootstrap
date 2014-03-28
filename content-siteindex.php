<?php
/**
 * Theme: Flat Bootstrap
 * 
 * The template used for displaying a site index within a page
 *
 * @package flat-bootstrap
 */
?>

<?php // If you don't have search in the sidebar, uncomment this to display it ?>
<?php //get_search_form(); ?>

<?php // List all pages on the site. Be sure to order them in page admin. ?>
<div class="widget widget_pages">
	<h2 class="widgettitle"><?php _e( 'Site Content', 'flat-bootstrap' ); ?></h2>
	<ul>
	<?php
		wp_list_pages( array ( 'title_li' => '' ) );
	?>
	</ul>
</div><!-- .widget -->

<?php // If this blog has more than one category, display them ?>
<?php if ( ! function_exists( 'xsbf_categorized_blog' ) OR xsbf_categorized_blog() ) : ?>
<div class="widget widget_categories">
	<h2 class="widgettitle"><?php _e( 'Categories', 'flat-bootstrap' ); ?></h2>
	<ul>
	<?php
	wp_list_categories( array(
		'show_count' => 1,
		'title_li'   => '',
	) );
	?>
	</ul>
</div><!-- .widget -->
<?php endif; ?>

<?php // Display a tag cloud ?>
<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

<?php // If you want to list monthly archives, uncomment the following
/*
$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'flat-bootstrap' ), convert_smilies( ':)' ) ) . '</p>';
the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
*/
?>

<?php // Display some recent posts ?>
<?php the_widget( 'WP_Widget_Recent_Posts', array('number'=>10) ); ?>
