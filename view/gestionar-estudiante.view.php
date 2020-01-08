	<?php require 'cabecera-admin.php';?>
	<?php include_once 'template-parts/menu-estudiantes.php' ?>

	<div class="contenedor">
			<?php if ($datosEstudiante['promedio']  == 0.0 ): ?>
				<script>
					alert("Accion: Antes de renovar matricula, asigne nota final al semestre actual");
				</script>
			<?php endif ?>
			<div style="background-color: #AEA7A7;">
	<form style="margin-top: 10px;" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" >

		<div style="margin: 20px;">
			<h2 align="center">CARGAR NOTA FINAL SEMESTRE EN CURSO</h2>		
		</div>
		<hr>

		
		<p><strong>COD. MATRICULA: <?php echo $datosEstudiante['id_matricula']; ?></strong></p>
		
			<label for="documento">Documento</label>
			<input type="text" readonly="readonly" value="<?php echo $datosEstudiante['documento_estudiante']; ?>" name="documento" ><br>
			<label for="documento">Nombre estudiante</label>
			<input type="text" value="<?php echo $datosEstudiante['primer_nombre']." ".$datosEstudiante['segundo_nombre'] ." ".$datosEstudiante['primer_apellido'] ." ".$datosEstudiante['segundo_apellido'];?>" name="nombre" disabled="">
		

			<th><p><strong>Programa</strong></p></th>
		
			<label for="nombre">Nombre:</label>
			<input type="text" disabled="" value="<?php echo $datosEstudiante['nombre_programa'] ?>">
			<label for="nombre">SNIES:</label>
			<input type="text" disabled="" value="<?php echo $datosEstudiante['snies'] ?>">
		
			
			
				<th><strong><p>Institucion academica</p></strong></th>
			
				
				
				<h2><?php echo $datosEstudiante['universidad']; ?></h2>
				
			
			
			
				<th><strong>Datos del semestre</strong></th>
			
			<!--Se debe llenar este input con el ultimo semestre registrado para el estudiante-->
				<label for="semestre">Semestre:</label>
				<input type="text" disabled="disabled" name="semestre" required="required" value="<?php echo $datosEstudiante['semestre']; ?>">
				<label for="periodo">Periodo:</label>
				<input type="text" readonly="readonly" name="periodo" value="<?php echo $datosEstudiante['periodo']; ?>">
			
			
				<label for="promedio">Nota final:</label>
				<input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="promedio" value="<?php echo $datosEstudiante['promedio']; ?>" required="required" <?php if ( $datosEstudiante['promedio'] != '0.00') : ?>
					<?php echo   "readonly='readonly' style='color: white; background-color: green;'"?>>
				 <?php echo "<br> El promedio ya ha sido asignado, deberia renovar matricula" ?>
					<?php endif ?>
				
				<label for="estado_matricula">Seleccione estado de la matricula</label>
				<select name="estado_matricula" id="" required="">
					<option value="">Seleccione una opcion</option>
					<option value="APROBADO">APROBADO</option>
					<option value="NO APROBADO">NO APROBADO</option>
				</select>
			
				<input type="hidden" name="matricula" value="<?php echo $datosEstudiante['id_matricula']; ?>">
				<input type="hidden"  name="semestre" value="<?php echo $datosEstudiante['semestre']; ?>">
					
				<input type="submit" name="cargar" <?php if ($datosEstudiante['promedio'] != '0.00'): ?>
					<?php echo "disabled='disabled'" ?>
				<?php endif ?> value="CARGAR">
		
		</form>
	</div>


		<!--SEGUNDO FORMULARIO DE RENOVACION SEMESTRE-->	
		<!--<h2>REALIZAR MATRICULA</h2>-->
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<br>
			<div style="margin: 20px;">
				<h2 align="center">RENOVAR MATRICULA</h2>		
			</div>
			<hr>

			<br>
			<p><strong>COD. MATRICULA: <?php echo $datosEstudiante['id_matricula']; ?></strong></p>

		

		
				<input type="hidden" name="estudiante_id" value="<?php echo $datosEstudiante['id']; ?>" >
				<input type="hidden" name="programa_id" value="<?php echo $datosEstudiante['id_programa']; ?>" >
			
		
		
			<label for="documento">Documento</label>
			<input type="text" readonly="readonly" value="<?php echo $datosEstudiante['documento_estudiante']; ?>" name="documento" ><br>
			<label for="documento">Nombre estudiante</label>
			<input type="text" value="<?php echo $datosEstudiante['primer_nombre']." ".$datosEstudiante['segundo_nombre'] ." ".$datosEstudiante['primer_apellido'];?>" name="nombre" disabled="">
		

			
		
			<label  for="programa"><strong>Programa</strong></label>
			 <input type="text" name="programa" readonly="readonly" value="<?php echo $datosEstudiante['nombre_programa']; ?>"> 
			<label for="c_snies">SNIES:</label>
			
				<input name="snies" id="snies" type="text" disabled="" value="<?php echo $datosEstudiante['snies'] ?>">
				<div id="c_snies"></div>
			
		
			
			
				<th><strong><p>IES</p></strong></th>
			
				
				<h2><?php echo $datosEstudiante['universidad']; ?></h2>
			
		
			
			<!--Se debe llenar este input con el ultimo semestre registrado para el estudiante-->
				<label for="semestre"><strong>Semestre</strong></label>
				
					<select name="semestre" id="semestre">
						<option value="1" <?php if (($datosEstudiante['semestre'] + 1) == 1): ?>
							<?php echo "selected='selected'" ?>
						<?php endif ?> >1</option>
						<option value="2" <?php if (($datosEstudiante['semestre'] + 1) == 2): ?>
							<?php echo "selected='selected'" ?>
						<?php endif ?> >2</option>
						<option value="3" <?php if (($datosEstudiante['semestre'] + 1) == 3): ?>
							<?php echo "selected='selected'" ?>
						<?php endif ?> >3</option>
						<option value="4" <?php if (($datosEstudiante['semestre'] + 1) == 4): ?>
							<?php echo "selected='selected'" ?>
						<?php endif ?> >4</option>
						<option value="5" <?php if (($datosEstudiante['semestre'] + 1) == 5): ?>
							<?php echo "selected='selected'" ?>
						<?php endif ?> >5</option>
						<option value="6" <?php if (($datosEstudiante['semestre'] + 1) == 6): ?>
							<?php echo "selected='selected'" ?>
						<?php endif ?> >6</option>
						<option value="7" <?php if (($datosEstudiante['semestre'] + 1) == 7): ?>
							<?php echo "selected='selected'" ?>
						<?php endif ?> >7</option>
						<option value="8" <?php if (($datosEstudiante['semestre'] + 1) == 8): ?>
							<?php echo "selected='selected'" ?>
						<?php endif ?> >8</option>
						<option value="9" <?php if (($datosEstudiante['semestre'] + 1) == 9): ?>
							<?php echo "selected='selected'" ?>
						<?php endif ?> >9</option>
						<option value="10" <?php if (($datosEstudiante['semestre'] + 1) == 10): ?>
							<?php echo "selected='selected'" ?>
						<?php endif ?> >10</option>
					</select>
				
				<label for="periodo"><strong>Periodo</strong></label>
				
					<select name="periodo" id="periodo">
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
				
			
				

			
				<!--<input type="hidden" name="matricula" value="<?php echo $datosEstudiante['id_matricula']; ?>">
				<input type="hidden" name="operacion" value="<?php if ( !empty( $datosEstudiante['id_matricula'])) echo 'update'; else echo 'insert'; ?>">-->
				
				
				
				
				<input type="submit" name="matricular" value="Renovar"<?php if (  $datosEstudiante['promedio'] == '0.00' || $datosEstudiante['promedio'] == '' || empty( $datosEstudiante['id_matricula']) ) {
					echo "disabled='disabled'";
				}?>>
			
		
		

		</form>
		

	<!--******************************************************************-->



	</div><!--div container general-->

	<?php require("footer-menu.view.php") ?>
	<?php #require'piedepagina-admin.php' ?>


	<script type="text/javascript">
		
	function cambiar_programa_select(str){

				var conexion;

				if (window.XMLHttpRequest) {
					conexion = new XMLHttpRequest();
				}else{
					conexion = new ActiveXObject("Microsoft.XMLHTTP");
				}

				conexion.onreadystatechange = function(){
					if (conexion.readyState == 4 && conexion.status == 200) 
					{
						document.getElementById("c_snies").innerHTML=conexion.responseText;
					}
				}

				conexion.open("GET","../php/traer_snies_programa.php?d="+str,true);
				conexion.send();
				
			}
			
		

	</script>