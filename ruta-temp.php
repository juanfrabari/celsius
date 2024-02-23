<?php 

include'session.php';
include'conex.php';


//pregunto si ya hay una hoja de ruta en curso. 
if (!empty($_GET['cod'])&&empty($_SESSION['id_ruta'])) 
    { $_SESSION['id_ruta'] = generarCadenaAleatoria(8); 
      $cadenaPedido=$_SESSION['id_ruta'];
    }
    else
    { $cadenaPedido=$_SESSION['id_ruta']; } 

//me aseguro que no este vacia el codigo enviado por el formulario,     
if (!empty($_GET['cod'])) 
    { $codigo=$_GET['cod']; }

//actualizo el estado del pedido
$sql_estado_pedido="UPDATE `pedidos` SET `estado_pedido` = 'ruta' WHERE `cod_pedido` = '$codigo'";
mysqli_query($link, $sql_estado_pedido);


//consulto si ya hay un pedido en la hoja de ruta
$sql_consulta_ruta="SELECT * FROM `temp` WHERE `condi_temp` = '$cadenaPedido'";
$rs_consulta_ruta=mysqli_query($link, $sql_consulta_ruta);
$cantidad_pedidos=mysqli_num_rows($rs_consulta_ruta);
echo 'Cant='.$cantidad_pedidos.'<hr>'; // die();
if ($cantidad_pedidos>0)
 {
   $orden=$_SESSION['orden'];
   $orden++; $_SESSION['orden']=$orden;
   echo 'Si hay pedidos, por lo tanto consluto cual es el nro mas grande del $file';
   $sql_ruta_temp="INSERT INTO `temp` (`id_temp`, `cli_temp`, `prod_temp`, `cant_temp`, `monto_temp`, `condi_temp`, `cadena_temp`, `us_temp`, `update_temp`) VALUES (NULL, '', '', '$orden', '', '$cadenaPedido', '$codigo', '', NULL)";
mysqli_query($link, $sql_ruta_temp);
 }
else
 { echo 'agrego el registro correspondinte';
  $_SESSION['orden']=1;  
  $orden=$_SESSION['orden'];
  $sql_ruta_temp="INSERT INTO `temp` (`id_temp`, `cli_temp`, `prod_temp`, `cant_temp`, `monto_temp`, `condi_temp`, `cadena_temp`, `us_temp`, `update_temp`) VALUES (NULL, '', '', '$orden', '', '$cadenaPedido', '$codigo', '', NULL)";
mysqli_query($link, $sql_ruta_temp);
}
header('location:hoja-ruta.php');
/*INSERT INTO `temp` (`id_temp`, `cli_temp`, `prod_temp`, `cant_temp`, `monto_temp`, `condi_temp`, `cadena_temp`, `us_temp`, `update_temp`) VALUES (NULL, '', '', '0', '', '', 'cadena', '', '0000-00-00 00:00:00.000000');


UPDATE `pedidos` SET `estado_pedido` = 'ruta' WHERE `pedidos`.`id_pedido` = 1;
*/

 ?>