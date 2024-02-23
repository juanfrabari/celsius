<?php 

include'conex.php';
// consulto cliente elejido 
/* $sql_cliente="SELECT * FROM `clientes` WHERE `nom_cliente` = '{$_GET['cliente_hidden']}'";
$rs_cliente=mysqli_query($link, $sql_cliente);
$cant_cliente=mysqli_fetch_assoc($rs_cliente);
if ($cant_cliente<1){header('location:form-pedidos.php?error=1&id_cadena='.$_GET['cadenaAleatoria'].'&id_cliente='.$_GET['cliente_hidden']); die();}
*/
include'session.php';


//con el ID del cliente averiguo el nombre. 
$sql_cliente_id="SELECT * FROM `clientes` WHERE `id_cliente` = '{$_GET['cliente_hidden']}'";
$rs_cliente_id=mysqli_query($link, $sql_cliente_id);
$file_cliente_id=mysqli_fetch_assoc($rs_cliente_id);
$nombre_cliente=$file_cliente_id['nom_cliente'];

//con el nombre averiguo cantas sucursales tiene, y vuelvo a traer todos los Id del cliente
$sql_cliente_caracter="SELECT * FROM `clientes` WHERE `nom_cliente` = '$nombre_cliente'";
$rs_cliente_caracter=mysqli_query($link, $sql_cliente_caracter);

$hay_pedido_previo = 0; // Inicializa la variable fuera del bucle
$mayor = 0; 

while ($file_cliente_caracter=mysqli_fetch_assoc($rs_cliente_caracter)) 
      {
        $id_cliente= $file_cliente_caracter['id_cliente'];
        $sql_pre="SELECT * FROM `pedidos` WHERE `cli_pedido` = '$id_cliente' AND `prod_pedido` = '{$_GET['producto_hidden']}' AND `estado_pedido` = 'pre'";
        echo "SELECT * FROM pedidos WHERE cli_pedido = ".$id_cliente." AND prod_pedido = ".$_GET['producto_hidden']." AND estado_pedido = pre<br>";
        $rs_pre=mysqli_query($link, $sql_pre);
        $hay_pedido_previo=mysqli_num_rows($rs_pre);
        //echo '('.$hay_pedido_previo.')';
        //echo 'id_cliente :'.$id_cliente;
        //echo'<br>producto_hidden :'.$_GET['producto_hidden'];  die();
        // Actualiza $hay_pedido_previo si el valor actual es mayor
    if ($hay_pedido_previo > 0) { $mayor = 1; }
      }

$hay_pedido_previo=$mayor;



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
         if ($hay_pedido_previo>0) { $condicion_de_venta='Pre Compra'; }
         else { $condicion_de_venta=$_GET['customRadio']; }

         //echo $_GET['producto_hidden'];
         //echo 'id_cliente = '.$id_cliente;  
         //die();

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
              header('location:form-agrega-pedido.php?error=0&id_cadena='.$_GET['cadenaAleatoria'].'&id_cliente='.$_GET['cliente_hidden'].'&ruta='.$_GET['ruta']); exit();
            }
        else {header('location:form-pedidos.php?error=0&id_cadena='.$_GET['cadenaAleatoria'].'&id_cliente='.$_GET['cliente_hidden']); } exit();
        } 

}
else
{header('location:form-pedidos.php?error=1&id_cadena='.$_GET['cadenaAleatoria'].'&id_cliente='.$_GET['cliente_hidden']);} exit();
 ?>