<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Map Quest</title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
        }
        .map-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
        }
        #map {
            height: 500px;
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .map-widget {
            max-width: 1200px;
            width: 100%;
            text-align: center;
        }
        .map-widget h4 {
            margin-bottom: 20px;
            font-size: 2rem;
            color: #333;
            font-weight: 600;
        }
        #location-input {
            width: calc(100% - 120px);
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 20px;
            font-size: 1rem;
            margin-right: 10px;
            transition: border-color 0.3s ease;
        }
        #location-input:focus {
            border-color: #007bff;
            outline: none;
        }
        #search-location {
            width: 120px;
            padding: 12px;
            border: none;
            border-radius: 20px;
            background-color: #007bff;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 10px;
        }
        #search-location:hover {
            background-color: #0056b3;
        }
        #search-location:active {
            background-color: #004494;
        }
        .back-button {
            display: inline-block;
            padding: 12px 24px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        .back-button:active {
            background-color: #004494;
        }
        .location-info {
            margin-top: 20px;
            font-size: 1rem;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="map-container">
        <div class="map-widget">
            <h4>Map Location</h4>
            <div>
                <input type="text" id="location-input" placeholder="Enter location">
                <button id="search-location">Find</button>
            </div>
            <div id="map"></div>
            <div id="location-info" class="location-info"></div>
        </div>
        <a href="dashboard" class="back-button">Kembali</a>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        let map;

        function initMap() {
            map = L.map('map', {
                center: [51.505, -0.09],
                zoom: 13,
                layers: [
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }),
                    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
                        attribution: '© CARTO © OpenStreetMap contributors'
                    })
                ]
            });

            L.control.layers({
                'OpenStreetMap': L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'),
                'Satellite': L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png')
            }).addTo(map);
        }

        document.getElementById('search-location').addEventListener('click', function() {
            const location = document.getElementById('location-input').value;
            if (location) {
                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(location)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        const locationData = data[0];
                        const lat = locationData.lat;
                        const lng = locationData.lon;
                        const displayName = locationData.display_name;

                        map.setView([lat, lng], 13);
                        L.marker([lat, lng]).addTo(map).bindPopup(displayName).openPopup();

                        document.getElementById('location-info').innerText = `Location: ${displayName}`;
                    } else {
                        document.getElementById('location-info').innerText = 'No location found.';
                    }
                })
                .catch(error => {
                    console.error('Error fetching location data:', error);
                    document.getElementById('location-info').innerText = 'Error fetching location data.';
                });
            } else {
                document.getElementById('location-info').innerText = 'Please enter a location.';
            }
        });

        window.onload = initMap;
    </script>
</body>
</html>
