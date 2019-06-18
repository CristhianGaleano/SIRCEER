<?php 
$html = '
<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">
          <p style="font-size: 1.5em; font-family: Arial;">GOBERNACIÓN DE RISARALDA</p>
          <hr>
      </div>
      <div style="width:90%;">
      <p style="font-size: 1em; display: inline-block; font-family: Arial;">Instituciones de Educación Superior registradas a la fecha: '. $fecha_sistema; $html .='</p>
          <img style="width:15%; float: right;" src="../imagenes/gobernacion.png">
      </div>
      
      




      <div style="background-color: white; width: 100%;">
            <table style="font-size: 10px;">
            <tr>
            
            <td><strong>NOMBRE</strong></td>
            <td><strong>TELEFONO</strong></td>
            <td><strong>EMAIL</strong></td>
            <td><strong>DIRECCION</strong></td>
            <td><strong>MUNICIPIO</strong></td>
            <td><strong>TIPO</strong></td>
            
          
            </tr>';
              foreach ($universidades as $universidad) {
             $html .='<tr>
                <td>'. utf8_encode( $universidad['universidad']).'</td>
                <td>'.$universidad['telefono'].'</td>
                <td>'.$universidad['email'].'</td>
                <td>'. utf8_encode( $universidad['direccion']).'</td>
                <td>'. utf8_encode( $universidad['municipio']).'</td>
                <td>'. utf8_encode( $universidad['tipo_uni']).'</td>
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
