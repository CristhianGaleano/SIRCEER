<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';


validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);



// $niveles = getAllSubject('nivel_academico',$cn);
$universidades = getAllSubject('universidades',$cn);
// var_dump($universidades);
#las anteriores pueden ser reemplazadas por esta
// $jornadas = getAllSubject('jornadas',$cn);

$rows=obtener_programa($cn);


?>
<?php require("../view/buscar-programa.view.php") ?>

