<?php require 'cabecera-admin.php' ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo URL ?>gestion/buscar-estudiantes.php">Listado</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
  </ol>
</nav>
		<div class="row main_wraper">
    <div class="col-lg-12">
		  	<h3 class="titulo">Editando estudiante</h3>
		  </div>
	</div>

<div class="row main_wraper">
<form id="form-editar-estudiante" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <div class="col-lg-12">
	<input type="hidden" readonly="readonly" name="id" value="<?php echo $result['id']; ?>">
		<div class="form-group col-lg-3 float-lg-left">
			<label>Documento</label>
			<input class="form-control" type="text" readonly="readonly" name="documento" value="<?php echo $result['documento']; ?>">
		</div>
		<div class="form-group col-lg-3 float-lg-left">
			<label>Primer nombre</label>
			<input class="form-control" type="text"  name="primer_nombre"  value="<?php echo $result['primer_nombre']; ?>"  placeholder="Primer nombre" required="">
		</div>
		<div class="form-group col-lg-3 float-lg-left">
			<label>Segundo nombre</label>
			<input class="form-control" type="text"  name="segundo_nombre"  value="<?php echo $result['segundo_nombre']; ?>"  placeholder="Segundo nombre" >	
		</div>
		<div class="form-group col-lg-3 float-lg-left">
			<label>Primer apellido</label>	
			<input class="form-control" type="text"  name="primer_apellido" value="<?php echo $result['primer_apellido']; ?>"  placeholder="Primer apellido" required="">
		</div>
		<div class="form-group col-lg-3 float-lg-left">
			<label>Segundo apellido</label>
			<input class="form-control" type="text"  name="segundo_apellido" value="<?php echo $result['segundo_apellido']; ?>"  placeholder="Segundo apellido" required="">
		</div>
		<div class="form-group col-lg-3 float-lg-left">
			<label>Telefono de contacto</label>
			<input class="form-control" type="text"  name="tel_contacto" value="<?php echo $result['telefono_contacto']; ?>"  placeholder="Telefono de contacto">
		</div>
		<div class="form-group col-lg-3 float-lg-left">
			<label>Email</label>
			<input class="form-control" type="email"  name="email"  value="<?php echo $result['email']; ?>"  placeholder="Email" required="">
		</div>
		<div class="form-group col-lg-3 float-lg-left">
			<label>Fecha de nacimiento</label>
			<input class="form-control" type="date" name="fecha_naci" step="1" min="1980-01-01" max="2025-12-31" value="<?php echo strstr($result['fecha_nacimiento']," ",true)?>" placeholder="Fecha de nacimiento">
		</div>
		<div class="form-group col-lg-3 float-lg-left">
			<label>Edad</label>
			<input class="form-control" type="number" name="edad" placeholder="" min="10" max="35" required="" value="<?php echo $result['edad'];?>">
		</div>
		<div class="form-group col-lg-3 float-lg-left">
			<label>Municipio de residencia</label>
			 <select class="form-control" style="width:220px" name="muni_resi" id="municipio">
			 	<option value="#">Sin seleccionar</option>
	<option value="APIA" <?php if ($result['muni_naci'] == 'APIA') {
		echo "selected";
	} ?> >APIA</option>
	<option value="BALBOA" <?php if ($result['muni_naci'] == 'BALBOA') {
		echo "selected";
	} ?> >BALBOA</option>
	<option value="BELEN DE UMBRIA" <?php if ($result['muni_naci'] == 'BELEN  DE UMBRIA') {
		echo "selected";
	} ?> >BELEN</option>
	<option value="DOSQUEBRADAS" <?php if ($result['muni_naci'] == 'DOSQUEBRADAS') {
		echo "selected";
	} ?> >DOSQUEBRADAS</option>
	<option value="GUATICA" <?php if ($result['muni_naci'] == 'GUATICA') {
		echo "selected";
	} ?> >GUATICA</option>
	<option value="LA CELIA" <?php if ($result['muni_naci'] == 'LA CELIA') {
		echo "selected";
	} ?> >LA CELIA</option>
	<option value="LA VIRGINIA" <?php if ($result['muni_naci'] == 'VIRGINIA') {
		echo "selected";
	} ?> >LA VIRGINIA</option>
	<option value="MARSELLA" <?php if ($result['muni_naci'] == 'MARSELLA') {
		echo "selected";
	} ?> >MARSELLA</option>
	<option value="MISTRATO" <?php if ($result['muni_naci'] == 'MISTRATO') {
		echo "selected";
	} ?> >MISTRATO</option>
	<option value="PEREIRA" <?php if ($result['muni_naci'] == 'PEREIRA') {
		echo "selected";
	} ?> >PEREIRA</option>
	<option value="PUEBLO RICO" <?php if ($result['muni_naci'] == 'PUEBLO RICO') {
		echo "selected";
	} ?> >PUEBLO RICO</option>
	<option value="QUINCHIA" <?php if ($result['muni_naci'] == 'QUINCHIA') {
		echo "selected";
	} ?> >QUINCHIA</option>
	<option value="SANTA ROSA DE CABAL" <?php if ($result['muni_naci'] == 'SANTA ROSA DE CABAL') {
		echo "selected";
	} ?> >SANTA ROSA DE CABAL</option>
	<option value="SANTUARIO" <?php if ($result['muni_naci'] == 'SANTUARIO') {
		echo "selected";
	} ?> >SANTUARIO</option>
	<option value="NUCLEO 21" <?php if ($result['muni_naci'] == 'NUCLEO 21') {
		echo "selected";
	} ?> >NUCLEO 21</option>
		</select>
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="eps">EPS</label>
			<select class="form-control" name="eps" id="eps">
					<?php foreach ($eps as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['eps_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
		</select>	
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="fecha_inicio">Fecha de inicio</label>
			<input class="form-control" type="date" name="fecha_inicio" step="1" min="1980-01-01" max="2030-12-31" value="<?php echo strstr($result['fecha_inicio']," ",true)?>" placeholder="Fecha de inicio">
		</div>
			
		<div class="form-group col-lg-3 float-lg-left">
			<label for="fecha_fin">Fecha fin</label>
			<input class="form-control" type="date" name="fecha_fin" step="1" min="1980-01-01" max="2030-12-31" value="<?php echo strstr($result['fecha_fin']," ",true) ?>" placeholder="Fecha de fin">
		</div>

		<!--<div class="form-group col-lg-3 float-lg-left">
			<label for="media_notas">Promedio notas</label>
			<input class="form-control" type="number" name="media_notas" value="<?php echo $result['media_notas'] ?>">
		</div>-->
		
		<div class="form-group col-lg-3 float-lg-left">
			<label for="servicio_social">Servicio social</label>
			
				<select class="form-control" name="servicio_social" id="">
					<option value="#">Sin seleccionar</option>
					<option value="EN CURSO" <?php if ($result['servicio_social'] == 'EN CURSO') {
						echo "selected";
					} ?> >EN CURSO</option>
					<option value="APROBADO" <?php if ($result['servicio_social'] == 'APROBADO') {
						echo "selected";
					} ?> >APROBADO</option>
					<option value="NO APROBADO" <?php if ($result['servicio_social'] == 'NO APROBADO') {
						echo "selected";
					} ?> >NO APROBADO</option>
				</select>
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="grado"></label>Grado que cursa:
			
				<select class="form-control" name="grado" id="">
					<option value="#">Sin seleccionar</option>
						<option value="9" <?php if ($result['grado'] == '9') {
						echo "selected";
					} ?> >9</option>
					<option value="10" <?php if ($result['grado'] == '10') {
						echo "selected";
					} ?> >10</option>
					<option value="11" <?php if ($result['grado'] == '11') {
						echo "selected";
					} ?> >11</option>
				</select>
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="colegio">Colegio</label>
			
				<select class="form-control" name="colegio" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($instituciones as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['sede_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
			</select>
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="condonacion_credito">Condonacion credito</label>
			
				<select class="form-control" name="condonacion_credito">
					<option value="SI" <?php if ($result['condonacion_credito'] == 'SI'): echo "selected "; endif ?>>SI</option>
					<option value="NO" <?php if ($result['condonacion_credito'] == 'NO'): echo "selected "; endif ?>>NO</option>
				</select>
		</div>
		
		<div class="form-group col-lg-3 float-lg-left">
			<label for="sisben">Sisben</label>
			
				<select class="form-control" name="sisben">
					<option value="#">Sin seleccionar</option>
					<option value="SI" <?php if ($result['siben'] == 'SI'): echo "selected "; endif ?>>SI</option>
					<option value="NO" <?php if ($result['siben'] == 'NO'): echo "selected "; endif ?>>NO</option>
				</select>
		</div>
		
		<div class="form-group col-lg-3 float-lg-left">
			<label for="puntage_sisben">Puntaje sisben:</label>
			<input class="form-control" type="number" name="puntage_sisben" value="<?php echo $result['puntaje_sisben'] ?>">
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="genero">Genero</label>
			<select class="form-control" name="genero" id="">
					<option value="#">Sin seleccionar</option>
					<option value="MASCULINO" <?php if ($result['genero'] == 'MASCULINO') {
						echo "selected";
					} ?> >MASCULINO</option>
					<option value="FEMENINO" <?php if ($result['genero'] == 'FEMENINO') {
						echo "selected";
					} ?> >FEMENINO</option>					
				</select>
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label>Estrato</label>	
			<select class="form-control" name="estrato" id="">
					<option value="#">Sin seleccionar</option>
					<option value="1" <?php if ($result['estrato'] == '1') {
						echo "selected";
					} ?> >1</option>
					<option value="2" <?php if ($result['estrato'] == '2') {
						echo "selected";
					} ?> >2</option>
					<option value="3" <?php if ($result['estrato'] == '3') {
						echo "selected";
					} ?> >3</option>
					<option value="4" <?php if ($result['estrato'] == '4') {
						echo "selected";
					} ?> >4</option>
					<option value="5" <?php if ($result['estrato'] == '5') {
						echo "selected";
					} ?> >5</option>
				</select>
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="situacion_academica">Situacion academica</label>
			<select class="form-control" name="situacion_academica" id="">
					<option value="#">Sin seleccionar</option>
					<option value="MATRICULADO" <?php if ($result['estado'] == 'MATRICULADO') {
						echo "selected";
					} ?> >MATRICULADO</option>
					<option value="INACTIVO" <?php if ($result['estado'] == 'INACTIVO') {
						echo "selected";
					} ?> >INACTIVO</option>
					<option value="GRADUADO" <?php if ($result['estado'] == 'GRADUADO') {
						echo "selected";
					} ?> >GRADUADO</option>
			</select>
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="prioritaria">Población prioritaria</label>
			
				<select  class="form-control" required="" name="prioritaria" id="">
							<option value="#">Sin seleccionar</option>
							<option value="DISCAPACITADO" <?php if ($result['prioritaria'] == "DISCAPACITADO"): ?>
								<?php echo "selected" ?>
							<?php endif ?> >DISCAPACITADO</option>
							<option value="VICTIMA" <?php if ($result['prioritaria'] == "VICTIMA"): ?>
								<?php echo "selected" ?>
							<?php endif ?> >VICTIMA</option>
							<option value="INDIGENA" <?php if ($result['prioritaria'] == "INDIGENA"): ?>
								<?php echo "selected" ?>
							<?php endif ?> >INDIGENA</option>
							<option value="AFROCOLOMBIANO" <?php if ($result['prioritaria'] == "AFROCOLOMBIANO"): ?>
								<?php echo "selected" ?>
							<?php endif ?> >AFROCOLOMBIANO</option>
							<option value="RAIZALES" <?php if ($result['prioritaria'] == "RAIZALES"): ?>
								<?php echo "selected" ?>
							<?php endif ?> >RAIZALES</option>
							<option value="ROM" <?php if ($result['prioritaria'] == "ROM"): ?>
								<?php echo "selected" ?>
							<?php endif ?> >ROM</option>
							<option value="MUJER" <?php if ($result['prioritaria'] == "MUJER"): ?>
								<?php echo "selected" ?>
							<?php endif ?> >MUJER</option>
							<option value="LGTBI" <?php if ($result['prioritaria'] == "LGTBI"): ?>
								<?php echo "selected" ?>
							<?php endif ?> >LGTBI</option>
							<option value="REINTEGRADOS" <?php if ($result['prioritaria'] == "REINTEGRADOS"): ?>
								<?php echo "selected" ?>
							<?php endif ?> >REINTEGRADOS</option>
							<option value="MIGRANTES" <?php if ($result['prioritaria'] == "MIGRANTES"): ?>
								<?php echo "selected" ?>
							<?php endif ?> >MIGRANTES</option>
							<option value="OTRA" <?php if ($result['prioritaria'] == "OTRA"): ?>
								<?php echo "selected" ?>
							<?php endif ?> >OTRA</option>
							<option value="NINGUNO" <?php if ($result['prioritaria'] == "NINGUNO"): ?>
								<?php echo "selected" ?>
							<?php endif ?> >NINGUNO</option>
					</select>
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label>Zona</label>
			<select class="form-control"  name="zona" id="zona">
					<option value="#">Sin seleccionar</option>
					<?php foreach ($zonas as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['zona_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
		</select>
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="tipo_documento">Tipo de documento:</label>
			
				<select class="form-control" name="tipo_documento" id="">
					<option value="#">Sin seleccionar</option>
					<option value="C.C" <?php if ($result['tipo_doc'] == 'C.C') {
						echo "selected";
					} ?> >CC</option>
					<option value="T.I" <?php if ($result['tipo_doc'] == 'T.I') {
						echo "selected";
					} ?> >T.I</option>
				</select>
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="tipo_estrategia">Estrategia:</label>
			
				<select class="form-control" name="tipo_estrategia" id="">
					<option value="#">Sin seleccionar</option>
					<?php foreach ($tipos_estrategias as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['tipo_estrategia_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="lugar_servicio_social">Lugar servicio social</label>
		<input  class="form-control" type="text" name="lugar_servicio_social" value="<?php echo $result['lugar_servicio_social'] ?>">
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label>Municipio de nacimiento</label>
	<select class="form-control" name="muni_naci" id="municipio">
		<option value="#">Sin seleccionar</option>
			<option value="APIA" <?php if ($result['muni_naci'] == 'APIA') {
		echo "selected";
	} ?> >APIA</option>
	<option value="BALBOA" <?php if ($result['muni_naci'] == 'BALBOA') {
		echo "selected";
	} ?> >BALBOA</option>
	<option value="BELEN DE UMBRIA" <?php if ($result['muni_naci'] == 'BELEN') {
		echo "selected";
	} ?> >BELEN</option>
	<option value="DOSQUEBRADAS" <?php if ($result['muni_naci'] == 'DOSQUEBRADAS') {
		echo "selected";
	} ?> >DOSQUEBRADAS</option>
	<option value="GUATICA" <?php if ($result['muni_naci'] == 'GUATICA') {
		echo "selected";
	} ?> >GUATICA</option>
	<option value="LA CELIA" <?php if ($result['muni_naci'] == 'CELIA') {
		echo "selected";
	} ?> >LA CELIA</option>
	<option value="LA VIRGINIA" <?php if ($result['muni_naci'] == 'VIRGINIA') {
		echo "selected";
	} ?> >LA VIRGINIA</option>
	<option value="MARSELLA" <?php if ($result['muni_naci'] == 'MARSELLA') {
		echo "selected";
	} ?> >MARSELLA</option>
	<option value="MISTRATO" <?php if ($result['muni_naci'] == 'MISTRATO') {
		echo "selected";
	} ?> >MISTRATO</option>
	<option value="PEREIRA" <?php if ($result['muni_naci'] == 'PEREIRA') {
		echo "selected";
	} ?> >PEREIRA</option>
	<option value="PUEBLO RICO" <?php if ($result['muni_naci'] == 'PUEBLO RICO') {
		echo "selected";
	} ?> >PUEBLO RICO</option>
	<option value="QUINCHIA" <?php if ($result['muni_naci'] == 'QUINCHIA') {
		echo "selected";
	} ?> >QUINCHIA</option>
	<option value="SANTA ROSA DE CABAL" <?php if ($result['muni_naci'] == 'SANTA ROSA DE CABAL') {
		echo "selected";
	} ?> >SANTA ROSA DE CABAL</option>
	<option value="SANTUARIO" <?php if ($result['muni_naci'] == 'SANTUARIO') {
		echo "selected";
	} ?> >SANTUARIO</option>
	<option value="NUCLEO 21" <?php if ($result['muni_naci'] == '21') {
		echo "selected";
	} ?> >NUCLEO 21</option>
		</select>
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="num_acta_grado">Acta de grado</label>
		<input class="form-control" type="text" name="num_acta_grado" value="<?php echo $result['num_acta_grado']; ?>">
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="estado_civil">Estado civil</label>
			<select class="form-control" name="estado_civil" id="estado_civil">
				<option value="#">Sin seleccionar</option>
				<option value="SOLTERO" <?php if ($result['estado_civil'] == 'SOLTERO' ) {
					echo "selected";
				} ?> >SOLTERO</option>
				<option value="CASADO" <?php if ($result['estado_civil'] == 'CASADO' ) {
					echo "selected";
				} ?> >CASADO</option>
				<option value="UNION LIBRE" <?php if ($result['estado_civil'] == 'UNION LIBRE' ) {
					echo "selected";
				} ?> >UNION LIBRE</option>
		</select>
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="dire_resi">Dirección de residencia</label>
			<input class="form-control" type="text" name="dire_resi" value="<?php echo $result['direccion_residencia'] ?>">
		</div>

		<div class="form-group col-lg-3 float-lg-left">
			<label for="observacion:">Observación:</label>
			<textarea class="form-control" name="observacion" rows="4" cols="50"><?php echo $result['observacion'] ?></textarea>
		</div>

		
		
		
									<div class="form-group col-lg-3 float-lg-left">
										 <button type="submit" class="btn btn-info"><i class="icon icon-edit"></i>Editar</button>
									</div>
	
		
	</div>
		</form>
						  


	

<?php require 'piedepagina-admin.php' ?>


