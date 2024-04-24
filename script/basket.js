function addBasket(id) {
  let color = document.getElementById("ColorId").value;

  let formData = new FormData();
  formData.append("idProd", id);
  formData.append("colorProd", color);

  var url = "functions/basket/add.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("basket-block").innerHTML =
      xhr.response.getElementById("basket-block").innerHTML;
    document.getElementById("basket-form").innerHTML =
      xhr.response.getElementById("basket-form").innerHTML;
    document.getElementById("price-line-basket").innerHTML =
      xhr.response.getElementById("price-line-basket").innerHTML;
  };
}

function delBasket(id) {
  let formData = new FormData();
  formData.append("id", id);

  var url = "functions/basket/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("basket-block").innerHTML =
      xhr.response.getElementById("basket-block").innerHTML;
    document.getElementById("basket-form").innerHTML =
      xhr.response.getElementById("basket-form").innerHTML;
    document.getElementById("price-line-basket").innerHTML =
      xhr.response.getElementById("price-line-basket").innerHTML;
  };
}

function updBasket(id) {
  let value = document.getElementById("value_" + id).value;
  let formData = new FormData();
  formData.append("id", id);
  formData.append("value", value);

  var url = "functions/basket/upd.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("basket-block").innerHTML =
      xhr.response.getElementById("basket-block").innerHTML;
    document.getElementById("basket-form").innerHTML =
      xhr.response.getElementById("basket-form").innerHTML;
    document.getElementById("price-line-basket").innerHTML =
      xhr.response.getElementById("price-line-basket").innerHTML;
  };
}
