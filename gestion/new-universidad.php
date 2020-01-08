<?php session_start(); ?>
<?php 	require_once '../admin/config.php';
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

#$alianzas = getAllSubject('alianzas',$cn);
$tipos_universidades = getAllSubject('tipos_universidades',$cn);
$enviado = "";
if (isset($_POST['submit'])) {

	$errores = "";
	$parameters = array(
		"nombre","tipo_universidad","municipio"
		);

	#var_dump($parameters);
	#echo "string";
	$errores = validarErrores($parameters,$errores);
	#var_dump($errores);


	if (empty($errores)) {
		$enviado = true;
		
		$nombre = strtoupper( $_POST['nombre']);
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$direccion = strtoupper($_POST['direccion']);
		$municipio = $_POST['municipio'];
		#$alianza = $_POST['alianza'];
		$tipo_universidade = $_POST['tipo_universidad'];
		
if ($_SESSION['usuario']['perfil'] == 'REGULAR') {

$estado_universidad = saveUniversidad(
	$nombre,$telefono,$email,$direccion,$municipio,$tipo_universidade,$cn
	);



	if ($estado_universidad) {
		?> 
			<script type="text/javascript">
				alert("Universidad agregada...");
				window.location="<?php echo URL ?>gestion/new-universidad.php?select=u";
			</script>
		<?php
	}else{
		?> 
			<script type="text/javascript">
				alert('Ocurrio un error ingresando la Universidad...');
				window.location="<?php echo URL ?>gestion/buscar-universidad.php?select=u"; 
			</script>
		<?php
	}

}else{
		
		?>
		<script type="text/javascript">
			alert('Uste no puede ingresar una nueva Universidad.');
			window.location="<?php echo URL ?>gestion/buscar-universidad.php?select=u"; 
		</script>
		<?php

	}

}
}
?>
<?php include '../view/new-universidad.view.php' ?>