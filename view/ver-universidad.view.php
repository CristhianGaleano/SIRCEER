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
            <p style="font-size: 1.1em; font-family: Arial;">Datos de la Institución de Educación Superior</p>
            <table style="font-size:11px">

            <tr>
              <td><strong>ID</strong></td>
              <td><strong>NOMBRE</strong></td>
              <td><strong>TELEFONO</strong></td>
              <td><strong>EMAIL</strong></td>
              <td><strong>DIRECCIÓN</strong></td>
              <td><strong>MUNICIPIO</strong></td>
              <td><strong>TIPO</strong></td>
            </tr>
            <tr>
            <td>'.$universidad['id'].'</td>
            <td>'.$universidad['nombre'].'</td>
            <td>'.$universidad['telefono'].'</td>
            <td>'.$universidad['email'].'</td>
            <td>'.$universidad['direccion'].'</td>
            <td>'.$universidad['municipio'].'</td>
            <td>'.$tipo['nombre'].'</td>
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
