<?php
require_once('afip.php-master/src/Afip.php');

$afip = new Afip(array(
    'CUIT' => 20257862438,
    'production' => false,
    'cert' => 'certificado.crt', // Ruta al certificado
    'key' => 'keytest.key', // Ruta a la clave privada
   
));

$invoice_data = array(
    'CantReg' => 1,
    'PtoVta' => 1,
    'CbteTipo' => 6,
    'Concepto' => 1,
    'DocTipo' => 80,
    'DocNro' => 20202020202,
    'CbteDesde' => 1,
    'CbteHasta' => 1,
    'CbteFch' => date('Ymd'),
    'ImpTotal' => 121,
    'ImpTotConc' => 0,
    'ImpNeto' => 100,
    'ImpOpEx' => 0,
    'ImpTrib' => 21,
    'MonId' => 'PES',
    'MonCotiz' => 1,
);

$result = $afip->ElectronicBilling->CreateNextVoucher($invoice_data);

if ($result['success']) {
    echo "CAE: " . $result['CAE'] . "\n";
    echo "Vencimiento: " . $result['CAEFchVto'] . "\n";
} else {
    echo "Error: " . $result['errorMessage'] . "\n";
}
?>
