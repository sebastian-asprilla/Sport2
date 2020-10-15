<?php
require('fpdf/fpdf.php');

require('bd/cn.php');
$consulta = "SELECT * FROM goleadores";
$resultado = $mysqli->query($consulta);




class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(80,10,'Reporte de tabla de goleadores',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(100, 10, 'nombre', 1, 0, 'C', 0);
    $this->Cell(90, 10,  'goles', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}







$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(100, 10, $row['nombre'], 1, 0, 'C', 0);
    $pdf->Cell(90, 10, $row['goles'], 1, 1, 'C', 0);
}


$pdf->Output();
?>