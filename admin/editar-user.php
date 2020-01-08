<?php session_start(); ?>
<?php require '../php/funciones.php' ?>
<?php validateSession(); ?>
<?php require '../php/Conexion.php' ?>
<?php require 'config.php' ?>
<?php
$cn = getConexion($bd_config);
comprobarConexion($cn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	echo $_POST['id'];
	$id = cleanData($_POST['id']);
	$nombre = cleanData($_POST['nombre']);
	$usuario = cleanData($_POST['usuario']);
	$password = cleanData($_POST['password']);
	$email = cleanData($_POST['email']);
	$perfil = cleanData($_POST['perfil']);
	
	echo $id;

	$sqlUser = "UPDATE usuarios SET nombre_completo=:nombre, username=:usuario, password=:password, email=:email WHERE usuarios.id=:id";



	$sqlUsuariosPerfiles = "UPDATE usuarios_perfiles SET perfiles_id=:perfil WHERE usuarios_id=:id";

	$ps=$cn->prepare($sqlUser);
	$ps->bindParam(":nombre",$nombre);
	$ps->bindParam(":usuario",$usuario);
	$ps->bindParam(":password",$password);
	$ps->bindParam(":email",$email);
	$ps->bindParam(":id",$id);
	$ps->execute();

	$ps=$cn->prepare($sqlUsuariosPerfiles);
	$ps->bindParam(":perfil",$perfil);
	$ps->bindParam(":id",$id);
	$ps->execute();


	// echo a message to say the UPDATE succeeded
    #echo $ps->rowCount() . " records UPDATED successfully";

	?>
		<script type="text/javascript">
			window.location= "<?php echo URL ?>admin/principal-admin.php";
		</script>
	<?php
 
}else
{
	#Crear funcion para limpiar id
	$id_user = $_GET['id'];
	if (empty($id_user)) {
		header("Location:".URL."admin/principal-admin.php");
	}
	$result = getUserById($id_user,$cn);
		#var_dump($result);

}
?>

<?php require "../view/editar-user.view.php" ?>