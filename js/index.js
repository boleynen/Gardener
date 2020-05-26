
  

// SHOW 'ADD PRODUCT' & 'ADD WORKSHOP' ON BUTTON CLICK

window.onload=function(){

    var voegToeBtn = document.querySelector("#voeg-toe-btn");
    var voegToeShow = document.querySelector("#voeg-toe-show");

    a = 0;

    voegToeBtn.addEventListener("click", function () {
        if (a == 0) {
            voegToeBtn.setAttribute("class", "rotate");
            voegToeShow.style.display = "block";
            a++;
            console.log(a);
        } else if (a == 1) {
            voegToeBtn.removeAttribute("class", "rotate");
            voegToeShow.style.display = "none";
            a--;
            console.log(a);
        }

    });

    // var productInfo = document.querySelector("#product-extra-wrap");
    // var producten = document.querySelectorAll("#product");
    var close = document.querySelector("#exit-product");

    // var p = 0;

    // for (var i = 0; i < producten.length; i++) {

    //     producten[i].addEventListener('click', function(event){
    //         event.preventDefault();

    //         if(p === 0){
    //             productInfo.style.display = "none";
    //             p = 1;
    //         }

    //         if(p === 1){
    //             productInfo.style.display = "block";
    //             p = 0;
    //         }


    //     });

    // }

    // close.addEventListener("click", function(){
    //     productInfo.style.display = "none";
    // });

}
