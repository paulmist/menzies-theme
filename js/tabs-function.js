jQuery(document).ready(function($) {
    // Hide all tab contents initially
    $('.tab-content').hide();

    // Toggle tab content when a tab is clicked
    $('.open-tab').on('click', function() {
        var tabContent = $(this).next('.tab-content');
        if (tabContent.is(':visible')) {
            tabContent.slideUp();
            $(this).removeClass('active'); // Remove the 'active' class when closing
        } else {
            $('.tab-content').slideUp();
            $('.open-tab').removeClass('active'); // Remove 'active' class from other buttons
            tabContent.slideDown();
            $(this).addClass('active'); // Add the 'active' class when opening
        }
    });

    // Open the first tab by default
    $('.default-open .tab-content').slideDown();
    $('.default-open .open-tab').addClass('active'); // Add 'active' class to the default open button
});