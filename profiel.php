<?php 
include_once(__DIR__."/includes/menu.inc.php");
include_once(__DIR__."/classes/c.user.php");
include_once(__DIR__."/classes/c.product.php");
include_once(__DIR__."/classes/c.workshop.php");

$findId = new User();
$findId->setEmail($_SESSION['email']);
$myId = $findId->fetchMyId();
$myId = implode(" ", $myId);
$myId = intval($myId);

$getMyProducts = new Product();
$getMyProducts->setIdUser($myId);
$myProducts = $getMyProducts->fetchMyProducts();

$getMyWorkshops = new Workshop();
$getMyWorkshops->setIdUser($myId);
$myWorkshops = $getMyWorkshops->fetchMyWorkshops();

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
    <title>Mijn profiel</title>
</head>

<body>

    <div id="top-nav">
        <div id="back-btn" onclick="history.go(-1);">
            <a href="#">&#8249;</a>
        </div>
        <p id="titel-pagina">Mijn profiel</p>
    </div>

    <main>

        <div id="mijn-profiel">
            <div id="pp-wrapper">
                <img src="avatars/<?php echo $imgPath?>" alt="avatar">
            </div>
            <div id="gegevens">
                <h2 id="naam"><?php echo $_SESSION['user']; ?></h2>
                <p id="functie">Koper & tuinier</p>
                <p id="email"><?php echo $_SESSION['email'] ?></p>
            </div>

            <a href="updateProfiel.php" id="update-profiel-btn">
            <i class='fas fa-pen'></i>
            </a>
        </div>

        <h2 id="producten-title">Mijn producten</h2>

        <div id="mijn-producten">

            <?php 
            $keys = array_keys($myProducts);

            for($i = 0; $i < count($myProducts); $i++) {
                ?> 
                <div class="product"> 
                <?php

                    foreach($myProducts[$keys[$i]] as $key => $value) {
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

            <a href="nieuwProduct.php" id="add-product">
                <img src="images/add-icon.svg" alt="add-icon">
            </a>

        </div>
        <h2 id="workshops-title">Mijn Workshops</h2>
        <div id="mijn-workshops">
        <?php 
            $keys = array_keys($myWorkshops);

            for($i = 0; $i < count($myWorkshops); $i++) {
                ?> 
                <div class="workshop"> 
                <?php

                    foreach($myWorkshops[$keys[$i]] as $key => $value) {
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

            <a href="nieuweWorkshop.php" id="add-workshop">
                <img src="images/add-icon.svg" alt="add-icon">
            </a>
        
        </div>

    </main>

</body>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>

</html>