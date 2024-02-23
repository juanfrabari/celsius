<?php
// Datos de conexión a la base de datos
$servername = 'localhost'; // Cambiar por el nombre del servidor si es necesario
$username = 'root'; // Cambiar por tu nombre de usuario de MySQL
$password = ''; // Cambiar por tu contraseña de MySQL
$dbname = 'u765367970_celsius'; // Cambiar por el nombre de tu base de datos

// Crear una conexión
$link = new mysqli($servername, $username, $password, $dbname);
$link->set_charset("utf8");

// Verificar si se produjo un error en la conexión
if ($link->connect_error) {
    die('Error en la conexión: ' . $link->connect_error);
}
