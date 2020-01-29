<?php require("cabecera-admin.php") ?>




<!--Fila para +-->

<div class="row main_wraper">
    <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo URL; ?>gestion/new-sede.php">Agregar</a>
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
                                <th>Sede</th>
                                <th>DANE</th>
                                <th>Consec.</th>
                                <th>Zona</th>
                                <th>Mode.</th>
                                <th>IES</th>
                                <th>Municipio</th>
                                <th>-</th>
                                <th>Acciones</th>
                                
                            </tr>
                        </thead>
                        <tbody >
	<?php foreach ($rows as $value) {?>
		<tr>
			<td><?php echo $value['id_sede'] ?></td>
			<td><?php echo $value['sede'] ?></td>
			<td><?php echo $value['codigo_dane_sede'] ?></td>
			<td><?php echo $value['consecutivo_sede'] ?></td>
			<td><?php echo $value['zona'] ?></td>
			<td><?php echo $value['modelo'] ?></td>
			<td><?php echo $value['institucion'] ?></td>
			<td><?php echo $value['municipio'] ?></td>
			<!-- <td><?php #echo $value['alianza'] ?></td> -->
			
				<!--
			<td>
				<a href="<?php echo URL ?>gestion/gestionar-programa.php?snies=<?php echo urlencode($value['id_sede'])?>&select=s">Gestionar</a>
			</td>
		-->
			<td>
				<a class="btn btn-warning btn-sm" href="<?php echo URL ?>gestion/editar-sede.php?id=<?php echo urlencode($value['id_sede'])?>">Editar</a>
			</td>
	
			<td>
				<a class="btn btn-danger btn-sm" href="<?php echo URL ?>php/eliminarSede.php?id=<?php echo urlencode($value['id_sede'])?>">Eliminar</a>
			</td>
				<!--
			<td>
				<a class="btn btn-success btn-sm" href="<?php #echo URL ?>gestion/ver-alianza.php?id=<?php #echo urlencode($value['id_programa'])?>">Ver</a>
			</td>-->
		<?php
	}
	 ?>
            </tbody>        
                       </table>                  
                    </div>
                </div>
      
</div><!--row -->

<?php require 'piedepagina-admin.php' ?>




