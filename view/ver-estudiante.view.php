<?php 
  // require '../libs/fpdf/fpdf.php';
  require 'template-reporte.php';

  require_once '../admin/config.php';
  require_once '../php/Conexion.php';
  require_once '../php/funciones.php';
  

  $cn = getConexion($bd_config);
  comprobarConexion($cn);
  
  $documento = $_GET['dc'];
  
  $estudiante = getAllStudentRelations($documento,$cn);
  // var_dump($estudiante);
  $matricula = getMatricula($estudiante['id'],$cn);
  // var_dump($matricula);
  $historial = getHistorialEstudiante($documento,$cn);
  // var_dump($historial);

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
  $pdf->SetFont('Arial','',7);
  // print: cell(witdth, height, text, borde(0-1, tambien(L,R,B,T)), nextline,aling(L,R,C),color(0,1))
  $pdf->Image('../assets/fotos/'.$estudiante['foto'],10,40,20,0,'','');
  $pdf->Ln(15);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(20,6,'Documento',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(20,6,$estudiante['documento_estudiante'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(28,6,'Tipo de documento',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(40,6,$estudiante['tipo_doc'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(15,6,'Nombre',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(55,6, utf8_decode( $estudiante['primer_nombre']." ".$estudiante['segundo_nombre']." ".$estudiante['primer_apellido']." ".$estudiante['segundo_apellido']),0,1,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(20,6,'Zona',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(20,6,$estudiante['zona'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(28,6,'EPS',0,0,'L',0);
  $pdf->SetFont('Arial','',5);
  $pdf->Cell(55,6,$estudiante['eps'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(26,6,'Fecha nacimiento',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(55,6,$estudiante['fecha_nacimiento'],0,1,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(20,6,'Edad',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(20,6,$estudiante['edad'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(28,6,'Sisben',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(24,6,$estudiante['siben'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(16,6,'Estrato',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(15,6,$estudiante['estrato'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(35,6,'Municipio procedencia',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(35,6,$estudiante['muni_naci'],0,1,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(40,6,'Municipio de residencia',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(28,6,$estudiante['muni_resi'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,6,utf8_decode('Dirección'),0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(50,6,$estudiante['direccion_residencia'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(20,6,'Prioritaria',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(40,6,$estudiante['prioritaria'],0,1,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(20,6,'Estrategia',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(48,6,$estudiante['estrategia'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(24,6,utf8_decode('Condonación'),0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(5,6,$estudiante['condonacion_credito'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(26,6,'Fecha de inicio',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(30,6,$estudiante['fecha_inicio'],0,1,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(20,6,'Fecha fin',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(25,6,$estudiante['fecha_fin'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(23,6,'Puntage sisben',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(10,6,$estudiante['puntaje_sisben'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(14,6,'Estado',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(31,6,$estudiante['estado'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(20,6,'Sede',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(60,6,$estudiante['sede'],0,1,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(20,6,'Grado',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(7,6,$estudiante['grado'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(26,6,'Servicio social',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(25,6,$estudiante['servicio_social'],0,0,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(35,6,'Lugar servicio social',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(50,6,$estudiante['lugar_servicio_social'],0,1,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(27,6,'Nombre acudiente',0,0,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(50,6,utf8_decode($estudiante['nombre_acu']),0,1,'L',0);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(26,6,'Observaciones',0,1,'L',0);
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(0,6,utf8_decode($estudiante['observacion']),0,1,'L',0);
  // Envio del fichero
  // I: Envia el fichero al navegador usando la extension plugin
  // D: Envia el ficheroal navegador y fuerza su descarga
  // F: Guarda el fichero en uno local de nombre name
  // S: Devuelve el documento como una cadena
  $pdf->Output('I',$estudiante['documento_estudiante'].'.pdf');
?>