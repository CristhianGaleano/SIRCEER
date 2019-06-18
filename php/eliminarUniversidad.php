<?php 	session_start();
require_once 'Conexion.php';
require_once 'funciones.php';
include '../admin/config.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$id_universidad = cleanData($_GET['id']);
#var_dump($id_universidad);
if (empty($id_universidad)) {
	?>
		<script type="text/javascript">
			window.location= "<?php echo URL ?>gestion/errorIn.php";
		</script>
	<?php
}else{
	#CONDICIONES : 
	# 1. 
	# 2. Eliminar universidad

$sql = "DELETE FROM universidades WHERE universidades.id = :id_universidad";

$ps_universidad = $cn->prepare($sql);
$ps_universidad->bindParam(':id_universidad',$id_universidad);
$rs_universidad = $ps_universidad->execute();

#var_dump($rs_universidad);


if ($rs_universidad != null) {
	?>
		<script type="text/javascript">
			alert("El registro ha sido eliminado...");
			window.location= "<?php echo URL ?>gestion/buscar-universidad.php?select=u";
		</script>
	<?php
}else
{
	?>
		<script type="text/javascript">
			alert("Ocurrio un error al tratar de eliminar la entidad"...);
			window.location= "<?php echo URL ?>gestion/buscar-universidad.php?select=u";
		</script>
	<?php
}
	
}
?>