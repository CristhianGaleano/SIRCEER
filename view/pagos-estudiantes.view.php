<?php require 'cabecera-admin.php' ?>
<?php include_once "template-parts/menu-estudiantes.html" ?>	
<div class="formulario-editar-user">
	<div class="wra_titulo">
		<h1>PAGOS ESTUDIANTES</h1>
	</div>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<table>

		<tr>
			<td><label>Numero</label></td>
			<td><input type="text"  size="20" name="numero" value=""  placeholder="Numero del pago" required="required"></td>
			<td><label>Valor</label></td>
			<td><input type="text" size="30" name="valor"  value=""  placeholder="Monto" required=""></td>
		</tr>
		
		<tr>
			<td><label>Comprobante</label></td>
			<td><input type="text" size="30" name="comprobante"  value="" placeholder="File" >	</td>
		</tr>


		
<!--
		<?php if (!empty($errores)): ?>
			<div class="input-redit alert error">
				<?php echo $errores;?>
			</div>	
		<?php elseif($enviado): ?>
			<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>
		<?php endif ?>
	-->	

		<tr>
			<td></td>
			<td><input type="reset" name=""></td>
			<td></td>
			<td><input type="submit" name="submit" class="btn btn-primary" value="Guardar"></td>
		</tr>
		</table>
	</form>
</div>
<?php #require 'piedepagina-admin.php' ?>


