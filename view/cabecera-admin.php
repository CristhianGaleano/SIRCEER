<?php 	require_once '../admin/config.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SIRCEER | Gobernaci&oacute;n</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" href="<?php echo URL; ?>css/estilos.css">-->
	<link rel="icon" href="<?php echo URL; ?>imagenes/favicon.png">
	

	
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="<?php echo URL; ?>css/main.css">  
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/fontello.css">


<!--Google fonts-->
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:300,400,500&display=swap" rel="stylesheet">       
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="<?php echo URL; ?>datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/overhang.min.css" />

	<link rel="stylesheet" href="<?php echo URL; ?>libs/icomoon/style.css">

</head>
<body>
	
		<div class="container-fluid">

		<div class="row">
			<!--col-12: cuando su tamaño < 576 tome todo el ancho de la pantalla-->
			<div class="col-12  col-sm-auto barra-lateral">
				<div class="logo">
					<h2>SIRCEER</h2>
				</div>
				<!--flex-wrap: para que los enlaces se pongan uno de bajo del otro-->
				<nav class="menu d-flex d-sm-block justify-content-center flex-wrap">

					<?php if ($_SESSION['usuario']['perfil'] != 'ADMINISTRADOR') {?>
						
					<a href="#"><i class="icon-home"></i><span>Inicio</span></a>
					<a href="<?php echo URL ?>gestion/buscar-estudiantes.php"><i class="icon-doc-text"></i><span>Estudiantes</span></a>
					<a href="<?php echo URL ?>gestion/mod-matricula.php"><i class="icon-users"></i><span>Matriculas</span></a>
					<a href="<?php echo URL ?>gestion/buscar-programa.php"><i class="icon-cog-alt"></i><span>Programas</span></a>
					<a href="<?php echo URL ?>gestion/buscar-institucion.php"><i class="icon-cog-alt"></i><span>Institución EB</span></a>
					<a href="<?php echo URL ?>gestion/buscar-sede.php"><i class="icon-cog-alt"></i><span>Sedes</span></a>
					<a href="<?php echo URL ?>gestion/buscar-universidad.php"><i class="icon-cog-alt"></i><span>Institución ES</span></a>
					<a href="<?php echo URL ?>gestion/buscar-alianza.php"><i class="icon-cog-alt"></i><span>Alianza</span></a>
					<?php }else {?>
						<a href="#"><i class="icon-cog-alt"></i><span>Configuracion</span></a>
					<?php } ?>

					<a href="<?php echo URL ?>php/cerrar-sesion.php"><i class="icon-logout"></i><span>Salir</span></a>
				</nav>
			
			</div>

			<!--Columna padre para entradas y comentarios, col:576px-->
			<main class="col-md-10 mt-5">
				


	<?php #include_once '../view/menu-cabecera.view.php' ?>