<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->

<div class="wrap-formulario">
	<h1>Consulta de estudiantes en el SIMAT</h1>
	<div class="contenedor-busqueda">
		<form action="" method="POST" onSubmit="return validarForm(this)">
		<input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
		<input type="submit" value="Buscar" name="buscar">
		</form>
	</div>
	<?php if ($estado): ?>
		
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table width="100%">
		<tr>
			<td>
			<label for="tipoDocumento">Tipo de documento:</label>
			</td>
			<td>
				<select name="tipoDocumento" id="">
				<?php foreach ($tipoDocumento as $tipoDocumento): ?>
					<option value="<?php echo $tipoDocumento['id'] ?>"><?php echo $tipoDocumento['tipo'] ?></option>
				<?php endforeach ?>
				</select>
			<td>
		</tr>	
		<tr>
			<td>
			<label for="documento">Documento:</label>
			</td>
			<td>
			<input type="text" size="20" name="documento" placeholder="Documento" value="<?php echo $result['numero'] ?>" required="" >
			</td>
			<td><label for="primer_nombre">Primer nombre:</label></td>
			<td><input type="text" size="30" name="primer_nombre" value="<?php echo $result['primer_nombre'] ?>" placeholder="Primer nombre"  required="" ></td>
		</tr>

		<tr>
			<td>
				<label for="segundo_nombre">Segundo nombre:</label>
			</td>
			<td>
			<input type="text" size="30" name="segundo_nombre" value="<?php echo $result['segundo_nombre'] ?>" placeholder="Segundo nombre"  >
			</td>
			<td><label for="primer_apellido">Primer apellido:</label></td>
			<td><input type="text" size="30" name="primer_apellido" value="<?php echo $result['primer_apellido'] ?>" placeholder="Primer apellido"  required="" ></td>
		</tr>

		<tr>
			<td>
				<label for="segundo_apellido">Segundo apellido:</label>
			</td>
			<td>
			<input type="text" size="30" name="segundo_apellido" value="<?php echo $result['segundo_apellido'] ?>" placeholder="Segundo apellido"  >
			</td>
			<td><label for="direccion-resi">Direccion de residencia:</label></td>
			<td><input type="text" size="30" name="direccion-resi" placeholder="Direccion" value="<?php echo $result['direccion_residencia'] ?>" ></td>
		</tr>

		<tr>
			<td>
				<label for="barrio-resi">Barrio de residencia:</label>
			</td>
			<td>
			<input type="text" size="30" name="barrio-resi" placeholder="Barrio" value="<?php echo $result['barrio_residencia'] ?>" >
			</td>
			<td><label for="municipio-resi">Municipio de residencia:</label>		</td>
			<td><input type="text" size="30" name="lugar-resi" placeholder="Municipio de residencia" required="" ></td>
		</tr>
		
		<tr>
			<td>Estrato:</td>
			<td><input type="text" size="30" name="estrato" placeholder="Estrato" value="<?php echo $result['estrato'] ?>" ></td>
			<td><label for="desplazado">Desplazado:</label></td>
			<td><input type="text" size="30" name="desplazado" placeholder="Desplazado" value="<?php echo $result['desplazado'] ?>" ></td>
		</tr>

		<tr>
			<td><label for="afro">Afrodescendiente:</label></td>
			<td><input type="text" size="30" name="afro" placeholder="Afrodescendiente" value="<?php echo $result['afro'] ?>"></td>
		</tr>

		<tr>
			<td>
				<label for="fecha-naci">Fecha de nacimiento:</label>
			</td>
			<td>
			<input type="text" size="30" name="fecha-naci" placeholder="fecha de nacimiento" value="<?php echo $result['fecha_naci'] ?>" required="" >
			</td>
			<td><label for="edad">Edad:</label></td>
			<td><input type="text" min="10" max="30" name="edad" placeholder="Edad: 10-30" required="" ></td>
		</tr>

		<tr>
			<td>
				<label for="muni_naci">Municipio de nacimiento:</label>
			</td>
			<td>
			<input type="text" size="30" name="muni_naci" placeholder="Municipio de nacimiento" value="<?php echo $result['muni_naci'] ?>" required="" >
			</td>
			<td><label for="genero">Genero</label></td>
			<td><input type="text" size="30" name="genero" placeholder="Genero" value="<?php echo $result['genero'] ?>" required="" ></td>
		</tr>

		<tr>
			<td>
				<label for="telefono">Telefono:</label>
			</td>
			<td>
		<input type="text" size="30" name="telefono" placeholder="Telefono" value="">
			</td>
			<td><label for="email">Email:</label></td>
			<td><input type="email" size="30" name="email" placeholder="Email" value=""></td>
		</tr>

		<tr>
			<td>
				<label for="victima_conflicto">Victima del conflicto:</label>
			</td>
			<td>
				<input type="text" size="30" name="victima_conflicto" placeholder="Victima del conflicto" value="<?php echo $result['victima_conflicto'] ?>" >
			</td>
			<td><label for="situacion_periodo_anterior">Situacion periodo anterior:</label></td>
			<td><input type="text" size="30" name="situacion_periodo_anterior" placeholder="Situacion periodo anterior" value="<?php echo $result['situacion_periodo_anterior'] ?>" required="" ></td>
		</tr>

		<tr>
			<td>
				<label for="discapacidades">Discapacidades:</label>
			</td>
			<td>
				<input type="text" rows="2" cols="20" size="30" name="discapacidades" placeholder="E-mail" value="<?php echo $result['discapacidades'] ?>" required="" >	
			</td>
			<td>Institucion:</td>
			<td>
				<select  name="institucion" id="">
		<?php foreach ($instituciones as $result): ?>
				<option value="<?php echo $result['id'];?>"><?php echo $result['nombre'];?></option>
		<?php endforeach ?>
		</select>
			</td>
		</tr>

		<tr>
			<td>Detalle:</td>
			<td><textarea name="detalle" id="detalle" cols="30" rows="3" maxlength="110"></textarea></td>
		</tr>

	</table>	

		<?php //if (!empty($errores)): ?>
			<!--<div class="input-redit alert error">
				<?php #echo $errores;?>
			</div>-->	
		<?php #elseif($enviado): ?>
			<!--<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>-->
		<?php #endif ?>
		

		
		<input type="reset" name="">
		<input type="submit" name="submit" class="btn btn-primary" value="Guardar">

	</form>
	<?php else:?>
		<h1>Resultado de la busqueda</h1>
		<?php endif ?>
	
</div>

<!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>					
<!--<?php require("piedepagina-admin.php") ?>-->

<script type=text/javascript>
	function validarForm(formulario)
	{
		if (formulario.busqueda.value.length == 0) 
		{
			formulario.busqueda.focus();
			alert("Debes ingresar el documento");
			return false;
		}
		return true;
	}
</script>