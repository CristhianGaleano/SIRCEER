<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);

$totalE=countEntityWithOutWhere("estudiantes",$cn);

if ($totalE != 0) {
	# code...
#Chart estudiantes by genero
$totalM=cuantos_objetos_atributo('estudiantes','genero','MASCULINO',$cn);
$totalF=cuantos_objetos_atributo('estudiantes','genero','FEMENINO',$cn);
$leyenda = "Estudiantes registrados a la fecha ";
// var_dump($totalM);
#var_dump($totalF);
#var_dump($totalE);
#realizando operaciones
$porceM= round( ($totalM / $totalE)*100);
$porceF= round( ($totalF / $totalE)*100);
// var_dump($porceM);
// var_dump($porceF);


#-------------------------------
#menores y mayores de edad

 $mayores = contarMayoresEstudiantes($cn);
 $menores = contarMenoresEstudiantes($cn);

 // var_dump($mayores);

$porceMayores= round( ($mayores / $totalE)*100);
$porceMenores= round( ($menores / $totalE)*100);
#-------------------------------

#Chart estudiantes by zona
$totalZR=cuantos_objetos_atributo('estudiantes','zona_id','2',$cn);
$totalZU=cuantos_objetos_atributo('estudiantes','zona_id','1',$cn);
// var_dump($totalZR);
// var_dump($totalZU);
#Realizando calculo
$porceZR = round(($totalZR / $totalE)*100);
$porceZU = round(($totalZU / $totalE)*100);
// var_dump($porceZR);
// var_dump($porceZU);




#Chart estudiantes situacion social

$totalSSDIS=cuantos_objetos_atributo('estudiantes','prioritaria','DISCAPACITADO',$cn);
$totalSSVIC=cuantos_objetos_atributo('estudiantes','prioritaria','VICTIMA',$cn);
$totalSSIND=cuantos_objetos_atributo('estudiantes','prioritaria','INDIGENA',$cn);
$totalSSAFRO=cuantos_objetos_atributo('estudiantes','prioritaria','AFROCOLOMBIANO',$cn);
$totalSSRAI=cuantos_objetos_atributo('estudiantes','prioritaria','RAIZALES',$cn);
$totalSSROM=cuantos_objetos_atributo('estudiantes','prioritaria','ROM',$cn);
$totalSSMCH=cuantos_objetos_atributo('estudiantes','prioritaria','MUJER CABEZA DE HOGAR',$cn);
$totalSSLGTBI=cuantos_objetos_atributo('estudiantes','prioritaria','LGTBI',$cn);
$totalSSREI=cuantos_objetos_atributo('estudiantes','prioritaria','REINTEGRADOS',$cn);
$totalSSMIG=cuantos_objetos_atributo('estudiantes','prioritaria','MIGRANTES',$cn);
$totalSSOTR=cuantos_objetos_atributo('estudiantes','prioritaria','OTRA',$cn);
#Calculando

$totalSSDIS =round( (($totalSSDIS/$totalE)*100));
$totalSSVIC =round( (($totalSSVIC/$totalE)*100));
$totalSSIND =round( (($totalSSIND/$totalE)*100));
$totalSSAFRO =round( (($totalSSAFRO/$totalE)*100));
$totalSSRAI =round( (($totalSSRAI/$totalE)*100));
$totalSSROM =round( (($totalSSROM/$totalE)*100));
$totalSSMCH =round( (($totalSSMCH/$totalE)*100));
$totalSSLGTBI =round( (($totalSSLGTBI/$totalE)*100));
$totalSSREI =round( (($totalSSREI/$totalE)*100));
$totalSSMIG =round( (($totalSSMIG/$totalE)*100));
$totalSSOTR =round( (($totalSSOTR/$totalE)*100));


// var_dump( $totalSSDIS);
// var_dump( $totalSSVIC);
// var_dump( $totalSSIND);
// var_dump( $totalSSAFRO);
// var_dump( $totalSSRAI);
// var_dump( $totalSSROM);
// var_dump( $totalSSMCH);
// var_dump( $totalSSLGTBI);
// var_dump( $totalSSREI);
// var_dump( $totalSSMIG);
// var_dump( $totalSSOTR);





#Chart categoria de estudiantes

$totalTEA=cuantos_objetos_atributo('estudiantes','tipo_estrategia_id','1',$cn);
$totalTETCP=cuantos_objetos_atributo('estudiantes','tipo_estrategia_id','2',$cn);
$totalTEE=cuantos_objetos_atributo('estudiantes','tipo_estrategia_id','3',$cn);
$totalTEO=cuantos_objetos_atributo('estudiantes','tipo_estrategia_id','4',$cn);

// var_dump( $totalTEA);
// var_dump( $totalTETCP);
// var_dump( $totalTEE);
// var_dump( $totalTEO);


$porceTEA =round( (($totalTEA/$totalE)*100));
$porceTETCP =round( (($totalTETCP/$totalE)*100));
$porceTEE =round( (($totalTEE/$totalE)*100));
$porceTEO =round( (($totalTEO/$totalE)*100));



}
?>
<?php require'../view/gestion-estudiantes.view.php' ?>