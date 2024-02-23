<?php
include '../conex.php';
// Resultados de la primera consulta (histo)
$sql_pedidos = "SELECT * FROM `pedidos` WHERE `cod_pedido` = '7647667829'";
$rs_pedidos = mysqli_query($link, $sql_pedidos);

$pedidosResults1 = array(); // Aquí almacenaremos los resultados

while ($file_pedidos1 = mysqli_fetch_assoc($rs_pedidos)) {
  //  echo $file_pedidos1['monto_pedido'] . '<br>';
    $pedidosResults1[] = $file_pedidos1; // Almacenar en el array
}

$sql_histo = "SELECT * FROM `histo` WHERE `pedido_histo` = '7647667829'";
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
            echo "Los valores de la fila $i son iguales: $cantHisto == $cantPedido <br>";
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

            $sql_pedido_diferente="INSERT INTO `modificados` (`id_modificados`, `cod_modificados`, `prod_modificados`,  `nomprod_modificados`, `cant_modificados`) 
            VALUES (NULL, '$codigo_pedido', '$id_prod',  '{$file_nom_producto['nom_prod']}', '$diferencia');";
            mysqli_query($link, $sql_pedido_diferente);
            /*INSERT INTO `modificados` (`id_modificados`, `cod_modificados`, `prod_modificados`, `cant_modificados`) VALUES (NULL, '111111111', '11', '1');*/
        }
    }
} else {
    echo "La cantidad de resultados de ambas consultas no coincide.";
}
?>
