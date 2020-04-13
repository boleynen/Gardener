<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Registratie</title>
</head>
<body>

    <form action="" method="post">

        <div class="input-form">
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
        </div>

        <div class="input-form">
            <label for="wachtwoord">Wachtwoord</label>
            <input type="text" id="wachtwoord" name="wachtwoord">
        </div>

        <div class="input-form">
            <label for="wachtwoord-bevestigen">Bevestig je wachtwoord</label>
            <input type="text" id="wachtwoord-bevestigen" name="wachtwoord-bevestigen">
        </div>

        <div class="input-form submit-btn">
            <input type="submit" id="submit-btn" value="REGISTREREN">
        </div>

    </form>

    <a href="login.php" id="redirect-login">Heb je al een account? Log hier in.</a>

</body>
</html>