<?php require("cabecera-admin.php") ?>








<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Matriculados <span class="badge badge-light">4</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Disponibles <span class="badge badge-light">4</span></a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="pills-history-tab" data-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="false">Historial <span class="badge badge-light">4</span></a>
  </li>
  
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
                        <table id="table_matriculas" class="table display table-bordered table-hover">
                        <thead class="thead-light"> 
                            <tr>
                              <th>Id</th>
                                <th>Fecha</th>
                                <th>Semestre</th>
                                <th>Periodo</th>
                                <th>Nota</th>
                                <th>Estado</th>
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
                              <td><?php echo $value['id'] ?></td>
                              <td><?php echo $value['fecha'] ?></td>
                              <td><?php echo $value['semestre'] ?></td>
                              <td><?php echo $value['periodo'] ?></td>
                              <td><?php echo $value['promedio'] ?></td>
                              <td><?php echo $value['estado'] ?></td>
                              <td><?php echo $value['documento'] ?></td>
                              <td><?php echo $value['primer_nombre'] ?></td>
                              <!-- <td><?php echo $value['programa_nombre'] ?></td> -->
                              <td>
                                <button class="btn btn-info btn-sm" type="button" name="asignarNota" value="<?php echo urlencode($value['id'])?>" onclick="capturar_id_matri(<?php echo  $value['id'] ?>,<?php echo  $value['id_estudiante'] ?>)"   data-toggle="modal" data-target="#actualizarNota" data-whatever="@mdo"  id="asignarNota">Nota</button>
                              </td>
                              <td>
                                <button class="btn btn-warning btn-sm">Ver</button>
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

  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      
    




<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Para matricular</li>
        <!--<li class="breadcrumb-item active" aria-current="page">Matricular</li>-->
    </ol>
</nav>

<!---fila para table-->
                <div class="row main_wraper">
<!--Ejemplo tabla con DataTables-->
    
                <div class="col-md-6 mt-3">
                    <div class="table-responsive-md">        
                        <table id="example" class="table table-bordered table-hover">
                        <thead class="thead-light"> 
                            <tr>
                              <th>Id</th>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody >
                          <?php foreach ($rs as $value) {?>
                           <tr>
                <td><?php echo $value['id'] ?></td> 
                <td><?php echo $value['documento'] ?></td>
                <td><?php echo $value['primer_nombre']. " " .$value['segundo_nombre'] ?></td>
                <td><?php echo $value['primer_apellido']. " " .$value['segundo_apellido'] ?></td>
                                <td>
                  <button class="btn btn-info btn-sm" type="button" name="matricular" value="<?php echo urlencode($value['id'])?>" onclick="capturar_id(<?php echo $value['id'] ?>)"   data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  id="matricular">Matricular</button>
                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                       </table>
                    </div>
                </div>



      
</div><!--row -->

<!--
</div>-->



  </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Asignando nota, semestre en curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<?php #echo htmlspecialchars($_SERVER['PHP_SELF']) ?>-->

        <form method="POST" id="formulario-m-asignar-nota" role="form" action="<?php echo URL  ?>php/asignar-nota-matricula.php">
          
          <div class="form-group">
            <input type="text" name="id_matricula" id="id_matricula">
            <input type="text" name="id_estudiante_nota" id="id_estudiante_nota">

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

