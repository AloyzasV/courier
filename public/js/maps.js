var map;
var marker = false;
        
function initMap() {
    var centerOfMap = new google.maps.LatLng(54.894983711212056, 23.903343272805177);
 
    var options = {
      center: centerOfMap,
      zoom: 12
    };
 
    map = new google.maps.Map(document.getElementById('map'), options);

    google.maps.event.addListener(map, 'click', function(event) {                
        var clickedLocation = event.latLng;

        if(marker === false) {
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map,
                draggable: true //make it draggable
            });

            google.maps.event.addListener(marker, 'dragend', function(event) {
                markerLocation();
            });
        } else {
            marker.setPosition(clickedLocation);
        }

        markerLocation();
    });
}
    
function markerLocation() {
    var currentLocation = marker.getPosition();
    document.getElementById('coffee_order_form_location').value = currentLocation.lat()+', '+currentLocation.lng();
}
    
google.maps.event.addDomListener(window, 'load', initMap);