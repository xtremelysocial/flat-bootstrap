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
	$(document).ready(function() {
	  $('.smoothscroll').click(function() {
		  var target = $(this.hash);
		  var offset = $('body').css('padding-top');
		  if (offset) offset = offset.replace('px','');
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html,body').animate({
			  scrollTop: ( target.offset().top - offset )
			}, 1000);
			return false;
		  }
	  });
	});
	
} )( jQuery );