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
$id_alianza = $_GET['id'];
$alianza = getSubjectById('alianza',$id_alianza,'id',$cn);
$instituciones = getInstituciones($cn);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	#var_dump($_POST);
	$alianza_id = $_POST['id'];
	$institucion_id = $_POST['institucion'];
	$fecha_vinculacion = '2017-11-05';
	#print_r($institucion_id);

	#Descatar empty
	foreach ($institucion_id as $value) {
		if ($value == 'No aplica') {
			unset($value);
		}
	}
	var_dump($institucion_id);

	//1. Id de alianza y Id institucion(3)
	#2. Validar repetidos
	#3. insercion hasta n instituciones seleccionadas
$sql = "INSERT INTO alianzas_instituciones (alianza_id,institucion_id,fecha_vinculacion) VALUES (:alianza_id,:institucion_id,:fecha_vinculacion)";
$ps = $cn->prepare($sql);
	foreach ($institucion_id as $value) {
		$ps->BindParam(':alianza_id',$alianza_id);
		$ps->BindParam(':institucion_id',$value);
		$ps->BindParam(':fecha_vinculacion',$fecha_vinculacion);
		$ps->execute();
	}
	header("Location: ".URL. "gestion/buscar-alianza.php?select=a");

}else{

#var_dump($programas);

}



?>

<?php require '../view/gestionar-alianza.view.php'?>