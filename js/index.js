var zoekBtnOverlay = document.querySelector("#zoek-overlay-btn");
var zoekInput = document.querySelector("#zoek-input");
var zoekBtn = document.querySelector("#submit-zoek");

// zoekInput.style.display = "none";

zoekBtnOverlay.addEventListener("click", function(){
    if(zoekInput.style.display == "none"){
        zoekInput.style.display = "inline-block";
        zoekInput.setAttribute("class", "slide-in-zoek");
    }else{
        zoekInput.style.display = "inline-block";
        zoekInput.removeAttribute("class", "slide-in-zoek");
    }
});