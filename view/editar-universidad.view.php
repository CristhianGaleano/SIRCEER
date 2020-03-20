<?php require 'cabecera-admin.php';?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL ?>">Home</a></li>
	<li class="breadcrumb-item"><a href="<?php echo URL ?>gestion/buscar-universidad.php">Listado IES</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar IES</li>
  </ol>
</nav>
<div class="contenedor">
	<div class="wra_titulo">
		<h1>Editar IES</h1>
	</div>
	<!--SEGUNDO FORMULARIO DE RENOVACION SEMESTRE-->	
	<!--<h2>REALIZAR MATRICULA</h2>-->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table>

		<tr>
			<td><input type="hidden" name="id" value="<?php echo $result['id'] ?>"></td>
		</tr>
	<tr>
			<td><label for="nombre">Nombre</label></td>
			<td><input type="text" size="30" name="nombre" placeholder="Nombre*" 	required="required" value="<?php echo $result['nombre'] ?>"></td>
			<td><label for="telefono">Telefono</label></td>
			<td><input type="text" size="30" name="telefono" placeholder="Telefono" value="<?php echo $result['telefono'] ?>"></td>
		</tr>
	
		<tr>
			<td><label for="email">E-mail</label></td>
			<td><input type="email" size="30" name="email" placeholder="E-mail*"  value="<?php echo $result['email'] ?>"></td>
			<td><label for="direccion">Dirección</label></td>
			<td><input type="text" size="30" name="direccion" placeholder="Direccion" value="<?php echo $result['direccion'] ?>"></td>
		</tr>
		
		<tr>
			<td><label for="municipio">Municipio</label></td>
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
			<td><label for="tipo_universidad">Tipo</label></td>
			<td>
				<select  name="tipo_universidad" id="tipo_universidad">
			<?php foreach ($tipos_universidad as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['tipo_universidad_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
		</select>
			</td>
		</tr>

<!--
		<tr>
			<td><label for="alianza">Alianza</label></td>
			<td>
				<select  name="alianza" id="alianza">
			<?php foreach ($alianzas as $valor): ?>
				<option value="<?php echo $valor['id'] ?>" <?php if ($result['alianza_id'] == $valor['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
				</select>
			</td>
		</tr>
-->
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="submit" name="enviar" value="Enviar"></td>
		</tr>
	
	</table>
	</form>



</div>

<?php require'piedepagina-admin.php' ?>