<?php
include 'session.php';
include 'conex.php';
//echo $_GET['hojaderuta'].'<hr>';
//SELECT * FROM `temp` WHERE `condi_temp` = '69452007' ORDER BY `id_temp` ASC
$sql_rutas="SELECT * FROM `temp` WHERE `condi_temp` = '{$_GET['hojaderuta']}' ORDER BY `id_temp` ASC";
$rs_rutas=mysqli_query($link, $sql_rutas);

//actualizo el estado del pedido, 
echo '<br>pedido = '.$_GET['pedido'];
$sql_actualiza_estado_pedido="UPDATE `pedidos` SET `estado_pedido` = '' WHERE `pedidos`.`cod_pedido` = '{$_GET['pedido']}'";
mysqli_query($link, $sql_actualiza_estado_pedido);

$sql_elimina_pedido="DELETE FROM `temp` WHERE `temp`.`cadena_temp` = '{$_GET['pedido']}'";
mysqli_query($link, $sql_elimina_pedido);


header('location:hoja-ruta.php');