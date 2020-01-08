<?php 
$html = '
<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">
          <p style="font-size: 1.5em; font-family: Arial;">GOBERNACIÓN DE RISARALDA</p>
          <hr>
          </div>
      <div style="width:90;float:right;">
          <img style="80%;" src="../imagenes/gobernacion.png">
      </div>
            <p style="font-size: 1em; font-family: Arial; float: left;">Programas de formación registrados a la fecha: '. $fecha_sistema; $html .=' </p>
      </div>




      <div style="background-color: white; width: 100%;">
            <table style="font-size:11px">
            <tr>
            <td><strong>SNIES</strong></td>
            <td><strong>Nombre</strong></td>
            <td><strong>Semes.</strong></td>
            <td><strong>Costo semes.</strong></td>
            <td><strong>Nivel academico</strong></td>
            <td><strong>Jornada</strong></td>
            <td><strong>IES</strong></td>
            
          
            </tr>';
              foreach ($programas as $programa) {
             $html .='<tr>
                <td>'.$programa['snies'].'</td>
                <td>' .utf8_encode( $programa['name_programa']).'</td>
                <td>'.$programa['num_semestres'].'</td>
                <td>'.$programa['costo_semestre'].'</td>
                <td>'.utf8_encode($programa['nivel_academico']).'</td>
                <td>'.utf8_encode($programa['jornada']).'</td>
                <td>'.utf8_encode($programa['name_universidad']).'</td>
                </tr>';
              }

         $html .='
            </table>
      
          </div>';

$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteProgramas.pdf','I');
?>
