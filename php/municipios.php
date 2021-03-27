<?php

require_once('../db/DbConnect.php');

$departamento = $_POST['departamento'];
$sql = "SELECT DISTINCT
			municipio
		from instituciones 
		where departamento='$departamento' order by municipio";
$result = mysqli_query($conexion, $sql);
$cadena = "
			<select id='municipio' name='municipio'>";
while ($ver = mysqli_fetch_row($result)) {
	$cadena = $cadena . '<option value=' . $ver[0] . ' id=' . $ver[0] . '>' . ($ver[0]) . '</option>';
}
echo  $cadena . "</select>";