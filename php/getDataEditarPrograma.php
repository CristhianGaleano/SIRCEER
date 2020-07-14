<?php
session_start();
require '../admin/config.php';
require_once 'funciones.php';
/////// CONEXIÓN A LA BASE DE DATOS /////////
require_once 'Conexion.php';


validateSession();

$cn = getConexion($bd_config);
comprobarConexion($cn);

// header('Content-Type: application/json');

$id = $_GET['id'];

$data =  getSubjectByValue('programas',$id,'id',$cn);
var_dump($data);
echo json_encode( $data)
// return $data
?>