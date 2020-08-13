<?php 
  // require '../libs/fpdf/fpdf.php';
  require 'template-reporte.php';

  require_once '../admin/config.php';
  require_once '../php/Conexion.php';
  require_once '../php/funciones.php';
  

  $cn = getConexion($bd_config);
  comprobarConexion($cn);
  
  $id = $_GET['id'];
  
  $datos_matricula=getAllMatricula($id,$cn);

  // Creacion object FPDF: 
  // Este constructor recibe parametros para establecer propiedades de la impresion: 
  //Primer paramtro: Vertical: P; Horizontal: L.
  // Segundo parametro: Sistema de medicion: Milimetrtos: mm, ctmts: cm, pulgadas: in y punto: pt 
  // Tercero: Tamaño de papel: Legal(legal), letter(Carta),   
  $pdf = new PDF();//'L','mm','letter'
  // Add new page, size paper, rotacion, etc
  //Parameters: Orientacion (L:Horizontal-P:Portrai, Formato: letter, angulo: Multiplos de 90)
  $pdf->AddPage();//'P', 'letter'
  $pdf->AliasNbPages();
  $pdf->SetFillColor(232,232,230);
  // font family: type,style(por defecto regular,B,I,U) and size(por defecto 12)
  $pdf->SetFont('Arial','B',9);
  $pdf->Cell(0,6,'INFORME DE MATRICULA',1,1,'C',1);
  // print: cell(witdth, height, text, borde(0-1, tambien(L,R,B,T)), nextline,aling(L,R,C),color(0,1))
  // $pdf->Image('../assets/fotos/'.$estudiante['foto'],10,40,20,0,'','');
  $pdf->Ln(10);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(20,6,'El estudiante',1,0,'L',1);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(75,6, utf8_decode( $datos_matricula['primer_nombre']." ".$datos_matricula['segundo_nombre']." ".$datos_matricula['primer_apellido']." ".$datos_matricula['segundo_apellido']),1,0,'C',1);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(30,6,' Documento ',1,0,'L',1);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(0,6, utf8_decode( $datos_matricula['documento_estudiante']),1,1,'C',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(60,6,' Se encuentra actualmente matriculado en ',1,0,'L',1);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(0,6, utf8_decode( $datos_matricula['programa_nombre']),1,1,'C',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(60,6,'Semestre ',1,0,'L',1);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(40,6,$datos_matricula['semestre'],1,0,'C',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(30,6,' periodo ',1,0,'L',1);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(0,6, utf8_decode( $datos_matricula['periodo']),1,1,'C',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(25,6,utf8_decode(' Institución EB '),1,0,'L',1);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(0,6, utf8_decode( $datos_matricula['sede']),1,1,'C',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(65,6, utf8_decode(' impartido por la Universidad/Institución '),1,0,'L',1);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(0,6, utf8_decode( $datos_matricula['universidad']),1,1,'C',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(35,6,'Su fecha de inicio es ',1,0,'L',1);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(30,6, utf8_decode( $datos_matricula['fecha_inicio']),1,1,'L',0);

  $pdf->Ln(40);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(30,6, utf8_decode('Ultima actualización'),1,0,'L',1);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(40,6, utf8_decode( $datos_matricula['fecha_modificacion']),1,1,'L',0);
  // $pdf->SetFont('Arial','B',8);
  // $pdf->Cell(30,6, utf8_decode('Jornada'),1,0,'L',1);
  // $pdf->SetFont('Arial','',7);
  // $pdf->Cell(20,6, utf8_decode( $datos_matricula['jornada']),1,1,'L',0);
  // $pdf->SetFont('Arial','B',8);
  // $pdf->Cell(30,6, utf8_decode('IES'),1,0,'L',1);
  // $pdf->SetFont('Arial','',7);
  // $pdf->Cell(80,6, utf8_decode( $datos_matricula['universidad']),1,0,'L',0);
  
  
  // Envio del fichero
  // I: Envia el fichero al navegador usando la extension plugin
  // D: Envia el ficheroal navegador y fuerza su descarga
  // F: Guarda el fichero en uno local de nombre name
  // S: Devuelve el documento como una cadena
  $pdf->Output('I',$datos_matricula['documento_estudiante'].'.pdf');
?>