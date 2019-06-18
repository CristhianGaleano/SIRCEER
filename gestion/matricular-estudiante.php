<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';


validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

?>


<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
	// echo "Entro a matricular";
	$anio = Date("Y");
	$semestre = $_POST['semestre'];
	$periodo = $_POST['periodo'];
	$estudiante_id = $_POST['id'];
	$documento = $_POST['documento'];
	$programa_id = $_POST['programa'];


		$estado=saveMatricula($anio,$semestre,$periodo,$estudiante_id,$programa_id,$cn);
	if ($estado) {
		?>
		<script type="text/javascript">
			alert("EL estudiante ha sido matriculado con exito");
			window.location="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e";
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Lo sentimos, ocurrio un error mientras se matriculaba al estudiante");
			window.location="<?php echo URL ?>gestion/matricular-estudiante.php?select=e";
		</script>
		<?php
	}

}else{
	// datos para el modal
$programas = getAllSubject('programas',$cn);
// var_dump($programas);
$datosEstudiante = "";
$documento = cleanData($_GET['docu']);
$datosEstudiante = getAllStudentRelations($documento,$cn);
// var_dump($datosEstudiante);
}

 ?>

<?php require "../view/matricular-estudiante.view.php" ?>