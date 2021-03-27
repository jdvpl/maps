var map;
var geocoder;

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(mostrarUbicacion);
}

function mostrarUbicacion(ubicacion) {
  var longi = ubicacion.coords.longitude;
  var lati = ubicacion.coords.latitude;
  console.log(`longitud: ${longi} | latitud: ${lati}`);
}

function loadMap() {
  var bogota = { lat: 4.6717166, lng: -74.0954029 };
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 7,
    center: bogota,
  });

  var marker = new google.maps.Marker({
    position: bogota,
    map: map,
  });

  var cdata = JSON.parse(document.getElementById("data").innerHTML);
  geocoder = new google.maps.Geocoder();
  // codeAddress(cdata);

  var allData = JSON.parse(document.getElementById("allData").innerHTML);
  showAllColleges(allData);
}

function showAllColleges(allData) {
  var infoWind = new google.maps.InfoWindow();
  Array.prototype.forEach.call(allData, function (data) {
    var content = document.createElement("div");
    var strong = document.createElement("strong");
    var br = document.createElement("hr");
    var departamento = document.createElement("p");
    var municipio = document.createElement("p");
    var strong1 = document.createElement("p");
    var estado = document.createElement("p");
    var formacion = document.createElement("p");
    var region = document.createElement("p");

    strong.textContent = "" + data.institucion_educativa;
    departamento.textContent = "" + data.departamento;
    municipio.textContent = "" + data.municipio;
    strong1.textContent = " Sede: " + data.sede;
    estado.textContent = " Estado: " + data.estado;
    formacion.textContent = "Formacion: " + data.formacion;
    region.textContent = " Region: " + data.region;

    content.appendChild(strong);
    content.appendChild(br);
    content.appendChild(departamento);
    content.appendChild(municipio);
    content.appendChild(strong1);
    content.appendChild(estado);
    content.appendChild(formacion);
    content.appendChild(region);

    var img = document.createElement("img");
    img.src = "img/Leopard.jpg";
    img.style.width = "100px";
    img.style.margin = "10px";

    content.appendChild(img);

    // aca pinta los que estan en la base de datos
    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(data.latitud, data.longitud),
      map: map,
    });

    marker.addListener("mouseover", function () {
      infoWind.setContent(content);
      infoWind.open(map, marker);
    });
  });
}

function codeAddress(cdata) {
  Array.prototype.forEach.call(cdata, function (data) {
    var address = data.name + " " + data.address;
    geocoder.geocode({ address: address }, function (results, status) {
      if (status == "OK") {
        map.setCenter(results[0].geometry.location);
        var points = {};
        points.id = data.id;
        points.departamento = data.departamento;
        points.latitud = map.getCenter().latitud();
        points.longitud = map.getCenter().longitud();
        console.log(points.data.departamento);
        updateCollegeWithLatLng(points);
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  });
}

function updateCollegeWithLatLng(points) {
  $.ajax({
    url: "action.php",
    method: "post",
    data: points,
    success: function (res) {
      console.log(res);
    },
  });
}
