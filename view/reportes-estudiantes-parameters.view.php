<?php 
$html = '
<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">

          <p style="font-size: 1.5em; font-family: Arial;">GOBERNACIÓN DE RISARALDA</p>
          <hr>
          <div style="float:left; width: 400px;">
            <p> <strong>Listado de estudiantes de sexo '. $genero. '</strong>, total: '. $num .'</p>
          </div>
          <div style="width:90;float:right;">
          <img style="80%;" src="../imagenes/gobernacion.png">
          </div>

      </div>




      <div style="background-color: white; width: 100%;">
      <!--INFORMACION PERSONAL-->
         <table>

            <tr>
              <td><strong>DOCUMENTO</strong></td>
              <td><strong>NOMBRES</strong></td>
              <td><strong>APELLIDOS</strong></td>
              <td><strong>EDAD</strong></td> 
              <td><strong>FECHA NACIMIENTO</strong></td>       
            </tr>"';
      
          foreach ($estudiantes as $value) {
              $html .= '
              <tr>
                
                <td>'. utf8_encode( $value['documento'] ).'</td>
                <td>'. utf8_encode( $value['primer_nombre'] )." ". utf8_encode( $value['segundo_nombre'] ).'</td>
                <td>'. utf8_encode( $value['primer_apellido'] )." ". utf8_encode( $value['segundo_apellido'] ).'</td>
                <td>'. utf8_encode( $value['edad'] ).'</td>                
                <td>'. utf8_encode( $value['fecha_nacimiento'] ).'</td>                
            </tr>
              ';            
          }
          $html .='
            </table>
            </div>
          ';

          $html .= '
      <div id="notices">
    </div>';
$mpdf = new mPDF('c');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteEstudiantes','I');
?>
<?php #require("../view/reportes-estudiantes.view.php") ?>