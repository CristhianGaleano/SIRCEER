<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';

$pagina = isset($_GET['p']) ? (int)$_GET['p'] : 1;
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

#nombre de la table
$name_bd = "estudiantes";

#Declaracion variable global 
$rows = obtener_estudiante($config_global['result_por_pagina'],$cn);
#var_dump($rows);

?>
<?php require "../view/buscar-estudiante.view.php" ?>

