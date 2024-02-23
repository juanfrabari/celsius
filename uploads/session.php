<?php
include'fun.php';
session_start();
date_default_timezone_set('America/Argentina/Buenos_Aires');
if (isset($_SESSION['user']) ) 
{
    if (!empty($_GET['cliente_hidden'])) {  $_SESSION['cliente_pedido']=$_GET['cliente_hidden'];   }
    
    if (isset($_GET['id_cadena'])) 
    {
            $_SESSION['id_cadena']=$_GET['id_cadena'];  

            
    }
    if (isset($_SESSION['cliente_pedido'])&&isset($_SESSION['id_cadena'])) 
    {
         include'conex.php';
            $sql_items="SELECT * FROM `temp` WHERE `cadena_temp` = '{$_SESSION['id_cadena']}'";
            $rs_items=mysqli_query($link, $sql_items);
            //consulto si hay algun item en el carro de pedidos
            if (mysqli_num_rows($rs_items)==0) 
                {
                unset($_SESSION['cliente_pedido']);
                unset($_SESSION['id_cadena']);
                }
    }

// Tiempo máximo de inactividad en segundos
$maximoTiempoInactivo = 900; // 900 segundos = 15 minutos

// Verificar si existe una sesión y se ha establecido el tiempo de última actividad
if (isset($_SESSION['tiempo'])) {
    // Calcular el tiempo transcurrido desde la última actividad
    $tiempoTranscurrido = time() - $_SESSION['tiempo'];

    // Verificar si el tiempo transcurrido es mayor al tiempo máximo de inactividad
    if ($tiempoTranscurrido > $maximoTiempoInactivo) {
        
         //verificar si hay hojas de rutas pendientes
        if (isset($_SESSION['id_ruta'])) {
        include'conex.php';
        $sql_hoja_ruta1="SELECT * FROM `temp` WHERE `condi_temp` = '{$_SESSION['id_ruta']}'";
        $rs_hoja_ruta1=mysqli_query($link, $sql_hoja_ruta1);
            //actualizo los estados de los pedidos que estan por la mitad. 
            while ($file_hoja_ruta1=mysqli_fetch_assoc($rs_hoja_ruta1)) {
                $sql_actualiza_estado_pedido="UPDATE `pedidos` SET `estado_pedido` = '' WHERE `pedidos`.`cod_pedido` = '{$file_hoja_ruta1['cadena_temp']}'";
                mysqli_query($link, $sql_actualiza_estado_pedido);
                
            }

        }
        include'conex.php';
//esto es para que no queden rutas generadas sin definir
$sql_cambia_estado="UPDATE `pedidos` SET `estado_pedido` = '' WHERE estado_pedido IN ('ruta confirmada', 'ruta', 'finalizada')";
mysqli_query($link, $sql_cambia_estado);
        
        
        // Destruir la sesión y redirigir al usuario al formulario de inicio de sesión
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}

// Actualizar el tiempo de última actividad en la sesión
$_SESSION['tiempo'] = time();
}
else { 
include'conex.php';
if (isset($file_hoja_ruta1)) {
    # code...
while ($file_hoja_ruta1=mysqli_fetch_assoc($rs_hoja_ruta1)) {
$sql_actualiza_estado_pedido="UPDATE `pedidos` SET `estado_pedido` = '' WHERE `pedidos`.`cod_pedido` = '{$file_hoja_ruta1['cadena_temp']}'";
mysqli_query($link, $sql_actualiza_estado_pedido);
}
}
header("Location: index.php");
}
?>
