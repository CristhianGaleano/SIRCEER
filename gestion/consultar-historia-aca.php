<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';


validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	#var_dump($_POST);
	  $doc=cleanData($_POST['documento']);
	 # var_dump($doc);
	  $estudiante = getAllStudentRelations($doc,$cn);
// var_dump($estudiante);
$matricula = getMatricula($estudiante['id'],$cn);
// var_dump($matricula);
$historial = getHistorialEstudiante(doc,$cn);
	  #var_dump($estudiante);
	
}


?>
<?php require("../view/consultar-historia.view.php") ?>

