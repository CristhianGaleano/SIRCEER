<?php require("cabecera-admin.php") ?>
<?php include_once "template-parts/menu-estudiantes.php" ?>	


<!--Ejemplo tabla con DataTables-->
    <div class="container mt-5">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table  table-bordered table-hover" style="width:100%">
                        <thead class="thead-light"> 
                            <tr>
                            	<th>Id</th>
                                <th>Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Contacto</th>
                                <th>Edad</th>
                                <th>Sisben</th>
                                <th>Estado</th>
                                <th>Genero</th>
                                <th></th>
                                <th>Acciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody >
                        	<?php foreach ($rows as $value) {?>
                           <tr>
								<td><?php echo $value['id'] ?></td>	
								<td><?php echo $value['doc_estudiante'] ?></td>
								<td><?php echo $value['primer_nombre']. " " .$value['segundo_nombre'] ?></td>
								<td><?php echo $value['primer_apellido']. " " .$value['segundo_apellido'] ?></td>
								<td><?php echo $value['telefono_contacto'] ?></td>
								<td><?php echo $value['edad'] ?></td>
								<td><?php echo $value['siben'] ?></td>
								<td><?php echo $value['estado'] ?></td>
								<td><?php echo $value['genero'] ?></td>
								<td><a class="btn btn-warning btn-sm" href="<?php echo URL ?>gestion/editar-estudiante.php?id=<?php echo urlencode($value['doc_estudiante'])?>" title="Editar">Editar</a></td>
								<td><a class="btn btn-danger btn-sm" href="<?php echo URL ?>php/eliminarEstudiante.php?id=<?php echo urlencode($value['doc_estudiante'])?>" title="Eliminar">Eliminar</a></td>
								<td><a class="btn btn-success btn-sm" href="<?php echo URL ?>gestion/ver-estudiante.php?id=<?php echo urlencode($value['doc_estudiante'])?>" title="Ver">Ver</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>        
                       </table>                  
                    </div>
                </div>
        </div>  
    </div>    


<!--
</div>-->

<?php require("footer-menu.view.php") ?>	
<?php require 'piedepagina-admin.php' ?>




