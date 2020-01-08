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
	$id = cleanData($_POST['id']);
	$nombre = strtoupper( cleanData($_POST['nombre']));
	$telefono = cleanData($_POST['telefono']);
	$municipio =  strtoupper( cleanData($_POST['municipio']));
	$calendario = cleanData($_POST['calendario']);
	$dane = cleanData($_POST['dane']);
	$sector = cleanData($_POST['sector']);
	$zona = cleanData($_POST['zona']);

	$sql = 
	"UPDATE instituciones SET nombre=:nombre,telefono=:telefono,calendario=:calendario,DANE=:dane,municipio=:municipio,sector_id=:sector,zona_id=:zona WHERE instituciones.id=:id";

	$ps=$cn->prepare($sql);
	$ps->bindParam(":nombre",$nombre);
	$ps->bindParam(":telefono",$telefono);
	$ps->bindParam(":municipio",$municipio);
	$ps->bindParam(":calendario",$calendario);
	$ps->bindParam(":dane",$dane);
	$ps->bindParam(":sector",$sector);
	$ps->bindParam(":zona",$zona);
	$ps->bindParam(":id",$id);

	$result = $ps->execute();
	if ($result) {
		?>
			<script type="text/javascript">
				alert('Institución actualizada...');
				window.location = "<?php echo URL ?>gestion/buscar-institucion.php?select=i"
			</script>
		<?php
	}else{
		?>
			<script type="text/javascript">
				//alert('Ocurrio un error...');
				window.location = "<?php echo URL ?>gestion/buscar-institucion.php?select=i"
			</script>
		<?php
	}
    $enviado = true;


}
	else{
		
		?>
		<script type="text/javascript">
			alert('Uste no puede realizar esta modificación.');
			window.location="<?php echo URL ?>gestion/buscar-institucion.php?select=i"; 
		</script>
		<?php

	}

}else
{
	#Crear funcion para limpiar id
	$id_institucion = $_GET['id'];
	if (empty($id_institucion)) {
		header("Location:errorIn.php");
	}
	#echo $id_insti;
	$result = getAllSubjectByValue('instituciones',$id_institucion,'id',$cn);
	#var_dump($result);
	$sectores = getAllSubject('sectores',$cn);
	$zonas = getAllSubject('zonas',$cn);
	

}
?>

<?php require '../view/editar-institucion.view.php' ?>