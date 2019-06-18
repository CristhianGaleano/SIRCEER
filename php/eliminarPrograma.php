<?php 	session_start();
require_once 'Conexion.php';
require_once 'funciones.php';
include '../admin/config.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$snies = cleanData($_GET['snies']);
#echo "$snies";
if (empty($snies)) {
	?>
		<script type="text/javascript">
			window.location="<?php echo URL ?>gestion/errorIn.php";
		</script>
	
	<?php
		}else{
$sql = "DELETE FROM programas WHERE snies=:snies";

$ps = $cn->prepare($sql);
$ps->bindParam(':snies',$snies);
$result = $ps->execute();
var_dump($result);
if (!$result) {
	?>
	
		<script type="text/javascript">
			alert("Ocurrio un error al eliminar el programa.");
			window.location="<?php echo URL ?>gestion/buscar-programa.php?select=p";
		</script>
	
	<?php
}else{
	?>
		<script type="text/javascript">
			alert('El programa ha sido eliminado...');
			window.location="<?php echo URL ?>gestion/buscar-programa.php?select=p";
		</script>
	<?php
}
	
}
?>