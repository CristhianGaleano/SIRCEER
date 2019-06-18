<?php 
$html = '
<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">
          <p style="font-size: 1.5em; font-family: Arial;">GOBERNACIÓN DE RISARALDA</p>
          <hr>
      <div style="width:90;float:right;">
          <img style="80%;" src="../imagenes/gobernacion.png">
      </div>
      <p style="font-size: 1.3em; font-family: Arial;">Sedes registradas a la fecha: '. $fecha_sistema; $html .='</p>
      </div>




      <div style="background-color: white; width: 100%;">
            
            <table style="font-size:11px">
            <tr>
            <td><strong>NOMBRE</strong></td>
            <td><strong>DANE</strong></td>
            <td><strong>CONSECUTIVO</strong></td>
            <td><strong>MUNICIPIO</strong></td>
            <td><strong>ZONA</strong></td>
            <td><strong>MODELO</strong></td>
            <td><strong>INSTITUCIÓN</strong></td>


            
            
          
            </tr>';
              foreach ($sedes as $sede) {
             $html .='<tr>
                
                <td>'. utf8_encode( $sede['sede']).'</td>
                <td>'.$sede['codigo_dane_sede'].'</td>
                <td>'.$sede['consecutivo'].'</td>
                <td>'.$sede['municipio'].'</td>
                <td>'.$sede['zona'].'</td>
                <td>'.$sede['modelo'].'</td>
                <td>'.$sede['institucion'].'</td>
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
