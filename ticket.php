<<<<<<< HEAD
<?php
require 'modelos/conexion.php';
require './code128.php';

define('MONEDA', 'S/.');

$conex = new Conexion();
$stmt = $conex->prepare("
  SELECT 
    f.*, 
    l.nom_lector, 
    b.titulo, 
    p.fechaDevolucion
  FROM factura f
  INNER JOIN prestamo p ON f.id_prestamo = p.idprestamo
  INNER JOIN lectores l ON p.id_lector = l.id_lector
  INNER JOIN libro b ON p.id_libro = b.id_libro
  WHERE f.id_factura = ?
");
$stmt->bindParam(1, $_GET['idf']);
$stmt->execute();
$f = $stmt->fetch(PDO::FETCH_OBJ);

if (!$f) {
    die("Error: No se encontró la factura solicitada.");
}

$pdf = new PDF_Code128('P', 'mm', array(80, 220));
$pdf->SetMargins(4, 10, 4);
$pdf->AddPage();

/* === ENCABEZADO CON LOGO === */
$pdf->Image('assets/images/logo.png', 26, 8, 30); // Ajusta la ruta y tamaño del logo
$pdf->Ln(22);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "SISBIBLIO - SISTEMA DE BIBLIOTECA"), 0, 1, 'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 5, "RUC: 20604589752", 0, 1, 'C');
$pdf->Cell(0, 5, "Av. Modelo 853 - Villa El Salvador, Lima", 0, 1, 'C');
$pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1","Teléfono: (01) 2873804"), 0, 1, 'C');
$pdf->Cell(0, 5, "Email: contacto@sisbiblio.pe", 0, 1, 'C');
$pdf->Ln(3);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 6, iconv("UTF-8", "ISO-8859-1", "Comprobante de Préstamo"), 0, 1, 'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 5,iconv("UTF-8", "ISO-8859-1", "N°: ") . str_pad($f->id_factura, 6, "0", STR_PAD_LEFT), 0, 1, 'C');
$pdf->Ln(4);

/* === DATOS DEL LECTOR === */
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 5, "Datos del Lector:", 0, 1);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 5, "Nombre: " . $f->nom_lector, 0, 1);
$pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1","Libro: " . $f->titulo), 0, 1);
$pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "Fecha Préstamo: ") . date("d/m/Y", strtotime($f->fecha)), 0, 1);
$pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1","Fecha Devolución: ") . date("d/m/Y", strtotime($f->fechaDevolucion)), 0, 1);
$pdf->Ln(3);

/* === DETALLES === */
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50, 5, "Concepto", 1, 0, 'C');
$pdf->Cell(25, 5, "Monto", 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 5, iconv("UTF-8", "ISO-8859-1","Préstamo de libro"), 1, 0);
$pdf->Cell(25, 5, MONEDA . " " . number_format($f->subtotal, 2), 1, 1, 'R');
$pdf->Cell(50, 5, "IGV (18%)", 1, 0);
$pdf->Cell(25, 5, MONEDA . " " . number_format($f->igv, 2), 1, 1, 'R');

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50, 6, "TOTAL A PAGAR", 1, 0);
$pdf->Cell(25, 6, MONEDA . " " . number_format($f->total, 2), 1, 1, 'R');
$pdf->Ln(5);

/* === MENSAJE FINAL === */
$pdf->SetFont('Arial', '', 9);
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Gracias por utilizar SISBIBLIO. Cuidar los libros es cuidar el conocimiento."), 0, 'C', false);
$pdf->Ln(3);

/* === CÓDIGO DE BARRAS === */
$pdf->Code128(5, $pdf->GetY(), "SISBIBLIO" . $f->id_factura, 70, 15);
$pdf->SetXY(0, $pdf->GetY() + 16);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 5, "SISBIBLIO" . $f->id_factura, 0, 1, 'C');

$pdf->Output("I", "Factura_SISBIBLIO_" . $f->id_factura . ".pdf", true);
=======
<?php
require 'modelos/conexion.php';
require './code128.php';

define('MONEDA', 'S/.');

$conex = new Conexion();
$stmt = $conex->prepare("
  SELECT 
    f.*, 
    l.nom_lector, 
    b.titulo, 
    p.fechaDevolucion
  FROM factura f
  INNER JOIN prestamo p ON f.id_prestamo = p.idprestamo
  INNER JOIN lectores l ON p.id_lector = l.id_lector
  INNER JOIN libro b ON p.id_libro = b.id_libro
  WHERE f.id_factura = ?
");
$stmt->bindParam(1, $_GET['idf']);
$stmt->execute();
$f = $stmt->fetch(PDO::FETCH_OBJ);

if (!$f) {
    die("Error: No se encontró la factura solicitada.");
}

$pdf = new PDF_Code128('P', 'mm', array(80, 220));
$pdf->SetMargins(4, 10, 4);
$pdf->AddPage();

/* === ENCABEZADO CON LOGO === */
$pdf->Image('assets/images/logo.png', 26, 8, 30); // Ajusta la ruta y tamaño del logo
$pdf->Ln(22);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "SISBIBLIO - SISTEMA DE BIBLIOTECA"), 0, 1, 'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 5, "RUC: 20604589752", 0, 1, 'C');
$pdf->Cell(0, 5, "Av. Modelo 853 - Villa El Salvador, Lima", 0, 1, 'C');
$pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1","Teléfono: (01) 2873804"), 0, 1, 'C');
$pdf->Cell(0, 5, "Email: contacto@sisbiblio.pe", 0, 1, 'C');
$pdf->Ln(3);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 6, iconv("UTF-8", "ISO-8859-1", "Comprobante de Préstamo"), 0, 1, 'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 5,iconv("UTF-8", "ISO-8859-1", "N°: ") . str_pad($f->id_factura, 6, "0", STR_PAD_LEFT), 0, 1, 'C');
$pdf->Ln(4);

/* === DATOS DEL LECTOR === */
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 5, "Datos del Lector:", 0, 1);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 5, "Nombre: " . $f->nom_lector, 0, 1);
$pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1","Libro: " . $f->titulo), 0, 1);
$pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "Fecha Préstamo: ") . date("d/m/Y", strtotime($f->fecha)), 0, 1);
$pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1","Fecha Devolución: ") . date("d/m/Y", strtotime($f->fechaDevolucion)), 0, 1);
$pdf->Ln(3);

/* === DETALLES === */
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50, 5, "Concepto", 1, 0, 'C');
$pdf->Cell(25, 5, "Monto", 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 5, iconv("UTF-8", "ISO-8859-1","Préstamo de libro"), 1, 0);
$pdf->Cell(25, 5, MONEDA . " " . number_format($f->subtotal, 2), 1, 1, 'R');
$pdf->Cell(50, 5, "IGV (18%)", 1, 0);
$pdf->Cell(25, 5, MONEDA . " " . number_format($f->igv, 2), 1, 1, 'R');

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50, 6, "TOTAL A PAGAR", 1, 0);
$pdf->Cell(25, 6, MONEDA . " " . number_format($f->total, 2), 1, 1, 'R');
$pdf->Ln(5);

/* === MENSAJE FINAL === */
$pdf->SetFont('Arial', '', 9);
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Gracias por utilizar SISBIBLIO. Cuidar los libros es cuidar el conocimiento."), 0, 'C', false);
$pdf->Ln(3);

/* === CÓDIGO DE BARRAS === */
$pdf->Code128(5, $pdf->GetY(), "SISBIBLIO" . $f->id_factura, 70, 15);
$pdf->SetXY(0, $pdf->GetY() + 16);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 5, "SISBIBLIO" . $f->id_factura, 0, 1, 'C');

$pdf->Output("I", "Factura_SISBIBLIO_" . $f->id_factura . ".pdf", true);
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>