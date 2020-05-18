
  

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
}
