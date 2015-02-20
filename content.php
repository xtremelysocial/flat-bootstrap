<?php
/**
 * Theme: Flat Bootstrap
 * 
 * The default template used for displaying page and article content. Note that certain
 * pages, index, articles may use a different template.
 *
 * @package flat-bootstrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php // If post, then display the post title and header meta ?>
	<?php if ( in_array( get_post_type(), array ( 'post', 'jetpack-testimonial', 'jetpack-portfolio' ) ) ) : ?>
		<?php get_template_part( 'content', 'post-header' ); ?>
	<?php endif; ?>

	<?php // Display the featured image on blog / archives ?>
	<?php if ( !is_single() ) : ?>
		<?php if ( has_post_thumbnail() AND !is_search() ) : ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

				<?php 
				// As of WP 3.9, if we don't have the right image size, use large
				if ( function_exists ( 'has_image_size') AND ! has_image_size ( 'post-thumbnail' ) ) {
					the_post_thumbnail( 'large', $attr = array( 'class'=>'thumbnail img-responsive large-thumbnail' ) ); 
				// Otherwise, use our custom size
				} else {
					the_post_thumbnail( 'post-thumbnail' , $attr = array( 'class'=>'thumbnail img-responsive post-thumbnail' ) );
				} //endif has_image_size()
				?>

				</a>
			</div><!-- .post-thumnail -->
		<?php endif; ?>

	<?php // Show excerpt for all but single posts (and pages) ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<hr>
	</div><!-- .entry-summary -->

	<?php // For single posts and pages, display the full content ?>
	<?php else : ?>
		<div class="entry-content">
		
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'flat-bootstrap' ) ); ?>

			<?php // For posts, show the categories and tags ?>
			<?php if ( 'post' == get_post_type() ) : ?>
			<?php get_template_part( 'content', 'post-footer' ); ?>
			<?php endif; ?>

			<?php // If multiple pages, display next/previous page links ?>
			<?php get_template_part( 'content', 'page-nav' ); ?>

		</div><!-- .entry-content -->
	
		<?php //get_template_part( 'content', 'post-nav' ); ?>

	<?php endif; ?>
	
</article><!-- #post-## -->
