<?php 
include 'Conexion.php';
include '../admin/config.php';
$con = getConexion($bd_config);

$sql = "SELECT * FROM usuarios";
$ps = $con->prepare($sql);
$ps->execute();

$result=$ps->fetchAll();
#var_dump($result);
#print_r($result);

echo $_GET['u'];

foreach ($result as $campo) {
	if ($campo['codigo'] == $_GET['u']) {
		echo '<p style="color: #DD8579;">El codigo de usuario ya existe</p>'; 
	}
}
 ?>