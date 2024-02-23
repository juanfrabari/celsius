<?php
// Obtener los nombres de las variables POST
$variables_post = array_keys($_POST);

// Mostrar los nombres de las variables
echo "Listado de nombres de variables POST:<br>";
foreach ($variables_post as $nombre_variable)
{
    echo "$nombre_variable <br>";
}

//echo '<hr>n_pedido='.$_POST['n_pedido'];
//echo '<hr>forma_pago='.$_POST['forma_pago'];
//die();


include 'session.php';
include 'conex.php';

$forma_pago = $_POST['forma_pago'];

/*echo '<br>n_pedido = '.$_POST['n_pedido'];

die();
*/
//Fecha Actual
$campos_post = array_keys($_POST);

///foreach ($campos_post as $campo) {
///    echo "Nombre del campo: $campo<br>";
///}
///die();
// Establece la zona horaria de Argentina
date_default_timezone_set('America/Argentina/Buenos_Aires');
// Obtiene la fecha y hora actual en el formato deseado
$fecha_actual = date('Y-m-d H:i:s');

// Resultados de la primera consulta (histo)
$sql_pedidos = "SELECT * FROM `pedidos` WHERE `cod_pedido` = '{$_POST['n_pedido']}'";
$rs_pedidos = mysqli_query($link, $sql_pedidos);

$pedidosResults1 = array(); // Aquí almacenaremos los resultados
while ($file_pedidos1 = mysqli_fetch_assoc($rs_pedidos))
{
    echo $file_pedidos1['monto_pedido'] . '<br>';
    $pedidosResults1[] = $file_pedidos1; // Almacenar en el array
    
}

//echo '<pre>';
//print_r($pedidosResults1);
//echo '</pre>';  die();
$sql_histo = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$_POST['n_pedido']}'";
$rs_histo = mysqli_query($link, $sql_histo);

$histoResults = array(); // Almacenaremos los resultados de histo
while ($file_histo = mysqli_fetch_assoc($rs_histo))
{
    $histoResults[] = $file_histo;
}

// Ahora puedes contar y mostrar los resultados
//echo '<br>histoResults = ' . count($histoResults);
//echo '<br>pedidosResults1 = ' . count($pedidosResults1);


// Asegúrate de que ambos arrays tengan la misma cantidad de elementos
if (count($histoResults) === count($pedidosResults1))
{
    for ($i = 0;$i < count($histoResults);$i++)
    {
        $cantHisto = $histoResults[$i]['cant_histo'];
        $cantPedido = $pedidosResults1[$i]['cant_pedido'];
        // Realiza la comparación entre $cantHisto y $cantPedido
        if ($cantHisto == $cantPedido)
        {
            //no hay cambios en la cantidad de productos, actualizo el stock
            echo "Los valores de la fila $i son iguales: $cantHisto == $cantPedido <br>";

            //debo obtener el ID del Producto
            echo 'idProducto =' . $idProducto = $pedidosResults1[$i]['prod_pedido'];
            echo '<br>';

            // Consulto STOCK Actual
            $sql_cantidad_actual = "SELECT * FROM `productos` WHERE `id_prod` = '$idProducto'";
            $rs_cantidad_actual = mysqli_query($link, $sql_cantidad_actual);
            $file_cantidad_actual = mysqli_fetch_assoc($rs_cantidad_actual);
            echo $file_cantidad_actual['nom_prod'];
            echo '<br>';
            echo 'stock_actual=' . $stock_actual = $file_cantidad_actual['cant_prod'];
            $stock_actualizado = $stock_actual - $cantPedido;
            echo '<br>stock_actualizado=' . $stock_actualizado;
            echo '<hr>';

            // variable id del pedido
            $id_producto = $pedidosResults1[$i]['prod_pedido'];
            //Actualizo STOCK
            $sql_actualiza_stock = "UPDATE `productos` SET `cant_prod` = '$stock_actualizado' WHERE `productos`.`id_prod` = '$id_producto'";
            $rs_actualiza_stock = mysqli_query($link, $sql_actualiza_stock);

            //actualizo estado de pedido
            $sql_estado_pedido = "UPDATE `pedidos` SET `estado_pedido` = 'finalizada' WHERE `pedidos`.`cod_pedido` = '{$_POST['n_pedido']}'";
            mysqli_query($link, $sql_estado_pedido);

            //PREGUNTO SI ES pRE COMPRA
            if ($pedidosResults1[$i]['condi_pedido'] == 'Pre Compra')
            {
                $forma_pago = 'Pre Compra';
//con el nro de pedido averiguo el ID del cliente
$sql_actualiza_precompra="SELECT * FROM `pedidos` WHERE `cod_pedido` = '{$_POST['n_pedido']}'";
$rs_actualiza_precompra=mysqli_query($link, $sql_actualiza_precompra);
$file_actualiza_precompra=mysqli_fetch_assoc($rs_actualiza_precompra);
echo '<br>cli_pedido = '.$file_actualiza_precompra['cli_pedido'];
$id_producto_precompra = $file_actualiza_precompra['prod_pedido'];
//con el ID del cliente averigui el nombre
$sql_actualiza_precompra="SELECT * FROM `clientes` WHERE `id_cliente` = '{$file_actualiza_precompra['cli_pedido']}'";
$rs_actualiza_precompra=mysqli_query($link, $sql_actualiza_precompra);
$file_actualiza_precompra=mysqli_fetch_assoc($rs_actualiza_precompra);
echo '<br>nombre cliente = '.$file_actualiza_precompra['nom_cliente'];
//con el nombre del cliente averiguo si tiene sucursales por va traer mas de un resultadoa
//$sql_actualiza_precompra="SELECT * FROM `clientes` WHERE `nom_cliente` = '{$file_actualiza_precompra['nom_cliente']}'";
$sql_actualiza_precompra="SELECT * FROM `clientes` WHERE `nom_cliente` = '{$file_actualiza_precompra['nom_cliente']}'";
$rs_actualiza_precompra=mysqli_query($link, $sql_actualiza_precompra);
while ($fila = mysqli_fetch_assoc($rs_actualiza_precompra)) {
    echo '<br>' . $fila['id_cliente'];
    $cantidad_restar_precompra=$stock_actual-$stock_actualizado;
    echo '<br>id del producto pedido = '.$id_producto_precompra;
    //pregunto si coincide cliente producto y estado
    $sql_cantidad_precompra="SELECT * FROM `pedidos` WHERE `cli_pedido` = '{$fila['id_cliente']}' 
    AND `prod_pedido` = '{$id_producto_precompra}' AND `estado_pedido` = 'pre' ";
    $rs_cantidad_precompra=mysqli_query($link, $sql_cantidad_precompra);
    //de ser asi actualizo la precompra
    if(mysqli_num_rows($rs_cantidad_precompra) > 0) 
        {    
            $file_cantidad_precompra=mysqli_fetch_assoc($rs_cantidad_precompra);
            echo '<br>cantidad actual = '.$file_cantidad_precompra['cant_pedido'];
            echo '<br>cantidad a restar = '.$cantidad_restar_precompra;
            echo '<br>nueva cantidad ='.$nueva_cantidad= $file_cantidad_precompra['cant_pedido']-$cantidad_restar_precompra;
            //finalmente actualizo cantidad de precompra
            $sql_actualizo_cantidad_precompra="UPDATE `pedidos` SET `cant_pedido` = '$nueva_cantidad' 
            WHERE `pedidos`.`cli_pedido` = '{$fila['id_cliente']}'";

           mysqli_query($link, $sql_actualizo_cantidad_precompra); 
        }
}



            //    echo '<hr>Diferentes   : '.$_POST['n_pedido']; die();
            }

            ////actualizo estado de la tabla Histo.
            $sql_finaliza2 = "UPDATE `histo` SET `estado_histo` = 'finalizada', `update_histo` = '$fecha_actual', `venta_histo` = '{$forma_pago}' WHERE `histo`.`pedido_histo` = '{$_POST['n_pedido']}'";
            mysqli_query($link, $sql_finaliza2);

            echo '<HR>NRO DE PEDIDO' . $_POST['n_pedido'];
            $sql_busca_ruta = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$_POST['n_pedido']}'";
            $rs_busca_ruta = mysqli_query($link, $sql_busca_ruta);
            $file_busca_ruta = mysqli_fetch_assoc($rs_busca_ruta);

            header('location:detalle-ruta.php?ruta=' . $file_busca_ruta['ruta_histo'] . '&error=0');

        }
        else
        {

            echo "Los valores de la fila $i son diferentes: $cantHisto != $cantPedido <br>";
            echo $histoResults[$i]['pedido_histo'];
            echo '<br>';
            echo 'idProducto =' . $idProducto = $pedidosResults1[$i]['prod_pedido'];
            echo '<br>';
            echo 'diferencia=' . $diferencia = $cantPedido - $cantHisto;
            echo '<br>';

            // Consulto STOCK Actual
            $sql_cantidad_actual = "SELECT * FROM `productos` WHERE `id_prod` = '$idProducto'";
            $rs_cantidad_actual = mysqli_query($link, $sql_cantidad_actual);
            $file_cantidad_actual = mysqli_fetch_assoc($rs_cantidad_actual);

            echo 'stock_actual=' . $stock_actual = $file_cantidad_actual['cant_prod'];
            echo '<br>';
            echo 'Nueva cantidad del Pedido = ' . $cantHisto;
            echo '<br>';
            echo 'Stock actualizado =' . $stock_actual . ' - ' . $cantHisto;
            $stock_actualizado = $stock_actual - $cantHisto;
            echo '<br>Resultado de Stock actualizado =' . $stock_actualizado;
            echo '<br>';
            echo 'codigo_pedido = ' . $codigo_pedido = $histoResults[$i]['pedido_histo'];
            echo '<br>';

            //Actualizo STOCK
            $sql_actualiza_stock = "UPDATE `productos` SET `cant_prod` = '$stock_actualizado' 
            WHERE `productos`.`id_prod` = '$idProducto'";
            $rs_actualiza_stock = mysqli_query($link, $sql_actualiza_stock);

            //averiguo el nombre del producto con el ID
            $id_prod = $pedidosResults1[$i]['prod_pedido'];
            $sql_nom_producto = "SELECT * FROM `productos` WHERE `id_prod` = '$idProducto'";
            $rs_nom_producto = mysqli_query($link, $sql_nom_producto);
            $file_nom_producto = mysqli_fetch_assoc($rs_nom_producto);
            echo $nombre_producto = $file_nom_producto['nom_prod'];
            echo '<br>codigo pedido antes de ingresar a la base' . $codigo_pedido;
            echo '<hr>';

            //ingreso un registro en la tabla de pedidos modificatos
            $sql_pedido_diferente = "INSERT INTO `modificados` (`id_modificados`, `cod_modificados`, `prod_modificados`,  `nomprod_modificados`, `cant_modificados`) 
            VALUES (NULL, '$codigo_pedido', '$idProducto',  '$nombre_producto', '$diferencia');";
            mysqli_query($link, $sql_pedido_diferente);

            //cantidad de producto modificada por lo tanto se actualiza la patbla pedido
            $sql_actualizo_pedido = "UPDATE `pedidos` SET `cant_pedido` = '$cantHisto', `estado_pedido` ='finalizada'
            WHERE `prod_pedido` = '$idProducto' AND `cod_pedido` = '$codigo_pedido'";
            $rs_actualizo_pedido = mysqli_query($link, $sql_actualizo_pedido);

            //actualizo estado de pedido
            $sql_estado_pedido = "UPDATE `pedidos` SET `estado_pedido` = 'finalizada' WHERE `pedidos`.`cod_pedido` = '{$_POST['n_pedido']}'";
            mysqli_query($link, $sql_estado_pedido);

            //PREGUNTO SI ES pRE COMPRA
            if ($pedidosResults1[$i]['condi_pedido'] == 'Pre Compra')
            {
                $forma_pago = 'Pre Compra';
//con el nro de pedido averiguo el ID del cliente
$sql_actualiza_precompra="SELECT * FROM `pedidos` WHERE `cod_pedido` = '{$_POST['n_pedido']}'";
$rs_actualiza_precompra=mysqli_query($link, $sql_actualiza_precompra);
$file_actualiza_precompra=mysqli_fetch_assoc($rs_actualiza_precompra);
echo '<br>cli_pedido = '.$file_actualiza_precompra['cli_pedido'];
$id_producto_precompra = $file_actualiza_precompra['prod_pedido'];
//con el ID del cliente averigui el nombre
$sql_actualiza_precompra="SELECT * FROM `clientes` WHERE `id_cliente` = '{$file_actualiza_precompra['cli_pedido']}'";
$rs_actualiza_precompra=mysqli_query($link, $sql_actualiza_precompra);
$file_actualiza_precompra=mysqli_fetch_assoc($rs_actualiza_precompra);
echo '<br>nombre cliente = '.$file_actualiza_precompra['nom_cliente'];
//con el nombre del cliente averiguo si tiene sucursales por va traer mas de un resultadoa
//$sql_actualiza_precompra="SELECT * FROM `clientes` WHERE `nom_cliente` = '{$file_actualiza_precompra['nom_cliente']}'";
$sql_actualiza_precompra="SELECT * FROM `clientes` WHERE `nom_cliente` = '{$file_actualiza_precompra['nom_cliente']}'";
$rs_actualiza_precompra=mysqli_query($link, $sql_actualiza_precompra);
while ($fila = mysqli_fetch_assoc($rs_actualiza_precompra)) {
    echo '<br>' . $fila['id_cliente'];
    $cantidad_restar_precompra=$stock_actual-$stock_actualizado;
    echo '<br>id del producto pedido = '.$id_producto_precompra;
    //pregunto si coincide cliente producto y estado
    $sql_cantidad_precompra="SELECT * FROM `pedidos` WHERE `cli_pedido` = '{$fila['id_cliente']}' 
    AND `prod_pedido` = '{$id_producto_precompra}' AND `estado_pedido` = 'pre' ";
    $rs_cantidad_precompra=mysqli_query($link, $sql_cantidad_precompra);
    //de ser asi actualizo la precompra
    if(mysqli_num_rows($rs_cantidad_precompra) > 0) 
        {    
            $file_cantidad_precompra=mysqli_fetch_assoc($rs_cantidad_precompra);
            echo '<br>cantidad actual = '.$file_cantidad_precompra['cant_pedido'];
            echo '<br>cantidad a restar = '.$cantidad_restar_precompra;
            echo '<br>nueva cantidad ='.$nueva_cantidad= $file_cantidad_precompra['cant_pedido']-$cantidad_restar_precompra;
            //finalmente actualizo cantidad de precompra
            $sql_actualizo_cantidad_precompra="UPDATE `pedidos` SET `cant_pedido` = '$nueva_cantidad' 
            WHERE `pedidos`.`cli_pedido` = '{$fila['id_cliente']}'";

           mysqli_query($link, $sql_actualizo_cantidad_precompra); 
        }
}



            //    echo '<hr>Diferentes   : '.$_POST['n_pedido']; die();
            }

            ////actualizo estado de la tabla Histo.
            $sql_finaliza2 = "UPDATE `histo` SET `estado_histo` = 'finalizada', `update_histo` = '$fecha_actual' , `venta_histo` = '{$forma_pago}' WHERE `histo`.`pedido_histo` = '{$_POST['n_pedido']}'";
            mysqli_query($link, $sql_finaliza2);

            $sql_busca_ruta = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$_POST['n_pedido']}'";
            $rs_busca_ruta = mysqli_query($link, $sql_busca_ruta);
            $file_busca_ruta = mysqli_fetch_assoc($rs_busca_ruta);

            header('location:detalle-ruta.php?ruta=' . $file_busca_ruta['ruta_histo'] . '&error=0');

        }
    }
}
else
{
    echo "La cantidad de resultados de ambas consultas no coincide.";
}

die();

?>
