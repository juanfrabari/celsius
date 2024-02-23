<table id="tabla" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Pedido</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Dirección</th>    
                <th></th>
                <th>Actualizado</th>
            </tr>
        </thead>
        <tbody>
<?php
$compara_codigo=''; 
                       while ($file_pedidos = mysqli_fetch_assoc($rs_pedidos)) { 

$sql_producto="SELECT * FROM `productos` WHERE `id_prod` = '{$file_pedidos['prod_pedido']}'";
$rs_producto=mysqli_query($link, $sql_producto);
$file_producto=mysqli_fetch_assoc($rs_producto);

$sql_cliente="SELECT * FROM `clientes` WHERE `id_cliente` = '{$file_pedidos['cli_pedido']}'";
$rs_cliente=mysqli_query($link, $sql_cliente);
$file_cliente=mysqli_fetch_assoc($rs_cliente);



if ($compara_codigo==$file_pedidos['cod_pedido']) {}
else {      
          ?>           
            <tr>
                <td><a href="pages/examples/invoice.html"><?php echo $file_pedidos['cod_pedido']; ?></a></td>
                <td><?php echo $file_cliente['nom_cliente']; ?></td>
                <td><span class="badge badge-warning">Pendiente</span></td>
                <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $file_cliente['dir_cliente']; ?></div>
                      </td>
                <td></td>
                <td></td>
            </tr>
<?php 
}
$compara_codigo=$file_pedidos['cod_pedido'];

              }     ?>            
            <!-- Agrega más filas aquí -->
        </tbody>
    </table>
