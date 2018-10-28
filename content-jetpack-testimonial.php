<?php
/**
 * Theme: Flat Bootstrap
 * 
 * This template overrides content.php for Jetpack testimonials. 
 *
 * To keep the theme clean, this template handles the entry header, content, and footer
 * so we don't have to add more template parts or add more logic to existing template 
 * parts to get what we want here. 
 * 
 * The main purpose of this is to output the title without a link to the single entry and 
 * get rid of the "read more" link.
 *
 * @package flat-bootstrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="testimonial-row row">

	<div class="testimonial-thumbnail-div col-md-3">
	<?php /* Display the post thumbnail (profile pic) on the left */ ?>
	<?php if ( has_post_thumbnail() AND !is_search() ) : ?>
		<?php the_post_thumbnail( 'post-thumbnail' , $attr = array( 'class'=>'thumbnail img-responsive testimonial-thumbnail' ) ); ?>
	<?php endif; ?>
	</div><!-- .post-thumnail -->

	<?php /* Display the post content (quote) as a blockquote */ ?>
	<div class="testimonial-entry-summary col-md-9">
	<blockquote><p>
	<?php 
	$the_content = get_the_content();
	echo $the_content;
	?>
	</p>
	<footer><?php the_title(); ?></footer>
	</blockquote>
	</div><!-- .entry-summary -->

	<footer class="entry-meta">
		<?php edit_post_link( __( '<span class="glyphicon glyphicon-edit"></span> Edit', 'flat-bootstrap' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>

	</div><!-- #testimonial-row -->

</article><!-- #post-## -->

<hr>
