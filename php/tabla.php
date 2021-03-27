<?php
require_once('../db/DbConnect.php');

$departamento = $_POST['departamento'];
$municipio = $_POST['municipio'];

$sql = "SELECT *
		from instituciones 
		where departamento='$departamento' and municipio='$municipio'";
$result = mysqli_query($conexion, $sql);
$i = 1;
while ($ver = mysqli_fetch_row($result)) {
	echo '<tr>
		<td>' . ($i) . '</td>
		<td>' . ($ver[3]) . '</td>
		<td>' . ($ver[5]) . '</td>
		<td>' . ($ver[1]) . '</td>
		<td>' . ($ver[2]) . '</td>
		<td>' . ($ver[10]) . '</td>
		<td>' . ($ver[12]) . '</td>
		<td>' . ($ver[11]) . '</td>
		</tr>';
	$i = $i + 1;
}
echo $municipio;
