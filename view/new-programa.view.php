
<?php require("cabecera-admin.php") ?>

	<div class="row main_wraper">
		<div class="col-md-12">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Crear programa</button>
		</div>
	</div>

	<div class="row main_wraper">
		<div class="col-12">

	<!--<table class="table-formulario">-->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

		
			
			
			

			
				
				
			
		
			
				
				
			

			
				
			
		
		
			
			
			<input type="reset" name="">
			<input type="submit" name="submit" class="btn btn-primary" value="Guardar">
		
	

		</table>

	</form>
	<!--</table>-->
</div>

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
        <form>
          <div class="form-group">
            <label for="nombre" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre">
          </div>
          <div class="form-group">
            <label class="col-form-label" for="nivel_academico">Nivel academico</label>
				<select class="form-control" name="nivel_academico" id="nivel-academico" required="">
					<option value="">Seleccione una opción</option>
			<?php foreach ($niveles as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
          </div>

          <div class="form-group">
          	<label class="col-form-label" for="codigo_snies">SNIES</label>
			<input class="form-control" type="text" onkeyup="sugerencias_programa(this.value)" name="codigo_snies" placeholder="Codigo SNIES*" required><div id="miDiv">
          </div>


          <div class="form-group">
          	<label class="col-form-label" for="universidad">IES</label>
			<select class="form-control" name="universidad" id="" required="">
				<option value="">Seleccione una opción</option>
			<?php foreach ($universidades as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
          </div>

          <div class="form-group">
          	<label class="col-form-label" for="semestres">Semestres</label>
			<input class="form-group" type="number"  required="" name="semestres" min="1" max="15" placeholder="#*">	
          </div>


          <div class="form-group">
          	<label class="col-form-label" for="jornada">Jornada</label>
			<select class="form-control" name="jornada" id="" required="">
				<option value="">Seleccione una opción</option>
			<?php foreach ($jornadas as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
          </div>


          <div class="form-group">
          	<label class="col-form-label" for="valor_semestre">Costo del semestre</label>
				<input class="form-control" type="text"  name="valor_semestre" placeholder="Valor del semestre*" required>
          </div>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<!--END CONTENIDO-->				
<?php require("piedepagina-admin.php") ?>