<?php

require '../libs/fpdf/fpdf.php';

class PDF extends FPDF{

    function Header()
    {
        $this->AddLink();
        $this->Image('../assets/imagenes/gobernacion1.jpg',10,15,15,0,'','www.goggle.com');
        $this->SetFont('Arial','B',18);
        $this->Cell(60);
        $this->Cell(80,16,utf8_decode('Gobernación de Risaralda'),'B',1,'C',0);
        $this->SetFont('Arial','B',14);
        $this->Cell(80);
        $this->Cell(30,10,'',0,1,'C');
        $this->Ln(10);
    }

    
    function Footer()
    {
        
        $this->SetY(-18);
        $this->SetFont('Arial','I',12);
        $this->AddLink();
        $this->Cell(5,10,'www.google.com',0,0,'L');
        $this->SetFont('Arial','I',10);
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().' de {nb}',0,0,'C');
    }
}


?>