const gmap = document.getElementById("map");

function initMap() {
    // Coordenadas de los marcadores
    var marker1 = { lat: -12.1736139, lng: -76.9807175 };
    var marker2 = { lat: parseFloat(gmap.dataset.lat || 0), lng: parseFloat(gmap.dataset.lng || 0) };

    // Crear un mapa centrado en una ubicación específica
    var map = new google.maps.Map(gmap, {
        zoom: 4,
        center: marker1 // Centro del mapa en el marcador 1
    });

    // Crear los marcadores
    var markerNY = new google.maps.Marker({
        position: marker1,
        map: map,
        title: 'Tienda Magic Cakes',
        icon: {
            url: 'https://cdn-icons-png.flaticon.com/512/513/513893.png',
            scaledSize: new google.maps.Size(40, 40),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(20, 40)
        }
    });

    var markerLondon = new google.maps.Marker({
        position: marker2,
        map: map,
        title: 'Punto de entrega',
        icon: {
            url: 'https://cdn-icons-png.flaticon.com/512/4668/4668400.png',
            scaledSize: new google.maps.Size(40, 40),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(20, 40)
        }
    });

    // Crear un servicio de direcciones
    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer({
        suppressMarkers: true // Ocultar los marcadores predeterminados de la ruta
      });

    directionsDisplay.setMap(map);

    // Solicitar la ruta entre los dos marcadores
    var request = {
        origin: marker1,
        destination: marker2,
        travelMode: 'DRIVING'
    };

    directionsService.route(request, function (response, status) {
        if (status === 'OK') {
            directionsDisplay.setDirections(response);
        }
    });

    var bounds = new google.maps.LatLngBounds();
    bounds.extend(markerNY.getPosition());
    bounds.extend(markerLondon.getPosition());

    map.fitBounds(bounds);
}

initMap()