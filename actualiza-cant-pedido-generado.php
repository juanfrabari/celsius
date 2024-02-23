<?php
include 'session.php';
include 'conex.php';

if (isset($_GET['id_actualiza_histo'])) { 
    // echo 'Vengo a actualizar  '.$_GET['cantidad_modificada']; 

    // Identifico el monto que tenía antes
    $sql_registro_a_modificar = "SELECT * FROM `histo` WHERE `id_histo` = '{$_GET['id_actualiza_histo']}'";
    $rs_registro_a_modificar = mysqli_query($link, $sql_registro_a_modificar);
    $file_registro_a_modificar = mysqli_fetch_assoc($rs_registro_a_modificar);

    // Regla de 3 simple para saber en cuánto debe quedar el nuevo monto
    echo '<hr>$cant_nueva='.$cant_nueva    = $_GET['cantidad_modificada'];
    echo '<hr>$cant_anterior='.$cant_anterior = $file_registro_a_modificar['cant_histo'];
    echo '<hr>$monto_anterior='.$monto_anterior= $file_registro_a_modificar['monto_histo'];
    echo '<hr>$monto_nuevo='.$monto_nuevo   = ($cant_nueva * $monto_anterior) / $cant_anterior;

    // Hacer una pausa de 5 segundos antes de continuar
  

    $sql_actualizo_cantidad = "UPDATE `histo` SET `cant_histo` = '{$_GET['cantidad_modificada']}', `monto_histo` = '$monto_nuevo' WHERE `histo`.`id_histo` = '{$_GET['id_actualiza_histo']}'";

    mysqli_query($link, $sql_actualizo_cantidad);
    header('location:detalle-pedido-histo.php?pedido='.$_GET['pedido']);
    exit();
} else {
    header('location:detalle-pedido-histo.php?pedido='.$_GET['pedido'].'&id_histo='.$_GET['id_histo']);
}
?>
