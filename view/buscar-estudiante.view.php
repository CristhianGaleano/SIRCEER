<?php require("cabecera-admin.php") ?>
<?php include_once "template-parts/menu-estudiantes.php" ?>	


<section class="contenedor-busqueda">
	<form action="../gestion/buscar-estudiantes.php?select=e" method="POST">
		<input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
		<input type="submit" name="buscar" value="Buscar">
	</form>
</section>

	

<div style="overflow-x:auto; padding: 17px;">
	<!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
	<table class="table_estudiantes">
		<tr>
			<!--<th class="table_estudiantes_th">Id</th>-->
			<th class="table_estudiantes_th">Documento</th>
			<th class="table_estudiantes_th">Nombres</th>
			<th class="table_estudiantes_th">Apellidos</th>
			<th class="table_estudiantes_th">Edad</th>
			<th class="table_estudiantes_th">Grado</th>
			<th class="table_estudiantes_th">Municipio</th>
			<th class="table_estudiantes_th">Zona</th>
			<th class="table_estudiantes_th">Sede(Instituto)</th>
			<th class="table_estudiantes_th">Genero</th>
			<th class="table_estudiantes_th">Estrategia</th>
			<th class="table_estudiantes_th">Estado</th>
			
		</tr>

	<?php foreach ($rows as $value) {?>
		<tr class="table_estudiantes_tr" <?php if ( empty( getMatricula($value['doc_estudiante'],$cn )) || getMatricula($value['doc_estudiante'],$cn ) == null || $value['estado'] == 'ACTIVO' || getMatricula($value['doc_estudiante'],$cn ) == 0 ):?> 
			<?php echo 'style="background: #E5AF9F;"';?> 
			<?php elseif ( getMatricula($value['doc_estudiante'],$cn ) >= 0 && $value['estado'] == 'MATRICULADO' ):
				 echo 'style="background: #44B266;"';?>
				 <?php elseif ( getMatricula($value['doc_estudiante'],$cn ) >= 0 && $value['estado'] == 'GRADUADO' ): ?>
				 	<?php echo 'style="background: #99CCF7;"';?>
				 		<?php elseif ( getMatricula($value['doc_estudiante'],$cn ) >= 0 && $value['estado'] == 'INACTIVO' ): ?>
				 	<?php echo 'style="background: #CC6767;"';?>
				<?php endif ?> >
			<!--<td class="table_estudiantes_td"><?php echo $value['id'] ?></td>-->
			<td class="table_estudiantes_td"><?php echo $value['doc_estudiante'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['primer_nombre'] . " " .$value['segundo_nombre']?></td>
			<td class="table_estudiantes_td"><?php echo $value['primer_apellido'] . " " .$value['segundo_apellido']?></td>
			<td class="table_estudiantes_td"><?php echo $value['edad'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['grado'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['muni_resi'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['zona'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['sede'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['genero'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['estrategia'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['estado'] ?></td>
			<td class="table_estudiantes_td">
				<!-- Si es diferente de activo y ya esta matriculado -->
				<?php #echo  getMatricula( $value['doc_estudiante'],$cn ); ?> 
				<a <?php if ($value['estado'] == 'GRADUADO' || $value['estado'] == 'MATRICULADO' || getMatricula( $value['doc_estudiante'],$cn ) > 0 &&  $value['estado'] == 'ACTIVO' || getMatricula( $value['doc_estudiante'],$cn ) > 0 &&  $value['estado'] == 'INACTIVO'):
					echo "href='' title='No es posible matricular'><span class='icon-folder-plus'></span></a>";
				else:?>
					href="<?php echo URL ?>gestion/matricular-estudiante.php?docu=<?php echo urlencode($value['doc_estudiante'])?>" title="Matricular"><span class="icon-folder-plus"></span></a>
				<?php endif ?> 
				
			</td>

			<td class="table_estudiantes_td">
				<a <?php if (getMatricula( $value['doc_estudiante'],$cn ) == 0 &&  $value['estado'] == 'ACTIVO' || $value['estado'] == 'GRADUADO'):
					echo "href='' title='No es posible gestionar'><span class='icon-cogs'></span></a>" ;
				else:?>
					
				    href="<?php echo URL ?>gestion/gestionar-estudiante.php?id=<?php echo urlencode($value['doc_estudiante'])?>" title="Administrar" ><span class="icon-cogs"></span></a>
				    <?php endif ?> 
			</td>
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/editar-estudiante.php?id=<?php echo urlencode($value['doc_estudiante'])?>" title="Editar"><span class="icon-pencil2"></span></a>
			</td>
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>php/eliminarEstudiante.php?id=<?php echo urlencode($value['doc_estudiante'])?>" title="Eliminar"><span class="icon-bin"></span></a>
			</td>
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/ver-estudiante.php?id=<?php echo urlencode($value['doc_estudiante'])?>" title="Ver"><span class="icon-eye-plus"></span></a>
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




