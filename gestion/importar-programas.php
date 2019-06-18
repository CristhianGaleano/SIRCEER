<?php session_start(); ?>
<?php require_once '../admin/config.php';
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

		$snies =  $objPHPEXCEL ->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		#echo "<br>$snies<br>";
		$nombre = utf8_encode( strtoupper( $objPHPEXCEL ->getActiveSheet()->getCell('B'.$i)->getCalculatedValue()));
		#echo "<br>$nombre<br>";
		$num_semestres =  $objPHPEXCEL ->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		#echo "<br>$num_semestres<br>";
		$valor_semestre =  $objPHPEXCEL ->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		#echo "<br>$valor_semestre<br>";


		$jornada =  utf8_encode($objPHPEXCEL ->getActiveSheet()->getCell('E'.$i)->getCalculatedValue());
		echo "<br>jornada Sin validar:$jornada<br>";
		$jornada =  validarRegistro('jornadas','nombre',$jornada,$cn);
		echo "<br>jornada validado:$jornada<br>";

		$nivel_acade =  $objPHPEXCEL ->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
		echo "<br>Nivel Sin validar:$nivel_acade<br>";
		$nivel_acade =  validarRegistro('nivel_academico','nombre',$nivel_acade,$cn);
		echo "<br> Nivel validado: $nivel_acade <br>";


		$ies =  $objPHPEXCEL ->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
		echo "<br>ies Sin validar:$ies<br>";
		



		
		

		#hacer la insercion
		$estado_programa	= saveProgram
(
	$snies,$nombre,$num_semestres,$valor_semestre,$nivel_acade,$ies,$jornada,$cn
);
					}//Fin for



								} //End file exist

		} //End substr
		

		} //End iss

?>

<?php require("../view/importar-programas.view.php") ?>