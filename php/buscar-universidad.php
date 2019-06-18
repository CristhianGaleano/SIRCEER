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
$query="SELECT * FROM universidades";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['universidades']))
{                  #Por seguridad
	$q=$conexion->real_escape_string($_POST['universidades']);
	$query="SELECT * FROM universidades WHERE
		universidades.documento LIKE '%".$q."%' OR
		universidades.nombre LIKE '%".$q."%' OR
		universidades.telefono LIKE '%".$q."%' OR
		universidades.email LIKE '%".$q."%' OR
		universidades.direccion LIKE '%".$q."%'";
}

$buscarEstudiantes=$conexion->query($query);
if ($buscarEstudiantes->num_rows > 0)
{
	$tabla.= 
	'<table style="margin:auto; width:90%; background-color: #FFF;">
	<tr>
	  	<th scope="colgroup" colspan="4">Listado de universidades</th>
	  </tr>
	<tr style="background-color: rgb(232,64,68); color:fff; padding: 4px; height: 31px;
	font-weight: bold; text-align: center;">
			<td>NOMBRE</td>
			<td>TELEFONO</td>
			<td>E-MAIL</td>
			<td>DIRECCION</td>
			<td></td>
			<td></td>
	</tr>';

	while($universidad= $buscarEstudiantes->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td style="padding: 3px;"> '. $universidad['nombre'].'</td>
			<td style="padding: 3px;"> '. $universidad['telefono'].'</td>
			<td style="padding: 3px;"> '. $universidad['email'].'</td>
			<td style="padding: 3px;"> '. $universidad['direccion'].'</td>
			<td></td>
			<td></td>

			<td> <a  href="' . URL .'gestion/gestionar-universidad.php?id='. urlencode($universidad['id']).'&select=u">Gestionar</a></td>
			<td> <a  href="' . URL .'gestion/editar-universidad.php?id=' . urlencode($universidad['id']).'&select=u">Editar</a></td>
			<td> <a  href="'.  URL .'php/eliminarUniversidad.php?id=' . urlencode($universidad['id']).'">Eliminar</a></td>
			<td> <a  target="_blank" href="' . URL .'gestion/ver-universidad.php?id=' . urlencode($universidad['id']).'">Ver</a></td>
		 </tr>';
	}

	$tabla.='</table>';
} else
	{
		$tabla="<div style='background-color:#333438; margin-top: 150px; color:#FFF; width:100%; height:90px; text-align:center;'><p style='font-size: 2em; padding-top:33px; font-weight:bold;'>No se encontraron coincidencias con sus criterios de búsqueda.<p></div>";
	}


echo $tabla;
?>
