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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-plus-square"></i></button>
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
                            	<!-- <th>Id</th> -->
                                <th>Nombre</th>
                                <th>SNIES</th>
                                <!--<th>Contacto</th>-->
                                <th>Semes</th>
                                <th>Valor</th>
                                <th>Nivel</th>
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
			<!-- <td ><?php #echo $value['id_programa'] ?></td> -->
			<td ><?php echo $value['name_programa'] ?></td>
			<td ><?php echo $value['snies'] ?></td>
			<td ><?php echo $value['num_semestres'] ?></td>
			<td ><?php echo $value['costo_semestre'] ?></td>
			<td ><?php echo $value['nivel_academico'] ?></td>
			<td ><?php echo $value['name_universidad'] ?></td>
			<!-- <td ><?php #echo utf8_encode($value['jornada']) ?></td> -->
				
			<td >
      <button type="button" id="btn-editar-programa" onclick="obtenerDataEditarPrograma('<?php echo $value['id_programa'] ?>')" class="btn btn-primary" data-toggle="modal" data-target="#editarPrograma" data-whatever="@mdo"><i class="fas fa-edit"></i></button>
      </td>
	
				
			<td >
				<a class="btn btn-secondary" target="_blank" href="<?php echo URL ?>view/ver-programa.view.php?id=<?php echo urlencode($value['id_programa'])?>">Ver</a>
			</td>
			<td>
        <input class="btn btn-light btn-sm" type="button" name="deletePrograma" value="Eliminar" id="<?php echo $value['id_programa']?>">
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

<!-- modals -->

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
          	<label class="col-form-label" for="codigo_snies">SNIES</label>
            <!--onkeyup="sugerencias_programa(this.value)"-->
			      <input class="form-control" type="text"  name="codigo_snies" placeholder="SNIES" id="snies"><div id="miDiv">
          </div>

          <div class="form-group">
            <label for="nombre" class="col-form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre del programa" id="nombre">
          </div>
          <div class="form-group">
          	<label class="col-form-label" for="semestres">Semestres</label>
			      <input class="form-control" type="number"  name="semestres" min="1" max="15" placeholder="Semestres" id="semestre">	
          </div>

          <div class="form-group">
          	<label class="col-form-label" for="valor_semestre">Costo semestre</label>
				    <input class="form-control" type="text"  name="valor_semestre" placeholder="Costo semestre" id="valor-semes">
          </div>
          <div class="form-group">
            <label class="col-form-label" for="nivel_academico">Nivel académico</label>
            <select class="form-control" name="nivel_academico" id="nivel-academico" >
              <option value="#">Seleccione una opción</option>
              <option value="Técnica Profesional">Técnica Profesional</option>
              <option value="Tecnología">Tecnología</option>
              <option value="Ciclo Profesional">Ciclo Profesional</option>
              <option value="Otro">Otro</option>    
            </select>
          </div>



          <div class="form-group">
          	<label class="col-form-label" for="universidad">IES</label>
			<select class="form-control" name="universidad" id="universidad" >
				<option value="#">Seleccione una opción</option>
			<?php foreach ($universidades as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
          </div>



          <div class="form-group">
          	<label class="col-form-label" for="jornada">Jornada</label>
			      <select class="form-control" name="jornada" id="jornada" >
            <option value="#">Seleccione una opción</option>
              <option value="Mañana">Mañana</option>
              <option value="Tarde">Tarde</option>
              <option value="Noche">Noche</option>
		        </select>
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
</div>


<!-- modal editar programa -->
<div class="modal fade" id="editarPrograma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editando programa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<?php #echo htmlspecialchars($_SERVER['PHP_SELF']) ?>-->

        <form  id="formEditarPrograma" role="form" action="">
          
          <div class="form-group">
            <label for="snies" class="col-form-label">SNIES</label>
            <input type="text" class="form-control" name="snies" title="No es posible editar esta propiedad" readonly placeholder="SNIES" id="e-pro-snies" value="">
            <spam class="" id="spam-n-success">No puede dejar el argumento vacio<i id="icon-n-success" class="fas fa-check"></i></spam> 
            <spam class="" id="spam-success">Argumento validado<i class="fas fa-check-circle"></i></spam> 
          </div>
          <div class="form-group">
            <label for="nombre" class="col-form-label">Programa</label>
            <input type="text" class="form-control" name="nombre" id="e-pro-nombre" placeholder="Nombre del programa" value="">
            <spam class="" id="spam-n-success">No puede dejar el argumento vacio<i id="icon-n-success" class="fas fa-check"></i></spam> 
            <spam class="" id="spam-success">Argumento validado<i class="fas fa-check-circle"></i></spam> 
          </div>



          <div class="form-group">
            <label class="form-label" for="valor_semestre">Valor semestre</label>
            <input class="form-control" type="text" size="30" name="valor_semestre" id="e-pro-valor_semestre" value=""  placeholder="Valor por semestre" >
            <spam class="" id="spam-n-success">No puede dejar el argumento vacio<i id="icon-n-success" class="fas fa-check"></i></spam> 
            <spam class="" id="spam-success">Argumento validado<i class="fas fa-check-circle"></i></spam> 
        </div>
          <div class="form-group">
            <label class="col-form-label" for="num_semestres">Semestres</label>
            <input class="form-control" type="number" name="num_semestres" id="e-pro-semestres" value="<?php echo $result['cantidad_semestre']; ?>">
        </div>
        <div class="form-group">
        <label class="form-label" for="nivel_academico">Nivel academico</label>
						<select  class="form-control" name="nivel_academico" id="e-pro-nivel_academico">
              <option value="Técnica Profesional">Técnica Profesional</option>
              <option value="Tecnología">Tecnología</option>
              <option value="Ciclo Profesional">Ciclo Profesional</option>
              <option value="Otro">Otro</option>
						</select>	
          </div>

          <div class="form-group">
            <label class="form-label" for="universidad">Universidad</label>
					  <select class="form-control" name="universidad" id="e-pro-university">
						<?php foreach ($universidades as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
					</select>
          </div>


          <div class="form-group">
            <label class="form-label" for="e-pro-jornada">Jornada</label>
            <select class="form-control" name="e-pro-jornada" id="e-pro-jornada">
              <option value="Mañana">Mañana</option>
              <option value="Tarde" selected>Tarde</option>
              <option value="Noche">Noche
              </option>
          </select>
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

<!-- modal -->




<?php require 'piedepagina-admin.php' ?>




