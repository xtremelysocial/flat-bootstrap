<?php
/**
 * Theme: Flat Bootstrap
 * 
 * Template Name: Page - Full Width with Recent Posts
 *
 * Full width page template (no sidebar, no container) with 3 columns of recent posts
 *
 * This is the template for full width pages with no sidebar and
 * no container. It also lists your 3 most recent posts. This page truly stretches 
 * the full width of the browser window. You should set a <div class="container"> 
 * before your content to keep it in line with the rest of the site content.
 *
 * @package flat-bootstrap
 */

get_header(); ?>

<?php get_template_part( 'content', 'header' ); ?>

<div id="primary" class="content-area-wide">
	<main id="main" class="site-main" role="main">
	
		<?php /* DISPLAY THE PAGE CONTENT FIRST IF THERE IS ANY */ ?>
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

		<?php /* DISPLAY THE MOST RECENT POSTS (NOTE STICKY POSTS FIRST) */
		$num_posts = 3; // Should be a factor of 12 column grid
		$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $num_posts,
			'paged' => $paged
		);
		$list_of_posts = new WP_Query( $args );
		?>
		<?php if ( $list_of_posts->have_posts() ) : ?>
			<div id="page-posts" class="page-posts">
			<div class="container"><div class="row">

			<?php /* Determine # of columns and # of posts per row */
			//$count_posts = count ( $list_of_posts->posts );
			$count_posts = count ( $list_of_posts->posts ) <= $num_posts ? count ( $list_of_posts->posts ) : $num_posts;
			if ( $count_posts % 4 == 0 ) $per_row = 4;
			elseif ( $count_posts % 3 == 0) $per_row = 3;
			else $per_row = 2;			
			$num_cols = 12 / $per_row;
			?>

			<?php /* The loop */ ?>
			<?php $count = 0; ?>
			<?php while ( $list_of_posts->have_posts() AND $count < $num_posts ) : $list_of_posts->the_post(); ?>
				<?php if ( $count > 0 AND $count % $per_row == 0 ) echo '</div><div class="row">'; ?>
				<div class="col-lg-<?php echo $num_cols ?>">
				<?php // Display content of posts ?>
				<?php get_template_part( 'content', 'page-posts' ); ?>
				</div>
				<?php $count++; ?>
			<?php endwhile; ?>

			</div><!-- row --></div><!-- container -->
			</div><!-- page-posts -->

		<?php endif; ?>	
		<?php 
		/* Restore original Post Data */
		wp_reset_postdata();		
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
