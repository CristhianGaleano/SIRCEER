	<?php require 'cabecera-admin.php' ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL ?>">Home</a></li>
	<li class="breadcrumb-item"><a href="<?php echo URL ?>gestion/buscar-institucion.php">Listado</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar IEB</li>
  </ol>
</nav>

	<div class="row main_wraper">
		<h2>Editando Institución</h2>
	</div>

	<div class="row main_wraper">
	<form id="form-editar-institucion" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	    <div class="col-lg-12">

			<input type="hidden"  name="id" value="<?php echo $result['id']; ?>">
			  
			  <div class="form-group col-md-5 float-left">
			  	<label>Nombre</label>
				<input class="form-control" type="text" required name="nombre" value="<?php echo $result['nombre']; ?>"  placeholder="Nombre" required="">
			  </div>
			  	

			  	<div class="form-group col-md-5 float-left">
			  		<label>Telefono</label>
			  		<input class="form-control" type="text"  name="telefono" value="<?php echo $result['telefono']; ?>"  placeholder="Telefono" >
			  	</div>


			  	<div class="form-group col-md-5 float-left">
			  		<label for="municipio">Municipio</label>
					<select class="form-control" name="municipio" id="" required="">
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
				
			  	</div>


			  	<div class="form-group col-md-5 float-left">
			  		<label for="calendario">Calendario</label>
			  		<select class="form-control" name="calendario" id="" required="">
			  			<option value="A" <?php if ($result['calendario'] == 'A'): ?>
			  				<?php echo ' selected' ?>
			  			<?php endif ?>>A</option>
			  			<option value="B" <?php if ($result['calendario'] == 'B'): ?>
			  				<?php echo ' selected' ?>
			  			<?php endif ?>>B</option>
			  		</select>
			  	</div>


			  	<div class="form-group col-md-5 float-left">
			  		<label for="dane">DANE</label>
			  		<input class="form-control" type="text" name="dane" value="<?php echo $result['DANE'] ?>">
			  	</div>


			  	<div class="form-group col-md-5 float-left">
			  		<label>Sector</label>
					<select class="form-control"  name="sector" required="" id="sector">
					<?php foreach ($sectores as $value): ?>
						<option value="<?php echo $value['id'] ?>" <?php if ($result['sector_id'] == $value['id']): ?>
							<?php echo 'selected' ?>
						<?php endif ?>><?php echo $value['nombre'] ?></option>
					<?php endforeach ?>
			</select>		
			  	</div>


			  	<div class="form-group col-md-5 float-left">
			  		<label>Zona</label>
					<select  class="form-control" name="zona" required="" id="zona">
					<?php foreach ($zonas as $value): ?>
						<option value="<?php echo $value['id'] ?>" <?php if ($result['zona_id'] == $value['id']): ?>
							<?php echo 'selected' ?>
						<?php endif ?>><?php echo $value['nombre'] ?></option>
					<?php endforeach ?>
			</select>		
			  	</div>

									<div class="form-group col-lg-3 float-lg-left">
											 <button type="submit" class="btn btn-dark"><i class="icon icon-edit"></i>Enviar</button>
										</div>
		
			
		</div>
			</form>
							  
	<?php #require 'piedepagina-admin.php' ?>


