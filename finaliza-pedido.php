<?php 
include'session.php';
include'conex.php';


/*echo '<br>n_pedido = '.$_POST['n_pedido'];


die();*/




// Resultados de la primera consulta (histo)
$sql_pedidos = "SELECT * FROM `pedidos` WHERE `cod_pedido` = '{$_POST['n_pedido']}'";
$rs_pedidos = mysqli_query($link, $sql_pedidos);

$pedidosResults1 = array(); // Aquí almacenaremos los resultados

while ($file_pedidos1 = mysqli_fetch_assoc($rs_pedidos)) {
  //  echo $file_pedidos1['monto_pedido'] . '<br>';
    $pedidosResults1[] = $file_pedidos1; // Almacenar en el array
}

echo '<pre>';
print_r($pedidosResults1);
echo '</pre>';  die();

/*------------------------------------------------------------------------------*/
$sql_histo = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$_POST['n_pedido']}'";
$rs_histo = mysqli_query($link, $sql_histo);


$histoResults = array(); // Almacenaremos los resultados de histo

while ($file_histo = mysqli_fetch_assoc($rs_histo)) {
    $histoResults[] = $file_histo;
}

// Ahora puedes contar y mostrar los resultados
//echo '<br>histoResults = ' . count($histoResults);
//echo '<br>pedidosResults1 = ' . count($pedidosResults1);



// Asegúrate de que ambos arrays tengan la misma cantidad de elementos
if (count($histoResults) === count($pedidosResults1)) {
    for ($i = 0; $i < count($histoResults); $i++) {
        $cantHisto = $histoResults[$i]['cant_histo'];
        $cantPedido = $pedidosResults1[$i]['cant_pedido'];
        // Realiza la comparación entre $cantHisto y $cantPedido
        if ($cantHisto == $cantPedido) {
        //no hay cambios en la cantidad de productos, actualizo el stock
            echo "Los valores de la fila $i son iguales: $cantHisto == $cantPedido <br>";

		echo 'idHisto ='.$idHisto = $histoResults[$i]['id_histo'];
        echo '<br>';
	    // Consulto STOCK Actual
        $sql_cantidad_actual="SELECT * FROM `productos` WHERE `id_prod` = '$idHisto'";
        $rs_cantidad_actual=mysqli_query($link, $sql_cantidad_actual);
        $file_cantidad_actual=mysqli_fetch_assoc($rs_cantidad_actual);
        
        echo 'stock_actual='.$stock_actual=$file_cantidad_actual['cant_prod'];
        $stock_actualizado=$stock_actual-$cantPedido;
        echo '<br>stock_actualizado='.$stock_actualizado;
        echo '<br>';
        // variable id del pedido
        $id_producto=$pedidosResults1[$i]['prod_pedido'];
        //Actualizo STOCK
        $sql_actualiza_stock="UPDATE `productos` SET `cant_prod` = '$stock_actualizado' WHERE `productos`.`id_prod` = '$id_producto'";
        $rs_actualiza_stock=mysqli_query($link, $sql_actualiza_stock);

        } else {
            echo "Los valores de la fila $i son diferentes: $cantHisto != $cantPedido <br>";
            echo $histoResults[$i]['pedido_histo'].'<hr>';
            $codigo_pedido=$histoResults[$i]['pedido_histo'].'<hr>';

            //averiguo el nombre del producto con el ID
            $id_prod=$pedidosResults1[$i]['prod_pedido'];
            $sql_nom_producto="SELECT * FROM `productos` WHERE `id_prod` = '$id_prod'";
            $rs_nom_producto=mysqli_query($link, $sql_nom_producto);
            $file_nom_producto=mysqli_fetch_assoc($rs_nom_producto);
            echo $file_nom_producto['nom_prod'].'<hr>';

            $diferencia=$cantPedido-$cantHisto;
            echo 'Diferencia = '.$diferencia;
            echo '<br>';
            $nombre_producto=$file_nom_producto['nom_prod'].'////'.$file_nom_producto['pres_prod'];

            // Consulto STOCK Actual  TODO: la variable $idHisto (No esta definida !)
        	$sql_cantidad_actual="SELECT * FROM `productos` WHERE `id_prod` = '$idHisto'";
        	$rs_cantidad_actual=mysqli_query($link, $sql_cantidad_actual);
        	$file_cantidad_actual=mysqli_fetch_assoc($rs_cantidad_actual);
        	
        	echo 'stock_actual='.$stock_actual=$file_cantidad_actual['cant_prod'];
            $stock_actualizado=$stock_actual-$cantPedido-$diferencia;
            echo '<br>stock_actualizado='.$stock_actualizado;
            
            // variable id del pedido
            $id_producto=$pedidosResults1[$i]['prod_pedido'];
        	//Actualizo STOCK
        	$sql_actualiza_stock="UPDATE `productos` SET `cant_prod` = '$stock_actualizado' WHERE `productos`.`id_prod` = '$id_producto'";
        	$rs_actualiza_stock=mysqli_query($link, $sql_actualiza_stock);


            //ingreso un registro en la tabla de pedidos modificatos
            $sql_pedido_diferente="INSERT INTO `modificados` (`id_modificados`, `cod_modificados`, `prod_modificados`,  `nomprod_modificados`, `cant_modificados`) 
            VALUES (NULL, '$codigo_pedido', '$id_prod',  '$nombre_producto', '$diferencia');";
            mysqli_query($link, $sql_pedido_diferente);
            /*INSERT INTO `modificados` (`id_modificados`, `cod_modificados`, `prod_modificados`, `cant_modificados`) VALUES (NULL, '111111111', '11', '1');*/
        }
    }
} else {
    echo "La cantidad de resultados de ambas consultas no coincide.";
}


die();
















      // Consulto STOCK Actual
        $sql_cantidad_actual="SELECT * FROM `productos` WHERE `id_prod` = '{$file_temp['prod_temp']}'";
        $rs_cantidad_actual=mysqli_query($link, $sql_cantidad_actual);
        $file_cantidad_actual=mysqli_fetch_assoc($rs_cantidad_actual);
        $stock_actual=$file_cantidad_actual['cant_prod'];
        $stock_actualizado=$stock_actual-$file_temp['cant_temp'];

        // Actualizo STOCK
        $sql_actualiza_stock="UPDATE `productos` SET `cant_prod` = '$stock_actualizado' WHERE `productos`.`id_prod` = '{$file_temp['prod_temp']}'";
        $rs_actualiza_stock=mysqli_query($link, $sql_actualiza_stock);















$sql_finaliza1="UPDATE `pedidos` SET `estado_pedido` = 'finalizada' WHERE `pedidos`.`cod_pedido` = '{$_POST['n_pedido']}'";
mysqli_query($link, $sql_finaliza1);

$sql_finaliza2="UPDATE `histo` SET `estado_histo` = 'finalizada', `venta_histo` = '{$_POST['forma_pago']}' WHERE `histo`.`pedido_histo` = '{$_POST['n_pedido']}'";
mysqli_query($link, $sql_finaliza2);

$sql_ruta="SELECT * FROM `histo` WHERE `pedido_histo` = '{$_POST['n_pedido']}'";
$rs_ruta=mysqli_query($link, $sql_ruta);
$file_ruta=mysqli_fetch_assoc($rs_ruta);

echo $file_ruta['ruta_histo'];

header('location:detalle-ruta.php?ruta='.$file_ruta['ruta_histo']);
 ?>
