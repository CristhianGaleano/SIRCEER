<?php require("cabecera-admin.php") ?>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Modulo matriculas</li>
        <!--<li class="breadcrumb-item active" aria-current="page">Matricular</li>-->
    </ol>
</nav>


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
								<!--<td><?php #echo $value['telefono_contacto'] ?></td>-->
								<td><?php echo $value['edad'] ?></td>
								<td><?php echo $value['siben'] ?></td>
								<td><?php echo $value['genero'] ?></td>

								<td>
                  <button class="btn btn-info btn-sm" type="button" name="matricular" value="<?php echo urlencode($value['id'])?>" onclick="capturar_id()"   data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  id="matricular">Matricular</button>
                </td>

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





<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Realizando matricula</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<?php #echo htmlspecialchars($_SERVER['PHP_SELF']) ?>-->

        <form method="POST" id="formulario-m-matricular" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
          
          <div class="form-group">
            <input type="hidden" name="id_estudiante" id="id_estudiante">

            <label for="nombre" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" readonly="" name="nombre_estudiante" id="nombre_estudiante">
          </div>

          <div class="form-group">
            <label class="col-form-label" for="semestre">Semestre</label>
                <select class="form-control" name="semestre" id="semestre" required="">
                    <option value="">Seleccione una opción</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
            
        </select>
          </div>

          <div class="form-group">
            <label class="col-form-label" for="periodo">Periodo</label>
            <select class="form-control" name="periodo" id="periodo" required="" >
                <option value="">Seleccione una opción</option>
                <option value="1">1</option>
                <option value="2">2</option>
        </select>
          </div>



          <div class="form-group">
            <label class="col-form-label" for="fecha">Fecha</label>
            <!--onkeyup="sugerencias_programa(this.value)"-->
            <input class="form-control" type="date" step="1" min="2005-01-01" max="2030-12-31"  name="fecha" placeholder="Fecha" id="fecha" required="">
          </div>

          <div class="form-group">
            <label class="col-form-label" for="anio">Año</label>
            <!--onkeyup="sugerencias_programa(this.value)"-->
            <input class="form-control" type="text"  name="anio" placeholder="Ej: 2020" id="anio" required="">
          </div>



          <div class="form-group">
            <label class="col-form-label" for="programa">Programa</label>
                <select class="form-control" name="programa" id="programa" required="">
                    <option value="">Seleccione una opción</option>
            <?php foreach ($programas as $valor): ?>
                <option value="<?php echo $valor['id'] ?>"><?php echo "snies: ".$valor['snies'] ." - " .$valor['nombre'] ?></option>
            <?php endforeach ?>
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


<?php require 'piedepagina-admin.php' ?>


<script type="text/javascript">
  
  function capturar_id(){

    var id = document.getElementById("matricular").value;
    document.getElementById("nombre_estudiante").value = "<?php echo urlencode($value['primer_nombre'] . " " . $value['primer_apellido']) ?>";
    document.getElementById("id_estudiante").value = id;
  }

</script>

