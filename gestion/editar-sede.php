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
	$id = $_POST['id'];
	$nombre = strtoupper( cleanData($_POST['nombre']));
	$codigo_dane = cleanData($_POST['codigo_dane']);
	$consecutivo = cleanData($_POST['consecutivo']);
	$zona = cleanData($_POST['zona']);
	$modelo = cleanData($_POST['modelo']);
	$institucion = cleanData($_POST['institucion']);
	$municipio = cleanData($_POST['municipio']);
	
	#Crear funcion para esto
	$sql = 
	"UPDATE sedes SET nombre=:nombre,codigo_dane_sede=:codigo_dane_sede,consecutivo=:consecutivo,zona_id=:zona_id,modelo_id=:modelo_id,institucion_id=:institucion_id,municipio=:municipio WHERE sedes.id=:id";

	$ps=$cn->prepare($sql);
	$ps->bindParam(":nombre",$nombre);
	$ps->bindParam(":codigo_dane_sede",$codigo_dane);
	$ps->bindParam(":consecutivo",$consecutivo);
	$ps->bindParam(":zona_id",$zona);
	$ps->bindParam(":modelo_id",$modelo);
	$ps->bindParam(":institucion_id",$institucion);
	$ps->bindParam(":municipio",$municipio);
	$ps->bindParam(":id",$id);
	$rs_alianza = $ps->execute();
	

	// echo a message to say the UPDATE succeeded
	#echo $ps->rowCount() . " records UPDATED successfully";
	if ($rs_alianza) {
		?>
			<script type="text/javascript">
				alert('Sede actualizada...');
				window.location="<?php echo URL ?>gestion/buscar-sede.php?select=s";
			</script>
		<?php
	}else{
		?>
			<script type="text/javascript">
				window.location="<?php echo URL ?>gestion/errorIn.php";
			</script>
		<?php
	}
    
	$enviado = true;

}
	else{
		
		?>
		<script type="text/javascript">
			alert('Uste no puede realizar este modificación.');
			window.location="<?php echo URL ?>gestion/buscar-sede.php?select=s"; 
		</script>
		<?php

	}

}else
{
	#Crear funcion para limpiar id
	$id_sede = $_GET['id'];
	if (empty($id_sede)) {
		?>
			<script type="text/javascript">
				window.location="<?php echo URL ?>gestion/errorIn.php";
			</script>
		<?php
	}
	$result = getSubjectByValue("sedes",$id_sede,'id',$cn);
	$modelos = getAllSubject('modelos',$cn);
	$instituciones = getAllSubject('instituciones',$cn);
	$zonas = getAllSubject('zonas',$cn);
	#var_dump($result);

}
?>

<?php require '../view/editar-sede.view.php' ?>