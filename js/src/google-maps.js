// @info
// Styling taken from Snazzy Maps:
// https://snazzymaps.com/style/151/ultra-light-with-labels

// @tools
// https://mapbuildr.com

// @documentation
// https://developers.google.com/maps/documentation/javascript/tutorial
// https://developers.google.com/maps/documentation/javascript/styling

var map_location = {
  lat: 0,
  lng: 0
};


function initMap(el, coords) {
  var map = document.getElementById(el);

  map = new google.maps.Map(map, {
    center: coords,
    disableDoubleClickZoom: true,
    zoomControl: true,
    disableDefaultUI: true,
    zoomControlOptions: {
      style: google.maps.ZoomControlStyle.DEFAULT,
    },
    scrollwheel: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoom: 15
  });

  marker = new google.maps.Marker({
    map: map,
    draggable: false,
    animation: google.maps.Animation.DROP,
    position: coords
  });

  google.maps.event.addDomListener(window, 'resize', function() {
    map.setCenter(coords);
  });
}

initMap('map', map_location);
