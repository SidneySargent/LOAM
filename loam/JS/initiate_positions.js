map.on('load', () => {
    // Add the marker
    map.loadImage(
        'marker.png',
        (error, image) => {
            if (error) throw error;
            map.addImage('position-icon', image);
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
            map.addSource('new_position', {
                'type': 'geojson',
                'data': null
            })
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
        });
});