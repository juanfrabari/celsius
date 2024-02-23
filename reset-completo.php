<?php 
include 'conex.php';

$sql="TRUNCATE `histo`";
mysqli_query($link, $sql);

$sql="TRUNCATE `pedidos`";
mysqli_query($link, $sql);

$sql="TRUNCATE `temp`";
mysqli_query($link, $sql);

$sql="TRUNCATE `file`";
mysqli_query($link, $sql);

$sql="TRUNCATE `modificados`";
mysqli_query($link, $sql);

$sql="UPDATE `productos` SET `cant_prod` = '100'";
mysqli_query($link, $sql);

header('location:salir.php');

 ?>