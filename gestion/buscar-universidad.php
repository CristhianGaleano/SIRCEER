<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';


validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);



#Declaracion variable global 
$rows = obtener_universidades($cn);

$tipos_universidades=getAllSubject("tipos_universidades",$cn);


$resultado = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	header('Content-Type: application/json');


		#Obtenemos los valores de los campos en el formulario
		$nombre = strtoupper( $_POST['nombre']);
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$direccion = $_POST['direccion'];
		$municipio = $_POST['municipio'];
		$tipo_universidad = $_POST['tipo_universidad'];
		


$estado = saveUniversidad(
	$nombre,$telefono,$email,$direccion,$municipio,$tipo_universidad,$cn
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


<?php require "../view/buscar-universidad.view.php" ?>

