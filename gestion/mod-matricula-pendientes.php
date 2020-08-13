<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
?>
<?php 
$cn = getConexion($bd_config);
comprobarConexion($cn);


// $matriculas = getAllMatriculas($cn);
$programas = getAllSubject('programas',$cn);
#var_dump($programas);


// COnsulta listado matriculas pendientes
$rs=paraMatricular($cn);
// contador matrículas pendientes
$num_matri_pendientes = conteoForMatricular($cn);
$num_matritriculas = conteoMatriculas($cn);
// var_dump($num_matri_pendientes);

$response = array('estado' => "false" );

#var_dump( $_SERVER );

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	// var_dump($_POST);
	header('Content-Type: application/json');

	
	$anio = $_POST['anio'];
	// echo $anio;
	$semestre = $_POST['semestre'];
	// echo $semestre;
	$periodo = $_POST['periodo'];
	// echo $periodo;
	$estudiante_id = $_POST['id_estudiante'];
	// echo $estudiante_id;
	$programa_id = $_POST['programa'];
	// echo $programa_id;
	$fecha = $_POST['fecha'];
	// echo $fecha;

	$estado = saveMatricula($anio,$semestre,$periodo,$estudiante_id,$programa_id,$fecha,$cn);
// var_dump($estado);
	if ($estado) {
		
		$response = array('estado' => "true" );
		return print( json_encode( $response ) );
	}
		return print( json_encode( $response ) );

}//END POST

?>

<?php require '../view/mod-matricula-pendientes.view.php'?>