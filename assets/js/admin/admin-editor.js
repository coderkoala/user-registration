;(function($){
	$(function(){
		// Close modal
		var urModalClose = function() {
			if ( $('#ur-modal-select-form').length ) {
				$('#ur-modal-select-form').get(0).selectedIndex = 0;
				$('#ur-modal-checkbox-title, #ur-modal-checkbox-description').prop('checked', false);
			}
			$('#ur-modal-backdrop, #ur-modal-wrap').css('display','none');
			$( document.body ).removeClass( 'modal-open' );
		};
		// Open modal when media button is clicked
		$(document).on('click', '.ur-insert-form-button', function(event) {			
			event.preventDefault();
			$('#ur-modal-backdrop, #ur-modal-wrap').css('display','block');
			$( document.body ).addClass( 'modal-open' );
		});
		// Close modal on close or cancel links
		$(document).on('click', '#ur-modal-close, #ur-modal-cancel a', function(event) {
			event.preventDefault();
			urModalClose();
		});
		// Insert shortcode into TinyMCE
		$(document).on('click', '#ur-modal-submit', function(event) {
			event.preventDefault();
			var shortcode;
			shortcode = '[user_registration_form id="' + $('#ur-modal-select-form').val() + '"';
			if ( $('#ur-modal-checkbox-title').is(':checked') ) {
				shortcode = shortcode+' title="true"';
			}
			if ( $('#ur-modal-checkbox-description').is(':checked') ) {
				shortcode = shortcode+' description="true"';
			}
			shortcode = shortcode+']';
			wp.media.editor.insert(shortcode);
			urModalClose();
		});
	});
}(jQuery));