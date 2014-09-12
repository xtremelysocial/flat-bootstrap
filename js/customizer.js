/**
 * Theme: Flat Bootstrap
 * 
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
				$( '.navbar-brand' ).css( {
					'clip': 'auto',
					'position': 'relative',
					'display': 'block'
				} );
				/*$( '.navbar-collapse' ).css( {
					'width': '100%'
				} );*/
			} else {
				$( '.site-title, .site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative',
					'color': to
				} );
				$( '.navbar-brand' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute',
					'display': 'none'
				} );
				/*$( '.navbar-collapse' ).css( {
					'width': 'auto'
				} );*/
			}
		} );
	} );
} )( jQuery );
