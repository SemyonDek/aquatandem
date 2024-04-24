let slides = document.getElementsByClassName('img-slider-img'),
    prevBtn = document.getElementById('left_button-img'),
    nextBtn = document.getElementById('right_button-img'),
    slideIndex = 1;

showSlides(slideIndex);
    
function showSlides (n) {

    if (n < 1) {
        slideIndex = slides.length;
    } else if (n > slides.length) {
        slideIndex = 1;
    }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.opacity = 0;
    }
    slides[slideIndex - 1].style.opacity = 1;

}

function plusSlides (n) {
    showSlides(slideIndex += n);
}
prevBtn.onclick = function () {
    plusSlides(-1);
}
nextBtn.onclick = function () {
    plusSlides(1);
}

setInterval(plusSlides, 10000, 1);