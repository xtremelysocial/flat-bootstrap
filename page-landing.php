<?php
/**
 * Theme: Flat Bootstrap
 * 
 * Template Name: Page - Landing
 *
 * Landing page with no header, sidebar, or footer. It is a full-width page with no
 * "container".
 *
 * This is the template for full-width pages with no header, sidebar, or footer. This 
 * page truly stretches the full width of the browser window. You should set a 
 * <div class="container"> before your content and a </div> after your content to keep 
 * it in line with the rest of the site content.
 *
 * @package flat-bootstrap
 */

get_header(); ?>

<?php get_template_part( 'content', 'header' ); ?>

	<div id="primary" class="content-area-wide">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page-fullwidth' ); ?>
				
				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
				?>
				<div class="comments-wrap">
				<div class="container">
				<?php comments_template(); ?>
				</div><!-- .container -->
				</div><!-- .comments-wrap" -->
				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php //get_sidebar(); ?>

<?php get_footer(); ?>
