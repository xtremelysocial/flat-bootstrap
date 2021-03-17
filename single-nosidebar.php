<?php
/**
 * Theme: Flat Bootstrap
 * 
 * Template Name: Post - No Sidebar
 * Template Post Type: post
 * 
 * Full-width POST (article) with no sidebar.
 *
 * This is the template for full width POSTS with no sidebar. This is used for the new
 * WordPress Editor ("Project Gutenberg"). It DOES have a container so that regular
 * content displays properly. The new Editor "alignfull" on images will break out of 
 * the container as it should.
 *
 * @package flat-bootstrap
 */

get_header(); ?>

<?php get_template_part( 'content', 'header' ); ?>

<div class="container">
<div id="main-grid" class="row">

	<div id="primary" class="content-area-wide col-md-12">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'fullsingle' ); ?>

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

				<?php get_template_part( 'content', 'post-nav' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php //get_sidebar(); ?>

</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
