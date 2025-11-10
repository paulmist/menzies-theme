$(document).ready(function() {
  var navbar = $('#sticky');
  var anchor = $('.sticky-anchor-nav');
  var offset = 75;
  var navbarTop = anchor.offset().top - offset; 

  function sticky_relocate() {
    var window_top = $(window).scrollTop();

    if (window_top >= navbarTop) {
      navbar.addClass('stick');
    } else {
      navbar.removeClass('stick');
    }
  }

  $(function() {
    $(window).scroll(sticky_relocate);
    sticky_relocate(); 
  });


console.log('10')

});




document.addEventListener('DOMContentLoaded', function() {
  var anchorFields = document.querySelectorAll('.anchor-field');
  
  anchorFields.forEach(function(anchorField) {
      anchorField.addEventListener('click', function() {
          // Remove the 'active' class from all anchor fields
          anchorFields.forEach(function(field) {
              field.classList.remove('active');
          });
          // Add the 'active' class to the clicked anchor field
          this.classList.add('active');
      });
  });
});



