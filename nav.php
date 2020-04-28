<?php 
include_once(__DIR__."/includes/nav.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

    <header>
        <button class="hamburger hamburger--elastic" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
        <div id="menu-container">
            <div id="user">
                <img src="avatars/<?php echo $imgPath?>" alt="avatar">
                <p><?php echo $_SESSION['uservoornaam']." ".$_SESSION['userachternaam']; ?></p>
            </div>
            <nav id="menu-items">
                <a href="index.php">Producten ontdekken</a>
                <a href="profiel.php">Mijn profiel</a>
                <a href="berichten.php">Berichten</a>
                <a href="vrienden.php">Vrienden</a>
                <a href="instellingen.php">Instellingen</a>
            </nav>
            <div id="logout">
                <a href="logout.php">Uitloggen</a>
            </div>
        </div>
    </header>

    <script src="js/menu.js"></script>
</body>
</html>