 jQuery(document).ready(function($) {


   $(function() {
        $('.acccard').click(function(j) {
          
          var dropDown = $(this).closest('.acccard').find('.accpanel');
          $(this).closest('.acc').find('.accpanel').not(dropDown).slideUp();
          
          if ($(this).hasClass('active')) {
            $(this).removeClass('active');
          } else {
            $(this).closest('.acc').find('.acctitle.active').removeClass('active');
            $(this).addClass('active');
          }
          
          dropDown.stop(false, true).slideToggle();
          j.preventDefault();
        });
      });
    
    

      
    
    });