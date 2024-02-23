<?php 
include'session.php';
include'conex.php';
$sql_elimina_finalizados="DELETE FROM pedidos WHERE `pedidos`.`estado_pedido` = 'finalizada'";
mysqli_query($link, $sql_elimina_finalizados);

header('location:data-pedidos.php');


 ?>