
<!DOCTYPE html>
<html>
<head>
    
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>PHP/MySQL & Google Maps Example</title>
    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>-->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT4wihM34RXOsSguNP74i8LzT90iDjXAk"></script>


    <script type="text/javascript">
        //<![CDATA[
        var map; // Define map as a global variable
   
        function load() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: new google.maps.LatLng(22.6145,77.3418),
                zoom: 7,
                mapTypeId: 'roadmap'
            });
            var infoWindow = new google.maps.InfoWindow;
            var gm_markers = []; // Define gm_markers as an array

            // Change this depending on the name of your PHP file
            downloadUrl("http://localhost/Food_delivery/maps/xml.php", function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName("marker");
                for (var i = 0; i < markers.length; i++) {
                    var id = markers[i].getAttribute("id");
                    var name = markers[i].getAttribute("name");
                    var point = new google.maps.LatLng(
                        parseFloat(markers[i].getAttribute("lat")),
                        parseFloat(markers[i].getAttribute("lng")));
                    var html = name;
                    var icon = 'http://labs.google.com/ridefinder/images/mm_20_blue.png';
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        title: name
                    });
                    addMarker(point,name, map, gm_markers, marker); // Pass map and other variables to addMarker function
                    bindInfoWindow(marker, map, infoWindow, html);

                }
            });
        }
     
        var infowindow;
        function addMarker(latLng, contentstr, map, gm_markers, marker) {
            google.maps.event.addListener(marker, 'click', function() {   
                infowindow = new google.maps.InfoWindow({
                    content: contentstr
                });  
            });
            gm_markers.push(marker);
            setAllMap(map, gm_markers);
        }

        function setAllMap(map, gm_markers) {
            for (var i = 0; i < gm_markers.length; i++) {
                gm_markers[i].setMap(map);
            }
        }

        function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function( ){
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
        }

        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    request.onreadystatechange = doNothing;
                    callback(request, request.status);
                }
            };

            request.open('GET', url, true);
            request.send(null);
        }

        function doNothing() {}
        //]]>
    </script>
</head>

<body onload="load()">
    <div id="map-canvas-show" style="width: 100%; height: 300px;"></div> 
</body>
</html>
