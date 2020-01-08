<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
?>
<?php 
$cn = getConexion($bd_config);
comprobarConexion($cn);

//*************PETICION POST PARA NOTA FINAL********************
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['cargar'])) {
	#var_dump($_POST);

/*
EN EL CASO DE CARGA DE PROMEDIO
REQUISITOS:
1. Id matricula
2. Id semestre
3. Valor promedio
4. Insertar historial_academico_semestre
*/
#$documento = $_POST['documento'];
$matricula_id = $_POST['matricula'];
$semestre = $_POST['semestre'];
$periodo = $_POST['periodo'];
$promedio =  $_POST['promedio'];
$estado_matricula =  $_POST['estado_matricula'];

// echo "<hr>";
// echo "<br>". $matricula_id . "<br>";
// echo "<br>". $semestre . "<br>";
// echo "<br>". $periodo . "<br>";
// echo "<br> ". $promedio . "<br>";
// echo "<br>" . $estado_matricula. "<br>";
$estado = 1;

$fecha_modificacion = date("Y-m-d:h:m:s");

#actualizar nota y estado ademas en caso que sea NO APROBADO, update estado estudiantes de ACTIVO a INACTIVO(PENDIENTE)


$sql ="UPDATE matriculas SET promedio=$promedio, estado='".$estado_matricula."' WHERE semestre=$semestre AND promedio=0.0 AND periodo=$periodo AND id=$matricula_id";

$ps = $cn->prepare($sql);
#echo "<br>";
// var_dump($ps);
$result = $ps->execute();
echo "<br>Updating...";
// var_dump($result);

if ($estado_matricula === "NO APROBADO") {
	$sql = "UPDATE estudiantes SET estado='INACTIVO' WHERE estudiantes.id=( SELECT estudiante_id FROM matriculas WHERE matriculas.id=$matricula_id  )"; 
	$ps = $cn->prepare($sql);
#echo "<br>";
var_dump($ps);
$result = $ps->execute();
echo "<br>Updating estudiante...";
var_dump($result);
}

if ($result != false) {
	?>
		<script type="text/javascript">
			alert('Registro actualizado...');
			window.location="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e";
		</script>
	<?php
	
	}else{
		?>
			<script type="text/javascript">
				alert('Ocurrio un error...');
				window.location="<?php echo URL ?>gestion/gestionar-estudiante.php?select=e";
			</script>
		<?php
	}




#*****************************************************************************************************************************************************
#*****************************************************************************************************************************************************
#*****************************************************************************************************************************************************



}elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['matricular'])) {

	#var_dump($_POST);
	#obteniendo valores de la variable $_POST[]
	#$documento = $_POST['documento'];
	$estudiante_id = $_POST['estudiante_id'];
	$programa_id = $_POST['programa_id'];
	$periodo = $_POST['periodo'];
	$semestre = $_POST['semestre'];
	$anio = Date("Y");


	#$id_estudiante = getSubjectByValue('estudiantes',$documento,'documento',$cn);
	#var_dump($id_estudiante);
	$estado_matricula = saveMatricula($anio,$semestre,$periodo,$estudiante_id,$programa_id,$cn);
	$id_matricula = $cn->lastInsertId();
	saveFacturaEstudiante($estudiante_id,$programa_id,$id_matricula,$cn);
	?>
	<script type="text/javascript">
			alert('Registro actualizado...');
			window.location="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e";
		</script>
<?php
}
//END PETICION POST
else
{
#Necesidades:
/*
1. El estudiante a mostrar (Ya esta seleccionado).
2. Frm para diligencias la tabla semestre.
3. Traer el programa y la institucion a la que pertenece el estudiante
4. Finalmente con estos datos hacer un insert para "evaluacion_semestral"
*/
$documento = cleanData($_GET['id']);
#echo "$documento";
$datosEstudiante = getAllStudentRelations($documento,$cn);
#var_dump($datosEstudiante);
#echo "<br>***********<br>";
$matricula = getMatriculaEstudiante($documento,$cn);
$programas = getProgramas($cn);
#var_dump($matricula);
}

?>

<?php require '../view/gestionar-estudiante.view.php'?>