<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/main.css" />
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.10.0/mapbox-gl.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.10.0/mapbox-gl.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <header>
        <?php require_once(__DIR__ . '/header.php'); ?>
    </header>
    <fieldset>
        <!-- When not loged -->
        <?php require_once(__DIR__ . '/login.php'); ?>
        <!-- When loged -->
        <?php if (isset($_SESSION['LOGGED_USER'])): ?>
            <section class="map_interface">
                <div id="map"></div>
                <script>
                    mapboxgl.accessToken = 'pk.eyJ1Ijoic2lkbmV5cyIsImEiOiJjbTkxMzJiZ2wwdGF6MmpzODloMnBqNzc4In0.IX-cXWzyl0Ikf22uT1Ia5Q';
                    const map = new mapboxgl.Map({
                        container: 'map', // container ID
                        center: [2.75, 46.6], // starting position [lng, lat]. Note that lat must be set between -90 and 90
                        zoom: 5 // starting zoom
                    });
                </script>
                <pre id="info">
                <div class="layers">
                    <button id="existing_coordinates">Existants</button>
                    <button id="new_coordinates">Ajouter</button>
                </div>
                <!-- Display data's locations -->
                <div class="map_details" id="map_details">
                </div>
                <!-- Add a new location with a form -->
                <div class="new_location_form">
                    <form method="POST" action="http://localhost/loam/src/controllers/post_new_location.php" id="form_new_location">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name">
                        <div style="display: none;">
                            <label for="coordinates">Coordonnées GPS</label>
                            <input type="number" name="long" id="long" step="0.000001" min="-90" max="90" >
                            <input type="number" name="lat" id="lat" step="0.000001" min="-90" max="90" >
                        </div>
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="8">Description de l'endroit, de l'activité.</textarea>
                        <input type="submit" name="submit_new_location" id="submit_new_location">
                    </form>
                    </div>
                </pre>
            </section>
        <?php endif; ?>
    </fieldset>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>

</html>


<script src="http://localhost/loam/JS/initiate_positions.js"></script>
<script src="http://localhost/loam/JS/layer_choice.js"></script>
<script src="http://localhost/loam/JS/activity_informations.js"></script>