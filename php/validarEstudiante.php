<?php 
include 'Conexion.php';
include '../admin/config.php';
$con = getConexion($bd_config);

$sql = "SELECT * FROM estudiantes";
$ps = $con->prepare($sql);
$ps->execute();

$result=$ps->fetchAll();
#var_dump($result);
#print_r($result);

#echo $_GET['d'];

foreach ($result as $campo) {
	if ($campo['documento'] == $_GET['d']) {
		echo '<p style="color: #a9a4a3;">El estudiante ya esta registrado</p>'; 
	}
}
 ?>