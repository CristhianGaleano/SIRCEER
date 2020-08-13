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

$resultado = array();

    $documento = $_GET['documento'];

    // trae nombre, semestre, periodo, deseable programa
    $data = getDatosForNewMatri($documento,$cn);
    // echo count( $data );
    // var_dump($data);
    // echo json_encode( $data[count($data) -1]  );
    echo json_encode( $data );

?>
