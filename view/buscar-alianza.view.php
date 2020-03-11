<?php require("cabecera-admin.php") ?>




<!--Fila para +-->
<div class="row main_wraper">
		<div class="col-md-12">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nuevo</button>
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
				<a href="<?php echo URL ?>view/ver-alianza.view.php?id=<?php echo urlencode($value['id_alianza'])?>">Ver</a>
			</td>
			
		<?php
	}
	 ?>
</tbody>        
                       </table>                  
                    </div>
                </div>
      
</div><!--row -->






<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva alianza</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<?php #echo htmlspecialchars($_SERVER['PHP_SELF']) ?>-->

        <form method="POST" id="formulario-programa" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">

			<div class="form-group">
				<label for="nombre">Nombre:</label>
				<input class="form-control" type="text" size="20" name="nombre" placeholder="Nombre alianza" required="" >	
			</div>


			<div class="form-group">
				<label for="cupos">Cupos:</label>
				<input class="form-control" type="number"  min="1" max="999999" size="30" name="cupos" placeholder="cupos" required="required">
			</div>


			<div class="form-group">
				<label for="fecha_ini">Fecha inicio:</label>
				<input class="form-control" type="date" name="fecha_ini" step="1" min="2017-01-01" max="2025-12-31" value="">
			</div>


			<div class="form-group">
				<label for="fecha_final">Fecha final:</label>
				<input class="form-control" type="date" name="fecha_final" step="1" min="2017-01-01" max="2025-12-31" value="">
			</div>



		<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btn-registrar_programa" name="submit" class="btn btn-primary">Enviar</button>
        <!--<input class="btn btn-primary" type="submit" name="submit" value="Enviar">-->
        </form>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php require 'piedepagina-admin.php' ?>