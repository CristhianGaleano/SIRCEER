<?php 
$html = '
<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">
          <p style="font-size: 1.5em; font-family: Arial;">GOBERNACION DE RISARALDA</p>
          <hr>
      <div style="width:90;float:right;">
          <img style="80%;" src="../imagenes/gobernacion.png">
      </div>
      </div>




      <div style="background-color: white; width: 100%;">
            <p style="font-size: 1.5em; font-family: Arial;">INSTITUCIONES REGISTRADAS</p>
            <table style="font-size:11px">
            <tr>
            <td><strong>Id</strong></td>
            <td><strong>Nombre</strong></td>
            <td><strong>Telefono</strong></td>
            <td><strong>siglas</strong></td>
            <td><strong>Calendario</strong></td>
            <td><strong>DANE</strong></td>
          
            </tr>';
              foreach ($instituciones as $instituto) {
             $html .='<tr>
                <td>'.$instituto['id'].'</td>
                <td>'. utf8_encode( $instituto['nombre']).'</td>
                <td>'.$instituto['telefono'].'</td>
                <td>'.$instituto['siglas'].'</td>
                <td>'.$instituto['calendario'].'</td>
                <td>'.$instituto['DANE'].'</td>
                </tr>';
              }

         $html .='
            </table>
      
          </div>';

$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteInstitutos.pdf','I');
?>
