

<?php
$sql_movimiento_reparte="SELECT * FROM histo WHERE (pedido_histo, reparte_histo) 
IN ( SELECT DISTINCT pedido_histo, reparte_histo FROM histo WHERE reparte_histo = '$nom_reparte' ) ORDER BY update_histo";

$rs_movimiento_reparte=mysqli_query($link, $sql_movimiento_reparte);
 ?>

              <div class="card-header">
                <h3 class="card-title"><?php echo strtoupper($nom_reparte); ?></h3>

                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Pedido</th>
                    <th>Fecha</th>
                    <th>Venta</th>
                    <th>Estado</th>
                    <th>Actualizado</th>
                  </tr>
                  </thead>
                  <tbody>
<?php while ($file_movimiento_reparte=mysqli_fetch_assoc($rs_movimiento_reparte)) { ?>
                  <tr>
                    <td><a href="resumen-pedido.php?cod_pedido=<?php echo $file_movimiento_reparte['pedido_histo']; ?>">   <?php echo $file_movimiento_reparte['pedido_histo']; ?></a></td>
                    <td><?php echo $file_movimiento_reparte['fecha_histo']; ?></td>
                    <td><?php if (!is_numeric($file_movimiento_reparte['venta_histo'])) { echo $file_movimiento_reparte['venta_histo']; } ?></td>
                    <td><?php echo $file_movimiento_reparte['estado_histo']; ?></td>
                    <td><?php echo $file_movimiento_reparte['update_histo']; ?></td>
                  </tr>
<?php } ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Pedido</th>
                    <th>Fecha</th>
                    <th>Venta</th>
                    <th>Estado</th>
                    <th>Actualizado</th>
                  </tr>
                  </tfoot>
                </table>


