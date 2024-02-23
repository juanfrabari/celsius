<?php 
include'session.php';
include'conex.php';

if (!empty($_GET['id_prod'])) {
    $sql_elimina="DELETE FROM `productos` WHERE `productos`.`id_prod` = '{$_GET['id_prod']}' ";
    mysqli_query($link, $sql_elimina);
    header('location:data-productos.php?error=0');
    die();
}

if (!empty($_GET['id_cliente'])) {
    
    $sql_elimina="DELETE FROM `clientes` WHERE `clientes`.`id_cliente` =  '{$_GET['id_cliente']}'";
    mysqli_query($link, $sql_elimina);
    header('location:data-clientes.php?error=0');
    die();
}

if (!empty($_GET['id_pedido'])) {
 //   echo 'vengo a borrar un pedidos';  die();
    $sql_elimina="DELETE FROM `pedidos` WHERE `pedidos`.`id_pedido` = '{$_GET['id_pedido']}'";
    mysqli_query($link, $sql_elimina);
    header('location:data-pedidos.php?error=0');
    die();
}
//DELETE FROM `pedidos` WHERE `pedidos`.`id_pedido` = 1

 ?>