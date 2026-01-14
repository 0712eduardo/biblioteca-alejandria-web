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
            } else {
                $i++;
            }
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

        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);

        for ($i = 0; $i < count($data); $i++) {

            $w = $this->widths[$i];
            $txt = utf8_decode($data[$i]);

            $x = $this->GetX();
            $y = $this->GetY();

            $this->SetDrawColor(218,165,32);

            $this->Rect($x, $y, $w, $h);

            $this->MultiCell($w, 7, $txt, 0, $this->aligns[$i]);

            $this->SetXY($x + $w, $y);
        }

        $this->Ln($h);
    }

    function SetWidths($w)
    {
        $this->widths = $w;
    }

    function SetAligns($a)
    {
        $this->aligns = $a;
    }


    function Header()
    {
        $this->Image('../../assets/images/logo.png', 260, 10, 25);

        $this->SetFont('Arial', 'B', 19);
        $this->Cell(90);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(120, 15, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(5);

        $this->SetTextColor(184, 134, 11);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(110);
        $this->Cell(100, 10, utf8_decode("REPORTE GENERAL DE FACTURAS"), 0, 1, 'C');
        $this->Ln(5);

        $this->SetFillColor(184, 134, 11);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(218,165,32);

        $this->SetFont('Arial', 'B', 11);

        $this->Cell(18, 10, utf8_decode("CÓD"), 1, 0, 'C', 1);
        $this->Cell(55, 10, utf8_decode("LECTOR"), 1, 0, 'C', 1);
        $this->Cell(70, 10, utf8_decode("LIBRO"), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode("TIPO"), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode("FECHA"), 1, 0, 'C', 1);
        $this->Cell(23, 10, utf8_decode("SUBT"), 1, 0, 'C', 1);
        $this->Cell(17, 10, utf8_decode("IGV"), 1, 0, 'C', 1);
        $this->Cell(23, 10, utf8_decode("TOTAL"), 1, 0, 'C', 1);
        $this->Cell(28, 10, utf8_decode("CONDICIÓN"), 1, 1, 'C', 1);

        $this->SetTextColor(0, 0, 0);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode("Página ").$this->PageNo().'/{nb}', 0, 0, 'C');

        $this->SetY(-15);
        $this->Cell(540, 10, date('d/m/Y'), 0, 0, 'C');
    }
}

require '../../modelos/conexion.php';
$conex = new Conexion();

$stmt = $conex->prepare("
    SELECT 
        f.id_factura,
        f.tipo,
        f.fecha,
        f.subtotal,
        f.igv,
        f.total,
        f.condicion,
        l.nom_lector AS lector,
        lb.titulo AS libro
    FROM factura f
    INNER JOIN prestamo p ON f.id_prestamo = p.idprestamo
    INNER JOIN lectores l ON p.id_lector = l.id_lector
    INNER JOIN libro lb ON p.id_libro = lb.id_libro
    ORDER BY f.id_factura ASC
");
$stmt->execute();

$pdf = new PDF("L", "mm", "A4");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 11);

$pdf->SetWidths([18, 55, 70, 25, 25, 23, 17, 23, 28]);
$pdf->SetAligns(['C','L','L','C','C','C','C','C','C']);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pdf->Row([
        $row['id_factura'],
        $row['lector'],
        $row['libro'],
        $row['tipo'],
        date("d/m/Y", strtotime($row['fecha'])),
        number_format($row['subtotal'],2),
        number_format($row['igv'],2),
        number_format($row['total'],2),
        $row['condicion']
    ]);
}

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
            } else {
                $i++;
            }
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

        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);

        for ($i = 0; $i < count($data); $i++) {

            $w = $this->widths[$i];
            $txt = utf8_decode($data[$i]);

            $x = $this->GetX();
            $y = $this->GetY();

            $this->SetDrawColor(218,165,32);

            $this->Rect($x, $y, $w, $h);

            $this->MultiCell($w, 7, $txt, 0, $this->aligns[$i]);

            $this->SetXY($x + $w, $y);
        }

        $this->Ln($h);
    }

    function SetWidths($w)
    {
        $this->widths = $w;
    }

    function SetAligns($a)
    {
        $this->aligns = $a;
    }


    function Header()
    {
        $this->Image('../../assets/images/logo.png', 260, 10, 25);

        $this->SetFont('Arial', 'B', 19);
        $this->Cell(90);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(120, 15, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(5);

        $this->SetTextColor(184, 134, 11);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(110);
        $this->Cell(100, 10, utf8_decode("REPORTE GENERAL DE FACTURAS"), 0, 1, 'C');
        $this->Ln(5);

        $this->SetFillColor(184, 134, 11);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(218,165,32);

        $this->SetFont('Arial', 'B', 11);

        $this->Cell(18, 10, utf8_decode("CÓD"), 1, 0, 'C', 1);
        $this->Cell(55, 10, utf8_decode("LECTOR"), 1, 0, 'C', 1);
        $this->Cell(70, 10, utf8_decode("LIBRO"), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode("TIPO"), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode("FECHA"), 1, 0, 'C', 1);
        $this->Cell(23, 10, utf8_decode("SUBT"), 1, 0, 'C', 1);
        $this->Cell(17, 10, utf8_decode("IGV"), 1, 0, 'C', 1);
        $this->Cell(23, 10, utf8_decode("TOTAL"), 1, 0, 'C', 1);
        $this->Cell(28, 10, utf8_decode("CONDICIÓN"), 1, 1, 'C', 1);

        $this->SetTextColor(0, 0, 0);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode("Página ").$this->PageNo().'/{nb}', 0, 0, 'C');

        $this->SetY(-15);
        $this->Cell(540, 10, date('d/m/Y'), 0, 0, 'C');
    }
}

require '../../modelos/conexion.php';
$conex = new Conexion();

$stmt = $conex->prepare("
    SELECT 
        f.id_factura,
        f.tipo,
        f.fecha,
        f.subtotal,
        f.igv,
        f.total,
        f.condicion,
        l.nom_lector AS lector,
        lb.titulo AS libro
    FROM factura f
    INNER JOIN prestamo p ON f.id_prestamo = p.idprestamo
    INNER JOIN lectores l ON p.id_lector = l.id_lector
    INNER JOIN libro lb ON p.id_libro = lb.id_libro
    ORDER BY f.id_factura ASC
");
$stmt->execute();

$pdf = new PDF("L", "mm", "A4");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 11);

$pdf->SetWidths([18, 55, 70, 25, 25, 23, 17, 23, 28]);
$pdf->SetAligns(['C','L','L','C','C','C','C','C','C']);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pdf->Row([
        $row['id_factura'],
        $row['lector'],
        $row['libro'],
        $row['tipo'],
        date("d/m/Y", strtotime($row['fecha'])),
        number_format($row['subtotal'],2),
        number_format($row['igv'],2),
        number_format($row['total'],2),
        $row['condicion']
    ]);
}

>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
$pdf->Output('RFacturas.pdf', 'I');