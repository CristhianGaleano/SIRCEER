<?php require("cabecera-admin.php") ?>
<?php include_once 'template-parts/menu-sedes.php' ?>


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
			<th class="table_estudiantes_th">CODIGO DANE</th>
			<th class="table_estudiantes_th">CONSECUTIVO</th>
			<th class="table_estudiantes_th">ZONA</th>
			<th class="table_estudiantes_th">MODELO</th>
			<th class="table_estudiantes_th">INSTITUCION</th>
			<th class="table_estudiantes_th">MUNICIPIO</th>
			<!-- <th class="table_estudiantes_th">ALIANZA</th> -->
		</tr>

	<?php foreach ($rows as $value) {?>
		<tr class="table_estudiantes_tr">
			<td class="table_estudiantes_td"><?php echo $value['id_sede'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['sede'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['codigo_dane_sede'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['consecutivo_sede'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['zona'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['modelo'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['institucion'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['municipio'] ?></td>
			<!-- <td class="table_estudiantes_td"><?php echo $value['alianza'] ?></td> -->
			
				<!--
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/gestionar-programa.php?snies=<?php echo urlencode($value['id_sede'])?>&select=s">Gestionar</a>
			</td>
		-->
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/editar-sede.php?id=<?php echo urlencode($value['id_sede'])?>">Editar</a>
			</td>
	
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>php/eliminarSede.php?id=<?php echo urlencode($value['id_sede'])?>">Eliminar</a>
			</td>
				<!--
			<td class="table_estudiantes_td">
				<a href="<?php #echo URL ?>gestion/ver-alianza.php?id=<?php #echo urlencode($value['id_programa'])?>">Ver</a>
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




