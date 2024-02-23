<?php 

include'conex.php';
// consulto cliente elejido 
/* $sql_cliente="SELECT * FROM `clientes` WHERE `nom_cliente` = '{$_GET['cliente_hidden']}'";
$rs_cliente=mysqli_query($link, $sql_cliente);
$cant_cliente=mysqli_fetch_assoc($rs_cliente);
if ($cant_cliente<1){header('location:form-pedidos.php?error=1&id_cadena='.$_GET['cadenaAleatoria'].'&id_cliente='.$_GET['cliente_hidden']); die();}
*/
include'session.php';

//verifico si hay una precompra
$sql_pre="SELECT * FROM `pedidos` 
WHERE `cli_pedido` = '{$_GET['cliente_hidden']}' AND `prod_pedido` = '{$_GET['producto_hidden']}'";
$rs_pre=mysqli_query($link, $sql_pre);
$hay_pedido_previo=mysqli_num_rows($rs_pre);



// consulto el producto elejido 
$sql_pruducto="SELECT * FROM `productos` WHERE `id_prod` = '{$_GET['producto_hidden']}'";
$rs_producto=mysqli_query($link, $sql_pruducto);
$file_producto=mysqli_fetch_assoc($rs_producto);

if ($rs_producto && mysqli_num_rows($rs_producto) > 0) {
         //minusculas para que monto es la venta bar eventual comercio

         $condicion_venta = strtolower($_GET['customRadio']);
         $condicion_venta=$condicion_venta.'_prod';
         
         //ya se la condicion elejida, traigo el monto
         $condicion_monto=$file_producto[$condicion_venta];
         $condicion_monto;
         
         // calculo cantidad por el monto que cuesta
         $monto_final=$condicion_monto*$_GET['cantidad'];
         if ($hay_pedido_previo>0) {
          $condicion_de_venta='Pre Compra';
         }
         else{
          
         $condicion_de_venta=$_GET['customRadio'];
         }
         

         $sql_temp="INSERT INTO `temp` (`id_temp`,
          `cli_temp`,
          `prod_temp`,
          `cant_temp`,
          `monto_temp`,
          `condi_temp`,
          `cadena_temp`,
          `us_temp`,
          `update_temp`) VALUES (NULL,
          '{$_GET['cliente_hidden']}',
          '{$_GET['producto_hidden']}',
          '{$_GET['cantidad']}',
          '$monto_final',
          '$condicion_de_venta',
          '{$_GET['cadenaAleatoria']}',
          '{$_SESSION['user']}',
          NULL)";
         mysqli_query($link, $sql_temp);


        if(isset($_SERVER['HTTP_REFERER'])) {
        $referer = $_SERVER['HTTP_REFERER'];
        $urlParts = parse_url($referer);
    
        if(isset($urlParts['path'])) {
              $pathParts = pathinfo($urlParts['path']);
              $phpFileName = $pathParts['basename'];
              header('location:form-agrega-pedido.php?error=0&id_cadena='.$_GET['cadenaAleatoria'].'&id_cliente='.$_GET['cliente_hidden'].'&ruta='.$_GET['ruta']);
            }
        else {header('location:form-pedidos.php?error=0&id_cadena='.$_GET['cadenaAleatoria'].'&id_cliente='.$_GET['cliente_hidden']); }
        } 

}
else
{header('location:form-pedidos.php?error=1&id_cadena='.$_GET['cadenaAleatoria'].'&id_cliente='.$_GET['cliente_hidden']);}
 ?>