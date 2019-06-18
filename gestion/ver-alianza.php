<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
require_once '../mpdf60/mpdf.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

$id = $_GET['id'];

$alianza = getSubjectByValue('alianzas',$id,'id',$cn);

$institucion = getInstitucionesOfAlianzaById($alianza['id'],$cn);
$universidad = getInstitucionesOfUniversidadesById($alianza['id'],$cn);

#var_dump($alianza);
#var_dump($instituciones);
#var_dump($universidades)
?>
<?php require "../view/ver-alianza.view.php" ?>