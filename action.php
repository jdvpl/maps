<?php 
	require 'education.php';
	$edu = new education;
	$edu->setId($_REQUEST['id']);
	$edu->setLat($_REQUEST['latitud']);
	$edu->setLng($_REQUEST['longitud']);
	$status = $edu->updateCollegesWithLatLng();
	if($status == true) {
		echo "Updated...";
	} else {
		echo "Failed...";
	}
 ?>