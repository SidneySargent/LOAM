const existingc = document.getElementById("existing_coordinates");
const newc = document.getElementById("new_coordinates");
const form_new_location = document.getElementById("form_new_location");
const map_details = document.getElementById("map_details");

existingc.addEventListener("click", () => {
    if (map.getSource('existing_positions')) {
        map.removeLayer('pos');
        map.removeSource('existing_positions');
    }
    if (map.getSource('new_position')) {
        map.removeLayer('pos2');
        map.removeSource('new_position');
    }

    map.addSource('existing_positions', {
        'type': 'geojson',
        'data': 'http://localhost/loam/src/lib/positions.geojson'
    });
    map.addLayer({
        'id': 'pos',
        'type': 'symbol',
        'source': 'existing_positions',
        'layout': {
            'icon-image': 'position-icon',
            'icon-size': 0.7,
            'icon-anchor': 'bottom',
            'icon-offset': [0, 0]
        }
    });

    form_new_location.style.display = 'none';
    map_details.style.display = 'block';
});

newc.addEventListener("click", () => {
    if (map.getSource('existing_positions')) {
        map.removeLayer('pos');
        map.removeSource('existing_positions');
        console.log('existing suppr');
    }
    if (map.getSource('new_position')) {
        map.removeLayer('pos2');
        map.removeSource('new_position');
    }

    let geojsonData;

    fetch('http://localhost/loam/src/lib/positions.geojson')
        .then(response => response.json())
        .then(data => {
            geojsonData = data;
        });

    map.on('click', (e) => {
        // Update coordinates
        const coords = e.lngLat.wrap();
        /*
        document.getElementById('info').innerHTML = 
            `Longitude: ${coords.lng.toFixed(4)}<br>Latitude: ${coords.lat.toFixed(4)}`;
        */
        let acoords = {
            lng: coords.lng,
            lat: coords.lat
        };

        document.getElementById('long').value = coords.lng.toFixed(6);
        document.getElementById('lat').value = coords.lat.toFixed(6);


        var newPoint = {
            "type": "Feature",
            "geometry": {
                "type": "Point",
                "coordinates": [coords.lng, coords.lat]
            },
            "properties": {

            }
        };
        geojsonData.features.push(newPoint);

        // Add new source and layer if don't exist
        if (!map.getSource('existing_positions') && !map.getSource('new_position')) {
            map.addSource('new_position', {
                'type': 'geojson',
                'data': null
            });
            map.addLayer({
                'id': 'pos2',
                'type': 'symbol',
                'source': 'new_position',
                'layout': {
                    'icon-image': 'position-icon',
                    'icon-size': 0.7,
                    'icon-anchor': 'bottom',
                    'icon-offset': [0, 0]
                }
            });
            form_new_location.style.display = 'flex';
            map_details.style.display = 'none';
        }

        // Update existing source
        if (map.getSource('new_position')) {
            map.getSource('new_position').setData({
                'type': 'FeatureCollection',
                'features': [{
                    'type': 'Feature',
                    'geometry': {
                        'type': 'Point',
                        'coordinates': [coords.lng, coords.lat]
                    },
                    'properties': {
                        'title': 'Position'
                    }
                }]
            });
            form_new_location.style.display = 'flex';
            map_details.style.display = 'none';
        }
    });
});