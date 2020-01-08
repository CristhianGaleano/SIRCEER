<?php session_start(); ?>
<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>
<?php require '../admin/config.php' ?>
<?php validateSession(); ?>
<?php
$cn = getConexion($bd_config);
comprobarConexion($cn);


$alianzas = getAllSubject('alianzas',$cn);
$universidades = getAllSubject('universidades',$cn);

$enviado = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

	$alianza = $_POST['alianza'];
	$universidad = $_POST['universidad'];

	$result=add_alianza_universidad($alianza,$universidad,$cn);
	if ($result) {
		?>
			<script type="text/javascript">
				alert('Registro ingresado.');
				window.location="<?php echo URL ?>gestion/add-alianza-university.php?select=a";
			</script>
		<?php
	}else{
		?>
			<script type="text/javascript">
				alert('Error: Registro no ingresado.');
				window.location="<?php echo URL ?>gestion/add-alianza-university.php?select=a";
			</script>
		<?php
	}
}
?>

<?php require '../view/add-alianza-university.view.php' ?>