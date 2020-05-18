<?php 

include_once(__DIR__."/includes/header.inc.php");
include_once(__DIR__."/classes/c.user.php");

require "vendor/autoload.php";

$geocoder = new \OpenCage\Geocoder\Geocoder('df6afe2aec1a4bb1b39fd65048d2c6b0');

$fetchFarmers = new User();
// $latLngArr = $fetchFarmers->getLatLng();
// var_dump($latLngArr);
// $numLatLngs = count($latLngArr);
// var_dump($numLatLngs);
$farmers = $fetchFarmers->fetchFarmerLocations();

$farmersArr = [];

$numItems = count($farmers);

foreach($farmers as $farmer) {
    $addresses = "'" . $farmer['straat'] . ", " . $farmer['stad'] . "'";
    $farmersArr[] = $addresses;
}

$addresses = $farmersArr;
$results = [];
$i = 0;

foreach ($addresses as $address) {
  $result = $geocoder->geocode($address);
  $msg = $result['status']['message'];
  if ($msg == 'OK'){
      $results[$address] = $result;
      print("<pre>".print_r($result['results'][0]['components']['town'],true)."</pre>");
      print("<pre>".print_r($result['results'][0]['geometry'],true)."</pre>");
       ${'farmer_'.$i++} = $result['results'][0]['geometry'];
    // $result = $result['results'][0]['geometry'];

  } else {
      error_log("failed to geocode '$addresses' : $msg");
  }
}




$markers = 
array(
    'type' => 'FeatureCollection',
    'features' => array(
        'type'          => 'Feature',
        'geometry'      => array(
            'type'          => 'Point',
            'coordinates'   => array($farmer_0['lat'] . "," . $farmer_0['lng'])
        ),
        'properties'    => array(
        'title'         => 'Mapbox',
            'url'           => '#',
            'description'   => 'Some Place'
        )      
    )
);

$geojson = array('type' => 'FeatureCollection', 'features' => array());

    array_push($geojson['features'], $markers);
    // echo json_encode($geojson);


?>
<script>


</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css" />

    <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />
    <link href="https://api.mapbox.com/geocoding/v5" />

    <!-- <script src="https://api.mapbox.com/geocoding/v5/mapbox.places/4.3489,50.6274.json?access_token=pk.eyJ1IjoiYm9sZXluZW4iLCJhIjoiY2s5aWtpajFrMDN2YTNscWEzazZzZXY4dSJ9.Dbze0Z7l4JnwGO4HTPhidg"></script> -->
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


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

        var geojson = {
            type: 'FeatureCollection',
            features: [{
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [5.079318, 51.2670784]
                    },
                    properties: {
                        title: 'Mapbox',
                        url: 'index.php?1',
                        description: 'Staarpad, Retie'
                    }
                },
                {
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [4.4810527, 51.0175734]
                    },
                    properties: {
                        title: 'Mapbox',
                        url: 'index.php?2',
                        description: 'Van Kerckhovenstraat, Mechelen'
                    }
                },
                {
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [5.105809, 51.2533098]
                    },
                    properties: {
                        title: 'Mapbox',
                        url: 'index.php?2',
                        description: 'Turnhoutsebaan, Dessel'
                    }
                }
            ]
        };


        // add markers to map
        geojson.features.forEach(function (marker) {

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

</html>