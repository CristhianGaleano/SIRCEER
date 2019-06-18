<?php session_start(); ?>
<?php 	require_once '../admin/config.php';?>
<?php  require_once '../php/Conexion.php';?>
<?php  require_once '../php/funciones.php';
#validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$niveles = getAllSubject('nivel_academico',$cn);
$universidades = getAllSubject('universidades',$cn);
// var_dump($universidades);
#las anteriores pueden ser reemplazadas por esta
$jornadas = getAllSubject('jornadas',$cn);
$enviado = "";

if (isset($_POST['submit'])) {

	$errores = "";
	$parameters = array(
		"nombre","codigo_snies","jornada","nivel_academico","universidad","universidad"
		);
	#var_dump($parameters);
	#echo "string";
	$errores = validarErrores($parameters,$errores);
	#var_dump($errores);


	if (empty($errores)) {
		$enviado = true;



		$codigo_snies =  $_POST['codigo_snies'];
		$nombre = strtoupper( $_POST['nombre'] );
		$semestres = $_POST['semestres'];
		$valor_semestre = $_POST['valor_semestre'];
		$nivel_academico = $_POST['nivel_academico'];
		$universidad = $_POST['universidad'];
		$jornada = $_POST['jornada'];
		


if ($_SESSION['usuario']['perfil'] == 'REGULAR') {

$estado_programa = saveProgram(
	$codigo_snies,$nombre,$semestres,$valor_semestre,$nivel_academico,$universidad,$jornada,$cn
	);


	if ($estado_programa) {
		?>
			<script type="text/javascript">
				alert("Programa registrado...");
				window.location="<?php echo URL ?>gestion/buscar-programa.php?select=p";
			</script>
		<?php
	}else{
		?>
			<script>
				alert("Error al registrar el programa...");
				window.location="<?php echo URL ?>gestion/new-programa.php?select=p";
			</script>
		<?php
	}

}elseif($_SESSION['usuario']['perfil'] != 'REGULAR') {
	?>
			<script type="text/javascript">
				alert("Usted no puede agregar un nuevo programa...");
				window.location="<?php echo URL ?>gestion/buscar-programa.php?select=p";
			</script>
		<?php
}

}//Cierre errores



}//Cierre post
?>
<?php include '../view/new-programa.view.php' ?>