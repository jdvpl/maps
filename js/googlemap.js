var map;

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
    strong1.textContent = "Sede: " + data.sede;
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

    if (data.estado === "OK") {
      var icon = "./img/ok.png";
    } else if (data.estado === "PENDIENTE") {
      var icon = "./img/pendiente.png";
    } else {
      var icon = "./img/no.png";
    }

    // aca pinta los que estan en la base de datos
    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(data.latitud, data.longitud),
      map: map,
      icon: icon,
    });

    marker.addListener("mouseover", function () {
      infoWind.setContent(content);
      infoWind.open(map, marker);
    });
  });
}
