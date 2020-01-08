<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';

$pagina = isset($_GET['p']) ? (int)$_GET['p'] : 1;
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);


#name BD
$name_bd = "universidades";

#Declaracion variable global 
$rows = obtener_universidades($config_global['result_por_pagina'],$cn);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	#var_dump($_POST);

	$palabra = strtoupper( $_POST['busqueda'] );
	// var_dump($palabra);

	$sql = "SELECT universidades.id AS id_universidad,universidades.nombre AS universidad, universidades.telefono,universidades.email,universidades.direccion, tipos_universidades.nombre AS tipo_uni ,universidades.municipio 
FROM universidades
	INNER JOIN tipos_universidades ON tipos_universidades.id=universidades.tipo_universidad_id  
	 WHERE
		universidades.nombre LIKE '%". $palabra ."%' OR
		universidades.telefono LIKE '%". $palabra ."%' OR
		universidades.email LIKE '%". $palabra ."%' OR
		universidades.direccion LIKE '%". $palabra ."%' OR
		universidades.municipio LIKE '%". $palabra ."%' OR
		tipos_universidades.nombre LIKE '%". $palabra ."%'";

	$ps = $cn->prepare($sql);
	#var_dump($ps);
	$ps->execute();
	$rows = $ps->fetchAll();

	
}

// var_dump($rows);
#$allEntitys = getStudentsInsitutesAndprogramns($bd_config);
#$estudiantes = getAllSubject("estudiante",$cn);
#var_dump($allEntitys);
?>



<?php require("../view/buscar-universidad.view.php") ?>

