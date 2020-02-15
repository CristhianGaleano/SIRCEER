<?php
session_start();
require '../admin/config.php';
require_once 'funciones.php';
/////// CONEXIÓN A LA BASE DE DATOS /////////
require_once 'Conexion.php';


validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);



header('Content-Type: application/json');

$resultado = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$id_matricula = $_POST['id_matricula'];
	$promedio = $_POST['nota'];
	$estado = $_POST['estado_semestre'];

$estado = asignar_nota($id_matricula,$promedio,$estado,$cn);
	
	if ($estado) {
		$resultado = array("estado" => "true");
		return print( json_encode( $resultado) );
		
	}else {
		$resultado = array("estado" => "false");
		return print( json_encode( $resultado) );
	}


}
?>
