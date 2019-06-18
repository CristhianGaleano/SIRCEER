<?php session_start(); ?>
<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>
<?php require '../admin/config.php' ?>
<?php validateSession(); ?>
<?php
$cn = getConexion($bd_config);
comprobarConexion($cn);


$tipos_estrategias = getAllSubject('tipos_estrategias',$cn);
$estados_civiles = getAllSubject('estado_civil',$cn);

$enviado = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

	if($_SESSION['usuario']['perfil'] != 'REGULAR'){

		
		?>
		<script type="text/javascript">
			alert('Uste no puede editar un estudiante.');
			window.location="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e"; 
		</script>
		<?php
	}else{


	#print_r($_POST);
	$id = cleanData($_POST['id']);
	$documento = cleanData($_POST['documento']);
	$primer_nombre = strtoupper( cleanData($_POST['primer_nombre']));
	$segundo_nombre =   strtoupper( cleanData($_POST['segundo_nombre']));
	$primer_apellido =  strtoupper( cleanData($_POST['primer_apellido']));
	$segundo_apellido =  strtoupper( cleanData($_POST['segundo_apellido']));
	$telefono_contacto = cleanData($_POST['tel_contacto']);
	$email = cleanData($_POST['email']);
	$fecha_nacimiento = cleanData($_POST['fecha_naci']);
	$edad = cleanData($_POST['edad']);
	$direccion_residencia =  strtoupper( cleanData($_POST['dire_resi']));
	$muni_resi = cleanData($_POST['muni_resi']);
	$EPS = cleanData($_POST['eps']);
	$fecha_inicio = cleanData($_POST['fecha_inicio']);
	$fecha_fin = cleanData($_POST['fecha_fin']);
	$media_notas = cleanData($_POST['media_notas']);
	$condonacion_credito = cleanData($_POST['condonacion_credito']);
	$sisben = cleanData($_POST['sisben']);
	$puntage_sisben = cleanData($_POST['puntage_sisben']);
	$num_acta_grado = cleanData($_POST['num_acta_grado']);
	$lugar_servicio_social = cleanData($_POST['lugar_servicio_social']);
	$servicio_social_id = cleanData($_POST['servicio_social']);
	$grado_id = cleanData($_POST['grado']);
	
	$sede_id = cleanData($_POST['colegio']);
	$zona_id = cleanData($_POST['zona']);
	$genero_id = cleanData($_POST['genero']);
	$estrato_id = cleanData($_POST['estrato']);
	$situacion_academica_id = cleanData($_POST['situacion_academica']);
	
	$prioritaria = cleanData($_POST['prioritaria']);
	$tipo_documento_id = cleanData($_POST['tipo_documento']);
	$tipo_estrategia = cleanData($_POST['tipo_estrategia']);
	// $motivo = cleanData($_POST['motivo']);
	$observacion = cleanData($_POST['observacion']);
	$muni_naci = cleanData($_POST['muni_naci']);
	$estado_civil_id = cleanData($_POST['estado_civil']);
	#$acudiente = cleanData($_POST['acudiente']);




// echo "<br>*****VARIABLES RECIBIDAS*****<br>";
// echo "<br>:documento <br>",$documento;
// 	echo "<br>:primer_nombre <br>",$primer_nombre;
// 	echo "<br>:segundo_nombre <br>",$segundo_nombre;
// 	echo "<br>:primer_apellido <br>",$primer_apellido;
// 	echo "<br>:segundo_apellido <br>",$segundo_apellido;
// 	echo "<br>:telefono_contacto <br>",$telefono_contacto;
// 	echo "<br>:email <br>",$email;
// 	echo "<br>:fecha_nacimiento <br>",$fecha_nacimiento;
// 	echo "<br>:edad <br>",$edad;
// 	echo "<br>:direccion_residencia <br>",$direccion_residencia;
// 	echo "<br>:fecha_inicio <br>",$fecha_inicio;
// 	echo "<br>:fecha_fin <br>",$fecha_fin;
// 	echo "<br>:observacion <br>",$observacion;
// 	echo "<br>:media_notas <br>",$media_notas;
// 	echo "<br>:condonacion_credito <br>",$condonacion_credito;
// 	echo "<br>:sisben <br>",$sisben;
// 	echo "<br>:puntaje_sisben <br>",$puntage_sisben;
// 	echo "<br>:num_acta_grado <br>",$num_acta_grado;
// 	echo "<br>:lugar_servicio_social <br>",$lugar_servicio_social;
// 	echo "<br>:tipo_documento_id <br>",$tipo_documento_id;
// 	echo "<br>:eps_id <br>",$EPS;
// 	echo "<br>:zona_id <br>",$zona_id;
// 	echo "<br>:estrato_id <br>",$estrato_id;
// 	echo "<br>:genero_id <br>",$genero_id;
// 	echo "<br>:situacion_academica_id <br>",$situacion_academica_id;
// 	echo "<br>:prioritaria <br>",$prioritaria;
// 	echo "<br>:grado_id <br>",$grado_id;
// 	echo "<br>:muni_resi <br>",$muni_resi;
// 	echo "<br>:tipo_estrategia <br>",$tipo_estrategia;
// 	echo "<br>:sede_id <br>",$sede_id;
// 	echo "<br>:muni_naci <br>",$muni_naci;
// 	echo "<br>:estado_civil_id <br>",$estado_civil_id;
// 	echo "<br>:id",$id;



	$sqlEstu = 
	"UPDATE estudiantes SET documento=:documento,primer_nombre=:primer_nombre,segundo_nombre=:segundo_nombre,primer_apellido=:primer_apellido,segundo_apellido=:segundo_apellido,telefono_contacto=:telefono_contacto,email=:email,fecha_nacimiento=:fecha_nacimiento,edad=:edad,direccion_residencia=:direccion_residencia,estrato=:estrato ,fecha_inicio=:fecha_inicio,fecha_fin=:fecha_fin,observacion=:observacion, media_notas=:media_notas,condonacion_credito=:condonacion_credito, siben=:sisben, puntaje_sisben=:puntaje_sisben ,num_acta_grado =:num_acta_grado, lugar_servicio_social=:lugar_servicio_social,estado=:estado,tipo_doc=:tipo_doc, genero=:genero, estado_civil=:estado_civil,grado=:grado,servicio_social=:servicio_social ,eps_id=:eps_id ,zona_id=:zona_id  ,prioritaria=:prioritaria ,muni_resi=:muni_resi ,sede_id=:sede_id ,tipo_estrategia_id =:tipo_estrategia_id, muni_naci=:muni_naci WHERE estudiantes.id=:id";

	$stm=$cn->prepare($sqlEstu);

	$stm->bindParam(":documento",$documento);
	$stm->bindParam(":primer_nombre",$primer_nombre);
	$stm->bindParam(":segundo_nombre",$segundo_nombre);
	$stm->bindParam(":primer_apellido",$primer_apellido);
	$stm->bindParam(":segundo_apellido",$segundo_apellido);
	$stm->bindParam(":telefono_contacto",$telefono_contacto);
	$stm->bindParam(":email",$email);
	$stm->bindParam(":fecha_nacimiento",$fecha_nacimiento);
	$stm->bindParam(":edad",$edad);
	$stm->bindParam(":direccion_residencia",$direccion_residencia);
	$stm->bindParam(":estrato",$estrato_id);
	$stm->bindParam(":fecha_inicio",$fecha_inicio);
	$stm->bindParam(":fecha_fin",$fecha_fin);
	$stm->bindParam(":observacion",$observacion);
	$stm->bindParam(":media_notas",$media_notas);
	$stm->bindParam(":condonacion_credito",$condonacion_credito);
	$stm->bindParam(":sisben",$sisben);
	$stm->bindParam(":puntaje_sisben",$puntage_sisben);
	$stm->bindParam(":num_acta_grado",$num_acta_grado);
	$stm->bindParam(":lugar_servicio_social",$lugar_servicio_social);
	$stm->bindParam(":estado",$situacion_academica_id);
	$stm->bindParam(":tipo_doc",$tipo_documento_id);
	$stm->bindParam(":genero",$genero_id);
	$stm->bindParam(":estado_civil",$estado_civil_id);
	$stm->bindParam(":grado",$grado_id);
	$stm->bindParam(":servicio_social",$servicio_social_id);
	$stm->bindParam(":eps_id",$EPS);
	$stm->bindParam(":zona_id",$zona_id);
	$stm->bindParam(":prioritaria",$prioritaria);
	$stm->bindParam(":muni_resi",$muni_resi);
	$stm->bindParam(":sede_id",$sede_id);
	$stm->bindParam(":tipo_estrategia_id",$tipo_estrategia);
	$stm->bindParam(":muni_naci",$muni_naci);
	$stm->bindParam(":id",$id);


	// var_dump($stm);
	$resultE = $stm->execute();
	// echo "<br>Mostrando <br>";
	// var_dump($resultE);







	
	if ($resultE != false) {
		?>
            <script type="text/javascript"> 
            alert('Registro actualizado....');
                window.location="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e"; 
            </script> 
            <?php //lo abro de nuevo
    $enviado = true;
	}else{
		?>
            <script type="text/javascript"> 
                alert('Ocurrio un error...');
            </script> 
            <?php //lo abro de nuevo
	}
}//Fin de la validacion permiso usuario

}else
{
	#Crear funcion para limpiar id
	$doc_estu = $_GET['id'];
	if (empty($doc_estu)) {
		?>
            <script type="text/javascript"> 
                window.location="<?php echo URL ?>principal-admin.php"; 
            </script> 
            <?php //lo abro de nuevo
	}
	$result = getSubjectByValue("estudiantes",$doc_estu,'documento',$cn);
	$instituciones = getSedes($cn);
	// $situacion_social = getSituacionSocial($cn);
	$zonas = getZona($cn);
	$epss = getAllSubject('eps',$cn);
	
}
?>

<?php require '../view/editar-estudiante.view.php' ?>