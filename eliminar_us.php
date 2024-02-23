<?php 
include'conex.php';

$sql_elimina_usuario="UPDATE `us` SET `priv` = 'eliminado' WHERE `us`.`id_us` = '{$_GET['id']}'";
mysqli_query($link, $sql_elimina_usuario);
header('location:data-usuarios.php');
 ?>