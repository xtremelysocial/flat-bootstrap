<?php
/**
 * Theme: Flat Bootstrap
 * 
 * The template used for displaying a single article (blog post) with sidebar
 *
 * @package flat-bootstrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_single () ) : ?>
		<?php get_template_part( 'content', 'post-header' ); ?>
	<?php endif; ?>
	
	<div class="entry-content">
		<?php the_content(); ?>
		
		<?php // Show the categories and tags ?>
		<?php if ( is_single () ) : ?>
			<?php get_template_part( 'content', 'post-footer' ); ?>
		<?php endif; ?>

		<?php // If multiple pages, display next/previous page links ?>
		<?php get_template_part( 'content', 'page-nav' ); ?>
		
	</div><!-- .entry-content -->

	<?php //get_template_part( 'content', 'post-nav' ); ?>

</article><!-- #post-## -->
