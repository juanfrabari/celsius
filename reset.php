<?php 
include'session.php';
include'conex.php';

$sql_cambia_estado="UPDATE `pedidos` SET `estado_pedido` = '' WHERE estado_pedido IN ('ruta confirmada', 'ruta', 'finalizada')";
mysqli_query($link, $sql_cambia_estado);

$sql_borra_temp="TRUNCATE `u765367970_celsius`.`temp`";
mysqli_query($link, $sql_borra_temp);

$sql_borra_histo="TRUNCATE `u765367970_celsius`.`histo`";
mysqli_query($link, $sql_borra_histo);
unset($_SESSION['id_ruta']);


header('location:index-admin.php');
 ?>