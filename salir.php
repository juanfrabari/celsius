
<?php
// Iniciar la sesión
session_start();
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
// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a otra página o mostrar un mensaje de cierre de sesión exitoso
header("Location: index.php");
exit();
?>
