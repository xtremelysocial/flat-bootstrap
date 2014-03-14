<?php
/**
 * Theme: Flat Bootstrap
 * 
 * The template for displaying search forms in xtremelysocial
 *
 * @package bootstrap-flat
 */
?>
<form role="search" method="get" class="search-form form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<div class="form-group">
	<label>
		<span class="screen-reader-text sr-only"><?php _ex( 'Search for:', 'label', 'bootstrap-flat' ); ?></span>
		<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'bootstrap-flat' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" class="search-submit btn btn-primary" value="<?php echo esc_attr_x( 'Search', 'submit button', 'bootstrap-flat' ); ?>">
</div><!-- .form-group -->
</form>
