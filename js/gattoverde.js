jQuery( document ).ready( function( $ ) {

	/* init function */
	revealPosts();
	
	/* Vars declaration */
	var carousel = '.gattoverde-carousel-thumb';
	var last_scroll = 0;
	
	/* carousel functions */
	gattoverde_get_bs_thumbs( carousel );

	$( carousel ).on( 'slid.bs.carousel', function() {

		gattoverde_get_bs_thumbs( carousel );
		
	} );
	
	function gattoverde_get_bs_thumbs( carousel ) {

		$( carousel ).each( function() {
			
			var nextThumb = $( this ).find( '.carousel-item.active' ).find( '.next-image-preview' ).data( 'image' );
			var prevThumb = $( this ).find( '.carousel-item.active' ).find( '.prev-image-preview' ).data( 'image' );
			console.log(nextThumb);
			$( this ).find( '.carousel-control-next' ).find( '.thumbnail-container' ).css( { 'background-image' : 'url( '+nextThumb+' )' } );
			$( this ).find( '.carousel-control-prev' ).find( '.thumbnail-container' ).css( { 'background-image' : 'url( '+prevThumb+' )' } );

		} );
	
	}

	/// Ajax Function
	$( document ).on( 'click', '.gattoverde-load-more:not(.loading)', function() {
		
		var that = $( this );
		var page = that.data( 'page' );
		var newPage = page + 1;
		var ajaxurl = that.data( 'url' );

		that.addClass( 'loading' ).find( '.text' ).slideUp( 320 );
		that.find( '.gattoverde-icon' ).addClass( 'spin' );

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

				setTimeout( function() {

					that.data( 'page', newPage );
					$( '.gattoverde-posts-container' ).append( response );

					that.removeClass( 'loading' ).find( '.text' ).slideDown( 320 );
					that.find( '.gattoverde-icon' ).removeClass( 'spin' );

					revealPosts();
				
				}, 1500 );

			}

		} );

	} );


	/* scroll functions */
	$( window ).scroll( function( event ) {
	
		var scroll = $( window ).scrollTop();

		if ( Math.abs( scroll - last_scroll ) > $( window ).height() * 0.1 ) {
			
			last_scroll = scroll;

			$( '.page-limit' ).each( function( index ) {
				
				if ( isVisible( $( this ) ) ) {

					history.replaceState( null, null, $( this ).attr( 'data-page' ) );
					return (false);

				}

			} );

		}

	} );

	// Helper Functions
	function revealPosts() {

		var posts = $( 'article:not(.reveal)' );
		var i = 0;

		setInterval( function(){

			if ( i >= posts.length ) return false; 

				var el = posts[i];
				$( el ).addClass( 'reveal' ).find( '.gattoverde-carousel-thumb' ).carousel();

			i++;

		}, 200 );
		
	}

	function isVisible( element ) {

		var scroll_pos = $( window ).scrollTop();
		var window_h = $( window ).height();
		var el_top = $( element ).offset().top;
		var el_height = $( element ).height();
		var el_bottom = el_top + el_height;

		return ( ( el_bottom - el_height * 0,25 > scroll_pos ) && ( el_top - (scroll_pos + 0.5 * window_h) ) );

	}

} );
