<?php require("cabecera-admin.php") ?>



<!---fila para table-->
                <div class="row main_wraper">
<!--Ejemplo tabla con DataTables-->
    
                <div class="col-md-10 mt-3">
                    <div class="table-responsive-md">        
                        <table id="example" class="table  table-bordered table-hover">
                        <thead class="thead-light"> 
                            <tr>
                            	<th>Id</th>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <!--<th>Contacto</th>-->
                                <th>Edad</th>
                                <th>Sisben</th>
                                <th>Genero</th>
                                <th></th>
                                <th>Acciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody >
                        	<?php foreach ($rs as $value) {?>
                           <tr>
								<td><?php echo $value['id'] ?></td>	
								<td><?php echo $value['documento'] ?></td>
								<td><?php echo $value['primer_nombre']. " " .$value['segundo_nombre'] ?></td>
								<td><?php echo $value['primer_apellido']. " " .$value['segundo_apellido'] ?></td>
								<!--<td><?php echo $value['telefono_contacto'] ?></td>-->
								<td><?php echo $value['edad'] ?></td>
								<td><?php echo $value['siben'] ?></td>
								<td><?php echo $value['genero'] ?></td>
								<td><input class="btn btn-info btn-sm" type="button" name="deleteEstudiante" value="Matricular" id="<?php echo urlencode($value['id'])?>"></td>

								<td>
                                    <input class="btn btn-light btn-sm" type="button" name="deleteEstudiante" value="Subir nota" id="<?php echo urlencode($value['id'])?>">
                                </td>
                                
								<td><a class="btn btn-success btn-sm" href="<?php echo URL ?>gestion/ver-estudiante.php?id=<?php echo urlencode($value['doc_estudiante'])?>" title="Ver">Descargar</a></td>
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




