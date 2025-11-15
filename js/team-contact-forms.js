jQuery(document).ready(function($) {
	// Contact Links
	function init_contact_links(){
		$('.people-contact-link').on('click', function(e) {
			e.preventDefault();
			var name = $(this).data('person-name');
			$('#person-name-input').val(name);
		});
	}

	if($('.page-template-template-people').length){
		init_contact_links();
	}

	function init_contact_links_single(){
		$('.person-contact-item.email').on('click', function(e) {
			e.preventDefault();
			var name = $(this).data('person-name');
			$('#person-name-input').val(name);
		});
	}

	if($('.people-template-default').length){
		init_contact_links_single();
	}

});