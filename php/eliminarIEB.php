<?php 	session_start();
require_once 'Conexion.php';
require_once 'funciones.php';
include '../admin/config.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);



header('Content-Type: application/json');


$id_programa = cleanData($_GET['id']);
#echo "$id_programa";


$estado = deletePrograma($id_programa,$cn);
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

#var_dump($estado);

	

?>