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
$query="SELECT * FROM programas ORDER BY snies";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['programa']))
{                  #Por seguridad
	$q=$conexion->real_escape_string($_POST['programa']);
	$query="SELECT * FROM programas WHERE 
		snies LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
		cantidad_semestre LIKE '%".$q."%' OR
		costo_semestre LIKE '%".$q."%'";
}

$buscarProgramas=$conexion->query($query);
if ($buscarProgramas->num_rows > 0)
{
	$tabla.= 
	'<table style="margin:auto; background-color: #FFF;">
	  <tr>
	  	<th scope="colgroup" colspan="4">Listado de programas</th>
	  </tr>
		<tr style="background-color: rgb(232,64,68); color:fff; padding: 4px; height: 31px;
	font-weight: bold; text-align: center;">
			<td>SNIES</td>
			<td>NOMBRE</td>
			<td>SEMESTRES</td>
			<td>COSTO POR SEMESTRE</td>
			<td></td>
			<td></td>
		</tr>';

	while($filaProgramas= $buscarProgramas->fetch_assoc())
	{
		$tabla.=
		'<tr style="text-align: center;">
			<td style="padding: 3px;">'.$filaProgramas['snies'].'</td>
			<td style="padding: 3px;">'.$filaProgramas['nombre'].'</td>
			<td style="padding: 3px;">'.$filaProgramas['cantidad_semestre'].'</td>
			<td style="padding: 3px;">'.$filaProgramas['costo_semestre'].'</td>
			<td style="padding: 3px;"> <a href="'.URL.'gestion/editar-programa.php?snies='. urlencode($filaProgramas['snies']).'&select=p">Editar</a> </td>
			<td> <a href="'.URL.'php/eliminarPrograma.php?snies='. urlencode($filaProgramas['snies']).'&select=p">Eliminar</a></td>
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
