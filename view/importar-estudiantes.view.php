<?php require("cabecera-admin.php") ?>
<?php include_once "template-parts/menu-estudiantes.php" ?>				
<!--CONTENIDO-->
<script type="text/javascript">
	function validarCargue()
	{
		if (document.frm_archivo.myfile.value=="") 
		{
			alert("Debe cargar una hoja de calculo");
			document.frm_archivo.myfile.focus();
			return false;
		}

		document.frm_archivo.action = "../gestion/importar-estudiantes.php";
		document.submit();
	}
</script>
<!--Formulario-->
<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validarCargue()" name="frm_archivo" enctype="multipart/form-data" method="post">
	<table>
		<tr>
			<td><label>Año:</label></td>
			<td><input type="number" min="2000" max="2030" name="anio" required="" placeholder="Ej: 2000" ></td>
			<td><label>Semestre:</label></td>
			<td><input type="number" min="1" max="15" name="semestre" required="" placeholder="Ej: 1"></td>
		</tr>
		<tr>
			<td><label>Periodo:</label></td>
			<td><input type="number" min="1" max="2" name="periodo" required="" placeholder="Ej: 2"></td>
			<td><label for="sede">Institución Educativa(sede)</label></td>
			<td><select name="sede" id="" required="">
				<option value="">Sin seleccionar</option>
				<?php foreach ($sedes as $value) {
					echo "<option value='" . $value['id'] . "'>" . $value['nombre'] . "</option>";
				} ?>
			</select></td>
		</tr>

		<tr>
			<td><label for="estrategia">Estrategia</label></td>
			<td><select name="estrategia" id="" required="">
				<option value="">Sin seleccionar</option>
				<?php foreach ($estrategias as $value) {
					echo "<option value='" . $value['id'] . "'>" . $value['nombre'] . "</option>";
				} ?>
			</select></td>
			<td><label for="programa">Programa</label></td>
			<td><select name="programa" id="" required="">
				<option value="">Sin seleccionar</option>
				<?php foreach ($programas as $value) {
					echo "<option value='" . $value['id'] . "'>" . $value['nombre'] . "</option>";
				} ?>
			</select></td>
		</tr>

		<tr>
			<td><label for="fecha_ini">Fecha de inicio:</label></td>
			<td><input type="date" required="" id="fecha_ini" name="fecha_ini" step="1" min="2000-01-01" max="2030-12-31" value="" placeholder="Fecha de inicio"></td>
			<td><label>Excel(xlsx):</label></td>
			<td><input type="file" name="myfile"/></td>
		</tr>
	</table>

<input type="submit" value="Enviar" name="Importar">
</form>
	




<!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>					
<?php require("piedepagina-admin.php") ?>

