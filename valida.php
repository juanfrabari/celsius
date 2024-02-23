<?php

// Verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once 'conex.php';
    if (isset($_POST['pas1']) && isset($_POST['id_us'])) {
        
        $sql_nuevo_pas="UPDATE `us` SET `pas_us` = '{$_POST['pas1']}' WHERE `us`.`id_us` = '{$_POST['id_us']}'";
        mysqli_query($link, $sql_nuevo_pas);

        $sql_usuario1="SELECT * FROM `us` WHERE `id_us` = '{$_POST['id_us']}'";
        $rs_usuario1=mysqli_query($link, $sql_usuario1);
        $file_usuario1=mysqli_fetch_assoc($rs_usuario1);
        $_POST['us'] = $file_usuario1['nom_us'];
        $_POST['pas'] = $_POST['pas1'];
        

    }
    // Verificar si se enviaron las variables 'us' y 'pas'
    if (isset($_POST['us']) && isset($_POST['pas'])) {
        // Verificar si 'us' y 'pas' no están vacíos
        
        if (!empty($_POST['us']) && !empty($_POST['pas'])) {
            // Incluir el archivo de conexión a la base de datos

            // Ejecutar una consulta para actualizar 'estado_pedido' en la tabla 'pedidos'
            $sql_elimina_pendientes = "UPDATE `pedidos` SET `estado_pedido` = '' WHERE `estado_pedido` = 'ruta';";
            mysqli_query($link, $sql_elimina_pendientes);

            // Establecer la codificación de caracteres en la conexión
            mysqli_set_charset($link, 'UTF8');

            // Consulta para verificar las credenciales del usuario
            $sql = "SELECT * FROM `us` WHERE `nom_us` = '{$_POST['us']}' AND `pas_us` = '{$_POST['pas']}'";
            $rs = mysqli_query($link, $sql);


            // Verificar si hay una fila coincidente en la base de datos
            if (mysqli_num_rows($rs) == 1) {

                if ($_POST['pas'] == '1234') {
    // Obtengo el ID de usuario para enviarlo por GET
    $file_nuevo_usuario = mysqli_fetch_assoc($rs);

    // Cifro el ID antes de enviarlo
    $id_cifrado = base64_encode($file_nuevo_usuario['id_us']);

    // Redirijo a la página de registro con el ID cifrado
    header('Location: pages/examples/registro.php?id=' . $id_cifrado);
    die();
}
                // Iniciar la sesión y establecer variables de sesión
                @session_start();
                $file_user = mysqli_fetch_assoc($rs);
                $_SESSION['user'] = $file_user['nom_us'];
                $_SESSION['privilegio'] = $file_user['priv'];

                // Recordar el usuario y la contraseña según lo solicitado
                setcookie('user_recordado', $_POST['us'], time() + 60 * 60 * 24 * 30);
                setcookie('pas_recordada', $_POST['pas'], time() + 60 * 60 * 24 * 30);

                // Redirigir según el privilegio del usuario
                if ($_SESSION['privilegio'] == 'admin') {
                    header('Location: index-admin.php');
                } elseif ($_SESSION['privilegio'] == 'repartidor') {
                    header('Location: rutas.php');
                }

                // Finalizar el script
                die();
            } else {
                // Si las credenciales no son válidas, redirigir a la página de inicio de sesión con un mensaje de error
                ?>
                <script type="text/javascript">
                    window.location.assign("pages/examples/login.html?error=1");
                </script>
                <?php
            }
        }
    }
}

?>
