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
$name_bd = "sedes";

#Declaracion variable global 
$rows = obtener_sedes($config_global['result_por_pagina'],$cn);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	#var_dump($_POST);

	$palabra = $_POST['busqueda'];

	$sql = "SELECT sedes.id AS id_sede, sedes.nombre AS sede, sedes.codigo_dane_sede,sedes.consecutivo AS consecutivo_sede, zonas.nombre AS zona, modelos.nombre AS modelo, instituciones.nombre AS institucion, municipios.nombre AS municipio,alianzas.nombre AS alianza  FROM sedes LEFT JOIN zonas ON sedes.zona_id=zonas.id LEFT JOIN modelos ON sedes.modelo_id=modelos.id LEFT JOIN instituciones ON sedes.institucion_id=instituciones.id LEFT JOIN municipios ON sedes.municipio_id=municipios.id LEFT JOIN alianzas ON sedes.alianza_id=alianzas.id WHERE
		sedes.nombre LIKE '%".$palabra."%' OR
		sedes.codigo_dane_sede LIKE '%".$palabra."%' OR
		sedes.consecutivo LIKE '%".$palabra."%' OR
		zonas.nombre LIKE '%".$palabra."%' OR
		modelos.nombre LIKE '%".$palabra."%' OR
		instituciones.nombre LIKE '%".$palabra."%' OR
		municipios.nombre LIKE '%".$palabra."%' OR
		alianzas.nombre LIKE '%".$palabra."%'";
		
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
<?php require("../view/buscar-sede.view.php") ?>

