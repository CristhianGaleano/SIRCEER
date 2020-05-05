<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';


validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    if (empty($_POST['documento'])) {
         echo json_encode('error');
    }else{
        $datos = getDataAndSaldoEstudiante($_POST['documento'], $cn);
        $data = array(
            'documento' => $datos['documento'],
            'primer_nombre' => $datos['primer_nombre'],
            'segundo_nombre' => $datos['segundo_nombre'],
            'primer_apellido' => $datos['primer_apellido'],
            'segundo_apellido' => $datos['segundo_apellido'],
            'saldo' => $datos['saldo']
        );
        echo json_encode($data);
    }
    
    
}

?>


