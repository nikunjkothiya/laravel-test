@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        @include("partials.alert")
        <div class="card">
            <div class="card-header">
                Show User Profile
            </div>

            <div class="card-body">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="firstname" placeholder="Enter First Name" value="{{ old('first_name', isset($user->first_name) ? $user->first_name : '') }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="lastname" placeholder="Enter Last Name" value="{{ old('last_name', isset($user->last_name) ? $user->last_name : '') }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="useremail">Email</label>
                            <input type="email" class="form-control" name="email" id="useremail" placeholder="Enter email" value="{{ old('email', isset($user->email) ? $user->email : '') }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" placeholder="Pick the dob" autocomplete="off" value="{{ old('dob', isset($user->dob) ? $user->dob : '') }}" readonly required>
                        </div>
                    
                    <div class="row">
                        <div class="col-md-12 text-right">
                            
                            <a class="btn btn-danger waves-effect" href="{{ url()->previous() }}">
                                Back
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
    function passFileUrl() {
        document.getElementById('asgnmnt_file').click();
    }

    function fileSelected(inputData) {
        document.getElementById('asgnmnt_file_img').src = window.URL.createObjectURL(inputData.files[0])
    }

    function initAutocomplete() {
        //var latLng = new google.maps.LatLng(23.01802864089624, 72.57282361409486);
        var long = $('#long').val();
        var lat = $('#lat').val();
        if (long != "") {
            long = parseFloat(long);
        } else {
            long = -1.635178;
        }

        if (lat != "") {
            lat = parseFloat(lat);
        } else {
            lat = 52.943487;
        }
        var latLng = new google.maps.LatLng(lat, long);
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: lat,
                lng: long,
            },
            zoom: 07,
            mapTypeId: 'roadmap'
        });

        var marker = new google.maps.Marker({
            position: latLng,
            title: 'Marker',
            map: map,
            draggable: true
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('address_find');
        var searchBox = new google.maps.places.SearchBox(input);
        // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                var marker = new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                });
                $('#lat').val(marker.position.lat());
                $('#long').val(marker.position.lng());
                markers.push(marker);

                //Click on map to make red marker and get lat and long
                google.maps.event.addListener(map, 'click', function(event) {

                    // remove previous markers and add new one by click on map
                    if (marker && marker.setMap) {
                        marker.setMap(null);
                    }
                    var ll = event.latLng;
                    map.panTo(ll); // map center on click
                    map.setZoom(08);
                    marker = new google.maps.Marker({
                        position: event.latLng,
                        map: map
                    });
                    $('#lat').val(event.latLng.lat());
                    $('#long').val(event.latLng.lng());
                    markers.push(marker);
                });
                console.log(place.geometry.location);
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7kiVlXV3vw-HjT_9UmKEoJ5su1KXJrBA&libraries=places&callback=initAutocomplete" async defer></script>
@endsection