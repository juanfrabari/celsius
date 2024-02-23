<?php
include 'afip.php-master/src/Afip.php';

$afip = new Afip(array('CUIT' => 20257862438));

// Numero de punto de venta
$punto_de_venta = 1;

// Tipo de comprobante
$tipo_de_comprobante = 6; // 6 = Factura B

// Obtener el último número de comprobante
$last_voucher = $afip->ElectronicBilling->GetLastVoucher($punto_de_venta, $tipo_de_comprobante);

// Crear y asignar CAE a un comprobante
// Devolver respuesta completa del web service
$return_full_response = TRUE;

// Info del comprobante
$data = array(
    'CantReg'      => 1,
    'PtoVta'       => $punto_de_venta,
    'CbteTipo'     => $tipo_de_comprobante,
    'Concepto'     => 1,
    'DocTipo'      => 99,
    'DocNro'       => 0,
    'CbteDesde'    => $last_voucher + 1, // Utilizamos el siguiente número de comprobante al último obtenido
    'CbteHasta'    => $last_voucher + 1,
    'CbteFch'      => intval(date('Ymd')),
    'ImpTotal'     => 121,
    'ImpTotConc'   => 0,
    'ImpNeto'      => 100,
    'ImpOpEx'      => 0,
    'ImpIVA'       => 21,
    'ImpTrib'      => 0,
    'MonId'        => 'PES',
    'MonCotiz'     => 1,
    'Iva'          => array(
        array(
            'Id'        => 5,
            'BaseImp'   => 100,
            'Importe'   => 21
        )
    ),
);

// Crear y asignar CAE al comprobante
$res = $afip->ElectronicBilling->CreateVoucher($data, $return_full_response);

// Verificar si la operación fue exitosa
if (isset($res->FeCabResp->Resultado) && $res->FeCabResp->Resultado == 'A') {
    echo 'Comprobante generado exitosamente:';
    echo '<pre>';
    print_r($res);
    echo '</pre>';
    
    // Continuar con la Factura de Exportación
    // Paso 1 - Crear una instancia del web service para Factura de Exportación
    $wsfex = $afip->WebService('wsfex');

    // Paso 2 - Obtener el Token de Autorización
    $ta = $wsfex->GetTokenAuthorization();

    // Paso 3 - Preparar los datos para la solicitud (ejemplo con FEXGetLast_ID)
    $data_fex = array(
        'Auth' => array( 
            'Token' => $ta->token,
            'Sign' => $ta->sign,
            'Cuit' => $afip->CUIT
        )
    );

    // Paso 4 - Ejecutar la solicitud para obtener el PDF
    $res_fex = $wsfex->ExecuteRequest('FEXGetLast_ID', $data_fex);

    // Verificar si la operación fue exitosa
    if (isset($res_fex->FEXGetLast_IDResult->FEXResultGet->Id) && $res_fex->FEXGetLast_IDResult->FEXResultGet->Id > 0) {
        // Obtener el enlace al PDF
        $pdf_url = $wsfex->GetPDFLink($res_fex->FEXGetLast_IDResult->FEXResultGet->Id);

        if ($pdf_url !== false) {
            // Descargar y mostrar el PDF
            $pdf_content = file_get_contents($pdf_url);

            if ($pdf_content !== false) {
                header('Content-type: application/pdf');
                header('Content-Disposition: inline; filename="factura_exportacion.pdf"');
                echo $pdf_content;
            } else {
                // Manejar el caso en el que no se pueda obtener el contenido del PDF
                echo 'Error al obtener el contenido del PDF de la factura de exportación.';
            }
        } else {
            // Manejar el caso en el que no se pueda obtener el enlace al PDF
            echo 'Error al obtener el enlace al PDF de la factura de exportación.';
        }
    } else {
        // Manejar el caso en el que no se pueda obtener la información de la factura de exportación
        echo 'Error al obtener la información de la factura de exportación:';
        echo '<pre>';
        var_dump($res_fex);
        echo '</pre>';
    }
} else {
    echo 'Error al generar el comprobante:';
    echo '<pre>';
    print_r($res);
    echo '</pre>';
}



// Certificado (Puede estar guardado en archivos, DB, etc)
$cert = file_get_contents('./certificado.crt');

// Key (Puede estar guardado en archivos, DB, etc)
$key = file_get_contents('./keytest.key');

// Tu CUIT
$tax_id = 20257862438;

$afip = new Afip(array(
    'CUIT' => $tax_id,
    'cert' => $cert,
    'key' => $key
));

?>
