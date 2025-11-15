jQuery(document).ready(function($) {
	
	function init_sector_grid_cta(){
		// $('.cta-tile__details').hide();


		
		$('.cta-tile').on('mouseenter', function(e) {
			e.preventDefault();
			if($(window).width() > 1080){
				$(this).find('.cta-tile__details').slideDown('300');
			}
		});
		$('.cta-tile').on('mouseleave', function(e) {
			e.preventDefault();
			if($(window).width() > 1080){
				$(this).find('.cta-tile__details').slideUp('300');
			}
		});
		
	}

	if($('.sectors-section-grid').length){
		init_sector_grid_cta();
	}

	// Popup contact form
	document.addEventListener('wpcf7submit', function (event) {
	    // Only run on a specific form
	    if (event.detail.contactFormId == 27305) {
	        document.querySelector('.uacf7-next').click();
	    }
	});

	document.addEventListener('wpcf7mailsent', function(event) {
		console.log("SENT");
	    const form = event.target;  
	    form.style.display = 'none';  

	    const message =  document.querySelector('.form-message--success');
	    message.style.display = 'block';
	}, false);

	// document.addEventListener('DOMContentLoaded', function () {
	//     const form = document.querySelector('.uacf7-form-wrap');

	//     if (!form) return;

	//     form.addEventListener('click', function (e) {
	//         if (e.target.classList.contains('uacf7-next')) {
	//             const val = form.querySelector('[name="information-check"]:checked')?.value;

	//             if (val === "Yes") {
	//                 // Target the conditional wrapper
	//                 const stepWrapper = form.querySelector('.conditional-feedback');
	//                 if (stepWrapper) {
	//                     stepWrapper.setAttribute('data-condition', 'false');
	//                     stepWrapper.style.display = 'none';
	//                 }

	//                 // Move to next step after hiding
	//                 setTimeout(() => {
	//                     const nextBtn = form.querySelector('.uacf7-next');
	//                     if (nextBtn) nextBtn.click();
	//                 }, 50);
	//             } else {
	//                 // If value changes back, show the step again
	//                 const stepWrapper = form.querySelector('.conditional-feedback');
	//                 if (stepWrapper) {
	//                     stepWrapper.setAttribute('data-condition', 'true');
	//                     stepWrapper.style.display = '';
	//                 }
	//             }
	//         }
	//     });
	// });
	
});

