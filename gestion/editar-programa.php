<?php session_start(); ?>
<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>
<?php require '../admin/config.php' ?>
<?php validateSession(); ?>
<?php
$cn = getConexion($bd_config);
comprobarConexion($cn);
$enviado = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

	if ($_SESSION['usuario']['perfil'] == 'REGULAR') {

	#print_r($_POST);
	$snies = cleanData($_POST['snies']);
	$nombre = strtoupper( cleanData($_POST['nombre']));
	$num_semestres = cleanData($_POST['num_semestres']);
	$num_creditos = cleanData($_POST['valor_semestre']);
	$nivel_academico = cleanData($_POST['nivel_academico']);
	$universidad = cleanData($_POST['universidad']);
	$jornada = cleanData($_POST['jornada']);

	$sql = 
	"UPDATE programas SET snies=:snies,nombre=:nombre,cantidad_semestre=:cantidad_semestre,costo_semestre=:costo_semestre,nivel_academico_id=:nivel_academico,universidad_id=:universidad_id,jornada_id=:jornada_id WHERE programas.snies=:snies";
	$ps=$cn->prepare($sql);

	$ps->bindParam(":nombre",$nombre);
	$ps->bindParam(":cantidad_semestre",$num_semestres);
	$ps->bindParam(":costo_semestre",$num_creditos);
	$ps->bindParam(":nivel_academico",$nivel_academico);
	$ps->bindParam(":universidad_id",$universidad);
	$ps->bindParam(":jornada_id",$jornada);
	$ps->bindParam(":snies",$snies);
	$ps = $ps->execute();
	

	// echo a message to say the UPDATE succeeded
   # echo $ps->rowCount() . " records UPDATED successfully";
	#var_dump($ps);
	if ($ps) {
		?>
		
			<script type="text/javascript">
				alert('Programa actualizado...');
				window.location="<?php echo URL ?>gestion/buscar-programa.php?select=p";
			</script>
		
		<?php
	}else{
		?>
		
			<script type="text/javascript">
				alert('Ha ocurrido un error...');
				window.location="<?php echo URL ?>gestion/errorIn.php";
			</script>
		
		<?php
	}
    
    $enviado = true;


}
	else{
		
		?>
		<script type="text/javascript">
			alert('Uste no puede realizar esta modificación.');
			window.location="<?php echo URL ?>gestion/buscar-programa.php?select=p"; 
		</script>
		<?php

	}

}else
{
	#Crear funcion para limpiar id
	$snies_programa = $_GET['snies'];
	if (empty($snies_programa)) {
		?>
			<script type="text/javascript">
				window.location="<?php echo URL ?>gestion/errorIn.php";
			</script>
		<?php
	}

	$result = getSubjectByValue("programas",$snies_programa,'snies',$cn);
		#var_dump($result);
	$universidades = getAllSubject('universidades',$cn);
	$jornadas = getAllSubject('jornadas',$cn);
	$niveles = getAllSubject('nivel_academico',$cn);
	

}
?>

<?php require '../view/editar-programa.view.php' ?>