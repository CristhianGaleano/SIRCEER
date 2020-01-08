<?php session_start(); ?>
<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>
<?php require '../admin/config.php' ?>
<?php validateSession(); ?>
<?php
$cn = getConexion($bd_config);
comprobarConexion($cn);
?>


<?php 
//Logica
$success = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

 // var_dump($_POST);
 #print_r($_FILES);
 	$id= $_POST['id'];
	$codigo = trim( $_POST['codigo']);
	$clave = trim($_POST['clave']);
	
	#A traves de la funcion checkeamos el tamaño de la foto pero esta a la vez nos devuelve false, en caso he 
		#no haber ninguna foto
		#Colocamos un @ para que no nos vote un error de tipo notificacion
		$check = @getimagesize($_FILES['imagen']['tmp_name']);
		#validamos que halla una imagen
		if ($check !== false) {
			#Carpeta destino (ya creada en el servidor)
			$destino = "../fotos/";
			#ruta completa destino-nombre foto (Ej: fotos/imagen1.jpg)
			$archivo_subido = $destino . $_FILES['imagen']['name'];
			#movemos la foto al servidor
			move_uploaded_file($_FILES['imagen']['tmp_name'],$archivo_subido);
		}
		$foto = $_FILES['imagen']['name'];
		$foto = ($_FILES['imagen']['name'] == '' || empty($_FILES['imagen']['name'])) ? 'pordefecto.png' : $_FILES['imagen']['name'] ;

		//transaccion
		$sql = "UPDATE usuarios SET nombre=:codigo, clave=:clave , img=:img WHERE usuarios.id=:id";
		$ps=$cn->prepare($sql);
		$ps->bindParam(':codigo',$codigo);
		$ps->bindParam(':clave',$clave);
		$ps->bindParam(':img',$foto);
		$ps->bindParam(':id',$id);
		// var_dump($ps);
		$ps = $ps->execute();
		$success = ($ps != false) ? true : false ;

		// var_dump($ps);

} else {
	$id =  trim($_GET['id']);
}


 ?>

<?php require '../views/cuenta-user.view.php'; ?>