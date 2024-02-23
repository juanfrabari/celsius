<?php 
include'session.php';
include'conex.php';

echo '<br>producto = '.$producto=$_GET['producto'];
echo '<br>presenta = '.$presenta=$_GET['presenta'];
echo '<br>cant = '.$cant=$_GET['cant'];
echo '<br>precioBar = '.$precioBar=$_GET['precioBar'];
echo '<br>precioComercio = '.$precioComercio=$_GET['precioComercio'];
echo '<br>precioEventual = '.$precioEventual=$_GET['precioEventual'];


if (!empty($_GET['id_prod'])) {

$sql_actualiza="UPDATE `productos` SET `nom_prod` = '$producto',
 `pres_prod` = '$presenta',
 `cant_prod` = '$cant',
 `bar_prod` = '$precioBar',
 `comercio_prod` = '$precioComercio',
 `eventual_prod` = '$precioEventual',
 `us_prod` = '{$_SESSION['user']}',
 `update_prod` = NULL WHERE `productos`.`id_prod` = '{$_GET['id_prod']}'";
mysqli_query($link, $sql_actualiza);
header('location:form-productos.php?error=0&id_prod='.$_GET['id_prod']);
die();
}

$sql_nuevo_producto="INSERT INTO `productos` (`id_prod`,
 `nom_prod`,
 `pres_prod`,
 `cant_prod`,
 `bar_prod`,
 `comercio_prod`,
 `eventual_prod`,
 `us_prod`,
 `update_prod`) VALUES (NULL,
 '$producto',
 '$presenta',
 '$cant',
 '$precioBar',
 '$precioComercio',
 '$precioEventual',
 'Francisco',
 NULL)";
$rs_nuevo_producto=mysqli_query($link, $sql_nuevo_producto);
header('location:form-productos.php?error=0');
 ?>