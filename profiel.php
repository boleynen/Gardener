<?php 
include_once(__DIR__."/includes/menu.inc.php");
include_once(__DIR__."/classes/c.user.php");
include_once(__DIR__."/classes/c.product.php");

$getMyProducts = new Product();
$getMyProducts->setIdUser($myId);
$myProducts = $getMyProducts->fetchMyProducts();

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
        <div id="back-btn">
            <a href="#">&#8249;</a>
        </div>
        <p id="titel-pagina">Mijn profiel</p>
    </div>
    <main>
        <div id="mijn-profiel">
            <img src="avatars/<?php echo $imgPath?>" alt="avatar">
            <div>
                <h2><?php echo $_SESSION['user']; ?></h2>
                <p>Koper & tuinier</p>
                <p><?php echo $_SESSION['email'] ?></p>
            </div>
            <a href="#"><button></button></a>
        </div>
        <div id="mijn-producten">
            <div class="mijn-product">
                <div>

                </div>
                <div>
                    <h3></h3>
                    <p>&euro; <?php ?> / <?php ?></p>
                </div>
            </div>
        </div>
        <div id="mijn-wordshops">
        <?php ?>
        </div>

    </main>

</body>

</html>