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

    public function __construct($fecha_formateada, $nombre_cliente, $monto)
    {
        parent::__construct();
        $this->fecha_formateada = $fecha_formateada;
        $this->nombre_cliente = $nombre_cliente;
        $this->monto = $monto;

        $this->AddPage('L', array(80.0, 190.0)); // P para Portrait, ajusta según tus necesidades
    }

    function Header()
    {
        $this->Image('pages/examples/celsius.png', 10, 6, 50);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(60);

        

        $num_recibo = str_pad($_GET['cod_recibo'], 8, '0', STR_PAD_LEFT);

        $this->Cell(100, 10, 'Recibo Numero: X 9999-' . $num_recibo, 0, 'C');

        $this->Line(10, $this->GetY() - 15, 180, $this->GetY() - 15);
        $this->Line(10, $this->GetY() + 15, 180, $this->GetY() + 15);
        $this->Ln(20);

        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 0, 'Fecha de pago : ' . $this->fecha_formateada, 0, 1);
        $this->Line(10, $this->GetY() + 10, 180, $this->GetY() + 10);
        
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'Cliente: ' . $this->nombre_cliente, 0, 1);

        $montoFormateado = '$' . number_format($this->monto, 0, ',', '.');
        $this->Cell(0, 10, 'Monto: ' . $montoFormateado, 0, 1);

        // Obtener el valor de $file_recibo['tipo_file']
        $tipoFile = $GLOBALS['file_recibo']['tipo_file'];

        // Mostrar la información de tipo_file en el PDF
        $this->Cell(0, 10, $tipoFile, 0, 1);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'celsiusbrc.ar', 0, 0, 'C');
    }
}

$nombre_cliente = $file_recibo['cli_file'];
$pdf = new PDF($fecha_formateada, $nombre_cliente, $monto);

$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 12);
$pdf->Output('I', 'Recibo-Celcius_' . $_GET['cod_recibo'] . '.pdf');
?>
