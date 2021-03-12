<?php require 'education.php';
			$edu = new education;

			?>

<!DOCTYPE html>
<html>
<head>
	<title>Access Google Maps API in PHP</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/googlemap.js"></script>
	<style type="text/css">
		#map {
			width: 100%;
			height: 100%;
			border: 1px solid blue;
			height: 450px;
		}
		#data, #allData {
			display: none;
		}
	</style>
</head>
<body>
	<div class="container">
		
	<div class="banner">
		<!-- Image and text -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="https://www.enticconfio.gov.co/sites/default/files/imagen-1.png" width="50" height="30" class="d-inline-block align-top" alt="">
    Busqueda de instituciones
  </a>
</nav>
	</div>

	
    <div class="row my-3">

    <div class="col-md-3">
    <select name="departamento" id="" class="form-select" >
            <option value="">Selecciona el Departamento</option>
		<?php 		
			$departamentos=$edu->getDepartamentos();
			foreach( $departamentos as $v )
			{
			if(!isset( $departamentos[$v["departamento"]])){ ?>
			<option value="<?php echo $v['departamento']; ?>"><?php echo $v['departamento']; ?></option>
				<?php
			echo $v["departamento"];
			}
		}?>    
            </select>
    </div>
<!-- municipio -->
	<div class="col-md-3">
    <select name="municipio" id="" class="form-select" >
            <option value="">Selecciona el Municipio</option>
		<?php 		
			$municipios=$edu->getMunicipios();
			foreach( $municipios as $s )
			{
			if(!isset( $municipios[$s["municipio"]])){ ?>
			<option value="<?php echo $s['municipio']; ?>"><?php echo $s['municipio']; ?></option>
				<?php
			echo $s["municipio"];
			}
		}?>    
            </select>
    </div>

    <div class="col-md-3">
    <select name="estado" id="" class="form-select">
                 <option value=""">Estado</option>
                <option value="pendiente">Pendiente</option>
                <option value="curso">En Curso</option>
                <option value="finalizado">Finalizado</option>
            </select>
    
    </div>


 
    </div>
	


		<?php 
			
			$coll = $edu->getCollegesBlankLatLng();
			$coll = json_encode($coll, true);
			echo '<div id="data">' . $coll . '</div>';  //para mostrar los datos completos en archivo json



			$allData = $edu->getAllColleges();
			$allData = json_encode($allData, false);
			echo '<div id="allData">' . $allData . '</div>';	 //para mostrar los datos completos en archivo json		
		 ?>
		<div id="map"></div>



		<div class="tabla mt-3">
		<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Institucion</th>
      <th scope="col">Ciudad</th>
      <th scope="col">Estado</th>
      <th scope="col">Region</th>
      <th scope="col">Formacion</th>
    </tr>
  </thead>
  <tbody>
  <?php 		
			$todo=$edu->getAllColleges();
			$i = 1;
			foreach( $todo as $row )
			{
		?>
    <tr>

	
		 <td><?php echo $i++; ?></td>
			<td><?php echo $row['institucion_educativa']; ?></td>
			<td><?php echo $row['municipio']; ?></td>
			<td><?php echo $row['estado']; ?></td>
			<td><?php echo $row['region']; ?></td>
			<td><?php echo $row['formacion']; ?></td>
				<?php
			
		}?> 
    </tr>

  </tbody>
</table>
		
		</div>

	</div>
</body>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5k4eIFGw2Cu3dbFgkxGvfXqxOlgQsqB4&callback=loadMap">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>