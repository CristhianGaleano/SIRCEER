<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
$totalE=countEntityWithOutWhere("estudiantes",$cn);
$totalP=countEntityWithOutWhere("programas",$cn);
$totalI =  (countEntityWithOutWhere("sedes",$cn));
$totalU =  (countEntityWithOutWhere("universidades",$cn));
$totalA =  (countEntityWithOutWhere("alianzas",$cn));


?>
<?php require '../view/principal-gestion.view.php' ?>