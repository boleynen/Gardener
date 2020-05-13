<?php 

include_once(__DIR__."/includes/header.inc.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css" />

    <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />
    <link href="https://api.mapbox.com/geocoding/v5"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    

    <title>Homepagina</title>
</head>

<body>

    <?php include_once(__DIR__."/menu.php");?>

    <!-- <div id="darken"></div> -->
    <div id="map"></div>

    <form action="" method="post" id="index-zoek">
        <input type="text" id="zoek-input">
        <input type="submit" id="submit-zoek" value="">
    </form>

    <div id="voeg-toe-show">
        <button>
            <a href="nieuwProduct.php" id="nieuw-product-btn">Voeg product toe</a>
        </button>
        <button>
            <a href="nieuweWorkshop.php" id="nieuw-workshop-btn">Voeg workshop toe</a>
        </button>
    </div>

    <button type="button" id="voeg-toe-btn" class=""></button>

    <div id="producten">
        <a href="#" id="product" class="clearfix">
            <div id="product-img-wrapper">
                <img src="images/tomato-placeholder.png" alt="foto product">
            </div>
            <div id="product-info">
                <h2>Rode tomaten</h2>
                <p>&euro;3,00/KG</p>
                <p>Bruul, Mechelen</p>
            </div>
        </a>
        <a href="#" id="product">
            <div id="product-img-wrapper" class="clearfix">
                <img src="images/tomato-placeholder.png" alt="foto product">
            </div>
            <div id="product-info">
                <h2>Rode tomaten</h2>
                <p>&euro;3,00/KG</p>
                <p>Bruul, Mechelen</p>
            </div>
        </a>
    </div>

    <script>
        mapboxgl.accessToken =
            'pk.eyJ1IjoiYm9sZXluZW4iLCJhIjoiY2s5aWtpajFrMDN2YTNscWEzazZzZXY4dSJ9.Dbze0Z7l4JnwGO4HTPhidg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/boleynen/cka5fprvi12781ilju4mqed5v',
            center: [4.3489, 50.6274],
            zoom: 7.15
        });
    </script>

    <script src="js/index.js"></script>
    <!-- <script src="js/menu.js"></script> -->
</body>

</html>