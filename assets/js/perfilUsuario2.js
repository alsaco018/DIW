function initialize() {
  /*var mapOptions = {
    center: new google.maps.LatLng(28.1823295, -82.352912),
    zoom: 9,
    mapTypeId: google.maps.MapTypeId.HYBRID,
    scrollwheel: false,
    draggable: false,
    panControl: true,
    zoomControl: true,
    mapTypeControl: true,
    scaleControl: true,
    streetViewControl: true,
    overviewMapControl: true,
    rotateControl: true,
  };*/
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: {lat: 36.696547, lng: -6.123158},
    zoom: 10
  });
  map.addListener('click', function(e) {
    placeMarkerAndPanTo(e.latLng, map);
  });

  function placeMarkerAndPanTo(latLng, map) {
    var marker = new google.maps.Marker({
      position: latLng,
      map: map
    });
    map.panTo(latLng);
  }

  //var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
}
google.maps.event.addDomListener(window, 'load', initialize);