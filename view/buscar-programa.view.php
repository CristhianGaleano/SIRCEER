<?php require("cabecera-admin.php") ?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Listado programas</li>
  </ol>
</nav>
<!--Fila para +-->

<div class="row main_wraper">
		<div class="col-md-12">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nuevo</button>
		</div>
	</div>

<!---fila para table-->
                <div class="row main_wraper">
<!--Ejemplo tabla con DataTables-->
    
                <div class="col-md-12 mt-3">
                    <div class="table-responsive-md">        
                        <table id="example" class="table  table-bordered table-hover">
                        <thead class="thead-light"> 
                            <tr>
                            	<th>Id</th>
                                <th>Nombre</th>
                                <th>SNIES</th>
                                <!--<th>Contacto</th>-->
                                <th># Semes</th>
                                <th>Valor<br>Semes</th>
                                <th>Nivel<br>Acade</th>
                                <th>IES</th>
                                <!-- <th>Jornada</th> -->
                                <th>-</th>
                                <th>-</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody >
	<?php foreach ($rows as $value) {?>
		<tr>
			<td ><?php echo $value['id_programa'] ?></td>
			<td ><?php echo $value['name_programa'] ?></td>
			<td ><?php echo $value['snies'] ?></td>
			<td ><?php echo $value['num_semestres'] ?></td>
			<td ><?php echo $value['costo_semestre'] ?></td>
			<td ><?php echo $value['nivel_academico'] ?></td>
			<td ><?php echo $value['name_universidad'] ?></td>
			<!-- <td ><?php #echo utf8_encode($value['jornada']) ?></td> -->
				<!--
			<td >
				<a href="<?php #echo URL ?>gestion/gestionar-programa.php?snies=<?php #echo urlencode($value['id_institucion'])?>&select=p">Gestionar</a>
			</td>
		-->
			<td >
				<a class="btn btn-success" href="<?php echo URL ?>gestion/editar-programa.php?snies=<?php echo urlencode($value['snies'])?>">Editar</a>
			</td>
	
			<td >
        <input class="btn btn-danger btn-sm" type="button" name="deletePrograma" value="Eliminar" id="<?php echo $value['id_programa']?>">

      <!--  <a id="deletePrograma" name="<?php echo $value['id_programa']?>" class="btn btn-danger" href="<?php #echo URL ?>php/eliminarPrograma.php?id=<?php #echo $value['id_programa']?>">Eliminar</a>-->
			</td>
				
			<td >
				<a class="btn btn-info" target="_blank" href="<?php echo URL ?>view/ver-programa.view.php?id=<?php echo urlencode($value['id_programa'])?>">Ver</a>
			</td>
		<?php
	}
	 ?>
  </tr>
</tbody>        
                       </table>                  
                    </div>
                </div>
      
</div><!--row -->



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creando nuevo programa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<?php #echo htmlspecialchars($_SERVER['PHP_SELF']) ?>-->

        <form method="POST" id="formulario-programa" role="form" action="../php/nuevo-programa.php">
          
          <div class="form-group">
            <label for="nombre" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
          </div>
          <div class="form-group">
            <label class="col-form-label" for="nivel_academico">Nivel académico</label>
				<select class="form-control" name="nivel_academico" id="nivel-academico" >
					<option value="">Seleccione una opción</option>
			<?php foreach ($niveles as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
          </div>

          <div class="form-group">
          	<label class="col-form-label" for="codigo_snies">SNIES</label>
            <!--onkeyup="sugerencias_programa(this.value)"-->
			<input class="form-control" type="text"  name="codigo_snies" placeholder="Codigo SNIES*" id="snies"><div id="miDiv">
          </div>


          <div class="form-group">
          	<label class="col-form-label" for="universidad">IES</label>
			<select class="form-control" name="universidad" id="universidad" >
				<option value="">Seleccione una opción</option>
			<?php foreach ($universidades as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
          </div>

          <div class="form-group">
          	<label class="col-form-label" for="semestres">Semestres</label>
			      <input class="form-control" type="number"  name="semestres" min="1" max="15" placeholder="#*" id="semestre">	
          </div>


          <div class="form-group">
          	<label class="col-form-label" for="jornada">Jornada</label>
			<select class="form-control" name="jornada" id="jornada" >
				<option value="">Seleccione una opción</option>
			<?php foreach ($jornadas as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
          </div>


          <div class="form-group">
          	<label class="col-form-label" for="valor_semestre">Costo del semestre</label>
				<input class="form-control" type="text"  name="valor_semestre" placeholder="Valor del semestre*" id="valor-semes">
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btn-registrar_programa" name="submit" class="btn btn-primary">Enviar</button>
        <!--<input class="btn btn-primary" type="submit" name="submit" value="Enviar">-->
        </form>
      </div>
    </div>
  </div>
</div>


<?php require 'piedepagina-admin.php' ?>




