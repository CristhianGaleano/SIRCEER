<?php 
session_start();
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
require_once '../mpdf60/mpdf.php';

$cn = getConexion($bd_config);
#Traemos todas las programas creados a la fecha
$programas = obtener_programa($cn);
// var_dump($programas);
$fecha_sistema = Date("Y,m,d");



require_once '../view/reportes-programas.view.php';
 ?>