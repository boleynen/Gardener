<?php 
include_once(__DIR__."/includes/header.inc.php");
include_once(__DIR__."/classes/c.product.php");
include_once(__DIR__."/classes/c.workshop.php");
include_once(__DIR__."/classes/c.user.php");

$uId = intval($_GET['Uid']);

$fetchUser = new User();
$fetchUser->setUId($uId);

$userProfile = $fetchUser->getUser();

$userFirstname  = $userProfile[0]['voornaam'];
$userLastname   = $userProfile[0]['achternaam'];
$userEmail      = $userProfile[0]['email'];
$imgPath        = $userProfile[0]['avatar'];

$fetchUserProducts = new Product();
$fetchUserProducts->setIdUser($uId);
$userProducts = $fetchUserProducts->fetchUserProducts();

$fetchUserWorkshops = new Workshop();
$fetchUserWorkshops->setIdUser($uId);
$userWorkshops = $fetchUserWorkshops->fetchUserProducts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Profiel</title>
</head>
<body>

    <div id="top-nav">
        <div id="back-btn" onclick="history.go(-1);">
            <a href="#">&#8249;</a>
        </div>
        <p id="titel-pagina">Profiel van <?php echo $userFirstname ?></p>
    </div>

    <main>
        <div id="mijn-profiel">
            <div id="pp-wrapper">
                <img src="avatars/<?php echo $imgPath?>" alt="avatar">
            </div>
            <div id="gegevens">
                <h2 id="naam"><?php echo $userFirstname." ".$userLastname ?></h2>
                <p id="functie">Koper & tuinier</p>
                <p id="email"><?php echo $userEmail ?></p>
            </div>

        </div>

        <h2 id="producten-title">Producten van <?php echo $userFirstname?></h2>

        <div id="mijn-producten">

        <?php 
            $keys = array_keys($userProducts);

            for($i = 0; $i < count($userProducts); $i++) {
            ?> 

            <div class="product">
            <?php

                    foreach($userProducts[$keys[$i]] as $key => $value) {
                        switch($key){
                            case "naam": ?> 
                                <h3 class="naam-product">
                                    <?php echo  $value ?>
                                </h3> <?php ;
                                break;
                            case "prijs": ?>
                                <p class="prijs-product"> &euro; 
                                    <?php echo $value ?> 
                                </p> <?php ;
                                break;
                            case "eenheid": ?>
                                <p class="eenheid-product"> / 
                                    <?php echo $value ?> 
                                </p> <?php ;
                                break;
                            case "fotos": ?> 
                                <div class="img-wrapper">
                                <img class="foto-product" src="images/<?php echo $value ?>"> 
                                </div> <?php ;
                                break;
                        }
                    }

                ?> 
            </div>
        <?php
            }
        ?>

        </div>

        <h2 id="workshops-title">Workshops van <?php echo $userFirstname?></h2>
        <div id="mijn-workshops">
            <?php 
            $keys = array_keys($userWorkshops);

            for($i = 0; $i < count($userWorkshops); $i++) {
            ?> 
                
                <div class="workshop"> 
                <?php

                    foreach($userWorkshops[$keys[$i]] as $key => $value) {
                        switch($key){
                            case "naam": ?> 
                                <h3 class="naam-workshop">
                                    <?php echo  $value ?>
                                </h3> <?php ;
                                break;
                            case "datum": ?>
                                <p class="datum-workshop"> 
                                    <?php echo $value ?> 
                                </p> <?php ;
                                break;
                            case "locatie": ?>
                                <p class="locatie-workshop">  
                                    <?php echo $value ?> 
                                </p> <?php ;
                                break;
                            case "foto": ?> 
                                <div class="img-wrapper">
                                <img class="foto-workshop" src="images/<?php echo $value ?>"> 
                                </div> <?php ;
                                break;
                        }
                    }

                ?> 
                </div>
                
            <?php
            }
            ?>
        </div>


    </main>
    
</body>
</html>