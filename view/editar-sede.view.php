<?php require 'cabecera-admin.php' ?>
<?php include_once 'template-parts/menu-sedes.php' ?>
<div class="formulario-editar-user">
	<div class="wra_titulo">
		<h2>Editar sede</h2>
	</div>
	<hr>
	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table width="100%">

		<tr>
			<td><input type="hidden" name="id" value="<?php echo $result['id'] ?>"></td>
		</tr>
		<tr>
			<td>
			<label for="nombre">Nombre:</label>
			</td>
			<td><input type="text" size="20" name="nombre" placeholder="Nombre" required=""  value="<?php echo $result['nombre'] ?>"></td>
			<td><label for="codigo_dane">Codigo DANE:</label></td>
			<td><input type="text" size="20" name="codigo_dane" placeholder="Codigo DANE" required=""  value="<?php echo $result['codigo_dane_sede'] ?>"></td>
		</tr>

		<tr>
			<td>
			<label for="consecutivo">Consecutivo</label>
			</td>
			<td><input type="text" name="consecutivo"  placeholder="Consecutivo" value="<?php echo $result['consecutivo'] ?>"></td>
			<td><label for="zona">Zona</label></td>
			<td>
				<select name="zona" id="" required="">
				<?php foreach ($zonas as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['zona_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>	

		<tr>

			<td><label for="modelo">Modelo</label></td>
			<td>
				<select name="modelo" id="" required="">
				<?php foreach ($modelos as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['modelo_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="institucion">Institucion</label></td>
			<td>
				<select name="institucion" required="" id="">
				<?php foreach ($instituciones as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['institucion_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>

		<tr>

			<td><label for="municipio">Municipio</label></td>
			<td>
				<select style="width:220px" required="" name="municipio" id="municipio">
	<option value="APIA" <?php if ($result['municipio'] == 'APIA') {
		echo "selected";
	} ?> >APIA</option>
	<option value="BALBOA" <?php if ($result['municipio'] == 'BALBOA') {
		echo "selected";
	} ?> >BALBOA</option>
	<option value="BELEN DE UMBRIA" <?php if ($result['municipio'] == 'BELEN  DE UMBRIA') {
		echo "selected";
	} ?> >BELEN</option>
	<option value="DOSQUEBRADAS" <?php if ($result['municipio'] == 'DOSQUEBRADAS') {
		echo "selected";
	} ?> >DOSQUEBRADAS</option>
	<option value="GUATICA" <?php if ($result['municipio'] == 'GUATICA') {
		echo "selected";
	} ?> >GUATICA</option>
	<option value="LA CELIA" <?php if ($result['municipio'] == 'LA CELIA') {
		echo "selected";
	} ?> >LA CELIA</option>
	<option value="LA VIRGINIA" <?php if ($result['municipio'] == 'LA VIRGINIA') {
		echo "selected";
	} ?> >LA VIRGINIA</option>
	<option value="MARSELLA" <?php if ($result['municipio'] == 'MARSELLA') {
		echo "selected";
	} ?> >MARSELLA</option>
	<option value="MISTRATO" <?php if ($result['municipio'] == 'MISTRATO') {
		echo "selected";
	} ?> >MISTRATO</option>
	<option value="PEREIRA" <?php if ($result['municipio'] == 'PEREIRA') {
		echo "selected";
	} ?> >PEREIRA</option>
	<option value="PUEBLO RICO" <?php if ($result['municipio'] == 'PUEBLO RICO') {
		echo "selected";
	} ?> >PUEBLO RICO</option>
	<option value="QUINCHIA" <?php if ($result['municipio'] == 'QUINCHIA') {
		echo "selected";
	} ?> >QUINCHIA</option>
	<option value="SANTA ROSA DE CABAL" <?php if ($result['municipio'] == 'SANTA ROSA DE CABAL') {
		echo "selected";
	} ?> >SANTA ROSA DE CABAL</option>
	<option value="SANTUARIO" <?php if ($result['municipio'] == 'SANTUARIO') {
		echo "selected";
	} ?> >SANTUARIO</option>
	<option value="NUCLEO 21" <?php if ($result['municipio'] == 'NUCLEO 21') {
		echo "selected";
	} ?> >NUCLEO 21</option>
		</select>
			</td>
		</tr>

	<tr>
		<td></td>
		<td></td>
		<td>
		<input type="submit" name="submit" class="btn btn-primary" value="Guardar">
		</td>
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
<?php require 'piedepagina-admin.php' ?>


