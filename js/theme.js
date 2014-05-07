/**
 * Theme: Flat Bootstrap
 * 
 * Javascript for touch-enabled carousels and smooth scrolling internal links.
 *
 * @package flat-bootstrap
 */
 
( function( $ ) {

	// Touchscreen swipe through carousel (slider)
	$(document).ready(function() {  
	
		//if ( jQuery.isFunction('swiperight') ) {
		//if(typeof swiperight == 'function') {		
		//if (typeof swiperight !== 'undefined' && $.isFunction(swiperight)) {
			//must target by ID
			$('#myCarousel, #myCarousel2, #agnosia-bootstrap-carousel').swiperight(function() {  
				$(this).carousel('prev');  
			});  
			$('#myCarousel, #myCarousel2, #agnosia-bootstrap-carousel').swipeleft(function() {  
				$(this).carousel('next');  
			});  
		//}
	});  

	// Smooth scroll within the page
	//$(function() {
	$(document).ready(function() {
	  //$('a[href*=#]:not([href=#])').click(function() {
	  $('.smoothscroll').click(function() {
		//if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  var offset = $('body').css('padding-top');
		  //var offset = $('body').outerHeight;
		  if (offset) offset = offset.replace('px','');
		  //console.log ( 'offset=' + offset ); 
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html,body').animate({
			  scrollTop: ( target.offset().top - offset )
			}, 1000);
			return false;
		  }
		//}
	  });
	});
	
} )( jQuery );