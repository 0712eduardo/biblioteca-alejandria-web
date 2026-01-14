<<<<<<< HEAD
<?php
require('./fpdf.php');

class PDF extends FPDF
{
    public $tableWidth = 250;

    function Header()
    {
        $this->Image('../../assets/images/logo.png', 230, 10, 28);

        $this->SetFont('Arial', 'B', 19);
        $this->Cell(80);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(110, 15, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(7);

        $mes = isset($_GET['mes']) ? intval($_GET['mes']) : 0;
        $anio = isset($_GET['anio']) ? intval($_GET['anio']) : 0;

        $meses = [
            1 => "ENERO", 2 => "FEBRERO", 3 => "MARZO", 4 => "ABRIL",
            5 => "MAYO", 6 => "JUNIO", 7 => "JULIO", 8 => "AGOSTO",
            9 => "SETIEMBRE", 10 => "OCTUBRE", 11 => "NOVIEMBRE", 12 => "DICIEMBRE"
        ];

        $textoPeriodo = "SIN PERIODO";
        if ($mes > 0 && $anio > 0 && isset($meses[$mes])) {
            $textoPeriodo = $meses[$mes] . " - " . $anio;
        }

        $this->SetFont('Arial', 'B', 15);
        $this->SetTextColor(184, 134, 11);
        $this->Cell(0, 10, utf8_decode("REPORTE DE PRÉSTAMOS ($textoPeriodo)"), 0, 1, 'C');
        $this->Ln(7);

        $x = ($this->GetPageWidth() - $this->tableWidth) / 2;
        $this->SetX($x);

        $this->SetFillColor(184,134,11);
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(218,165,32);
        $this->SetFont('Arial','B',10);

        $this->Cell(15,10,utf8_decode("CÓD"),1,0,'C',1);
        $this->Cell(70,10,utf8_decode("LIBRO"),1,0,'C',1);
        $this->Cell(60,10,utf8_decode("LECTOR"),1,0,'C',1);
        $this->Cell(30,10,utf8_decode("F. PRÉST."),1,0,'C',1);
        $this->Cell(30,10,utf8_decode("F. DEV."),1,0,'C',1);
        $this->Cell(15,10,utf8_decode("CANT."),1,0,'C',1);
        $this->Cell(30,10,utf8_decode("COND."),1,1,'C',1);
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

$mes  = isset($_GET['mes']) ? intval($_GET['mes']) : 0;
$anio = isset($_GET['anio']) ? intval($_GET['anio']) : 0;

$sql = "SELECT 
            p.idprestamo,
            l.titulo,
            le.nom_lector,
            p.fechaPrestamo,
            p.fechaDevolucion,
            p.cantidad,
            p.condicion
        FROM prestamo p
        INNER JOIN libro l ON p.id_libro = l.id_libro
        INNER JOIN lectores le ON p.id_lector = le.id_lector
        WHERE MONTH(p.fechaPrestamo) = ? 
          AND YEAR(p.fechaPrestamo) = ?
        ORDER BY p.fechaPrestamo ASC";

$stmt = $conex->prepare($sql);
$stmt->bindParam(1, $mes, PDO::PARAM_INT);
$stmt->bindParam(2, $anio, PDO::PARAM_INT);
$stmt->execute();

$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',9);
$pdf->SetDrawColor(218,165,32);

$x = ($pdf->GetPageWidth() - $pdf->tableWidth) / 2;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pdf->SetX($x);

    $pdf->Cell(15,8,utf8_decode($row['idprestamo']),1,0,'C');
    $pdf->Cell(70,8,utf8_decode($row['titulo']),1,0,'L');
    $pdf->Cell(60,8,utf8_decode($row['nom_lector']),1,0,'L');
    $pdf->Cell(30,8,utf8_decode(date("d/m/Y", strtotime($row['fechaPrestamo']))),1,0,'C');
    $pdf->Cell(30,8,utf8_decode(date("d/m/Y", strtotime($row['fechaDevolucion']))),1,0,'C');
    $pdf->Cell(15,8,utf8_decode($row['cantidad']),1,0,'C');
    $pdf->Cell(30,8,utf8_decode($row['condicion']),1,1,'C');
}

$pdf->Output('ERprestamos.pdf','I');
=======
<?php
require('./fpdf.php');

class PDF extends FPDF
{
    public $tableWidth = 250;

    function Header()
    {
        $this->Image('../../assets/images/logo.png', 230, 10, 28);

        $this->SetFont('Arial', 'B', 19);
        $this->Cell(80);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(110, 15, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(7);

        $mes = isset($_GET['mes']) ? intval($_GET['mes']) : 0;
        $anio = isset($_GET['anio']) ? intval($_GET['anio']) : 0;

        $meses = [
            1 => "ENERO", 2 => "FEBRERO", 3 => "MARZO", 4 => "ABRIL",
            5 => "MAYO", 6 => "JUNIO", 7 => "JULIO", 8 => "AGOSTO",
            9 => "SETIEMBRE", 10 => "OCTUBRE", 11 => "NOVIEMBRE", 12 => "DICIEMBRE"
        ];

        $textoPeriodo = "SIN PERIODO";
        if ($mes > 0 && $anio > 0 && isset($meses[$mes])) {
            $textoPeriodo = $meses[$mes] . " - " . $anio;
        }

        $this->SetFont('Arial', 'B', 15);
        $this->SetTextColor(184, 134, 11);
        $this->Cell(0, 10, utf8_decode("REPORTE DE PRÉSTAMOS ($textoPeriodo)"), 0, 1, 'C');
        $this->Ln(7);

        $x = ($this->GetPageWidth() - $this->tableWidth) / 2;
        $this->SetX($x);

        $this->SetFillColor(184,134,11);
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(218,165,32);
        $this->SetFont('Arial','B',10);

        $this->Cell(15,10,utf8_decode("CÓD"),1,0,'C',1);
        $this->Cell(70,10,utf8_decode("LIBRO"),1,0,'C',1);
        $this->Cell(60,10,utf8_decode("LECTOR"),1,0,'C',1);
        $this->Cell(30,10,utf8_decode("F. PRÉST."),1,0,'C',1);
        $this->Cell(30,10,utf8_decode("F. DEV."),1,0,'C',1);
        $this->Cell(15,10,utf8_decode("CANT."),1,0,'C',1);
        $this->Cell(30,10,utf8_decode("COND."),1,1,'C',1);
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

$mes  = isset($_GET['mes']) ? intval($_GET['mes']) : 0;
$anio = isset($_GET['anio']) ? intval($_GET['anio']) : 0;

$sql = "SELECT 
            p.idprestamo,
            l.titulo,
            le.nom_lector,
            p.fechaPrestamo,
            p.fechaDevolucion,
            p.cantidad,
            p.condicion
        FROM prestamo p
        INNER JOIN libro l ON p.id_libro = l.id_libro
        INNER JOIN lectores le ON p.id_lector = le.id_lector
        WHERE MONTH(p.fechaPrestamo) = ? 
          AND YEAR(p.fechaPrestamo) = ?
        ORDER BY p.fechaPrestamo ASC";

$stmt = $conex->prepare($sql);
$stmt->bindParam(1, $mes, PDO::PARAM_INT);
$stmt->bindParam(2, $anio, PDO::PARAM_INT);
$stmt->execute();

$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',9);
$pdf->SetDrawColor(218,165,32);

$x = ($pdf->GetPageWidth() - $pdf->tableWidth) / 2;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pdf->SetX($x);

    $pdf->Cell(15,8,utf8_decode($row['idprestamo']),1,0,'C');
    $pdf->Cell(70,8,utf8_decode($row['titulo']),1,0,'L');
    $pdf->Cell(60,8,utf8_decode($row['nom_lector']),1,0,'L');
    $pdf->Cell(30,8,utf8_decode(date("d/m/Y", strtotime($row['fechaPrestamo']))),1,0,'C');
    $pdf->Cell(30,8,utf8_decode(date("d/m/Y", strtotime($row['fechaDevolucion']))),1,0,'C');
    $pdf->Cell(15,8,utf8_decode($row['cantidad']),1,0,'C');
    $pdf->Cell(30,8,utf8_decode($row['condicion']),1,1,'C');
}

$pdf->Output('ERprestamos.pdf','I');
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>