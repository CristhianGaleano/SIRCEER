<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") #Aun falta recibir el parametro?>

<!---Editar-->
<div class="wrap-formulario-new-estudiante">
<div class="wra_titulo">
	
	<div class="agregar">
			<a href="javascript:openVentana();"><h1>FACTURAS ESTUDIANTES</h1></a>
		</div>
	<div style="float: right;" class="total_facturas">
		<?php echo "<STRONG>TOTAL CARTERA: $</STRONG> " . total_facturas($cn); ?>
	</div>
</div>
	

<!--VENTANA MODAL-->
<!--
		<div class="ventana">
			<div class="formulario">
				<div class="cerrar">
					<a href="javascript:cerrar();">Cerrar</a>
				</div>
				<h3>Datos del nuevo usuario:</h3>
				<hr>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
				<!-- <input type="text" name="nombre" placeholder="Nombre:" required="Campo requerido"><br> 
					<div id="miDiv"></div>
					<input type="text" onkeyup="sugerencias(this.value)" name="usuario" placeholder="Usuario:" required="" ><br>
					<input type="password" name="password" placeholder="Contraseña:" required=""><br>
					<!-- <input type="email" name="email" placeholder="Email" required=""><br> 
					<select name="perfil" id="perfil">
						<option value="1">Administrador</option>
						<option value="2">Usuario regular</option>
					</select>
					<select name="estado" id="">
						<option value="1">Activo</option>
						<option value="2">Inactivo</option>
					</select>
					<input type="submit" name="enviar" value="Crear usuario">		
				</form>
		
-->

	<form name="formulario_new_estu" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table width="100%">


		<tr>
				<td> <STRONG> NUMERO</STRONG></td>
				<td> <STRONG> DOCUMENTO</STRONG></td>
				<td> <STRONG> ESTUDIANTE</STRONG></td>
				<!--<td> <STRONG> PROGRAMA</STRONG></td>-->
				<!--<td> <STRONG> SNIES</STRONG></td>-->
				<td> <STRONG> SEMESTRE</STRONG></td>
				<td> <STRONG> VALOR</STRONG></td>
				<td> <STRONG> AÑO</STRONG></td>
				<td> <STRONG> COD. UNIV</STRONG></td>
				<!--<td> <STRONG> UNIVERSIDAD</STRONG></td>-->
				<!--<td> <STRONG> FECHA</STRONG></td>-->
				<td> <STRONG> VER</STRONG></td>
				<td> <STRONG> PAGAR</STRONG></td>
			</tr>

			<tr></tr>

		<?php foreach ($fac_estu as $value) {?>
			<tr>
				<td> <?php echo $value['numero'] ?> </td>
				<td><?php echo $value['documento'] ?></td>
				<td><?php echo $value['nombre_estudiante'] ?></td>
				<!--<td><?php #echo $value['programa'] ?></td>-->
				<!--<td><?php #echo $value['codigo_snies'] ?></td>-->
				<td><?php echo $value['semestre'] ?></td>
				<td><?php echo $value['valor'] ?></td>
				<td><?php echo $value['anio'] ?></td>
				<td><?php echo $value['codigo_universidad'] ?></td>
				<!--<td><?php #echo $value['universidad'] ?></td>-->
				<!--<td><?php echo $value['fecha_sistema'] ?></td>-->
				<td>
					<a href="<?php echo URL ?>gestion/ver-fac-estu.php?id=<?php echo urlencode($value['id'])?>">Ver</a>
				</td>
				<td> <input type="checkbox" name="pagar[]" value="<?php echo $value['numero']?>"></td>
				
			</tr>
		<?php } ?>

	</table>

		<input type="submit" name="cartera" value="Pagar">

		<?php //if (!empty($errores)): ?>
			<!--<div class="input-redit alert error">
				<?php #echo $errores;?>
			</div>-->	
		<?php #elseif($enviado): ?>
			<!--<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>-->
		<?php #endif ?>	

	</form>
	
</div>



<div>
<?php require 'paginacion.view.php' ?>
</div>

<?php require 'piedepagina-admin.php' ?>

<script type="text/javascript">



		function openVentana(){
			$(".ventana").slideDown("slow");
		}

		function cerrar(){
			$(".ventana").slideUp("fast");
		}
		
	</script>