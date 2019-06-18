<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
require_once '../mpdf60/mpdf.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

$id = $_GET['id'];

$factura = getSubjectByValue('factura_estudiante',$id,'id',$cn);
#$instituciones = getInstitucionesOfAlianzaById($id,$cn);

#var_dump($universidad);
#var_dump($instituciones);
?>
<?php require "../view/ver-fac-estu.view.php" ?>