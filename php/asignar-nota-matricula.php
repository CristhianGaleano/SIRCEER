<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once 'funciones.php';
require_once 'Conexion.php';

validateSession();

$cn = getConexion($bd_config);
comprobarConexion($cn);




$response = array('estado' => "false" );

#var_dump( $_SERVER );

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	// var_dump($_POST);
	header('Content-Type: application/json');
	
	$id_matricula = $_POST['id_matricula'];
	$id_estudiante = $_POST['id_estudiante_nota'];
	$nota = $_POST['nota'];
	$estado_semestre = $_POST['estado_semestre'];
	$rs=asignar_nota($id_matricula,$id_estudiante,$nota,$estado_semestre,$cn);

	if ($rs) {
		$response = array("estado" => "true");
		return print( json_encode( $response ) );
	}

	return print( json_encode( $response ) );


}