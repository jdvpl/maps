<?php 
	require 'education.php';
	$departamento=$_REQUEST['departamento'];

	$edu = new education;
	$edu->setId($_REQUEST['id']);
	$edu->setDepartamento($_REQUEST['departamento']);
	$edu->setLat($_REQUEST['latitud']);
	$edu->setLng($_REQUEST['longitud']);

	$status = $edu->updateCollegesWithLatLng();

	if($status == true) {
		echo "Updated...";
	} else {
		echo "Failed...";
	}



 ?>


