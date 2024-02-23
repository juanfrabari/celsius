<?php 
// CUIT al cual le queremos generar el certificado
$tax_id = 20257862438; 

// Usuario para ingresar a AFIP.
// Para la mayoria es el mismo CUIT, pero al administrar
// una sociedad el CUIT con el que se ingresa es el del administrador
// de la sociedad.
$username = '20257862438'; 

// Contraseña para ingresar a AFIP.
$password = 'Juan_25786243';

// Alias para el certificado (Nombre para reconocerlo en AFIP)
// un alias puede tener muchos certificados, si estas renovando
// un certificado pordes utilizar le mismo alias
$alias = 'keytest';

// Creamos una instancia de la libreria
$afip = new Afip(array(
    'CUIT' => $tax_id,
    'access_token' => 'access_token obtenido en https://app.afipsdk.com/', // Coma añadida aquí
    'production' => TRUE
));

// Creamos el certificado
$res = $afip->CreateCert(username, password, alias);

// Mostramos el certificado por pantalla
var_dump($res->cert);

// Mostramos la key por pantalla
var_dump($res->key);

// ATENCION! Recorda guardar el cert y key ya que 
// la libreria por seguridad no los guarda, esto depende de vos.
// Si no lo guardas vas tener que generar uno nuevo con este metodo
 ?>