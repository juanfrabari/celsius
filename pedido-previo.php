<?php
// Incluir archivos necesarios
include 'session.php';
include 'conex.php';
$estado='';
//{$_SESSION['user']}  SELECT * FROM `us` WHERE `nom_us` = 'milton'
//averiguo el privilegio si es repartidor entonces agrega a 
$sql_priv="SELECT * FROM `us` WHERE `nom_us` = '{$_SESSION['user']}'";
$rs_priv=mysqli_query($link, $sql_priv);
$file_priv=mysqli_fetch_assoc($rs_priv);

/*if ($file_priv['priv']=='repartidor') {
    // Recuperar las variables del formulario
    $id_temp = $_POST['id_temp']; // Nota: id_temp es un array porque su nombre en el formulario tiene corchetes []

    $fecha = $_POST['fecha'];
    $repartidor = $_POST['repartidor'];

    // Mostrar las variables
    echo "id_temp: ";
    print_r($id_temp); // Muestra el contenido del array

    echo "<br>";

    echo "fecha: " . $fecha;
    echo "<br>";

    echo "repartidor: " . $repartidor;
    echo "<br>";
//    header('location:confirma-ruta-repartidor.')
     die();
     //exit; // Agregamos exit para detener la ejecución del script
} */




$descuento = $_GET['descuento'];
if ($descuento===0) { $descuento=''; }
if ($descuento < 10) {
    $descuento = str_pad($descuento, 2, "0", STR_PAD_LEFT);
}
// Obtener la cadena aleatoria de la URL
$cadenaAleatoria = $_GET['cadenaAleatoria'];

//precompra
if (isset($_GET['pre'])) {
   //echo 'esta seteada :'.$_GET['pre'];
   $estado='pre'; 
}
//else { $estado='ruta';  }
//echo $estado;
//echo 'no esta seteada :'.$_GET['pre']; 
//die();
// Consultar la tabla 'temp' para obtener los registros correspondientes a la cadena aleatoria
$sql_temp = "SELECT * FROM `temp` WHERE `cadena_temp` = '{$cadenaAleatoria}' ";
$rs_temp = mysqli_query($link, $sql_temp);


// Establecer la zona horaria
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Obtener la fecha y hora actual
$fecha_actual = date('Y-m-d H:i:s');

// Inicializar la variable $ruta
$ruta = "";

// Verificar si 'ruta' está definida y no está vacía
if (!empty($_GET['ruta']) || $file_priv['priv']=='repartidor') {
    // Si la ruta está definida y no está vacía, se agrega a una ruta existente
    $estado='ruta confirmada';
    
    if ($file_priv['priv']=='repartidor') { 
        $longitudCadena = 8;
        $_GET['ruta'] = generarCadenaAleatoria($longitudCadena);
    }
    while ($file_temp = mysqli_fetch_assoc($rs_temp)) {
$cadenaAleatoria = $file_temp['cadena_temp'] . $descuento;        

        $sql_agrega_pedido = "INSERT INTO `pedidos` (`id_pedido`,
         `cli_pedido`,
         `prod_pedido`,
         `cant_pedido`,
         `monto_pedido`,
         `condi_pedido`,
         `cod_pedido`,
         `update_pedido`,
         `us_pedido`,
         `estado_pedido`) VALUES (NULL,
         '{$file_temp['cli_temp']}',
         '{$file_temp['prod_temp']}',
         '{$file_temp['cant_temp']}',
         '{$file_temp['monto_temp']}',
         '{$file_temp['condi_temp']}',
         '$cadenaAleatoria',
         '$fecha_actual',
         '{$_SESSION['user']}',
         '$estado')";
         mysqli_query($link, $sql_agrega_pedido);

//con nro de ID averiguo nombre de Cliente
         $sql_nom_cliente="SELECT * FROM `clientes` WHERE `id_cliente` = '{$file_temp['cli_temp']}'";
         $rs_nom_cliente=mysqli_query($link, $sql_nom_cliente);
         $file_nom_cliente=mysqli_fetch_assoc($rs_nom_cliente);
//concateno con el ID del CLiente         
         $nom_cliente=$file_nom_cliente['nom_cliente'].'¦'.$file_nom_cliente['id_cliente'];
         $dir_cliente=$file_nom_cliente['dir_cliente'];



         /*SELECT * FROM `productos` WHERE `id_prod` = 4*/
         //con nro de ID averiguo nombre de Producto
         //echo '$file_temp = '.$file_temp['prod_temp'];
         $sql_producto="SELECT * FROM `productos` WHERE `id_prod` = '{$file_temp['prod_temp']}'";
         $rs_producto=mysqli_query($link, $sql_producto);
         $file_producto=mysqli_fetch_assoc($rs_producto);
         //echo '<br>$nom_producto = '.$file_producto['nom_prod'];
         //echo '<br>$pres_producto = '.$file_producto['pres_prod'];
         //die();
         $producto=$file_producto['nom_prod'].'///'.$file_producto['pres_prod'];

//busco el nombre del repartidor con la ruta
    if ($file_priv['priv']=='admin') {
             # code...
         $sql_repartidor="SELECT * FROM `histo` WHERE `ruta_histo` = '{$_GET['ruta']}'";
         $rs_repartidor=mysqli_query($link, $sql_repartidor);
         $file_repartidor=mysqli_fetch_assoc($rs_repartidor);
         $repartidor=$file_repartidor['reparte_histo'];
         }     
     else { $repartidor = $_SESSION['user'];  
        //$longitudCadena = 8;
        //$_GET['ruta'] = generarCadenaAleatoria($longitudCadena);
    }


/*TODO esta ruta que genero y debo agregarle un numero de orden en la variable venta_histo 
por lo tanto debo, hacer una consulta para saber cantidad.
*/
if ($file_priv['priv']=='admin') {
$sql_cantidad_pedidos_ruta="SELECT * FROM `histo` WHERE `ruta_histo` = '{$_GET['ruta']}'";
$rs_cantidad_pedidos_ruta=mysqli_query($link, $sql_cantidad_pedidos_ruta);
$venta_histo=mysqli_num_rows($rs_cantidad_pedidos_ruta);
$venta_histo++;
}

$sql_histo="INSERT INTO `histo` (`id_histo`,
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
 `venta_histo`) VALUES (NULL,
 '$nom_cliente',
 '$dir_cliente',
 '$producto',
 '{$file_temp['cant_temp']}',
 '{$file_temp['monto_temp']}',
 '{$file_temp['condi_temp']}',
 '$cadenaAleatoria',
 '{$_GET['ruta']}',
 'en curso',
 '{$_SESSION['user']}',
 '2023-10-10 00:00:00',
 '$fecha_actual',
 '$repartidor',
 '$venta_histo')";
mysqli_query($link, $sql_histo);

    }
// Limpiar las variables de sesión y redirigir a otra página
unset($_SESSION['cliente_pedido']);
unset($_SESSION['id_cadena']);
header('location:form-agrega-pedido.php?ruta='.$_GET['ruta']);

    die();
} else {

    // Si no se proporciona 'ruta', procesar los registros obtenidos de la tabla 'temp'
    while ($file_temp = mysqli_fetch_assoc($rs_temp)) {

// en los pedidos nuevos, hay alguno que sea precompra ?
/*if ($file_temp['condi_temp']=='Pre Compra') { 
            
            // pregunto cual pedido y cliente es
            $sql_pre="SELECT * FROM `pedidos` WHERE `cli_pedido` = '{$file_temp['cli_temp']}' AND `prod_pedido` = '{$file_temp['prod_temp']}'";
            $rs_pre=mysqli_query($link, $sql_pre);
            $file_pre=mysqli_fetch_assoc($rs_pre);
            //calcula la nueva cantidad que deberia tener. 
            $nueva_cantidad=$file_pre['cant_pedido']-$file_temp['cant_temp'];
            echo $file_pre['monto_pedido'];
            echo '<hr>';
            $nuevo_monto=$nueva_cantidad*$file_pre['monto_pedido']/$file_pre['cant_pedido'];
            //die();
            // actualizo el stok de la Pre Compra 
            $sql_prec="UPDATE `pedidos` SET `cant_pedido` = '$nueva_cantidad', `monto_pedido` = '$nuevo_monto' WHERE `pedidos`.`id_pedido` = '{$file_pre['id_pedido']}'";
            $rs_prec=mysqli_query($link, $sql_prec);

            

        }*/
    



        $cadenaConDescuento=$cadenaAleatoria.$descuento;
        $sql_nuevo_pedido = "INSERT INTO `pedidos` (`id_pedido`,
         `cli_pedido`,
         `prod_pedido`,
         `cant_pedido`,
         `monto_pedido`,
         `condi_pedido`,
         `cod_pedido`,
         `update_pedido`,
         `us_pedido`,
         `estado_pedido`) VALUES (NULL,
         '{$file_temp['cli_temp']}',
         '{$file_temp['prod_temp']}',
         '{$file_temp['cant_temp']}',
         '{$file_temp['monto_temp']}',
         '{$file_temp['condi_temp']}',
         '$cadenaConDescuento',
         '$fecha_actual',
         '{$_SESSION['user']}', 
         '$estado')";

        // Ejecutar la consulta para insertar el nuevo pedido
        mysqli_query($link, $sql_nuevo_pedido);
    }
}

// Eliminar los registros temporales correspondientes a la cadena aleatoria
$sql_elimina_temporal = "DELETE FROM `temp` WHERE `cadena_temp` = '$cadenaAleatoria'";
mysqli_query($link, $sql_elimina_temporal);

// Limpiar las variables de sesión y redirigir a otra página
unset($_SESSION['cliente_pedido']);
unset($_SESSION['id_cadena']);

header('location:form-pedidos.php');
?>
