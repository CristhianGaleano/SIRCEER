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
$query="SELECT * FROM instituciones ORDER BY id";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['institucion']))
{                  #Por seguridad
	$q=$conexion->real_escape_string($_POST['institucion']);
	$query="SELECT * FROM instituciones WHERE
		id LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
		telefono LIKE '%".$q."%' OR
		siglas LIKE '%".$q."%' OR
		calendario LIKE '%".$q."%' OR
		DANE LIKE '%".$q. "%'";
}

$buscarInstitutos=$conexion->query($query);
if ($buscarInstitutos->num_rows > 0)
{
	$tabla.= 
	'<table style="margin:auto; background-color: #FFF;">
	  <tr>
	  	<th scope="colgroup" colspan="4">Listado de instituciones</th>
	  </tr>
		<tr style="background-color: rgb(232,64,68); color:fff; padding: 4px; height: 31px;
	font-weight: bold; text-align: center;">
			<td>ID</td>
			<td>NOMBRE</td>
			<td>TELEFONO</td>
			<td>SIGLAS</td>
			<td>CALENDARIO</td>
			<td>DANE</td>
			<td></td>
		</tr>';

	while($filaInstitutos= $buscarInstitutos->fetch_assoc())
	{
		$tabla.=
		'<tr style="text-align: center;">
			<td style="padding: 3px;">'.$filaInstitutos['id'].'</td>
			<td style="padding: 3px;">'.$filaInstitutos['nombre'].'</td>
			<td style="padding: 3px;">'.$filaInstitutos['telefono'].'</td>
			<td style="padding: 3px;">'.$filaInstitutos['siglas'].'</td>
			<td style="padding: 3px;">'.$filaInstitutos['calendario'].'</td>
			<td style="padding: 3px;">'.$filaInstitutos['DANE'].'</td>
			<td>
			 <a href="'.URL.'gestion/editar-institucion.php?id='. urlencode($filaInstitutos['id']).'&select=i">Editar</a> 
			</td>
			<td>
			 <a href="'.URL.'php/eliminarInstitucion.php?id='. urlencode($filaInstitutos['id']).'">Eliminar</a>
			</td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="<div style='background-color:#333438; margin-top: 150px; color:#FFF; width:100%; height:90px; text-align:center;'><p style='font-size: 2em; padding-top:33px; font-weight:bold;'>No se encontraron coincidencias con sus criterios de búsqueda.<p></div>";
	}


echo $tabla;
?>
