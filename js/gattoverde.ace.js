jQuery(document).ready(function($) {
	
	var updateCSS = function() {
		$( "#gattoverde_css" ).val( editor.getValue() );
	};

	$( "#save-custom-css-form" ).submit( updateCSS );

});

var editor = ace.edit("customCssEditor");
editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/css");