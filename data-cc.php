<?php 
// Consulta SQL para obtener los datos de la base de datos y que no repita pedido_histo
$sql_cc_cliente = "SELECT MIN(pedido_histo) AS pedido_histo, fecha_histo, update_histo, venta_histo
FROM histo
WHERE cli_histo = '$nombreCliente' AND venta_histo != ''
GROUP BY fecha_histo, update_histo, venta_histo";

$rs_cc_cliente = mysqli_query($link, $sql_cc_cliente);
$total = 0;
$forma_pago='';
function determinarFormaPago($venta_histo) {
    if ($venta_histo == 'CUENTA CORRIENTE') {
        $forma_pago='CUENTA CORRIENTE';
        return '<i class="fa-regular fa-closed-captioning"></i> Cuenta Corriente';
    } elseif ($venta_histo == 'CONTADO') {
        $forma_pago='CONTADO';
        return '<i class="fa-solid fa-money-bill-1-wave"></i> Contado';
    } elseif ($venta_histo == 'PAGO') {
        $forma_pago='PAGO';
        return '<i class="fa-solid fa-money-bill-1-wave"></i> Pago';
    }
    else {
        // Si no coincide con ninguna de las condiciones anteriores, puedes manejarlo aquí.
        return 'Forma de pago no especificada';
    }
}

function obtenerUltimosDosDigitos($numero) {
    // Convierte el número a una cadena para contar los dígitos
    $numeroStr = (string)$numero;
    
    // Verifica si la longitud de la cadena es 12
    if (strlen($numeroStr) == 12) {
        // Obtiene los últimos 2 dígitos de la cadena
        $ultimosDosDigitos = substr($numeroStr, -2);
        return $ultimosDosDigitos;
    } 
}


?>

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Fecha</th>
            <th align="center">Pedido</th>
            <th>TIPO</th>
            <th>DEBE</th>
            <th>HABER</th>
            <th>SALDO</th>
            <th>Actualizado</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $monto = 0; $descuento=0;
        while ($file_cc_cliente = mysqli_fetch_assoc($rs_cc_cliente)) {

            $codigo_pedido = $file_cc_cliente['pedido_histo'];

            // Consulta SQL para obtener el monto
            $sql_suma = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$file_cc_cliente['pedido_histo']}'";
            $rs_suma = mysqli_query($link, $sql_suma);

            while ($file_suma = mysqli_fetch_assoc($rs_suma)) {
                
                $monto = $file_suma['monto_histo'] + $monto;
            }
            //verifico si hay descuento
                if (strlen($codigo_pedido) == 12) {
                 $ultimosDosCaracteres = substr($codigo_pedido, -2); 
                 $descuento=$ultimosDosCaracteres/100;
                 $monto=$monto-($monto*$descuento);
             }
            
            ?>

            <tr>
                <td><?php echo date('d/m/Y', strtotime($file_cc_cliente['fecha_histo'])); ?></td>
                <td align="center">
                    <a href="resumen-pedido.php?cod_pedido=<?php echo $codigo_pedido; ?>">
                        <?php echo $codigo_pedido;  ?>
                    </a>
                </td>
                <td><?php echo determinarFormaPago($file_cc_cliente['venta_histo']); ?></td>
                <td><?php if ($file_cc_cliente['venta_histo']=='CUENTA CORRIENTE' || $file_cc_cliente['venta_histo']=='CONTADO')
                 {echo '$' . number_format($monto, 0, ',', '.');} ?></td>
                <td><?php if($file_cc_cliente['venta_histo']=='CONTADO') { echo '$' . number_format($monto, 0, ',', '.'); } 
                          if($file_cc_cliente['venta_histo']=='PAGO') { echo '$' . number_format($monto, 0, ',', '.'); }
                ?></td>
                <td><?php 
                if ($file_cc_cliente['venta_histo']=='CUENTA CORRIENTE') { $total = $monto + $total; echo '$' . number_format($total, 0, ',', '.'); }
                if ($file_cc_cliente['venta_histo']=='CONTADO') { $total = $monto + $total - $monto; echo '$' . number_format($total, 0, ',', '.'); }
                ?>
                </td>
                <td><small><?php echo $file_cc_cliente['update_histo']; ?></small></td>
            </tr>
        <?php
        }
        ?>
        <!-- Agrega más filas aquí -->
    </tbody>
</table>
