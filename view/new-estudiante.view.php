<?php require "cabecera-admin.php" ?>
<?php include_once "template-parts/menu-estudiantes.php" ?>			
<!--CONTENIDO-->


<div class="wrap-formulario-new-estudiante">
<div class="wra_titulo">
	<h1>NUEVO ESTUDIANTE</h1>
</div>
	
	<form name="formulario_new_estu" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" >
	<table width="100%">

		<tr>
			<td><label for="documento">Documento:</label></td>
			<td><input type="text"  onkeyup="sugerencias(this.value)" size="20" name="documento" placeholder="Documento" required="" >
				<div id="miDiv"></div>
			</td>		
			<td><label for="tipo_documento">Tipo de documento:</label></td>
			<td>
				<select  style="width: 200px" required="" name="tipo_documento" id="">
					<option value="">Seleccione una opción</option>
					<option value="C.C">C.C: Cedula de Ciudadania</option>
					<option value="T.I">T.I: Tarjeta de Identidad</option>
				
				</select>
			</td>
			<td><label for="primer_nombre">Primer nombre:</label></td>
			<td><input type="text" size="30" name="primer_nombre" placeholder="Primer nombre"  required="" ></td>
		</tr>	

		<tr>
			<td><label for="segundo_nombre">Segundo nombre:</label></td>
			<td><input type="text" size="30" name="segundo_nombre" placeholder="Segundo nombre"></td>
			<td><label for="primer_apellido">Primer apellido:</label></td>
			<td><input type="text" size="30" name="primer_apellido" placeholder="Primer apellido"  required="" ></td>
			<td><label for="segundo_apellido">Segundo apellido:</label></td>
			<td><input type="text" size="30" name="segundo_apellido" placeholder="Segundo apellido"></td>
		</tr>


		<tr>
			<td><label for="telefonos">Telefonos:</label></td>
			<td><input type="text" size="30" name="telefonos" placeholder="Telefono"></td>
			<td><label for="email">Email:</label></td>
			<td><input type="email" size="30" name="email" placeholder="Email"></td>
			<td><label for="fecha-naci">Fecha de nacimiento:</label></td>
			<td><input type="date" onblur="calcular_edad()" required="" id="fecha_naci" name="fecha_naci" step="1" min="1980-01-01" max="2030-12-31" value="" placeholder="Fecha de nacimiento"></td>
		</tr>

		<tr>
			<td><label for="edad">Edad:</label></td>
			<td><input type="number" id="edad" min="10" max="50" name="edad" placeholder="Edad: 10-50" required="" ></td>
			<td><label for="dire_resi">Direccion de residencia:</label></td>
			<td><input type="text" size="30" name="dire_resi" placeholder="Direccion"></td>
			<td><label for="ciudad">Municipio de residencia:</label></td>
			<td>
			<select  style="width: 200px" required="" name="ciudad" id="">
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
			</td>		
		</tr>

		<tr>
			<td><label for="eps">EPS:</label></td>
			<td>
			<select  style="width: 200px" required="" name="eps" id="">
				<option value="">Seleccione una opción</option>
				<?php foreach ($epss as $value): ?>
					<option  value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
			</select>
			</td>		
			<td><label for="promedio_notas">Promedio de notas</label></td>
			<td><input type="text" name="promedio_notas" placeholder="Media notas" pattern="[0-9]" title="Ingrese una expresión como esta: 4.5" id="promedio_notas" onchange="validarNumero()"></td>
			<td><label for="servicio_social">Servicio social</label></td>
			<td>
				<select  style="width: 200px" required="" name="servicio_social" id="">
						<option value="">Seleccione una opción</option>
						<option value="EN CURSO">EN CURSO</option>
						<option value="APROBADO">APROBADO</option>
						<option value="NO APROBADO">NO APROBADO</option>
						
				</select>
			</td>
		
		</tr>

		<tr>
			<td><label for="grado"></label>Grado que cursa:</td>
			<td>
				<select  style="width: 200px" required="" name="grado" id="">
						<option value="">Seleccione una opción</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
					
				</select>
			</td>
			<td><label for="condonacion_credito">Condonación credito:</label></td>
			<td><select  style="width: 200px" required="" name="condonacion_credito" id="">
					<option value="">Seleccione una opción</option>
					<option value="SI">SI</option>
					<option value="NO">NO</option>
			</select></td>
			<td><label for="colegio" title="Sede de la IEB">Sede(IEB)</label></td>
			<td>
				<select  style="width: 200px" required="" name="colegio" id="">
						<option value="">Seleccione una opción</option>
					<?php foreach ($colegio as $colegio): ?>
					<option value="<?php echo $colegio['id'] ?>"><?php echo $colegio['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>

		<tr>
			
			<td><label for="sisben">Sisben:</label></td>
			<td>
			<select  style="width: 200px" required="" name="sisben" id="">
					<option value="">Seleccione una opción</option>
					<option value="SI">SI</option>
					<option value="NO">NO</option>
			</select></td>
			<td><label for="zona">Zona:</label></td>
			<td>
				<select  style="width: 200px" required="" name="zona" id="">
						<option value="">Seleccione una opción</option>
					<?php foreach ($zona as $zona): ?>
					<option value="<?php echo $zona['id'] ?>"><?php echo $zona['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="genero">Genero</label></td>
			<td><select  style="width: 200px" required="" name="genero" id="">
					<option value="">Seleccione una opción</option>
					<option value="MASCULINO">MASCULINO</option>
					<option value="FEMENINO">FEMENINO</option>
				</select></td>
		</tr>


		<tr>
			<td><label for="estrato">Estrato:</label></td>
			<td>
			<select  style="width: 200px" required="" name="estrato" id="">
					<option value="">Seleccione una opción</option>
					<option value="1">1</option>	
					<option value="2">2</option>	
					<option value="3">3</option>	
					<option value="4">4</option>	
					<option value="5">5</option>	
			</select>
			</td>
			<td><label for="situacion_academica">Situacion academica:</label></td>
			<td>
				<select  style="width: 200px" required="" name="situacion_academica" id="">
						<option value="ACTIVO">ACTIVO</option>
						<!-- <option value="">Seleccione una opción</option>
						<option value="GRADUADO">GRADUADO</option>
						<option value="INACTIVO">INACTIVO</option> -->
				</select>
			</td>
			<td><label for="prioritaria">Población prioritaria:</label></td>
			<td>
				<select  style="width: 200px" required="" name="prioritaria" id="">
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
			</td>
		</tr>

		<tr>
			<td><label for="num_acta_grado">Numero acta de grado:</label></td>
			<td>
				<input type="text" name="num_acta_grado" placeholder="Acta de grado">
			</td>
			<td><label for="tipo_estrategia">Tipo estrategia:</label></td>
			<td>
				<select  style="width: 200px" required="" name="tipo_estrategia" id="">
					<option value="">Seleccione una opción</option>
					<?php foreach ($tipos_estrategia as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="muni_naci">Municipio de nacimiento:</label></td>
			<td>
			<select  style="width: 200px" required="" name="muni_naci" id="">
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
			</td>		
		</tr>

		<tr>
		</tr>
		<tr>
			<td><label for="estado_civil">Estado civil:</label></td>
			<td>
				<select  style="width: 200px" required="" name="estado_civil" id="">
					<option value="">Seleccione una opción</option>
					<option value="SOLTERO">SOLTERO</option>
					<option value="CASADO">CASADO</option>
					<option value="UNION LIBRE">UNION LIBRE</option>
				</select>
			</td>
			<td><label for="foto">Selecciona una foto</label></td>
			<td><input type="file" id="foto" name="foto" ></td>
			<td><label for="lugar_servicio_social">Lugar servicio social</label></td>
			<td><input type="text" name="lugar_servicio_social" placeholder="Lugar servicio social"></td>
		</tr>


		<tr>
			<td><label for="puntage_sisben">Puntaje sisben</label></td>
			<td><input type="number" min="0" max="900" name="puntage_sisben" pattern="[0-9]" title="Ingrese solo numeros y decimales"></td>
			<td><label for="observacion:">Observación:</label></td>
			<td><textarea name="observacion" placeholder="Observaciones para el estudiante..." id="observacion" cols="30" rows="3" maxlength="110"></textarea></td>
		</tr>
		<!--DATOS ACUDIENTE-->
		<tr>
				<td width="100" style="background-color: #D7D3D3; display: inline-block;">Datos acudiente</td>
		</tr>
			
		<tr>
			<td><label for="documento_attendant">Documento acudiente</label></td>
			<td><input type="text" required="" name="documento_attendant"></td>
			<td><label for="first_name_attendant">Nombres acudiente</label></td>
			<td><input type="text" required="" id="first_name_attendant" name="first_name_attendant"  placeholder="Nombres acudiente"></td>
			<td><label for="last_name_attendant:">Apellidos acudiente:</label></td>
			<td><input type="text" required="" name="last_name_attendant" placeholder="Apellidos acudiente" id="last_nameattendant"/></td>
		</tr>

		<tr>
			<td><label for="telephone_attendant">Telefono</label></td>
			<td><input type="text" id="telephone_attendant" name="telephone_attendant" placeholder="Telefono"></td>
			<td><label for="ocupation_attendant">Ocupación:</label></td>
			<td><input type="text" name="ocupation_attendant" placeholder="Ocupación" id="last_nameattendant" placeholder="Dirección"/></td>
		</tr>

		<tr>
		</tr>

		<!---->

		<tr>
			<td></td>
			<td><input type="reset" name=""></td>
			<td></td>
			<td><input type="submit" name="submit"  class="btn btn-primary" value="Guardar"></td>
		</tr>
		
		

	</table>
		<?php if (!empty($errores)): ?>
			<div class="input-redit alert error">
				<?php echo $errores;?>
			</div>
		<?php elseif($enviado): ?>
			<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>
		<?php endif ?>	

	</form>
	
</div>

<!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>					
<?php #require("piedepagina-admin.php") ?>

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
</script>