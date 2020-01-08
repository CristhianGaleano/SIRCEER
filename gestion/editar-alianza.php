<?php session_start(); ?>
<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>
<?php require '../admin/config.php' ?>
<?php validateSession(); ?>
<?php
$cn = getConexion($bd_config);
comprobarConexion($cn);


$estados_civiles = getAllSubject('estado_civil',$cn);

$enviado = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

if ($_SESSION['usuario']['perfil'] == 'REGULAR') {

	#print_r($_POST);
	$id = $_POST['id'];
	$nombre = strtoupper( cleanData($_POST['nombre']));
	$fecha_inicio = cleanData($_POST['fecha_ini']);
	$fecha_final = cleanData($_POST['fecha_fina']);
	$cupos = cleanData($_POST['cupos']);
	
	#Crear funcion para esto
	$sql = 
	"UPDATE alianzas SET nombre=:nombre,
	fecha_inicio=:fecha_inicio,
	fecha_final=:fecha_final,
	cupos=:cupos
	WHERE 
	id=:id";

	$ps=$cn->prepare($sql);
	$ps->bindParam(":nombre",$nombre);
	$ps->bindParam(":fecha_inicio",$fecha_inicio);
	$ps->bindParam(":fecha_final",$fecha_final);
	$ps->bindParam(":cupos",$cupos);
	$ps->bindParam(":id",$id);
	$rs_alianza = $ps->execute();
	

	// echo a message to say the UPDATE succeeded
	#echo $ps->rowCount() . " records UPDATED successfully";
	if ($rs_alianza) {
		?>
			<script type="text/javascript">
				alert('Alianza actualizada...');
				window.location="<?php echo URL ?>gestion/buscar-alianza.php?select=a";
			</script>
		<?php
	}else{
		?>
			<script type="text/javascript">
				alert('Ha ocurrido un error...');
				window.location="<?php echo URL ?>gestion/buscar-alianza.php?select=a";
			</script>
		<?php
	}
    
	$enviado = true;


	}
	else{
		
		?>
		<script type="text/javascript">
			alert('Uste no puede realizar esta modificación.');
			window.location="<?php echo URL ?>gestion/buscar-alianza.php?select=a"; 
		</script>
		<?php

	}

}else
{
	#Crear funcion para limpiar id
	$id_alianza = $_GET['id'];
	if (empty($id_alianza)) {
		?>
			<script type="text/javascript">
				window.location="<?php echo URL ?>gestion/errorIn.php";
			</script>
		<?php
	}
	$result = getSubjectByValue("alianzas",$id_alianza,'id',$cn);
	#var_dump($result);

}
?>

<?php require '../view/editar-alianza.view.php' ?>