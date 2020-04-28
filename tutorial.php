<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <title>Tutorial
    </title>
</head>

<body>

    <div id="tutorial-image">
        <img src="https://images.unsplash.com/photo-1550859917-b3f6c8993b43?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
            alt="image">
    </div>

    <div id="tutorial-container">


        <div class="slide">
            <h1>Zelf groeien?</h1>
            <p>Of je nu een tuin, boerderij of gewoon een fruitboom hebt, met ons idee kun je eenvoudig je extra
                producten aanbieden om te ruilen, verkopen of doneren aan je gemeenschap. </p>
        </div>
        <div class="slide">
            <h1>Koop hyper lokale producten!</h1>
            <p>Van bananen tot gewone kool, gardener heeft het allemaal. Alle producten op Gardener zijn afkomstig uit
                een gemeenschap van mensen die net zoveel om voedsel geven als wij. Draag je steentje bij en shop lokaal
                je groenten en fruit zorg zo voor een verantwoordelijke consumptie binnen jouw stad! </p>
        </div>
        <div class="slide">
            <h1>Producten van winkelketens...</h1>
            <p>Besproeid met chemicaliën, geoogst voor ze rijp zijn, genetisch gemanipuleerd, enorme afstanden
                getransporteerd.</p>
        </div>
        <div class="slide">
            <h1>Gardener wilt verandering brengen...</h1>
            <p>Voedselverspilling verminderen, smaak en voedzaamheid verbeteren, de ecologische voetafdruk van logistiek
                verkleinen en de lokale economie steunen</p>
        </div>
        <div class="slide">
            <h1>Voer je locatie in</h1>
            <p>Om in contact te komen met je locale gemeenschap van Gardeners is het inschakelen van je
                locatievoorzieningen vereist.</p>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>

    <div id="cta">
        <a href="index.php">START</a>
    </div>

    <div id="position-dots">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)" style="visibility: hidden"></span>
    </div>



    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("slide");
            var dots = document.getElementsByClassName("dot");
            var alldots = document.querySelector("#position-dots");
            var arrow1 = document.querySelector(".prev");
            var arrow2 = document.querySelector(".next");
            var btnStart = document.querySelector("#cta");
            
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            console.log(slideIndex);

            if(slideIndex == 5){
                alldots.style.display = "none";
                arrow1.style.display = "none";
                arrow2.style.display = "none";
                btnStart.style.display = "inline-block";
            }
        }


    </script>

</body>

</html>