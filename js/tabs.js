    // Show the first tab by default
    $('.tabs-stage > div').hide();
    $('.tabs-stage > div:first').show();
    $('.tabs-nav li:first').addClass('tab-active');

    // Change tab class and display content
    $('.tabs-nav a').on('click', function(event){
    event.preventDefault();
    $('.tabs-nav li').removeClass('tab-active');
    $(this).parent().addClass('tab-active');
    $('.tabs-stage > div').hide();
    $($(this).attr('href')).show();
    });

    $(function() {
        $('.tab-content:first-child').show();
        $('.tab-nav-link').bind('click', function(e) {
          $this = $(this);
          $tabs = $this.parent().parent().next();
          $target = $($this.data("target")); // get the target from data attribute
          $this.siblings().removeClass('current');
          $target.siblings().css("display", "none")
            $this.addClass('current');
            $target.fadeIn("fast");
         
        });
        $('.tab-nav-link:first-child').trigger('click');



      });