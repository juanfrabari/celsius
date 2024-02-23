<?php
header('Content-Type: text/html; charset=UTF-8');
require('fpdf186/fpdf.php');

// include 1D barcode class (search for installation path)
//require_once 'TCPDF/examples/barcodes/tcpdf_barcodes_1d_include.php';

include 'conex.php';

// For demonstration purposes, get pararameters that are passed in through $_GET or set to the default value
$filepath = (isset($_GET["filepath"])?$_GET["filepath"]:"");
$text = (isset($_GET["text"])?$_GET["text"]:"0");
$size = (isset($_GET["size"])?$_GET["size"]:"20");
$orientation = (isset($_GET["orientation"])?$_GET["orientation"]:"horizontal");
$code_type = (isset($_GET["codetype"])?$_GET["codetype"]:"code128");
$print = (isset($_GET["print"])&&$_GET["print"]=='true'?true:false);
$sizefactor = (isset($_GET["sizefactor"])?$_GET["sizefactor"]:"1");

// This function call can be copied into your project and can be made from anywhere in your code
//barcode( $filepath, $text, $size, $orientation, $code_type, $print, $sizefactor );



//consulto base alternativa por si hay adjuntos
$sql_recibo = "SELECT * FROM `file` WHERE `cod_file` = '{$_GET['cod_recibo']}'";
$rs_recibo = mysqli_query($link, $sql_recibo);
if (mysqli_num_rows($rs_recibo) == 0) {
    // Redirigir al usuario a otra página
    header("Location: index-admin.php");
    exit; // Asegurarse de que el script se detiene después de la redirección
}
$file_recibo = mysqli_fetch_assoc($rs_recibo);

$nombre_cliente = $file_recibo['cli_file'];
$fecha_original = $file_recibo['fecha_file'];
$fecha_formateada = date("d/m/Y", strtotime($fecha_original));

//consulta de base principal
$sql_histo = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$_GET['cod_recibo']}'";
$rs_histo = mysqli_query($link, $sql_histo);
$file_histo = mysqli_fetch_assoc($rs_histo);

$monto = $file_histo['monto_histo'];

class PDF extends FPDF
{
    private $fecha_formateada;
    private $nombre_cliente;
    private $monto;
    private $cuit_empresa = "12345678901"; // Reemplaza con el CUIT de tu empresa
    private $nombre_empresa = "Nombre de tu Empresa"; // Reemplaza con el nombre de tu empresa
    private $direccion_empresa = "Dirección de tu Empresa"; // Reemplaza con la dirección de tu empresa

    public function __construct($fecha_formateada, $nombre_cliente, $monto)
    {
        parent::__construct();
        $this->fecha_formateada = $fecha_formateada;
        $this->nombre_cliente = $nombre_cliente;
        $this->monto = $monto;

        $this->AddPage('P', 'A4'); // Ajusta según el tamaño del papel y la orientación
    }

    function Header()
    {
        $this->Image('pages/examples/celsius.png', 10, 10, 60); // Ajusta la ruta y las dimensiones de tu logo

        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'FACTURA TIPO A', 0, 1, 'C');

        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 5, 'CUIT: ' . $this->cuit_empresa, 0, 1, 'C');
        $this->Cell(0, 5, 'Nombre: ' . $this->nombre_empresa, 0, 1, 'C');
        $this->Cell(0, 5, 'Dirección: ' . $this->direccion_empresa, 0, 1, 'C');
        $this->Cell(0, 5, 'Fecha: ' . $this->fecha_formateada, 0, 1, 'C');
        $this->Cell(0, 5, 'Cliente: ' . $this->nombre_cliente, 0, 1, 'C');

        $this->Line(10, $this->GetY() + 10, 200, $this->GetY() + 10); // Línea horizontal debajo del encabezado

        $this->Ln(10);
    }

    function Footer()
    {
        // Línea horizontal encima del footer
        $this->SetY(-20);
        $this->Line(10, $this->GetY(), 200, $this->GetY());

        // Subtotal
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(160, 10, 'Subtotal:', 0, 0, 'R');
        $this->Cell(30, 10, '$' . number_format($this->monto, 2), 0, 1, 'R');

        // Total
        $total = $this->monto * 1.21; // Suponiendo un IVA del 21%
        $this->Cell(160, 10, 'Total (IVA incluido):', 0, 0, 'R');
        $this->Cell(30, 10, '$' . number_format($total, 2), 0, 1, 'R');

        // Información adicional en el footer
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'www.tuempresa.com - Tel: 1234567890', 0, 0, 'C');
    }
}

$nombre_cliente = $file_recibo['cli_file'];
$pdf = new PDF($fecha_formateada, $nombre_cliente, $monto);

$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 12);
$pdf->Output('I', 'Factura-Tipo-A_' . $_GET['cod_recibo'] . '.pdf');

?>
