<?php require("cabecera-admin.php") ?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Listado IEB</li>
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
    
                <div class="col-md-10 mt-3">
                    <div class="table-responsive-md">        
                        <table id="example" class="table  table-bordered table-hover">
                        <thead class="thead-light"> 
                            <tr>
                            	<th>Id</th>
                                <th>Nombre</th>
                                <th>Tel</th>
                                <!--<th>Contacto</th>-->
                                <th>Calendario</th>
                                <th>DANE</th>
                                <th>Sector</th>
                                <th>Municipio</th>
                                <th>Zona</th>
                                <th>-</th>
                                <th>Acciones</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody >
                        	<?php foreach ($rows as $value) {?>
                        		<tr>

			<td><?php echo $value['id_institucion'] ?></td>
			<td><?php echo $value['name_institucion'] ?></td>
			<td><?php if ( empty( $value['telefono']) ) {
				echo "NO REGISTRA";
			}else{ echo $value['telefono']; } ?></td>
			<td><?php echo $value['calendario'] ?></td>
			<td><?php if (empty($value['DANE'])) {
				echo "NO REGISTRA";
			}else{ echo $value['DANE']; } ?></td>
			<td><?php echo $value['sector'] ?></td>
			<td><?php echo $value['municipio'] ?></td>
			<td><?php echo $value['zona'] ?></td>



			<td>
				<a class="btn btn-warning btn-sm"  href="<?php echo URL ?>gestion/editar-institucion.php?id=<?php echo urlencode($value['id_institucion'])?>">Editar</a>
			</td>
			<td>

				<input class="btn btn-danger btn-sm" type="button" name="deleteInstitucion" value="Eliminar" id="<?php echo urlencode($value['id_institucion'])?>">
			</td>
			<td>
				<a class="btn btn-info btn-sm"href="<?php echo URL ?>view/ver-institucion.view.php?id=<?php echo urlencode($value['id_institucion'])?>">Ver</a>
			</td>
				</tr>
		<?php
	}
	 ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Nueva institución</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<?php #echo htmlspecialchars($_SERVER['PHP_SELF']) ?>-->

        <form method="POST" id="formulario-institucion" role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">


            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input class="form-control" type="text" size="20" name="nombre" placeholder="Nombre" required>
            </div>


            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input class="form-control" type="text" size="12" name="telefono" placeholder="Telefono de contacto">
            </div>


            <div class="form-group">
                <label for="calendario">Calendario:</label>
            
                <select class="form-control" name="calendario" id="" required>
                    <option value="">Seleccione una opción</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>
            </div>


            <div class="form-group">
                <label for="dane">DANE</label>
                <input class="form-control" type="text" name="dane" placeholder="DANE">
            </div>


            <div class="form-group">
                <label for="sector">Sector</label>
                <select class="form-control" name="sector" id="" required="">
                    <option value="">Seleccione una opción</option>
                <?php foreach ($sectores as $value): ?>
                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
                <?php endforeach ?>
                </select>
            </div>


            <div class="form-group">
                <label for="municipio">Municipio</label>
                <select class="form-control" name="municipio" id="" required="">
                    <option value="">Seleccione una opción</option>
                    <option value="APIA">APIA</option>
                    <option value="BALBOA">BALBOA</option>
                    <option value="BELEN DE UMBRIA">BELEN</option>
                    <option value="DOSQUEBRADAS">DOSQUEBRADAS</option>
                    <option value="GUATICA">GUATICA</option>
                    <option value="LA CELIA">LA CELIA</option>
                    <option value="LA VIRGINIA">LA VIRGINIA</option>
                    <option value="MARSELLA">MARSELLA</option>
                    <option value="MISTRATO">MISTRATO</option>
                    <option value="PEREIRA">PEREIRA</option>
                    <option value="PUEBLO RICO">PUEBLO RICO</option>
                    <option value="QUINCHIA">QUINCHIA</option>
                    <option value="SANTA ROSA DE CABAL">SANTA ROSA DE CABAL</option>
                    <option value="SANTUARIO">SANTUARIO</option>
                    <option value="NUCLEO 21">NUCLEO 21</option>
                    
                </select>
            </div>


          <div class="form-group">
              <label for="zona">Zona</label>
                <select class="form-control" name="zona" id="" required="">
                    <option value="">Seleccione una opción</option>
                <?php foreach ($zonas as $value): ?>
                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
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




