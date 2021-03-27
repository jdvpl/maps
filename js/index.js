$(document).ready(function () {
  $("#departamento").val(1);
  recargarMunicipios();
  recargarDatos();

  $("#departamento").change(function () {
    recargarMunicipios();
    recargarTabla();
    recargarDatos();
  });
});

function cargar() {
  recargarMunicipios();
  loadMap();
  recargarTabla();
}
//  funcion para cargar los datos en el mapa
function loadMap() {
  var bogota = { lat: 4.6717166, lng: -74.0954029 };
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 6,
    center: bogota,
  });

  var allData = JSON.parse(document.getElementById("Data").innerHTML);
  console.log(allData);
  showAllColleges(allData);
}

function recargarMunicipios() {
  $.ajax({
    type: "POST",
    url: "./php/municipios.php", //tener presente la ruta que no es desde aca sino desde donde se hace la peticion desde el index
    data: "departamento=" + $("#departamento").val(),
    success: function (r) {
      $("#municipios").html(r);
    },
  });
}

function recargarTabla() {
  $.ajax({
    type: "POST",
    url: "./php/tabla.php",
    data: {
      departamento: $("#departamento").val(),
      municipio: $("#municipio").val(),
    },
    success: function (r) {
      $("#tablita").html(r);
    },
  });
}

function recargarDatos() {
  $.ajax({
    type: "POST",
    url: "./php/datos.php",
    data: "departamento=" + $("#departamento").val(),
    success: function (r) {
      $("#Data").html(r);
    },
  });
}
