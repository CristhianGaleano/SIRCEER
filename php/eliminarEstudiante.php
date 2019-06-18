<?php 	session_start();
require_once 'Conexion.php';
require_once 'funciones.php';
include '../admin/config.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

/*
INSTRUCCIONES:
ORDEN DE TRANSACCIONES DE TIPO DELETE
1. estudiante_serviciosocial (DELETE FROM estudiante_serviciosocial` WHERE `estudiante_serviciosocial`.`id` = 405")
2. matricula ()
3. estudainte
*/


$documento = cleanData($_GET['id']);
if (empty($documento)) {
	header("Location: ".URL."gestion/errorIn.php");
}
else
{


if($_SESSION['usuario']['perfil'] != 'REGULAR'){

		
		?>
		<script type="text/javascript">
			alert('Uste no puede eliminar un estudiante.');
			window.location="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e"; 
		</script>
		<?php
	}else{


#Get id entity
$id_estudiante = getSubjectByValue('estudiantes',$documento,'documento',$cn);
#var_dump($id_estudiante);

$sql_estudiante_servicio_social = "DELETE FROM estudiante_serviciosocial WHERE estudiante_serviciosocial.estudiante_serviciosocial_id = :id_estudiante";

$sql_matricula = "DELETE FROM matricula WHERE matricula.estudiante_id=:id_estudiante";

$sql_estudiante = "DELETE FROM estudiantes WHERE estudiantes.id=:id";


$ps = $cn->prepare($sql_estudiante_servicio_social);
$ps->bindParam(':id_estudiante', $id_estudiante['id']);
$result_estudiante_servicio = $ps->execute();

$ps = $cn->prepare($sql_matricula);
$ps->bindParam(':id_estudiante',$id_estudiante['id']);
$result_matricula = $ps->execute();



$ps = $cn->prepare($sql_estudiante);
$ps->bindParam(':id',$id_estudiante['id']);
$result_estudiante = $ps->execute();

#var_dump($result_matricula);
#var_dump($result_estudiante_servicio);
#var_dump($result_estudiante);

if ($result_estudiante_servicio != false && $result_matricula != false && $result_estudiante != false) {
	?>
	
		<script type="text/javascript">
			alert("Registro eliminado");
			window.location="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e";
		</script>
	<?php
}else
{
	?>
		<script type="text/javascript">
			alert("No es posible eliminar el estudiante...");
			//window.location="<?php echo URL ?>gestion/errorIn.php";
			window.location="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e";
		</script>
	<?php
}
	}
}
?>