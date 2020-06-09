<?php require 'cabecera-admin.php' ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo URL ?>gestion/buscar-programa.php">Listado programas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar programa</li>
  </ol>
</nav>

<div class="formulario-editar-user main_wraper">
	<div class="wra_titulo">
		<h1>Editar programa</h1>
	</div>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">


	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label" for="snies">SNIES</label>
				<input class="form-control" type="text" readonly="readonly" size="20" name="snies" value="<?php echo $result['snies']; ?>">
				<label class="form-label" for="nombre">Nombre</label>
				<input class="form-control" type="text" size="20" name="nombre" value="<?php echo $result['nombre']; ?>"  placeholder="Nombre" required="required">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label" for="num_semestres">Semestres</label>
				<input class="form-control" type="text" size="30" name="num_semestres" value="<?php echo $result['cantidad_semestre']; ?>"  placeholder="Cantidad de semestre" >
				<label class="form-label" for="valor_semestre">Valor semestre</label>
				<input class="form-control" type="text" size="30" name="valor_semestre" value="<?php echo $result['costo_semestre']; ?>"  placeholder="Valor por semestre" >
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">		
				<label class="form-label" for="nivel_academico">Nivel academico</label>
						<select  class="form-control" name="nivel_academico" id="nivel_academico">
						<?php foreach ($niveles as $value): ?>
							<option value="<?php echo $value['id'] ?>" <?php if ($result['nivel_academico_id'] == $value['id']): ?>
								<?php echo 'selected' ?>
							<?php endif ?>><?php echo $value['nombre'] ?></option>
						<?php endforeach ?>
						</select>	
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label" for="universidad">Universidad</label>
					<select class="form-control" name="universidad" id="">
						<?php foreach ($universidades as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['universidad_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
					</select>
			</div>
		</div>
	</div>


		

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">		
					<label class="form-label" for="jornada">Jornada</label>
					
						<select class="form-control" name="jornada" id="">
							<?php foreach ($jornadas as $value): ?>
						<option value="<?php echo $value['id'] ?>" <?php if ($result['jornada_id'] == $value['id']): ?>
							<?php echo 'selected' ?>
						<?php endif ?>><?php echo $value['nombre'] ?></option>
					<?php endforeach ?>
						</select>
			</div>
		</div>
	</div>
	

				<input type="submit" name="submit" class="btn btn-primary" value="Guardar">
			
		</table>
		
		
		
		

		
		
		

	</form>
</div>
<?php #require 'piedepagina-admin.php' ?>


