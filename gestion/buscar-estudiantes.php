<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';

$pagina = isset($_GET['p']) ? (int)$_GET['p'] : 1;
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

#nombre de la table
$name_bd = "estudiantes";

#Declaracion variable global 
$rows = obtener_estudiante($config_global['result_por_pagina'],$cn);
// var_dump($rows);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	#var_dump($_POST);

	$palabra = strtoupper( $_POST['busqueda'] );
	#echo "$palabra";

	$sql = "SELECT estudiantes.id,estudiantes.documento AS doc_estudiante,estudiantes.primer_nombre,estudiantes.segundo_nombre,estudiantes.primer_apellido,estudiantes.segundo_apellido,estudiantes.edad, estudiantes.genero, estudiantes.estado,zonas.nombre AS zona, estudiantes.grado, estudiantes.muni_naci,estudiantes.muni_resi ,sedes.nombre AS sede,
		tipos_estrategias.nombre AS estrategia
		FROM estudiantes 
		LEFT JOIN zonas ON estudiantes.zona_id=zonas.id 
		LEFT JOIN sedes ON estudiantes.sede_id=sedes.id 
		LEFT JOIN tipos_estrategias ON estudiantes.tipo_estrategia_id=tipos_estrategias.id
		WHERE
		estudiantes.documento = '".$palabra."' OR
		estudiantes.primer_nombre = '".$palabra."' OR
		estudiantes.segundo_nombre = '".$palabra."' OR
		estudiantes.primer_apellido = '".$palabra."' OR
		estudiantes.segundo_apellido = '".$palabra."' OR
		estudiantes.fecha_inicio = '".$palabra."' OR
		estudiantes.genero = '".$palabra."' OR
		estudiantes.email = '".$palabra."' OR
		estudiantes.edad = '".$palabra."' OR
		estudiantes.estrato = '".$palabra."' OR
		estudiantes.condonacion_credito = '".$palabra."' OR
		estudiantes.puntaje_sisben = '".$palabra."' OR
		estudiantes.estado = '".$palabra."' OR
		estudiantes.tipo_doc = '".$palabra."' OR
		estudiantes.estado_civil = '".$palabra."' OR
		estudiantes.grado = '".$palabra."' OR
		estudiantes.muni_naci = '".$palabra."' OR
		estudiantes.muni_resi = '".$palabra."' OR
		zonas.nombre = '".$palabra."' OR
		tipos_estrategias.nombre = '".$palabra."' OR
		sedes.nombre = '".$palabra."'";
	$ps = $cn->prepare($sql);
	// var_dump($ps);
	$ps->execute();
	$rows = $ps->fetchAll();
	#var_dump($rows);

	
}



#var_dump($rows);
#$allEntitys = getStudentsInsitutesAndprogramns($bd_config);
#$estudiantes = getAllSubject("estudiante",$cn);
#var_dump($allEntitys);
?>
<?php require "../view/buscar-estudiante.view.php" ?>

