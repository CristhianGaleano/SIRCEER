<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
?>
<?php 
$cn = getConexion($bd_config);
comprobarConexion($cn);

//*************PETICION POST********************
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['enviar'])) {
	#var_dump($_POST);

	if ($_SESSION['usuario']['perfil'] == 'REGULAR') {

$id = $_POST['id'];
$nombre = strtoupper( $_POST['nombre']);
$telefono = $_POST['telefono'];
$email = $_POST['email'];
#echo "$semestre_id";
$direccion =  $_POST['direccion'];
$municipio =  $_POST['municipio'];
#$alianza =  $_POST['alianza'];
$tipo_universidad =  $_POST['tipo_universidad'];

$estado = 1;


$sql ="UPDATE universidades SET nombre=:nombre,telefono=:telefono,email=:email,direccion=:direccion,municipio=:municipio,tipo_universidad_id=:tipo_universidad_id WHERE universidades.id=:id";

$ps = $cn->prepare($sql);

$ps->bindParam(':nombre',$nombre);
$ps->bindParam(':telefono',$telefono);
$ps->bindParam(':email',$email);
$ps->bindParam(':direccion',$direccion);
$ps->bindParam(':municipio',$municipio);
#$ps->bindParam(':alianza_id',$alianza);
$ps->bindParam(':tipo_universidad_id',$tipo_universidad);
$ps->bindParam(':id',$id);

$result = $ps->execute();
#var_dump($result);

if ($result != false) {
	?>
		<script type="text/javascript">
			alert('Universidad actualizada...');
			window.location="<?php echo URL ?>gestion/buscar-universidad.php?select=u";
		</script>
	<?php
	}else{
		?>
		
		<script type="text/javascript">
			//window.location="<?php echo URL ?>gestion/errorIn.php";
		</script>
	
	<?php
	}

	}
	else{
		
		?>
		<script type="text/javascript">
			alert('Uste no puede no puede realizar esta modificación.');
			window.location="<?php echo URL ?>gestion/buscar-universidad.php?select=u"; 
		</script>
		<?php

	}

}
else
{
#Necesidades:
/*

*/
$id = cleanData($_GET['id']);
#echo "$documento";
$result = getSubjectByValue('universidades',$id,'id',$cn);
#var_dump($result);
#echo "<br>***********<br>";
$municipios = getAllSubject('municipios',$cn);
$alianzas = getAllSubject('alianzas',$cn);
$tipos_universidad = getAllSubject('tipos_universidades',$cn);
#var_dump($matricula);
}

?>

<?php require '../view/editar-universidad.view.php'?>