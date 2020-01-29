<?php require("cabecera-admin.php") ?>




<!--Fila para +-->

<div class="row main_wraper">
    <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo URL; ?>gestion/new-alianza.php">Agregar</a>
    </div>
</div>

<!---fila para table-->
                <div class="row main_wraper">
<!--Ejemplo tabla con DataTables-->
    
                <div class="col-md-10 mt-3">
                    <div class="table-responsive-md">        
                        <table id="example" class="table  table-bordered table-hover">
                        <thead class="thead-light"> 
                            <tr>
                            	<th>Id</th>
                                <th>Alianza</th>
                                <th>Fecha Ini.</th>
                                <th>Fecha Fin</th>
                                <th>Cupos</th>
                                <th>Estado</th>
                                <th>-</th>
                                <th>Acciones</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody >
	<?php foreach ($rows as $value) {?>
		<tr class="table_estudiantes_tr">
			
			<td><?php echo $value['id_alianza'] ?></td>
			<td><?php echo $value['nombre'] ?></td>
			<td><?php echo $value['fecha_inicio'] ?></td>
			<td><?php echo $value['fecha_final'] ?></td>
			<td><?php echo $value['cupos'] ?></td>
			
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
</tbody>        
                       </table>                  
                    </div>
                </div>
      
</div><!--row -->
<?php require 'piedepagina-admin.php' ?>