<?php 	session_start();
require_once 'Conexion.php';
require_once 'funciones.php';
include '../admin/config.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$id_institucion = cleanData($_GET['id']);
#var_dump($id_institucion);
if (empty($id_institucion)) {
	?>
		<script type="text/javascript">
			window.location= "<?php echo URL ?>gestion/errorIn.php";
		</script>
	<?php
}else{
	#CONDICIONES : 
	# 1. Eliminar su sede.
	# 2. Eliminar institucion

$sql = "DELETE FROM sedes WHERE sedes.institucion_id = :id_institucion";

$ps_sede = $cn->prepare($sql);
$ps_sede->bindParam(':id_institucion',$id_institucion);
$rs_sede = $ps_sede->execute();

#var_dump($rs_sede);



#Y finalmente institucion
$sql_institucion = "DELETE FROM instituciones WHERE id=:id_institucion";
$ps_institucion = $cn->prepare($sql_institucion);
$ps_institucion->bindParam(':id_institucion',$id_institucion);
$rs_institucion = $ps_institucion->execute();
#var_dump($rs_institucion);

if ($rs_sede != null && $rs_institucion != null) {
	?>
		<script type="text/javascript">
			alert("La institución ha sido eliminada.");
			window.location= "<?php echo URL ?>gestion/buscar-institucion.php?select=i";
		</script>
	<?php
}else
{
	?>
		<script type="text/javascript">
			alert("Ha ocurrido un error al tratar de eliminar la entidad.");
			window.location= "<?php echo URL ?>gestion/buscar-institucion.php?select=i";
		</script>
	<?php
}
	
}
?>