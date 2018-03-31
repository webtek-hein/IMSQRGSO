<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('fpdflib/fpdf.php');

class generatepdf extends FPDF
{
    public function test(){
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Hello World!');
        $pdf->Output();
    }
}