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

		$( carousel ).each( function( index, el ) {
			
			var nextThumb = $( this ).find( '.carousel-item.active' ).find( '.next-image-preview' ).data( 'image' );
			var prevThumb = $( this ).find( '.carousel-item.active' ).find( '.prev-image-preview' ).data( 'image' );
			// console.log(nextThumb);
			$( this ).find( '.carousel-control-next' ).find( '.thumbnail-container' ).css( { 'background-image' : 'url( '+nextThumb+' )' } );
			$( this ).find( '.carousel-control-prev' ).find( '.thumbnail-container' ).css( { 'background-image' : 'url( '+prevThumb+' )' } );

		} );
	
	}


	/// Ajax Function
	$( document ).on( 'click', '.gattoverde-load-more', function() {
		
		var that = $( this );
		var page = that.data( 'page' );
		var newPage = page + 1;
		var ajaxurl = that.data( 'url' );

		$.ajax( {
			
			url: ajaxurl,
			type: 'post',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			
			data: { 
				page: page,
				action: 'gattoverde_load_more'
			},

			error : function( response ) {
				/* Act on the event */
				console.log( response );
			},

			success: function( response ) {

				that.data( 'page', newPage );
				$( '.gattoverde-posts-container' ).append( response );

			}

		} );

	} );

} );