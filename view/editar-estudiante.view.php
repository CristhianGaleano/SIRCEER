<?php require 'cabecera-admin.php' ?>
<?php include_once "template-parts/menu-estudiantes.php" ?>	
<div class="formulario-editar-user">
	<div class="wra_titulo">
		<h1>EDITAR ESTUDIANTE</h1>
	</div>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<table>

			<input type="hidden" readonly="readonly" size="20" name="id" value="<?php echo $result['id']; ?>">
		<tr>
			<td><label>Documento</label></td>
			<td><input type="text" readonly="readonly" size="20" name="documento" value="<?php echo $result['documento']; ?>"></td>
			<td><label>Primer nombre</label></td>
			<td><input type="text" size="30" name="primer_nombre"  value="<?php echo $result['primer_nombre']; ?>"  placeholder="Primer nombre" required=""></td>
			<td><label>Segundo nombre</label></td>
			<td><input type="text" size="30" name="segundo_nombre"  value="<?php echo $result['segundo_nombre']; ?>"  placeholder="Segundo nombre" >	</td>
		</tr>
		
		<tr>
		
			<td><label>Primer apellido</label>	</td>
			<td><input type="text" size="30" name="primer_apellido" value="<?php echo $result['primer_apellido']; ?>"  placeholder="Primer apellido" required=""></td>
			<td><label>Segundo apellido</label></td>
			<td><input type="text" size="30" name="segundo_apellido" value="<?php echo $result['segundo_apellido']; ?>"  placeholder="Segundo apellido" required=""></td>
			<td><label>Telefono de contacto</label></td>
			<td><input type="text" size="30" name="tel_contacto" value="<?php echo $result['telefono_contacto']; ?>"  placeholder="Telefono de contacto"></td>
		</tr>


		<tr>
			<td><label>Email</label></td>
			<td><input type="email" size="30" name="email"  value="<?php echo $result['email']; ?>"  placeholder="Email" required=""></td>
			<td><label>Fecha de nacimiento</label></td>
			<td><input type="date" <select style="width:220px" name="fecha_naci" step="1" min="1980-01-01" max="2025-12-31" value="<?php echo strstr($result['fecha_nacimiento']," ",true)?>" placeholder="Fecha de nacimiento"></td>
			<td><label>Edad</label></td>
			<td><input type="number" name="edad" placeholder="Edad: 10-35" min="10" max="35" required="" value="<?php echo $result['edad'];?>"></td>
		</tr>

		<tr>
			<td><label>Municipio de residencia</label></td>
			<td><select <select style="width:220px" name="muni_resi" id="municipio">
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
		</select></td>
			<td><label for="eps">EPS:</label></td>
			<td><select <select style="width:220px" name="eps" id="eps">
					<?php foreach ($epss as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['eps_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
		</select></td>
			<td><label for="fecha_inicio">Fecha de inicio</label></td>
			<td><input type="date" name="fecha_inicio" step="1" min="1980-01-01" max="2030-12-31" value="<?php echo strstr($result['fecha_inicio']," ",true)?>" placeholder="Fecha de inicio"></td>
		</tr>

		<tr>
			<td><label for="fecha_fin">Fecha fin</label></td>
			<td><input type="date" name="fecha_fin" step="1" min="1980-01-01" max="2030-12-31" value="<?php echo strstr($result['fecha_fin']," ",true) ?>" placeholder="Fecha de inicio"></td>
			<td><label for="media_notas">Promedio notas</label></td>
			<td><input type="number" name="media_notas" value="<?php echo $result['media_notas'] ?>"></td>
			<td><label for="servicio_social">Servicio social</label></td>
			<td>
				<select <select style="width:220px" name="servicio_social" id="">
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
			</td>
		</tr>

		<tr>
			<td><label for="grado"></label>Grado que cursa:</td>
			<td>
				<select <select style="width:220px" name="grado" id="">
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
			</td>
			<td><label for="colegio">Colegio</label></td>
			<td>
				<select <select style="width:220px" name="colegio" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($instituciones as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['sede_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
			</select></td>
			<td><label for="condonacion_credito">Condonacion credito</label></td>
			<td>
				<select name="condonacion_credito">
					<option value="SI" <?php if ($result['condonacion_credito'] == 'SI'): echo "selected "; endif ?>>SI</option>
					<option value="NO" <?php if ($result['condonacion_credito'] == 'NO'): echo "selected "; endif ?>>NO</option>
				</select>
			</td>
		</tr>

		<tr>
			
		
			<td><label for="sisben">Sisben</label></td>
			<td>
				<select name="sisben">
					<option value="SI" <?php if ($result['siben'] == 'SI'): echo "selected "; endif ?>>SI</option>
					<option value="NO" <?php if ($result['siben'] == 'NO'): echo "selected "; endif ?>>NO</option>
				</select>
			</td>
			<td><label for="puntage_sisben">Puntaje sisben:</label></td>
			<td>
				<input type="number" name="puntage_sisben" value="<?php echo $result['puntaje_sisben'] ?>">
			</td>
			<td><label for="genero">Genero</label></td>
			<td><select <select style="width:220px" name="genero" id="">
					<option value="MASCULINO" <?php if ($result['genero'] == 'MASCULINO') {
						echo "selected";
					} ?> >MASCULINO</option>
					<option value="FEMENINO" <?php if ($result['genero'] == 'FEMENINO') {
						echo "selected";
					} ?> >FEMENINO</option>					
				</select></td>
		</tr>





		<tr>
			<td><label>Estrato</label>	</td>
			<td><select <select style="width:220px" name="estrato" id="">
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
				</select></td>

			<td><label for="situacion_academica">Situacion academica</label></td>
			<td><select <select style="width:220px" name="situacion_academica" id="">

					<option value="ACTIVO" <?php if ($result['estado'] == 'ACTIVO') {
						echo "selected";
					} ?> >ACTIVO</option>
					<option value="MATRICULADO" <?php if ($result['estado'] == 'MATRICULADO') {
						echo "selected";
					} ?> >MATRICULADO</option>
					<option value="INACTIVO" <?php if ($result['estado'] == 'INACTIVO') {
						echo "selected";
					} ?> >INACTIVO</option>
					<option value="GRADUADO" <?php if ($result['estado'] == 'GRADUADO') {
						echo "selected";
					} ?> >GRADUADO</option>
			</select></td>
		

			<td><label for="prioritaria">Población prioritaria:</label></td>
			<td>
				<select  style="width: 200px" required="" name="prioritaria" id="">
							<option value="">Seleccione una opción</option>
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
			</td>
		</tr>
		
		
		<tr>
			<td><label>Zona</label></td>
			<td><select <select style="width:220px"  name="zona" id="zona">
					<?php foreach ($zonas as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['zona_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
		</select></td>
		<td><label for="tipo_documento">Tipo de documento:</label></td>
			<td>
				<select <select style="width:220px" name="tipo_documento" id="">
					<option value="C.C: CEDULA DE CIUDADANIA" <?php if ($result['tipo_doc'] == 'C.C: CEDULA DE CIUDADANIA') {
						echo "selected";
					} ?> >CC: CEDULA DE CIUDADANIA</option>
					<option value="T.I: TARJETA DE IDENTIDAD" <?php if ($result['tipo_doc'] == 'T.I: TARJETA DE IDENTIDAD') {
						echo "selected";
					} ?> >T.I: TARJETA DE IDENTIDAD</option>
				</select>
			</td>
			<td><label for="tipo_estrategia">Estrategia:</label></td>
			<td>
				<select <select style="width:220px" name="tipo_estrategia" id="">
					<?php foreach ($tipos_estrategias as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['tipo_estrategia_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>

		<tr>
		<td><label for="lugar_servicio_social">Lugar servicio social</label></td>
		<td><input type="text" name="lugar_servicio_social" value="<?php echo $result['lugar_servicio_social'] ?>">
		</td>	
		

			<td><label>Municipio de nacimiento</label></td>
	<td><select <select style="width:220px" name="muni_naci" id="municipio">
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
		</select></td>
		<td><label for="num_acta_grado">Acta de grado</label></td>
		<td><input type="text" name="num_acta_grado" value="<?php echo $result['num_acta_grado']; ?>"></td>
		</tr>

		<tr>
		<td><label for="estado_civil">Estado civil</label></td>
			<td><select <select style="width:220px" name="estado_civil" id="estado_civil">
				<option value="SOLTERO" <?php if ($result['estado_civil'] == 'SOLTERO' ) {
					echo "selected";
				} ?> >SOLTERO</option>
				<option value="CASADO" <?php if ($result['estado_civil'] == 'CASADO' ) {
					echo "selected";
				} ?> >CASADO</option>
				<option value="UNION LIBRE" <?php if ($result['estado_civil'] == 'UNION LIBRE' ) {
					echo "selected";
				} ?> >UNION LIBRE</option>
		</select></td>
			<td><label for="observacion:">Observación:</label></td>
			<td>
				<textarea name="observacion" rows="4" cols="50"><?php echo $result['observacion'] ?></textarea>
			</td>
			<td><label for="dire_resi">Dirección de residencia</label></td>
			<td><input type="text" name="dire_resi" value="<?php echo $result['direccion_residencia'] ?>"></td>
		</tr>


		<?php if (!empty($errores)): ?>
			<div class="input-redit alert error">
				<?php echo $errores;?>
			</div>	
		<?php elseif($enviado): ?>
			<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>
		<?php endif ?>
		

		<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><input type="submit" name="submit" class="btn btn-primary" value="Guardar"></td>
		</tr>
		</table>
	</form>
</div>
<?php #require 'piedepagina-admin.php' ?>


