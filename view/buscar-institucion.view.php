<?php require("cabecera-admin.php") ?>



<!--Fila para +-->

<div class="row main_wraper">
    <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo URL; ?>gestion/new-institucion.php">Agregar</a>
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
                                <th>Nombre</th>
                                <th>Tel</th>
                                <!--<th>Contacto</th>-->
                                <th>Calendario</th>
                                <th>DANE</th>
                                <th>Sector</th>
                                <th>Municipio</th>
                                <th>Zona</th>
                                <th>-</th>
                                <th>Acciones</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody >
                        	<?php foreach ($rows as $value) {?>
                        		<tr>

			<td><?php echo $value['id_institucion'] ?></td>
			<td><?php echo $value['name_institucion'] ?></td>
			<td><?php if ( empty( $value['telefono']) ) {
				echo "NO REGISTRA";
			}else{ echo $value['telefono']; } ?></td>
			<td><?php echo $value['calendario'] ?></td>
			<td><?php if (empty($value['DANE'])) {
				echo "NO REGISTRA";
			}else{ echo $value['DANE']; } ?></td>
			<td><?php echo $value['sector'] ?></td>
			<td><?php echo $value['municipio'] ?></td>
			<td><?php echo $value['zona'] ?></td>



			<td>
				<a class="btn btn-warning btn-sm"  href="<?php echo URL ?>gestion/editar-institucion.php?id=<?php echo urlencode($value['id_institucion'])?>">Editar</a>
			</td>
			<td>
				<a class="btn btn-danger btn-sm"href="<?php echo URL ?>php/eliminarInstitucion.php?id=<?php echo urlencode($value['id_institucion'])?>">Eliminar</a>
			</td>
			<td>
				<a class="btn btn-info btn-sm"href="<?php echo URL ?>gestion/ver-institucion.php?id=<?php echo urlencode($value['id_institucion'])?>">Ver</a>
			</td>
				</tr>
		<?php
	}
	 ?>
                          </tbody>        
                       </table>                  
                    </div>
                </div>
      
</div><!--row -->

<!--
</div>-->


<?php require 'piedepagina-admin.php' ?>




