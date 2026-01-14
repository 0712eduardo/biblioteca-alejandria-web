<<<<<<< HEAD
<?php
require('./fpdf.php');

class PDF extends FPDF
{
  
    function GetCellHeight($w, $txt)
    {
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;

        $wmax = ($w - 2) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);

        if ($nb > 0 && $s[$nb - 1] == "\n")
            $nb--;

        $sep = -1;
        $i = 0; 
        $j = 0; 
        $l = 0;
        $nl = 1;

        while ($i < $nb) {
            $c = $s[$i];

            if ($c == "\n") {
                $i++; 
                $sep = -1; 
                $j = $i; 
                $l = 0; 
                $nl++;
                continue;
            }

            if ($c == ' ')
                $sep = $i;

            $l += $cw[$c];

            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;

                $sep = -1; 
                $j = $i; 
                $l = 0; 
                $nl++;
            } else
                $i++;
        }

        return $nl * 7;
    }


    function Row($data)
    {
        $nb = 0;

        for ($i = 0; $i < count($data); $i++) {
            $nb = max($nb, $this->GetCellHeight($this->widths[$i], utf8_decode($data[$i])));
        }

        $h = $nb;

        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
        }

        $this->SetX(25);

        $this->SetDrawColor(218,165,32);

        for ($i = 0; $i < count($data); $i++) {

            $w  = $this->widths[$i];
            $txt = utf8_decode($data[$i]);

            $x = $this->GetX();
            $y = $this->GetY();

            $this->Rect($x, $y, $w, $h);

            $this->MultiCell($w, 7, $txt, 0, $this->aligns[$i]);

            $this->SetXY($x + $w, $y);
        }

        $this->Ln($h);
    }

    function SetWidths($w) { $this->widths = $w; }
    function SetAligns($a) { $this->aligns = $a; }

    function Header()
    {
        $this->Image('../../assets/images/logo.png', 245, 10, 25);

        $this->SetFont('Arial', 'B', 18);
        $this->Cell(70);
        $this->SetTextColor(0,0,0);
        $this->Cell(120, 12, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(5);

        $this->SetTextColor(184,134,11);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(90);
        $this->Cell(100, 10, utf8_decode("REPORTE GENERAL DE PRÉSTAMOS"), 0, 1, 'C');
        $this->Ln(5);

        $this->SetX(25);

        $this->SetFillColor(184, 134, 11);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(218,165,32);
        $this->SetFont('Arial', 'B', 11);

        $this->Cell(15, 10, "ID", 1, 0, 'C', 1);
        $this->Cell(60, 10, utf8_decode("LECTOR"), 1, 0, 'C', 1);
        $this->Cell(65, 10, utf8_decode("LIBRO"), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode("F. PRÉSTAMO"), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode("F. DEVOLUCIÓN"), 1, 0, 'C', 1);
        $this->Cell(20, 10, "CANT", 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode("ESTADO"), 1, 1, 'C', 1);

        $this->SetTextColor(0,0,0);
    }


    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);

        $this->Cell(0, 10, "Página ".$this->PageNo()."/{nb}", 0, 0, 'C');

        $this->SetY(-15);
        $this->Cell(530, 10, date('d/m/Y'), 0, 0, 'C');
    }
}

require '../../modelos/conexion.php';
$conex = new Conexion();

$stmt = $conex->prepare("
    SELECT p.idprestamo, p.fechaPrestamo, p.fechaDevolucion, 
           p.cantidad, p.condicion,
           l.titulo AS libro,
           lec.nom_lector AS lector
    FROM prestamo p
    INNER JOIN libro l ON p.id_libro = l.id_libro
    INNER JOIN lectores lec ON p.id_lector = lec.id_lector
    ORDER BY p.idprestamo ASC
");
$stmt->execute();


$pdf = new PDF("L","mm","A4");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);

$pdf->SetWidths([15, 60, 65, 30, 30, 20, 25]);
$pdf->SetAligns(['C','L','L','C','C','C','C']);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pdf->Row([
        $row['idprestamo'],
        $row['lector'],
        $row['libro'],
        $row['fechaPrestamo'],
        $row['fechaDevolucion'],
        $row['cantidad'],
        $row['condicion']
    ]);
}

$pdf->Output('RPrestamos.pdf', 'I');
=======
<?php
require('./fpdf.php');

class PDF extends FPDF
{
  
    function GetCellHeight($w, $txt)
    {
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;

        $wmax = ($w - 2) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);

        if ($nb > 0 && $s[$nb - 1] == "\n")
            $nb--;

        $sep = -1;
        $i = 0; 
        $j = 0; 
        $l = 0;
        $nl = 1;

        while ($i < $nb) {
            $c = $s[$i];

            if ($c == "\n") {
                $i++; 
                $sep = -1; 
                $j = $i; 
                $l = 0; 
                $nl++;
                continue;
            }

            if ($c == ' ')
                $sep = $i;

            $l += $cw[$c];

            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;

                $sep = -1; 
                $j = $i; 
                $l = 0; 
                $nl++;
            } else
                $i++;
        }

        return $nl * 7;
    }


    function Row($data)
    {
        $nb = 0;

        for ($i = 0; $i < count($data); $i++) {
            $nb = max($nb, $this->GetCellHeight($this->widths[$i], utf8_decode($data[$i])));
        }

        $h = $nb;

        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
        }

        $this->SetX(25);

        $this->SetDrawColor(218,165,32);

        for ($i = 0; $i < count($data); $i++) {

            $w  = $this->widths[$i];
            $txt = utf8_decode($data[$i]);

            $x = $this->GetX();
            $y = $this->GetY();

            $this->Rect($x, $y, $w, $h);

            $this->MultiCell($w, 7, $txt, 0, $this->aligns[$i]);

            $this->SetXY($x + $w, $y);
        }

        $this->Ln($h);
    }

    function SetWidths($w) { $this->widths = $w; }
    function SetAligns($a) { $this->aligns = $a; }

    function Header()
    {
        $this->Image('../../assets/images/logo.png', 245, 10, 25);

        $this->SetFont('Arial', 'B', 18);
        $this->Cell(70);
        $this->SetTextColor(0,0,0);
        $this->Cell(120, 12, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(5);

        $this->SetTextColor(184,134,11);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(90);
        $this->Cell(100, 10, utf8_decode("REPORTE GENERAL DE PRÉSTAMOS"), 0, 1, 'C');
        $this->Ln(5);

        $this->SetX(25);

        $this->SetFillColor(184, 134, 11);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(218,165,32);
        $this->SetFont('Arial', 'B', 11);

        $this->Cell(15, 10, "ID", 1, 0, 'C', 1);
        $this->Cell(60, 10, utf8_decode("LECTOR"), 1, 0, 'C', 1);
        $this->Cell(65, 10, utf8_decode("LIBRO"), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode("F. PRÉSTAMO"), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode("F. DEVOLUCIÓN"), 1, 0, 'C', 1);
        $this->Cell(20, 10, "CANT", 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode("ESTADO"), 1, 1, 'C', 1);

        $this->SetTextColor(0,0,0);
    }


    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);

        $this->Cell(0, 10, "Página ".$this->PageNo()."/{nb}", 0, 0, 'C');

        $this->SetY(-15);
        $this->Cell(530, 10, date('d/m/Y'), 0, 0, 'C');
    }
}

require '../../modelos/conexion.php';
$conex = new Conexion();

$stmt = $conex->prepare("
    SELECT p.idprestamo, p.fechaPrestamo, p.fechaDevolucion, 
           p.cantidad, p.condicion,
           l.titulo AS libro,
           lec.nom_lector AS lector
    FROM prestamo p
    INNER JOIN libro l ON p.id_libro = l.id_libro
    INNER JOIN lectores lec ON p.id_lector = lec.id_lector
    ORDER BY p.idprestamo ASC
");
$stmt->execute();


$pdf = new PDF("L","mm","A4");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);

$pdf->SetWidths([15, 60, 65, 30, 30, 20, 25]);
$pdf->SetAligns(['C','L','L','C','C','C','C']);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pdf->Row([
        $row['idprestamo'],
        $row['lector'],
        $row['libro'],
        $row['fechaPrestamo'],
        $row['fechaDevolucion'],
        $row['cantidad'],
        $row['condicion']
    ]);
}

$pdf->Output('RPrestamos.pdf', 'I');
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>