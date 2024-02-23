<?php
include 'session.php'; 

if ($_SESSION['privilegio'] != 'admin') { 
    header('location:salir.php'); 
}

include 'conex.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el valor del formulario y eliminar espacios al principio y al final
    $nombre = trim($_POST["nombre"]);

    // Eliminar espacios adicionales en el medio del nombre utilizando expresiones regulares
    $nombre = preg_replace('/\s+/', ' ', $nombre);

    // Convertir a minúsculas
    $nombre = strtolower($nombre);

    // Verificar si el nombre ya existe en la base de datos
    $sql_verificar = "SELECT * FROM `us` WHERE `nom_us` = '$nombre'";
    $rs_verificar = mysqli_query($link, $sql_verificar);
    $resultado=mysqli_fetch_assoc($rs_verificar);
    if ($resultado>0) {

            // El nombre ya existe, redirigir con un error
            header('location:form-usuarios.php?error=1');
            exit(); // Terminar la ejecución del script
        
    }
    // Si el nombre no existe, proceder con la inserción
    $sql_us = "INSERT INTO `us` (`id_us`, `nom_us`, `pas_us`, `priv`) 
               VALUES (NULL, '$nombre', '1234', '{$_POST['permiso']}')";

    mysqli_query($link, $sql_us);

    header('location:form-usuarios.php?error=0');
}
?>
