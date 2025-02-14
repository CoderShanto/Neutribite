<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Branch Locations</title>
<style>
  /* Body styling */
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa; /* Light gray background */
  }

  /* Title styling */
  h1 {
    text-align: center;
    color: #333; /* Dark gray text color */
    padding: 20px 0; /* Add padding to the top and bottom of the title */
    margin: 0; /* Remove default margin */
    background-color: #ffffff; /* White background */
    border-bottom: 2px solid #ccc; /* Gray border at the bottom */
  }

  /* Map container styling */
  #map-container {
    height: 400px; /* Adjust as needed */
    width: 80%; /* Adjust as needed */
    margin: 0 auto; /* Center the map container */
    background-color: #ffffff; /* White background */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Drop shadow effect */
    overflow: hidden; /* Hide overflow content */
    margin-bottom: 20px; /* Add margin at the bottom */
  }

  /* Map styling */
  #map {
    height: 100%; /* Fill the entire map container */
    width: 100%; /* Fill the entire map container */
  }

  /* Home button styling */
  .home-button {
    display: block;
    margin: 0 auto;
    text-align: center;
    padding: 10px 20px;
    background-color: #007bff; /* Blue background color */
    color: #fff; /* White text color */
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .home-button:hover {
    background-color: #0056b3; /* Darker blue background color on hover */
  }
</style>
</head>
<body>

<h1>Branch Locations</h1>

<!-- Map container -->
<div id="map-container">
  <!-- Display the map -->
  <div id="map"></div>
</div>

<!-- Home button -->
<button class="home-button" onclick="goToHomePage()">Home</button>

<script>
// Initialize and display the map
function initMap() {
  // Specify the center of the map (Dhaka, Bangladesh)
  var center = { lat: 23.8103, lng: 90.4125 };

  // Create a new map object
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,     // Adjust the initial zoom level as needed
    center: center
  });

  // Create a directions service object to use the route method and get a result for our request
  var directionsService = new google.maps.DirectionsService();

  // Create a directions renderer object to display the route on the map
  var directionsRenderer = new google.maps.DirectionsRenderer();
  directionsRenderer.setMap(map);

  // Define the locations of your branches in Dhaka, Bangladesh
  var branches = [
    { name: 'Head Office', location: { lat: 23.8103, lng: 90.4125 } }, // Dhaka, Bangladesh
    { name: 'Uttara Branch', location: { lat: 23.7806, lng: 90.3496 } }, // Uttara, Dhaka, Bangladesh
    { name: 'Mohammadpur Branch', location: { lat: 23.7271, lng: 90.3975 } }, // Mohammadpur, Dhaka, Bangladesh
    { name: 'Gulshan Branch', location: { lat: 23.7930, lng: 90.4049 } }, // Gulshan, Dhaka, Bangladesh
    { name: 'Dhanmondi Branch', location: { lat: 23.7594, lng: 90.3788 } }, // Dhanmondi, Dhaka, Bangladesh
    { name: 'Mirpur Branch', location: { lat: 23.7340, lng: 90.3903 } }, // Mirpur, Dhaka, Bangladesh
  ];

  // Create and add markers for each branch
  branches.forEach(function(branch) {
    var marker = new google.maps.Marker({
      position: branch.location,
      map: map,
      title: branch.name
    });

    // Calculate distance from user's location to each branch
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var userLocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };

        var userMarker = new google.maps.Marker({
          position: userLocation,
          map: map,
          title: 'Your Location',
          icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' // Blue marker for user's location
        });

        var branchLocation = new google.maps.LatLng(branch.location.lat, branch.location.lng);
        var distance = google.maps.geometry.spherical.computeDistanceBetween(userLocation, branchLocation);
        var distanceText = (distance / 1000).toFixed(2) + ' km'; // Convert meters to kilometers
        var infoWindowContent = '<div><strong>' + branch.name + '</strong><br>Distance: ' + distanceText + '</div>';

        var infoWindow = new google.maps.InfoWindow({
          content: infoWindowContent
        });

        marker.addListener('click', function() {
          infoWindow.open(map, marker);

          // Request a route from the user's location to the branch
          directionsService.route({
            origin: userLocation,
            destination: branch.location,
            travelMode: 'DRIVING'
          }, function(response, status) {
            if (status === 'OK') {
              directionsRenderer.setDirections(response);
            } else {
              window.alert('Directions request failed due to ' + status);
            }
          });
        });
      });
    }
  });
}

// Function to handle errors in geolocation
function handleLocationError(browserHasGeolocation, infoWindow, center) {
  console.log(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
}

// Function to navigate to the home page
function goToHomePage() {
  window.location.href = 'index.php'; // Replace with your home page URL
}
</script>

<!-- Include the Google Maps JavaScript API with your API key -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT4wihM34RXOsSguNP74i8LzT90iDjXAk&callback=initMap&libraries=geometry,directions"></script>

</body>
</html>
