<?php require("cabecera-admin.php") ?>




<ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active">Matriculas <span class="badge badge-light"> <?php echo $num_matritriculas; ?></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo URL ?>gestion/mod-matricula-pendientes.php">Matriculas pendientes<span class="badge badge-light"><?php echo $num_matri_pendientes; ?></span></a>
  </li>
   <!-- <li class="nav-item">
    <a class="nav-link" href="<?php echo URL ?>gestion/consultar-historia-aca.php">Historial <span class="badge badge-light">4</span></a>
  </li> -->
  
</ul>

<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    

    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Matriculas vigentes</li>
        <!--<li class="breadcrumb-item active" aria-current="page">Matricular</li>-->
    </ol>
</nav>


<!---fila para table-->
                <div class="row main_wraper">
<!--Ejemplo tabla con DataTables-->
    
                <div class="col-md-9 mt-3">
                    <div class="table-responsive-md">        
                    <table id="example" class="table display table-bordered table-hover">
                        <thead class="thead-light"> 
                            <tr>
                                <!-- <th>Id</th> -->
                                <th>Fecha</th>
                                <th>Semestre</th>
                                <th>Periodo</th>
                                <!-- <th>Nota</th> -->
                                <!-- <th>Estado</th> -->
                                <th>Documento</th>
                                <th>Estudiante</th>
                                <!-- <th>Programa</th> -->
                                <th>-</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody >
                          <?php foreach ($matriculas as $value): ?>
                            <tr>
                              <!-- <td><?php #echo $value['id'] ?></td> -->
                              <td><?php echo $value['fecha'] ?></td>
                              <td><?php echo $value['semestre'] ?></td>
                              <td><?php echo $value['periodo'] ?></td>
                              <!-- <td><?php #echo $value['promedio'] ?></td> -->
                              <!-- <td><?php #echo $value['estado'] ?></td> -->
                              <td><?php echo $value['documento'] ?></td>
                              <td><?php echo $value['primer_nombre'] . " " . $value['segundo_nombre'] . " " . $value['primer_apellido'] . " " . $value['primer_apellido']?></td>
                              <!-- <td><?php echo $value['programa_nombre'] ?></td> -->
                              <td>
                                <button class="btn btn-primary btn-sm" type="button" name="asignarNota" value="<?php echo urlencode($value['id'])?>" onclick="capturar_id_matri(<?php echo  $value['id'] ?>,<?php echo  $value['id_estudiante'] ?>)"   data-toggle="modal" data-target="#actualizarNota" data-whatever="@mdo"  id="asignarNota">Nota</button>
                              </td>
                              <td>
                                <a href="<?php echo URL ?>view/ver-matricula.view.php?id=<?php echo $value['id'] ?>"  class="btn btn-secondary btn-sm" target="_blank">Ver</a>
                              </td>
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                       </table>
                    </div>
                </div>


                
      
</div><!--row -->

 </div>
 <!--Matriculados end-->


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


<!-- Actualizar nota -->



<div class="modal fade" id="actualizarNota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asigne nota o modifique el semestre en curso</h5>
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
            <input type="text" class="form-control" name="nota" id="nota">
          </div>

          <div class="form-group">
            <label class="col-form-label" for="estado_semestre">Estado semestre</label>
                <select class="form-control" name="estado_semestre" id="estado_semestre" required="">
                    <option value="#">Seleccione una opción</option>
                    <option value="APROBADO">Aprobado</option>
                    <option value="NO APROBADO">No aprobado</option>
                    <option value="CANCELADO">Cancelar</option>
        </select>
          </div>

          <div class="form-group">
              <textarea class="form-control no-display" name="txtObservacionResoSemes" id="txtObservacionResoSemes" cols="30" rows="5" placeholder="Detalle"></textarea>
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
  function capturar_id(id){
    console.log("Id matricula: " + id);
    document.getElementById("nombre_estudiante").value = "<?php echo urlencode($value['primer_nombre'] . " " . $value['primer_apellido']) ?>";
    document.getElementById("id_estudiante").value = id;
  }


  function capturar_id_matri(id,id_estudiante){
    console.log("Variables enviadas al m-form: "+id_estudiante+" - "+id);
    document.getElementById("id_matricula").value = id;
    document.getElementById("id_estudiante_nota").value = id_estudiante;
  }

</script>

