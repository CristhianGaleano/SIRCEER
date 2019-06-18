<?php 


$host='localhost';
$namedb = 'sirceer';
$user = 'root';
$pass = '1088264375C';
$conexion = null;

try{
			$conexion = new PDO("mysql:host=$host;dbname=$namedb,$user,$pass");

		}catch(PDOException $e){
			echo "Error " . $e->getMessage();
		}
		


$sql='UPDATE estudiantes set estudiantes.edad=(SELECT year(now())-year(estudiantes.fecha_nacimiento))';
$ps=$conexion->prepare($sql);
$ps->execute();

?>

