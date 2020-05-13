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
        <div id="back-btn">
            <a href="#">&#8249;</a>
        </div>
        <p id="titel-pagina">Voeg een product toe</p>
    </div>

    <main>
        <form action="" method="post" id="form-product">

            <div class="input-wrapper">
                <label for="naamProduct" class="input-title">Naam</label>
                <input type="text" name="naamProduct" class="input-text-style"
                    placeholder="Wat voor product biedt je aan?">
            </div>

            <div class="input-wrapper">
                <label for="soort" class="input-title">Type product</label>
                <select id="soort" name="soort" class="input-select-style">
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
                            <input type="checkbox" name="gratis">
                            <span class="slider round"></span>
                        </label>
                        <label for="gratis" class="input-title input-title-switch">Gratis</label>
                    </div>
                </div>
            </div>

            <div class="input-wrapper input-switch-style">
                <div id="switch-fc">
                    <label class="switch">
                        <input type="checkbox" name="ruilen">
                        <span class="slider round"></span>
                    </label>
                    <label for="ruilen" class="input-title input-title-switch">Kan geruild worden</label>
                </div>

                <div>
                    <label class="switch">
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
                <input type="text" name="beschrijvingProduct" class="input-text-style"
                    placeholder="Beschrijf je product: organisch, soort grond gebruikt, ...">
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

        </form>
    </main>

    <script src="js/nieuwProduct.js"></script>
</body>

</html>