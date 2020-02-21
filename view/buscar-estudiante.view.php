<?php require("cabecera-admin.php") ?>



<!--Fila para +-->

<div class="row main_wraper">
    <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo URL; ?>gestion/new-estudiante.php">Agregar</a>
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
                            	<!-- <th>Id</th> -->
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                
                                <!--<th>Contacto</th>-->
                                <!-- <th>Edad</th> -->
                                <!-- <th>Sisben</th> -->
                                <th>Estado</th>
                                <th>Genero</th>
                                <th>Colegio</th>
                                <th></th>
                                <th>Acciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody >
                        	<?php foreach ($rows as $value) {?>
                           <tr>
								<!-- <td><?php #echo $value['id'] ?></td>	 -->
								<td><?php echo $value['doc_estudiante'] ?></td>
								<td><?php echo $value['primer_nombre']. " " .$value['segundo_nombre'] ?></td>
								<td><?php echo $value['primer_apellido']. " " .$value['segundo_apellido'] ?></td>
								<!--<td><?php echo $value['telefono_contacto'] ?></td>-->
								<!-- <td><?php #echo $value['edad'] ?></td> -->
								<!-- <td><?php #echo $value['siben'] ?></td> -->
								<td><?php echo $value['estado'] ?></td>
                                <td><?php echo $value['genero'] ?></td>
                                <td><?php echo $value['sede'] ?></td>
								<td><a class="btn btn-warning btn-sm" href="<?php echo URL ?>gestion/editar-estudiante.php?id=<?php echo urlencode($value['doc_estudiante'])?>" title="Editar">Editar</a></td>

								<td>
                                    <input class="btn btn-danger btn-sm" type="button" name="deleteEstudiante" value="Eliminar" id="<?php echo urlencode($value['id'])?>">

                                <!--    <a class="btn btn-danger btn-sm" id="btndeleteestu" href="<?php #echo URL ?>php/eliminarEstudiante.php?id=<?php #echo urlencode($value['doc_estudiante'])?>">Eliminar</a>-->
                                </td>
                                
								<td><a class="btn btn-success btn-sm" href="<?php echo URL ?>gestion/ver-estudiante.php?id=<?php echo urlencode($value['doc_estudiante'])?>" title="Ver" target="_blank">Ver</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>        
                       </table>                  
                    </div>
                </div>
      
</div><!--row -->

<!--
</div>-->


<?php require 'piedepagina-admin.php' ?>




