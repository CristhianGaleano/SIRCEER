<?php session_start(); ?>

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





$errores = null;
// var_dump($errores);
$enviado = "";
if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

header('Content-Type: application/json');
$response = array("estado" => "false");

	// var_dump($_POST);
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
		$promedio_notas = 0.0;
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
			$response = array('estado' => "true" );
			return print( json_encode( $response ) );
		}

		return print( json_encode( $response ) );

		}//end errores


}//End post


?>


<?php require("../view/new-estudiante.view.php") ?>
