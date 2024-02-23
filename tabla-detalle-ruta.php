<?php
function obtenerNombreFormateado($cadena) {
    // Dividir la cadena usando "¦" como delimitador
    $parts = explode("¦", $cadena);

    // Tomar la primera parte
    $nombre = $parts[0];

    // Convertir a mayúsculas la primera letra y a minúsculas el resto del nombre
    $nombreFormateado = ucfirst(strtolower($nombre));

    return $nombreFormateado;
}
?>

<?php

// Array para almacenar los resultados
$resultados = array();

while ($file_ruta = mysqli_fetch_assoc($rs_ruta)) {
    $resultados[$file_ruta['pedido_histo']] = $file_ruta;
}

?>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Pedido</th>
            <th>Cliente</th>
            <th>Dirección</th>
            <th>Actualizado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($resultados as $file_ruta) {
        ?>
            <tr>
                <td>
                    <a href="resumen-pedido.php?cod_pedido=<?php echo $file_ruta['pedido_histo']; ?>">
                        <?php echo $file_ruta['pedido_histo']; ?>
                    </a>
                </td>
                <td><?php echo obtenerNombreFormateado($file_ruta['cli_histo']); ?></td>
                <td><?php echo $file_ruta['dir_histo']; ?></td>
                <td>
                    <?php if ($file_ruta['estado_histo'] != 'finalizada') { ?>
                        <a href="detalle-pedido-histo.php?pedido=<?php echo $file_ruta['pedido_histo']; ?>"><button type="button" class="btn btn-block btn-success btn-sm">Finalizar</button></a>
                    <?php } ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
