<?php
include'../conex.php';
// Función para obtener el nombre de un producto por su ID
function obtenerNombreProductoPorID($idProducto) {
     // Realizar la consulta
    $consulta = "SELECT nom_prod FROM productos WHERE id_prod = $idProducto";
    $resultado = mysqli_query($link, $consulta);

    // Verificar si se encontraron resultados
    if (mysqli_num_rows($resultado) > 0) {
        // Obtener el resultado como un arreglo asociativo
        $fila = mysqli_fetch_assoc($resultado);

        // Obtener el valor del campo "nom_prod"
        $nombreProducto = $fila["nom_prod"];

        // Cerrar la conexión
        mysqli_close($conexion);

        // Devolver el nombre del producto
        return $nombreProducto;
    } else {
        // Si no se encontraron resultados, devolver un mensaje de error o un valor predeterminado
        return "Producto no encontrado";
    }
}

// Ejemplo de uso:
$idProducto = 5;
$nombreProducto = obtenerNombreProductoPorID($idProducto);
echo "Nombre del producto con ID $idProducto: $nombreProducto";
?>
