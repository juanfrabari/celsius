<?php
include 'conex.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newOrder = $_POST["newOrder"];

    $orderArray = explode(',', $newOrder);
    $filteredArray = array_filter($orderArray); // Elimina elementos nulos o vacíos
    $elementCount = count($filteredArray);
    print_r($filteredArray);

    $orden = 1;

    foreach ($filteredArray as $index => $value) {
        // Verificar si el valor no está vacío ni es nulo
        if ($value !== "" && $value !== null) {
            echo '<br>UPDATE histo SET venta_histo = '.$orden.' WHERE histo id_histo = '.$value;
            $sql_temp = "UPDATE `histo` SET `venta_histo` = '$orden' WHERE `histo`.`id_histo` = '$value'";
            $rs_temp = mysqli_query($link, $sql_temp);
            $orden++;
        }
    }
    //echo '<hr>'.$orden.'<hr>';
}
$ruta = $_POST['ruta'];
header('Location: ordenar.php?ruta=' . $ruta);
exit();  // Asegúrate de agregar exit() para evitar que el script siga ejecutándose después de la redirección
?>
