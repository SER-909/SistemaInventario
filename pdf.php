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
    $this->SetFillColor(93, 243, 222);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    
    // Movernos a la derecha
    $this->Cell(60);

    // Título
    $this->Cell(70,10,'Tabla de usuarios',0,0,'C');
    // Salto de línea
   
    $this->Ln(30);
    $this->SetFont('Arial','B',9);
    $this->SetX(8);
    $this->Cell(10,10,'ID',0,0,'C',1);
    $this->Cell(10,10,'Tipo',0,0,'C',1);
    $this->Cell(15,10,'Estado',0,0,'C',1);
    $this->Cell(15,10,'Marca',0,0,'C',1);
    $this->Cell(25,10,'Modelo',0,0,'C',1);
    $this->Cell(25,10,utf8_decode('N° Serie'),0,0,'C',1);
    $this->Cell(25,10,"Inventario",0,0,'C',1);  
    $this->Cell(15,10,'RAM',0,0,'C',1);  
    $this->Cell(26,10,'Almacenamiento',0,0,'C',1);  
    $this->Cell(31,10,'S.O',0,1,'C',1);  
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
    $this->setX(130);
    $this->Cell(0,-15,utf8_decode('INDUSTRIA DE ALIMENTOS NUTRIWELL S.A DE C.V.'));
    $this->setX(126);
    $this->Cell(0,-9,utf8_decode('Alberto Chemor Avila No. 140 Parque Industrial Exportec ll'));
    $this->setX(145);
    $this->Cell(0,-3,utf8_decode('San Miguel Totoltepec. C.P. 50223. México.'));
}
}

include "modelo/conexion.php";

$sql = $conexion->query("select equipos.id,equipos.tipo,equipos.estado,equipos.numSerie,equipos.claveInventario,equipos.cantidadRam,equipos.cantidadAlmacenamiento,marca.nombre as nombreM,modelo.num,sistema_operativo.so from equipos INNER JOIN modelo ON equipos.id_modelo = modelo.id INNER JOIN marca on modelo.id_marca = marca.id INNER JOIN sistema_operativo ON equipos.id_sistema_operativo = sistema_operativo.id where equipos.activo = 1 GROUP BY equipos.id");


$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);
$pdf->Image('img/hojas.png',-10,240,60,80);
$pdf->Image('img/logo_nutri.jpeg',90,5,38);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));

$pdf->SetFillColor(192, 242, 178);
$fill = false;
while($datos = $sql->fetch_object()){

    $pdf->SetX(8);
    $pdf->Cell(10,10,$datos->id,'B',0,'C',$fill);
    $pdf->Cell(10,10,$datos->tipo,'B',0,'C',$fill);
	$pdf->Cell(15,10,$datos->estado,'B',0,'C',$fill);
    $pdf->Cell(15,10,$datos->nombreM,'B',0,'C',$fill);
    $pdf->Cell(25,10,$datos->num,'B',0,'C',$fill);
    $pdf->Cell(25,10,$datos->numSerie,'B',0,'C',$fill);
    $pdf->Cell(25,10,$datos->claveInventario,'B',0,'C',$fill);
    $pdf->Cell(15,10,$datos->cantidadRam,'B',0,'C',$fill);
    $pdf->Cell(26,10,$datos->cantidadAlmacenamiento,'B',0,'C',$fill);
    $pdf->Cell(31,10,$datos->so,'B',1,'C',$fill);
	$fill = !$fill;
} 
	$pdf->Output();
    ob_end_flush(); 
?>

