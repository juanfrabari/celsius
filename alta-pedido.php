<?php 
include'session.php';
include'conex.php';

//echo 'producto_hidden = '.$_GET['producto_hidden'];
//echo '<br>cliente_hidden = '.$_GET['cliente_hidden'];

//INSERT INTO `temp` (`id_temp`, `cli_temp`, `prod_temp`, `cant_temp`, `monto_temp`, `cadena_temp`, `us_temp`, `update_temp`) VALUES (NULL, '7', '3', '10', '500', '5000', 'admin', '2023-07-06 05:16:00');
//die();
$sql_pedido="INSERT INTO `pedidos` (`id_pedido`,
 `cli_pedido`,
 `prod_pedido`,
 `cant_pedido`,
 `update_pedido`,
 `us_pedido`) VALUES (NULL,
 '{$_GET['cliente_hidden']}',
 '{$_GET['producto_hidden']}',
 '{$_GET['cantidad']}',
  NULL,
 '{$_SESSION['user']}')";
mysqli_query($link, $sql_pedido);

header('location:form-pedidos.php?error=0');

 ?>