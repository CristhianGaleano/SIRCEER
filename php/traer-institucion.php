<?php 
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
?>
<?php 
$cn = getConexion($bd_config);
comprobarConexion($cn);
	$id_programa = $_GET['id'];
	#echo "$id_programa";
	$sql = "SELECT * FROM programas INNER JOIN instituciones ON programas.institucion_id=instituciones.id AND programas.snies=$id_programa";
	$ps = $cn->prepare($sql);
	$ps->execute();
	$rs = $ps->fetch();

	echo $rs['nombre'] . "/ <br>";
	echo $rs['snies'];
 ?>