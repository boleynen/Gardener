// KLIKKEN OP LABEL ELEMENT OPENT INPUT FILE TYPE 
// (omzeiling dat als je klikt op het label element, dat input file type triggert want je kan input file:type niet stylen met css)

var upload1 = document.querySelector("#upload-file1");
var upload2 = document.querySelector("#upload-file2");
var upload3 = document.querySelector("#upload-file3");
var upload4 = document.querySelector("#upload-file4");

upload1.addEventListener("click", function(){
	getFile1();
});

upload2.addEventListener("click", function(){
	getFile2();
});

upload3.addEventListener("click", function(){
	getFile3();
});

upload4.addEventListener("click", function(){
	getFile4();
});

var input1 = document.querySelector("#file-input1");
var input2 = document.querySelector("#file-input2");
var input3 = document.querySelector("#file-input3");
var input4 = document.querySelector("#file-input4");

function getFile1(){
	input1.click();
}

function getFile2(){
	input2.click();
}

function getFile3(){
	input3.click();
}

function getFile4(){
	input4.click();
}



// FOTO UPLOADEN TOONT PREVIEW VAN BESTAND

var loadFile1 = function(event) {
    var output = document.getElementById('img-preview1');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
	  URL.revokeObjectURL(output.src) // free memory
	  output.style.overflow = "hidden";
	  output.style.width = "70px";
	  output.style.height = "70px";
	  output.style.borderRadius = "5px";
	  output.style.objectFit = "cover";
    }
};

var loadFile2 = function(event) {
    var output = document.getElementById('img-preview2');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
	  URL.revokeObjectURL(output.src) // free memory
	  output.style.overflow = "hidden";
	  output.style.width = "70px";
	  output.style.height = "70px";
	  output.style.borderRadius = "5px";
	  output.style.objectFit = "cover";
    }
};

var loadFile3 = function(event) {
    var output = document.getElementById('img-preview3');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
	  URL.revokeObjectURL(output.src) // free memory
	  output.style.overflow = "hidden";
	  output.style.width = "70px";
	  output.style.height = "70px";
	  output.style.borderRadius = "5px";
	  output.style.objectFit = "cover";
    }
};

var loadFile4 = function(event) {
    var output = document.getElementById('img-preview4');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
	  URL.revokeObjectURL(output.src) // free memory
	  output.style.overflow = "hidden";
	  output.style.width = "70px";
	  output.style.height = "70px";
	  output.style.borderRadius = "5px";
	  output.style.objectFit = "cover";
    }
};


var gratisToggle = document.querySelector("#gratis-toggle");
var prijsInput = document.querySelector(".input-currency");

gratisToggle.onchange = function(){
	prijsInput.disabled = this.checked;
};