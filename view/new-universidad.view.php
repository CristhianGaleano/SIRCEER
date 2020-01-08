<?php require("cabecera-admin.php") ?>
<?php include_once 'template-parts/menu-ies.php' ?>			
<!--CONTENIDO-->
<div class="wrap-formulario-institucion">
	
<div class="wra_titulo">
	<h2>INGRESAR NUEVA INSTITUCIÓN DE EDUCACIÓN SUPERIOR</h2>
</div>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">	
	<table>
		<tr>
			<td><label for="nombre">Nombre</label></td>
			<td><input type="text" size="30" name="nombre" placeholder="Nombre*" required></td>
			<td><label for="telefono">Telefono</label></td>
			<td><input type="text" size="30" name="telefono" placeholder="Telefono"></td>
		</tr>
	
		<tr>
			<td><label for="email">E-mail</label></td>
			<td><input type="email" size="30" name="email" placeholder="E-mail*" ></td>
			<td><label for="direccion">Direccion</label></td>
			<td><input type="text" size="30" name="direccion" placeholder="Direccion"></td>
		</tr>
		
		<tr>
			<!--<td><label for="alianza">Alianza</label></td>
			<td>
				<select  name="alianza" id="alianza">
			<?php foreach ($alianzas as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
			</td>-->


			<td><label for="municipio">Municipio</label></td>
			<td>
				<select  style="width: 200px" required="" name="municipio" id="">
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
			<td><label for="tipo_universidad">Tipo de IES</label></td>
			<td>
				<select  name="tipo_universidad" id="tipo_universidad" required="">
					<option value="">Seleccione una opción</option>
			<?php foreach ($tipos_universidades as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
			</td>
	</tr>
		<tr>
			<td></td>
			<td><input type="reset" name=""></td>
			<td></td>
			<td><input type="submit" name="submit" class="btn btn-primary" value="Guardar"></td>
		</tr>
		
		
		
		<?php if (!empty($errores)): ?>
			<div class="input-redit alert error">
				<?php echo $errores;?>
			</div>	
		<?php elseif($enviado): ?>
			<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>
		<?php endif ?>
	</table>
		

	</form>
</div>

<!--END CONTENIDO-->				

<?php require("footer-menu.view.php") ?>	


<!--<?php #require("piedepagina-admin.php") ?>-->