<?php require "cabecera-admin.php" ?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Listado Instituciones de Educación Básica</li>
  </ol>
</nav>

<!--Fila para +-->



<ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active">Institución IEB <span class="badge badge-light"></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo URL ?>gestion/buscar-universidad.php">Institución IES<span class="badge badge-light"></span></a>
  </li>

  
</ul>

<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    



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
                            	<!-- <th>Id</th> -->
                                <th>Institución</th>
                                <!--<th>DANE</th>-->
                                <th>Consec.</th>
                                <th>Zona</th>
                                <th>Mode.</th>
                                <!-- <th>IES</th> -->
                                <th>Municipio</th>
                                <th>-</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody >
	<?php foreach ($rows as $value) {?>
		<tr>
			<!-- <td><?php #echo $value['id_sede'] ?></td> -->
			<td><?php echo ucwords( strtolower( $value['sede'] ))?></td>
			<!--<td><?php echo $value['codigo_dane_sede'] ?></td>-->
			<td><?php echo $value['consecutivo_sede'] ?></td>
			<td><?php echo $value['zona'] ?></td>
			<td><?php echo $value['modelo'] ?></td>
			<!-- <td><?php #echo $value['institucion'] ?></td> -->
			<td><?php echo $value['municipio'] ?></td>
			<!-- <td><?php #echo $value['alianza'] ?></td> -->

				<!--
			<td>
				<a href="<?php echo URL ?>gestion/gestionar-programa.php?snies=<?php echo urlencode($value['id_sede'])?>&select=s">Gestionar</a>
			</td>
		-->
			<td>
				<a class="btn btn-secondary btn-sm" href="<?php echo URL ?>gestion/editar-sede.php?id=<?php echo urlencode($value['id_sede'])?>">Editar</a>
			</td>

			<td>
				<a class="btn btn-light btn-sm" href="<?php echo URL ?>php/eliminarSede.php?id=<?php echo urlencode($value['id_sede'])?>">Eliminar</a>
			</td>
				<!--
			<td>
				<a class="btn btn-success btn-sm" href="<?php #echo URL ?>gestion/ver-alianza.php?id=<?php #echo urlencode($value['id_programa'])?>">Ver</a>
			</td>-->
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
        <h5 class="modal-title" id="exampleModalLabel">Nueva sede</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<?php #echo htmlspecialchars($_SERVER['PHP_SELF']) ?>-->

        <form method="POST" id="formulario-sede" role="form" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] )?>">


        	<div class="for-group">
        		<!-- <label for="nombre">Nombre:</label> -->
			<input class="form-control" type="text" size="20" name="nombre" placeholder="Nombre" required="" >
        	</div>



        	<div class="for-group">
        		<!-- <label for="codigo_dane">Codigo DANE:</label> -->
			<input class="form-control" type="text" size="20" name="codigo_dane" placeholder="Codigo DANE">
        	</div>



        	<div class="for-group">
        		<!-- <label for="consecutivo">Consecutivo</label> -->
			<input class="form-control" type="text" name="consecutivo" placeholder="Consecutivo">
        	</div>



        	<div class="for-group">
        		<!-- <label for="zona">Zona</label> -->
				<select class="form-control" name="zona" id="" required="">
					<option value="">Seleccione la zona</option>
				<?php foreach ($zonas as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
        	</div>



        	<div class="for-group">
        		<!-- <label for="modelo">Modelo</label>	 -->
				<select class="form-control" name="modelo" id="" required="">
					<option value="">Seleccione el modelo</option>
				<?php foreach ($modelos as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
        	</div>



			<!-- <label for="institucion">Institución Educativa(Principal)</label> -->
        	<!-- <div class="for-group">
				<select class="form-control" name="institucion" id="" required="">
					<option value="">Seleccione la Institución a la que pertenece</option>
				<?php foreach ($instituciones as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			
        	</div> -->



        	<div class="for-group">
        		<!-- <label for="municipio">Municipio</label> -->
				<select class="form-control"  style="width: 200px" required="" name="municipio" id="">
						<option value="">Seleccione el municipio</option>
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





		<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btn-registrar_sede" name="submit" class="btn btn-primary">Enviar</button>
        <!--<input class="btn btn-primary" type="submit" name="submit" value="Enviar">-->
        </form>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require 'piedepagina-admin.php' ?>




