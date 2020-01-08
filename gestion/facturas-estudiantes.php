<?php session_start(); ?>
<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>
<?php require '../admin/config.php' ?>
<?php validateSession(); ?>
<?php

$pagina = isset($_GET['p']) ? (int)$_GET['p'] : 1;
$cn = getConexion($bd_config);
comprobarConexion($cn);

$fac_estu = consultarFactEstu($cn);

#nombre de la BD
$name_bd = "factura_estudiante";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	#var_dump($_POST);

	$facturas = $_POST['pagar'];
	#echo "facturas: <br>";
	#var_dump($facturas);
	
	//Recibe n facturas
	$num = abonar_a_cartera($facturas,$cn);
	#var_dump($num);
	if ($num>0) {
		?>
            <script type="text/javascript"> 
            	alert('Los pagos han sido realizados.');
                window.location="<?php echo URL ?>gestion/facturas-estudiantes.php?select=e"; 
            </script> 
            <?php //lo abro de nuevo
	}else{
		?>
		<script type="text/javascript">
			alert('Ocurrio un error.');
			window.location="<?php echo URL ?>gestion/facturas-estudiantes.php?select=e"; 
		</script>
		<?php
	}
	
	

}

?>






<?php require '../view/facturas-estudiantes.view.php' ?>