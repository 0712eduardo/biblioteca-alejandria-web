<<<<<<< HEAD
<?php
require('./fpdf.php');

class PDF extends FPDF
{
    public $tableWidth = 243;


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

            if ($c == "\n") {
                $i++; $sep = -1; $j = $i; $l = 0; $nl++;
                continue;
            }

            if ($c == ' ') $sep = $i;

            $l += $cw[$c];

            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j) $i++;
                } else $i = $sep + 1;

                $sep = -1; $j = $i; $l = 0; $nl++;
            } else $i++;
        }
        return $nl * 6.5;
    }


    function RowFactura($data)
    {
        $w = [12, 40, 40, 25, 25, 25, 20, 18, 20, 18];

        $h = max(
            $this->GetCellHeight($w[1], $data[1]),
            $this->GetCellHeight($w[2], $data[2]),
            8
        );

        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage("L");
            $this->Header();
        }

        $this->SetDrawColor(218,165,32);

        $x0 = ($this->GetPageWidth() - $this->tableWidth) / 2;
        $this->SetX($x0);

        $this->Cell($w[0], $h, utf8_decode($data[0]), 1, 0, 'C');

        $x = $this->GetX(); $y = $this->GetY();
        $this->MultiCell($w[1], 6, utf8_decode($data[1]), 0, 'L');
        $this->Rect($x, $y, $w[1], $h);
        $this->SetXY($x + $w[1], $y);

        $x = $this->GetX(); $y = $this->GetY();
        $this->MultiCell($w[2], 6, utf8_decode($data[2]), 0, 'L');
        $this->Rect($x, $y, $w[2], $h);
        $this->SetXY($x + $w[2], $y);

        for ($i = 3; $i < count($data); $i++) {
            $this->Cell($w[$i], $h, utf8_decode($data[$i]), 1, 0, 'C');
        }

        $this->Ln($h);
    }

 
    function Header()
    {
        $this->Image('../../assets/images/logo.png', 230, 10, 28);

        $this->SetFont('Arial', 'B', 19);
        $this->Cell(80);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(110, 15, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(7);

        $mes  = $_GET['mes'] ?? 0;
        $anio = $_GET['anio'] ?? 0;
        $estado = isset($_GET['estado']) ? strtoupper($_GET['estado']) : "TODOS";

        $meses = [
            1=>"ENERO",2=>"FEBRERO",3=>"MARZO",4=>"ABRIL",
            5=>"MAYO",6=>"JUNIO",7=>"JULIO",8=>"AGOSTO",
            9=>"SETIEMBRE",10=>"OCTUBRE",11=>"NOVIEMBRE",12=>"DICIEMBRE"
        ];

        $periodo = ($mes>0 && $anio>0) ? $meses[$mes]." - ".$anio : "SIN PERÍODO";

        $this->SetFont('Arial','B',14);
        $this->SetTextColor(184,134,11);
        $this->Cell(0, 8, utf8_decode("REPORTE DE FACTURAS ($periodo / $estado)"), 0, 1, 'C');
        $this->Ln(6);

   
        $x = ($this->GetPageWidth() - $this->tableWidth) / 2;
        $this->SetX($x);

        $this->SetFillColor(184,134,11);
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(218,165,32);
        $this->SetFont('Arial','B',9);

        $headers = ["ID","Lector","Libro","F. Prést.","F. Devol.","F. Fact.","Subtotal","IGV","Total","Estado"];
        $widths  = [12,40,40,25,25,25,20,18,20,18];

        for ($i=0; $i<count($headers); $i++) {
            $this->Cell($widths[$i], 8, utf8_decode($headers[$i]), 1, 0, 'C', 1);
        }
        $this->Ln();
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

$mes    = $_GET['mes'] ?? 0;
$anio   = $_GET['anio'] ?? 0;
$estado = $_GET['estado'] ?? "TODOS";

$sql = "SELECT 
            f.id_factura,
            le.nom_lector,
            l.titulo,
            p.fechaPrestamo,
            p.fechaDevolucion,
            f.fecha AS fechaFactura,
            f.subtotal,
            f.igv,
            f.total,
            CASE WHEN p.fechaDevolucion < CURDATE() THEN 'VENCIDO' ELSE 'VIGENTE' END estado_dinamico
        FROM factura f
        INNER JOIN prestamo p ON f.id_prestamo = p.idprestamo
        INNER JOIN libro l ON p.id_libro = l.id_libro
        INNER JOIN lectores le ON p.id_lector = le.id_lector
        WHERE MONTH(f.fecha) = ?
          AND YEAR(f.fecha) = ?";

if ($estado != "TODOS") {
    $sql .= " HAVING estado_dinamico = ?";
}

$stmt = $conex->prepare($sql);

$stmt->bindParam(1, $mes);
$stmt->bindParam(2, $anio);

if ($estado != "TODOS") {
    $stmt->bindParam(3, $estado);
}

$stmt->execute();



$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',8);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pdf->RowFactura([
        $row['id_factura'],
        $row['nom_lector'],
        $row['titulo'],
        date("d/m/Y", strtotime($row['fechaPrestamo'])),
        date("d/m/Y", strtotime($row['fechaDevolucion'])),
        date("d/m/Y", strtotime($row['fechaFactura'])),
        number_format($row['subtotal'],2),
        number_format($row['igv'],2),
        number_format($row['total'],2),
        $row['estado_dinamico']
    ]);
}

$pdf->Output('ERfactura.pdf','I');
=======
<?php
require('./fpdf.php');

class PDF extends FPDF
{
    public $tableWidth = 243;


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

            if ($c == "\n") {
                $i++; $sep = -1; $j = $i; $l = 0; $nl++;
                continue;
            }

            if ($c == ' ') $sep = $i;

            $l += $cw[$c];

            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j) $i++;
                } else $i = $sep + 1;

                $sep = -1; $j = $i; $l = 0; $nl++;
            } else $i++;
        }
        return $nl * 6.5;
    }


    function RowFactura($data)
    {
        $w = [12, 40, 40, 25, 25, 25, 20, 18, 20, 18];

        $h = max(
            $this->GetCellHeight($w[1], $data[1]),
            $this->GetCellHeight($w[2], $data[2]),
            8
        );

        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage("L");
            $this->Header();
        }

        $this->SetDrawColor(218,165,32);

        $x0 = ($this->GetPageWidth() - $this->tableWidth) / 2;
        $this->SetX($x0);

        $this->Cell($w[0], $h, utf8_decode($data[0]), 1, 0, 'C');

        $x = $this->GetX(); $y = $this->GetY();
        $this->MultiCell($w[1], 6, utf8_decode($data[1]), 0, 'L');
        $this->Rect($x, $y, $w[1], $h);
        $this->SetXY($x + $w[1], $y);

        $x = $this->GetX(); $y = $this->GetY();
        $this->MultiCell($w[2], 6, utf8_decode($data[2]), 0, 'L');
        $this->Rect($x, $y, $w[2], $h);
        $this->SetXY($x + $w[2], $y);

        for ($i = 3; $i < count($data); $i++) {
            $this->Cell($w[$i], $h, utf8_decode($data[$i]), 1, 0, 'C');
        }

        $this->Ln($h);
    }

 
    function Header()
    {
        $this->Image('../../assets/images/logo.png', 230, 10, 28);

        $this->SetFont('Arial', 'B', 19);
        $this->Cell(80);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(110, 15, utf8_decode("BIBLIOTECA ALEJANDRÍA"), 1, 1, 'C');
        $this->Ln(7);

        $mes  = $_GET['mes'] ?? 0;
        $anio = $_GET['anio'] ?? 0;
        $estado = isset($_GET['estado']) ? strtoupper($_GET['estado']) : "TODOS";

        $meses = [
            1=>"ENERO",2=>"FEBRERO",3=>"MARZO",4=>"ABRIL",
            5=>"MAYO",6=>"JUNIO",7=>"JULIO",8=>"AGOSTO",
            9=>"SETIEMBRE",10=>"OCTUBRE",11=>"NOVIEMBRE",12=>"DICIEMBRE"
        ];

        $periodo = ($mes>0 && $anio>0) ? $meses[$mes]." - ".$anio : "SIN PERÍODO";

        $this->SetFont('Arial','B',14);
        $this->SetTextColor(184,134,11);
        $this->Cell(0, 8, utf8_decode("REPORTE DE FACTURAS ($periodo / $estado)"), 0, 1, 'C');
        $this->Ln(6);

   
        $x = ($this->GetPageWidth() - $this->tableWidth) / 2;
        $this->SetX($x);

        $this->SetFillColor(184,134,11);
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(218,165,32);
        $this->SetFont('Arial','B',9);

        $headers = ["ID","Lector","Libro","F. Prést.","F. Devol.","F. Fact.","Subtotal","IGV","Total","Estado"];
        $widths  = [12,40,40,25,25,25,20,18,20,18];

        for ($i=0; $i<count($headers); $i++) {
            $this->Cell($widths[$i], 8, utf8_decode($headers[$i]), 1, 0, 'C', 1);
        }
        $this->Ln();
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

$mes    = $_GET['mes'] ?? 0;
$anio   = $_GET['anio'] ?? 0;
$estado = $_GET['estado'] ?? "TODOS";

$sql = "SELECT 
            f.id_factura,
            le.nom_lector,
            l.titulo,
            p.fechaPrestamo,
            p.fechaDevolucion,
            f.fecha AS fechaFactura,
            f.subtotal,
            f.igv,
            f.total,
            CASE WHEN p.fechaDevolucion < CURDATE() THEN 'VENCIDO' ELSE 'VIGENTE' END estado_dinamico
        FROM factura f
        INNER JOIN prestamo p ON f.id_prestamo = p.idprestamo
        INNER JOIN libro l ON p.id_libro = l.id_libro
        INNER JOIN lectores le ON p.id_lector = le.id_lector
        WHERE MONTH(f.fecha) = ?
          AND YEAR(f.fecha) = ?";

if ($estado != "TODOS") {
    $sql .= " HAVING estado_dinamico = ?";
}

$stmt = $conex->prepare($sql);

$stmt->bindParam(1, $mes);
$stmt->bindParam(2, $anio);

if ($estado != "TODOS") {
    $stmt->bindParam(3, $estado);
}

$stmt->execute();



$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',8);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pdf->RowFactura([
        $row['id_factura'],
        $row['nom_lector'],
        $row['titulo'],
        date("d/m/Y", strtotime($row['fechaPrestamo'])),
        date("d/m/Y", strtotime($row['fechaDevolucion'])),
        date("d/m/Y", strtotime($row['fechaFactura'])),
        number_format($row['subtotal'],2),
        number_format($row['igv'],2),
        number_format($row['total'],2),
        $row['estado_dinamico']
    ]);
}

$pdf->Output('ERfactura.pdf','I');
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>