<?php
session_start();
require '../admin/config.php';
require_once 'funciones.php';
/////// CONEXIÓN A LA BASE DE DATOS /////////
require_once 'Conexion.php';


validateSession();

$cn = getConexion($bd_config);
comprobarConexion($cn);

// header('Content-Type: application/json; charset=utf-8');

$id = $_GET['id'];

$data =  GetDatosProgramaById($id,$cn);
// var_dump($data);
echo json_decode($data);
?>