$(document).ready(function() {
    var rwdMenu = $('.rwd-menu'),
        topMenu = $('.rwd-menu > li > a'),
        parentLi = $('.rwd-menu > li'),
        backBtn = $('.back-btn');
  
    topMenu.on('click', function(e) {
        var thisTopMenu = $(this).parent();
        rwdMenu.addClass('rwd-menu-view');
		if(thisTopMenu.hasClass('open-submenu')) {
			thisTopMenu.toggleClass('open-submenu');
		} else {
			parentLi.removeClass('open-submenu');
			thisTopMenu.addClass('open-submenu');
		}
    });
  
    backBtn.click(function() {
        var thisBackBtn = $(this);
        parentLi.removeClass();
        rwdMenu.removeClass('rwd-menu-view');
    });
  
	$(".mobile-nav-link.nav-link:contains('Services')").click(function(event) {
        if (window.innerWidth < 991) {
            event.preventDefault();
            var submenu = $(this).next(".mega-panel");
            if (submenu.length) {
                submenu.toggle();
            }
        }
    });
	
	$(".mobile-nav-link.nav-link:contains('FAQs')").click(function(event) {
        if (window.innerWidth < 991) {
            event.preventDefault();
            var submenu = $(this).next(".mega-panel");
            if (submenu.length) {
                submenu.toggle();
            }
        }
    });
  });