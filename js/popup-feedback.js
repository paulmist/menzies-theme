jQuery(document).ready(function($) {

	function init_feedback_form(){
		// --- STEP 1: Add data-step-id attributes based on UACF7 classes ---
		 $('.uacf7-step').each(function() {
		   var classes = $(this).attr('class');
		   var match = classes.match(/uacf7-step(?:-start)?-(part_\d+)/);
		   if (match) {
		     $(this).attr('data-step-id', match[1]);
		   }
		 });

		 // --- STEP 2: When "Yes"/"No" selected in step 1 ---
		 $(document).on('change', 'input[name="information-check"]', function() {
		   var yesSelected = $(this).val() === 'Yes';

		   // Find the NEXT button for step 1
		   var $nextBtn = $('.uacf7-step[data-step-id="part_1"] .uacf7-next');

		   // Replace its click handler with conditional navigation
		   $nextBtn.off('click').on('click', function(e) {
		     e.preventDefault();

		     if (yesSelected) {
		       // ✅ If "Yes" → skip step 2, go directly to step 3
		       $('.uacf7-step[data-step-id="part_1"] .uacf7-next').trigger('click.uacf7', ['part_3']);
		       // The plugin usually triggers an internal "goToStep" event, so we simulate it
		       $('.uacf7-step[data-step-id="part_3"]').addClass('active').siblings('.uacf7-step').removeClass('active');
		       $('.uacf7-step[data-step-id="part_3"]').trigger('uacf7:stepChanged');
		     } else {
		       // ❌ If "No" → go to step 2 normally (plugin handles it)
		       $('.uacf7-step[data-step-id="part_1"] .uacf7-next').trigger('click.uacf7');
		     }
		   });
		 });

		 // --- STEP 3: On "Send" button from step 2, go to thank-you step ---
		 $(document).on('wpcf7submit', function(e) {
		   var $activeStep = $('.uacf7-step.active');

		   if ($activeStep.data('step-id') === 'part_2') {
		     // Stop the normal submission flow
		     e.preventDefault();

		     // Move to final thank-you step via plugin event
		     $activeStep.removeClass('active');
		     var $lastStep = $('.uacf7-step[data-step-id="part_3"]');
		     $lastStep.addClass('active');
		     $lastStep.trigger('uacf7:stepChanged');
		   }
		 });
	}


	if($('#popmake-27306').length){
		init_feedback_form();
	}
});