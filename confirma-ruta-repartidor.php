<?php
include 'session.php';
include 'conex.php';
die('confirm ruta repartidor');
$fechaActual = date("Y-m-d H:i:s");
//echo $_SESSION['id_ruta'];
//echo '<hr>';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
//echo $_POST['repartidor'];
//echo $_POST['fecha'];  die();
    // Verificar que el formulario haya sido enviado
    include 'conex.php';
    if (isset($_POST["id_temp"])) {
        // Acceder a los valores enviados mediante el campo oculto "id_temp"
        $id_temps = $_POST["id_temp"];

        // Puedes iterar sobre los valores para imprimirlos uno por uno
            $orden=1;
        foreach ($id_temps as $id_temp) {
            echo "ID Temp: " . $id_temp . "<br>";
            $sql_rutas_temp = "SELECT * FROM `temp` WHERE `id_temp` = '$id_temp' AND `condi_temp` = '{$_SESSION['id_ruta']}'";
            //$sql_rutas_temp = "SELECT * FROM `temp` WHERE `id_temp` = '$id_temp'";
            $rs_rutas_temp = mysqli_query($link, $sql_rutas_temp);

            // Asignar el resultado de la consulta a la variable $file_rutas_temp
            $file_rutas_temp = mysqli_fetch_assoc($rs_rutas_temp);

            //echo 'pedido= ' . $file_rutas_temp['cadena_temp'];

            $sql_pedido = "SELECT * FROM `pedidos` WHERE `cod_pedido` = '{$file_rutas_temp['cadena_temp']}'";
            $rs_pedido = mysqli_query($link, $sql_pedido);


            // Declarar la variable $producto dentro del bucle
            $producto = '';
            while ($file_pedido = mysqli_fetch_assoc($rs_pedido)) {
                
                //actualizo el estado de los pedidos a "RUTA CONFIRMADA"
                $sql_estado_ruta="UPDATE `pedidos` SET `estado_pedido` = 'ruta confirmada' WHERE `cod_pedido` = '{$file_pedido['cod_pedido']}'";
                mysqli_query($link, $sql_estado_ruta);

                // Recuperar datos del cliente
                $sql_cliente = "SELECT * FROM `clientes` WHERE `id_cliente` = '{$file_pedido['cli_pedido']}' ";
                $rs_cliente = mysqli_query($link, $sql_cliente);
                $file_cliente = mysqli_fetch_assoc($rs_cliente);
                $nom_cliente_mas_ID=$file_cliente['nom_cliente'].'¦'.$file_pedido['cli_pedido'];

                // Consultar nombre y características del producto
                $sql_nom_producto = "SELECT * FROM `productos` WHERE `id_prod` = '{$file_pedido['prod_pedido']}'";
                $rs_nom_producto = mysqli_query($link, $sql_nom_producto);
                $file_nom_producto = mysqli_fetch_assoc($rs_nom_producto);

                // Construir nombre de producto
                $producto = $file_nom_producto['nom_prod'] . '///' . $file_nom_producto['pres_prod'];

                // Realizar la inserción en la tabla histo
                $sql_histo = "INSERT INTO `histo`(
                    `id_histo`,
                    `cli_histo`,
                    `dir_histo`,
                    `producto_histo`,
                    `cant_histo`,
                    `monto_histo`,
                    `condicion_histo`,
                    `pedido_histo`,
                    `ruta_histo`,
                    `estado_histo`,
                    `us_histo`,
                    `update_histo`,
                    `fecha_histo`,
                    `reparte_histo`,
                    `venta_histo`
                )
                VALUES(
                    NULL,
                    '$nom_cliente_mas_ID',
                    '{$file_cliente['dir_cliente']}',
                    '$producto',
                    '{$file_pedido['cant_pedido']}',
                    '{$file_pedido['monto_pedido']}',
                    '{$file_pedido['condi_pedido']}',
                    '{$file_pedido['cod_pedido']}',
                    '{$_SESSION['id_ruta']}',
                    'en curso',
                    'Admin',
                    '$fechaActual',
                    '{$_POST['fecha']}',
                    '{$_POST['repartidor']}',
                    '$orden'
                )";

                mysqli_query($link, $sql_histo);
                
            $orden=$orden+1;}
        
        }

        // Hacer lo que necesites con el valor, como almacenarlo en una base de datos o procesarlo de alguna otra forma
    }  else {
        // Si el campo no está presente o está vacío, maneja el caso según tus necesidades
    }
}
unset($_SESSION['id_ruta']);
header('location:hoja-ruta.php');
?>
