<?php 
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
?>
<?php 
$cn = getConexion($bd_config);
comprobarConexion($cn);
	$id_programa = $_POST['id_programa'];
	

	$sql = "SELECT * FROM programas where programas.id=$id_programa";
	$ps = $cn->prepare($sql);
	$ps->execute();
	$rs = $ps->fetch();

	echo $rs['snies'];
 ?>
 