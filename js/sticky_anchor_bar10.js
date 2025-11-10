$(document).ready(function() {
    var navbar = $('#sticky');
    var anchor = $('#sticky-anchor');
    var offset = 100;

    function updateStickyHeight() {
        return navbar.outerHeight();
    }

    function sticky_relocate() {
        var window_top = $(window).scrollTop();
        var navbarTop = anchor.offset().top - offset;
        var navbarHeight = updateStickyHeight();

        if (window_top >= navbarTop) {
            navbar.addClass('stick');
            anchor.height(navbarHeight);
        } else {
            navbar.removeClass('stick');
            anchor.height(0);
        }
    }

    $(window).on('scroll resize', sticky_relocate);
    sticky_relocate();
});