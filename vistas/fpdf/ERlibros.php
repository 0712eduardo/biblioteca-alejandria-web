<<<<<<< HEAD
<?php
require('./fpdf.php');

class PDF extends FPDF
{
    public $tableWidth = 260;

    function GetCellHeight($w, $txt)
    {
        $txt = utf8_decode($txt);
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0) $w = $this->w - $this->rMargin - $this->x;

        $wmax = ($w - 2) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n") $nb--;

        $sep = -1; $i = 0; $j = 0; $l = 0; $nl = 1;

        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") { $i++; $sep = -1; $j = $i; $l = 0; $nl++; continue; }
            if ($c == ' ') $sep = $i;
            $l += $cw[$c];

            if ($l > $wmax) {
                if ($sep == -1) { if ($i == $j) $i++; }
                else $i = $sep + 1;
                $sep = -1; $j = $i; $l = 0; $nl++;
            } else $i++;
        }
        return $nl * 7;
    }

    function RowLibro($data, $imgPath)
    {
        $w = [18, 28, 95, 50, 18, 25, 25];
        $h = max($this->GetCellHeight($w[2], $data[2]), $this->GetCellHeight($w[3], $data[3]), 22);

        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage();
            $this->Header();
        }

        $this->SetDrawColor(218,165,32);
        $x0 = ($this->GetPageWidth() - $this->tableWidth) / 2;
        $this->SetX($x0);

        $this->Cell($w[0], $h, utf8_decode($data[0]), 1, 0, 'C');

        $this->Cell($w[1], $h, '', 1, 0, 'C');
        if (file_exists($imgPath)) {
            $this->Image($imgPath, $this->GetX() - $w[1] + 4, $this->GetY() + 3, 20, 16);
        }

        $x = $this->GetX(); $y = $this->GetY();
        $this->MultiCell($w[2], 7, utf8_decode($data[2]), 0, 'L');
        $this->Rect($x, $y, $w[2], $h);
        $this->SetXY($x + $w[2], $y);

        $x = $this->GetX(); $y = $this->GetY();
        $this->MultiCell($w[3], 7, utf8_decode($data[3]), 0, 'L');
        $this->Rect($x, $y, $w[3], $h);
        $this->SetXY($x + $w[3], $y);

        $this->Cell($w[4], $h, utf8_decode($data[4]), 1, 0, 'C');
        $this->Cell($w[5], $h, utf8_decode($data[5]), 1, 0, 'C');
        $this->Cell($w[6], $h, utf8_decode($data[6]), 1, 1, 'C');
    }

    function Header()
    {
        $this->Image('../../assets/images/logo.png', 250, 10, 25);

        $this->SetFont('Arial', 'B', 19);
        $this->SetTextColor(0, 0, 0);
        $w = 150;

        $this->SetX(($this->GetPageWidth() - $w) / 2);
        $this->Cell($w, 15, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(6);

        $categoria = $_GET['categoria'] ?? "";
        $autor     = $_GET['autor'] ?? "";
        $titulo    = "SIN FILTRO";

        if ($categoria != "") $titulo = "CATEGORÍA: " . strtoupper($categoria);
        if ($autor != "")     $titulo = "AUTOR: " . strtoupper($autor);

        $this->SetFont('Arial','B',15);
        $this->SetTextColor(184,134,11);
        $this->Cell(0, 10, utf8_decode("REPORTE ESPECÍFICO DE LIBROS  ($titulo)"), 0, 1, 'C');
        $this->Ln(5);

        $this->SetFillColor(184,134,11);
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(218,165,32);
        $this->SetFont('Arial','B',11);

        $x = ($this->GetPageWidth() - $this->tableWidth) / 2;
        $this->SetX($x);

        $this->Cell(18,10,utf8_decode("CÓD"),1,0,'C',1);
        $this->Cell(28,10,utf8_decode("PORTADA"),1,0,'C',1);
        $this->Cell(95,10,utf8_decode("TÍTULO"),1,0,'C',1);
        $this->Cell(50,10,utf8_decode("AUTOR"),1,0,'C',1);
        $this->Cell(18,10,utf8_decode("AÑO"),1,0,'C',1);
        $this->Cell(25,10,utf8_decode("STOCK"),1,0,'C',1);
        $this->Cell(25,10,utf8_decode("DISP."),1,1,'C',1);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10, utf8_decode("Página ").$this->PageNo()."/{nb}",0,0,'C');
        $this->SetY(-15);
        $this->Cell(530,10,date("d/m/Y"),0,0,'C');
    }
}

require '../../modelos/conexion.php';
$conex = new Conexion();

$categoria = $_GET['categoria'] ?? "";
$autor     = $_GET['autor'] ?? "";
$data      = [];

if ($categoria != "") {
    $sql = "SELECT l.id_libro, l.titulo, l.autor, l.anio,
                   l.stock_total, l.stock_disponible, l.portada
            FROM libro l
            INNER JOIN categoria c ON l.id_categoria = c.idcategoria
            WHERE c.nombre = ?";
    $param = $categoria;

} elseif ($autor != "") {
    $sql = "SELECT id_libro, titulo, autor, anio,
                   stock_total, stock_disponible, portada
            FROM libro
            WHERE autor = ?";
    $param = $autor;
}

$stmt = $conex->prepare($sql);
$stmt->bindParam(1, $param);
$stmt->execute();

$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',11);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $img = "../../uploads/libros/".($row['portada'] ?: "noimage.png");

    $pdf->RowLibro([
        $row['id_libro'],
        "",
        $row['titulo'],
        $row['autor'],
        $row['anio'],
        $row['stock_total'],
        $row['stock_disponible']
    ], $img);
}

=======
<?php
require('./fpdf.php');

class PDF extends FPDF
{
    public $tableWidth = 260;

    function GetCellHeight($w, $txt)
    {
        $txt = utf8_decode($txt);
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0) $w = $this->w - $this->rMargin - $this->x;

        $wmax = ($w - 2) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n") $nb--;

        $sep = -1; $i = 0; $j = 0; $l = 0; $nl = 1;

        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") { $i++; $sep = -1; $j = $i; $l = 0; $nl++; continue; }
            if ($c == ' ') $sep = $i;
            $l += $cw[$c];

            if ($l > $wmax) {
                if ($sep == -1) { if ($i == $j) $i++; }
                else $i = $sep + 1;
                $sep = -1; $j = $i; $l = 0; $nl++;
            } else $i++;
        }
        return $nl * 7;
    }

    function RowLibro($data, $imgPath)
    {
        $w = [18, 28, 95, 50, 18, 25, 25];
        $h = max($this->GetCellHeight($w[2], $data[2]), $this->GetCellHeight($w[3], $data[3]), 22);

        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage();
            $this->Header();
        }

        $this->SetDrawColor(218,165,32);
        $x0 = ($this->GetPageWidth() - $this->tableWidth) / 2;
        $this->SetX($x0);

        $this->Cell($w[0], $h, utf8_decode($data[0]), 1, 0, 'C');

        $this->Cell($w[1], $h, '', 1, 0, 'C');
        if (file_exists($imgPath)) {
            $this->Image($imgPath, $this->GetX() - $w[1] + 4, $this->GetY() + 3, 20, 16);
        }

        $x = $this->GetX(); $y = $this->GetY();
        $this->MultiCell($w[2], 7, utf8_decode($data[2]), 0, 'L');
        $this->Rect($x, $y, $w[2], $h);
        $this->SetXY($x + $w[2], $y);

        $x = $this->GetX(); $y = $this->GetY();
        $this->MultiCell($w[3], 7, utf8_decode($data[3]), 0, 'L');
        $this->Rect($x, $y, $w[3], $h);
        $this->SetXY($x + $w[3], $y);

        $this->Cell($w[4], $h, utf8_decode($data[4]), 1, 0, 'C');
        $this->Cell($w[5], $h, utf8_decode($data[5]), 1, 0, 'C');
        $this->Cell($w[6], $h, utf8_decode($data[6]), 1, 1, 'C');
    }

    function Header()
    {
        $this->Image('../../assets/images/logo.png', 250, 10, 25);

        $this->SetFont('Arial', 'B', 19);
        $this->SetTextColor(0, 0, 0);
        $w = 150;

        $this->SetX(($this->GetPageWidth() - $w) / 2);
        $this->Cell($w, 15, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(6);

        $categoria = $_GET['categoria'] ?? "";
        $autor     = $_GET['autor'] ?? "";
        $titulo    = "SIN FILTRO";

        if ($categoria != "") $titulo = "CATEGORÍA: " . strtoupper($categoria);
        if ($autor != "")     $titulo = "AUTOR: " . strtoupper($autor);

        $this->SetFont('Arial','B',15);
        $this->SetTextColor(184,134,11);
        $this->Cell(0, 10, utf8_decode("REPORTE ESPECÍFICO DE LIBROS  ($titulo)"), 0, 1, 'C');
        $this->Ln(5);

        $this->SetFillColor(184,134,11);
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(218,165,32);
        $this->SetFont('Arial','B',11);

        $x = ($this->GetPageWidth() - $this->tableWidth) / 2;
        $this->SetX($x);

        $this->Cell(18,10,utf8_decode("CÓD"),1,0,'C',1);
        $this->Cell(28,10,utf8_decode("PORTADA"),1,0,'C',1);
        $this->Cell(95,10,utf8_decode("TÍTULO"),1,0,'C',1);
        $this->Cell(50,10,utf8_decode("AUTOR"),1,0,'C',1);
        $this->Cell(18,10,utf8_decode("AÑO"),1,0,'C',1);
        $this->Cell(25,10,utf8_decode("STOCK"),1,0,'C',1);
        $this->Cell(25,10,utf8_decode("DISP."),1,1,'C',1);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10, utf8_decode("Página ").$this->PageNo()."/{nb}",0,0,'C');
        $this->SetY(-15);
        $this->Cell(530,10,date("d/m/Y"),0,0,'C');
    }
}

require '../../modelos/conexion.php';
$conex = new Conexion();

$categoria = $_GET['categoria'] ?? "";
$autor     = $_GET['autor'] ?? "";
$data      = [];

if ($categoria != "") {
    $sql = "SELECT l.id_libro, l.titulo, l.autor, l.anio,
                   l.stock_total, l.stock_disponible, l.portada
            FROM libro l
            INNER JOIN categoria c ON l.id_categoria = c.idcategoria
            WHERE c.nombre = ?";
    $param = $categoria;

} elseif ($autor != "") {
    $sql = "SELECT id_libro, titulo, autor, anio,
                   stock_total, stock_disponible, portada
            FROM libro
            WHERE autor = ?";
    $param = $autor;
}

$stmt = $conex->prepare($sql);
$stmt->bindParam(1, $param);
$stmt->execute();

$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',11);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $img = "../../uploads/libros/".($row['portada'] ?: "noimage.png");

    $pdf->RowLibro([
        $row['id_libro'],
        "",
        $row['titulo'],
        $row['autor'],
        $row['anio'],
        $row['stock_total'],
        $row['stock_disponible']
    ], $img);
}

>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
$pdf->Output('ERlibros.pdf','I');