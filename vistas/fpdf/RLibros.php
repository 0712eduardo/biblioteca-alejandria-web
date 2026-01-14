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
            $nb = max($nb, $this->GetCellHeight($this->widths[$i], $data[$i]));
        }
        $h = $nb;

        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);

        for ($i = 0; $i < count($data); $i++) {

            $w = $this->widths[$i];
            $txt = $data[$i];

            $x = $this->GetX();
            $y = $this->GetY();

            $this->Rect($x, $y, $w, $h);

            $this->MultiCell($w, 7, utf8_decode($txt), 0, $this->aligns[$i]);

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
        $this->Cell(120, 15, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(5);

        $this->SetTextColor(184, 134, 11);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, utf8_decode("REPORTE GENERAL DE LIBROS"), 0, 1, 'C');
        $this->Ln(5);

        $this->SetFillColor(184, 134, 11);
        $this->SetTextColor(255, 255, 255);
        $this->SetFont('Arial', 'B', 11);

       $this->Cell(20, 10, utf8_decode("CÓD"), 1, 0, 'C', 1);
        $this->Cell(60, 10, utf8_decode("TÍTULO"), 1, 0, 'C', 1);
        $this->Cell(50, 10, utf8_decode("AUTOR"), 1, 0, 'C', 1);
        $this->Cell(45, 10, utf8_decode("CATEGORÍA"), 1, 0, 'C', 1);
        $this->Cell(20, 10, utf8_decode("AÑO"), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode("STOCK T."), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode("DISP."), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode("COND."), 1, 1, 'C', 1);
            }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode ( "Página ").$this->PageNo().'/{nb}', 0, 0, 'C');
        $this->SetY(-15);
        $this->Cell(540, 10, date('d/m/Y'), 0, 0, 'C');
    }
}

require '../../modelos/conexion.php';
$conex = new Conexion();

$stmt = $conex->prepare("
    SELECT l.id_libro, l.titulo, l.autor, l.anio,
           l.stock_total, l.stock_disponible, l.condicion,
           c.nombre AS categoria
    FROM libro l
    LEFT JOIN categoria c ON l.id_categoria = c.idcategoria
");
$stmt->execute();

$pdf = new PDF("L", "mm", "A4");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 11);

$pdf->SetDrawColor(218,165,32);

$pdf->SetWidths([20, 60, 50, 45, 20, 30, 30, 30]);
$pdf->SetAligns(['C','L','L','L','C','C','C','C']);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pdf->Row([
        $row['id_libro'],
        $row['titulo'],
        $row['autor'],
        $row['categoria'],
        $row['anio'],
        $row['stock_total'],
        $row['stock_disponible'],
        $row['condicion'],
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
            } else
                $i++;
        }
        return $nl * 7;
    }

    function Row($data)
    {
        $nb = 0;

        for ($i = 0; $i < count($data); $i++) {
            $nb = max($nb, $this->GetCellHeight($this->widths[$i], $data[$i]));
        }
        $h = $nb;

        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);

        for ($i = 0; $i < count($data); $i++) {

            $w = $this->widths[$i];
            $txt = $data[$i];

            $x = $this->GetX();
            $y = $this->GetY();

            $this->Rect($x, $y, $w, $h);

            $this->MultiCell($w, 7, utf8_decode($txt), 0, $this->aligns[$i]);

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
        $this->Cell(120, 15, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(5);

        $this->SetTextColor(184, 134, 11);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, utf8_decode("REPORTE GENERAL DE LIBROS"), 0, 1, 'C');
        $this->Ln(5);

        $this->SetFillColor(184, 134, 11);
        $this->SetTextColor(255, 255, 255);
        $this->SetFont('Arial', 'B', 11);

       $this->Cell(20, 10, utf8_decode("CÓD"), 1, 0, 'C', 1);
        $this->Cell(60, 10, utf8_decode("TÍTULO"), 1, 0, 'C', 1);
        $this->Cell(50, 10, utf8_decode("AUTOR"), 1, 0, 'C', 1);
        $this->Cell(45, 10, utf8_decode("CATEGORÍA"), 1, 0, 'C', 1);
        $this->Cell(20, 10, utf8_decode("AÑO"), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode("STOCK T."), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode("DISP."), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode("COND."), 1, 1, 'C', 1);
            }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode ( "Página ").$this->PageNo().'/{nb}', 0, 0, 'C');
        $this->SetY(-15);
        $this->Cell(540, 10, date('d/m/Y'), 0, 0, 'C');
    }
}

require '../../modelos/conexion.php';
$conex = new Conexion();

$stmt = $conex->prepare("
    SELECT l.id_libro, l.titulo, l.autor, l.anio,
           l.stock_total, l.stock_disponible, l.condicion,
           c.nombre AS categoria
    FROM libro l
    LEFT JOIN categoria c ON l.id_categoria = c.idcategoria
");
$stmt->execute();

$pdf = new PDF("L", "mm", "A4");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 11);

$pdf->SetDrawColor(218,165,32);

$pdf->SetWidths([20, 60, 50, 45, 20, 30, 30, 30]);
$pdf->SetAligns(['C','L','L','L','C','C','C','C']);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pdf->Row([
        $row['id_libro'],
        $row['titulo'],
        $row['autor'],
        $row['categoria'],
        $row['anio'],
        $row['stock_total'],
        $row['stock_disponible'],
        $row['condicion'],
    ]);
}

>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
$pdf->Output('RLibros.pdf', 'I');