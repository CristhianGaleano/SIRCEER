<?php 	session_start();
require_once 'Conexion.php';
require_once 'funciones.php';
include '../admin/config.php';
validateSession();
$con = getConexion($bd_config);
comprobarConexion($con);
$id = cleanData($_GET['id']);

if (empty($id)) {
	?>
		<script type="text/javascript">
			window.location="<?php echo URL ?>gestion/errorIn.php";
		</script>
	<?php
}
else
{
$sql="DELETE FROM alianzas WHERE alianzas.id=:id";

$ps = $con->prepare($sql);
$ps->bindParam(':id',$id);
$result = $ps->execute();

#var_dump($result);
if (!$result) {
	?>
		<script type="text/javascript">
			alert("Ocurrio un error al eliminar la alianza.");
			window.location="<?php echo URL ?>gestion/buscar-alianza.php?select=a";
		</script>
	<?php
}else
{
	?>
	
		<script type="text/javascript">
			alert("La alianza ha sido eliminada.");
			window.location="<?php echo URL ?>gestion/buscar-alianza.php?select=a";
		</script>
	<?php
}
	
}
?>