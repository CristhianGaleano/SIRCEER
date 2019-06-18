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
$name_bd = "alianzas";

#Declaracion variable global 
$rows = obtener_alianzas($config_global['result_por_pagina'],$cn);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	#var_dump($_POST);

	$palabra = $_POST['busqueda'];

	$sql = "SELECT alianzas.id AS id_alianza,alianzas.nombre, alianzas.fecha_inicio,alianzas.fecha_final,alianzas.cupos FROM alianzas WHERE
		alianzas.nombre LIKE '%".$palabra."%' OR
		alianzas.fecha_inicio LIKE '%".$palabra."%' OR
		alianzas.fecha_final LIKE '%".$palabra."%' OR
		alianzas.cupos LIKE '%".$palabra."%'";
		
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
<?php require("../view/buscar-alianza.view.php") ?>