<?php require "cabecera-admin.php" ?>



<ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" href="<?php echo URL ?>gestion/mod-matricula.php" >Matriculas <span class="badge badge-light"> <?php echo $num_matritriculas; ?></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="<?php echo URL ?>gestion/mod-matricula-pendientes.php">Matriculas pendientes <span class="badge badge-light"><?php echo $num_matri_pendientes; ?></span></a>
  </li>
   <!-- <li class="nav-item">
    <a class="nav-link" href="<?php echo URL ?>gestion/consultar-historia-aca.php">Historial</a>
  </li> -->
  
</ul>



<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Este listado corresponde a los estudiantes pendietes por matricular</li>
        <!--<li class="breadcrumb-item active" aria-current="page">Matricular</li>-->
    </ol>
</nav>

<!---fila para table-->
<div class="row main_wraper">
<!--Ejemplo tabla con DataTables-->
    
    <div class="col-md-11 mt-3">
      <div class="table-responsive-md">        
         <table id="example" class="table table-bordered table-hover">
            <thead class="thead-light"> 
              <tr>
                              <!-- <th>Id</th> -->
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>IEB</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody >
                          <?php foreach ($rs as $value) {?>
                           <tr>
                <!-- <td><?php #echo $value['id'] ?></td>  -->
                <td><?php echo $value['documento'] ?></td>
                <td><?php echo $value['primer_nombre']. " " .$value['segundo_nombre'] . " " . $value['primer_apellido']. " " .$value['segundo_apellido']?></td>
                <td><?php echo $value['sede']?></td>

                                <td>
                  <button class="btn btn-info btn-sm" type="button" name="matricular" onclick="setDataFormNewMatricula(<?php echo $value['documento']?>)"   data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  id="matricular">Matricular</button>
                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
         </table>
      </div>
    </div>
</div><!--row -->



  <!--Disponibles-->
  
    <div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
      <div class="row main_wraper">
        <div class="col-12">
          <form action="<?php echo URL  ?>gestion/historia.php" method="GET" >
              <div class="form-row align-items-center">
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInput">Name</label>
                  <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Documento">
                </div>

                 <div class="col-auto">
                  <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                </div>
              </div>
          </form>

        </div>
      </div>

      <div class="row main_wraper">
        <div class="col-12">
          
        </div>
      </div>
    </div>
</div><!---End tabs-->











<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Matriculando</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<?php #echo htmlspecialchars($_SERVER['PHP_SELF']) ?>-->

        <form method="POST" id="formulario-m-matricular" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
          
          <div class="form-group">
            <input type="hidden" name="id_estudiante" id="id_estudiante">

            <label for="nombre" class="col-form-label">Estudiante</label>
            <input type="text" class="form-control" readonly="" name="nombre_estudiante" id="txtEditNameEstudiante">
          </div>

          <div class="form-group">
            <label class="col-form-label" for="semestre">Semestre</label>
                <select class="form-control" name="semestre" id="txtEditSemestre" required="">
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


<!-- Actualizar nota -->



<div class="modal fade" id="actualizarNota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignando nota, semestre en curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<?php #echo htmlspecialchars($_SERVER['PHP_SELF']) ?>-->

        <form method="POST" id="formulario-m-asignar-nota" role="form" action="<?php echo URL  ?>php/asignar-nota-matricula.php">
          
          <div class="form-group">
            <input type="hidden" name="id_matricula" id="id_matricula">
            <input type="hidden" name="id_estudiante_nota" id="id_estudiante_nota">

            <label for="Nota" class="col-form-label">Nota</label>
            <input type="text" class="form-control" required="" name="nota" id="nota">
          </div>

          <div class="form-group">
            <label class="col-form-label" for="estado_semestre">Estado semestre</label>
                <select class="form-control" name="estado_semestre" id="estado_semestre" required="">
                    <option value="#">Seleccione una opción</option>
                    <option value="APROBADO">Aprobado</option>
                    <option value="NO APROBADO">No aprobado</option>
        </select>
          </div>

          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btn-asignar-nota-semestre" name="asignar-nota" class="btn btn-primary">Asignar nota</button>
        <!--<input class="btn btn-primary" type="submit" name="submit" value="Enviar">-->
        </form>
      </div>
    </div>
  </div>
</div>


<?php require 'piedepagina-admin.php' ?>


<script type="text/javascript">
  //para realizar matricula
  function capturar_id(id,nombre){
    console.log("Id matricula: " + id);
    // document.getElementById("nombre_estudiante").value = "<?php #echo urlencode($value['primer_nombre'] . " " . $value['primer_apellido']) ?>";
    document.getElementById("id_estudiante").value = id;
  }


  function capturar_id_matri(id,id_estudiante){
    console.log("Variables enviadas al m-form: "+id_estudiante+" - "+id);
    document.getElementById("id_matricula").value = id;
    document.getElementById("id_estudiante_nota").value = id_estudiante;
  }

</script>

