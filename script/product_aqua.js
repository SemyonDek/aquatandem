function addAqua() {
  let form = document.getElementById("addAquaProdForm");

  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      const { name, value } = element;
      return { name, value };
    });

  style_input_red = "border-color: red;";
  style_input_gray = "border-color: #d8d8d8;";

  prov = true;

  data.forEach((element) => {
    if (element["value"] == "") {
      prov = false;
      if (element["name"].startsWith("file_photo")) {
        alert("Добавьте изображение");
      } else document.getElementById(element["name"]).style = style_input_red;
    } else document.getElementById(element["name"]).style = style_input_gray;
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/product_aqua/add.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert(xhr.response);

    data.forEach((element) => {
      document.getElementById(element["name"]).value = null;
    });
  };
}

function delAqua(id) {
  let formData = new FormData();
  formData.append("idAqua", id);

  var url = "../functions/product_aqua/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Товар для аквариумов удален");
    document.getElementById("accessories_prod").innerHTML =
      xhr.response.getElementById("accessories_prod").innerHTML;
  };
}

function updAqua() {
  let form = document.getElementById("addAquaProdForm");

  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      const { name, value } = element;
      return { name, value };
    });

  style_input_red = "border-color: red;";
  style_input_gray = "border-color: #d8d8d8;";

  prov = true;

  data.forEach((element) => {
    if (element["value"] == "" && !element["name"].startsWith("file_photo")) {
      prov = false;
      document.getElementById(element["name"]).style = style_input_red;
    } else document.getElementById(element["name"]).style = style_input_gray;
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/product_aqua/upd.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert(xhr.response);
  };
}
