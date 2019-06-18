<?php 
$html = '
<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">
          <p style="font-size: 1.5em; font-family: Arial;">GOBERNACIÓN DE RISARALDA</p>
          <hr>
      <div style="width:90;float:right;">
          <img style="80%;" src="../imagenes/gobernacion.png">
      </div>
      </div>




      <div style="background-color: white; width: 100%;">
            <p style="font-size: 1.2em; font-family: Arial;">ALIANZAS REGISTRADAS</p>
            <table width=100% style="font-size:11px">
            <tr>
            <td><strong>ID</strong></td>
            <td><strong>Nombre</strong></td>
            <td><strong>Fecha inicio</strong></td>
            <td><strong>Fecha final</strong></td>
            <td><strong>Cupos</strong></td>
            <td><strong>Estado</strong></td>
            </tr>';
              foreach ($alianzas as $alianza) {
             $html .='<tr>
                <td>'.$alianza['id'].'</td>
                <td>'.$alianza['nombre'].'</td>
                <td>'.$alianza['fecha_inicio'].'</td>
                <td>'.$alianza['fecha_final'].'</td>
                <td>'.$alianza['cupos'].'</td>
                <td>'.$alianza['estado'].'</td>
                </tr>';
              }

         $html .='
            </table>
      
          </div>';

$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteAlianzas.pdf','I');
?>
