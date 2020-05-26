<?php
include_once(__DIR__."/classes/c.user.php");

$getproduct = new User();

$getproduct->setUId($_GET['id']);

$product = $getproduct->fetchProduct();

$getproduct->setUid($product[0]['idUser']);

$location = $getproduct->getLocation();
$location = implode(", ", $location[0]);


$user = $getproduct->getUser();





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<div id="product-extra-wrap">
        <div id="product-extra">
            <a href="index.php" id="exit-product">X</a>
            <div class="product-img-wrapper">
                <img src="images/tomatoes.png" alt="foto product">
            </div>

            <div class="product-content">

                <h2><?php echo $product[0]['naam'] ?></h2>
                <p><?php echo $product[0]['type'] ?></p>
                <p>&euro; <?php echo $product[0]['prijs'] ?> / <?php echo $product[0]['eenheid'] ?></p>

                <h3>Beschrijving</h3>
                <p><?php echo $product[0]['beschrijving'] ?></p>

                <h3>Op de kaart</h3>
                <p><?php echo $location ?></p>

                <div id="seller-wrapper">
                    <div>
                        <div class="img-wrapper">
                            <img src="avatars/<?php echo $user[0]['avatar'] ?>" alt="profielfoto verkoper">
                        </div>
                        <div id="seller-info">
                            <h3><?php echo $user[0]['voornaam'] ?>
                            <?php echo $user[0]['achternaam']?>
                            </h3>
                            <p>Verkoper</p>
                        </div>
                    </div>
                    <a href="#">Chat</a>
                </div>
            </div>
        </div>
        <div id="product-ctas">
            <div>
                <a href="#"></a>
            </div>
            <div class="koop-cta">
                <a href="#">koop</a>
            </div>
            <div>
                <a href="#"></a>
            </div>
        </div>
    </div>
</body>
</html>