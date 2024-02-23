<?php 
include'session.php';
include'conex.php';
//echo 'ID = '.$_GET['id_item']; die();

$sql_elimina_item="DELETE FROM `temp` WHERE `temp`.`id_temp` = '{$_GET['id_item']}'";
mysqli_query($link, $sql_elimina_item);

if (isset($_GET['nom_archivo'])&& isset($_GET['ruta'])) {
   $nom_archivo=$_GET['nom_archivo'];
   if ($nom_archivo=='form-agrega-pedido.php') {
   	   
   	   $ruta=$_GET['ruta'];
	   //echo $nom_archivo;
	   header('location:form-agrega-pedido.php?ruta='.$ruta);
	   
      }
	# code...
}

else {header('location:form-pedidos.php'); }



//"DELETE FROM `temp` WHERE `temp`.`id_temp` = 1

 ?>