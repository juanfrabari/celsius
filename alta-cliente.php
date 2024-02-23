<?php 
include'session.php';
include'conex.php';

$nombre=$_GET['nombre'];
$contacto=$_GET['contacto'];
$dir=$_GET['dir'];
$saldo=$_GET['saldo'];

$condicion=$_GET['condicion'];

$heladeras_seleccionadas='';
if (isset($_GET['heladera'])) {
    $heladerasSeleccionadas = $_GET['heladera'];
    // $heladerasSeleccionadas es un array que contiene los valores de los checkboxes seleccionados
    foreach ($heladerasSeleccionadas as $heladera) {
        //echo "Has seleccionado: " . $heladera . "<br>";
        $heladeras_seleccionadas=$heladeras_seleccionadas.'////'.$heladera;
    }
}

// Configura la zona horaria a Argentina
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Obtiene la fecha y hora actual en Argentina
$fechaActualArgentina = date('Y-m-d H:i:s');
//echo '<hr>'.$heladeras_seleccionadas;
//die();
$sql_cliente="INSERT INTO `clientes` (`id_cliente`,
 `nom_cliente`,
 `contacto_cliente`,
 `dir_cliente`,
 `saldo_cliente`,
 `venta_cliente`,
 `hela_cliente`,
 `update_cliente`,
 `us_cliente`) VALUES (NULL,
 '$nombre',
 '$contacto',
 '$dir',
 '$saldo',
 '$condicion',
 '$heladeras_seleccionadas',
 '$fechaActualArgentina',
 '{$_SESSION['user']}')";
mysqli_query($link, $sql_cliente);
header('location:form-clientes.php?error=0');
/*INSERT INTO `clientes` (`id_cliente`, `nom_cliente`, `contacto_cliente`, `dir_cliente`, `saldo_cliente`, `venta_cliente`, `hela_cliente`, `update_cliente`, `us_cliente`) VALUES (NULL, 'nom', 'contact', 'dire', 'saldo', 'condicion', 'heladera', '2023-06-20 09:35:36', 'francisco');*/
?>