<?php require "cabecera-admin.php" ?>

<!--CONTENIDO-->


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL ?>">Home</a></li>
	<li class="breadcrumb-item"><a href="<?php echo URL ?>gestion/buscar-estudiantes.php">Listado de Estudiantes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Agregar 	Estudiante</li>
  </ol>
</nav>
	<div class="row main_wraper">
		<div class="col-md-12">
			<h3>Nuevo estudiante</h3>
		</div>
	</div>

	<div class="row main_wraper">
		<div class="col-12">
			
		
	
	<form name="formulario_new_estu" id="formulario_new_estu" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" >
	
		<div class="row">
	    	<div class="col-md-3">
				<label class="form-group">Documento</label>
				<input class="form-control" type="text"  onkeyup="sugerencias(this.value)" size="20" name="documento" placeholder="Documento" required="" >
	    	</div>
	    		<div id="miDiv"></div>
	    <div class="col-md-3">
	      <label class="form-group">Tipo de documento</label>
			
				<select  class="form-control" required="" name="tipo_documento" id="">
					<option value="">Seleccione una opción</option>
					<option value="C.C">C.C: Cedula de Ciudadania</option>
					<option value="T.I">T.I: Tarjeta de Identidad</option>
				
				</select>
	    </div>

	    <div class="col-md-3">
	    	<label class="form-group">Primer nombre:</label>
			<input class="form-control" type="text" name="primer_nombre" placeholder="Primer nombre"  required="" >
	    </div>

	    <div class="col-md-3">
	    	<label class="form-group">Segundo nombre:</label>
			<input class="form-control" type="text"  name="segundo_nombre" placeholder="Segundo nombre">
	    </div>

	  </div><!--End row-->

	  <div class="row">
	  	
	    <div class="col-md-3">
	    	<label class="form-group" >Primer apellido:</label>
			<input class="form-control" type="text"  name="primer_apellido" placeholder="Primer apellido"  required="" >
	    </div>

	    <div class="col-md-3">
	    	<label class="form-group" >Segundo apellido:</label>
			<input class="form-control" type="text" name="segundo_apellido" placeholder="Segundo apellido">
	    </div>


	    <div class="col-md-3">
	    	<label class="form-group">Telefonos:</label>
			<input class="form-control" type="text"  name="telefonos" placeholder="Telefono">
	    </div>

	    <div class="col-md-3">
	    	<label class="form-group">Email:</label>
			<input class="form-control"  type="email"  name="email" placeholder="Email">
	    </div>

	  </div><!---end row-->

	  <div class="row">
		
		<div class="col-md-3">
			<label class="form-group">Fecha de nacimiento:</label>
			<input class="form-control" type="date" onblur="calcular_edad()" required="" id="fecha_naci" name="fecha_naci" step="1" min="1980-01-01" max="2030-12-31" value="" placeholder="Fecha de nacimiento">
		</div>

		<div class="col-md-3">
			<label class="form-group">Edad:</label>
			<input class="form-control" type="number" id="edad" min="10" max="50" name="edad" placeholder="Edad: 10-50" required="" >
		</div>

		<div class="col-md-3">
			<label class="form-group" >Direccion de residencia:</label>
			<input class="form-control" type="text"  name="dire_resi" placeholder="Direccion">
		</div>

		<div class="col-md-3">
			<label class="form-group">Municipio de residencia:</label>
			
			<select  class="form-control" required="" name="ciudad" id="">
				<option value="">seleccione una opción</option>
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
	
	  </div><!--end row-->

	  <div class="row">
	  		
	  		<div class="col-md-3">
	  			<label class="form-group" for="eps">EPS</label>
			
			<select  class="form-control" required="" name="eps" id="">
				<option value="">Seleccione una opción</option>
				<?php foreach ($epss as $value): ?>
					<option  value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
			</select>
	  		</div>

	  		<!--<div class="col-md-3">
	  			<label class="form-group" for="promedio_notas">Promedio de notas</label>
				<input class="form-control" type="text" name="promedio_notas" placeholder="Media notas" pattern="[0-9]" title="Ingrese una expresión como esta: 4.5" id="promedio_notas" onchange="validarNumero()">
	  		</div>-->

	  		<div class="col-md-3">
	  			<label class="form-group" >Servicio social</label>
			
				<select  class="form-control" required="" name="servicio_social" id="">
						<option value="">Seleccione una opción</option>
						<option value="EN CURSO">EN CURSO</option>
						<option value="APROBADO">APROBADO</option>
						<option value="NO APROBADO">NO APROBADO</option>
						
				</select>
	  		</div>

	  		<div class="col-md-3">
	  			<label class="form-group">Grado que cursa</label>
			
				<select  class="form-control" required="" name="grado" id="">
						<option value="">Seleccione una opción</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
					
				</select>
	  		</div>


	  </div><!--end row-->

	  <div class="row">
	  	
	  	<div class="col-md-3">
	  			<label class="form-group">Condonación credito:</label>
			<select  class="form-control" required="" name="condonacion_credito" id="">
					<option value="">Seleccione una opción</option>
					<option value="SI">SI</option>
					<option value="NO">NO</option>
			</select>
	  		</div>

	  		<div class="col-md-3">
	  			<label class="form-group" title="Sede de la IEB">Sede(IEB)</label>
			
				<select  class="form-control" required="" name="colegio" id="">
						<option value="">Seleccione una opción</option>
					<?php foreach ($colegio as $colegio): ?>
					<option value="<?php echo $colegio['id'] ?>"><?php echo $colegio['nombre'] ?></option>
				<?php endforeach ?>
				</select>
	  		</div>


	  		<div class="col-md-3">
	  			<label class="form-group">Sisben:</label>
			
			<select  class="form-control" required="" name="sisben" id="">
					<option value="">Seleccione una opción</option>
					<option value="SI">SI</option>
					<option value="NO">NO</option>
			</select>
	  		</div>
	  		<div class="col-md-3">
	  			<label class="form-group">Zona:</label>
			
				<select  class="form-control" required="" name="zona" id="">
						<option value="">Seleccione una opción</option>
					<?php foreach ($zona as $zona): ?>
					<option value="<?php echo $zona['id'] ?>"><?php echo $zona['nombre'] ?></option>
				<?php endforeach ?>
				</select>
	  		</div>
	  </div><!--end row-->


	   <div class="row">
	   		<div class="col-md-3">
	   			<label class="form-group" >Genero</label>
			<select  class="form-control" required="" name="genero" id="">
					<option value="">Seleccione una opción</option>
					<option value="MASCULINO">MASCULINO</option>
					<option value="FEMENINO">FEMENINO</option>
				</select>
	   		</div>
	   		<div class="col-md-3">
	   			<label class="form-group" >Estrato:</label>
			
			<select  class="form-control" required="" name="estrato" id="">
					<option value="">Seleccione una opción</option>
					<option value="1">1</option>	
					<option value="2">2</option>	
					<option value="3">3</option>	
					<option value="4">4</option>	
					<option value="5">5</option>	
			</select>
	   		</div>
	   		<div class="col-md-3">
	   			<label class="form-group" >Situacion academica:</label>
			
				<select  class="form-control" required="" name="situacion_academica" id="">
						<option value="INACTIVO">INACTIVO</option>
						<!-- <option value="">Seleccione una opción</option>
						<option value="GRADUADO">GRADUADO</option>
						<option value="INACTIVO">INACTIVO</option> -->
				</select>
	   		</div>
	   		<div class="col-md-3">
	   			<label class="form-group" >Población prioritaria:</label>
			
				<select  class="form-control" required="" name="prioritaria" id="">
							<option value="">Seleccione una opción</option>
							<option value="DISCAPACITADO">DISCAPACITADO</option>
							<option value="VICTIMA">VICTIMA</option>
							<option value="INDIGENA">INDIGENA</option>
							<option value="AFROCOLOMBIANO">AFROCOLOMBIANO</option>
							<option value="RAIZALES">RAIZALES</option>
							<option value="ROM">ROM</option>
							<option value="MUJER CABEZA DE HOGAR">MUJER CABEZA DE HOGAR</option>
							<option value="LGTBI">LGTBI</option>
							<option value="REINTEGRADOS">REINTEGRADOS</option>
							<option value="MIGRANTES">MIGRANTES</option>
							<option value="OTRA">OTRA</option>
							<option value="NINGUNO">NINGUNO</option>
					</select>
			
	   		</div>
	   </div><!--end row-->


	   <div class="row">
	   		<div class="col-md-3">
	   			<label class="form-group" >Numero acta de grado:</label>
			
				<input class="form-control" type="text" name="num_acta_grado" placeholder="Acta de grado">
	   		</div>
	   		<div class="col-md-3">
	   			<label class="form-group" >Tipo estrategia:</label>
			
				<select  class="form-control" required="" name="tipo_estrategia" id="">
					<option value="">Seleccione una opción</option>
					<?php foreach ($tipos_estrategia as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
	   		</div>
	   		<div class="col-md-3">
	   			<label class="form-group" >Municipio de nacimiento:</label>
			
			<select  class="form-control" required="" name="muni_naci" id="">
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
	   		<div class="col-md-3">
	   			<label class="form-group" >Estado civil:</label>
			
				<select  class="form-control" required="" name="estado_civil" id="">
					<option value="">Seleccione una opción</option>
					<option value="SOLTERO">SOLTERO</option>
					<option value="CASADO">CASADO</option>
					<option value="UNION LIBRE">UNION LIBRE</option>
				</select>
	   		</div>
	   </div><!--end row-->

	   <div class="row">
	   		<div class="col-md-3">
	   			<label class="form-group" >Selecciona una foto</label>
			<input class="form-control"  type="file" id="foto" name="foto" >
	   		</div>
	   		<div class="col-md-3">
	   			<label class="form-group" >Lugar servicio social</label>
			<input class="form-control"  type="text" name="lugar_servicio_social" placeholder="Lugar servicio social">
	   		</div>
	   		<div class="col-md-3">
	   			<label class="form-group" >Puntaje sisben</label>
			<input class="form-control" type="number" min="0" max="900" name="puntage_sisben" pattern="[0-9]" title="Ingrese solo numeros y decimales">
	   		</div>
	   		<div class="col-md-3">
	   			<label class="form-group" >Observación:</label>
			<textarea class="form-control" name="observacion" placeholder="Observaciones para el estudiante..." id="observacion" cols="30" rows="3" maxlength="110"></textarea>
	   		</div>
	   </div><!--end row-->

	   <div class="row">
	   		<div class="col-md-3">
	   			<label class="form-group" >Documento acudiente</label>
			<input class="form-control" type="text" required="" name="documento_attendant">
	   		</div>
	   		<div class="col-md-3">
	   			<label class="form-group" >Nombres acudiente</label>
			<input class="form-control" type="text" required="" id="first_name_attendant" name="first_name_attendant"  placeholder="Nombres acudiente">
	   		</div>
	   		<div class="col-md-3">
	   			<label class="form-group" >Apellidos acudiente:</label>
			<input class="form-control" type="text" required="" name="last_name_attendant" placeholder="Apellidos acudiente" id="last_nameattendant"/>
	   		</div>
	   		<div class="col-md-3">
	   			<label class="form-group" >Telefono</label>
			<input class="form-control" type="text" id="telephone_attendant" name="telephone_attendant" placeholder="Telefono">
	   		</div>
	   </div><!--end row-->

	   <div class="row">
	   	<div class="col-md-3">
	   		<label class="form-group" >Ocupación:</label>
			<input class="form-control" type="text" name="ocupation_attendant" placeholder="Ocupación" id="last_nameattendant" placeholder="Dirección"/>
	   	</div>
	   </div>
		
		<div class="row justify-content-end">
			<div class="col-2">
				<button class="btn btn-success" id="btn_nuevo_estudiante" type="submit" name="submit">Agregar</button>
			</div>
		</div>


	</form>

	</div>
	</div>
	


<!--END CONTENIDO-->

<?php require("piedepagina-admin.php") ?>

<script type=text/javascript>
	function validarForm(formulario)
	{
		if (formulario_new_estu.documento.value.length == 0) 
		{
			formulario_new_estu.documento.focus();
			alert("Debes ingresar el documento");
			return false;
		}
		return true;
	}

	

function calcular_edad(){

		var fecha_actual = new Date();
		var anio_actual = fecha_actual.getFullYear();
		var fecha_antes = document.getElementById('fecha_naci').value;
		console.log(anio_actual);
		console.log(fecha_antes);
		
		var anio_antes = fecha_antes.substr(0,4);
		console.log(anio_antes);
		var anios = anio_actual-anio_antes;
		console.log(anios);
		document.formulario_new_estu.edad.value=anios;
}

	



	function sugerencias(str){
			var xmlhttp;
			if (str.length==0)
			{ 
				document.getElementById("miDiv").innerHTML="";
				return;
			}
			if (window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("miDiv").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","../php/validarEstudiante.php?d="+str,true);
			xmlhttp.send();
		}
</script>