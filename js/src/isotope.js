(function() {

  //http://isotope.metafizzy.co/layout-modes/masonry.html
  //http://codepen.io/desandro/pen/BptxJ
  var grid = document.querySelector('.grid');
  var options = {
    itemSelector: '.grid-item',
    transitionDuration: '0',
    masonry: {
      columnWidth: 370, // container / #of columns
      isFitWidth: true,
      gutter: 10
    }
  };

  function isotopeInit(options) {
    var iso = new Isotope(grid, options);
  }

  isotopeInit();

})();
