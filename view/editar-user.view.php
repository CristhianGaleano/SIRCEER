<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>srceer | Administracion</title>
	<link rel="stylesheet" href="../css/estilos-admin.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
</head>
<body>
	<header>
		
	</header>
	<section>

		<div class="formulario-editar-user">
			<h3>Esta modificando un usuario:</h3>
			<hr>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
				<input type="hidden"  name="id" value="<?php echo $id_user; ?>">
				<label>Nombre completo:</label><br>
				<input type="text" name="nombre" value="<?php echo $result['nombre_completo']; ?>" required=""><br>
				<label>Usuarios:</label><br>
				<input type="text" onkeyup="sugerencias(this.value)" name="usuario" value="<?php echo $result['username']; ?>" required="" ><br>
				<label>Contraseña:</label><br>
				<input type="text" name="password" value="<?php echo $result['password']; ?>" required=""><br>
				<label>E-mail:</label><br>
				<input type="email" name="email" value="<?php echo $result['email']; ?>"><br>
				<label>Perfil</label><br>
				<select name="perfil" id="perfil">
					<option value="1"<?php if ($result['id_perfil'] == 1){echo " selected";}?>>Super usuario</option>
					<option value="2"<?php if ($result['id_perfil'] == 2){echo " selected";}?>>Usuario estandar</option>
					<option value="3"<?php if ($result['id_perfil'] == 3){ echo " selected";}?>>Usuario externo</option>
				</select>
	
				<input type="submit" name="enviar" value="Crear usuario">		
			</form>


			
		</div>

		
	</section>
		<!--<footer>
			
	</footer>-->
</body>
</html>