jQuery( document ).ready( function( $ ) {
	
	// scripts for frontend
	
	// Functions for retrive thumbnails SLIDER ||| OLDER
	// --------------------------------------------------------------------
	// $( document ).on( 'mouseenter', '.carousel-control-next', function() {

	// 	var nextThumb = $( '.carousel-item.active' ).find( '.next-image-preview' ).data( 'image' );
	// 	// console.log(nextThumb);
	// 	$( this ).find( '.thumbnail-container' ).css( { 'background-image' : 'url( '+nextThumb+' )' } );

	// } );
	
	// For configurations purposes 
	var carousel = '.gattoverde-carousel-thumb';
	
	// for first stage
	gattoverde_get_bs_thumbs( carousel );

	$( carousel ).on( 'slid.bs.carousel', function() {

		gattoverde_get_bs_thumbs( carousel );
		
	} );

	function gattoverde_get_bs_thumbs( carousel ) {

		var nextThumb = $( '.carousel-item.active' ).find( '.next-image-preview' ).data( 'image' );
		var prevThumb = $( '.carousel-item.active' ).find( '.prev-image-preview' ).data( 'image' );
		// console.log(nextThumb);
		$( carousel ).find( '.carousel-control-next' ).find( '.thumbnail-container' ).css( { 'background-image' : 'url( '+nextThumb+' )' } );
		$( carousel ).find( '.carousel-control-prev' ).find( '.thumbnail-container' ).css( { 'background-image' : 'url( '+prevThumb+' )' } );
	
	}

} );