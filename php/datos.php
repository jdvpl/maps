<?php

require_once('../db/DbConnect.php');
$departamento = $_POST['departamento'];
if (empty($departamento)) {
	$sql = "SELECT * from instituciones";
} else {
	$sql = "SELECT * from instituciones where departamento='$departamento'";
}

$result = mysqli_query($conexion, $sql);
$json_array = array();
while ($row = mysqli_fetch_assoc($result)) {
	$json_array[] = $row;
}
echo json_encode($json_array);