<?php require 'cabecera-admin.php' ?>
<?php include_once "template-parts/menu-institucion.php" ?>
<div class="formulario-editar-user">
	<div class="wra_titulo">
		<h1>Editar institución</h1>
	</div>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

		<table>

		  <tr>
		  	<td>Id</td>
			<td><input type="text" readonly="readonly" size="20" name="id" value="<?php echo $result['id']; ?>"></td>
			<td>Nombre</td>
			<td><input type="text" size="30" required name="nombre" value="<?php echo $result['nombre']; ?>"  placeholder="Nombre" required=""></td>
		  </tr>

		  <tr>
		  	<td>Telefono</td>
			<td><input type="text" size="30" name="telefono" value="<?php echo $result['telefono']; ?>"  placeholder="Telefono" ></td>
			<td><label for="municipio"></label></td>
			<td>
				<select name="municipio" id="" required="">
				<!-- <option value="">seleccione una opción</option> -->
				<option value="APIA" <?php if ($result['municipio'] == "APIA" ): ?>
					<?php echo "selected" ?>
				<?php endif ?>>APIA</option>
	<option value="BALBOA" <?php if ($result['municipio'] == "BALBOA" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>BALBOA</option>
	<option value="BELEN DE UMBRIA" <?php if ($result['municipio'] == "UMBRIA" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>BELEN</option>
	<option value="DOSQUEBRADAS" <?php if ($result['municipio'] == "DOSQUEBRADAS" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>DOSQUEBRADAS</option>
	<option value="GUATICA" <?php if ($result['municipio'] == "GUATICA" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>GUATICA</option>
	<option value="LA CELIA" <?php if ($result['municipio'] == "CELIA" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>LA CELIA</option>
	<option value="LA VIRGINIA" <?php if ($result['municipio'] == "VIRGINIA" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>LA VIRGINIA</option>
	<option value="MARSELLA" <?php if ($result['municipio'] == "MARSELLA" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>MARSELLA</option>
	<option value="MISTRATO" <?php if ($result['municipio'] == "MISTRATO" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>MISTRATO</option>
	<option value="PEREIRA" <?php if ($result['municipio'] == "PEREIRA" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>PEREIRA</option>
	<option value="PUEBLO RICO" <?php if ($result['municipio'] == "RICO" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>PUEBLO RICO</option>
	<option value="QUINCHIA" <?php if ($result['municipio'] == "QUINCHIA" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>QUINCHIA</option>
	<option value="SANTA ROSA DE CABAL" <?php if ($result['municipio'] == "CABAL" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>SANTA ROSA DE CABAL</option>
	<option value="SANTUARIO" <?php if ($result['municipio'] == "SANTUARIO" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>SANTUARIO</option>
	<option value="NUCLEO 21" <?php if ($result['municipio'] == "21" ): ?>
		<?php echo "selected" ?>
	<?php endif ?>>NUCLEO 21</option>
	</select>
			</td>
		  </tr>

		  <tr>
		  	<td><label for="calendario">Calendario</label></td>
		  	<td>
		  		<select name="calendario" id="" required="">
		  			<option value="A" <?php if ($result['calendario'] == 'A'): ?>
		  				<?php echo ' selected' ?>
		  			<?php endif ?>>A</option>
		  			<option value="B" <?php if ($result['calendario'] == 'B'): ?>
		  				<?php echo ' selected' ?>
		  			<?php endif ?>>B</option>
		  		</select>
		  	</td>
		  	<td><label for="dane">DANE</label></td>
		  	<td><input type="text" name="dane" value="<?php echo $result['DANE'] ?>"></td>
		  </tr>

		  <tr>
				<td>Sector</td>
				<td><select  name="sector" required="" id="sector">
				<?php foreach ($sectores as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['sector_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
		</select>		
		<td>Zona</td>
				<td><select  name="zona" required="" id="zona">
				<?php foreach ($zonas as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['zona_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
		</select>		
		</td>
			</tr>

		  <tr>
		  	<td></td>
		  	<td></td>
		  	<td></td>
		  </tr>
		  <td>
			<td></td>
			<td></td>
			<td><input type="submit" name="submit" class="btn btn-primary" value="Guardar" size="30"></td>
		  </tr>

		</table>
		
		
		<?php if (!empty($errores)): ?>
			<div class="input-redit alert error">
				<?php echo $errores;?>
			</div>	
		<?php elseif($enviado): ?>
			<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>
		<?php endif ?>
		

		
		
		

	</form>
</div>
<?php #require 'piedepagina-admin.php' ?>


