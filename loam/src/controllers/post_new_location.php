<?php
session_start();
require_once(__DIR__ . '/../mysql.php');
require_once(__DIR__ . '/../databaseconnect.php');
require_once(__DIR__ . '/../functions.php');

// Path to GeoJSON file
$geojson_file = __DIR__ . '/../lib/positions.geojson';

// Catch coords data
$data = [
    'longitude' => (float)$_POST['long'],
    'latitude' => (float)$_POST['lat'],
    'name' => htmlspecialchars($_POST['name']),
    'description' => htmlspecialchars($_POST['description']),
    'date' => date('Y-m-d H:i:s')
];


// Read position.geojson
$geojson = json_decode(file_get_contents($geojson_file), true);

// New feature creation
$new_feature = [
    'type' => 'Feature',
    'geometry' => [
        'type' => 'Point',
        'coordinates' =>  [$data['longitude'], $data['latitude']]
    ],
    'properties' => [
        'name' => $data['name'],
        'description' => $data['description'],
        'date' => $data['date']
    ]
];

// Add new_feature to position.geojson
$geojson['features'][] = $new_feature;

// Save modifications
file_put_contents($geojson_file, json_encode($geojson, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

redirectToUrl('http://localhost/loam/index.php');