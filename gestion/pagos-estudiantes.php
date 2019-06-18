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


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	

	}


?>

<?php require '../view/pagos-estudiantes.view.php'?>