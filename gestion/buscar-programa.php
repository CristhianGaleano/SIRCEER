<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';

$pagina = isset($_GET['p']) ? (int)$_GET['p'] : 1;
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);


#nombre de la BD
$name_bd = "programas";

#Declaracion variable global 
$rows = obtener_programas($config_global['result_por_pagina'],$cn);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	#var_dump($_POST);

	$palabra = $_POST['busqueda'];

	$sql = "SELECT programas.id AS id_programa, programas.snies,programas.nombre AS name_programa, programas.cantidad_semestre AS num_semestres, programas.costo_semestre, nivel_academico.nombre AS nivel_academico,universidades.nombre AS name_universidad,jornadas.nombre AS jornada FROM programas 
		LEFT JOIN nivel_academico ON nivel_academico.id=programas.nivel_academico_id 
		LEFT JOIN universidades ON universidades.id=programas.universidad_id 
		LEFT JOIN  jornadas ON jornadas.id=programas.jornada_id WHERE
		programas.nombre LIKE '%".$palabra."%' OR
		programas.snies LIKE '%".$palabra."%' OR
		programas.cantidad_semestre LIKE '%".$palabra."%' OR
		programas.costo_semestre LIKE '%".$palabra."%' OR
		nivel_academico.nombre LIKE '%".$palabra."%' OR
		universidades.nombre LIKE '%".$palabra."%' OR
		jornadas.nombre LIKE '%".$palabra."%'";
		
	$ps = $cn->prepare($sql);
	#var_dump($ps);
	$ps->execute();
	$rows = $ps->fetchAll();

	
}

#var_dump($rows);
#$allEntitys = getStudentsInsitutesAndprogramns($bd_config);
#$estudiantes = getAllSubject("estudiante",$cn);
#var_dump($allEntitys);
?>
<?php require("../view/buscar-programa.view.php") ?>

