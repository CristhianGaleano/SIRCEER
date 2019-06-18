<?php
require '../admin/config.php';
/////// CONEXIÓN A LA BASE DE DATOS /////////


$conexion = new mysqli($bd_config['host'], $bd_config['userName'],$bd_config['pass'], $bd_config['nameBD']);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT * FROM alianzas";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['alianzas']))
{                  #Por seguridad
	$q=$conexion->real_escape_string($_POST['alianzas']);
	$query="SELECT * FROM alianzas WHERE 
		id LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
		fecha_inicio LIKE '%".$q."%' OR
		cupos LIKE '%".$q."%' OR
		fecha_final LIKE '%".$q."%'";
}

$buscarAlianza=$conexion->query($query);
if ($buscarAlianza->num_rows > 0)
{
	$tabla.= 
	'<table style="margin:auto; background-color: #FFF;">
	<tr>
	  	<th scope="colgroup" colspan="4">Listado de alianzas</th>
	  </tr>
	<tr style="background-color: rgb(232,64,68); color:fff; padding: 4px; height: 31px;
	font-weight: bold; text-align: center;">
			<td>ID</td>
			<td>NOMBRE</td>
			<td>FECHA INICIO</td>
			<td>FECHA FINAL</td>
			<td>CUPO</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
	</tr>';

	while($filaAlianza= $buscarAlianza->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td style="padding: 3px;"> '. $filaAlianza['id'].'</td>
			<td style="padding: 3px;"> '. $filaAlianza['nombre'].'</td>
			<td style="padding: 3px;"> '. $filaAlianza['fecha_inicio'].'</td>
			<td style="padding: 3px;"> '. $filaAlianza['fecha_final'].'</td>
			<td style="padding: 3px;"> '. $filaAlianza['cupos'].'</td>
			
			<td> <a  href="' . URL .'gestion/gestionar-alianza.php?id='. urlencode($filaAlianza['id']).'&select=a">Gestionar</a></td>
			<td> <a  href="' . URL .'gestion/editar-alianza.php?id=' . urlencode($filaAlianza['id']).'&select=a">Editar</a></td>
			<td> <a  href="'.  URL .'php/eliminarAlianza.php?id=' . urlencode($filaAlianza['id']).'">Eliminar</a></td>
			<td> <a  target="_blank" href="' . URL .'gestion/ver-alianza.php?id=' . urlencode($filaAlianza['id']).'">Ver</a></td>
		 </tr>';
	}

	$tabla.='</table>';
} else
	{
		$tabla="<div style='background-color:#333438; margin-top: 150px; color:#FFF; width:100%; height:90px; text-align:center;'><p style='font-size: 2em; padding-top:33px; font-weight:bold;'>No se encontraron coincidencias con sus criterios de búsqueda.<p></div>";
	}


echo $tabla;
?>
