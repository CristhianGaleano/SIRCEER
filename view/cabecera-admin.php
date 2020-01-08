<?php 	require_once '../admin/config.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SIRCEER | Gobernaci&oacute;n</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo URL; ?>css/estilos.css">
	<link rel="icon" href="<?php echo URL; ?>imagenes/favicon.png">
	<!--<script src="../sweetalert2.js"></script>-->

	
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="../main.css">  
      
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" href="<?php echo URL; ?>libs/icomoon/style.css">
	
	
	
	<!--<script src="<?php echo URL; ?>js/javascript.js"></script>-->
	<!--<script src="../js/jquery.js"></script>-->
	<!--<link href="https://fonts.googleapis.com/css?family=Revalia" rel="stylesheet">-->
</head>
<body>
	<!--https://www.facebook.com/fyupanquia-->
	<header>
		<!--
		<h1><a href="principal-gestion.php">SIRCEER</a></h1>
		<div class="user">
			<i class="fa fa-user-circle fa-2x" aria-hidden="true"></i><a href="<?php echo URL; ?>php/cerrar-sesion.php"><?php echo $_SESSION['usuario']['user']; ?></a>
		</div>
		-->
	</header>

	<?php include_once '../view/menu-cabecera.view.php' ?>