<?php session_start(); ?>
<?php 	
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

$sectores = getAllSubject('sectores',$cn);

$zonas = getAllSubject('zonas',$cn);


$enviado = "";
if (isset($_POST['submit'])) {


	if ($_SESSION['usuario']['perfil'] == 'REGULAR') {
	#echo "entro post";
	#var_dump($_POST);
	$errores = "";
	$parameters = array(
		"nombre","calendario"
		);
	#var_dump($parameters);
	#echo "string";
	$errores = validarErrores($parameters,$errores);
	#var_dump($errores);
	if (empty($errores)) {
		$enviado = true;
		#Obtenemos los valores de los campos en el formulario
		$nombre = strtoupper( $_POST['nombre']);
		$telefono = $_POST['telefono'];
		$calendario = $_POST['calendario'];
		$dane = $_POST['dane'];
		$sector = $_POST['sector'];
		$municipio = $_POST['municipio'];
		$zona = $_POST['zona'];


		// echo "<br> nombre: <br>"; $nombre;
		// echo "telefono: <br>"; $telefono;
		// echo "calendario: <br>"; $calendario;
		// echo "dane: <br>"; $dane;
		// echo "sector: <br>"; $sector;
		// echo "municipio: <br>"; $municipio;
		// echo "zona: <br>"; $zona;
		
		

$estado_institucion = saveInstitucion(
	$nombre,
	$telefono,
	$calendario,
	$dane,
	$sector,
	$municipio,
	$zona,
	$cn
	);

	
	if ($estado_institucion) {
		?>
			<script type="text/javascript">
				alert('Institucion registrada...');
				window.location = "<?php echo URL ?>gestion/new-institucion.php?select=i"
			</script>
		<?php
	}else{ ?>
		<script type="text/javascript">
			alert("Ha ocurrido un error...");	
			   // window.location = "<?php echo URL ?>gestion/new-institucion.php?select=i"
		</script>
	<?php }

}

}
	else{
		
		?>
		<script type="text/javascript">
			alert('Uste no puede ingresar una nueva institución.');
			window.location="<?php echo URL ?>gestion/buscar-institucion.php?select=i"; 
		</script>
		<?php

	}

}//Cierre if POST
?>

<?php require("../view/new-institucion.view.php") ?>
