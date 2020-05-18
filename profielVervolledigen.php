<?php 
include_once(__DIR__."/includes/header.inc.php");
include_once(__DIR__."/classes/c.profielVervolledigen.php");

if(isset($_POST['vervolledig-submit'])){

    $voornaam       = $_POST['voornaam'];
    $achternaam     = $_POST['achternaam'];
    $stad           = $_POST['stad'];
    $straat         = $_POST['straat'];

    $userid         = $_SESSION['userid']; 
    $useremail      = $_SESSION['useremail'];

    $file           = $_FILES['avatar'];
    $fileName       = $_FILES['avatar']['name'];
    $fileTmpName    = $_FILES['avatar']['tmp_name'];
    $fileSize       = $_FILES['avatar']['size'];
    
    $fileError      = $_FILES['avatar']['error'];
    $fileExt        = explode(".", $fileName);
    $fileActualExt  = strtolower(end($fileExt));
    $fileNameNew    = uniqid('', true).".".$fileActualExt;
    
    $allowed        = array('jpg', 'jpeg', 'png');

    if($fileError == 4  || empty($voornaam) || empty($achternaam) || empty($stad) || empty($straat)){

        $error = "Je moet alle velden invullen om door te gaan.";
        exit();

    }else{
        $vervolledig = new Complete();

        $vervolledig->setFirstname($voornaam);
        $vervolledig->setLastname($achternaam);
        $vervolledig->setCity($_POST['stad']);
        $vervolledig->setStreet($_POST['straat']);
        $vervolledig->setAvatar($fileNameNew);
        $vervolledig->setEmail($useremail);

        $vervolledig->saveProfile();
    }

    if(in_array($fileActualExt, $allowed)){
    
        if($fileError === 0){
            if($fileSize < 2000000){

                $fileDestination = 'C:/xampp/htdocs/lab2/Gardener/avatars/'.$fileNameNew;

                move_uploaded_file($fileTmpName, $fileDestination);

                header("Location: ../gardener/login.php");

            }else{

                echo "Je bestandstype is te groot. (max. 2MB)";

            }

        }else{

            echo "Error: Uploaden mislukt.";
            echo $fileError;

        }

    }else{

        echo "Dit bestandstype is niet juist (enkel jpg, jpeg, png)";

    }
    



}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"/> -->
    <title>Profiel vervolledigen</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <form id="form-vervolledig" action="" method="post" enctype="multipart/form-data">

        <h1>Bijna klaar!</h1>

        <?php if(isset($error)):?>
            <div class="error" style="color: white;">
            <?php echo $error;?></div>
        <?php endif;?>

        <div class="input-form">
            <label for="voornaam">Voornaam</label>
            <input type="text" id="voornaam" name="voornaam">
        </div>

        <div class="input-form">
            <label for="Achternaam">Achternaam</label>
            <input type="text" id="achternaam" name="achternaam">
        </div>

        <div class="input-form">
            <label for="stad">Stad</label>
            <input type="text" id="stad" name="stad">
        </div>

        <div class="input-form">
            <label for="straat">Straat</label>
            <input type="text" id="straat" name="straat">
        </div>

        <div class="input-form input-avatar">
            <label for="avatar">Kies een profielfoto</label>
            <input type="file" id="avatar-input" name="avatar" accept="image/*" onchange="loadFile(event)" style="display:block">
            <img id="output" width="150" />
        </div>

        <div class="input-form submit-btn">
            <input type="submit" id="submit-btn" class="submit-avatar" name="vervolledig-submit" value="START">
        </div>

        <?php if(isset($error)):?>
        <div class="error" style="color: red;">
            <?php echo $error;?></div>
        <?php endif; ?>


    </form>
</body>

<script>
    let loadFile = function (event) {
        let image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

</html>