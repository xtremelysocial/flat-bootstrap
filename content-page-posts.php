<?php
/**
 * Theme: Flat Bootstrap
 * 
 * The template used for displaying page content for pages with posts at the end
 *
 * @package flat-bootstrap
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<header class="entry-header">
		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h3>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() AND !is_search() ) : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>">
		<div class="post-thumbnail">
			<?php 
			// As of WP 3.9, if we don't have the right image size, use medium
			if ( function_exists ( 'has_image_size') AND ! has_image_size ( 'post-thumbnail' ) ) {
				the_post_thumbnail( 'medium', $attr = array( 'class'=>'thumbnail img-responsive post-thumbnail' ) ); 
			// Otherwise, use our custom size
			} else {
				the_post_thumbnail( 'post-thumbnail' , $attr = array( 'class'=>'thumbnail img-responsive' ) );
			} //endif has_image_size()
			?>
		</div>
		</a>
	<?php endif; ?>

 	<div class="entry-summary">
		<?php the_excerpt(); ?>
 	</div><!-- .entry-summary -->

</article><!-- #post-## -->
