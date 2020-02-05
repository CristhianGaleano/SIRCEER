<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';


validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);


#Declaracion variable global 
$rows = obtener_estudiante($cn);
#var_dump($rows);

?>
<?php require "../view/buscar-estudiante.view.php" ?>

