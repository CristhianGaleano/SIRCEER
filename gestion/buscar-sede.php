<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';


validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);



// $instituciones = getAllSubject('instituciones',$cn);
$zonas = getAllSubject('zonas',$cn);
$modelos = getAllSubject('modelos',$cn);
$municipios = getAllSubject('municipios',$cn);
$alianzas = getAllSubject('alianzas',$cn);

$rows = obtener_sedes($cn);


$resultado = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	header('Content-Type: application/json');


		#Obtenemos los valores de los campos en el formulario
		$nombre = strtoupper( $_POST['nombre']);
		$codigo_dane = $_POST['codigo_dane'];
		$consecutivo = $_POST['consecutivo'];
		$zona = $_POST['zona'];
		$modelo = $_POST['modelo'];
		// $institucion = $_POST['institucion'];
		$municipio = $_POST['municipio'];
		#$alianza = $_POST['alianza'];


$estado = saveSede(
	$nombre,$codigo_dane,$consecutivo,$zona,$modelo,$municipio,$cn
	);


if ($estado) {
		$resultado = array("estado" => "true");
		return print( json_encode( $resultado) );
		
	}else {
		$resultado = array("estado" => "false");
		return print( json_encode( $resultado) );
	}


}

?>
<?php require("../view/buscar-sede.view.php") ?>

