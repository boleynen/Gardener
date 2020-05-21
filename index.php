<?php 

include_once(__DIR__."/includes/header.inc.php");
include_once(__DIR__."/classes/c.user.php");

require "vendor/autoload.php";

$geocoder = new \OpenCage\Geocoder\Geocoder('df6afe2aec1a4bb1b39fd65048d2c6b0');

$fetchFarmers = new User();

$latLngArr = $fetchFarmers->getLatLng();
$numLatLngs = count($latLngArr);

$farmers = $fetchFarmers->fetchFarmerLocations();
$numItems = count($farmers);

$farmerNames = $fetchFarmers->getFarmerName();

$farmerIds = $fetchFarmers->getFarmerId();

$farmersArr = [];




foreach($farmers as $farmer) {
    $addresses = $farmer['straat'] . ", " . $farmer['stad'];
    $farmersArr[] = $addresses;
}

foreach($farmerNames as $farmerName) {
    $names = $farmerName['voornaam'] . " " . $farmerName['achternaam'];
    $namesArr [] = $names;
}

foreach($farmerIds as $farmerId) {
    $ids = $farmerId['id'];
    $idsArr [] = $ids;
}


$phpLocations = array();

$p = 0;
foreach($latLngArr as $item){
    foreach($farmers as $farmer) {
        foreach($farmerNames as $name) {
            foreach($farmerIds as $Ids) {
                $phpLocations[$p]   = [
                    'title'         => $namesArr[$p],
                    'url'           => 'userProfiel.php?Uid='.$idsArr[$p],
                    'description'   => $farmersArr[$p],
                    'lat'           => floatval($latLngArr[$p]['lat']),
                    'lng'           => floatval($latLngArr[$p]['lng'])
                ];
            }
        }
    }
    $p++;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />
    <link href="https://api.mapbox.com/geocoding/v5" />
    <script type="text/javascript" src="js/geojson.min.js"></script>
    <!-- <script src="https://api.mapbox.com/geocoding/v5/mapbox.places/4.3489,50.6274.json?access_token=pk.eyJ1IjoiYm9sZXluZW4iLCJhIjoiY2s5aWtpajFrMDN2YTNscWEzazZzZXY4dSJ9.Dbze0Z7l4JnwGO4HTPhidg"></script> -->
    



    <title>Homepagina</title>
</head>

<body>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js">
    </script>
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
        type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>

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
 
        <a href="#" id="product">
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
            <div id="product-img-wrapper" >
                <img src="images/tomato-placeholder.png" alt="foto product">
            </div>
            <div id="product-info">
                <h2>Rode tomaten</h2>
                <p>&euro;3,00/KG</p>
                <p>Bruul, Mechelen</p>
            </div>
        </a>

    </div>
</body>
<script>
        // INSERT MAP IN HOMEPAGE

        mapboxgl.accessToken =
            'pk.eyJ1IjoiYm9sZXluZW4iLCJhIjoiY2s5aWtpajFrMDN2YTNscWEzazZzZXY4dSJ9.Dbze0Z7l4JnwGO4HTPhidg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/boleynen/cka5fprvi12781ilju4mqed5v',
            center: [4.3489, 50.6274],
            zoom: 7.15
        });
        map.addControl(
            new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl
            })
        );

var passedArray = <?php echo json_encode($phpLocations); ?>;

console.log(passedArray);


    var GeoJSONdata = GeoJSON.parse(passedArray, {Point: ['lat', 'lng']});
    console.log(GeoJSONdata);
    
    
        // add markers to map
        GeoJSONdata.features.forEach(function (marker) {

            // create a HTML element for each feature
            var el = document.createElement('div');
            el.className = 'marker';

            // make a marker for each feature and add to the map
            new mapboxgl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .setPopup(new mapboxgl.Popup({
                        offset: 25
                    }) // add popups
                    .setHTML('<h3><a href="' + marker.properties.url + '">' + marker.properties.title + '</a></h3><p>' + marker.properties.description +
                        '</p>'))
                .addTo(map);
        });
    </script>

    <script src="js/index.js"></script>

    <script>



</script>

</html> 