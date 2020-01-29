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


$documento = cleanData($_GET['id']);
$estado=deleteEstudiante($documento,$cn);
#$estado = prueba();
#var_dump($estado);

#$respuesta = array();

if($estado == true) {
#echo 'entro';
	$respuesta = array("estado" => "true");
	return print( json_encode( $respuesta )) ;

}else {
	#echo 'es false';
	$respuesta = array("estado" => "false");
	return print( json_encode( $respuesta )) ;

}


?>