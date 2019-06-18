<?php session_start(); ?>
<?php 
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
require_once '../libs/PHPExcel1.8.0/Classes/PHPExcel/IOFactory.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
#-------------PROCESANDO HOJA----------------------------
$estado = false;
#var_dump($_POST);
if (isset($_POST['Importar'])) {
	if ( substr($_FILES['myfile']['name'], -4) == "xlsx" ) {

$nombreArchivo = $_FILES['myfile']['name'];

$destino = '../tmp_excel/back_'.$nombreArchivo;
#echo "<br> Destino: $destino <br> ";

#var_dump($_FILES);

#echo "Copying...";
if (copy($_FILES['myfile']['tmp_name'], $destino)) {
	#echo "Archivo cargado con exito!";
}else
{
	echo "Error al cargar el archivo";
}

if (file_exists("../tmp_excel/back_".$nombreArchivo)) {

#Cambiamos parametros de PHP
//set_time_limit('max_execution_time','1200'); //5 minutos ó  set_time_limit 



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




#echo $numRows;


	for ($i=2; $i <= $numRows; $i++) { 

		//Extrae datos por fila

		$nombre = strtoupper( utf8_decode($objPHPEXCEL ->getActiveSheet()->getCell('A'.$i)->getCalculatedValue()) );
		#echo "<br>$snies<br>";
		$telefono = $objPHPEXCEL ->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		#echo "<br>$nombre<br>";
		$email = $objPHPEXCEL ->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		#echo "<br>$num_semestres<br>";
		$direccion = strtoupper( utf8_decode($objPHPEXCEL ->getActiveSheet()->getCell('D'.$i)->getCalculatedValue()) );
		#echo "<br>$valor_semestre<br>";

		
		#Consultar para cada tabla relacionada, el ID del valor 'NO APLICA' y realizar la inserción con estos valores
		$id_municipio = getAllSubjectByValue('municipios','NO APLICA','nombre',$cn);
		#var_dump($id_nivel);
		$id_alianza = getAllSubjectByValue('alianzas','NO APLICA','nombre',$cn);
		$id_tipo_universidad = getAllSubjectByValue('tipos_universidades','NO APLICA','nombre',$cn);

		#hacer la insercion
		$estado_universidad	= saveUniversidad
(
	$nombre,$telefono,$email,$direccion,$id_municipio['id'],$id_alianza['id'],$id_tipo_universidad['id'],$cn
);

if ($estado_universidad) {
	?>
		<script type="text/javascript">
			window.location="<?php echo URL ?>gestion/buscar-universidad.php?select=u";
		</script>
	<?php
}







					}//Fin for

#header("Location:".URL."gestion/importar-estudiantes.php?select=e");
#https://www.youtube.com/watch?v=4Sw24E5Hi5M

								} //End file exist

		} //End substr
		

		} //End iss

?>

<?php require("../view/importar-universidades.view.php") ?>