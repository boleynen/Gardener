<?php 


include_once(__DIR__ . "/classes/c.registratie.php");

$emailVerification = true;
$passwordVerification = true;

if(!empty($_POST['registratie-submit'])){
    try {
        $user = new Signup();
        $user->setUsername($_POST['gebruikersnaam']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['wachtwoord']);
        $user->setPasswordConfirmation($_POST['wachtwoord-bevestigen']);

        $allEmails = Signup::getEmails();

        foreach($emails as $email){
            if($_POST['email'] == $email['email']){
                $emailVerification = false;
            }
        }

        if($emailVerification == false){
            throw new Exception("Dit emailadres is al in gebruik");
        }

        if($_POST["wachtwoord"] != $_POST["wachtwoord-bevestigen"]){
            throw new Exception("De paswoorden zijn niet hetzelfde");
            $passwordVerification = false;
        }

        if($emailVerification == true && $passwordVerification == true){
            $user->saveNewUser();

            session_start();

            $_SESSION['userid'] = $row['id'];
            $_SESSION['usergebruikersnaam'] = $_POST['gebruikersnaam'];
            $_SESSION['useremail'] = $_POST['email'];

            header("Location: profielVervolledigen.php");
        }

    } catch (\Throwable $th) {
        //throw $th;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Registratie</title>
</head>
<body>

    <img src="images/logo-svg.svg" alt="logo" id="logo" class="smaller-img">

    <form action="" method="post">

        <div class="input-form">
            <label for="gebruikersnaam">Gebruikersnaam</label>
            <input type="text" id="gebruikersnaam" name="gebruikersnaam">
        </div>
    
        <div class="input-form">
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
        </div>

        <div class="input-form">
            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" id="wachtwoord" name="wachtwoord">
        </div>

        <div class="input-form">
            <label for="wachtwoord-bevestigen">Bevestig je wachtwoord</label>
            <input type="password" id="wachtwoord-bevestigen" name="wachtwoord-bevestigen">
        </div>

        <div class="input-form submit-btn">
            <input type="submit" id="submit-btn" name="registratie-submit" value="REGISTREREN"></input>
        </div>

    </form>



    <a href="login.php" id="redirect-login">Heb je al een account? Log hier in.</a>

</body>
</html>