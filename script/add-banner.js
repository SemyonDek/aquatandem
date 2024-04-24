function addSlider() {
  let form = document.getElementById("addBannerForm");
  let img = document.getElementById("file_banner_img");
  if (img.value == "") {
    alert("Добавьте фотографию");
  } else {
    let formData = new FormData(form);

    var url = "../functions/slider/add.php";

    let xhr = new XMLHttpRequest();
    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
      alert("Слайдер добавлен");
      //   console.log(xhr.response);
      document.getElementById("img-banner-block").innerHTML =
        xhr.response.getElementById("img-banner-block").innerHTML;
      document.getElementById("file_banner_img").value = null;
    };
  }
}

function delSlider(id) {
  let formData = new FormData();
  formData.append("idSlider", id);

  var url = "../functions/slider/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Слайдер удален");
    document.getElementById("img-banner-block").innerHTML =
      xhr.response.getElementById("img-banner-block").innerHTML;
  };
}
