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
// echo $id;
$data =  GetDatosProgramaById($id,$cn);
// var_dump($data);
$data['id'] = $data[0];
$data['snies'] = $data[1];
$data['nombre'] = $data[2];
$data['cantidad_semestre'] = $data[3];
$data['costo_semestre'] = $data[4];
$data['nivel_academico'] = $data[5];
$data['jornada'] = $data[6];
$data['universidad_id'] = $data[7];


  // var_dump($data);
 echo json_encode($data);


// $data = array("estado" => "false");
// echo json_encode($data)
?>