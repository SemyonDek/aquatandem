let button_up = document.getElementById("button-up"),
  button_down = document.getElementById("button-down"),
  img_list = document.getElementById("img-list"),
  value_page_slider = document.getElementById("valuePageSlider").value,
  slide_img_slider = 1;

function sliderImg(number) {
  if (number == 1) {
    if (slide_img_slider < value_page_slider) {
      slide_img_slider += 1;
      img_list.style.top = "-" + (slide_img_slider - 1) * 102 + "px";
    }
  } else if (number == -1) {
    if (slide_img_slider !== 1) {
      slide_img_slider -= 1;
      img_list.style.top = "-" + (slide_img_slider - 1) * 102 + "px";
    }
  }
}

button_up.onclick = function () {
  sliderImg(-1);
};
button_down.onclick = function () {
  sliderImg(1);
};

function sliderMainPhoto(id) {
  document
    .getElementsByClassName("active-item-img-slider-prod")[0]
    .classList.remove("active-item-img-slider-prod");
  document
    .getElementsByClassName("item-img-slider-prod")
    [id].classList.add("active-item-img-slider-prod");
  document.getElementById("main-photo-img").src =
    document.getElementsByClassName("item-img-prod")[id].src;
}

function swipeColor(id) {
  document
    .getElementsByClassName("active-color")[0]
    .classList.remove("active-color");
  document.getElementById("color_" + id).classList.add("active-color");
  let color = document.getElementById("color_" + id).innerHTML;
  document.getElementById("ColorId").value = color;
}

let description = document.getElementById("description-button"),
  description_body = document.getElementById("description-body"),
  characteristic = document.getElementById("characteristic-button"),
  characteristic_body = document.getElementById("characteristic-body");

description.onclick = function () {
  document
    .getElementsByClassName("active-item-heading-info")[0]
    .classList.remove("active-item-heading-info");
  description.classList.add("active-item-heading-info");
  document
    .getElementsByClassName("active-item-body-info")[0]
    .classList.remove("active-item-body-info");
  document
    .getElementById("description-body")
    .classList.add("active-item-body-info");
};
characteristic.onclick = function () {
  document
    .getElementsByClassName("active-item-heading-info")[0]
    .classList.remove("active-item-heading-info");
  characteristic.classList.add("active-item-heading-info");
  document
    .getElementsByClassName("active-item-body-info")[0]
    .classList.remove("active-item-body-info");
  document
    .getElementById("characteristic-body")
    .classList.add("active-item-body-info");
};
