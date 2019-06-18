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
            <p style="font-size: 1.5em; font-family: Arial;">FACTURA</p>
            <table style="font-size:11px">

            <tr>
              <td><strong>NUMERO</strong></td>
              <td>'.$factura['numero'].'</td>
              <td><strong>DOCUMENTO</strong></td>
              <td>'.$factura['documento'].'</td>
              <td></td>
            </tr>
            <tr>
              <td><strong>ESTUDIANTE</strong></td>
              <td>'.$factura['nombre_estudiante'].'</td>
              <td><strong>PROGRAMA</strong></td>
              <td>'.$factura['programa'].'</td>
            </tr>
            <tr>
              <td><strong>SNIES</strong></td>
              <td>'.$factura['codigo_snies'].'</td>
              <td><strong>SEMESTRE</strong></td>
              <td>'.$factura['semestre'].'</td>
              <td></td>
            </tr>
            
            <tr>
              <td><strong>VALOR</strong></td>
              <td>'.$factura['valor'].'</td>
              <td><strong>ANIO</strong></td>
              <td>'.$factura['anio'].'</td>
            </tr>
            <tr>
              <td><strong>CODI. UNIVER</strong></td>
              <td>'.$factura['codigo_universidad'].'</td>
              <td><strong>UNIVERSIDAD</strong></td>
              <td>'.$factura['universidad'].'</td>
              <td></td>
            </tr>
            <tr>
              <td><strong>FECHA</strong></td>
              <td>'.$factura['fecha_sistema'].'</td>
            </tr>
            

            </table>
  </div>    
</div>';

$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteUniversidad.pdf','I');
?>
