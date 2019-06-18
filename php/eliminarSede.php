<?php 	session_start();
require_once 'Conexion.php';
require_once 'funciones.php';
include '../admin/config.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
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
$sql="DELETE FROM sedes WHERE sedes.id=:id";

$ps = $cn->prepare($sql);
$ps->bindParam(':id',$id);
$result = $ps->execute();

#var_dump($result);
if (!$result) {
	?>
		<script type="text/javascript">
			window.location="<?php echo URL ?>gestion/errorIn.php";
		</script>
	<?php
}else
{
	?>
	
		<script type="text/javascript">
			window.location="<?php echo URL ?>gestion/buscar-sede.php?select=s";
		</script>
	<?php
}
	
}
?>