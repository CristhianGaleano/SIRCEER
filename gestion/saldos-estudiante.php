<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';


validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     header('Content-Type: application/json');

//     if (empty($_POST['documento'])) {
//          echo json_encode('error');
//     }else{
//         echo json_encode('true');
//     }
    
    
// }

?>
<?php require "../view/saldos-estudiante.view.php" ?>

