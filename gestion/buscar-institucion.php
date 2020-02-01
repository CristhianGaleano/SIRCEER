<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';


validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);


$sectores = getAllSubject("sectores",$cn);
$zonas = getAllSubject("zonas",$cn);

#Declaracion variable global 
$rows = obtener_instituciones($config_global['result_por_pagina'],$cn);


#

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		header('Content-Type: application/json');
		$status = array("estado" => "false");
		
		$nombre = cleanData( $_POST['nombre'] );
		$telefono = cleanData( $_POST['telefono'] );
		$calendario = cleanData( $_POST['calendario'] );
		$dane = cleanData( $_POST['dane'] );
		$sector = cleanData( $_POST['sector'] );
		$municipio = cleanData( $_POST['municipio'] );
		$zona = cleanData( $_POST['zona'] );


		$response = saveInstitucion($nombre,$telefono,$calendario,$dane,$sector,$municipio,$zona,$cn);
		if ($response) {
			$status = array("estado" => "true");
			return print( json_encode( $status ) );
		}

		return print( json_encode( $status ) );
	}


// var_dump($rows);
#$allEntitys = getStudentsInsitutesAndprogramns($bd_config);
#$estudiantes = getAllSubject("estudiante",$cn);
#var_dump($allEntitys);
?>
<?php require("../view/buscar-institucion.view.php") ?>

