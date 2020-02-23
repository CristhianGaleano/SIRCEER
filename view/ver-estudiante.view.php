<?php 
  require '../libs/fpdf/fpdf.php';

  // Creacion object FPDF
  $pdf = new FPDF();
  // Add new page, size paper, rotacion, etc
  $pdf->AddPage();
  // font family: type,style and size
  $pdf->SetFont('Arial','B',18);
  // print: cell(witdth, height, text, borde, nextline,aling(L,R,C),color)
  $pdf->Cell(120,12,'Hola mundo', 1,1,'L');
  $pdf->Output();
?>