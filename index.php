<?php 

include_once(__DIR__."/includes/header.inc.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css"/>

    <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />

    <title>Homepagina</title>
</head>
<body>

    <?php include_once(__DIR__."/nav.php");?>

    <div id='map'></div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYm9sZXluZW4iLCJhIjoiY2s5aWtpajFrMDN2YTNscWEzazZzZXY4dSJ9.Dbze0Z7l4JnwGO4HTPhidg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11'
        });
    </script>
</body>
</html>