<?php require 'cabecera-admin.php';?>
<?php include_once 'template-parts/menu-estudiantes.php' ?>

<div class="contenedor">

		<?php if ($datosEstudiante['promedio']  == 0.0 ): ?>
			<script>
				alert("Accion: Antes de renovar matricula, asigne nota final al semestre actual");
			</script>
		<?php endif ?>
<form style="margin-top: 10px;" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" >

	
	<h2>CARGAR NOTA FINAL SEMESTRE EN CURSO</h2>
	<hr>
	<p><strong>COD. MATRICULA: <?php echo $datosEstudiante['id_matricula']; ?></strong></p>

	<table style="margin-top: 40px;">
	


	<tr>
		<td><label for="documento">Documento</label></td>
		<td><input type="text" readonly="readonly" value="<?php echo $datosEstudiante['documento_estudiante']; ?>" name="documento" ><br></td>
		<td><label for="documento">Nombre estudiante</label></td>
		<td><input type="text" value="<?php echo $datosEstudiante['primer_nombre']." ".$datosEstudiante['segundo_nombre'] ." ".$datosEstudiante['primer_apellido'] ." ".$datosEstudiante['segundo_apellido'];?>" name="nombre" disabled=""></td>
	</tr>

		<th><p><strong>Programa</strong></p></th>
	<tr>
		<td><label for="nombre">Nombre:</label></td>
		<td><input type="text" disabled="" value="<?php echo $datosEstudiante['nombre_programa'] ?>"></td>
		<td><label for="nombre">SNIES:</label></td>
		<td><input type="text" disabled="" value="<?php echo $datosEstudiante['snies'] ?>"></td>
	</tr>
		
		
			<th><strong><p>Institucion academica</p></strong></th>
		<tr>
			<td></td>
			
			<td><h2><?php echo $datosEstudiante['universidad']; ?></h2></td>
			
		</tr>
		
		
			<th><strong>Datos del semestre</strong></th>
		<tr>
		<!--Se debe llenar este input con el ultimo semestre registrado para el estudiante-->
			<td><label for="semestre">Semestre:</label></td>
			<td><input type="text" disabled="disabled" name="semestre" required="required" value="<?php echo $datosEstudiante['semestre']; ?>"></td>
			<td><label for="periodo">Periodo:</label></td>
			<td><input type="text" readonly="readonly" name="periodo" value="<?php echo $datosEstudiante['periodo']; ?>"></td>
		</tr>
		<tr>
			<td><label for="promedio">Nota final:</label></td>
			<td><input type="number" pattern="^\d*(\.\d{0,2})?$" step="0.01" name="promedio" value="<?php echo $datosEstudiante['promedio']; ?>" required="required" <?php if ( $datosEstudiante['promedio'] != '0.00') : ?>
				<?php echo   "readonly='readonly' style='color: white; background-color: green;'"?>>
			 <?php echo "<br> El promedio ya ha sido asignado, deberia renovar matricula" ?>
				<?php endif ?>
			</td>
			<td><label for="estado_matricula">Seleccione estado de la matricula</label></td>
			<td><select name="estado_matricula" id="" required="">
				<option value="">Seleccione una opcion</option>
				<option value="APROBADO">APROBADO</option>
				<option value="NO APROBADO">NO APROBADO</option>
			</select></td>
		</tr>
			<td><input type="hidden" name="matricula" value="<?php echo $datosEstudiante['id_matricula']; ?>"></td>
			<td><input type="hidden"  name="semestre" value="<?php echo $datosEstudiante['semestre']; ?>"></td>
		<tr>
			
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="submit" name="cargar" <?php if ($datosEstudiante['promedio'] != '0.00'): ?>
				<?php echo "disabled='disabled'" ?>
			<?php endif ?> value="CARGAR"></td>
		</tr>
		
	</table>
	</form>


	<!--SEGUNDO FORMULARIO DE RENOVACION SEMESTRE-->	
	<!--<h2>REALIZAR MATRICULA</h2>-->
		
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<br>
	<h1>RENOVAR MATRICULA</h1>
	<hr>

		<br>
		<p><strong>COD. MATRICULA: <?php echo $datosEstudiante['id_matricula']; ?></strong></p>

	<table style="margin-top: 20px;">

		<tr>
			<td><input type="hidden" name="estudiante_id" value="<?php echo $datosEstudiante['id']; ?>" ></td>
			<td><input type="hidden" name="programa_id" value="<?php echo $datosEstudiante['id_programa']; ?>" ></td>
		</tr>
	
	<tr>
		<td><label for="documento">Documento</label></td>
		<td><input type="text" readonly="readonly" value="<?php echo $datosEstudiante['documento_estudiante']; ?>" name="documento" ><br></td>
		<td><label for="documento">Nombre estudiante</label></td>
		<td><input type="text" value="<?php echo $datosEstudiante['primer_nombre']." ".$datosEstudiante['segundo_nombre'] ." ".$datosEstudiante['primer_apellido'];?>" name="nombre" disabled=""></td>
	</tr>

		
	<tr>
		<td><label  for="programa"><strong>Programa</strong></label></td>
		<td> <input type="text" name="programa" readonly="readonly" value="<?php echo $datosEstudiante['nombre_programa']; ?>"> </td>
		<td><label for="c_snies">SNIES:</label></td>
		<td>
			<input name="snies" id="snies" type="text" disabled="" value="<?php echo $datosEstudiante['snies'] ?>">
			<div id="c_snies"></div>
		</td>
	</tr>
		
		
			<th><strong><p>IES</p></strong></th>
		<tr>
			<td></td>
			<td><h2><?php echo $datosEstudiante['universidad']; ?></h2></td>
		</tr>
	
		<tr>
		<!--Se debe llenar este input con el ultimo semestre registrado para el estudiante-->
			<td><label for="semestre"><strong>Semestre</strong></label></td>
			<td>
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
			</td>
			<td><label for="periodo"><strong>Periodo</strong></label></td>
			<td>
				<select name="periodo" id="periodo">
					<option value="1">1</option>
					<option value="2">2</option>
				</select>
			</td>
		</tr>
			

		<tr>
			<!--<td><input type="hidden" name="matricula" value="<?php echo $datosEstudiante['id_matricula']; ?>"></td>
			<td><input type="hidden" name="operacion" value="<?php if ( !empty( $datosEstudiante['id_matricula'])) echo 'update'; else echo 'insert'; ?>"></td>-->
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="submit" name="matricular" value="Renovar"<?php if (  $datosEstudiante['promedio'] == '0.00' || $datosEstudiante['promedio'] == '' || empty( $datosEstudiante['id_matricula']) ) {
				echo "disabled='disabled'";
			}?>></td>
		</tr>
	
	</table>

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