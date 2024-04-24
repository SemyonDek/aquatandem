function addOrders() {
  let form = document.getElementById("orders-form");
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
      document.getElementById(element["name"]).style = style_input_red;
      prov = false;
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "functions/orders/add.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert(xhr.response);
    window.location.replace("index.php");
  };
}

function addInfoOrderAdm(id) {
  let formData = new FormData();
  formData.append("id", id);

  var url = "../functions/orders/infoAdmin.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("orders-info").innerHTML =
      xhr.response.getElementById("orders-info").innerHTML;
  };
}
function addInfoOrderUser(id) {
  let formData = new FormData();
  formData.append("id", id);

  var url = "functions/orders/infoUser.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("orders-info").innerHTML =
      xhr.response.getElementById("orders-info").innerHTML;
  };
}

function updOrder(id) {
  let status = document.getElementById("statusOrder").value;
  let formData = new FormData();
  formData.append("id", id);
  formData.append("status", status);

  var url = "../functions/orders/upd.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Состояние заказа изменено");
    document.getElementById("orders_block").innerHTML =
      xhr.response.getElementById("orders_block").innerHTML;
  };
}
