<?php session_start();
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
require_once 'config.php';
validateSession();
$con = getConexion($bd_config);
comprobarConexion($con);
$statement = getAllUsers($con);
#var_dump($statement);


if (isset($_POST['enviar'])) {// O $_SERVER['REQUEST'] == 'POST' (para validar que los datos han sido enviados)

	
	$nombre = $_POST['nombre'];
	$codigo = trim( filter_var( $_POST['codigo'] )); //Para impedir que el usuario inyecte codigo
	$pass = trim( $_POST['password']);
	$perfil_id = $_POST['perfil'];
	$estado_id = $_POST['estado'];

		print_r($_POST);
		#inser on usuarios, and usuarios_perfiles
		#no vamos a utilizar query sino ps para aplicar seguridad
	$sql = "INSERT INTO usuarios(nombre,codigo,clave,rol_id) VALUES (:nombre,:codigo,:clave,:rol_id)";


	
	echo "Perfuil: $perfil_id<br>";
	echo "Estado: $pass<br>";
	echo "Nombre: $nombre<br>";
	echo "Codigo: $codigo<br>";

	$ps = $con->prepare($sql);
	$ps->bindParam(':nombre',$nombre);
	$ps->bindParam(':codigo',$codigo);
	$ps->bindParam(':clave',$pass);
	$ps->bindParam(':rol_id',$perfil_id);
	$result = $ps->execute();
	var_dump($result);

	if ($result != false) {
		?>
			<script type="text/javascript">
				window.location="<?php echo URL ?>admin/principal-admin.php";
			</script>
		<?php
	}else{?>
	<script>
		alert("Ocurrio un error en la insercion..");
	</script>
	<?php }

	
}?>

<?php require '../view/principal-admin.view.php'; ?>
