<?php
require_once('vendor/autoload.php');
use setasign\Fpdi\Fpdi;

$pdf = new Fpdi();
$pdf->AddPage();
$pdf->setSourceFile("files/pdf/medical_cert.pdf");
$tplId = $pdf->importPage(1);
$pdf->useTemplate($tplId, 0, 0);
$pdf->SetFont('Arial','',9);

$date = date('F d, Y');
$patient = strtoupper('carlo jimenez');
$doctor = strtoupper('ddddda asdssds');
$pdf->Cell(133);
$pdf->Cell(1,120,$date);
$pdf->Cell(-35);
$pdf->Cell(72,175,$patient,0,1,'C');
$pdf->SetXY(83,111);
$pdf->Cell(41,5,$doctor,0,1,'C');

// Centered text in a framed 20*10 mm cell and line break
// $pdf->Cell(20, 10, 'Titleadsad', 1, 1, 'C');
$pdf->Output();       