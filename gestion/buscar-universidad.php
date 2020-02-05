<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';


validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);



#Declaracion variable global 
$rows = obtener_universidades($cn);

$tipos_universidades=getAllSubject("tipos_universidades",$cn);


// var_dump($rows);
#$allEntitys = getStudentsInsitutesAndprogramns($bd_config);
#$estudiantes = getAllSubject("estudiante",$cn);
#var_dump($allEntitys);
?>



<?php require("../view/buscar-universidad.view.php") ?>

