<?php 
if (empty($_GET['estado'])) {
    $sql_consulta_pedido = "SELECT * FROM `pedidos` WHERE `cod_pedido` = '{$_GET['cod_pedido']}'";





}
else 
{
    $sql_consulta_pedido = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$_GET['cod_pedido']}'";
$rs_consulta_pedido = mysqli_query($link, $sql_consulta_pedido);
$file_cliente = mysqli_fetch_assoc($rs_consulta_pedido);

$ID_cliente = $file_cliente['cli_pedido'];
$sql_busca_cliente = "SELECT * FROM `clientes` WHERE `id_cliente` = '$ID_cliente'";
$rs_busca_cliente = mysqli_query($link, $sql_busca_cliente);
$file_busca_cliente = mysqli_fetch_assoc($rs_busca_cliente);
$cliente = $file_busca_cliente['nom_cliente'];
$dire = $file_busca_cliente['dir_cliente'];
$pedido = $_GET['cod_pedido'];
}


 ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Nota:</h5>
              Remito no válido como Factura
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                     <i class="fas fa-globe"></i> celciusbrc.ar
                    <small class="float-right">Fecha: <?php echo date('d/m/Y'); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Para
                  <address>
                   <strong><?php echo $cliente; ?></strong><br>
                    <?php echo $dire; ?><br>
                    <br>
                    <br>
                    
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                  <address>
                    <strong></strong><br>
                    <br>
                    <br>
                    <br>
                    
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>ID pedido <?php echo $pedido; ?></b><br>
                  <br>
                  <!--b>Ruta ID:</b> <br!-->
                 
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Presentación</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Usa un resultado y bucle de consulta separado para los datos de productos
                $rs_consulta_pedido = mysqli_query($link, $sql_consulta_pedido);
                while ($file_pedido = mysqli_fetch_assoc($rs_consulta_pedido)) {

                    if (empty($_GET['estado'])) {
                        $sql_producto = "SELECT * FROM `productos` WHERE `id_prod` = '{$file_pedido['prod_pedido']}'";
                    } else {
                        $sql_producto = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$file_pedido['pedido_histo']}'";
                    }

                    $rs_producto = mysqli_query($link, $sql_producto);
                    $file_producto = mysqli_fetch_assoc($rs_producto);
                ?>
                    <tr>
                        <td><?php if (empty($_GET['estado'])) { echo $file_pedido['cant_pedido']; } else { echo $file_pedido['cant_histo'];} ?></td>
                        <td><?php if (empty($_GET['estado'])) { echo $file_producto['nom_prod']; } else { $parts = explode('///', $file_producto['producto_histo']); echo $parts[0]; } ?></td>
                        <td><?php if (empty($_GET['estado'])) { echo $file_producto['pres_prod']; } else {echo $parts[1]; }  ?></td>
                        <td><?php if (empty($_GET['estado'])) { echo '$'.number_format($file_pedido['monto_pedido'], 0, ',', '.'); } else { echo '$'.number_format($file_pedido['monto_histo'], 0, ',', '.'); } ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Metodos de Pago:</p>
                  <img src="dist/img/credit/visa.png" alt="Visa">
                  <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="dist/img/credit/american-express.png" alt="American Express">
                  <img src="dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    <b>Transferencia:</b> CBU 00321335051651654 <br>
                    <b>Alias:</b> celcius.brc
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead"><!--al gun comentario!--></p>

                  <div class="table-responsive">
                    <table class="table">
                      <!--tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr!-->
                      <tr>
                        <th>Total:</th>
                        <td><h3>$265.24</h3></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>