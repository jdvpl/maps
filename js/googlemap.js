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

    if (data.estado === "PENDIENTEa") {
      var icon = {
        url:
          "http://www.developerdrive.com/wp-content/uploads/2013/08/ddrive.png",
      };
    } else {
      var icon = {
        url: "https://i.ibb.co/DbxtxSm/school-1.png",
      };
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
