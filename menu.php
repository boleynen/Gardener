<?php 
include_once(__DIR__."/includes/menu.inc.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Document</title>
    
</head>
<body>

    <header>
        <button class="hamburger hamburger--elastic" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
        <div id="menu-container" >
            <div id="user">
                <img src="avatars/<?php echo $imgPath?>" alt="avatar">
                <p><?php echo $_SESSION['user']; ?></p>
            </div>
            <nav id="menu-items">
                <a href="index.php">Producten ontdekken</a>
                <a href="profiel.php">Mijn profiel</a>
                <a href="berichten.php">Berichten</a>
                <a href="volgers.php">Volgers</a>
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