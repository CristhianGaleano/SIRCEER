<?php session_start(); ?>
<?php require 'Conexion.php' ?>
<?php require 'funciones.php' ?>
<?php require '../admin/config.php' ?>
<?php validateSession(); ?>
<?php
$cn = getConexion($bd_config);
comprobarConexion($cn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

	header('Content-Type: application/json');
	#print_r($_POST);
	$snies = cleanData($_POST['snies']);
	$nombre = strtoupper( cleanData($_POST['programa']));
	$num_semestres = cleanData($_POST['semestres']);
	$num_creditos = cleanData($_POST['valor_semestre']);
	$nivel_academico = cleanData($_POST['nivel_aca']);
	$universidad = cleanData($_POST['university']);
	$jornada = cleanData($_POST['jornada']);

	

	$sql = 
	"UPDATE programas SET snies=:snies,nombre=:nombre,cantidad_semestre=:cantidad_semestre,costo_semestre=:costo_semestre,nivel_academico=:nivel_academico,jornada=:jornada,universidad_id=:universidad_id WHERE programas.snies=:snies";
	$ps=$cn->prepare($sql);

	$ps->bindParam(":nombre",$nombre);
	$ps->bindParam(":cantidad_semestre",$num_semestres);
	$ps->bindParam(":costo_semestre",$num_creditos);
	$ps->bindParam(":nivel_academico",$nivel_academico);
	$ps->bindParam(":universidad_id",$universidad);
	$ps->bindParam(":jornada",$jornada);
	$ps->bindParam(":snies",$snies);
	$ps = $ps->execute();

	if ($ps) {
		$respuesta = array("estado" => "true");
		return print( json_encode( $respuesta )) ;
	}

	// echo 'es false';
	$respuesta = array("estado" => "false");
	return print( json_encode( $respuesta )) ;

    



}



?>