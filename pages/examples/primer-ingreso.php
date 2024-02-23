<?php 

include'../../conex.php';

$url = $_SERVER['HTTP_REFERER'];
$filename = basename($url);
echo $filename;

$sql_nuevo_pas="UPDATE `us` SET `pas_us` = '{$_POST['pas1']}' WHERE `us`.`id_us` = '{$_POST['id_us']}'";
mysqli_query($link, $sql_nuevo_pas);


//header('location:valida.php');

 ?>
