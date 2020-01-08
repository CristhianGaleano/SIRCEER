<?php require("cabecera-admin.php") ?>
<?php include_once "template-parts/menu-programas.php" ?>	


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
			<th class="table_estudiantes_th">SNIES</th>
			<th class="table_estudiantes_th">NOMBRE</th>
			<th class="table_estudiantes_th">NUM SEMESTRES</th>
			<th class="table_estudiantes_th">COSTO SEMESTRE</th>
			<th class="table_estudiantes_th">NIVEL ACADEMICO</th>
			<th class="table_estudiantes_th">IES</th>
			<th class="table_estudiantes_th">JORNADA</th>
		</tr>

	<?php foreach ($rows as $value) {?>
		<tr class="table_estudiantes_tr">
			<td class="table_estudiantes_td"><?php echo $value['id_programa'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['snies'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['name_programa'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['num_semestres'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['costo_semestre'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['nivel_academico'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['name_universidad'] ?></td>
			<td class="table_estudiantes_td"><?php echo utf8_encode($value['jornada']) ?></td>
				<!--
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/gestionar-programa.php?snies=<?php echo urlencode($value['id_institucion'])?>&select=p">Gestionar</a>
			</td>
		-->
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/editar-programa.php?snies=<?php echo urlencode($value['snies'])?>&select=p">Editar</a>
			</td>
	
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>php/eliminarPrograma.php?snies=<?php echo urlencode($value['snies'])?>">Eliminar</a>
			</td>
				<!--
			<td class="table_estudiantes_td">
				<a href="<?php #echo URL ?>gestion/ver-programa.php?snies=<?php #echo urlencode($value['id_programa'])?>">Ver</a>
			</td>-->
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




