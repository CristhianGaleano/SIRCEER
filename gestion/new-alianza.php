<?php session_start(); ?>
<?php 	
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

#var_dump($_SESSION);

$enviado = "";
if (isset($_POST['submit'])) {
	#echo "entro post";

	
	
	
	#var_dump($_POST);
	$errores = "";
	$parameters = array(
		"nombre"
		);
	#var_dump($parameters);
	#echo "string";
	$errores = validarErrores($parameters,$errores);
	#var_dump($errores);
	if (empty($errores)) {
		$enviado = true;
		#Obtenemos los valores de los campos en el formulario
		$nombre = strtoupper( $_POST['nombre']);
		$fecha_ini = $_POST['fecha_ini'];
		$fecha_final = $_POST['fecha_final'];
		$cupos = $_POST['cupos'];
	
	if ($_SESSION['usuario']['perfil'] == 'REGULAR') {	
		echo "Regular";

$estado_alianza = saveAlianza(
	$nombre,$fecha_ini,$fecha_final,$cupos,$cn
	);

	if ($estado_alianza) {
		?> 
			<script type="text/javascript">
				alert('Alianza agregada...');
				window.location="<?php echo URL ?>gestion/new-alianza.php?select=a";
			</script>
		
		<?php
	}else{
		?> 
			<script type="text/javascript">
				alert('Ha ocurido un error...');
				window.location="<?php echo URL ?>gestion/buscar-alianza.php?select=a";
			</script>
		<?php
	}

}elseif ($_SESION['usuario']['perfil'] != 'REGULAR'){
	?> 
			<script type="text/javascript">
				alert('Usted no puede realizar esta modificación');
				window.location="<?php echo URL ?>gestion/buscar-alianza.php?select=a";
			</script>
		<?php
}

#echo "N externo ni nada";

}

}
?>


<script type=text/javascript>

		function ejecutar(str)
		{
		//Creacion de una variable de tipo XMLHttpRequest - Es un objeto javascript para obtener informacion de la url sin actualizar la pagina
		var conexion;
		

		/*Añadiendo ajax para versiones antiguas de IE*/
		if (window.XMLHttpRequest) 
			//Es una version actual
		{
			conexion = new XMLHttpRequest();
		}else
		{
			//Es una version antigua
			conexion = new ActiveXObject("Microsoft.XMLHTTP");
		}

		conexion.onreadystatechange= function(){
			if (conexion.readyState == 4 && conexion.status == 200) 
			{
				document.getElementById("snies").innerHTML=conexion.responseText;
			}
		}

		//Realizamos una peticion de apertura con un metodo que puede ser GET o POST y Asincrona 
		//El valor por defecto es true es decir asincrona
		//Asiyn: permite varias conexiones sin choques entre el servidor y el navegador

		conexion.open("GET","../php/traer-institucion.php?id="+str,true);
		conexion.send();
		}
	</script>



<?php require "../view/new-alianza.view.php" ?>
