
<?php require("cabecera-admin.php") ?>
<?php include_once "template-parts/menu-programas.php" ?>			
<!--CONTENIDO-->
<div class="wrap-formulario">
	<div class="wra_titulo">
		<h2> <strong>INGRESAR NUEVO PROGRAMA</strong></h2>
	</div>

	<!--<table class="table-formulario">-->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

		<table>
			<tr>
				<td><label for="nombre">Nombre</label></td>
				<td><input type="text" size="30" name="nombre" placeholder="Nombre*" required></td>
				<td><label for="nivel_academico">Nivel academico</label></td>
				<td><select name="nivel_academico" id="nivel-academico" required="">
					<option value="">Seleccione una opción</option>
			<?php foreach ($niveles as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select></td>
			</tr>

			<tr>
				<td><label for="codigo_snies">SNIES</label></td>
				<td><input type="text" size="30" onkeyup="sugerencias_programa(this.value)" name="codigo_snies" placeholder="Codigo SNIES*" required><div id="miDiv"></div></td>
				<td><label for="universidad">Institución de Educación Superior</label></td>
			<td><select name="universidad" id="" required="">
				<option value="">Seleccione una opción</option>
			<?php foreach ($universidades as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select></td>
			</tr>
		
			<tr>
				<td><label for="semestres">Semestres</label></td>
				<td><input type="number" size="30" required="" name="semestres" min="1" max="15" placeholder="#*"></td>
				<td><label for="jornada">Jornada</label></td>
			<td><select name="jornada" id="" required="">
				<option value="">Seleccione una opción</option>
			<?php foreach ($jornadas as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select></td>
			</tr>

			<tr>
				<td><label for="valor_semestre">Costo del semestre</label></td>
				<td><input type="text"  name="valor_semestre" placeholder="Valor del semestre*" required></td>
			</tr>
		
		<tr>
			<td></td>
			<td></td>
			<td><input type="reset" name=""></td>
			<td><input type="submit" name="submit" class="btn btn-primary" value="Guardar"></td>
		</tr>
		
		
		
		
	
		<?php if (!empty($errores)): ?>
			<div class="input-redit alert error">
				<?php echo $errores;?>
			</div>	
		<?php elseif($enviado): ?>
			<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>
		<?php endif ?>

		</table>

	</form>
	<!--</table>-->
</div>
<!--END CONTENIDO-->				
<?php #require("piedepagina-admin.php") ?>