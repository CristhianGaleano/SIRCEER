<?php require("cabecera-admin.php") ?>
<?php include_once 'template-parts/menu-alianzas.php' ?>			
<!--CONTENIDO-->

<div class="wrap-formulario-new-estudiante">
	<div class="wra_titulo">
		<h1>INGRESAR NUEVA ALIANZA</h1>
	</div>
		
	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table width="100%">
		<tr>
			<td>
			<label for="nombre">Nombre:</label>
			</td>
			<td><input type="text" size="20" name="nombre" placeholder="Nombre alianza" required="" ></td>
			<td><label for="cupos">Cupos:</label></td>
			<td><input type="number"  min="1" max="999999" size="30" name="cupos" placeholder="cupos" required="required">
		</tr>

		<tr>
			<td><label for="fecha_ini">Fecha inicio:</label></td>
			<td><input type="date" name="fecha_ini" step="1" min="2017-01-01" max="2025-12-31" value=""></td>
			<td><label for="fecha_final">Fecha final:</label></td>
			<td><input type="date" name="fecha_final" step="1" min="2017-01-01" max="2025-12-31" value=""></td>
			</td>
		</tr>	
	
		<tr>
			<td></td>
			<td></td>
			<td><input type="reset" name=""></td>
			<td><input type="submit" name="submit" class="btn btn-primary" value="Guardar"></td>
		</tr>
	</table>	
	</form>
	
</div>
		<?php //if (!empty($errores)): ?>
			<!--<div class="input-redit alert error">
				<?php #echo $errores;?>
			</div>-->	
		<?php #elseif($enviado): ?>
			<!--<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>-->
		<?php #endif ?>
		

<!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>					
<?php #require("piedepagina-admin.php") ?>

<script type=text/javascript>
	function validarForm(formulario)
	{
		if (formulario.busqueda.value.length == 0) 
		{
			formulario.busqueda.focus();
			alert("Debes ingresar el documento");
			return false;
		}
		return true;
	}
</script>