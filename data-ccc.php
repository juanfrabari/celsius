<?php
// Consulta SQL para obtener los datos de la base de datos y que no repita pedido_histo
//$sql_cc_cliente = "SELECT *
//FROM `histo`
//WHERE SUBSTRING_INDEX(`cli_histo`, '¦', 1) = '$nombreCliente' AND `venta_histo` != ''
//GROUP BY `pedido_histo` ORDER BY `histo`.`update_histo` ASC";

$sql_cc_cliente = "SELECT *
FROM `histo`
WHERE SUBSTRING_INDEX(`cli_histo`, '¦', 1) = '$nombreCliente' AND `venta_histo` != '' AND `venta_histo` REGEXP '^[^0-9]+$'
GROUP BY `pedido_histo` ORDER BY `histo`.`update_histo` ASC";


/*
$sql_cc_cliente = "SELECT *
FROM `histo`
WHERE cli_histo = '$nombreCliente' AND venta_histo != ''
GROUP BY `pedido_histo`  ORDER BY `histo`.`update_histo` ASC";
*/
$rs_cc_cliente = mysqli_query($link, $sql_cc_cliente);
$total = 0;
$forma_pago = '';

function determinarFormaPago($venta_histo) {
    if ($venta_histo == 'CUENTA CORRIENTE') {
        $forma_pago = 'CUENTA CORRIENTE';
        return '<i class="fa-regular fa-closed-captioning"></i> Cuenta Corriente';
    } elseif ($venta_histo == 'CONTADO') {
        $forma_pago = 'CONTADO';
        return '<i class="fa-solid fa-money-bill-1-wave"></i> Contado';
    } elseif ($venta_histo == 'PAGO') {
        $forma_pago = 'PAGO';
        return '<i class="fa-solid fa-file-invoice-dollar"></i> Pago';
    } elseif ($venta_histo == 'Pre Compra') {
        $forma_pago = 'Pre Compra';
        return '<i class="fa-regular fa-closed-captioning"></i> Pago';
        
    } else {
        // Si no coincide con ninguna de las condiciones anteriores, puedes manejarlo aquí. <i class="fa-solid fa-file-invoice-dollar"></i>
        return 'Forma de pago no especificada';
    }
}


?>

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Fecha</th>
            <th align="center">PEDIDO</th>
            <th>TIPO</th>
            <th>DEBE</th>
            <th>HABER</th>
            <th>SALDO</th>
            <th>Actualizado</th>
        </tr>
    </thead>
    <tbody>
    <?php
    // Inicializa la variable de saldo acumulado
    $saldo_acumulado = 0;

    while ($file_cc_cliente = mysqli_fetch_assoc($rs_cc_cliente)) {
        $sql_monto_pedido = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$file_cc_cliente['pedido_histo']}' ORDER BY update_histo DESC";
        $rs_monto_pedido = mysqli_query($link, $sql_monto_pedido);
        $monto_debe = 0;
        $monto_haber = 0;

        while ($file_monto_pedido = mysqli_fetch_assoc($rs_monto_pedido)) {
            $venta_histo = $file_monto_pedido['venta_histo'];
            $monto_histo = $file_monto_pedido['monto_histo'];

            $descuento = obtenerUltimosDosDigitos($file_cc_cliente['pedido_histo']);
            if ($venta_histo == 'CUENTA CORRIENTE' || $venta_histo == 'CONTADO') {
                $monto_debe += $monto_histo;
            }

            if ($venta_histo == 'CONTADO') {
                $monto_haber += $monto_histo;
            }
            if ($venta_histo == 'PAGO') {
                $monto_haber += $monto_histo;
            }
        }
         
        $descuento = obtenerUltimosDosDigitos($file_cc_cliente['pedido_histo']);
        

        // Imprime el resultado en la tabla
        ?>
        <tr>
            <td><?php echo $file_cc_cliente['fecha_histo']; ?></td>
            <td align="center">
                <?php if ($venta_histo == 'PAGO') { ?>
                <a href="fa-pdf.php?cod_recibo=<?php echo $file_cc_cliente['pedido_histo']; ?>" target="_blank"><?php echo $file_cc_cliente['pedido_histo']; ?></a>
                <?php } else {?>
                <a href="resumen-pedido.php?cod_pedido=<?php echo $file_cc_cliente['pedido_histo']; ?>"><?php echo $file_cc_cliente['pedido_histo']; ?></a>
                <?php } ?>
            </td>
            <td><?php $venta_histo = $file_cc_cliente['venta_histo']; echo determinarFormaPago($venta_histo); ?></td>
            <td><?php 
            if (isset($descuento)) { $monto_debe=$monto_debe-($monto_debe*$descuento/100); }
            echo '$' . number_format($monto_debe, 0, ',', '.'); ?></td>
            <td><?php
            if (isset($descuento)) { $monto_haber=$monto_haber-($monto_haber*$descuento/100); }
            echo '$' . number_format($monto_haber, 0, ',', '.'); ?></td>
            <td><?php $saldo_acumulado = $monto_debe-$monto_haber + $saldo_acumulado;  echo '$' . number_format($saldo_acumulado, 0, ',', '.'); ?></td>
            <td><?php echo $file_cc_cliente['update_histo']; ?></td>
        </tr>
        <?php
    }
        $saldo_acumulado = number_format($saldo_acumulado, 2, ',', '.');

    // ... Resto del código ...
    ?>

    </tbody>
</table>
