<?php 	
require_once 'Conexion.php';
require_once 'funciones.php';
include '../admin/config.php';
$con = getConexion($bd_config);
comprobarConexion($con);
$id = $_GET['id'];


$sql3 ="SELECT perfiles_id FROM usuarios_perfiles WHERE usuarios_perfiles.usuarios_id=$id";
$ps = $con->prepare($sql3);
$ps->execute();
$perfiles_id = $ps->fetch()['perfiles_id'];



$sql1 = "DELETE FROM usuarios_perfiles WHERE usuarios_id=$id AND perfiles_id=$perfiles_id";

$sql2 = "DELETE FROM usuarios WHERE id='$id'";



$ps = $con->prepare($sql1);
$ps->execute();
if (!$ps) {
	echo "Error en usuarios_perfiles";
}else{
	header("Location:".URL."admin/principal-admin.php");
	#echo("Usuario eliminado");
}
var_dump($ps);

$ps = $con->prepare($sql2);
$ps->execute();
if (!$ps) {
	echo "Error en usuarios";
}else{
	echo("Usuario eliminado");
}
var_dump($ps);

?>