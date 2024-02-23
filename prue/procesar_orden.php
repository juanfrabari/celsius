<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nuevo orden enviado por POST
    $nuevoOrden = $_POST["orden"];

    // Imprimir el nuevo orden
    echo "Nuevo orden: " . $nuevoOrden;
}
?>
