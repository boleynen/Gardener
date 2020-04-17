<?php 

include_once(__DIR__."/includes/header.inc.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>

<body>

    <form action="includes/login.inc.php" method="post">

        <div class="input-form">
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
        </div>

        <div class="input-form">
            <label for="wachtwoord">Wachtwoord</label>
            <input type="text" id="wachtwoord" name="wachtwoord">
        </div>

        <div class="input-form submit-btn">
            <input type="submit" id="submit-btn" name="login-submit" value="LOGIN">
        </div>

    </form>

    <a href="registratie.php" id="redirect-registratie">Heb je nog geen account? Registreer hier.</a>

</body>

</html>