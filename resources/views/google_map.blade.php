<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 10px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 34px;
            }
            #map {
                height: 300px;
                border: 1px dotted #636b6f;
            }
        </style>
    </head>
    <body>
        <div>
            <div class="content">
                <div class="title">
                    Google Map
                </div>
                <div id="map"></div>
            </div>
            <script>
        function initMap() {
            position = {
                lat: 35.7111434,
                lng: 139.7963807
            }

            const map = new google.maps.Map(document.getElementById('map'), {
                center: position,
                zoom: 19
            });
            const infoWindow = new google.maps.InfoWindow({
                content: "",
                disableAutoPan: true,
            });

            const marker = new google.maps.Marker({
                position: position,
                map: map,
            });
            marker.addListener("click", () => {
                infoWindow.setContent('雷門');
                infoWindow.open(map, marker);
            });
        }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap&v=weekly" async></script>
        </div>
    </body>
</html>