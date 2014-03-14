<?php
/**
 * Theme: Flat Bootstrap
 * 
 * The template used for displaying page content for fullwidth pages. It contains 
 * everything after the_content()
 *
 * @package bootstrap-flat
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<?php the_content(); ?>
		
		<?php get_template_part( 'content', 'page-nav' ); ?>

		<?php edit_post_link( __( '<span class="glyphicon glyphicon-edit"></span> Edit', 'bootstrap-flat' ), '<div class="container"><footer class="entry-meta"><div class="edit-link">', '</div></div></footer>' ); ?>
		
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
