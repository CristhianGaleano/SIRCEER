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



		$codigo_snies =  $_POST['codigo_snies'];
		$nombre = strtoupper( $_POST['nombre'] );
		$semestres = $_POST['semestres'];
		$valor_semestre = $_POST['valor_semestre'];
		$nivel_academico = $_POST['nivel_academico'];
		$universidad = $_POST['universidad'];
		$jornada = $_POST['jornada'];

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
