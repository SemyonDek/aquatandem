function addCompare(id) {
  let formData = new FormData();
  formData.append("idProd", id);

  var url = "functions/compare/add.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Товар добавлен в сравнение");
    document.getElementById("srav_value").innerHTML =
      xhr.response.getElementById("srav_value").innerHTML;
  };
}

function delCompare() {
  var url = "functions/compare/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send();
  xhr.onload = () => {
    alert("Список сравнения очищен");
    document.getElementById("srav_value").innerHTML =
      xhr.response.getElementById("srav_value").innerHTML;
    document.getElementById("list-product-compare").innerHTML =
      xhr.response.getElementById("list-product-compare").innerHTML;
  };
}
