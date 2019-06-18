<?php session_start(); 
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
require_once '../mpdf60/mpdf.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
?>

<?php #Recibe los valores introducidos, como primera medida se deben identificar los valores que no fueron seleccionados como criterios.

#var_dump($_POST);

if (isset($_POST['generar'])) {
	$param = array('edad','zona','afro','estrato','desplazado','ojos','victima_conflicto');
	$valores  = array();
	$criterios  = array();
	#echo "Tamaño criterios:";
	foreach ($param as $value) {
		if ($_POST[$value] != '0') {
			$criterios[]= $value;
			$valores[]= $_POST[$value];
		}
	}

	#echo count($criterios)."\n";
	$sql = "SELECT * FROM estudiante WHERE "; 
	foreach ($criterios as $value) {
		$sql .= $value . "=:" .$value." ";
		if (end($criterios) != $value ) {
			$sql .= "AND ";
		}
	}
	$ps = $cn->prepare($sql);
	#echo "<br>";
	#var_dump($ps);
	$i=0;
	foreach ($criterios as $value) {
		$ps->bindParam($value,$valores[$i]);
		$i++;
	}
	$ps->execute();

	$result = $ps->fetchAll();
	#Teniendo ya los estudiantes que han cumplido con los criterios, podemos generar el reporte
	require("../view/ver-estudiantes.view.php");

}

 ?>


<?php require("../view/reportes-estudiantes.view.php") ?>