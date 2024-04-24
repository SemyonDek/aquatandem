function addFavourit(id) {
  let formData = new FormData();
  formData.append("idProd", id);

  var url = "functions/favourites/add.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Товар добавлен в избранные");
    document.getElementById("izb_value").innerHTML =
      xhr.response.getElementById("izb_value").innerHTML;
  };
}

function delFavourit(id) {
  let formData = new FormData();
  formData.append("idProd", id);

  var url = "functions/favourites/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Товар удален из избранных");
    document.getElementById("izb_value").innerHTML =
      xhr.response.getElementById("izb_value").innerHTML;
    document.getElementById("list-product-block").innerHTML =
      xhr.response.getElementById("list-product-block").innerHTML;
  };
}
