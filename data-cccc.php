<?php 
$sql_cc_cliente="SELECT *
FROM `histo`
WHERE cli_histo = '$nombreCliente' AND venta_histo != ''
GROUP BY `pedido_histo`;
";

$rs_cc_cliente = mysqli_query($link, $sql_cc_cliente);
 ?>
<table>
    <tr>
        <th>DEBE</th>
        <th>HABER</th>
        <th>SALDO</th>
        <th>Actualizado</th>
    </tr>
    <?php
    $total = 0;
    while ($file_cc_cliente = mysqli_fetch_assoc($rs_cc_cliente)) {
        $sql_monto_pedido = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$file_cc_cliente['pedido_histo']}'";
        $rs_monto_pedido = mysqli_query($link, $sql_monto_pedido);
        $monto_debe = 0;
        $monto_haber = 0;

        while ($file_monto_pedido = mysqli_fetch_assoc($rs_monto_pedido)) {
            $venta_histo = $file_monto_pedido['venta_histo'];
            $monto_histo = $file_monto_pedido['monto_histo'];

            // Si la venta es CUENTA CORRIENTE o CONTADO, suma al DEBE
            if ($venta_histo == 'CUENTA CORRIENTE' || $venta_histo == 'CONTADO') {
                $monto_debe += $monto_histo;
            }

            // Si la venta es CONTADO, suma al HABER
            if ($venta_histo == 'CONTADO') {
                $monto_haber += $monto_histo;
            }
        }

        // Calcula el SALDO
        if ($file_cc_cliente['venta_histo'] == 'CUENTA CORRIENTE') {
            $total += $monto_debe;
        } elseif ($file_cc_cliente['venta_histo'] == 'PAGO') {
            $total -= $monto_haber;
        }

        ?>
        <tr>
            <td><?php echo '$' . number_format($monto_debe, 0, ',', '.'); ?></td>
            <td><?php echo '$' . number_format($monto_haber, 0, ',', '.'); ?></td>
            <td><?php echo '$' . number_format($total, 0, ',', '.'); ?></td>
            <td><?php echo $file_cc_cliente['update_histo']; ?></td>
        </tr>
        <?php
    }
    ?>
</table>
