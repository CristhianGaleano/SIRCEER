<?php session_start(); ?>
<?php  
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
require_once '../admin/config.php';
#validateSession();
?>
<?php require'../view/gestion-alianzas.view.php' ?>