<?php require("cabecera-admin.php") ?>
<?php include_once "template-parts/menu-estudiantes.php" ?>


		<div>
			<div>
			<div style="width: 96%; background-color: #F0ECEC; padding: 10px; border: 1px solid #D8D1D1;">
				<h2>Modulo de matriculas</h2>
			</div>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<br>
	
	

		<br>
	<div style="width: 40%; float: left; display: inline-block; padding: 10px;">
	<p>Codigo estudiante:</p>
	<input type="text" readonly name="id" value="<?php echo $datosEstudiante['id'] ?>">
	<p>Documento:</p>
	<input type="text" readonly="" name="documento" value="<?php echo $datosEstudiante['documento_estudiante'] ?>">
	<p>Nombres:</p>
	<input type="text" disabled name="nombres" value="<?php echo $datosEstudiante['primer_nombre'] . " " . $datosEstudiante['segundo_nombre'] . " " . $datosEstudiante['primer_apellido'] . " " .$datosEstudiante['segundo_apellido']?>"><br>
</div>
	<div style="width: 40%; display: inline-block; float: left; margin-left: 20px;">
			<p>Programa:</p>	 
			<select name="programa" required="" id="" onchange="cargar_snies(this.value);">
				<option value="">Seleccione un programa</option>
				<?php foreach ($programas as $value) { ?>
					<option value="<?php echo $value['id'];?>"><?php echo $value['nombre'];?></option>
				<?php } ?>
			</select>
		
	
			<p>Codigo snies:</p>	
			<div class="snies"></div>
			<div id="cargar_snies"></div>
		<!--Se debe llenar este input con el ultimo semestre registrado para el estudiante-->
			<p>Semestre:</p>		
				<select name="semestre" id="semestre" required="">
					<option value="">Seleccione un semestre</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>
			
				<p>Periodo:</p>
				<select name="periodo" id="periodo" required="">
					<option value="">Seleccione un periodo</option>
					<option value="1">1</option>
					<option value="2">2</option>
				</select>
				</div>
			<input type="submit" name="matricular" value="Matricular">

	</form>
			<a style="font-size: 3em;" href="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e"><span class="icon-undo2"></span></a>

			</div>
		</div>

<?php require("footer-menu.view.php") ?>