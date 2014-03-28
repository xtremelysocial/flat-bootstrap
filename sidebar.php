<?php
/**
 * Theme: Flat Bootstrap
 * 
 * The Sidebar positioned on the right. If no widgets added, display some as samples.
 *
 * @package flat-bootstrap
 */
?>
	<div id="secondary" class="widget-area col-md-4" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'Sidebar' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<br />
				<?php get_search_form(); ?>
			</aside>

			<aside id="pages" class="widget widget_pages">
				<h2 class="widget-title"><?php _e( 'Site Content', 'flat-bootstrap' ); ?></h2>
				<ul>
					<?php wp_list_pages( array( 'title_li' => '' ) ); ?>
				</ul>
			</aside>

			<aside id="tag_cloud" class="widget widget_tag_cloud">
				<h2 class="widget-title"><?php _e( 'Categories', 'flat-bootstrap' ); ?></h2>
					<?php wp_tag_cloud( array( 'separator' => ' ', 'taxonomy' => 'category' ) ); ?>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
