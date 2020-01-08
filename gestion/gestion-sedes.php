<?php session_start(); ?>
<?php  
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
require_once '../admin/config.php';
validateSession();
$cn = getConexion($bd_config);
$totalS=countEntityWithOutWhere("sedes",$cn);
// var_dump($totalS);
if ($totalS != 0) {
	# code...
#realizando operaciones
$totalSMET=cuantos_objetos_atributo('sedes','modelo_id','1',$cn);
$totalSMSP=cuantos_objetos_atributo('sedes','modelo_id','2',$cn);
$totalSMPP=cuantos_objetos_atributo('sedes','modelo_id','3',$cn);

// echo $totalSMET;
// echo $totalSMSP;
// echo $totalSMPP;



$porceSMET=($totalSMET / $totalS)*100;
$porceSMSP=($totalSMSP / $totalS)*100;
$porceSMPP= ($totalSMPP / $totalS)*100;

	}


?>
<?php require'../view/gestion-sedes.view.php' ?>