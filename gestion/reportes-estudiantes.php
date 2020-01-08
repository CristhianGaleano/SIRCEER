<?php session_start(); 
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
require_once '../mpdf60/mpdf.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$sedes = getAllSubject('sedes',$cn);



#$fuentes_recursos = getFuenteRecurso($cn);
#$internados = getInternado($cn);


#$tipos_sangre = getTiposSangre($cn);
$sedes = getColegio($cn);

$zonas = getZona($cn); 






$epss = getAllSubject('eps',$cn);
$tipos_estrategias = getAllSubject('tipos_estrategias',$cn)


?>

<?php 
#Objectivo mostrar el listado de estudaintes por institucion o se seleccionada

if (isset($_POST['genero_post'])) {
	$fecha = Date("Y-m-d");
	$genero =  $_POST['genero'];
	$sede =  $_POST['institucion'];
	$estudiantes = cuanto_propiedad_estudiante("estudiantes","genero",$genero,$sede,$cn);
	$ps=$cn->prepare("select FOUND_ROWS() as total;");
	$ps->execute();
	$num = $ps->fetch()['total'];
	// var_dump($num);
	
	require "../view/reportes-estudiantes-parameters.view.php";
	

}

if (isset($_POST['zona_post'])) {
	$fecha = Date("Y-m-d");
	$zona =  $_POST['zona'];
	$sede =  $_POST['institucion'];
	$estudiantes = cuanto_propiedad_estudiante("estudiantes","zona_id",$zona,$sede,$cn);
	$ps=$cn->prepare("select FOUND_ROWS() as total;");
	$ps->execute();
	$num = $ps->fetch()['total'];
	// var_dump($num);

	#$estudiantes_sedes = getEstudiantesBySede($_POST['sede'],$cn);
	#var_dump($estudiantes);
	require "../view/reportes-estudiantes-parameters.view.php";
	

}

if (isset($_POST['edad_post'])) {
	$fecha = Date("Y-m-d");
	$desde =  $_POST['desde'];
	$hasta =  $_POST['hasta'];
	$sede =  $_POST['institucion'];
	#$num = contarRegitro("estudiantes","genero_id",$genero,$institucion,"sede_id","sedes",$cn);
	$estudiantes = consultarEstudiantesRangoEdad($desde,$hasta,$sede,$cn);

	#$estudiantes_sedes = getEstudiantesBySede($_POST['sede'],$cn);
	#var_dump($estudiantes);
	require "../view/reportes-estudiantes-parameters.view.php";
	

}

 ?>


<?php require "../view/reportes-estudiantes.view.php" ?>
