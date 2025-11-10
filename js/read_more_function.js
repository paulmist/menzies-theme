jQuery(document).ready(function($) {
    $(".read-more-button").click(function() {
        $(this).closest('.read-more-article').toggleClass('show-full-height');
    });

console.log('this is a test')

});