<?php
/**
 * Theme: Flat Bootstrap
 * 
 * This template overrides content.php for Jetpack portfolios. 
 *
 * To keep the theme clean, this template handles the entry header, content, and footer
 * so we don't have to add more template parts or add more logic to existing template 
 * parts to get what we want here. 
 * 
 * The main purpose of this is to output the featured image since we don't normally do 
 * that for regular posts.
 *
 * @package flat-bootstrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'content', 'post-header' ); ?>
	
	<div id="xsbf-entry-content" class="entry-content">
	
		<?php if ( has_post_thumbnail() AND !is_search() ) : ?>
			<div class="post-thumbnail">
				<?php if ( ! is_singular() ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php endif; ?>
				<?php the_post_thumbnail( 'post-thumbnail' , $attr = array( 'class'=>'thumbnail img-responsive post-thumbnail' ) ); ?>
				<?php if ( ! is_singular() ) : ?>
					</a>
				<?php endif; ?>
			</div><!-- .post-thumnail -->
		<?php endif; ?>
	
		<?php //When listing items, display the excerpt only. Otherwise, display full content
		if ( ! is_singular() ) {
			the_excerpt();
			echo '<hr />'; 
		} else {
			the_content(); 
		} //endif
		?>

	<?php if ( is_singular() ) : ?>
	<?php //get_template_part( 'content', 'post-footer' ); ?>

		<footer class="entry-meta">

			<?php /*$categories = get_the_category_list( ', ' ); ?> 
			<?php if ( $categories AND length( $categories) > 1 ) : ?>
				<span class="cat-links"><span class="glyphicon glyphicon-tag"></span>&nbsp;
				<?php echo $categories; ?>
				</span>
			<?php endif; */?>

			<?php /*the_tags( '<span class="tags-links"><span class="glyphicon glyphicon-tags"></span> &nbsp;', ', ', '</span>' ); */?> 

		<?php
			echo get_the_term_list( $post->ID, 'jetpack-portfolio-type', '<span class="portfolio-type-links"><span class="glyphicon glyphicon-tag"></span>&nbsp;', _x(', ', 'Used between list items, there is a space after the comma.', 'flat-bootstrap' ), '</span>&nbsp;' );
		?>

		<?php
			echo get_the_term_list( $post->ID, 'jetpack-portfolio-tag', '<span class="portfolio-tag-links"><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;', _x(', ', 'Used between list items, there is a space after the comma.', 'flat-bootstrap' ), '</span>&nbsp;' );
		?>

			<?php edit_post_link( __( '<span class="glyphicon glyphicon-edit"></span> Edit', 'flat-bootstrap' ), '<span class="edit-link">', '</span>' ); ?>
	
		<?php get_template_part( 'content', 'page-nav' ); ?>

		</footer><!-- .entry-meta -->

	<?php endif; // is_singular ?>

	</div><!-- .entry-content -->
</article><!-- #post-## -->
