jQuery(document).ready(function($) {
    // Function to handle click events on the page
    $(document).on('click', function(event) {
        // Check if the clicked element is not the popup or its children and also not the background

        if (!$(event.target).closest('.popup-box').length && !$(event.target).hasClass('popup-background')) {
            // Hide the popup
            console.log('hide');
            $('.popup-box').addClass('hide');
        } else {
            console.log('show');
        }
    });

    // Function to handle click events on the toggle buttons
    $(document).on('click', '.toggle', function(event) {
        event.preventDefault();
        event.stopPropagation();
        var target = $(this).data('target');
        console.log(target);
        $('#' + target).removeClass('hide');
    });

    // Function to handle click events on the close button
    $(document).on('click', '.close-button', function(event) {
        var target = $(this).data('target');
        $('#' + target).addClass('hide');
    });


    (function() {
        console.log('Attempting to register custom block category');
        if (typeof wp !== 'undefined' && wp.blocks && wp.blocks.registerBlockCategory) {
            wp.blocks.registerBlockCategory(
                'post-blocks',
                { 
                    title: 'Post Blocks', 
                    icon: 'admin-post', 
                }
            );
        }
    })();




});


