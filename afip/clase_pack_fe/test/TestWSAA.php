<!doctype html>
<html class="no-js" lang="es">
    <head>
        <meta charset="utf-8">
        <title>Test WebServices de AFIP :: WSAA</title>
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <h1>Test WebServices de AFIP :: WSAA</h1>
        <div class="home_link"><a href="index.html" >Home</a></div>

<?php

/**
 * En el archivo php.ini se deben habilitar las siguientes extensiones
 *
 * extension=php_openssl (.dll / .so)
 * extension=php_soap    (.dll / .so)
 *
 */

//Cargando archivo de configuracion
include_once "../config.php";
include_once "functions.php";


//Cargando modelos de conexion a WebService
include_once MDL_PATH."AfipWsaa.php";

//Datos correspondiente a la empresa 1
    //CUIT (Sin guiones)
    $empresaCuit  = '20404397851';
    //El alias debe estar mencionado en el nombre de los archivos de certificados y firmas digitales
    $empresaAlias = 'prue2024';

//WebService que utilizara la autenticacion (A modo de ejemplo para este test)
$webService   = 'ws_sr_padron_a5';


//Creando el objeto WSAA (Web Service de Autenticacin y Autorizacin)

$wsaa = new AfipWsaa($webService,$empresaAlias);


//Creando el TA (Ticket de acceso)
if ($ta = $wsaa->loginCms())
{
    echo '
    <h2>Ticket de Acceso generado [Entorno: '.SERVER_ENTORNO.']</h2>
    <h3>Mostrando el setup del WSAA mediante: AfipWsaa::getSetUp()</h3>';
    pr($wsaa->getSetUp());
    echo '
    <hr/>';

    echo '
    <h2>Ticket de Acceso generado [Entorno: '.SERVER_ENTORNO.']</h2>
    <h3>Mostrando el TA (Ticket de Acceso)</h3>';
    pr($ta);
    echo '
    <hr/>';

}
else
{
    echo '
    <hr/>
    <h2>Errores detectados al generar el Ticket de Acceso</h2>
    <pre>';
    print_r($wsaa->getErrLog());
    echo '
    </pre>';
}

?>
    </body>
</html>
