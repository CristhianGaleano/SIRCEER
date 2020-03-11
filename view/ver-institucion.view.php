<?php 
  // require '../libs/fpdf/fpdf.php';
  require 'template-reporte.php';

  require_once '../admin/config.php';
  require_once '../php/Conexion.php';
  require_once '../php/funciones.php';
  

  $cn = getConexion($bd_config);
  comprobarConexion($cn);
  
  $id = $_GET['id'];
  
  $colegio=getProgramaAndUniversidadNivelAcaAndJornada($id,$cn);

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
  $pdf->SetFont('Arial','',9);
  $pdf->Cell(0,6,'INFORME DE PROGRAMA',1,1,'C',1);
  // print: cell(witdth, height, text, borde(0-1, tambien(L,R,B,T)), nextline,aling(L,R,C),color(0,1))
  // $pdf->Image('../assets/fotos/'.$estudiante['foto'],10,40,20,0,'','');
  // $pdf->Ln(15);
  // $pdf->SetFont('Arial','B',8);
  // $pdf->Cell(20,6,'Nombre',1,0,'L',1);
  // $pdf->SetFont('Arial','',7);
  // $pdf->Cell(0,6, utf8_decode( $programa['programa']),1,1,'C',0);
  // $pdf->SetFont('Arial','B',8);
  // $pdf->Cell(20,6,'SNIES',1,0,'L',1);
  // $pdf->SetFont('Arial','',7);
  // $pdf->Cell(20,6,$programa['snies'],1,1,'L',0);
  // $pdf->SetFont('Arial','B',8);
  // $pdf->Cell(40,6,'Cantidad de semestres',1,0,'L',1);
  // $pdf->SetFont('Arial','',7);
  // $pdf->Cell(20,6, utf8_decode( $programa['cantidad_semestre']),1,1,'L',0);
  // $pdf->SetFont('Arial','B',8);
  // $pdf->Cell(30,6,'Valor matricula',1,0,'L',1);
  // $pdf->SetFont('Arial','',7);
  // $pdf->Cell(20,6, utf8_decode( $programa['costo_semestre']),1,1,'L',0);
  // $pdf->SetFont('Arial','B',8);
  // $pdf->Cell(30,6, utf8_decode('Nivel académico'),1,0,'L',1);
  // $pdf->SetFont('Arial','',7);
  // $pdf->Cell(20,6, utf8_decode( $programa['nivel']),1,1,'L',0);
  // $pdf->SetFont('Arial','B',8);
  // $pdf->Cell(30,6, utf8_decode('Jornada'),1,0,'L',1);
  // $pdf->SetFont('Arial','',7);
  // $pdf->Cell(20,6, utf8_decode( $programa['jornada']),1,1,'L',0);
  // $pdf->SetFont('Arial','B',8);
  // $pdf->Cell(30,6, utf8_decode('IES'),1,0,'L',1);
  // $pdf->SetFont('Arial','',7);
  // $pdf->Cell(80,6, utf8_decode( $programa['universidad']),1,0,'L',0);
  
  
  // Envio del fichero
  // I: Envia el fichero al navegador usando la extension plugin
  // D: Envia el ficheroal navegador y fuerza su descarga
  // F: Guarda el fichero en uno local de nombre name
  // S: Devuelve el documento como una cadena
  $pdf->Output('I',$estudiante['documento_estudiante'].'.pdf');
?>