<?php 
$html = '
<link rel="icon" href="<?php echo URL; ?>imagenes/favicon.png">
<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">
          <p style="font-size: 1.5em; font-family: Arial;">GOBERNACIÓN DE RISARALDA</p>
          <hr>
      <div style="width:100;float:left;">
          <img height="110" width="95" src="../imagenes/gobernacion.png"/>
      </div>
      <div style="width:100;float:right;">
          <img height="110" width="95" src="../fotos/'.$estudiante['foto'].'"/>
      </div>

      </div>




      <div style="background-color: white; width: 100%;">
      <!--INFORMACION PERSONAL-->
      <p style="font-size: 1.5em; font-family: Arial;">DATOS PERSONALES</p>
            <table style="font-size:11px">
            <tr>
              <td font-size: 1.1em;><strong>Documento:</strong></td>
              <td font-size: 1.1em;>'.$estudiante['documento_estudiante'].'</td>
              <td font-size: 1.1em;><strong>Tipo de documento:</strong></td>
              <td font-size: 1.1em;>'.$estudiante['tipo_doc'].'</td>
            </tr>

            <tr>
              <td  style="font-size: .4em;"  ><strong>Nombres:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['primer_nombre'].' '.$estudiante['segundo_nombre'].'</td>
              <td  style="font-size: .4em;"  ><strong>Apellidos:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['primer_apellido'].' '.$estudiante['segundo_apellido'].'</td>
            </tr>

            <tr>
              <td  style="font-size: .4em;"  ><strong>Email:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['email'].'</td>
              <td  style="font-size: .4em;"  ><strong>Fecha de nacimiento:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['fecha_nacimiento'].'</td>
            </tr>

            <tr>
              <td  style="font-size: .4em;"  ><strong>Edad</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['edad'].'</td>
              <td  style="font-size: .4em;"  ><strong>Estrato</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['estrato'].'</td>
            </tr>

            <tr>
              <td  style="font-size: .4em;"  ><strong>Sisben:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['siben'].'</td>
              <td  style="font-size: .4em;"  ><strong>Puntage sisben:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['puntaje_sisben'].'</td>
            </tr>

            <tr>
              <td  style="font-size: .4em;"  ><strong>Zona</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['zona'].'</td>
              <td  style="font-size: .4em;"  ><strong>Genero:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['genero'].'</td>
            </tr>

            <tr>
              <td  style="font-size: .4em;"  ><strong>Telefonos:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['telefono_contacto'].'</td>
              <td  style="font-size: .4em;"  ><strong>Municipio de residencia:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['muni_resi'].'</td>
            </tr>

            <tr>
              <td  style="font-size: .4em;"  ><strong>Direcion de residencia:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['direccion_residencia'].'</td>
              <td  style="font-size: .4em;"  ><strong>Promedio de notas:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['media_notas'].'</td>
            </tr>

  
          <tr>
              <td  style="font-size: .4em;"  ><strong>Prioritaria:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['prioritaria'].'</td>
              <td  style="font-size: .4em;"  ><strong>Condonación:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['condonacion_credito'].'</td>
            </tr>            


            <tr>
              <td  style="font-size: .4em;"  ><strong>Fecha de registro:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['fecha_inicio'].'</td>
              <td  style="font-size: .4em;"  ><strong>Fecha fin:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['fecha_fin'].'</td>
            </tr>

            <tr>
              <td  style="font-size: .4em;"  ><strong>Lugar servicio social:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['lugar_servicio_social'].'</td>
              <td  style="font-size: .4em;"  ><strong>Servicio siocial:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['servicio_social'].'</td>
            </tr>

            <tr>
              <td  style="font-size: .4em;"  ><strong>Situación academica:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['estado'].'</td>
              <!--<td  style="font-size: .4em;"  ><strong>Motivo:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['motivo'].'</td>-->
            </tr>
            <tr>
              <td  style="font-size: .4em;"  ><strong>Estrategia:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['estrategia'].'</td>
              <td  style="font-size: .4em;"  ><strong>Num acta grado:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['num_acta_grado'].'</td>
            </tr>


            <tr>
              <td  style="font-size: .4em;"  ><strong>EPS:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['eps'].'</td>
              <td  style="font-size: .4em;"  ><strong>Observaciones:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['observacion'].'</td>
            </tr>

            <tr>
              <p>DATOS ACUDIENTE</p>
              <td  style="font-size: .4em;"  ><strong>Documento acudiente:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['documento_attendant'].'</td>
              <td  style="font-size: .4em;"  ><strong>Nombre acudiente:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['nombres'].'</td>
            </tr>

            <tr>
              <td  style="font-size: .4em;"  ><strong>Telefono acudiente:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['telefono'].'</td>
              <td  style="font-size: .4em;"  ><strong>Ocupación acudiente:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['ocupacion'].'</td>
            </tr>

            <tr>
              <td  style="font-size: .4em;"  ><strong>Municipio de nacimiento:</strong></td>
              <td  style="font-size: .4em;"  >'.$estudiante['muni_naci'].'</td>
            </tr>
      
            </table>
      
          </div>';

          $html .= '
            <div>
            <!--INFORMACION ESCOLAR-->
            <p style="font-size: 1.5em; font-family: Arial;">EDUCACIÓN BASICA</p>
            <table>
            <tr>
              <td><strong>Institucion:</strong></td>
              <td>'.$estudiante['sede'].'</td>
              <td><strong>Grado que cursa:</strong></td>
              <td>'.$estudiante['grado'].'</td>
            </tr>
            </table>

            <p style="font-size: 1.5em; font-family: Arial;">EDUCACIÓN SUPERIOR</p>
            <table>
            <tr>
              <td><strong>Programa de estudio:</strong></td>
              <td>'.$estudiante['nombre_programa'].'</td>
              <td><strong>Universidad:</strong></td>
              <td>'.$estudiante['universidad'].'</td>
            </tr>

            <tr>
              <td><strong>Semestre:</strong></td>
              <td>'.$estudiante['semestre'].'</td>
              <td><strong>Periodo:</strong></td>
              <td>'.$estudiante['periodo'].'</td>
            </tr>

            <tr>
              <td><strong>Promedio:</strong></td>';
              if (  $estudiante['promedio'] )  {
                $html .= '<td style="Color: blue;">'.$estudiante['promedio'].'</td>';  
              }else
              {
                $html .= '<td style="Color: blue;">Promedio sin asignar</td>';
              }
              $html .='              
            </tr>
            </table>
              
              <p style="font-size: 1.5em; font-family: Arial;">HISTORIAL ACADEMICO</p>
            <table width="100%">
              <tr>
                <td><strong>Año</strong></td>
                <td><strong>Semestre</strong></td>
                <td><strong>Periodo</strong></td>
                <td><strong>Promedio</strong></td>
                <td><strong>Estado</strong></td>
                <td><strong>Fecha modificación<strong></td>
              </tr>';
              foreach ($historial as $value) {
                $html .= '
              <tr>
                <td>'. $value['anio'] .'</td>
                <td>'. $value['semestre'] .'</td>
                <td>'. $value['periodo'] .'</td>
                <td>'. $value['promedio'] .'</td>
                <td>'. $value['estado_matricula'] .'</td>
                <td>'. $value['fecha_modificacion'] .'</td>
            </tr>
              ';            
              }
             $html .=' </table>
            </div>
          ';



          $html .= '
      <div id="notices">
    </div>';
$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
$mpdf->writeHTML($html,2);
$mpdf->Output('fsd.pdf','D');
?>
<?php #require("../view/reportes-estudiantes.view.php") ?>