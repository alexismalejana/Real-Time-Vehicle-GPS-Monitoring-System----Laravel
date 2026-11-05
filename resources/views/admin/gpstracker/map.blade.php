@php
  $getSetting = App\Models\Setting::getSetting();
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>GPS Vehicle Monitoring</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('custom-css/css/main.css') }}"/>
</head>
<body>

    <h2 class="text-center">Vehicle GPS Monitoring</h2>

    <div class="container">
        <div class="row">

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <small>Driver Name</small>
                            <h5 id="driverName"></h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <small>Plate Number</small>
                            <h5 id="plateNumber"></h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <small>Vehicle Status</small>
                            <h5 id="vehicleStatus"></h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <small>GPS Device ID</small>
                            <h5 id="gpsDevice"></h5>
                        </div>
                    </div>
                </div>
                

                <div class="col-md-12">
                    <div class="card">
                            <div class="card-header">
                                <h5>Travel Information</h5>
                            </div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-4">
                                        <label>From Location</label>
                                        <p id="fromLocation"></p>
                                    </div>

                                    <div class="col-md-4">
                                        <label>To Location</label>
                                        <p id="toLocation"></p>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Current Location</label>
                                        <p id="currentLocation"></p>
                                    </div>

                                </div>

                                <hr>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label>Departure Time</label>
                                        <p id="departureTime"></p>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Arrival Time</label>
                                        <p id="arrivalTime"></p>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Estimated Distance / Duration</label>
                                        <p id="routeDetails">Calculating route...</p>
                                    </div>

                                </div>

                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5>Vehicle Route Map</h5>
                                </div>

                                <div class="card-body p-0">
                                    <div id="map" style="width:100%; height:550px;"></div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    <script>

        navigator.geolocation.getCurrentPosition(
            function(position) {

                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                const accuracy = position.coords.accuracy;

                console.log('Latitude:', latitude);
                console.log('Longitude:', longitude);
                console.log('Accuracy:', accuracy + ' meters');

            },
            function(error) {
                console.error(error.message);
            },
            {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            }
        );

        const vehicle = {{ Illuminate\Support\Js::from([
            'driver_name' => $getSingleRecord->driver_name,
            'plate_number' => $getSingleRecord->plate_number,
            'gps_device_id' => $getSingleRecord->gps_device_id,
            'from_loc' => $getSingleRecord->from_loc,
            'to_loc' => $getSingleRecord->to_loc,
            'latitude' => $getSingleRecord->lat,
            'longitude' => $getSingleRecord->long,
            'status' => $getSingleRecord->status,
            'time_departure' => $getSingleRecord->time_departure,
            'time_arrival' => $getSingleRecord->time_arrival,
            'accuracy' => $getSingleRecord->accuracy,
            'google_map' => $getSingleRecord->google_map,
        ]) }};

            let map;

            function initMap() {

                const currentPosition = {
                    lat: Number(vehicle.latitude),
                    lng: Number(vehicle.longitude)
                };

                map = new google.maps.Map(document.getElementById('map'), {
                    center: currentPosition,
                    zoom: 14,
                    mapTypeId: 'roadmap'
                });

                // Current vehicle location
                new google.maps.Marker({
                    position: currentPosition,
                    map: map,
                    title: vehicle.driver_name || 'Vehicle Location',
                    icon: {
                        url: 'https://maps.google.com/mapfiles/kml/shapes/cabs.png',
                        scaledSize: new google.maps.Size(45, 45)
                    }
                });

                // Vehicle information
                document.getElementById('driverName').textContent =
                    vehicle.driver_name || 'N/A';

                document.getElementById('plateNumber').textContent =
                    vehicle.plate_number || 'N/A';

                document.getElementById('gpsDevice').textContent =
                    vehicle.gps_device_id || 'N/A';

                document.getElementById('vehicleStatus').textContent =
                    vehicle.status || 'Pending';

                document.getElementById('fromLocation').textContent =
                    vehicle.from_loc || 'N/A';

                document.getElementById('toLocation').textContent =
                    vehicle.to_loc || 'N/A';

                document.getElementById('currentLocation').textContent =
                    currentPosition.lat + ', ' + currentPosition.lng;

                document.getElementById('departureTime').textContent =
                    vehicle.time_departure || 'N/A';

                document.getElementById('arrivalTime').textContent =
                    vehicle.time_arrival || 'N/A';

                // Route calculation
                calculateRoute();
            }

            function calculateRoute() {

                if (!vehicle.from_loc || !vehicle.to_loc) {
                    document.getElementById('routeDetails').textContent =
                        'Departure or destination is missing.';
                    return;
                }

                const directionsService =
                    new google.maps.DirectionsService();

                const directionsRenderer =
                    new google.maps.DirectionsRenderer({
                        map: map,
                        suppressMarkers: false,
                        polylineOptions: {
                            strokeColor: '#007bff',
                            strokeWeight: 5
                        }
                    });

                directionsService.route({

                    origin: vehicle.from_loc,
                    destination: vehicle.to_loc,
                    travelMode: google.maps.TravelMode.DRIVING

                }, function(result, status) {

                    if (status === 'OK') {

                        directionsRenderer.setDirections(result);

                        const route = result.routes[0].legs[0];

                        document.getElementById('routeDetails').textContent =
                            route.distance.text + ' / ' + route.duration.text;

                    } else {

                        document.getElementById('routeDetails').textContent =
                            'Unable to calculate route: ' + status;

                    }

                });

            }

        </script>

    <script async
        src="https://maps.googleapis.com/maps/api/js?key={{ !empty($getSetting->api) ? $getSetting->api : '' }}&callback=initMap">
    </script>
</body>
</html>