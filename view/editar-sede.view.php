<?php require 'cabecera-admin.php' ?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL ?>">Home</a></li>
	<li class="breadcrumb-item"><a href="<?php echo URL ?>gestion/buscar-sede.php">Listado Sedes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Sede</li>
  </ol>
</nav>

<div class="formulario-editar-user main_wraper">
	<div class="wra_titulo">
		<h2>Editar sede</h2>
	</div>
	<hr>
	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	

	
		<input class="form-control" type="hidden" name="id" value="<?php echo $result['id'] ?>">

		<div class="row">
		<div class="col-md-4 mt-3">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input class="form-control" type="text" size="20" name="nombre" placeholder="Nombre" required=""  value="<?php echo $result['nombre'] ?>">
				<label for="codigo_dane">Codigo DANE</label>
				<input class="form-control" type="text" size="20" name="codigo_dane" placeholder="Codigo DANE" required=""  value="<?php echo $result['codigo_dane_sede'] ?>">
			</div>
		</div>


		<div class="col-md-4 mt-3">
			<div class="form-group">
				<label for="consecutivo">Consecutivo</label>
			
				<input class="form-control" type="text" name="consecutivo"  placeholder="Consecutivo" value="<?php echo $result['consecutivo'] ?>">
				<label for="zona">Zona</label>
			
					<select class="form-control" name="zona" id="" required="">
					<?php foreach ($zonas as $value): ?>
						<option value="<?php echo $value['id'] ?>" <?php if ($result['zona_id'] == $value['id']): ?>
							<?php echo 'selected' ?>
						<?php endif ?>><?php echo $value['nombre'] ?></option>
					<?php endforeach ?>
					</select>
					
				</div>
			</div>


			<div class="col-md-4 mt-3">
				<div class="form-group">

				<label for="modelo">Modelo</label>
			
			<select class="form-control" name="modelo" id="" required="">
			<?php foreach ($modelos as $value): ?>
				<option value="<?php echo $value['id'] ?>" <?php if ($result['modelo_id'] == $value['id']): ?>
					<?php echo 'selected' ?>
				<?php endif ?>><?php echo $value['nombre'] ?></option>
			<?php endforeach ?>
			</select>



			<label for="municipio">Municipio</label>

<select class="form-control" style="width:220px" required="" name="municipio" id="municipio">
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

					
					<!-- <label for="institucion">Institucion</label>
					<select class="form-control" name="institucion" required="" id="institucion">
						<?php foreach ($instituciones as $value): ?>
							<option value="<?php echo $value['id'] ?>" <?php if ($result['institucion_id'] == $value['id']): ?>
								<?php echo 'selected' ?>
							<?php endif ?>><?php echo $value['nombre'] ?></option>
						<?php endforeach ?>
					</select> -->
	
			
						
				</div>
			</div>

		</div>
		<!-- end row -->
	
		


	
	
		<div class="row  justify-content-end">
			<div class="col-md-4 mt-3">
				<input class="form-control btn btn-primary" type="submit" name="submit" value="Guardar">		
			</div>
		</div>
		

	</form>
</div>
<?php require 'piedepagina-admin.php' ?>


