<?php
/**
 * Theme: Flat Bootstrap
 * 
 * This template overrides single.php for Jetpack testimonials. For these, we just want
 * to output the full quote with no "read more" link.
 * 
 * It is a copy of single.php, but we load content-jetpack-testimonial instead of content-
 * single.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package flat-bootstrap
 */
?>

<?php
get_header(); ?>

<?php get_template_part( 'content', 'header' ); ?>

<div class="container">
<div id="main-grid" class="row">

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'jetpack-testimonial' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>

