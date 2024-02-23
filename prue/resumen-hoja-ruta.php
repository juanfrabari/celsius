<?php 
include '../conex.php';

// Tu consulta SQL
$sql_rutas = "SELECT ruta_histo, GROUP_CONCAT(pedido_histo) AS pedidos FROM histo GROUP BY ruta_histo";
$rs_rutas = mysqli_query($link, $sql_rutas);

// Procesar los resultados
$resultados = []; // Aquí almacenaremos los resultados

while ($row = mysqli_fetch_assoc($rs_rutas)) {
    echo '<h3>'.$row['ruta_histo'].'</h3>';
    $ruta = $row['ruta_histo'];
    $pedidos = explode(',', $row['pedidos']);

    foreach ($pedidos as $pedido) {
        // Para cada pedido, puedes realizar otra consulta para obtener cant_histo y producto_histo
        // Aquí asumimos que tienes una función para obtener esos valores, llamémosla obtenerDetallesPedido()

        // Aquí eliminamos repeticiones en la consulta principal
        $sql_pedido = "SELECT DISTINCT * FROM `histo` WHERE `pedido_histo` = '$pedido'";
        $rs_pedido = mysqli_query($link, $sql_pedido);
        $detalles_pedido = [];

        while ($file_pedido = mysqli_fetch_assoc($rs_pedido)) {
            $detalles_pedido[] = $file_pedido['cant_histo'].'  '.$file_pedido['producto_histo'];
        }

        // Eliminamos duplicados en el array $detalles_pedido
        $detalles_pedido = array_unique($detalles_pedido);

        // No mostramos los resultados aquí

    }

    // Mostramos los resultados una vez por pedido después del bucle foreach
    echo implode('<br>', $detalles_pedido);
    echo '<hr>';
}
?>
