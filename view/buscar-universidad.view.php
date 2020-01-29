<?php require("cabecera-admin.php") ?>



<!--Fila para +-->

<div class="row main_wraper">
    <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo URL; ?>gestion/new-universidad.php">Agregar</a>
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
                                <th>Telefono</th>
                                <!--<th>Contacto</th>-->
                                <th>Email</th>
                                <th>Dire.</th>
                                <th>Tipo</th>
                                <th>Municipio</th>
                                <th>-</th>
                                <th>Acciones</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody >

	<?php foreach ($rows as $value) {?>
		<tr class="table_estudiantes_tr">

			
			<td ><?php echo $value['id_universidad'] ?></td>	
			<td ><?php echo $value['universidad'] ?></td>
			<td ><?php echo $value['telefono'] ?></td>
			<td ><?php echo $value['email'] ?></td>
			<td ><?php echo $value['direccion'] ?></td>
			<td ><?php echo $value['tipo_uni'] ?></td>
			<td ><?php echo $value['municipio'] ?></td>
			<!--<td ><?php #echo $value['alianza'] ?></td>-->
			<!--
			<td >
				<a class="btn btn-warning btn-sm" href="<?php echo URL ?>gestion/gestionar-institucion.php?id=<?php echo urlencode($value['id_universidad'])?>&select=u">Gestionar</a>
			</td>
		-->
			<td >
				<a class="btn btn-warning btn-sm" href="<?php echo URL ?>gestion/editar-universidad.php?id=<?php echo urlencode($value['id_universidad'])?>&select=u">Editar</a>
			</td>
			<td >
				<a class="btn btn-danger btn-sm" href="<?php echo URL ?>php/eliminarUniversidad.php?id=<?php echo urlencode($value['id_universidad'])?>">Eliminar</a>
			</td>
			<td >
				<a class="btn btn-success btn-sm" href="<?php echo URL ?>gestion/ver-universidad.php?id=<?php echo urlencode($value['id_universidad'])?>">Ver</a>
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




