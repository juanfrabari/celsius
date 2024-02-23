<?php 
// Generar una cadena de 10 caracteres aleatorios
function generarCadenaAleatoria($longitud) {
    $caracteres = '0123456789';
    $max = strlen($caracteres) - 1;

    do {
        $cadenaAleatoria = '';
        for ($i = 0; $i < $longitud; $i++) {
            $indiceAleatorio = random_int(0, $max);
            $cadenaAleatoria .= $caracteres[$indiceAleatorio];
        }

        // Verificar si la cadena aparece en las consultas
        $en_pedidos = consultaExiste('pedidos', 'cod_pedido', $cadenaAleatoria);
        $en_histo = consultaExiste('histo', 'pedido_histo', $cadenaAleatoria);
        $en_temp = consultaExiste('temp', 'cadena_temp', $cadenaAleatoria);

    } while ($en_pedidos || $en_histo || $en_temp);

    return $cadenaAleatoria;
}

function consultaExiste($tabla, $campo, $valor) {
    global $link;
    $sql = "SELECT COUNT(*) as total FROM `$tabla` WHERE `$campo` = '$valor'";
    $resultado = mysqli_query($link, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    return $fila['total'] > 0;
}

// Ejemplo de uso: generar una cadena de 10 caracteres aleatorios
//$longitudCadena = 10;
//$cadenaAleatoria = generarCadenaAleatoria($longitudCadena);
//echo $cadenaAleatoria;

/*

*/
/*_______________________________________________________*/


function BuscaCliente($ID_cliente){

$sql_busca_cliente="SELECT * FROM `clientes` WHERE `id_cliente` = '$ID_cliente'";
$rs_busca_cliente=mysqli_query($link, $sql_busca_cliente);
$file_busca_cliente=mysqli_fetch_assoc($rs_busca_cliente);
$cliente=$file_busca_cliente['nom_cliente'];
$dire=$file_busca_cliente['dir_cliente'];

    // Crear un array con las variables a retornar
    $result = array(
        'cliente' => $cliente,
        'dir' => $dire
    );

    // Retornar el array con los valores
    return $result;
}



function tiempoTranscurrido($fechaHora) {
    $fechaHoraUnix = strtotime($fechaHora);
    $tiempoActual = time();
    $diferencia = $tiempoActual - $fechaHoraUnix;

    if ($diferencia < 60) {
        return 'hace ' . $diferencia . ' segundos';
    } elseif ($diferencia < 3600) {
        $minutos = floor($diferencia / 60);
        return 'hace ' . $minutos . ' minutos';
    } elseif ($diferencia < 86400) {
        $horas = floor($diferencia / 3600);
        return 'hace ' . $horas . ' horas';
    } else {
        $dias = floor($diferencia / 86400);
        return 'hace ' . $dias . ' días';
    }
}

//$fechaHora = '2023-08-14 11:28:13';
//$tiempoTranscurrido = tiempoTranscurrido($fechaHora);
//echo $tiempoTranscurrido;
function obtenerNombreCliente1($idCliente) {
    // Consulta SQL
    $consulta = "SELECT nom_cliente FROM clientes WHERE id_cliente = $idCliente";
    // Ejecutar la consulta
    $resultado = mysqli_query($link, $consulta);
    if ($resultado) {
        if (mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            $nombreCliente = $fila['nom_cliente'];
            mysqli_free_result($resultado);
        } else {
            $nombreCliente = "Cliente no encontrado";
        }
    } else {
        $nombreCliente = "Error en la consulta: " . mysqli_error($conexion);
    }

    return $nombreCliente;
}

// Ejemplo de uso
//$idCliente = 3;
//$nombreCliente = obtenerNombreCliente($idCliente);
//echo "El nombre del cliente es: " . $nombreCliente;
?>



