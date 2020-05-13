var menuBtn     = document.querySelector(".hamburger--elastic");
var menu        = document.querySelector("#menu-container");
var map         = document.querySelector("#map-opac");
var darken      = document.querySelector("#darken");

n=0;

menuBtn.addEventListener("click", function(){
    menuBtn.classList.toggle("is-active");
    if(n==0){
        n++;
        menu.setAttribute("class", "slide-in");
        menuBtn.setAttribute("class", "hamburger hamburger--elastic slide-in-btn is-active");
        // darken.setAttribute("class", "darken-active");
        if(menu.classList.contains("slide-out")){
            menu.removeAttribute("class", "slide-out");
            menuBtn.removeAttribute("class", "slide-out-btn");
        }
    }else if(n==1){
        n--;
        if(menu.classList.contains("slide-in")){
            menu.removeAttribute("class", "slide-in");
            menuBtn.removeAttribute("class", "slide-in-btn");
            // darken.removeAttribute("class", "darken-active");
        }
        menu.setAttribute("class", "slide-out");
        menuBtn.setAttribute("class", "hamburger hamburger--elastic slide-out-btn");
    }
});



