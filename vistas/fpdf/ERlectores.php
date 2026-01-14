<<<<<<< HEAD
<?php
require('./fpdf.php');

class PDF extends FPDF
{
    public $tableWidth = 273; 

    function Header()
    {
        $this->Image('../../assets/images/logo.png', 230, 10, 28);

        $this->SetFont('Arial', 'B', 19);
        $this->Cell(80);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(110, 15, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(7);

        $cond = isset($_GET['condicion']) ? strtoupper($_GET['condicion']) : "SIN FILTRO";

        $this->SetFont('Arial', 'B', 15);
        $this->SetTextColor(184, 134, 11);
        $this->Cell(0, 10, utf8_decode("REPORTE DE LECTORES ($cond)"), 0, 1, 'C');
        $this->Ln(7);

        $x = ($this->GetPageWidth() - $this->tableWidth) / 2;
        $this->SetX($x);

        $this->SetFillColor(184,134,11);
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(218,165,32);
        $this->SetFont('Arial','B',11);

        $this->Cell(18,10,utf8_decode("CÓD"),1,0,'C',1);
        $this->Cell(70,10,utf8_decode("NOMBRE"),1,0,'C',1);
        $this->Cell(90,10,utf8_decode("DIRECCIÓN"),1,0,'C',1);
        $this->Cell(35,10,utf8_decode("TELÉFONO"),1,0,'C',1);
        $this->Cell(25,10,utf8_decode("COND."),1,0,'C',1);
        $this->Cell(35,10,utf8_decode("REGISTRO"),1,1,'C',1);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode("Página ").$this->PageNo()."/{nb}",0,0,'C');

        $this->SetY(-15);
        $this->Cell(520,10,utf8_decode(date('d/m/Y')),0,0,'C');
    }
}

require '../../modelos/conexion.php';
$conex = new Conexion();

$cond = $_GET['condicion'];

$stmt = $conex->prepare("SELECT * FROM lectores WHERE condicion = ?");
$stmt->bindParam(1,$cond);
$stmt->execute();

$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',11);
$pdf->SetDrawColor(218,165,32);

$x = ($pdf->GetPageWidth() - $pdf->tableWidth) / 2;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pdf->SetX($x);

    $pdf->Cell(18,10,utf8_decode($row['id_lector']),1,0,'C');
    $pdf->Cell(70,10,utf8_decode($row['nom_lector']),1,0,'L');
    $pdf->Cell(90,10,utf8_decode($row['direccion']),1,0,'L');
    $pdf->Cell(35,10,utf8_decode($row['telefono']),1,0,'C');
    $pdf->Cell(25,10,utf8_decode($row['condicion']),1,0,'C');
    $pdf->Cell(35,10,utf8_decode(date("d/m/Y", strtotime($row['fecha_registro']))),1,1,'C');
}

$pdf->Output('ERlectores.pdf','I');
=======
<?php
require('./fpdf.php');

class PDF extends FPDF
{
    public $tableWidth = 273; 

    function Header()
    {
        $this->Image('../../assets/images/logo.png', 230, 10, 28);

        $this->SetFont('Arial', 'B', 19);
        $this->Cell(80);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(110, 15, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(7);

        $cond = isset($_GET['condicion']) ? strtoupper($_GET['condicion']) : "SIN FILTRO";

        $this->SetFont('Arial', 'B', 15);
        $this->SetTextColor(184, 134, 11);
        $this->Cell(0, 10, utf8_decode("REPORTE DE LECTORES ($cond)"), 0, 1, 'C');
        $this->Ln(7);

        $x = ($this->GetPageWidth() - $this->tableWidth) / 2;
        $this->SetX($x);

        $this->SetFillColor(184,134,11);
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(218,165,32);
        $this->SetFont('Arial','B',11);

        $this->Cell(18,10,utf8_decode("CÓD"),1,0,'C',1);
        $this->Cell(70,10,utf8_decode("NOMBRE"),1,0,'C',1);
        $this->Cell(90,10,utf8_decode("DIRECCIÓN"),1,0,'C',1);
        $this->Cell(35,10,utf8_decode("TELÉFONO"),1,0,'C',1);
        $this->Cell(25,10,utf8_decode("COND."),1,0,'C',1);
        $this->Cell(35,10,utf8_decode("REGISTRO"),1,1,'C',1);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode("Página ").$this->PageNo()."/{nb}",0,0,'C');

        $this->SetY(-15);
        $this->Cell(520,10,utf8_decode(date('d/m/Y')),0,0,'C');
    }
}

require '../../modelos/conexion.php';
$conex = new Conexion();

$cond = $_GET['condicion'];

$stmt = $conex->prepare("SELECT * FROM lectores WHERE condicion = ?");
$stmt->bindParam(1,$cond);
$stmt->execute();

$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',11);
$pdf->SetDrawColor(218,165,32);

$x = ($pdf->GetPageWidth() - $pdf->tableWidth) / 2;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pdf->SetX($x);

    $pdf->Cell(18,10,utf8_decode($row['id_lector']),1,0,'C');
    $pdf->Cell(70,10,utf8_decode($row['nom_lector']),1,0,'L');
    $pdf->Cell(90,10,utf8_decode($row['direccion']),1,0,'L');
    $pdf->Cell(35,10,utf8_decode($row['telefono']),1,0,'C');
    $pdf->Cell(25,10,utf8_decode($row['condicion']),1,0,'C');
    $pdf->Cell(35,10,utf8_decode(date("d/m/Y", strtotime($row['fecha_registro']))),1,1,'C');
}

$pdf->Output('ERlectores.pdf','I');
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>