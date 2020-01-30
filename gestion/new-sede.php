<?php session_start(); ?>
<?php 	
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

$instituciones = getAllSubject('instituciones',$cn);
$zonas = getAllSubject('zonas',$cn);
$modelos = getAllSubject('modelos',$cn);
$municipios = getAllSubject('municipios',$cn);
$alianzas = getAllSubject('alianzas',$cn);

$enviado = "";
if (isset($_POST['submit'])) {



		#Obtenemos los valores de los campos en el formulario
		$nombre = strtoupper( $_POST['nombre']);
		$codigo_dane = $_POST['codigo_dane'];
		$consecutivo = $_POST['consecutivo'];
		$zona = $_POST['zona'];
		$modelo = $_POST['modelo'];
		$institucion = $_POST['institucion'];
		$municipio = $_POST['municipio'];
		#$alianza = $_POST['alianza'];

		

$estado_sede = saveSede(
	$nombre,$codigo_dane,$consecutivo,$zona,$modelo,$institucion,$municipio,$cn
	);

	
	



} //Cierre if post
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



<?php require("../view/new-sede.view.php") ?>
