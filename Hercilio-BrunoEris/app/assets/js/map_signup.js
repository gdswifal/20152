var map;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -9.654576, lng: -35.711623},
        zoom: 16
    });
  // Place a draggable marker on the map
    var marker = new google.maps.Marker({
        position: {lat: -9.654576, lng: -35.711623},
        map: map,
        draggable:true,
        title:"Arraste para a posição de sua empresa."
    });

    //get marker position and store in hidden input
    google.maps.event.addListener(marker, 'dragend', function (evt) {
        document.getElementById("latInput").value = evt.latLng.lat().toFixed(6);
        document.getElementById("lngInput").value = evt.latLng.lng().toFixed(6);
    });
}
