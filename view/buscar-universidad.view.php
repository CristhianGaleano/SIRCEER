<?php require("cabecera-admin.php") ?>
<?php include_once 'template-parts/menu-ies.php' ?>			


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
			<th class="table_estudiantes_th">TELEFONO</th>
			<th class="table_estudiantes_th">EMAIL</th>
			<th class="table_estudiantes_th">DIRECCION</th>
			<th class="table_estudiantes_th">TIPO</th>
			<th class="table_estudiantes_th">MUNICIPIO</th>
			<!--<th class="table_estudiantes_th">ALIANZA</th>-->
		</tr>

	<?php foreach ($rows as $value) {?>
		<tr class="table_estudiantes_tr">

			
			<td class="table_estudiantes_td"><?php echo $value['id_universidad'] ?></td>	
			<td class="table_estudiantes_td"><?php echo $value['universidad'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['telefono'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['email'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['direccion'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['tipo_uni'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['municipio'] ?></td>
			<!--<td class="table_estudiantes_td"><?php #echo $value['alianza'] ?></td>-->
			<!--
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/gestionar-institucion.php?id=<?php echo urlencode($value['id_universidad'])?>&select=u">Gestionar</a>
			</td>
		-->
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/editar-universidad.php?id=<?php echo urlencode($value['id_universidad'])?>&select=u">Editar</a>
			</td>
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>php/eliminarUniversidad.php?id=<?php echo urlencode($value['id_universidad'])?>">Eliminar</a>
			</td>
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/ver-universidad.php?id=<?php echo urlencode($value['id_universidad'])?>">Ver</a>
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




