
<?php require("cabecera-admin.php") ?>
<?php include_once 'template-parts/menu-alianzas.php' ?> 			
<!--CONTENIDO-->
<div class="wrap-formulario">
	<div class="wra_titulo">
		<h2> <strong>INGRESAR SEDE A LA ALIANZA</strong></h2>
	</div>

	<!--<table class="table-formulario">-->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

		<table>

			<tr>
				<td><label for="alianza">Alianza</label></td>
				<td><select name="alianza" id="nivel-academico">
			<?php foreach ($alianzas as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select></td>
			
				<td><label for="sede">Sede</label></td>
			<td><select name="sede" id="">
			<?php foreach ($sedes as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select></td>
		
			</tr>
		

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="submit" name="enviar" value="Guardar"></td>
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