<?php 
include_once(__DIR__."/includes/header.inc.php");
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
    <form id="form-vervolledig" action="includes/profielVervolledigen.inc.php" method="post" enctype="multipart/form-data">

        <h1>Bijna klaar!</h1>

        <div class="input-form">
            <label for="voornaam">Voornaam</label>
            <input type="text" id="voornaam" name="voornaam">
        </div>

        <div class="input-form">
            <label for="avatar">Achternaam</label>
            <input type="text" id="achternaam" name="achternaam">
        </div>

        <div class="input-form input-avatar">
            <label for="avatar">Kies een profielfoto</label>
            <input type="file" id="avatar-input" name="avatar" accept="image/*" onchange="loadFile(event)">
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