<?php
require_once '../afip.php-master/src/Afip.php';

$username = '20257862438';
$password = 'Juan_25786243';
$alias = 'keytest';
$wsid = 'wsfe';

// Crear instancia de la clase Afip con la configuración proporcionada
$afip = new Afip(array('CUIT' => 20257862438));

// Utilizamos la instancia $afip para llamar al método CreateWSAuth.
$res = $afip->CreateWSAuth($username, $password, $alias, $wsid);

// Mostramos el resultado por pantalla
var_dump($res);
?>
