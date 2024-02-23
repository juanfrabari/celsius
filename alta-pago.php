<?php
include 'session.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDirectory = "uploads/"; // Directorio donde se guardarán los archivos
    if (!is_dir($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }
include'conex.php';

// Inicializar el índice
$indice = 1;

$repetida = true;

while ($repetida) {
    // Construir la cadena con el valor actual del índice
    $cadena = $indice;

    // Consultar la base de datos para verificar si la cadena existe
    $query = "SELECT COUNT(*) as count FROM histo WHERE pedido_histo = '$cadena'";
    
    // Ejecutar la consulta y verificar si existe una fila con esa cadena
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if ($count == 0) {
        // La cadena no está repetida, puedes salir del bucle
        $repetida = false;
    } else {
        // La cadena está repetida, incrementa el índice para generar la siguiente cadena
        $indice++;
    }
}



// Ahora, puedes realizar la inserción en la base de datos con la cadena única generada
// Asegúrate de que estás utilizando sentencias preparadas para evitar la inyección de SQL

$sql_pago="INSERT INTO `histo` (`id_histo`,
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
 '{$_POST['cliente']}',
 '',
 '',
 '0',
 '{$_POST['monto']}',
 '{$_POST['condicion']}',
 '$cadena',
 '',
 '',
 '',
 current_timestamp(),
 '{$_POST['fecha']}',
 'Admin',
 'PAGO')";
mysqli_query($link, $sql_pago);

//registro aparte de los pagos
$sql_file="INSERT INTO `file` (`id_file`,
 `nom_file`,
 `cli_file`,
 `fecha_file`,
 `cod_file`,
 `update_file`,
 `obs_file`,
 `tipo_file`) VALUES (NULL,
 'file',
 '{$_POST['cliente']}',
 '{$_POST['fecha']}',
 '$cadena',
 current_timestamp(),
 '{$_POST['obs']}',
 '{$_POST['condicion']}');";
/*$sql_file="INSERT INTO `file` (`id_file`,
 `nom_file`,
 `cli_file`,
 `fecha_file`,
 `cod_file`,
 `update_file`, 
 `obs_file`,
 `tipo_file`) VALUES (NULL,
 '/files/archivo.jpg',
 '{$_POST['cliente']}',
 '{$_POST['fecha']}',
 '$cadena',
 current_timestamp()),
 '{$_POST['obs']}',
 '{$_POST['condicion']}'";*/
mysqli_query($link, $sql_file);
    // Verificar si se han seleccionado archivos
    if (isset($_FILES["archivos"]["name"]) && count($_FILES["archivos"]["name"]) > 0) {
        // Recorremos los archivos seleccionados
        for ($i = 0; $i < count($_FILES["archivos"]["name"]); $i++) {
            $targetFile = $targetDirectory . basename($_FILES["archivos"]["name"][$i]);

            // Verificar si el archivo ya existe
            if (file_exists($targetFile)) {
                echo "El archivo " . basename($_FILES["archivos"]["name"][$i]) . " ya existe.<br>";
            } else {
                // Mover el archivo desde la ubicación temporal al directorio de destino
                if (move_uploaded_file($_FILES["archivos"]["tmp_name"][$i], $targetFile)) {
                    echo "El archivo " . basename($_FILES["archivos"]["name"][$i]) . " se ha subido con éxito.<br>";
                } else {
                    echo "Hubo un error al subir el archivo " . basename($_FILES["archivos"]["name"][$i]) . ".<br>";
                    header('location:form-pagos.php?error=1');
                }
            }
        }
    } /*else {
        echo "No se seleccionaron archivos para subir.";
    }*/
}
//header('location:fa-pdf.php?cod_recibo='.$cadena);
header('location:form-pagos.php?error=0&cod_recibo='.$cadena);

?>
