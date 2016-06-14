(function() {

  var options = {
    lazyLoad: 1,
    selectedAttraction: 0.01,
    friction: 0.15,
    prevNextButtons: false,
    contain: false
  };

  function flcktySlider(element, opts) {
    var el    = document.querySelector(element);
    var flkty = new Flickity(el, opts);
  }

  flcktySlider('.gallery', options);

})();
