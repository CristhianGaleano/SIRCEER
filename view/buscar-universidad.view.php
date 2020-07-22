<?php require("cabecera-admin.php") ?>



<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Listado Instituciones de Educacación Superior</li>
  </ol>
</nav>


<ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" href="<?php echo URL ?>gestion/buscar-sede.php">Institución IEB<span class="badge badge-light"></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link active">Institución IES <span class="badge badge-light"></span></a>
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
                        <table id="example" class="table  table-bordered table-hover" style="font-size: .9em;">
                        <thead class="thead-light"> 
                            <tr>
                            	<!-- <th>Id</th> -->
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
		<tr>

			
			<!-- <td ><?php #echo $value['id_universidad'] ?></td>	 -->
			<td ><?php echo utf8_decode( $value['universidad']) ?></td>
			<td ><?php echo $value['telefono'] ?></td>
			<td ><?php echo $value['email'] ?></td>
			<td ><?php echo utf8_decode( $value['direccion']) ?></td>
			<td ><?php echo $value['tipo_uni'] ?></td>
			<td ><?php echo $value['municipio'] ?></td>
			<!--<td ><?php #echo $value['alianza'] ?></td>-->
			<!--
			<td >
				<a class="btn btn-warning btn-sm" href="<?php echo URL ?>gestion/gestionar-institucion.php?id=<?php echo urlencode($value['id_universidad'])?>&select=u">Gestionar</a>
			</td>
		-->
			<td >
				<a class="btn btn-secondary btn-sm" href="<?php echo URL ?>gestion/editar-universidad.php?id=<?php echo urlencode($value['id_universidad'])?>&select=u">Editar</a>
			</td>
			<td >
				<a type="button" class="btn btn-light btn-sm" href="<?php echo URL ?>php/eliminarUniversidad.php?id=<?php echo urlencode($value['id_universidad'])?>">Eliminar</a>
			</td>
			<td >
				<a class="btn btn-info btn-sm" href="<?php echo URL ?>view/ver-universidad.view.php?id=<?php echo urlencode($value['id_universidad'])?>">Ver</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Nueva IES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<?php #echo htmlspecialchars($_SERVER['PHP_SELF']) ?>-->

        <form method="POST" id="formulario-new-universidad" role="form" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ) ?>">


			<div class="form-group">
				<label for="nombre">Nombre</label>
			<input class="form-control" type="text" size="30" name="nombre" placeholder="Nombre*" required>	
			</div>


			<div class="form-group">
				<label for="telefono">Telefono</label>
			<input class="form-control" type="text" size="30" name="telefono" placeholder="Telefono">
			</div>


			<div class="form-group">
				<label for="email">E-mail</label>
			<input class="form-control" type="email" size="30" name="email" placeholder="E-mail*" >
			</div>


			<div class="form-group">
				<label for="direccion">Direccion</label>
			<input class="form-control" type="text" size="30" name="direccion" placeholder="Direccion">
			</div>


			<div class="form-group">
				<label for="municipio">Municipio</label>
			
				<select class="form-control"  required="" name="municipio" id="">
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
			
			<label for="tipo_universidad">Tipo de IES</label>
			
				<select class="form-control" name="tipo_universidad" id="tipo_universidad" required="">
					<option value="">Seleccione una opción</option>
			<?php foreach ($tipos_universidades as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
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




