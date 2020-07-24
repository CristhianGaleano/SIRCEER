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



		$codigo_snies = ucwords( strtolower( $_POST['codigo_snies']));
		$nombre =  html_entity_decode( $_POST['nombre'],  ENT_QUOTES | ENT_HTML401, "UTF-8" );
		$semestres = $_POST['semestres'];
		$valor_semestre =   $_POST['valor_semestre'];
		$nivel_academico = html_entity_decode( $_POST['nivel_academico'], ENT_QUOTES | ENT_HTML401, "UTF-8" );
		$universidad = html_entity_decode( $_POST['universidad'], ENT_QUOTES | ENT_HTML401, "UTF-8" );
		$jornada = html_entity_decode( $_POST['jornada'], ENT_QUOTES | ENT_HTML401, "UTF-8" );


/*
		echo "$codigo_snies";
		echo "$nombre";
		echo "$semestres";
		echo "$valor_semestre";
		echo "$nivel_academico";
		echo "$universidad";
		echo "$jornada";
*/





$estado_programa = saveProgram(
	$codigo_snies,$nombre,$semestres,$valor_semestre,$nivel_academico,$universidad,$jornada,$cn
	);
	
	if ($estado_programa) {
		$resultado = array("estado" => "true");
		return print( json_encode( $resultado) );
		
	}else {
		$resultado = array("estado" => "false");
		return print( json_encode( $resultado) );
	}


}
?>
