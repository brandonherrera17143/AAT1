<?php

namespace controller\pdf;

require 'vendor/autoload.php';

use FPDF as GlobalFPDF;

class PDF extends GlobalFPDF

{
    public $title = "";

    function header()
    {
        //$this->Image('Assets/logo_intecap.png', 10, 6, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        //$this->Cell(30, 10, $this->title, 1, 0, 'C');
        // Line break
        $this->Ln(20);
    }
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
