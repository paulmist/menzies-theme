jQuery(document).ready(function($) {

    /* UNWRAP CONTACT FORM 7 SHORTCODE */
  $(".post-14699 .radio-image span span").unwrap(); //Remove spans between input and label tags
  $(".post-14699 .wpcf7-list-item-label").remove(); //Remove the label that added by Contact Form 7
  $(".post-14699 .radio-image input+label").each(function () {
      const id = $(this).prop("for");
      $(this).parent().find("input").attr("id", id);
    });
    
  });