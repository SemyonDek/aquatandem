function sortProd() {
  let sort = document.getElementById("sort_select").value;
  document.getElementById("sort_select_filter").value = sort;
  document.getElementById("sort_select_sbros").value = sort;
  let url = document.URL;
  if (sort !== "") {
    url = url + "&sort_select=" + sort;
  }
  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";
  xhr.open("GET", url);
  xhr.send();
  xhr.onload = () => {
    document.getElementById("list-product-block").innerHTML =
      xhr.response.getElementById("list-product-block").innerHTML;
  };
}
