<?php 	session_start();
require_once 'Conexion.php';
require_once 'funciones.php';
include '../admin/config.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

header('Content-Type: application/json');


$id = cleanData($_GET['id']);
#var_dump($id);


$estado = deleteInstitucion($id, $cn);



if($estado) {
#echo 'entro';
	$response = array("estado" => "true");
	return print( json_encode( $response )) ;

}else {
	#echo 'es false';
	$response = array("estado" => "false");
	return print( json_encode( $response )) ;
	
}


?>