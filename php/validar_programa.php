<?php 
include 'Conexion.php';
include '../admin/config.php';
$con = getConexion($bd_config);

$sql = "SELECT * FROM programas";
$ps = $con->prepare($sql);
$ps->execute();

$result=$ps->fetchAll();
#var_dump($result);
// print_r($result);

// echo $_GET['d'];

foreach ($result as $campo) {
	if ($campo['snies'] == $_GET['d']) {
		echo '<p style="color: #a9a4a3;">El codigo SNIES ya esta registrado</p>'; 
	}
}
 ?>