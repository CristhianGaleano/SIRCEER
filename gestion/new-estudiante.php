<?php session_start(); ?>
<?php $titulo = " ESTUDIANTES" ?>
<?php require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

#var_dump($_SESSION);

#Load from DB to combox


$colegio = getColegio($cn);
$zona = getZona($cn); 
$epss = getAllSubject('eps',$cn);
$tipos_estrategia = getAllSubject('tipos_estrategias',$cn);




#$programas = getAllSubject("programa",$cn);
$errores = null;
// var_dump($errores);
$enviado = "";
if (isset($_POST['submit'])) {
	#var_dump($_POST);
	#print_r($_FILES);
	$parameters = array(
		"tipo_documento","documento","primer_nombre","primer_apellido","fecha_naci","edad","estrato","zona","eps","servicio_social","colegio","genero","prioritaria","situacion_academica","grado","ciudad","muni_naci","documento_attendant","first_name_attendant","last_name_attendant"
		);
	#echo "Entra a validar";
	$errores = validarErrores($parameters,$errores);

	if (empty($errores)) {
		#echo "No se encontraron errores de validacion";
		$enviado = true;
		#Obtenemos los valores de los campos en el formulario
		$documento = $_POST['documento'];
		$primer_nombre = strtoupper( $_POST['primer_nombre']);
		$segundo_nombre = strtoupper( $_POST['segundo_nombre']);
		$primer_apellido = strtoupper( $_POST['primer_apellido']);
		$segundo_apellido = strtoupper( $_POST['segundo_apellido']);
		$telefono = $_POST['telefonos'];
		$email = $_POST['email'];
		$fecha_naci = $_POST['fecha_naci'];
		$edad = $_POST['edad'];
		$dire_resi = $_POST['dire_resi'];
		$fecha_inicio = date("Y-m-d");#analizar si mejor se coloca un calendario
		$fecha_fin = "0000-00-00";
		$observacion = strtoupper( $_POST['observacion']);
		$promedio_notas = $_POST['promedio_notas'];
		$condonacion_credito = $_POST['condonacion_credito'];
		$sisben = $_POST['sisben'];
		$puntage_sisben = $_POST['puntage_sisben'];
		$num_acta_grado = $_POST['num_acta_grado'];
		$lugar_servicio_social = $_POST['lugar_servicio_social'];
		$tipo_documento = $_POST['tipo_documento'];
		$eps =   $_POST['eps'];
		$zona = $_POST['zona'];
		$estrato = $_POST['estrato'];
		$genero = $_POST['genero'];
		$situacion_academica = $_POST['situacion_academica'];
		$prioritaria = $_POST['prioritaria'];
		$grado = $_POST['grado'];
		$muni_resi = $_POST['ciudad'];
		$colegio = $_POST['colegio'];
		$tipo_estrategia = strtoupper( $_POST['tipo_estrategia']);
		// $motivo = validarRegistro('motivos','nombre','NO APLICA',$cn);

		#se agrega el acudiente en primera isntancia
		
		$documento_attendant = strtoupper( $_POST['documento_attendant']);
		$name_attendant = strtoupper( $_POST['first_name_attendant'] . " " . $_POST['last_name_attendant']);
		$telephone_attendant = strtoupper( $_POST['telephone_attendant']);
		$ocupation_attendant = strtoupper( $_POST['ocupation_attendant']);
		

		$muni_naci = $_POST['muni_naci'];
		$estado_civil = $_POST['estado_civil'];

		$servicio_social = $_POST['servicio_social'];
		
		#A traves de la funcion checkeamos el tamaño de la foto pero esta a la vez nos devuelve false, en caso he 
		#no haber ninguna foto
		#Colocamos un @ para que no nos vote un error de tipo notificacion
		$check = @getimagesize($_FILES['foto']['tmp_name']);
		#validamos que halla una imagen
		if ($check !== false) {
			#Carpeta destino (ya creada en el servidor)
			$destino = "../fotos/";
			#ruta completa destino-nombre foto (Ej: fotos/imagen1.jpg)
			$archivo_subido = $destino . $_FILES['foto']['name'];
			#movemos la foto al servidor
			move_uploaded_file($_FILES['foto']['tmp_name'],$archivo_subido);
		}else{
			$_FILES['foto']['name'] = 'pordefecto.png';
		}
		

if ($_SESSION['usuario']['perfil'] == 'REGULAR') {
	# code...
	$estado = saveStudent(
		$documento ,
		$primer_nombre ,
		$segundo_nombre ,
		$primer_apellido ,
		$segundo_apellido ,
		$telefono ,
		$email ,
		$fecha_naci ,
		$edad ,
		$dire_resi ,
		$fecha_inicio ,
		$observacion ,
		$promedio_notas ,
		$condonacion_credito ,
		$sisben ,
		$puntage_sisben ,
		$num_acta_grado ,
		$lugar_servicio_social ,
		$tipo_documento ,
		$eps ,
		$zona ,
		$estrato ,
		$genero ,
		$situacion_academica ,
		$prioritaria ,
		$grado ,
		$muni_resi ,
		$colegio ,
		$tipo_estrategia ,
		$_FILES['foto']['name'],
		$documento_attendant ,
		$name_attendant ,
		$telephone_attendant ,
		$ocupation_attendant ,
		$muni_naci ,
		$estado_civil ,
		$servicio_social ,
		$cn
	);


	if ($estado) {
		?>
            <script type="text/javascript"> 
            	alert('Datos ingresados correctamente.');
                window.location="<?php echo URL ?>gestion/new-estudiante.php?select=e"; 
            </script> 
            <?php //lo abro de nuevo
            $enviado = true;
	}else{
		?>
		<script type="text/javascript">
			alert('Ocurrio, por favor verifique sus datos...');
			//window.location="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e"; 
		</script>
		<?php
}
	}
	else{
		
		?>
		<script type="text/javascript">
			alert('Uste no puede ingresar un nuevo estudiante.');
			window.location="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e"; 
		</script>
		<?php

	}
}

}//End post
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
<?php require("../view/new-estudiante.view.php") ?>
