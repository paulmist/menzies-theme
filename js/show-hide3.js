document.getElementById('show-element').onclick = function() {
    var element = document.getElementById('to-show');
    if (element.className === 'hide') {
      element.className = 'show';
      document.getElementById('show-element').className = 'active';
    } else {
      element.className = 'hide';
      document.getElementById('show-element').className = '';
    }
  }