<?php require("cabecera-admin.php") ?>
<?php include_once "template-parts/menu-institucion.php" ?>			
<!--CONTENIDO-->

<div class="wrap-formulario-new-estudiante">

	<div class="wra_titulo">
		<h1>INGRESAR NUEVA INSTITUCION</h1>
	</div>
		
	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table width="100%">
		<tr>
			<td>
			<label for="nombre">Nombre:</label>
			</td>
			<td><input type="text" size="20" name="nombre" placeholder="Nombre" required></td>
			<td><label for="telefono">Telefono:</label></td>
			<td><input type="text" size="12" name="telefono" placeholder="Telefono de contacto"></td>
		</tr>

		<tr>
			<td><label for="calendario">Calendario:</label></td>
			<td>
				<select name="calendario" id="" required>
					<option value="">Seleccione una opción</option>
					<option value="A">A</option>
					<option value="B">B</option>
				</select>
			</td>
			<td><label for="dane">DANE</label></td>
			<td><input type="text" name="dane" placeholder="DANE"></td>
		</tr>	

		<tr>
			<td><label for="sector">Sector</label></td>
			<td>
				<select name="sector" id="" required="">
					<option value="">Seleccione una opción</option>
				<?php foreach ($sectores as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			<td><label for="municipio">Municipio</label></td>
			<td>
				<select name="municipio" id="" required="">
					<option value="">Seleccione una opción</option>
				<option value="APIA">APIA</option>
	<option value="BALBOA">BALBOA</option>
	<option value="BELEN DE UMBRIA">BELEN</option>
	<option value="DOSQUEBRADAS">DOSQUEBRADAS</option>
	<option value="GUATICA">GUATICA</option>
	<option value="LA CELIA">LA CELIA</option>
	<option value="LA VIRGINIA">LA VIRGINIA</option>
	<option value="MARSELLA">MARSELLA</option>
	<option value="MISTRATO">MISTRATO</option>
	<option value="PEREIRA">PEREIRA</option>
	<option value="PUEBLO RICO">PUEBLO RICO</option>
	<option value="QUINCHIA">QUINCHIA</option>
	<option value="SANTA ROSA DE CABAL">SANTA ROSA DE CABAL</option>
	<option value="SANTUARIO">SANTUARIO</option>
	<option value="NUCLEO 21">NUCLEO 21</option>
					
				</select>
			</td>
			</td>
		</tr>

		<tr>
			<td><label for="zona">Zona</label></td>
			<td>
				<select name="zona" id="" required="">
					<option value="">Seleccione una opción</option>
				<?php foreach ($zonas as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>
		

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="reset" name=""></td>
			<td><input type="submit" name="submit" class="btn btn-primary" value="Guardar"></td>
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
		


	</form>
	
</div>

<!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>					
<?php #require("piedepagina-admin.php") ?>

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