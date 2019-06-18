<?php session_start(); ?>
<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>
<?php require '../admin/config.php' ?>
<?php validateSession(); ?>
<?php
$cn = getConexion($bd_config);
comprobarConexion($cn);


$alianzas = getAllSubject('alianzas',$cn);
$sedes = getAllSubject('sedes',$cn);

$enviado = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$alianza = $_POST['alianza'];
	$sede = $_POST['sede'];

	$result=add_alianza_sede($alianza,$sede,$cn);
	if ($result) {
		?>
			<script type="text/javascript">
				alert('Rgistro ingresado.');
				window.location="<?php echo URL ?>gestion/buscar-alianza.php?select=a";
			</script>
		<?php
	}else{
		?>
			<script type="text/javascript">
				alert('Error: Registro no ingresado.');
				window.location="<?php echo URL ?>gestion/add-alianza-sede.php?select=a";
			</script>
		<?php
	}
}
?>

<?php require '../view/add-alianza-sede.view.php' ?>