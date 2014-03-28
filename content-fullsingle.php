<?php
/**
 * Theme: Flat Bootstrap
 * 
 * The template used for displaying a single article (blog post) as full-width
 *
 * @package flat-bootstrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_single () ) : ?>
		<div class="container centered padding-top">
		<?php get_template_part( 'content', 'post-header' ); ?>
		</div>
	<?php endif; ?>
	
	<div class="entry-content">
		<?php the_content(); ?>
		
		<?php if ( is_single () ) : ?>
			<div class="container">
			<?php /* SHOW THE CATEGORIES AND TAGS */ ?>
			<?php get_template_part( 'content', 'post-footer' ); ?>
		<?php endif; ?>

		<?php /* IF MULTIPLE PAGES, DISPLAY NEXT/PREVIOUS PAGE LINKS */ ?>
		<?php get_template_part( 'content', 'page-nav' ); ?>
		</div>
		
	</div><!-- .entry-content -->

	<?php //get_template_part( 'content', 'post-nav' ); ?>

</article><!-- #post-## -->
