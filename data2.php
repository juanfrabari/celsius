<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Pedido</th>
            <th>Estado</th>
            <th>Cliente</th>
            <th>Actualizado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $codigos_mostrados = array(); // Array para llevar un registro de los códigos de pedido mostrados

        while ($file_pedidos = mysqli_fetch_assoc($rs_pedidos)) {
            //consulto Repartidor
            $sql_reparte="SELECT * FROM `histo` WHERE `pedido_histo` = '{$file_pedidos['cod_pedido']}'";
            $rs_reparte=mysqli_query($link, $sql_reparte);
            $file_reparte=mysqli_fetch_assoc($rs_reparte);


            $codigo_pedido = $file_pedidos['cod_pedido'];

            // Verificar si el código de pedido ya se ha mostrado
            if (!in_array($codigo_pedido, $codigos_mostrados)) {
                // Agregar el código de pedido actual al array de códigos mostrados
                $codigos_mostrados[] = $codigo_pedido;

                $estado = $file_pedidos['estado_pedido'];
                // Resto de tu código para mostrar la fila
                ?>

                <tr>
                    <td><span class="text-success"><?php  if (isset($file_reparte['reparte_histo'])) { 
                        echo ucwords($file_reparte['reparte_histo']); } ?>
                    
                </span><br><a href="resumen-pedido.php?cod_pedido=<?php echo $codigo_pedido; ?>&estado=<?php echo $estado; ?>"><?php echo $codigo_pedido; ?>
                    </a></td>
                    <td>
                        <?php
                        if ($estado == '') {
                            echo '<span class="badge bg-danger">Pendiente</span>';
                        } elseif ($estado == 'ruta') {
                            echo '<span class="badge bg-warning">Ruta</span>';
                        } elseif ($estado == 'ruta confirmada') {
                            echo '<span class="badge bg-info">Ruta</span>';
                        } elseif ($estado == 'finalizada') {
                            echo '<span class="badge bg-success">Finalizada</span>';
                        }
                        elseif ($estado == 'pre') {
                            echo '<span class="badge bg-secondary">Precompra</span>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $sql_cliente = "SELECT * FROM `clientes` WHERE `id_cliente` = '{$file_pedidos['cli_pedido']}'";
                        $rs_cliente = mysqli_query($link, $sql_cliente);
                        $file_cliente = mysqli_fetch_assoc($rs_cliente);?>
                        <a href="cuenta-corriente.php?id_cliente=<?php echo $file_pedidos['cli_pedido']; ?>">
                        <?php 
                        echo $file_cliente['nom_cliente'].'<br><small>'.$file_cliente['dir_cliente'].'</small>';
                        ?></a>
                    </td>
                    <td>
                        <?php

                        echo $tiempoTranscurrido = tiempoTranscurrido($file_pedidos['update_pedido']);
                        ?>
                    </td>
                    <td><?php // if ($estado == '' || $estado == 'pre') {  ?>
                        <input type="submit" class="btn btn-block btn-primary btn-sm" value="Eliminar" onclick="return confirmarEliminacion(<?php echo $file_pedidos['cod_pedido']; ?>);">
                        <?php // } ?>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        <!-- Agrega más filas aquí -->
    </tbody>
</table>







