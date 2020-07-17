	<?php


function conteoMatriculas($cn){

	$sql = "SELECT COUNT(*) AS total FROM matriculas WHERE matriculas.estado='ACTIVO' AND matriculas.promedio=0.0";
	$ps=$cn->prepare( $sql );
	$ps->execute();
	$rs=$ps->fetch()['total'];
	return $rs;
}
function conteoForMatricular($cn){

	$sql = "SELECT COUNT(*) AS total FROM estudiantes WHERE estudiantes.estado='ACTIVO' OR estudiantes.estado='INACTIVO'";
	$ps=$cn->prepare( $sql );
	$ps->execute();
	$rs=$ps->fetch()['total'];
	return $rs;
}


function getDataAndSaldoEstudiante($doc,$cn)
{
	$sql = "
	SELECT estudiantes.documento, estudiantes.primer_nombre,estudiantes.segundo_nombre, estudiantes.primer_apellido, estudiantes.segundo_apellido ,sum(detalle_factura.valor) as saldo 
	FROM 
	estudiantes, matriculas, detalle_factura 
	WHERE 
	estudiantes.id=matriculas.estudiante_id AND matriculas.id=detalle_factura.id_matricula AND estudiantes.documento=$doc;
	";
	$ps = $cn->prepare($sql);
	$ps -> execute();
	$rs = $ps->fetch();
	// var_dump($rs);
	return $rs;
	
}
function getProgramaAndUniversidadNivelAcaAndJornada($id,$cn)
{
	$sql = "SELECT programas.snies,programas.nombre as programa,programas.cantidad_semestre,programas.costo_semestre,programas.nivel_academico,programas.jornada,universidades.nombre as universidad
	FROM programas,universidades 
	WHERE 
	programas.id=$id AND universidades.id=programas.universidad_id";
	$ps = $cn->prepare($sql);
	$ps -> execute();
	$rs = $ps->fetch();
	// var_dump($rs);
	return $rs;
	
}

	function cambiar_estado_estudiante($id,$cn){

		$sql = "UPDATE estudiantes SET estado='ACTIVO' WHERE estudiantes.id=$id";
		$ps=$cn->prepare($sql);
		$ps=$ps->execute();
		#echo 'Resultado change status:';
		#var_dump($ps);

	}


	function obtener_estado_estudiante($id,$cn){
		// echo "Id del estudiante: $id <br>";
		$sql = "SELECT estado  FROM estudiantes WHERE estudiantes.id=$id";
		$ps=$cn->prepare($sql);
		$ps->execute();
		$rs=$ps->fetch()['estado'];
		#echo 'Estado: ';
		#var_dump($rs);
		if ($rs!="MATRICULADO") {
			#echo 'No matriculado';
			return false;
		}

		return true;
	}

/**
 * [asignar_nota Despues de asignarse nota debe cambiar su estado a APORBADO O NO APROBADO, igualmente el es
 * estado del estudiante]
 * @param  [type] $id_matricula  [description]
 * @param  [type] $id_estudiante [description]
 * @param  [type] $promedio      [description]
 * @param  [type] $estado        [description]
 * @param  [type] $cn            [description]
 * @return [type]                [description]
 */
function asignar_nota($id_matricula,$id_estudiante,$promedio,$estado,$cn){


	#echo 'Entra asignar notas';

		if (obtener_estado_estudiante($id_estudiante,$cn))
		 {
			#echo 'Entra a estado';
			$sql = "UPDATE matriculas SET promedio=:promedio, estado=:estado WHERE id=:id";
			$ps = $cn->prepare($sql);
			$ps->bindParam(':promedio',$promedio);
			$ps->bindParam(':estado',$estado);
			$ps->bindParam(':id',$id_matricula);
			$rs = $ps->execute();
			#var_dump($rs);

			if ($rs) {
				cambiar_estado_estudiante($id_estudiante,$cn);
				return true;
			}
				return false; 	

		}

		return false;

}

function deleteInstitucion($id,$cn){


#Y finalmente institucion
$sql = "DELETE FROM instituciones WHERE id=:id";
$ps = $cn->prepare($sql);
$ps->bindParam(':id',$id);
$rs = $ps->execute();
#var_dump($rs);
	
	if ($rs) {
		return true;
	}
		return false;
	}


	/**
	 * Selecciona los estudiantes en los que su situacion academica sea ACTIVO, pues son los estudiantes que al menos ya iniciaron un programa académico.
	 * @param  $cn:conexion
	 * @return [type]        [description]
	 */
	function paraMatricular($cn)
	{
		$sql = "SELECT estudiantes.primer_nombre, estudiantes.segundo_nombre, estudiantes.primer_apellido, estudiantes.segundo_apellido, estudiantes.documento, estudiantes.id, sedes.nombre AS sede
		 FROM estudiantes, sedes 
		WHERE estado='ACTIVO' OR estado='INACTIVO' AND estudiantes.sede_id=sedes.id";
		$ps = $cn->prepare($sql);
		$ps->execute();
		$rs=$ps->fetchAll();
		return $rs;
	}



	function deletePrograma($id,$cn){


		$sql = "DELETE FROM programas WHERE programas.id=:id";

		$ps = $cn->prepare($sql);
		$ps->bindParam(':id',$id);
		$result = $ps->execute();
		#echo "resul:".$result;
		#
		return  ($result) ? true : false;
	}

	function deleteEstudiante($id,$cn){

		$sql = "DELETE FROM estudiantes WHERE estudiantes.id=:id LIMIT 1";

	$ps = $cn->prepare($sql);
	$ps->bindParam(':id',$id);
	$rs = $ps->execute();

			#var_dump( $rs );
		if ($rs) {
			return true;
		}

		return false;

	}


	function add_alianza_universidad($alianza,$universidad,$cn)
	{
		$st = $cn->prepare("INSERT INTO universidad_alianza(universidad_id, alianza_id) VALUES (:universidad,:alianza)"
		);

		$st->bindParam(':universidad',$universidad);
		$st->bindParam(':alianza',$alianza);
		$rs=$st->execute();
		#echo "<br>SQL: <br>";
		#var_dump($rs);
		#var_dump($st);
		return ($rs!=false) ? true : false;

	}

	function add_alianza_sede($alianza,$sede,$cn){

		echo "Variables que recibe add_attendant:";
		echo "<br> $alianza,$sede </br>";

		$st = $cn->prepare("INSERT INTO sede_alianza (id_alianza, id_sede) VALUES (
			:alianza,:sede)"
		);

		$st->bindParam(':alianza',$alianza);
		$st->bindParam(':sede',$sede);
		$rs=$st->execute();
		#echo "<br>SQL: <br>";
		#var_dump($rs);
		#var_dump($st);
		return ($rs!=false) ? true : false;


	}

	function contarMayoresEstudiantes($cn){
	 		
		$sql = "SELECT COUNT(*) as total FROM estudiantes 
	WHERE edad >= 18";
		$ps = $cn->prepare($sql);
		$ps->execute();
		#var_dump($ps);
		$num = $ps->fetch()['total'];

		return $num;
	}

	function contarMenoresEstudiantes($cn){
	 		
		$sql = "SELECT COUNT(*) as total FROM estudiantes 
	WHERE edad < 18";
		$ps = $cn->prepare($sql);
		$ps->execute();
		#var_dump($ps);
		$num = $ps->fetch()['total'];

		return $num;
	}

	function calculador_edad($fecha_naci){

	#recordar que en el formato de ser anio-mes-dia
		$anio_actual = Date("Y");
		$anio_naci = substr($fecha_naci, 0,4);
		echo "$anio_naci";
		return $anio_actual - $anio_naci;
	}


	function add_attendant($documento,$name_attendant,$telephone_attendant,$ocupation_attendant,$cn){

		// echo "Variables que recibe add_attendant:";
		// echo "<br> $documento,$name_attendant,$telephone_attendant,$ocupation_attendant </br>";
		$sql = "INSERT INTO acudiente (documento,nombres,telefono,ocupacion) VALUES (
			:documento,:name_attendant,:telephone_attendant,:ocupation_attendant)";
		$st = $cn->prepare( $sql);

		$st->bindParam(':documento',$documento);
		$st->bindParam(':name_attendant',$name_attendant);
		$st->bindParam(':telephone_attendant',$telephone_attendant);
		$st->bindParam(':ocupation_attendant',$ocupation_attendant);
		$rs=$st->execute();
		// echo "<br>Dentro de add_attendant <br>";
		// var_dump($rs);
		return $cn->lastInsertId();


	}

	function consultarEstudiantesRangoEdad($desde,$hasta,$sede,$cn){
	 		
		$sql = "SELECT estudiantes.documento, estudiantes.primer_nombre,estudiantes.segundo_nombre,estudiantes.primer_apellido,estudiantes.segundo_apellido,estudiantes.edad
	FROM estudiantes
	WHERE estudiantes.edad>=$desde AND estudiantes.edad<=$hasta and estudiantes.sede_id=$sede";
		$ps = $cn->prepare($sql);
		$ps->execute();
		#var_dump($ps);
		$datos = $ps->fetchAll();

		return $datos;
	}



	function cuanto_propiedad_estudiante($tabla,$criterio,$value,$criterio_dos,$cn){
	 		
		$sql = "SELECT  SQL_CALC_FOUND_ROWS  * FROM $tabla WHERE $tabla.$criterio='".$value."' AND $tabla.sede_id=$criterio_dos;";
		$ps = $cn->prepare($sql);
		$ps->execute();
		// var_dump($ps);
		return $ps->fetchAll();

		
	}


	 function consultar_estudiAntes_propiedad($parameterUno,$parameterDos,$parameterTres,$parameterCuatro,$parameterCinco,$parameterSeis,$cn){
	 		
		$sql = "SELECT * FROM estudiantes WHERE estudiantes.genero='FEMENINO';";
		$ps = $cn->prepare($sql);
		$ps->execute();
		#var_dump($ps);
		$datos = $ps->fetchAll();

		return $datos;
	}


	function changeStateBill($bill,$cn){
	 		
		$sql = "UPDATE factura_estudiante SET  estado='0' WHERE numero='".$bill."' and estado='1'";
		$ps = $cn->prepare($sql);
		#var_dump($ps);
		$ps=$ps->execute();

		#var_dump($ps);
	}



	#Cuando se va a realizar el pago, pero se resta 
	function abonar_a_cartera($factura,$cn){

		$transacciones_buenas = 0;
		#echo "Tamaño:" . count($factura);

		for ($i=0; $i < count($factura) ; $i++) { 

			$sql = "UPDATE cartera_universidades,factura_estudiante SET cartera_universidades.valor=cartera_universidades.valor - ( SELECT factura_estudiante.valor FROM factura_estudiante WHERE factura_estudiante.numero='".$factura[$i]."' ),
			cartera_universidades.saldo=cartera_universidades.saldo - ( SELECT factura_estudiante.valor FROM factura_estudiante WHERE factura_estudiante.numero='".$factura[$i]."' )
			 WHERE cartera_universidades.id=factura_estudiante.id_cartera AND factura_estudiante.numero='".$factura[$i]."'";
			$ps = $cn->prepare($sql);
			#var_dump($ps);
			$rs = $ps->execute();
			changeStateBill($factura[$i],$cn);
			$transacciones_buenas = ($rs) ? $transacciones_buenas=$transacciones_buenas+1 : $transacciones_buenas ;
			#var_dump($rs);
		}

		return $transacciones_buenas;
	 	
	}

	 function total_facturas($cn){
	 		
		$sql = "SELECT sum(valor) as total_facturas FROM cartera_universidades";
		$ps = $cn->prepare($sql);
		$ps->execute();
		$datos = $ps->fetch()['total_facturas'];

		return $datos;
	}

	 function incrementar_consecutivo($cn){
	 		
		$sql = "UPDATE consecutivo_factura SET consecutivo=consecutivo+1";
		$ps = $cn->prepare($sql);
		$ps->execute();
	}

	 function consultar_consecutivo($cn){
	 		
		$sql = "SELECT consecutivo, prefijo FROM consecutivo_factura";
		$ps = $cn->prepare($sql);
		$ps->execute();
		$datos = $ps->fetch()['consecutivo'] +1;
		incrementar_consecutivo($cn);

		return $datos;
	}

	#Para actualizar cartera_universdiades(valor y saldo etc), luego de nuevo semestre, suma
	 function pasar_a_cartera($factura,$valor,$id_cartera,$cn){

	 	echo "Valores recbidos de pasar_a_cartera:";
	 	echo "$factura - $valor - $id_cartera";
		$sql = "UPDATE cartera_universidades
		SET cartera_universidades.valor=cartera_universidades.valor + $valor, cartera_universidades.saldo=cartera_universidades.saldo + $valor
		 WHERE cartera_universidades.id=$id_cartera LIMIT 1";
		$ps = $cn->prepare($sql);
		#var_dump($ps);
		$rs = $ps->execute();
		#var_dump($rs);
	 	

	}



	function consultarFactEstu($cn){
		
		$sql = "SELECT * FROM factura_estudiante WHERE estado='1' ORDER BY numero DESC";
		$ps = $cn->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		#var_dump($rs);
		

		return $rs;
	}

	function  buscar_estudiantes_reportes(
			#$sede,
		#$municipio,
		#$edad_desde,
		#$edad_hasta,
		$genero,
		$tipo_documento,
		$zona,
		#$eps,
		#$situa_social,
		#$tipos_poblacion,
		#$estrategia,
		#$grado,
		#$discapacidad,
		$cn)
		{
			// reformular
		$sql = "
			SELECT estudiantes.documento, estudiantes.primer_nombre, estudiantes.segundo_nombre,estudiantes.primer_apellido,estudiantes.segundo_apellido, sedes.nombre AS sede, estudiantes.muni_naci,estudiantes.resi, zonas.nombre AS zona, estudiantes.tipo_doc, estudiantes.genero ,estudiantes.grado,eps.nombre AS eps, situaciones_sociales.nombre AS situacion_social, tipos_poblacion.nombre AS tipo_poblacion, tipos_estrategias.nombre AS tipo_estrategia, discapacidades.nombre AS discapacidad FROM estudiantes /*INNER JOIN matricula ON matricula.estudiante_id=estudiantes.id*/ INNER JOIN sedes ON sedes.id=estudiantes.sede_id INNER JOIN zonas ON zonas.id=estudiantes.zona_id INNER JOIN eps on eps.id=estudiantes.eps_id INNER JOIN situaciones_sociales ON situaciones_sociales.id=estudiantes.situacion_social_id INNER JOIN tipos_poblacion ON tipos_poblacion.id=estudiantes.tipo_poblaion_id INNER JOIN tipos_estrategias ON tipos_estrategias.id = estudiantes.tipo_estrategia_id 
	WHERE "; 
	$sql .= ( $genero==1 ) ? " estudiantes.genero_id>=1 AND estudiantes.genero_id<=3 OR " : " estudiantes.genero_id=$genero AND " ;
	     $sql .= ($tipo_documento == 1 ) ? " estudiantes.tipo_doc>=1 OR estudiantes.tipo_documento_id<=3 OR " : " estudiantes.tipo_documento_id=$tipo_documento AND " ;
	$sql .=      ($zona == 1 ) ? "  (estudiantes.zona_id>=1 OR estudiantes.zona_id<=3)" : " estudiantes.zona_id=$zona" ;
	/*
	$sql .=      (empty($eps) || $eps == "" ) ? "  estudiantes.eps_id=1 AND" : " estudiantes.eps_id=$eps AND" ;
	$sql .=      (empty($situa_social) || $situa_social == "" ) ? " estudiantes.situacion_social_id=1 AND" : " estudiantes.situacion_social_id=$situa_social AND" ;
	$sql .=      (empty($tipos_poblacion) || $tipos_poblacion == "" ) ? " estudiantes.tipo_poblaion_id=1 AND" : " estudiantes.tipo_poblaion_id=$tipos_poblacion AND";
	$sql .=      (empty($fuente_recurso) || $fuente_recurso == "" ) ? " estudiantes.fuenterecurso_id=1 AND" : " estudiantes.fuenterecurso_id=$fuente_recurso AND" ;
	$sql .=      (empty($estrategia) || $estrategia == "" ) ? " estudiantes.tipo_estrategia_id=1 AND" : " estudiantes.tipo_estrategia_id=$estrategia AND" ;
	$sql .=      (empty($grado) || $grado == "" ) ? " estudiantes.grado_id=1 AND" : " estudiantes.grado_id=$grado AND" ;
	$sql .=      (empty($color_ojos) || $color_ojos == "" ) ? " estudiantes.ojos_id=1 AND" : " estudiantes.ojos_id=$color_ojos AND" ;
	$sql .=      (empty($discapacidad) || $discapacidad == "" ) ? " estudiantes.discapacidad_id=1 AND" : " estudiantes.discapacidad_id=$discapacidad AND ";
	 $sql .= 
	 " estudiantes.edad  BETWEEN $edad_desde AND $edad_hasta";*/
		$ps = $cn->prepare($sql);
		$ps->execute();
		#echo "<br>**********CONSULTA*************<br>";
		#var_dump($ps);
		#echo "<br>**********FIN CONSULTA*************<br>";
		$rs = $ps->fetchAll();
		#echo "<br>---------<br>";
		#var_dump($rs);
		#echo "<br>-----FIN RESULTADOS----<br>";
		return $rs;
	}



	function existe_estudiante($doc,$cn){
		$estado = true;
		$sql = "SELECT * FROM estudiantes WHERE estudiantes.doc LIKE '%".$doc."%';";
		$ps = $cn->prepare($sql);
		$ps->execute();
		$rs = $ps->fetch();
		var_dump($rs);
		if($rs == false){
			echo "<br>No Hay coincidencia estudiante <br>";
			#var_dump($rs);
			#echo "<br>";
			$estado = false;
		}

		return $estado;
	}

	/**
	 * Busca si la existencia del estudiante 
	 */
	function buscar_estudiante($documento,$cn){

		$sql = "SELECT estudiantes.documento FROM estudiantes WHERE estudiantes.documento LIKE '%".$documento."%' LIMIT 1";
		$ps = $cn->prepare($sql);
		$ps->execute();
		$rs = $ps->fetch();
		echo "<br>Resultado busquedad<br>:";
		#var_dump($rs);
		if ($rs != false) {
			return true;
		}else{
			return false;
		}

	}

	function contarIstitucionesCalendario($calendario,$cn){
		$sql = "SELECT COUNT(*) AS total FROM instituciones WHERE instituciones.calendario LIKE '%".$calendario."%';";
		$ps = $cn->prepare($sql);
		$ps->execute();
		return $ps->fetch()['total'];
	}

	function getEstudiantesBySede($value,$cn)
	{
		$sql = "SELECT estudiantes.id AS id_estudiante,estudiantes.documento,estudiantes.primer_nombre,estudiantes.segundo_nombre,estudiantes.primer_apellido,estudiantes.segundo_apellido, sedes.nombre AS sede  FROM estudiantes,sedes WHERE estudiantes.sede_id = sedes.id AND sedes.id=$value ORDER BY estudiantes.id ASC";
		$ps = $cn->prepare($sql);
		$ps->execute();
		return $ps->fetchAll();
	}
/*
	function pagina_actual(){
		#echo "Pagina actual:";
		#var_dump($_GET);
		return isset($_GET['p']) ? (int)$_GET['p'] : 1;
	}

*/
	function obtener_sedes($cn){
		
		$ps = $cn->prepare("SELECT sedes.id AS id_sede, sedes.nombre AS sede, sedes.codigo_dane_sede,sedes.consecutivo AS consecutivo_sede, zonas.nombre AS zona, modelos.nombre AS modelo, sedes.municipio FROM sedes LEFT JOIN zonas ON sedes.zona_id=zonas.id LEFT JOIN modelos ON sedes.modelo_id=modelos.id");

		$ps->execute();


		return $ps->fetchAll();
	}


	function obtener_alianzas($cn){
		
		$ps = $cn->prepare("SELECT alianzas.id AS id_alianza,alianzas.nombre, alianzas.fecha_inicio,alianzas.fecha_final,alianzas.cupos FROM alianzas");
		$ps->execute();
		return $ps->fetchAll();
	}


	function obtener_universidades_reporte($cn){
		$ps = $cn->prepare("SELECT universidades.id AS id_universidad,universidades.nombre AS universidad, universidades.telefono,universidades.email,universidades.direccion, universidades.municipio, tipos_universidades.nombre AS tipo_uni  
	FROM universidades
		INNER JOIN tipos_universidades ON tipos_universidades.id=universidades.tipo_universidad_id");

		$ps->execute();


		return $ps->fetchAll();
	}

	function obtener_universidades($cn){
		


		$ps = $cn->prepare("SELECT universidades.id AS id_universidad,universidades.nombre AS universidad, universidades.telefono,universidades.email,universidades.direccion, universidades.municipio, tipos_universidades.nombre AS tipo_uni  
	FROM universidades
		INNER JOIN tipos_universidades ON tipos_universidades.id=universidades.tipo_universidad_id");

		$ps->execute();


		return $ps->fetchAll();
	}

// Obtiene todas las relaciones del programa
	function obtener_programa($cn){
		
		$ps = $cn->prepare("SELECT programas.id AS id_programa, programas.snies,programas.nombre AS name_programa, programas.cantidad_semestre AS num_semestres, programas.costo_semestre, programas.nivel_academico, universidades.nombre AS name_universidad,programas.jornada FROM programas LEFT JOIN universidades ON universidades.id=programas.universidad_id");

		$ps->execute();


		return $ps->fetchAll();
	}

	// function obtener_programas($programas_por_pagina,$cn){
	// 	$inicio = (pagina_actual() > 1) ? pagina_actual() * $programas_por_pagina - $programas_por_pagina : 0;


	// 	$ps = $cn->prepare("SELECT programas.id AS id_programa, programas.snies,programas.nombre AS name_programa, programas.cantidad_semestre AS num_semestres, programas.costo_semestre, nivel_academico.nombre AS nivel_academico,universidades.nombre AS name_universidad,jornadas.nombre AS jornada FROM programas LEFT JOIN nivel_academico ON nivel_academico.id=programas.nivel_academico_id LEFT JOIN universidades ON universidades.id=programas.universidad_id LEFT JOIN  jornadas ON jornadas.id=programas.jornada_id LIMIT $inicio, $programas_por_pagina");

	// 	$ps->execute();


	// 	return $ps->fetchAll();
	// }

	function obtener_instituciones($cn){
		


		$ps = $cn->prepare("SELECT instituciones.id AS id_institucion,instituciones.nombre AS name_institucion,instituciones.telefono,instituciones.calendario,instituciones.DANE,sectores.nombre AS sector,instituciones.municipio,zonas.nombre AS zona  FROM instituciones  
			LEFT JOIN sectores ON sectores.id=instituciones.sector_id 
			LEFT JOIN zonas ON zonas.id=instituciones.zona_id");

		$ps->execute();
		// var_dump($ps);

		return $ps->fetchAll();
	}

	function obtener_estudiante($cn){
		


		$ps = $cn->prepare(
			"SELECT  SQL_CALC_FOUND_ROWS estudiantes.id,estudiantes.documento AS doc_estudiante,estudiantes.primer_nombre,estudiantes.segundo_nombre,estudiantes.primer_apellido,estudiantes.segundo_apellido,estudiantes.edad, estudiantes.genero,estudiantes.grado,estudiantes.siben, estudiantes.estrato, estudiantes.telefono_contacto, zonas.nombre AS zona, estudiantes.estado,estudiantes.muni_naci,estudiantes.muni_resi, sedes.nombre AS sede, tipos_estrategias.nombre AS estrategia
			FROM estudiantes 
			LEFT JOIN zonas ON estudiantes.zona_id=zonas.id 
			LEFT JOIN sedes ON estudiantes.sede_id=sedes.id 
			LEFT JOIN tipos_estrategias ON estudiantes.tipo_estrategia_id=tipos_estrategias.id
			ORDER BY fecha_inicio DESC"
		);

		$ps->execute();


		return $ps->fetchAll();
	}


	// function numero_paginas($estudiantes_por_pagina,$name_bd,$cn){
	// 	$total_estudiantes = $cn->prepare("SELECT COUNT(*) AS total FROM $name_bd");
	// 	$total_estudiantes->execute();
	// 	$total_estudiantes = $total_estudiantes->fetch()['total'];
	// 	#echo "<br> 1. $total_estudiantes<br>";
	// 	#echo "<br> 2. $estudiantes_por_pagina<br>";
	// 	$numero_paginas = ceil($total_estudiantes / $estudiantes_por_pagina);
	// 	return $numero_paginas;
	// }

	function saveHistorialSemestre($semestre_id,$matricula_id,$estado,$cn)
	{

		$fecha_modificacion = Date("y-m-d-m:h:m:s");
		$anio = Date("Y");
		#echo "<br>Año: $anio<br>";
		#echo "<br>Estado: $estado<br>";
		#echo "<br>matricula: $matricula_id<br>";
		#echo "<br> Semestre: $semestre_id<br>";
		#echo "<br> Semestre: $fecha_modificacion<br>";

		$sql = "INSERT INTO historial_academico_semestre(  anio, fecha_modificacion, estado, matricula_id, semestre_id) VALUES (:anio,:fecha_modificacion,:estado,:matricula_id,:semestre_id)";

		$ps = $cn->prepare($sql);

		
		$ps->bindParam(':anio',$anio);
		$ps->bindParam(':fecha_modificacion',$fecha_modificacion);
		$ps->bindParam(':estado',$estado);
		$ps->bindParam(':matricula_id',$matricula_id);
		$ps->bindParam(':semestre_id',$semestre_id);
			

		$result = $ps->execute();



		if ($result) {
			return true;
		}else{
			return false;
		}
	}

	function saveSemestre($semestre,$periodo,$cn)
	{
		$sql = "INSERT INTO semestre(semestre, periodo) VALUES (:semestre,:periodo)";

		$ps = $cn->prepare($sql);

		$ps->bindParam(':semestre',$semestre);
		$ps->bindParam(':periodo',$periodo);

		$result = $ps->execute();

		if ($result) {
			return true;
		}else{
			return false;
		}

	}


	// #Sin utilizar
	// function saveMatriculaFromImport($estudiante_id,$programa_id,$year,$cn){
	// 	#fecha del ssitema
	// 	#echo "Entro a saveMatricula<br>";
	// 	$fecha = Date("y-m-d:h:m:s");
	// 	$anio = Date("Y");

	// 	$sql_matricula = "INSERT INTO matricula(fecha, estudiante_id, programa_id,anio) VALUES (:fecha,:estudiante_id,:programa_id,:anio)";

	// 	$ps = $cn->prepare($sql_matricula);

	// 	$ps->bindParam(':fecha',$fecha);
	// 	$ps->bindParam(':estudiante_id',$estudiante_id);
	// 	$ps->bindParam(':programa_id',$programa_id);
	// 	$ps->bindParam(':anio',$anio);

	// 	$result = $ps->execute();

	// 	#saveFacturaEstudiante($estudiante_id,$programa_id,$cn);



	// 	if ($result) {
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

	/**
	 * Para estado academico existen tres: 
	 * ACTIVO: Se encuentra en el sistema
	 * MATRICULADO: Para matricular debe estar activo.
	 * INACTIVO: Luego de estar matriculado se graduo o esta cancelado
	 */
	function saveMatricula($anio,$semestre,$periodo,$estudiante_id,$programa_id,$fecha,$cn){
		#fecha del ssitema
		#echo "Entro a saveMatricula<br>";
		#echo "variables recibidads: <br> $anio,$semestre,$estudiante_id,$programa_id";
		// Para la matricula o semestre
		$estado = "ACTIVO";
		
		

		$sql = "INSERT INTO matriculas( fecha, anio, semestre, periodo, estado,estudiante_id, programa_id) VALUES (:fecha,:anio,:semestre,:periodo,:estado,:estudiante_id,:programa_id)";

		$ps = $cn->prepare($sql);

		// echo "<br>Valores a insertar<br>";
		// echo ":fecha $fecha </br>";
		// echo ":anio $anio </br>";
		// echo ":semestre $semestre </br>";
		// echo ":periodo $periodo </br>";
		// echo ":estudiante_id $estudiante_id </br>";
		// echo ":programa_id $programa_id </br>";

		$ps->bindParam(':fecha',$fecha);
		$ps->bindParam(':anio',$anio);
		$ps->bindParam(':semestre',$semestre);
		$ps->bindParam(':periodo',$periodo);//Estado del semestre matriculado
		$ps->bindParam(':estado',$estado);
		//$ps->bindParam(':fecha_modificacion',$fecha_modificacion);//Duda
		$ps->bindParam(':estudiante_id',$estudiante_id);
		$ps->bindParam(':programa_id',$programa_id);
		
		$result = $ps->execute();
		// var_dump($result);

		$id_matricula = $cn->lastInsertId();
		$valor_programa = consultar_valor_programa($programa_id,$cn);
		$id_factura = saveFactura($cn);
		// cambia el estado del estudiante a matriculado
		update_estado_estudiante("MATRICULADO",$estudiante_id,$cn);
		saveDetalleFactura($id_matricula, $id_factura, $valor_programa,$cn);

		return  ($result) ? true : false ;
	}


	function consultar_valor_programa($programa,$cn){
		$sql = "SELECT costo_semestre FROM programas WHERE id=$programa";
		$ps=$cn->prepare($sql);
		$ps->execute();
		$rs=$ps->fetch()['costo_semestre'];
		return $rs;
	}

	
	function saveFactura($cn){

		// quitar consulta prefijo
		$consecutivo_factura = consultar_consecutivo($cn);
		$fecha = Date("Y-m-d");
		echo "<br> $fecha <br> $consecutivo_factura <br>";

		$sql = "INSERT INTO factura (consecutivo, fecha) VALUES (:consecutivo,:fecha)";
		$ps=$cn->prepare($sql);
		$ps->bindParam(':consecutivo',$consecutivo_factura);
		// $ps->bindParam(':cod_cliente',1);
		$ps->bindParam(':fecha', $fecha);
		$rs=$ps->execute();
		var_dump($rs);

		return $cn->lastInsertId();

	}

	function saveDetalleFactura($id_matricula, $id_factura, $valor,$cn){
		echo "<br>On sadetalle<br>";
		$sql = "INSERT INTO detalle_factura(id_matricula,id_factura, valor) VALUES (:id_matricula,:id_factura,:valor)";
		$ps=$cn->prepare($sql);
		$ps->bindParam(':id_matricula',$id_matricula);
		$ps->bindParam(':id_factura',$id_factura);
		$ps->bindParam(':valor', $valor);
		$rs=$ps->execute();

	}


	function update_estado_estudiante($estado,$estudiante_id,$cn){

		$sql = "UPDATE estudiantes SET estado='" . $estado . "' WHERE estudiantes.id='". $estudiante_id ."'";
		$ps = $cn->prepare($sql);
		// var_dump($ps);
		$ps=$ps->execute();
	// var_dump($ps);
	}

	

	function saveSede($nombre,$codigo_dane,$consecutivo,$zona,$modelo,$municipio,$cn){

		#echo "<br>Guardando sede...<br>";

		$sql = "INSERT INTO sedes(nombre, codigo_dane_sede, consecutivo, zona_id, modelo_id,municipio) VALUES (:nombre,:codigo_dane_sede,:consecutivo,:zona_id,:modelo_id,:municipio)";

		$stm = $cn->prepare($sql);

		$stm->bindParam(':nombre',$nombre);
		$stm->bindParam(':codigo_dane_sede',$codigo_dane);
		$stm->bindParam(':consecutivo',$consecutivo);
		$stm->bindParam(':zona_id',$zona);
		$stm->bindParam(':modelo_id',$modelo);
		// $stm->bindParam(':institucion_id',$institucion);
		$stm->bindParam(':municipio',$municipio);
		

		$result = $stm->execute();
		$id_sede = $cn->lastInsertId();
		// echo "<br>ID sede desde metodo: $id_sede";
		if ($result != false) {
			return true;
		}else{
			return false;
		}

	}

	/*Para insert intituciones*/
	function saveSchool($institucion,$calendario,$dane,$sector,$municipio,$cn){

		#echo "<br>Entro saveSchool<br> Valores variables recibidads: <br>
		#$institucion <br> $calendario <br> $dane <br> $sector <br> municipio: $municipio <br>";

		/*
		#Primero debemos conocer el municipio y obtener su id
		$row = getSubjectByValue('municipios',$municipio,'nombre',$cn);
		#var_dump($row);
		$municipio_id =  $row['id'];
	*/
		$sql = "INSERT INTO instituciones (nombre,calendario, DANE, sector_id,municipio_id) VALUES (:nombre,:calendario,:DANE,:sector_id,:municipio_id)";

		$stm = $cn->prepare($sql);

		$stm->bindParam(':nombre',$institucion);
		$stm->bindParam(':calendario',$calendario);
		$stm->bindParam(':DANE',$dane);
		$stm->bindParam(':sector_id',$sector);
		$stm->bindParam(':municipio_id',$municipio);

		#echo "Insertando escuela...";
		$estado = $stm->execute();
		#echo "<br> Valor de estado: ";
		#var_dump($estado);
		
		return  ($estado != false) ? $cn->lastInsertId() : 0 ;
	}

	function validarYregistrar($nameTable,$nameColumnUno,$nameColumnDos,$valueUno,$cn){
		$id = 0;
		$relacion = validarRegistro($nameTable,$nameColumnUno,$valueUno,$cn);
			if ( !empty( $relacion) || $relacion != "") {
				#Ya hay coincidencia
				#Obtener id para establecer relacion en BD
				echo "Encontro coincidencia";
				#buscar la coincidencia con la ciudad y obtiene su id
				$row = getSubjectByValue($nameTable,$valueUno,$nameColumnUno,$cn);
				#var_dump($row);
				$id = $row['id'];

				#echo "valor de last_id_estado <br>";
				#var_dump($last_id_estado);
				echo "<br>";
				#echo "$last_id_estado";
			}else
			{
				#echo "No hay coincidencias...";


				// switch ($nameTable) {
				// 	case 'municipios':
				// 	#Por ahora trae el id del unico de partamento
				// 	$valueDos = getId('departamentos',$cn);
					
				// 		break;
					
				// 	default:
				// 		$valueDos = "Descripcion por defecto";
				// 		break;
				// }

				#Do insert
				$do_registred = registrarRelacion($nameTable,$nameColumnUno,$nameColumnDos,$valueUno,$valueDos,$cn);
				#echo "<br>";
				#var_dump($do_registred);
				echo "<br>";
				if ($do_registred == false) {
					echo "Ocurrio un error al tratar de registrar $nameTable";
				}else{
				#Return last id
				$id = getId($nameTable,$cn);
					
				}



			}#End else

			return $id;

	}


	 function registrarRelacion($nameTable,$nameValueUno,$nameValueDos,$valueUno,$valueDos,$cn)
	{
		
		echo "<br>";
		echo $nameValueUno;
		echo $nameValueDos;
		echo $valueUno;
		echo $valueDos;
		
		echo "<br>";
		$sql = "INSERT INTO $nameTable ($nameValueUno,$nameValueDos) VALUES(?,?)";
		$preparado = $cn->prepare($sql);
		$preparado->bindParam(1,$valueUno);
		$preparado->bindParam(2,$valueDos);
		$state = $preparado->execute();
		var_dump($state);

		#con->lastInsertId(); //devuelve el id del ultimo registro insertado en esta conexion
		if ($state) {
			return true;
			#die();
		}else{
			return false;
			#die();
		}
	}


	#Validad si hay coincidencia, si es asi devuelve el id de la coincidencia
	function validarRegistro($nameTable,$nameColumn,$valor,$cn)
	{
		/*
		echo "<br>";
		echo "$nameTable <br>";
		echo "$nameColumn <br>";
		echo "$valor <br>";
		echo "<br>";
		*/

		#echo "<br>Ingresa a validarRegistro:<br>";

		$value = "";
		$sql = "SELECT * FROM $nameTable WHERE $nameColumn LIKE '%".$valor."%' LIMIT 1";	
		$stm = $cn->prepare($sql);
		$stm->execute();

		$rs = $stm->fetch();
		echo "<br>Valor de stm<br>";
		var_dump($stm);

		
		#echo "<br>";
		if ($rs != false) {
		#	echo "<br> Hay coincidencias <br>";
				#Sy hay coincidencas
			echo "<br>hay coincidencas<br>";
				#$row = getSubjectByValue($nameTable,$valor,$nameColumn,$cn);
				#var_dump($row);
				#id de la ENTIDAD donde el nombre coincide
				#echo "<br> Mostrando row: <br>";
				#var_dump($row);
				$value = $rs['id'];

		}

		#var_dump($stm);
		return $value;
	}



	function  getHistorialEstudiante($documento,$cn)
	{
		#echo "Matricula: $matricula";
		$sql = "SELECT matriculas.anio,matriculas.semestre,matriculas.periodo,matriculas.promedio,matriculas.estado AS estado_matricula, matriculas.fecha_modificacion FROM matriculas,estudiantes WHERE matriculas.estudiante_id=estudiantes.id AND estudiantes.documento=$documento";
		#var_dump($sql);
		$ps = $cn->prepare($sql);
		$ps->execute();
		$resul = $ps->fetchAll();
		#var_dump($resul);
		return $resul;

	}


	/**
	 * Description: Muestra el listado de matriculas actuales, es decir las que aun no tengan nota final
	 */
	function getAllMatriculas($cn)
	{
		// echo "Entro";
		// echo "Doc: $documento";
		// SELECCIONA LAS MATRICULAS QUE NO TENGAN NOTA Y QUE SU ESTADO SEA ACTIVO
		$sql = "SELECT matriculas.id ,matriculas.fecha,matriculas.semestre,estudiantes.id as id_estudiante, estudiantes.documento,estudiantes.primer_nombre, estudiantes.segundo_nombre,estudiantes.primer_apellido,programas.nombre as programa_nombre ,matriculas.periodo,matriculas.promedio,matriculas.estado 
		FROM 
		matriculas
		LEFT JOIN estudiantes ON matriculas.estudiante_id=estudiantes.id 
		LEFT JOIN programas ON matriculas.programa_id=programas.id 
		WHERE 
		matriculas.estado='ACTIVO'";
		#var_dump($sql);
		$ps = $cn->prepare($sql);
		$ps->execute();
		$resul = $ps->fetchAll();
		
		return  $resul;

	}

	/**
	 * Description: Obtiene la matricula actual
	 */
	function getAllMatricula($id,$cn)
	{
		// echo "Entro";
		// echo "Doc: $id";
		$sql = "
		SELECT 
matriculas.id ,matriculas.fecha,matriculas.fecha_modificacion,matriculas.semestre,estudiantes.id as id_estudiante, estudiantes.documento as documento_estudiante, estudiantes.fecha_inicio,estudiantes.primer_nombre, estudiantes.segundo_nombre,estudiantes.segundo_apellido, estudiantes.primer_apellido,estudiantes.segundo_apellido,programas.nombre as programa_nombre ,matriculas.periodo,matriculas.promedio,matriculas.estado, sedes.nombre as sede, universidades.nombre as universidad
		FROM 
		matriculas
		LEFT JOIN estudiantes ON matriculas.estudiante_id=estudiantes.id 
		LEFT JOIN programas ON matriculas.programa_id=programas.id 
		LEFT JOIN sedes ON estudiantes.sede_id=sedes.id
        LEFT JOIN universidades ON programas.universidad_id=universidades.id
		WHERE matriculas.estado='ACTIVO' AND matriculas.id=$id
		";
		#var_dump($sql);
		$ps = $cn->prepare($sql);
		$ps->execute();
		$resul = $ps->fetch();
		// echo "<br>Dato de buscar matricula:<br>";
		// var_dump($resul);
		return  $resul;

	}


	// function getProgramaAndInstitute($con)
	// {
	// 	$sql = "SELECT programa.snies,programa.nombre,programa.num_semestres,programa.num_creditos, institucion.nombre AS nombre_institucion FROM programa, institucion WHERE programa.institucion_id=institucion.id";
	// 	#var_dump($sql);
	// 	$ps = $con->prepare($sql);
	// 	$ps->execute();
	// 	$resul = $ps->fetchAll();
	// 	#var_dump($resul);
	// 	return $resul;

	// }

	function getMatriculaEstudiante($documento,$cn)
	{
		#Devuelve el id de la matricula
		$sql = "SELECT matricula.id FROM matricula WHERE matricula.estudiante_documento='".$documento."' LIMIT 1 ";
		#var_dump($sql);
		$ps=$cn->prepare($sql);
		$ps->execute();
		$result=$ps->fetch()['id'];
		#var_dump($result);
		return $result;	
	}

	function getDataAllEstudent($matricula,$cn)
	{
		$sql = "SELECT estudiante.documento,estudiante.primer_nombre,estudiante.segundo_nombre,estudiante.primer_apellido,estudiante.segundo_apellido,detalle_semestre.promedio,semestre.semestre,semestre.periodo,programa.snies,programa.nombre AS nombrePrograma,institucion.nombre AS nombreInstitucion,matricula.id AS matriculaId, semestre.id AS semestreId FROM matricula,estudiante, detalle_semestre, semestre,programa,institucion WHERE matricula.id
		=detalle_semestre.matricula_id AND detalle_semestre.semestre_id=semestre.id AND programa.snies=matricula.programa_snies AND programa.institucion_id=institucion.id AND estudiante.documento=matricula.estudiante_documento AND matricula.id=$matricula ORDER by detalle_semestre.semestre_id DESC LIMIT 1 ";
		#var_dump($sql);
		$ps=$cn->prepare($sql);
		$ps->execute();
		$result=$ps->fetch();
		#var_dump($result);
		return $result;	
	}

	function getIdmatricula($documento,$cn)
	{
		$sql = "SELECT  id FROM matricula WHERE estudiante_documento='$documento' LIMIT 1";
		#var_dump($sql);
		$ps=$cn->prepare($sql);
		$ps->execute();
		$result=$ps->fetch()['id'];
		#var_dump($result);
		return $result;
	}

	function contarEntity($tablaUno,$tablaDos,$criterioUno,$criterioDos,$value,$cn){
		$sql = "SELECT COUNT($tablaUno".".".$criterioUno.") AS total FROM ".$tablaUno." WHERE ".$tablaUno.".".$criterioUno."= (SELECT id FROM ".$tablaDos." WHERE ".$tablaDos.".".$criterioDos." LIKE '".$value."')";
		#var_dump($sql);
		$ps=$cn->prepare($sql);
		$ps->execute();
		$result=$ps->fetch()['total'];
		$result = (integer) $result;
		#var_dump($result);
		return $result;
	}

	/*Cambiarla*/
	function cuantos_objetos_atributo($tablaUno,$criterioUno,$value,$cn){
		$sql = "SELECT COUNT($tablaUno".".".$criterioUno.") AS total FROM ".$tablaUno." WHERE ".$tablaUno.".".$criterioUno." LIKE '".$value."'";
		#var_dump($sql);
		$ps=$cn->prepare($sql);
		$ps->execute();
		$result=$ps->fetch()['total'];
		$result = (integer) $result;
		#var_dump($result);
		return $result;
	}

	function countEntityWithWhere($tabla,$criterio,$valor,$cn){
		$sql = "SELECT COUNT($criterio) AS total FROM $tabla WHERE $criterio='$valor'";
		#var_dump($sql);
		$ps=$cn->prepare($sql);
		$ps->execute();
		$result=$ps->fetch()['total'];
		$result = (integer) $result;
		#var_dump($result);
		return $result;
	}

	function countEntityWithOutWhere($tabla,$cn){
		$sql = "SELECT COUNT(*) AS total FROM $tabla";
		$ps=$cn->prepare($sql);
		$ps->execute();
		$result=$ps->fetch()['total'];
		#var_dump($result);
		$result = (integer) $result;
		#var_dump($result);
		return (int)$result;
	}

	function saveAlianza(
		$nombre,$fecha_ini,$fecha_final,$cupos,$cn
	)
	{

		$fecha_sistema = Date("YY-mm-dd");
		
		try {
				//var_dump($conexion);
			$sql = "INSERT INTO alianzas (nombre,fecha_inicio,fecha_final,cupos) VALUES(  :nombre,:fecha_ini,:fecha_fina,:cupos)";

			$statement = $cn->prepare($sql);
			$statement->bindParam( ':nombre' , $nombre);
			$statement->bindParam( ':fecha_ini' , $fecha_ini);
			$statement->bindParam( ':fecha_fina' , $fecha_final);
			$statement->bindParam( ':cupos' , $cupos);
			
			$result= $statement->execute();
			#var_dump($result);





			if ($result != false) {
				return true;
			}else{
				return false;
			}


		} catch (Exception $e) {
			echo "Linea de error: ".$e->getMessage();	
		}
				//echo "ejecuto el metodo";
	}


	function getAllAlianzaRelations($id,$con)
	{
		#Trae todos los campos de todas las tablas que tienen relacion con la alianza por medio de id = ...
		#Utilizada por ver-alianza
		$sql="SELECT alianza.id AS id_alianza, alianza.nombre AS nombreAlianza,alianza.fecha_inicio,alianza.fecha_final, alianza.cupos, institucion.id AS id_institucion, institucion.nombre AS nombre_institucion,institucion.email AS email_institucion FROM alianza INNER JOIN institucion ON alianza.id=institucion.alianza_id WHERE alianza.id=$id";

		$ps = $con->prepare($sql);
		$ps->execute();
		$result = $ps->fetchAll();
		#var_dump($result);
		return $result;	
	}


	function getSedesTodasRelaciones($con)
	{
		#Trae todos los campos de todas las tablas que tienen relacion con el estudiante con documento = ...
		#Utilizada por ver-estudiante, gestionar-estudiante
		$sql="SELECT sedes.nombre as sede, sedes.codigo_dane_sede, sedes.consecutivo, sedes.municipio,
		zonas.nombre as zona,modelos.nombre as modelo,instituciones.nombre as institucion 
		FROM sedes 
		INNER JOIN zonas ON sedes.zona_id=zonas.id
		INNER JOIN modelos ON sedes.modelo_id=modelos.id
		INNER JOIN instituciones ON sedes.institucion_id=instituciones.id";

		$ps = $con->prepare($sql);
		$ps->execute();
		$result = $ps->fetchAll();
		#var_dump($result);
		return $result;	
	}

	function getAllStudentRelations($documento,$con)
	{
		#Trae todos los campos de todas las tablas que tienen relacion con el estudiante con documento = ...
		#Utilizada por ver-estudiante, gestionar-estudiante
		$sql="SELECT 
		estudiantes.id,estudiantes.documento AS documento_estudiante, estudiantes.primer_nombre,estudiantes.segundo_nombre,estudiantes.primer_apellido,estudiantes.segundo_apellido,estudiantes.email, estudiantes.fecha_nacimiento,estudiantes.edad,estudiantes.direccion_residencia, estudiantes.estrato,estudiantes.fecha_inicio,estudiantes.fecha_fin, estudiantes.telefono_contacto, estudiantes.observacion, estudiantes.foto, estudiantes.num_acta_grado, estudiantes.media_notas, estudiantes.condonacion_credito, estudiantes.siben, estudiantes.puntaje_sisben, estudiantes.lugar_servicio_social ,estudiantes.tipo_doc, estudiantes.genero, estudiantes.estado,estudiantes.servicio_social,estudiantes.grado,estudiantes.muni_naci,estudiantes.muni_resi, estudiantes.prioritaria,
		eps.nombre AS eps,
		zonas.nombre AS zona,
		sedes.nombre AS sede,
		programas.nombre AS nombre_programa,
		programas.id as id_programa,
		programas.snies AS snies,
		matriculas.id AS id_matricula,
		matriculas.semestre,
		matriculas.periodo,
		matriculas.promedio,
		universidades.nombre AS universidad,
		tipos_estrategias.nombre AS estrategia,
		acudiente.nombres as nombre_acu,acudiente.documento AS documento_attendant,acudiente.telefono,acudiente.ocupacion
		FROM estudiantes 
		LEFT JOIN eps ON estudiantes.eps_id=eps.id
		LEFT JOIN zonas ON estudiantes.zona_id=zonas.id 
		LEFT JOIN sedes ON estudiantes.sede_id=sedes.id
		LEFT JOIN matriculas ON estudiantes.id=matriculas.estudiante_id
		LEFT JOIN programas ON matriculas.programa_id=programas.id
		LEFT JOIN universidades ON programas.universidad_id=universidades.id
		LEFT JOIN tipos_estrategias ON estudiantes.tipo_estrategia_id=tipos_estrategias.id
		LEFT JOIN acudiente ON estudiantes.acudiente_id=acudiente.id

		where estudiantes.documento='".$documento."' ORDER BY matriculas.semestre DESC LIMIT 1";

		$ps = $con->prepare($sql);
		$ps->execute();
		$result = $ps->fetch();
		#var_dump($result);
		return $result;	
	}

	function getProgramaOfEstudiante($documento,$con)
	{
		$sql = "SELECT programas.nombre AS nombre_programa,programas.snies AS codigo_snies, institucion.nombre AS nombre_institucion FROM programa INNER JOIN evaluacion_semestral ON programa.snies=evaluacion_semestral.programa_snies INNER JOIN institucion ON institucion.id=programa.universidad_id WHERE evaluacion_semestral.estudiante_documento=$documento LIMIT 1";
		$ps = $con->prepare($sql);
		$ps->execute();
		$result = $ps->fetchAll();
		#var_dump($result);
		return $result;	
	}

	#Obtiene el id del ultimo elemento de la tabla
	function getId($tabla,$con)
	{
		$sql = "SELECT id FROM $tabla ORDER BY id DESC LIMIT 1";
		$ps = $con->prepare($sql);
		$ps->execute();
		$result = $ps->fetch()['id'];
		#var_dump($result);
		return $result;

	}




	function getNivelesAcademicos($con)
	{
		$sql = "SELECT * FROM nivel_academico";
		$ps = $con->prepare($sql);
		$ps->execute();
		#var_dump($ps);
		$result = $ps->fetchAll();
		#var_dump($result);
		return $result;
	}

	 
	 function getProgramas($cn)
	 {
	 	$sql = "SELECT * FROM programas";
	 	$ps = $cn->prepare($sql);
	 	$ps -> execute();
	 	$result = $ps->fetchAll();
	 	return $result;
	 }


	// function getEstudianteServicioSocial($id,$cn)
	//  {
	//  	#echo "$id";
	//  	$sql = "SELECT * FROM estudiante_serviciosocial WHERE estudiante_serviciosocial_id='".$id."' LIMIT 1";
	//  	$ps = $cn->prepare($sql);
	//  	$ps -> execute();
	//  	$result = $ps->fetch();
	//  	return $result;
	//  }



	 function getColegio($cn)
	 {
	 	$sql = "SELECT * FROM sedes";
	 	$ps = $cn->prepare($sql);
	 	$ps -> execute();
	 	$result = $ps->fetchAll();
	 	return $result;
	 }

	//  function getTipoPoblacion($cn)
	//  {
	//  	$sql = "SELECT * FROM tipos_poblacion";
	//  	$ps = $cn->prepare($sql);
	//  	$ps -> execute();
	//  	$result = $ps->fetchAll();
	//  	return $result;
	//  }

	 function getZona($cn)
	 {
	 	$sql = "SELECT * FROM zonas";
	 	$ps = $cn->prepare($sql);
	 	$ps -> execute();
	 	$result = $ps->fetchAll();
	 	return $result;
	 }

	 
	 function getSituacionSocial($cn)
	 {
	 	$sql = "SELECT * FROM situaciones_sociales";
	 	$ps = $cn->prepare($sql);
	 	$ps -> execute();
	 	$result = $ps->fetchAll();
	 	return $result;
	 }


	function getInstituciones($con)
	{
		$sql = "SELECT * FROM institucion";
		$ps = $con->prepare($sql);
		$ps->execute();
		#var_dump($ps);
		$result = $ps->fetchAll();
		#var_dump($result);
		return $result;
	}


	function getSedes($con)
	{
		$sql = "SELECT * FROM sedes";
		$ps = $con->prepare($sql);
		$ps->execute();
		#var_dump($ps);
		$result = $ps->fetchAll();
		#var_dump($result);
		return $result;
	}


	function getStudentsInsitutesAndprogramns($con)
	{
		#Esta funcion sera utilizada cuando este gestionado el student
		$con= getConexion($con);
		$sql="SELECT estudiante.documento AS doc_estudiante,estudiante.nombres,estudiante.apellidos,estudiante.edad,estudiante.email,estudiante.estrato,estudiante.genero,estudiante.estado, programa.nombre AS namePrograma, semestre.periodo,semestre.promedio_anterior,institucion.nombre AS nameInstitute FROM estudiante INNER JOIN evaluacion_semestral ON estudiante.documento=evaluacion_semestral.estudiante_documento INNER JOIN programa ON programa.snies=evaluacion_semestral.programa_snies INNER JOIN semestre ON semestre.id=evaluacion_semestral.semestre_id INNER JOIN institucion ON institucion.id=programa.institucion_id";
		$ps = $con->prepare($sql);
		$ps->execute();
		#var_dump($ps);
		$ps = $ps->fetchAll();
		#var_dump($ps);
		return $ps;
	}

	function getAllEntity($entity,$con)
	{
		
		$sql="SELECT SQL_CALC_FOUND_ROWS id,nombre FROM $entity";
		$ps = $con->prepare($sql);
		$ps->execute();
		$ps = $ps->fetchAll();
		return $ps;
	}

	function getTotalObjects($con)
	{
		$con= getConexion($con);
		$sql="SELECT FOUND_ROWS() AS total";
		$ps = $con->prepare($sql);
		$ps->execute();
		$ps = $ps->fetch()['total'];
		return $ps;
	}

	function validateSession()
	{
		if (!isset($_SESSION['usuario']['user'])  || empty($_SESSION['usuario']['user'])) {
			header("Location: ".URL."index.php");
		}
	}

		#devuelve el nombre del perfil
	function shearcPerfilUser($id_user,$con)
	{
		$sql = "SELECT roles.nombre AS namePerfil FROM roles,usuarios WHERE roles.id=usuarios.rol_id AND usuarios.id=$id_user";
		#var_dump($result);
		$ps = $con->prepare($sql);
		$ps->execute();
		$namePerfil = $ps->fetch()['namePerfil'];
		return $namePerfil;
	}

	function searchUserLogin($usuario,$pass,$conexion)
	{
		#echo "<br>Entro a buscar usuario: $usuario $pass <br>";
		$sql = "SELECT * FROM usuarios WHERE codigo=:usuario AND clave=:password LIMIT 1";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':usuario',$usuario);
		$statement->bindParam(':password',$pass);
		#var_dump($statement);
		$statement->execute();
		
		$result= $statement->fetch();
		
		if ($result != false) {
			return $result;
		}else{
			return false;

		}

	}

	function cleanData($data)
	{
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripcslashes($data);
		return $data;
	}


	function comprobarConexion($con)
	{

		if (!$con || $con == null) {
			echo "Ocurrio un error en la Conexion";
		}
	}




	function getUserById($id,$con)
	{
			//Devuelve el user con sus relaciones
		$sql = "SELECT usuarios.id AS id_usuarios,nombre_completo,username,password,email,nombre,perfiles.id AS id_perfil,perfiles.nombre AS nombre_perfil FROM usuarios INNER JOIN usuarios_perfiles ON usuarios.id=usuarios_perfiles.usuarios_id INNER JOIN perfiles ON perfiles.id=usuarios_perfiles.perfiles_id WHERE usuarios.id=$id";
		$ps = $con->prepare($sql);
		$ps->execute();
		$resul = $ps->fetch();
		return $resul;
		
	}


	function getAllUsers($con)
	{
			//Devuelve todos los user con sus relaciones
		$sql = "SELECT usuarios.id AS id_usuarios,usuarios.estado,usuarios.nombre,usuarios.codigo,usuarios.clave,usuarios.fecha_ingreso,roles.nombre AS rol FROM usuarios INNER JOIN roles ON usuarios.rol_id=roles.id";
		$ps = $con->prepare($sql);
		$ps->execute();
		$result = $ps->fetchAll();
		#var_dump($result);
		return $result;
	}

	function getAllSubject($table,$con)
	{
		#utilizada para traer el rpograma en gestionar-estudiante.php
		#Utilizada para traer todos los estudiantes
		$sql = "SELECT * FROM $table";
		#var_dump($sql);
		$ps = $con->prepare($sql);
		$ps->execute();
		$resul = $ps->fetchAll();
		#var_dump($resul);
		return $resul;

	}

	function GetDatosProgramaById($value,$con)
	{
		
		$sql = "SELECT id,snies,cantidad_semestre,costo_semestre,universidad_id,jornada,nombre FROM programas WHERE id=$value LIMIT 1";
		$ps = $con->prepare($sql);
		
		$ps->execute();
		
		$resul = $ps->fetch();
		//var_dump($resul);
		
		return $resul;

		

	}
	function getSubjectByValue($table,$value,$nameColumn,$con)
	{
		#Used by Estudiante
		#used by Ver estudiante
		$sql = "SELECT * FROM $table WHERE $nameColumn='".$value."' LIMIT 1";
		$ps = $con->prepare($sql);
		#var_dump($campo);
		$ps->execute();
		#var_dump($ps);
		//echo "Sujeto";
		$resul = $ps->fetch();
		//var_dump($resul);
		
		return $resul;

		

	}



	function getInstitucionesOfAlianzaById($id,$con)
	{
		#Used by Estudiante
		#used by Ver estudiante
		$sql = "SELECT sedes.id,sedes.nombre AS sede, sedes.codigo_dane_sede AS dane_sede, sedes.consecutivo AS consecutivo_sede FROM sedes WHERE sedes.alianza_id =$id";
		$ps = $con->prepare($sql);
		#var_dump($campo);
		$ps->execute();
		#var_dump($ps);
		$resul = $ps->fetchAll();
			#var_dump($result);
		
		return $resul;
	}

	function getInstitucionesOfUniversidadesById($id,$con)
	{
		#Used by Estudiante
		#used by Ver estudiante
		$sql = "SELECT universidades.id,universidades.nombre AS universidad, universidades.telefono, universidades.direccion FROM universidades WHERE universidades.alianza_id =$id";
		$ps = $con->prepare($sql);
		#var_dump($campo);
		$ps->execute();
		#var_dump($ps);
		$resul = $ps->fetchAll();
			#var_dump($result);
		
		return $resul;
	}


	#Obtiene todos los valores de la entidad donde el campo coincida
	function getAllSubjectByValue($table,$value,$campo,$con)
	{
		#Used by Estudiante
		#used by Ver estudiante

		#echo "<br>Valor recibido value: $value";
		#echo "<br>Valor recibido campo: $campo";
		$sql = "SELECT * FROM $table WHERE $campo LIKE '%".$value."%'";
		$ps = $con->prepare($sql);
		$ps->execute();
		#var_dump($ps);
		$resul = $ps->fetch();
		#var_dump($resul);
		
		return $resul;

		

	}

	function eliminarUsuario($con,$id)
	{
		$sql = "DELETE FROM usuarios WHERE id=$id";
		$stm = $con->prepare($sql);
		$stm->execute();
	}


	function validarErrores($parameter,$errores)
	{
		foreach ($parameter as $campo) {
			if (!isset($_POST[$campo]) ||  empty($_POST[$campo])) {
				$errores .= " Ingrese el campo " . $campo . "</br>";
			}
		}
		return $errores;
	}



	//Crea la factura del estudiante y pasa el valor a cartera(pasar_a_cartera)
	// function saveFacturaEstudiante($idEstudiante,$programa_id,$id_matricula,$cn){
	// 	echo "<br>Entro a save factura<br> con las variables: $id_matricula y $idEstudiante, $programa_id<br>";
	// 	$datos_consecutivo_factura = consultar_consecutivo($cn);
	// 	$numero =  $datos_consecutivo_factura['prefijo'] . ($datos_consecutivo_factura['consecutivo'] + 1) ;
	// 	#$fecha_sistema = Date("y-m-d-m:h:m:s");
	// 	$estado = 1;
		

	// 	incrementar_consecutivo($cn);
	// 	$sql_datos = "
	// SELECT estudiantes.documento,estudiantes.primer_nombre,estudiantes.segundo_nombre,estudiantes.primer_apellido,estudiantes.segundo_apellido,programas.nombre AS programa, programas.snies, programas.costo_semestre, matriculas.semestre,matriculas.periodo,matriculas.anio,matriculas.id AS codigo_matricula, universidades.id AS codigo_universidad, universidades.nombre universidad 
	// FROM 
	// estudiantes,matriculas, programas, universidades
	// where estudiantes.id=matriculas.estudiante_id AND
	// programas.id=matriculas.programa_id AND 
	// programas.universidad_id=universidades.id AND
	// matriculas.id=$id_matricula";

	// $ps1 = $cn->prepare($sql_datos);
	// $ps1->execute();
	// $resul = $ps1->fetch();

	// echo "<br>SELECT<br>";
	// var_dump($resul);
	// echo "<br>";
	// $id_universidad = $resul['codigo_universidad'];
	// $name_estudiante = $resul['primer_nombre'] . " " .$resul['segundo_nombre'] . " " .$resul['primer_apellido'] . " " .$resul['segundo_apellido'];
	// echo "codigo_universidad: $id_universidad<br>";




	// $sql_cartera = "SELECT id AS id_cartera FROM cartera_universidades WHERE cartera_universidades.codigo_universdidad=$id_universidad";
	// $ps2 = $cn->prepare($sql_cartera);
	// $ps2->execute();
	// $id_cartera = $ps2->fetch()['id_cartera'];
	// echo "ID cartera_universidades: $id_cartera <br>";
	// var_dump($id_cartera);

	// 			echo "<br>----MOSTRANDO LO QE VA A INSERTAR:<br>";
	// 			echo  '<br> numero' , $numero . '<br>';
	// 			echo  '<br> documento' , $resul['documento'] . '<br>';
	// 			echo  '<br> estudiante' , $name_estudiante . '<br>';
	// 			echo  '<br> programa' , $resul['programa'] . '<br>';
	// 			echo  '<br> codigo_snies' , $resul['snies'] . '<br>';
	// 			echo  '<br> semestre' , $resul['semestre'] . '<br>';
	// 			echo  '<br> valor' , $resul['costo_semestre'] . '<br>';
	// 			echo  '<br> anio' , $resul['anio'] . '<br>';
	// 			echo  '<br> codigo_universidad' , $resul['codigo_universidad'] . '<br>';
	// 			echo  '<br> universidad' , $resul['universidad'] . '<br>';
	// 			echo  '<br> estado' , $estado . '<br>';
	// 			echo  '<br> id_cartera' , $id_cartera . '<br>';
				

		// $sql = "INSERT INTO factura_estudiante(numero, documento, nombre_estudiante, programa, codigo_snies, semestre, valor, anio, periodo, codigo_universidad, universidad, estado, id_cartera)
		// VALUES 
		// (:numero, :documento, :estudiante, :programa, :codigo_snies,:semestre,:valor,:anio,:periodo,:codigo_universidad,:universidad,:estado,
		// :id_cartera)";

		// 		$stm = $cn->prepare($sql);

		// 		$stm->bindParam( ':numero' , $numero);
		// 		$stm->bindParam( ':documento' , $resul['documento']);
		// 		$stm->bindParam( ':estudiante' , $name_estudiante);
		// 		$stm->bindParam( ':programa' , $resul['programa']);
		// 		$stm->bindParam( ':codigo_snies' , $resul['snies']);
		// 		$stm->bindParam( ':semestre' , $resul['semestre']);
		// 		$stm->bindParam( ':valor' , $resul['costo_semestre']);
		// 		$stm->bindParam( ':anio' , $resul['anio']);
		// 		$stm->bindParam( ':periodo' , $resul['periodo']);
		// 		$stm->bindParam( ':codigo_universidad' , $resul['codigo_universidad']);
		// 		$stm->bindParam( ':universidad' , $resul['universidad']);
		// 		$stm->bindParam( ':estado' , $estado);
		// 		$stm->bindParam( ':id_cartera' , $id_cartera);
				// echo "<br>";
				// var_dump($stm);
				// $result= $stm->execute();
				#echo "<br>Result: ";
				// echo "<br>";
				// var_dump($result);
				//Suma el valor de la factura a cartera
				// pasar_a_cartera($numero,$resul['costo_semestre'],$id_cartera,$cn);
			
				
	// }

	function saveCarteraUniversidades($id_universidad,$name_universidad,$cn){
		$cuenta =  mt_rand();


		$sql = "INSERT INTO cartera_universidades(cuenta, codigo_universdidad, universidad) VALUES (:cuenta,:codigo_universdidad,:universidad)";

				$statement = $cn->prepare($sql);

				$statement->bindParam( ':cuenta' , $cuenta);
				$statement->bindParam( ':codigo_universdidad' , $id_universidad);
				$statement->bindParam( ':universidad' , $name_universidad);
				
				#var_dump($statement);
				$result= $statement->execute();
				#echo "<br>Result: ";
				#var_dump($result);
			
				
	}

	function saveUniversidad
	(
		$nombre,$telefono,$email,$direccion,$municipio,$tipo_universidad,$cn
	)
	{
		#echo "Registrando universidad";
		#echo "<br>variables recibidads:<br>";
		#echo "<br>Nombre: $nombre, Telefono: $telefono, Emaiil: $email, Direccion: $direccion, Municipio: $municipio, Alianza: $alianza";
		
				//var_dump($conexion);
				$sql = "INSERT INTO universidades(nombre,telefono,email,direccion,municipio,tipo_universidad_id) VALUES (:nombre,:telefono,:email,:direccion,:municipio,:tipo_universidad_id)";

				$statement = $cn->prepare($sql);

				$statement->bindParam( ':nombre' , $nombre);
				$statement->bindParam( ':telefono' , $telefono);
				$statement->bindParam( ':email' , $email);
				$statement->bindParam( ':direccion' , $direccion);
				$statement->bindParam( ':municipio' , $municipio);
				#$statement->bindParam( ':alianza_id' , $alianza);
				$statement->bindParam( ':tipo_universidad_id' , $tipo_universidad);
				#var_dump($statement);
				$result= $statement->execute();
				#echo "<br>Result: ";
				#var_dump($result);
				#$id_universidad = $cn->lastInsertId();
				
				// saveCarteraUniversidades($id_universidad,$nombre,$cn);
			
				if ($result) {
					return true;
				}else{
					return false;
				}
		
				//echo "ejecuto el metodo";
		

	}

	function saveProgram
	(
		$codigo_snies,$nombre,$semestres,$valor_semestre,$nivel_academico,$universidad,$jornada,$cn
	)
	{	
		
		// echo "<br>Registrando programa<br>";
		// echo '<br> snies' , $codigo_snies;
		// 	echo '<br> nombre' , $nombre;
		// 	echo '<br> num_semestres' , $semestres;
		// 	echo '<br> costo_semestre' , $valor_semestre;
		// 	echo '<br> nivel_academico_id' , $nivel_academico;
		// 	echo '<br> universidad_id' , $universidad;
		// 	echo '<br> jornada_id' , $jornada;
				//var_dump($conexion);
			$sql = "INSERT INTO programas(snies, nombre, cantidad_semestre, costo_semestre, nivel_academico, universidad_id, jornada) VALUES(  :snies,:nombre,:num_semestres,:costo_semestre,:nivel_academico,:universidad_id,:jornada)";
			$stp = $cn->prepare($sql);
			$stp->bindParam( ':snies' , $codigo_snies);
			$stp->bindParam( ':nombre' , utf8_encode( $nombre));
			$stp->bindParam( ':num_semestres' , $semestres);
			$stp->bindParam( ':costo_semestre' , $valor_semestre);
			$stp->bindParam( ':nivel_academico' , utf8_encode( $nivel_academico ));
			$stp->bindParam( ':universidad_id' , $universidad);
			$stp->bindParam( ':jornada' , utf8_encode( $jornada ));
			#var_dump($stp);
			$result= $stp->execute();
			#var_dump($result);
			if ($result) {
				return true;
			}else{
				return false;
			}

		
	}



	#Registro del estudiante en la BD
	function saveStudent
	(
			$documento ,
			$primer_nombre ,
			$segundo_nombre ,
			$primer_apellido ,
			$segundo_apellido ,
			$telefono ,
			$email ,
			$fecha_naci ,
			$edad ,
			$dire_resi ,
			$fecha_inicio ,
			$observacion ,
			$promedio_notas ,
			$condonacion_credito ,
			$sisben ,
			$puntage_sisben ,
			$num_acta_grado ,
			$lugar_servicio_social ,
			$tipo_documento ,
			$eps ,
			$zona ,
			$estrato ,
			$genero ,
			$situacion_academica ,
			$prioritaria ,
			$grado ,
			$muni_resi ,
			$colegio ,
			$tipo_estrategia ,
			$foto,
			$documento_attendant ,
			$name_attendant ,
			$telephone_attendant ,
			$ocupation_attendant ,
			$muni_naci ,
			$estado_civil ,
			$servicio_social,
			$cn
	)

	{
		
	$estado = false;
	// echo "<br>Entro a saveStudent<br>";

	// echo "<br>:documento: $documento";
	// echo "<br>:primer_nombre: $primer_nombre";
	// echo "<br>:segundo_nombre: $segundo_nombre";
	// echo "<br>:primer_apellido: $primer_apellido";
	// echo "<br>:segundo_apellido: $segundo_apellido";
	// echo "<br>:telefono_contacto: $telefono";
	// echo "<br>:email: $email";
	// echo "<br>:fecha_nacimiento: $fecha_naci";
	// echo "<br>:edad: $edad";
	// echo "<br>:direccion_residencia: $dire_resi";
	// echo "<br>:fecha_inicio: $fecha_inicio";
	// echo "<br>:observacion: $observacion";
	// echo "<br>:foto: $foto";
	// echo "<br>:media_notas: $promedio_notas";
	// echo "<br>:condonacion_credito: $condonacion_credito";
	// echo "<br>:siben: $sisben";
	// echo "<br>:puntaje_sisben: $puntage_sisben";
	// echo "<br>:num_acta_grado: $num_acta_grado";
	// echo "<br>:lugar_servicio_social: $lugar_servicio_social";
	// echo "<br>:estado: $situacion_academica";
	// echo "<br>:tipo_doc: $tipo_documento";
	// echo "<br>:genero: $genero";
	// echo "<br>:eps_id: $eps";
	// echo "<br>:zona_id: $zona";
	// echo "<br>:estrato: $estrato";
	// echo "<br>:Prioritaria: $prioritaria";
	// echo "<br>:grado: $grado";
	// echo "<br>:servicio_social: $servicio_social";
	// echo "<br>:muni_naci: $muni_naci";
	// echo "<br>:muni_resi: $muni_resi";
	// echo "<br>:sede_id: $colegio";
	// echo "<br>:tipo_estrategia_id: $tipo_estrategia";
	// echo "<br>:estado_civil: $estado_civil";
	// echo "<br> ocupation_attendant: $ocupation_attendant";

			$acudiente = add_attendant($documento_attendant,$name_attendant,$telephone_attendant,$ocupation_attendant,$cn);
	// echo "<br> acudiente_id: $acudiente";
					
			
			// echo "<br>Id acudiente: $acudiente";





			$sql = "
		INSERT INTO estudiantes(documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono_contacto, email, fecha_nacimiento, edad, direccion_residencia, estrato, fecha_inicio, observacion, foto, media_notas, condonacion_credito, siben, puntaje_sisben, num_acta_grado, lugar_servicio_social, estado, tipo_doc, genero, estado_civil,grado,servicio_social, muni_naci,muni_resi,eps_id, zona_id, prioritaria,  sede_id, tipo_estrategia_id, acudiente_id) VALUES (
		:documento,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:telefono_contacto,:email,:fecha_nacimiento,:edad,:direccion_residencia,:estrato,:fecha_inicio,:observacion,:foto,:media_notas,:condonacion_credito,:siben,:puntaje_sisben,:num_acta_grado,:lugar_servicio_social, :estado, :tipo_doc,:genero, :estado_civil,:grado,:servicio_social,:muni_naci,:muni_resi,:eps_id,:zona_id,:prioritaria,:sede_id,:tipo_estrategia_id,:acudiente_id
	)";

		$st = $cn->prepare($sql);
		
	$st->bindParam(':documento',$documento);
	$st->bindParam(':primer_nombre',$primer_nombre);
	$st->bindParam(':segundo_nombre',$segundo_nombre);
	$st->bindParam(':primer_apellido',$primer_apellido);
	$st->bindParam(':segundo_apellido',$segundo_apellido);
	$st->bindParam(':telefono_contacto',$telefono);
	$st->bindParam(':email',$email);
	$st->bindParam(':fecha_nacimiento',$fecha_naci);
	$st->bindParam(':edad',$edad);
	$st->bindParam(':direccion_residencia',$dire_resi);
	$st->bindParam(':fecha_inicio',$fecha_inicio);
	$st->bindParam(':observacion',$observacion);
	$st->bindParam(':foto',$foto);
	$st->bindParam(':media_notas',$promedio_notas);
	$st->bindParam(':condonacion_credito',$condonacion_credito);
	$st->bindParam(':siben',$sisben);
	$st->bindParam(':puntaje_sisben',$puntage_sisben);
	$st->bindParam(':num_acta_grado',$num_acta_grado);
	$st->bindParam(':lugar_servicio_social',$lugar_servicio_social);
	$st->bindParam(':estado',$situacion_academica);
	$st->bindParam(':tipo_doc',$tipo_documento);
	$st->bindParam(':genero',$genero);
	$st->bindParam(':eps_id',$eps);
	$st->bindParam(':zona_id',$zona);
	$st->bindParam(':estrato',$estrato);
	$st->bindParam(':prioritaria',$prioritaria);
	$st->bindParam(':grado',$grado);
	$st->bindParam(':servicio_social',$servicio_social);
	$st->bindParam(':muni_naci',$muni_naci);
	$st->bindParam(':muni_resi',$muni_resi);
	$st->bindParam(':sede_id',$colegio);
	$st->bindParam(':tipo_estrategia_id',$tipo_estrategia);
	$st->bindParam(':acudiente_id',$acudiente);
	$st->bindParam(':estado_civil',$estado_civil);
		#34 paremeters

		// echo "<br> Mostrando sql: <br>";
		// var_dump($st);

		$rs = $st->execute();
		// echo "<br>RESULTADO INSERCION ESTUDIANTE <br>";
		// var_dump($rs);


			if ($rs) {
					return true;
				}
			
			return false;
		}//End method	



		function saveInstitucion(
		$nombre,
		$telefono,
		$calendario,
		$dane,
		$sector,
		$municipio,
		$zona,
		$cn
			)
		{



		// echo "<br>nombre: $nombre <br>";
		// echo "<br>telefono: $telefono <br>";
		// echo "<br>calendario: $calendario <br>";
		// echo "<br>dane: $dane <br>";
		// echo "<br>sector: $sector <br>";
		// echo "<br>municipio: $municipio <br>";
		// echo "<br>zona: $zona <br>";
			

				//var_dump($conexion);
			$sql = "INSERT INTO instituciones(nombre, telefono, calendario, DANE, municipio, sector_id, zona_id) VALUES (:nombre,:telefono,:calendario,:DANE,:municipio,:sector_id,:zona_id)";
			$ps = $cn->prepare($sql);
			
			$ps->bindParam(':nombre',$nombre);
			$ps->bindParam(':telefono',$telefono);
			$ps->bindParam(':calendario',$calendario);
			$ps->bindParam(':DANE',$dane);
			$ps->bindParam(':municipio',$municipio);
			$ps->bindParam(':sector_id',$sector);
			$ps->bindParam(':zona_id',$zona);
			
			// var_dump($ps);
			$result= $ps->execute();
			// echo "<br>Valor de la insercion de la institucion: ";
			// var_dump($result);
			if ($result != false) {
				return true;
			}else{
				return false;
			}
	}
			

	?>