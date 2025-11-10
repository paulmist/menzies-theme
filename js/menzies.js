$ = jQuery;

// (function($) {
// window.fwp_is_paging = false;

// $(document).on('facetwp-refresh', function() {
//     if (! window.fwp_is_paging) {
//         window.fwp_page = 1;
//         FWP.extras.per_page = 'default';
//     }

//     window.fwp_is_paging = false;
// });

// $(document).on('facetwp-loaded', function() {
//     window.fwp_total_rows = FWP.settings.pager.total_rows;

//     if(! $("#homepage-flag").length ) {

//         if (! FWP.loaded) {
//             window.fwp_default_per_page = FWP.settings.pager.per_page;

//             $(window).scroll(function() {
//                 if ($(window).scrollTop() == $(document).height() - $(window).height()) {
//                     var rows_loaded = (window.fwp_page * window.fwp_default_per_page);
//                     if (rows_loaded < window.fwp_total_rows) {
//                         //console.log(rows_loaded + ' of ' + window.fwp_total_rows + ' rows');
//                         window.fwp_page++;
//                         window.fwp_is_paging = true;
//                         FWP.extras.per_page = (window.fwp_page * window.fwp_default_per_page);
//                         FWP.soft_refresh = true;
//                         FWP.refresh();
//                     }
//                 }
//             });
//         }
//     }
// });
// })(jQuery);

$(document).ready(function() {

// masonry & infinite scroll tings
var $grid = $('.grid').masonry({
  // Masonry options...
  itemSelector: '.grid-item', 
  transitionDuration: 0,
});         
});

$(document).on('facetwp-loaded', function() {
var $grid = $( '.grid' ).imagesLoaded( function() {
    $grid.masonry("reloadItems");
    $grid.masonry( {
        itemSelector: '.grid-item', 
        transitionDuration: 0,
    });
});
});

// (function($) {
// $(document).on("click", ".facetwp-pager a", function() {
//     // location.reload();
//     $("html, body").animate( { scrollTop: 0 } );
//     return false;
//  });
// })(jQuery);

(function($) {
$(document).on('facetwp-refresh', function() {
    $('.facetwp-template').animate({ opacity: 0 }, 0);
    
});
$(document).on('facetwp-loaded', function() {
    $('.facetwp-template').animate({ opacity: 1 }, 1000);
    
});
})(jQuery);

$(document).ready(function() {

// Add class to filter toggle
if ($(window).width() < 768) {
   $(".filter-collapse").removeClass("show");
   $(".filter-toggle").addClass("collapsed");
}

});

$(document).on('shown.bs.collapse', function() {
var $grid = $( '.grid' ).imagesLoaded( function() {
    $grid.masonry("reloadItems");
    $grid.masonry( {
        itemSelector: '.grid-item', 
        transitionDuration: 0,
    });
});
});

$(document).on('hidden.bs.collapse', function() {
var $grid = $( '.grid' ).imagesLoaded( function() {
    $grid.masonry("reloadItems");
    $grid.masonry( {
        itemSelector: '.grid-item', 
        transitionDuration: 0,
    });
});
});

$(function(){
$('#carouselProducts.carousel-inner.carousel-item').carousel({
    pause: "hover"
});

$('input').focus(function(){
   $("#carouselProducts").carousel('pause');
}).blur(function() {
   $("#carouselProducts").carousel('cycle');
});
});

$(document).ready(function() {

// mega menus
// full-width menus
$( ".mega-toggle > ul.dropdown-menu" ).wrap(function() {
  return "<div class='mega-panel dropdown-menu'><div class='container'><div class='row'><div class='col-md-12'><div class='mega-panel-holder'></div></div></div></div>";
});
$(".mega-panel-holder > ul").addClass("services-top-menu row");
$(".mega-panel-holder > ul").removeClass("dropdown-menu"); 
$(".mega-panel-holder > ul > li").addClass("col-md-3 col-6 mega-panel-top-level");
$(".mega-panel-holder > ul li").removeClass("dropdown"); 

// smaller menus
$( ".mega-toggle-small > ul.dropdown-menu" ).wrap(function() {
  return "<div class='mega-panel-small dropdown-menu'><div class='container'><div class='row'><div class='col-md-12'><div class='mega-panel-holder-small'></div></div></div></div>";
});
$(".mega-panel-holder-small > ul").addClass("services-top-menu row");
$(".mega-panel-holder-small > ul").removeClass("dropdown-menu"); 
$(".mega-panel-holder-small > ul > li").addClass("col-6 mega-panel-top-level");
$(".mega-panel-holder-small > ul li").removeClass("dropdown"); 

// applies to both
$(".mega-panel-top-level ul").addClass("sub-menu");
$(".mega-panel-top-level ul").removeClass("dropdown-menu");
$(".mega-panel-top-level a.dropdown-item").removeClass("dropdown-item");

setTimeout(function(){ 
    $(".row").addClass("load"); 
},0)

// focus on search box when opened
$('#searchmodal').on('shown.bs.modal', function() {
    $('#transcript').trigger('focus');
});

// homepage sub banner class jiggery
$(".sub-banner-row .sub-banner-col-3:nth-child(3n)").removeClass("col-6");
$(".sub-banner-row .sub-banner-col-3:nth-child(3n)").addClass("col-12");
$(".sub-banner-row .sub-banner-col-6:nth-child(3n)").removeClass("col-6");
$(".sub-banner-row .sub-banner-col-6:nth-child(3n)").addClass("col-12");

// SVG colour changes
// Homepage service icons
$(".homepage-link-icon").hover(function(){
    $(this).attr("src", function(index, attr){
        return attr.replace(".svg", "-blue.svg");
    });
}, function(){
    $(this).attr("src", function(index, attr){
        return attr.replace("-blue.svg", ".svg");
    });
});
// hlb logos
$(".hlb-logo-white").hover(function(){
    $(this).attr("src", function(index, attr){
        return attr.replace("-white.svg", "-yellonge.svg");
    });
}, function(){
    $(this).attr("src", function(index, attr){
        return attr.replace("-yellonge.svg", "-white.svg");
    });
});
$(".home-hlb-logo").hover(function(){
    $(this).attr("src", function(index, attr){
        return attr.replace(".svg", "-yellonge.svg");
    });
}, function(){
    $(this).attr("src", function(index, attr){
        return attr.replace("-yellonge.svg", ".svg");
    });
});

});

// Allow nav parent items to be clickable and hover expand child items

if ($(window).width() > 992) {

    $(function($) {

        $('.navbar .dropdown').hover(function() {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(150).fadeIn();

        }, function() {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(150).fadeOut();

    });

    $('.dropdown-toggle').click(function() {

        if (window.matchMedia('(min-width: 992px)').matches) {
            var location = $(this).attr('href');
            window.location.href = location;
            return false;
        } else {
            // 
        }

    });

    });

} 

// add classes to people blocks
$(window).on("load, resize", function() {
var viewportWidth = $(window).width();
if (viewportWidth < 767) {
    $(".grid-if-desktop").removeClass("grid");
    $(".grid-item-if-desktop").removeClass("grid-item");
}
if (viewportWidth > 767) {
    $(".grid-if-desktop").addClass("grid");
    $(".grid-item-if-desktop").addClass("grid-item");
}

});

// little function for testing clicks on iOS
// function showAlert() {
//     alert ("Hello world!");
// }

// keep scrolling scrolling scrolling
// $(document).ready(function(){

//   $(this).scrollTop(0);
        
//   // Select all links with hashes
//   $('a[href*="#"]')
//     // Remove links that don't actually link to anything
//     .not('[href="#"]')
//     .not('[href="#0"]')
//     .click(function(event) {
//       // On-page links
//       if (
//         location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
//         && 
//         location.hostname == this.hostname
//       ) {
//         // Figure out element to scroll to
//         var target = $(this.hash);
//         var offset = 150;
//         target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//         // Does a scroll target exist?
//         if (target.length) {
//           // Only prevent default if animation is actually gonna happen
//           event.preventDefault();
//           $('html, body').animate({
//             scrollTop: target.offset().top - offset
//           }, 1000, function() {
//             // Callback after animation
//             // Must change focus!
//             var $target = $(target);
//             $target.focus();
//             if ($target.is(":focus")) { // Checking if the target was focused
//               return false;
//             } else {
//               $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
//               $target.focus(); // Set focus again
//             };
//           });
//         }
//       }
//     });

// }); 

//

