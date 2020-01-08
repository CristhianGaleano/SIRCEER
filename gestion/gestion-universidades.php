<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
#validateSession();
$cn = getConexion($bd_config);


$totalIES=countEntityWithOutWhere("universidades",$cn);
// var_dump($totalIES);
if ($totalIES != 0) {
	# code...
#realizando operaciones
$totalTUFU=cuantos_objetos_atributo('universidades','tipo_universidad_id','1',$cn);
$totalTUCI=cuantos_objetos_atributo('universidades','tipo_universidad_id','2',$cn);
$totalTUU=cuantos_objetos_atributo('universidades','tipo_universidad_id','3',$cn);
$totalTUO=cuantos_objetos_atributo('universidades','tipo_universidad_id','4',$cn);

// echo $totalSMET;
// echo $totalSMSP;
// echo $totalSMPP;



$porceTUFU=($totalTUFU / $totalIES)*100;
$porceTUCI=($totalTUCI / $totalIES)*100;
$porceTUU=($totalTUU / $totalIES)*100;
$porceTUO=($totalTUO / $totalIES)*100;
}
?>

<?php require '../view/gestion-universidades.view.php' ?>