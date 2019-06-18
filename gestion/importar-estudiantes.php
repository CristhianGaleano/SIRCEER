<?php session_start(); ?>
<?php require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
require_once '../libs/PHPExcel1.8.0/Classes/PHPExcel/IOFactory.php';

validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$sedes = getAllSubject('sedes',$cn);
$estrategias = getAllSubject('tipos_estrategias',$cn);
$programas = getAllSubject('programas',$cn);
#-------------PROCESANDO HOJA----------------------------
#$estado = false;
#var_dump($_POST);
if (isset($_POST['Importar'])) {

$year = $_POST['anio'];#Esta debera ser el año del semestre en que entra
$semestre = $_POST['semestre'];
$periodo = $_POST['periodo'];
$sede = $_POST['sede'];
$categoria = $_POST['estrategia'];
$programa = $_POST['programa'];
$fecha_ini = $_POST['fecha_ini'];

	if ( substr($_FILES['myfile']['name'], -4) == "xlsx" ) {
//Obtener la fecha del archivo
$nombreArchivo = $_FILES['myfile']['name'];

$destino = '../tmp_excel/back_'.$nombreArchivo;
#echo "<br> Destino: $destino <br> ";

#var_dump($_FILES);

echo "Copying...";
if (copy($_FILES['myfile']['tmp_name'], $destino)) {
	#echo "Archivo cargado con exito!";
}else
{
	echo "Error al cargar el archivo";
}

if (file_exists("../tmp_excel/back_".$nombreArchivo)) {

#Cambiamos parametros de PHP
set_time_limit(3600); //5 minutos ó  set_time_limit 
//init_set('memory_limit','512');



/**
VERSION PHPEXCEL: 1.8.0 2014
REQUESITOS: EXTENSION ZIP INSTALADA
LINEA: PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
SE COMPRUEBA QUE SOLO FUNCIONA ESTE ENTORNO CON PHPEXCEL VERSION 2017, EL QUE ESTA HABILITADO EN ESTE MOMENTO
PHP 7.1
*/
#echo "Exists";
PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
#indicamos que vamos a cargar el archivo
#llama a la funcion  PHPEXCEL_IOFactory
#y luego a la funcion load
$objPHPEXCEL = PHPEXCEL_IOFactory::load('../tmp_excel/back_'.$nombreArchivo);
#var_dump($objPHPEXCEL);
#Establecemos en que hoja vamos a leer por medio del objeto
$objPHPEXCEL->setActiveSheetIndex(0);
#obtenemos el numero de filas en la hoja activa
$numRows = $objPHPEXCEL->setActiveSheetIndex(0)->getHighestRow();
$registrosDone = 0;




#echo $numRows;

$no_permitidas = array('á','é','í','ó','ú','Á','É','Í','Ó','Ú');
$permitidas = array('a','e','i','o','u','A','E','I','O','U');


	

	for ($i=2; $i <= $numRows; $i++) { 

		#echo "<br>***********ESTUDIANTE************<br>";
		#Atributo
		$doc = $objPHPEXCEL ->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		echo "<br> Documento: $doc <br>";

		#Valores a 
		$tipo_doc = str_replace($no_permitidas, $permitidas,  $objPHPEXCEL ->getActiveSheet()->getCell('B'.$i)->getCalculatedValue() );
		echo "<br> Tipo de document formateado: $tipo_doc <br>";
		

		#atributo
		$ape_uno = utf8_decode( $objPHPEXCEL ->getActiveSheet()->getCell('C'.$i)->getCalculatedValue());
		echo "<br> Primer apellido: $ape_uno <br>";
		#atributo
		$ape_dos = utf8_decode( $objPHPEXCEL ->getActiveSheet()->getCell('D'.$i)->getCalculatedValue());
		echo "<br> apellido dos: $ape_dos <br>";
		#atributo
		$nombre_uno = utf8_decode( $objPHPEXCEL ->getActiveSheet()->getCell('E'.$i)->getCalculatedValue());
		echo "<br> Primer nombre: $nombre_uno <br>";
		#atributo
		$nombre_dos = utf8_decode( $objPHPEXCEL ->getActiveSheet()->getCell('F'.$i)->getCalculatedValue());
		echo "<br> Nombre dos: $nombre_dos <br>";

		#Relacion:
		$genero = $objPHPEXCEL ->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();

		// $genero = validarRegistro('generos','nombre',$genero,$cn);
		// #$genero = validarYregistrar('generos','nombre','descripcion',$genero,$cn);
		echo "<br> Genero: $genero <br>";

		#$fecha_naci = "1989-01-17";
		$fecha_naci = $objPHPEXCEL ->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
		echo "<br> Fecha de nacimieno: $fecha_naci <br>";


		#Relacion: soltero/casado/union_libre
		$estado_civil = $objPHPEXCEL ->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
		echo "<br> estado_civil: $estado_civil <br>";

		#atributo
		$eps_estudiante = $objPHPEXCEL ->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
		echo "Sin formatear: $eps_estudiante";
		$eps_estudiante = validarRegistro('eps','nombre',$eps_estudiante,$cn);
		#$eps_estudiante = validarYregistrar('eps','nombre','descripcion',$eps_estudiante,$cn);
		echo "<br> EPS ID: $eps_estudiante <br>";		

		#Relacion: los municipios de reisaralda
		$muni_naci = strtoupper( str_replace($no_permitidas, $permitidas, $objPHPEXCEL ->getActiveSheet()->getCell('K'.$i)->getCalculatedValue()));
		echo "<br> MUNICIPIO SIN FORMATEAR: $muni_naci <br>";
		// $muni_naci =  validarRegistro('municipios','nombre',$muni_naci,$cn);
		echo "<br>muni_naci: $muni_naci";

// Municipio de residencia
		$muni_resi = $objPHPEXCEL ->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
		// $muni_resi =  validarRegistro('municipios','nombre',$muni_resi,$cn);
		echo "<br>muni_resi: $muni_resi";

		$direccion = strtoupper( str_replace($no_permitidas, $permitidas, $objPHPEXCEL ->getActiveSheet()->getCell('M'.$i)->getCalculatedValue()));

		$telefonos = $objPHPEXCEL ->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
		$telefonos .= " - " .$objPHPEXCEL ->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
		echo "<br>Telefono: $telefonos";

		$email = $objPHPEXCEL ->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
		echo "<br>Email: $email";

		$zona_estudiante = $objPHPEXCEL ->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
		$zona_estudiante =  validarRegistro('zonas','nombre',$zona_estudiante,$cn);
		echo "<br>ID zona_estudiante: $zona_estudiante";

		#Relacion:
		$estrato = $objPHPEXCEL ->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
		// $estrato = validarRegistro('estrato','nombre',$estrato,$cn);
		#$estrato = validarYregistrar('estrato','nombre','descripcion',$estrato,$cn);
		$estrato = ( empty($estrato)) ? 1 : $estrato ;
		echo "<br> Estrato: $estrato <br>";

		#Relacion: si/no
		$sisben = $objPHPEXCEL ->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();
		echo "<br>sisben: $sisben<br>";

		#?
		$puntage_sisben = $objPHPEXCEL ->getActiveSheet()->getCell('T'.$i)->getCalculatedValue();
		echo "<br>puntage_sisben: $puntage_sisben<br>";


		#?
		$lugar_servicio_social = $objPHPEXCEL ->getActiveSheet()->getCell('U'.$i)->getCalculatedValue();
		echo "<br>lugar_servicio_social: $lugar_servicio_social <br>";		

		$servicio_social = str_replace($no_permitidas, $permitidas, $objPHPEXCEL ->getActiveSheet()->getCell('V'.$i)->getCalculatedValue());
		echo "servicio_social: $servicio_social";


		$prioritaria = str_replace($no_permitidas, $permitidas, $objPHPEXCEL ->getActiveSheet()->getCell('W'.$i)->getCalculatedValue());
		// $prioritaria =  validarRegistro('situaciones_sociales','nombre',$prioritaria,$cn);
		echo "Prioritaria: $prioritaria";

		#Relacion: situacion_academica
		// $estado = $objPHPEXCEL ->getActiveSheet()->getCell('X'.$i)->getCalculatedValue();
		// $estado = validarRegistro('situaciones_academicas','nombre',$estado,$cn);
		// #$estado = validarYregistrar('estado','nombre','descripcion',$estado,$cn);
		// $estado = (empty( $estado) || $estado=='') ? 1 : $estado;
		$estado = "ACTIVO";
		echo "<br> Estado_academico: $estado <br>";


		#Relacion:
		$codigo_grado = $objPHPEXCEL ->getActiveSheet()->getCell('Y'.$i)->getCalculatedValue();
		echo "<br>codigo_grado: $codigo_grado</br>";
		// $codigo_grado = validarRegistro('grados','nombre',$codigo_grado,$cn);
		echo "<b> grado: $codigo_grado <br>";

	
		$grado_fecha = $objPHPEXCEL ->getActiveSheet()->getCell('Z'.$i)->getCalculatedValue();
		echo "grado_fecha: $grado_fecha";

		#Relacion: ?
		$num_acta_grado = $objPHPEXCEL ->getActiveSheet()->getCell('AA'.$i)->getCalculatedValue();
		echo "Acta de grado: $num_acta_grado";

		#Relacion: ?
		$promedio_notas = $objPHPEXCEL ->getActiveSheet()->getCell('AB'.$i)->getCalculatedValue();
		echo "<br>Promedio: $promedio_notas <br>";

		#?
		$condonacion_credito = $objPHPEXCEL ->getActiveSheet()->getCell('AC'.$i)->getCalculatedValue();

		echo "<br> ATTENDANT: --------------------------------------------------------<br>";

		$docu_attendent = $objPHPEXCEL->getActiveSheet()->getCell('AD'.$i)->getCalculatedValue();
		$name_attendant = strtoupper( str_replace($no_permitidas, $permitidas, $objPHPEXCEL ->getActiveSheet()->getCell('AE'.$i)->getCalculatedValue()));
		$telephone_attendant = $objPHPEXCEL ->getActiveSheet()->getCell('AF'.$i)->getCalculatedValue();
		$ocupation_attendant = strtoupper( str_replace($no_permitidas, $permitidas, $objPHPEXCEL ->getActiveSheet()->getCell('AG'.$i)->getCalculatedValue()));
			
		
		$observacion = strtoupper( $objPHPEXCEL ->getActiveSheet()->getCell('AK'.$i)->getCalculatedValue());

		$foto = 'pordefecto.png';		


		// $categoria =  $objPHPEXCEL ->getActiveSheet()->getCell('BC'.$i)->getCalculatedValue();
		// if($categoria  == 'NO'){

		// 	$categoria =  $objPHPEXCEL ->getActiveSheet()->getCell('BD'.$i)->getCalculatedValue();
		// 	if ($categoria == 'NO') {
				
		// 		$categoria =  $objPHPEXCEL ->getActiveSheet()->getCell('BE'.$i)->getCalculatedValue();
		// 		if ($categoria == 'SI') {
		// 			$categoria = 4;
		// 		}else{
		// 			$categoria = 1;
		// 		}

		// 	}else{
		// 		$categoria = 3;
		// 	}

		// }else{
		// 	$categoria = 2;
		// }

 $edad = calculador_edad($fecha_naci);

 
$existe_estudiante = buscar_estudiante($doc,$cn);

if (!$existe_estudiante) {
	//Si el estudainte no existe	
// echo "Motrando dos";

// 	echo '<br>documento', $doc . "<br>";
// 	echo '<br>primer_nombre', $nombre_uno . "<br>";
// 	echo '<br>segundo_nombre', $nombre_dos . "<br>";
// 	echo '<br>primer_apellido', $ape_uno . "<br>";
// 	echo '<br>segundo_apellido', $ape_dos . "<br>";
// 	echo '<br>telefono_contacto', $telefonos . "<br>";
// 	echo '<br>email', $email . "<br>";
// 	echo '<br>fecha_nacimiento', $fecha_naci . "<br>";
// 	$grado_fecha = '2019-02-02';
// 	echo "<br>grado_fecha: $grado_fecha <br>";
// 	echo '<br>edad', $edad  . "<br>";
// 	echo '<br>direccion_residencia', $direccion . "<br>";
// 	echo '<br>observacion', $observacion . "<br>";
// 	echo '<br>foto', $foto . "<br>";
// 	echo '<br>media_notas', $promedio_notas . "<br>";
// 	echo '<br>condonacion_credito', $condonacion_credito . "<br>";
// 	echo '<br>siben', $sisben . "<br>";
// 	echo '<br>puntaje_sisben', $puntage_sisben . "<br>";
// 	echo '<br>num_acta_grado', $num_acta_grado . "<br>";
// 	echo '<br>estado_civil', $estado_civil . "<br>";
// 	echo '<br>lugar_servicio_social', $lugar_servicio_social . "<br>";
// 	echo '<br>tipo_documento_id', $tipo_doc . "<br>";
// 	echo '<br>eps_id', $eps_estudiante . "<br>";
// 	echo '<br>zona_id', $zona_estudiante . "<br>";
// 	echo '<br>estrato_id', $estrato . "<br>";
// 	echo '<br>genero:', $genero . "<br>";
// 	echo '<br>situacion_academica_id', $estado . "<br>";
// 	echo '<br>prioritaria', $prioritaria . "<br>";
// 	echo '<br>grado:', $codigo_grado . "<br>";
// 	echo '<br>servicio_social',$servicio_social . "<br>"; 
// 	echo '<br>municipio_id',$muni_resi . "<br>";
// 	echo '<br>sede_id',$sede . "<br>"; 
// 	echo '<br>tipo_estrategia_id',$categoria . "<br>";
// 	echo "<br>fecha inicio: $fecha_ini<br>";
// 	echo '<br>docu_attendent',$docu_attendent . "<br>";
// 	echo '<br>name_attendant',$name_attendant . "<br>";
// 	echo '<br>telephone_attendant',$telephone_attendant . "<br>";
// 	echo '<br>ocupation_attendant',$ocupation_attendant . "<br>";
// 	echo '<br>muni_naci_id',$muni_naci . "<br>";
// 	echo '<br>estado_civil',$estado_civil . "<br>"; 

	$estado=saveStudent
(
		$doc ,
		$nombre_uno ,
		$nombre_dos ,
		$ape_uno ,
		$ape_dos ,
		$telefonos ,
		$email ,
		$fecha_naci ,
		$edad ,
		$direccion ,
		$fecha_ini ,
		$observacion ,
		$promedio_notas ,
		$condonacion_credito ,
		$sisben ,
		$puntage_sisben ,
		$num_acta_grado ,
		$lugar_servicio_social ,
		$tipo_doc ,
		$eps_estudiante ,
		$zona_estudiante ,
		$estrato ,
		$genero ,
		$estado ,
		$prioritaria ,
		$codigo_grado ,
		$muni_resi ,
		$sede ,
		$categoria ,
		$foto,
		$docu_attendent ,
		$name_attendant ,
		$telephone_attendant ,
		$ocupation_attendant ,
		$muni_naci ,
		$estado_civil ,
		$servicio_social,
		$cn
);
			// echo "<br>Registrando Matricula<br>";
			$idEstudiante = $cn->lastInsertId();
		//Si no registra al estudiante no registra matricula
		$succes_matricula = saveMatricula($year,$semestre,$periodo,$idEstudiante,$programa,$cn);
		saveFacturaEstudiante($idEstudiante,$programa,$cn->lastInsertId(),$cn);
		#echo "succes_matricula: $succes_matricula";
		#var_dump($succes_matricula);
			$registrosDone++;
		}//Fin si registro estu...

		// if ($resultE == false) {
		// 	echo "<br>Ocurrio un error registrando el estudiante <br>";
		// 	echo "<br><br>";
		// }
		
}//Fin validacion existencia estudiante

		}//Fin for






#}

					#}//Fin for
		#closeConexion($cn);
					?>
		<script type="text/javascript">
			alert("Se validaron: <?php echo $registrosDone ?> de <?php echo $numRows ?>");
			window.location="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e";
		</script>
					<?php



								} //End file exist

		} //End substr
		
		 //End iss

?>

<?php require "../view/importar-estudiantes.view.php" ?>