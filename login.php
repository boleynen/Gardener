<?php 


include_once(__DIR__ . "/classes/c.user.php");

$passwordMatch = true;
if(!empty($_POST['login-submit'])){


    try {

        $verification = new User();
        $verification->setEmail($_POST['email']);
        $verification->setPassword($_POST['wachtwoord']);

        $passwordVerification = $verification->fetchPassword();

        if(password_verify($_POST['wachtwoord'], $passwordVerification)){
            
            $passwordMatch = true;

        }else{

            throw new Exception("Paswoord of emailadres is fout");
            $error = "Paswoord of emailadres is fout";
            $passwordMatch = false;
            
        }

        if($passwordMatch == true){

            session_start();

            $_SESSION['email'] = $_POST['email'];

            $name = $verification->fetchName();

            $name = implode(" ", $name);

            $_SESSION['user'] = $name;
            header("Location: index.php");

        }
    
    } catch (\Throwable $th) {

        $error = $th->getMessage();

    }

}

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

    <img src="images/logo-svg.svg" alt="logo" id="logo">

    <form action="" method="post">

    <h1 id="h1-login">Login</h1>

        <div class="input-form">
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
        </div>

        <div class="input-form">
            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" id="wachtwoord" name="wachtwoord">
        </div>

        <div class="input-form submit-btn">
            <input type="submit" id="submit-btn" name="login-submit" value="LOGIN">
        </div>

        <?php if(isset($error)):?>
            <div class="error" style="color: white;">
            <?php echo $error;?></div>
        <?php endif;?>

    </form>

    <a href="registratie.php" id="redirect-registratie">Heb je nog geen account? Registreer hier.</a>

</body>

</html>