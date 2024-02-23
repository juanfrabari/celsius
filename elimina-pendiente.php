<?php 
include'session.php';
include'conex.php';

echo $cod_pedido = $_GET['cod_pedido'];

//elimono de pedidos. 
$sql_elimina_pedido="DELETE FROM pedidos WHERE cod_pedido = '{$_GET['cod_pedido']}'";
mysqli_query($link, $sql_elimina_pedido);


//elimino de histo
$sql_elimina_pedido="DELETE FROM histo WHERE pedido_histo = '{$_GET['cod_pedido']}'";
mysqli_query($link, $sql_elimina_pedido);

//elimino de temp
$cadena = $_GET['cod_pedido'];
$nueva_cadena = substr($cadena, 0, -2);
$sql_elimina_pedido="DELETE FROM temp WHERE cadena_temp = '$nueva_cadena'";
mysqli_query($link, $sql_elimina_pedido);



header('location:data-pedidos.php?error=2');
//DELETE FROM pedidos WHERE cod_pedido = '8675922570';
 ?>


