$( document ).ready(function() {
  var rwdMenu = $('.rwd-menu'),
  topMenu = $('.rwd-menu > li > a'),
  parentLi = $('.rwd-menu > li'),
  backBtn = $('.back-btn');

topMenu.on('click',function(e){

var thisTopMenu = $(this).parent(); // current $this
  rwdMenu.addClass('rwd-menu-view');
  parentLi.removeClass('open-submenu');
  thisTopMenu.addClass('open-submenu'); 
});

backBtn.click(function(){
var thisBackBtn = $(this);
parentLi.removeClass();
rwdMenu.removeClass('rwd-menu-view');
});

});