<?php require("cabecera-admin.php") ?>
<?php include_once 'template-parts/menu-alianzas.php' ?>			


<section class="contenedor-busqueda">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
		<input type="submit" name="buscar" value="Buscar">
	</form>
</section>



<div style="overflow-x:auto; padding: 17px;">
	<!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
	<table class="table_estudiantes">
		<tr>
			<th class="table_estudiantes_th">COD.</th>
			<th class="table_estudiantes_th">NOMBRE</th>
			<th class="table_estudiantes_th">FECHA INICIO</th>
			<th class="table_estudiantes_th">FECHA FIN</th>
			<th class="table_estudiantes_th">CUPOS</th>
		</tr>

	<?php foreach ($rows as $value) {?>
		<tr class="table_estudiantes_tr">
			
			<td class="table_estudiantes_td"><?php echo $value['id_alianza'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['nombre'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['fecha_inicio'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['fecha_final'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['cupos'] ?></td>
			
				<!--
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/gestionar-programa.php?snies=<?php echo urlencode($value['id_alianza'])?>&select=a">Gestionar</a>
			</td>
		-->
			

			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/editar-alianza.php?id=<?php echo urlencode($value['id_alianza'])?>&select=a">Editar</a>
			</td>
	
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>php/eliminarAlianza.php?id=<?php echo urlencode($value['id_alianza'])?>">Eliminar</a>
			</td>
		
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/ver-alianza.php?id=<?php echo urlencode($value['id_alianza'])?>">Ver</a>
			</td>
			
		<?php
	}
	 ?>

	</table>
</div>





<div>
<?php require 'paginacion.view.php' ?>
</div>

<?php require("footer-menu.view.php") ?>	
<?php #require 'piedepagina-admin.php' ?>




