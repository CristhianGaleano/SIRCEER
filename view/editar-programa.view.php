<?php require 'cabecera-admin.php' ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo URL ?>gestion/buscar-programa.php">Listado programas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar programa</li>
  </ol>
</nav>

<div class="formulario-editar-user">
	<div class="wra_titulo">
		<h1>Editar programa</h1>
	</div>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

		<table>
			<tr>
				<td>SNIES</td>
				<td><input type="text" readonly="readonly" size="20" name="snies" value="<?php echo $result['snies']; ?>"></td>
				<td>Nombre</td>
				<td><input type="text" size="20" name="nombre" value="<?php echo $result['nombre']; ?>"  placeholder="Nombre" required="required"></td>
			</tr>


			<tr>
				<td>Cantidad de semestres</td>
				<td><input type="text" size="30" name="num_semestres" value="<?php echo $result['cantidad_semestre']; ?>"  placeholder="Cantidad de semestre" ></td>
				<td>Valor semestre</td>
				<td><input type="text" size="30" name="valor_semestre" value="<?php echo $result['costo_semestre']; ?>"  placeholder="Valor por semestre" ></td>
			</tr>


			<tr>
				<td>Nivel academico</td>
				<td><select  name="nivel_academico" id="nivel_academico">
				<?php foreach ($niveles as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['nivel_academico_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
		</select>		
		</td>
				<td><label for="universidad">Universidad</label></td>
				<td>
					<select name="universidad" id="">
						<?php foreach ($universidades as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['universidad_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
					</select>
				</td>
			</tr>

			<tr>
				<td><label for="jornada">Jornada</label></td>
				<td>
					<select name="jornada" id="">
						<?php foreach ($jornadas as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['jornada_id'] == $value['id']): ?>
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
				<td><input type="submit" name="submit" class="btn btn-primary" value="Guardar"></td>
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


