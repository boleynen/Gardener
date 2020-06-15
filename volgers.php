<?php 
include_once(__DIR__."/includes/header.inc.php");
include_once(__DIR__."/classes/c.volgers.php");
include_once(__DIR__."/classes/c.user.php");

$fetchUser = new User();
$fetchUser->setEmail($_SESSION['email']);
$myId = $fetchUser->fetchMyId();
$myId = implode(" ", $myId);

$follow = new Volg();
$follow->setIdVolger($myId);
$following = $follow->fetchFollowers();




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
    <title>Document</title>
</head>
<body>
    <div id="top-nav">
        <div id="back-btn" onclick="history.go(-1);">
            <a href="#">&#8249;</a>
        </div>
        <p id="titel-pagina">Volgers</p>
    </div>
    
     <main>
        <div id="volgend-wrapper">
            <h2>Volgend</h2>

            <div class="ik-volg">
                <div>
                    <img src="avatars/5ea7114e432280.12426666.jpg" alt="profielfoto">
                </div>
                <h3>Bo Leynen</h3>
            </div>
        </div>
        <div id="volgers-wrapper">
            <h2>Volgers</h2>
            <div class="volgt-mij">
                <div>
                    <img src="avatars/5ea7114e432280.12426666.jpg" alt="profielfoto">
                </div>
                <h3>Bo Leynen</h3>
            </div>
        </div>
     </main>
<?php 

print_r($following); ?>

</body>
</html>