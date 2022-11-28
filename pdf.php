<script src="controlador/js/buscador.js"></script>

<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: modelo/login.php");
    die();
}


?>


<?php
ob_start();
require ('fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    //$this->image('../img/logo.png', 150, 1, 60); // X, Y, Tamaño
    $this->Ln(20);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
  
    // Movernos a la derecha
    $this->Cell(60);

    // Título
    $this->Cell(70,10,'Tabla de usuarios',0,0,'C');
    // Salto de línea
   
    $this->Ln(30);
    $this->SetFont('Arial','B',10);
    $this->SetX(8);
    $this->Cell(25,10,'ID',1,0,'C',0);
    $this->Cell(40,10,'Marca',1,0,'C',0,);
    $this->Cell(27,10,'Modelo',1,0,'C',0);
    $this->Cell(27,10,'Num de Serie',1,0,'C',0);
    $this->Cell(40,10,'Clave de Inventario',1,0,'C',0);
    $this->Cell(30,10,'tipo',1,1,'C',0);  
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
  
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
   $this->SetFillColor(223, 229,235);
    $this->SetDrawColor(181, 14,246);
    $this->Ln(0.5);
}
}

include "modelo/conexion.php";

$sql = $conexion->query("select * from equipos");


$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while($datos = $sql->fetch_object()){

    $pdf->SetX(8);
    $pdf->Cell(25,10,$datos->id,1,0,'C',0);
    $pdf->Cell(40,10,$datos->marca,1,0,'C',0);
	$pdf->Cell(27,10,$datos->modelo,1,0,'C',0);
    $pdf->Cell(27,10,$datos->numSerie,1,0,'C',0);
    $pdf->Cell(40,10,$datos->claveInventario,1,0,'C',0);
    $pdf->Cell(30,10,$datos->tipo,1,1,'C',0);
	
} 
	$pdf->Output();
    ob_end_flush(); 
?>

