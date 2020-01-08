<?php 
	
		
		function getConexion($bd_config){
			try{
			$conexion = new PDO('mysql:host='.$bd_config['host'].';dbname='.$bd_config['nameBD'],$bd_config['userName'],$bd_config['pass']);

		}catch(PDOException $e){
			echo "Error " . $e->getMessage();
		}
			return $conexion;
		}

		/*function getConexionSIMAT($bd_config)
		{
			try{
			$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['nameBDSIMAT'],$bd_config['userNameSIMAT'],$bd_config['passSIMAT']);

		}catch(PDOException $e){
			echo "Error " . $e->getMessage();
		}
			return $conexion;	
		}
*/
		function closeConexion($con)
		{
			return $con = null;
		}
		

 ?>