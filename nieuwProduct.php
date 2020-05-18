<?php 

include_once(__DIR__."/classes/c.product.php");
include_once(__DIR__."/classes/c.user.php");

session_start();

$findId = new User();
$findId->setEmail($_SESSION['email']);
$myId = $findId->fetchMyId();
$myId = implode(" ", $myId);
$myId = intval($myId);

if(isset($_POST["btn-product-voegtoe"])){

    try {
        $addProduct = new Product();

        $prijs = "";
        $gratis = "";
        $ruilen = "";
        $bestelling = "";

        if($_POST['gratis'] == "on"){
            $prijs = 0;
            $gratis = 1;          
        }else{  
            $prijs = $_POST['prijsProduct'];
            $gratis = 0;
        }

        if($_POST['ruilen'] == "on"){
            $ruilen = 1;
        }else if(!isset($_POST['ruilen'])){
            $ruilen = 0;
        }

        if($_POST['bestelling'] == "on"){
            $bestelling = 1;
        }else if(!isset($_POST['bestelling'])){
            $bestelling = 0;
        }

        $addProduct->setIdUser($myId);
        $addProduct->setName($_POST['naamProduct']);
        $addProduct->setType($_POST['typeProduct']);
        $addProduct->setPrice($prijs);
        $addProduct->setAmount($_POST['hoeveelheid']);
        $addProduct->setFree($gratis);
        $addProduct->setTrade($ruilen);
        $addProduct->setOrder($bestelling);
        $addProduct->setUnit($_POST['eenheid']);
        $addProduct->setDescription($_POST['beschrijvingProduct']);
        $addProduct->setPictures($_POST['fotoProduct1']);

        $addProduct->saveProduct();

        $message = "Je product is toegevoegd!";

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
    <title>Document</title>
</head>

<body>
    <div id="top-nav">
        <div id="back-btn" onclick="history.go(-1);">
            <a href="#">&#8249;</a>
        </div>
        <p id="titel-pagina">Voeg een product toe</p>
    </div>

    <?php 
    
    if(isset($error)){
        echo $error;
    }

    ?>

    <main>
        <!-- <div id="product-succes" class="succes-msg"  style="display:none;>
            <p>Je Product is toegevoegd!</p>
        </div> -->

        <form action="" method="post" id="form-product">

            <div class="input-wrapper">
                <label for="naamProduct" class="input-title">Naam</label>
                <input type="text" name="naamProduct" class="input-text-style"
                    placeholder="Wat voor product biedt je aan?">
            </div>

            <div class="input-wrapper">
                <label for="soort" class="input-title">Type product</label>
                <select id="soort" name="typeProduct" class="input-select-style">
                    <option value="" disabled selected>Selecteer een type product</option>
                    <option value="fruit">Fruit</option>
                    <option value="groente">Groente</option>
                    <option value="kruid">Kruid</option>
                    <option value="zaad">Zaad</option>
                </select>
            </div>

            <div class="input-wrapper">
                <label for="prijsProduct" class="input-title">Prijs</label>
                <div id="currency-flex">
                    <input type="number" name="prijsProduct" class="input-text-style input-currency" placeholder="0,00">

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

            <div class="input-wrapper input-switch-style">
                <div id="switch-fc">
                    <label class="switch">
                        <input type="hidden" name="ruilen" value="0">
                        <input type="checkbox" name="ruilen">
                        <span class="slider round"></span>
                    </label>
                    <label for="ruilen" class="input-title input-title-switch">Kan geruild worden</label>
                </div>

                <div>
                    <label class="switch">
                        <input type="hidden" name="bestelling" value="0">
                        <input type="checkbox" name="bestelling">
                        <span class="slider round"></span>
                    </label>
                    <label for="bestelling" class="input-title input-title-switch">Kan op bestelling</label>
                </div>
            </div>

            <div class="input-wrapper">
                <label for="hoeveelheid" class="input-title">Hoeveelheid</label>
                <input type="nummber" name="hoeveelheid" class="input-text-style" placeholder="Vul een hoeveelheid in">
            </div>

            <div class="input-wrapper">
                <label for="eenheid" class="input-title">Eenheid</label>
                <select id="eenheid" name="eenheid" class="input-select-style">
                    <option value="" disabled selected>Selecteer een eenheid</option>
                    <option value="kg">KG</option>
                    <option value="g">G</option>
                    <option value="stuks">Stuks</option>
                </select>
            </div>

            <div class="input-wrapper">
                <label for="beschrijvingProduct" class="input-title">Beschrijving</label>
                <textarea type="text" name="beschrijvingProduct" class="input-text-style input-bigger"
                    placeholder="Beschrijf je product: organisch, soort grond gebruikt, ..."></textarea>
            </div>

            <div class="input-wrapper">
                <label for="fotoProduct" class="input-title">Voeg foto's toe van je product</label>

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
                <input type="submit" value="ANNULEER" name="btn-product-annuleer" id="btn-annuleer">
                <input type="submit" value="VOEG TOE" name="btn-product-voegtoe" id="btn-voegtoe">
            </div>

        </form>
    </main>

    <script src="js/nieuwProduct.js"></script>

</body>

</html>