<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="icon" href="../iconos/favicon.png">
	<link rel="stylesheet" href="css/estilos.loguin.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
</head>
<body>
	<div class="contenedor">
		<div class="contenedor_img_loguin">
			<img class="img_loguin" src="imagenes/sumaleUno.jpg"/>
		</div>
		<div class="contenedor-login">
				
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="frm-login">
						<div class="envuelve-input">
						<input type="text" name="usuario" placeholder="Nombre de usuario">
						<i class="fa fa-user-o" aria-hidden="true"></i>
						</div>

						<br>
						<div class="envuelve-input">
						<input type="password" name="pass" placeholder="Contraseña">
						<i class="fa fa-unlock-alt" aria-hidden="true"></i>
						</div>
						<br>
						<input type="submit" class="btn" value="Iniciar Session">
				</form>
			</div>
		
	
</body>
</html>