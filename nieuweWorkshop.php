<?php 

include_once(__DIR__."/classes/c.workshop.php");
include_once(__DIR__."/classes/c.user.php");

session_start();

$findId = new User();
$findId->setEmail($_SESSION['email']);
$myId = $findId->fetchMyId();
$myId = implode(" ", $myId);
$myId = intval($myId);

if(isset($_POST["btn-workshop-voegtoe"])){
    try {
        $addWorkshop = new Workshop();

        $prijs = "";
        $gratis = "";

        if($_POST['gratis'] == "on"){
            $prijs = 0;
            $gratis = 1;          
        }else{  
            $prijs = $_POST['prijsWorkshop'];
            $gratis = 0;
        }

        $addWorkshop->setIdUser($myId);
        $addWorkshop->setName($_POST['naamWorkshop']);
        $addWorkshop->setDate($_POST['datumWorkshop']);
        $addWorkshop->setStart($_POST['startUur']);
        $addWorkshop->setLocation($_POST['locatieWorkshop']);
        $addWorkshop->setPrice($prijs);
        $addWorkshop->setFree($gratis);
        $addWorkshop->setDescription($_POST['beschrijvingWorkshop']);
        $addWorkshop->setPicture($_POST['fotoProduct1']);

        $addWorkshop->saveWorkshop();

        $message = "Je workshop is toegevoegd!";

        echo "<script type='text/javascript'>alert('$message');</script>";


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
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <title>Document</title>
</head>

<body>
    <div id="top-nav">
        <div id="back-btn" onclick="history.go(-1);">
            <a href="#">&#8249;</a>
        </div>
        <p id="titel-pagina">Voeg een workshop toe</p>
    </div>

    <main>
        <!-- <div id="workshop-succes" class="succes-msg" style="display:none;">
            <p>Je workshop is toegevoegd!</p>
        </div> -->

        <form action="" method="post" id="form-product">

            <div class="input-wrapper">
                <label for="naamWorkshop" class="input-title">Titel</label>
                <input type="text" name="naamWorkshop" class="input-text-style"
                    placeholder="Hoe heet je workshop?">
            </div>

            <div class="input-wrapper">
                <label for="soort" class="input-title">Datum</label>
                <input type="date" name="datumWorkshop" class="input-text-style"
                    placeholder="Wanneer vindt het plaats?">
            </div>

            <div class="input-wrapper">
                <label for="startUur" class="input-title">Start uur</label>
                <input type="time" name="startUur" class="input-text-style" placeholder="Hoelaat begint je workshop?">
            </div>

            <div class="input-wrapper">
                <label for="locatieWorkshop" class="input-title">Locatie</label>
                <input type="text" name="locatieWorkshop" class="input-text-style" placeholder="Waar vindt je workshop plaats?">
            </div>

            <div class="input-wrapper">
                <label for="prijsWorkshop" class="input-title">Prijs</label>
                <div id="currency-flex">
                    <input type="number" name="prijsWorkshop" class="input-text-style input-currency" placeholder="0,00">

                    <div class="input-switch-style">
                        <label class="switch">
                            <input type="hidden" name="gratis" value="0">
                            <input type="checkbox" name="gratis" id="gratis-toggle">                           
                            <span class="slider round"></span>
                        </label>
                        <label for="gratis" class="input-title input-title-switch">Gratis</label>
                    </div>
                </div>
            </div>

            <div class="input-wrapper">
                <label for="beschrijvingWorkshop" class="input-title">Beschrijving</label>
                <textarea type="text" name="beschrijvingWorkshop" class="input-text-style input-bigger"
                    placeholder="Beschrijf je workshop..."></textarea>
            </div>

            <div class="input-wrapper">
                <label for="fotoProduct" class="input-title">Voeg foto's toe</label>

                <div id="input-file-wrapper">
                    <label for="fotoProduct1" class="custom-file-upload" id="upload-file1">
                        <i class="fa fa-cloud-upload"></i>
                        <img src="#" alt="" id="img-preview1">
                    </label>
                    <input type="file" name="fotoProduct1" class="input-file-style inputfile" id="file-input1" onchange="loadFile1(event)">

                    <label for="fotoProduc2" class="custom-file-upload" id="upload-file2">
                        <i class="fa fa-cloud-upload"></i>
                        <img src="#" alt="" id="img-preview2">
                    </label>
                    <input type="file" name="fotoProduct2" class="input-file-style inputfile" id="file-input2" onchange="loadFile2(event)">

                    <label for="fotoProduct3" class="custom-file-upload" id="upload-file3">
                        <i class="fa fa-cloud-upload"></i>
                        <img src="#" alt="" id="img-preview3">
                    </label>
                    <input type="file" name="fotoProduct3" class="input-file-style inputfile" id="file-input3" onchange="loadFile3(event)">

                    <label for="fotoProduct4" class="custom-file-upload" id="upload-file4">
                        <i class="fa fa-cloud-upload"></i>
                        <img src="#" alt="" id="img-preview4">
                    </label>
                    <input type="file" name="fotoProduct4" class="input-file-style inputfile" id="file-input4" onchange="loadFile4(event)">
                </div>
            </div>

            <div class="input-wrapper product-btns">
                <input type="submit" value="ANNULEER" name="btn-workshop-annuleer" id="btn-annuleer">
                <input type="submit" value="VOEG TOE" name="btn-workshop-voegtoe" id="btn-voegtoe">
            </div>

        </form>
    </main>

    <script src="js/nieuwProduct.js"></script>


</body>

</html>