const slides = document.querySelectorAll(".slide");
const nextBtn = document.querySelector(".nextBtn");
const prevBtn = document.querySelector(".prevBtn");
const slide_img = document.querySelectorAll(".slide-img");
//const inicio = document.querySelector('#inicio');
const dot1 = document.querySelector("#dot1");
const dot2 = document.querySelector("#dot2");
const dot3 = document.querySelector("#dot3");
const dot4 = document.querySelector("#dot4");
const dots = document.querySelectorAll(".carousel-dot");

var autoswitch = true; //opciones de autodesplazamiento 
let autoswitch_speed = 5000; //velocidad de autodesplazamiento 

//autodesplazamiento
var autodes = setInterval(function(){
    counter++;
    if (counter >= slides.length) {
        counter = 0;
    }
    activo(counter);
    slides.forEach(function (slide) {
        slide.style.transform = `translateX(-${counter * 100}%)`;
        url = slide_img[counter].src;
            
           // console.log(url);
           // inicio.style.background = 'url(' + url + ') center/cover no-repeat';
        });
        
    }, autoswitch_speed);
    

slides.forEach(function (slide, index) {
  slide.style.left = `${index * 100}%`;
});

let counter = 0;
for (var i = 0 ; i < slide_img.length; i++) {
    slide_img[i].addEventListener('mouseout' , mover , false ) ; 
    slide_img[i].style.opacity = 1;
    slide_img[i].addEventListener('mouseover' , detener , false ) ; 
    slide_img[i].style.cursor = "pointer";
    //slide_img[i].style.opacity = 0.5;
    //console.log("valor: " + slide_img[i]);
};

function detener(){
    console.log("entro");
    clearInterval(autodes);
    let img = document.querySelectorAll(".slide-img");
    for (var i = 0 ; i < img.length; i++) {
        img[i].style.opacity = 0.8;
    };
}
function mover(){
   // console.log("salgo");
    let img = document.querySelectorAll(".slide-img");
    for (var i = 0 ; i < img.length; i++) {
        img[i].style.opacity = 1;
    };
    autodes = setInterval(function(){
        counter++;
        if (counter >= slides.length) {
            counter = 0;
        }
        activo(counter);
        slides.forEach(function (slide) {
            slide.style.transform = `translateX(-${counter * 100}%)`;
            url = slide_img[counter].src;
        });
        
    }, autoswitch_speed);
}
nextBtn.addEventListener("click", function () {
    counter++;
    activo(counter);
    carousel();
});

prevBtn.addEventListener("click", function () {
    counter--;
    if (counter < 0) {
        counter = slides.length - 1; 
    }
    activo(counter);
    carousel();
});


dot1.addEventListener("click", function () {
    counter = 0;
    activo(counter);
    carousel1(counter);
});
dot2.addEventListener("click", function () {
    counter = 1;
    activo(counter);
    carousel1(counter);
});
dot3.addEventListener("click", function () {
    counter = 2;
    activo(counter);
    carousel1(counter);
});
dot4.addEventListener("click", function () {
    counter = 3;
    activo(counter);
    carousel1(counter);
});




function carousel() {
    if (counter < slides.length ) {
        nextBtn.style.display = "block";
    } else {
        counter = 0;
    }
    slides.forEach(function (slide) {
        slide.style.transform = `translateX(-${counter * 100}%)`;
        //url = slide_img[counter].src;
        //inicio.style.background = 'url(' + url + ') center/cover no-repeat';  
    });
}

function carousel1(counter) {
   //console.log("click");
   slides.forEach(function (slide) {
    slide.style.transform = `translateX(-${counter * 100}%)`; 
   });
}

function activo(counter){
    switch(counter){
        case 0: dot1.style.background = "yellow";
                dot2.style.background = "black";
                dot3.style.background = "black";
                dot4.style.background = "black";
                break;

        case 1: dot1.style.background = "black";
                dot2.style.background = "yellow";
                dot3.style.background = "black";
                dot4.style.background = "black";
                break;

        case 2: dot1.style.background = "black";
                dot2.style.background = "black";
                dot3.style.background = "yellow";
                dot4.style.background = "black";
                break;

        case 3: dot1.style.background = "black";
                dot2.style.background = "black";
                dot3.style.background = "black";
                dot4.style.background = "yellow";
                break;
        case 4: dot1.style.background = "yellow";
                dot2.style.background = "black";
                dot3.style.background = "black";
                dot4.style.background = "black";
                break;        
    }
}
