jQuery(document).ready(function($) {
    $('.read-more-label').on('click', function() {
        var container = $(this).parent('.read-more');
        var content = container.find('.read-more-content');
        if (content.is(':hidden')) {
            content.slideDown();
            container.addClass('active');
            $(this).text('Read less');
        } else {
            content.slideUp();
            container.removeClass('active');
            $(this).text('Read more');
        }
    });
});
