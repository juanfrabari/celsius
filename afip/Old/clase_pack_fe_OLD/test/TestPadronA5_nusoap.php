<!doctype html>
<html class="no-js" lang="es">
    <head>
        <meta charset="utf-8">
        <title>Test WebServices de AFIP :: Padron A5</title>
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <h1>Test WebServices de AFIP :: Padron A5</h1>
        <div class="home_link"><a href="index.html" >Home</a></div>
<?php
/**
 * En el archivo php.ini se deben habilitar las siguientes extensiones
 *
 * extension=php_openssl (.dll / .so)
 * extension=php_soap    (.dll / .so)
 *
 */

error_reporting(E_ALL);
ini_set('display_errors','Yes');

//Cargando archivo de configuracion
include_once "../config.php";
include_once "functions.php";
include_once  "../nusoap/lib/nusoap.php";

//Cargando modelos de conexion a WebService
include_once MDL_PATH."AfipWsaa.php";


//Datos correspondiente a la empresa que emite la factura
    //CUIT (Sin guiones)
    $empresaCuit  = '20307766516';
    //El alias debe estar mencionado en el nombre de los archivos de certificados y firmas digitales
    $empresaAlias = 'padronA5';
	//WebService que utilizara la autenticacion
	$webService   = 'ws_sr_padron_a5';
	//Creando el objeto WSAA (Web Service de Autenticación y Autorización)
	$wsaa = new AfipWsaa($webService,$empresaAlias);
//Creando el TA (Ticket de acceso)
if ($ta = $wsaa->loginCms())
{
    $token      = $ta['token'];
    $sign       = $ta['sign'];
    $expiration = $ta['expiration'];
    $uniqueid   = $ta['uniqueid'];

    //Conectando al WebService de Padron A4(WsFev1)
    $entorno    = SERVER_ENTORNO;
	if ($entorno == 'Test')
			//HOMOLOGACION
			$client1 = new nusoap_client('https://awshomo.afip.gov.ar/sr-padron/webservices/personaServiceA5?WSDL', true);
	elseif ($entorno == 'Prod')
			//PRODUCCION
			$client1 = new nusoap_client("https://aws.afip.gov.ar/sr-padron/webservices/personaServiceA5?WSDL", true);

		// Check for an error
	$err = $client1->getError();
	if ($err) {
			// Display the error
		echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
			//	 At this point, you know the call that follows will fail
	}
	/*Test*/
	$result = $client1->call('dummy');
	if ($client1->fault) {	
		echo '<h2>Fault dummy [Entorno: '.SERVER_ENTORNO.']</h2><pre>';
		print_r($result);
		echo '</pre>';	
	} else {
		// Check for errors
		$err = $client1->getError();
		if ($err) {
			// Display the error
			echo '<h2>Error dummy [Entorno: '.SERVER_ENTORNO.']</h2><pre>' . $err . '</pre>'.var_dump($result);
		} else {
			echo '<h2>dummy [Entorno: '.SERVER_ENTORNO.']</h2><pre>';
			print_r($result);
			echo '</pre>';
		}
	}
	/*Test*/
	/*Consultar Personas */
	//Ej: 30709751960 // Banco Nacion
	$idPersona="30500010912";
	$parameters= array('token' => $token ,'sign' => $sign ,'cuitRepresentada' => $empresaCuit ,'idPersona' => $idPersona);
	$result = $client1->call('getPersona', array('parameters' => $parameters));
	//print_r($result);exit;
	if ($client1->fault) {	
		echo '<h2>Fault getPersona [Entorno: '.SERVER_ENTORNO.']</h2><pre>';
		print_r($result);
		echo '</pre>';
	} else {
		// Check for errors
		$err = $client1->getError();
		if ($err) {
			// Display the error
			echo '<h2>Error getPersona [Entorno: '.SERVER_ENTORNO.']</h2><pre>' . $err . '</pre>'.var_dump($result);
		} else {
			echo '<h2>getPersona [Entorno: '.SERVER_ENTORNO.']</h2><pre>';
			print_r($result);
			echo '</pre>';
		}
	}
}
else
{
    echo '
    <hr/>
    <h3>Errores detectados al generar el Ticket de Acceso</h3>';
    pr($wsaa->getErrLog());
}


?>
    </body>
</html>