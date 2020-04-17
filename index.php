<?php 

include_once(__DIR__."/includes/header.inc.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Homepagina</title>
</head>
<body>

    <p>hello, <?php echo $_SESSION['usergebruikersnaam']; ?>!</p>
</body>
</html>