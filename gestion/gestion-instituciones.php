<?php session_start(); ?>
<?php  
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
require_once '../admin/config.php';


$cn = getConexion($bd_config);
validateSession();


$totalI=countEntityWithOutWhere("instituciones",$cn);
#Obtener el numero de instituciones en el sector oficial



if ($totalI != 0) {

#echo "<br>Total ins.. : $totalI";
$totalISO=contarEntity('instituciones','sectores','sector_id','nombre','OFICIAL',$cn);
#echo "<br>Total ins.. sector oficial: $totalISO";
#Obtener el numero de instituciones en el sector no oficial
$totalISNO=contarEntity('instituciones','sectores','sector_id','nombre','NO OFICIAL',$cn);
#echo "<br>Total ins.. sector no oficial: $totalISNO";
#Obtener el numero de instituciones del calendario A
$totalIA = contarIstitucionesCalendario('A',$cn);
$totalIB = contarIstitucionesCalendario('B',$cn);
#Obtener el numero de instituciones del calendario B

#realizando operaciones
 $porceISNO = ($totalISNO / $totalI)*100;
 $porceISNO = round($porceISNO,0, PHP_ROUND_HALF_DOWN);
 $porceISO = ($totalISO / $totalI)*100;
 $porceISO = round($porceISO,0, PHP_ROUND_HALF_DOWN);

 $porceIA = ($totalIA / $totalI)*100;
 $porceIA = round($porceIA,0, PHP_ROUND_HALF_DOWN);
 $porceIB = ($totalIB / $totalI)*100;
 $porceIB =  round($porceIB,0, PHP_ROUND_HALF_DOWN);


 #--------------------------------
 #Chart estudiantes by zona
$totalZR=cuantos_objetos_atributo('instituciones','zona_id','2',$cn);
$totalZU=cuantos_objetos_atributo('instituciones','zona_id','1',$cn);
// var_dump($totalZR);
// var_dump($totalZU);
#Realizando calculo
$porceZR = round(($totalZR / $totalI)*100);
$porceZU = round(($totalZU / $totalI)*100);

// var_dump( $porceZR );
// var_dump( $porceZU );

	}
?>
<?php require '../view/gestion-instituciones.view.php' ?>