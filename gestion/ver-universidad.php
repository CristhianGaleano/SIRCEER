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

$universidad = getSubjectByValue('universidades',$id,'id',$cn);
$municipio = getAllSubjectByValue('municipios',$universidad['ciudad_id'],'id',$cn);
$tipo = getAllSubjectByValue('tipos_universidades',$universidad['tipo_universidad_id'],'id',$cn);
#$instituciones = getInstitucionesOfAlianzaById($id,$cn);

#var_dump($universidad);
#var_dump($instituciones);
?>
<?php require("../view/ver-universidad.view.php") ?>