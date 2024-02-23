<?php 
if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Verificar si el parámetro "nombre" está seteado en la URL
        if (isset($_GET["id_cliente"])) 
        {
             $sql_cliente="SELECT * FROM `clientes` WHERE `id_cliente` = {$_GET["id_cliente"]}";
             $rs_cliente=mysqli_query($link, $sql_cliente);
             $file_cliente=mysqli_fetch_assoc($rs_cliente);
             
             $sql_histo="SELECT * FROM `histo` WHERE `cli_histo` LIKE '{$file_cliente['nom_cliente']}' AND `venta_histo` != '' ORDER BY `histo`.`update_histo` DESC LIMIT 4";
             $rs_histo=mysqli_query($link, $sql_histo);

             //--------------------------suma venta de CONTADO--------------------------
             $sql_contado = "SELECT * FROM `histo` 
             WHERE `cli_histo` LIKE '{$file_cliente['nom_cliente']}' AND `venta_histo` = 'CONTADO' ORDER BY `histo`.`venta_histo`";
             $rs_contado = mysqli_query($link, $sql_contado);
             if (!$rs_contado) { die("Error en la consulta: " . mysqli_error($link)); }
            // Inicializar la suma
             $suma_contado = 0;
            // Recorrer los resultados y sumar
             while ($file_contado= mysqli_fetch_assoc($rs_contado)) { $cod_pedido_contado=$file_contado['pedido_histo']; $suma_contado += $file_contado['monto_histo'];}
             //--------------------------suma venta de CONTADO--------------------------

             //--------------------------suma venta de CUENTA CORRIENTE--------------------------
             $sql_cc = "SELECT * FROM `histo` WHERE `cli_histo` = '$nom_cliente' AND `venta_histo` = 'CUENTA CORRIENTE'";
             $rs_cc = mysqli_query($link, $sql_cc);
             if (!$rs_cc) { die("Error en la consulta: " . mysqli_error($link)); }
            // Inicializar la suma
             $suma_cc = 0;
            // Recorrer los resultados y sumar
             while ($file_cc= mysqli_fetch_assoc($rs_cc)) { $suma_cc += $file_cc['monto_histo']; echo $file_cc['monto_histo'].'<br>';}
             //aplica descuento si corresponde
             
                /*if (isset($cod_pedido)) {
                    if (strlen($cod_pedido) == 12) {
                    $ultimosDosCaracteres = substr($cod_pedido, -2); 
                    $descuento=$ultimosDosCaracteres/100;
                    $suma_cc=$suma_cc-($suma_cc*$descuento/100); } 
                }
                 if (isset($cod_pedido_contado)) {
                    if (strlen($cod_pedido_contado) == 12) {
                    $ultimosDosCaracteres_contado = substr($cod_pedido_contado, -2); 
                    $descuento_contado=$ultimosDosCaracteres_contado/100;
                    $suma_contado=$suma_contado-($suma_contado*$descuento_contado/100); }
                 }*/

             //--------------------------suma venta de CUENTA CORRIENTE--------------------------


        }
    } 

$pedidos_previos = array(); // Array para almacenar pedidos previamente encontrados



 ?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?php echo $file_cliente['nom_cliente']; //echo '<br>'.$suma_contado.'-('.$suma_contado.' * '.$descuento_contado.')'; ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">

                <div class="col-12 col-sm-4">
<a href="cuenta-corriente.php?id_cliente=<?php echo $_GET['id_cliente']; ?>">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"><i class="fa-solid fa-money-bill-1-wave"></i> Contado</span>
                      <span class="info-box-number text-center text-muted mb-0"><h3><?php echo '$'.number_format($suma_contado, 0, ',', '.'); ?></h3></span>
                    </div>
                  </div>
                </div>
</a>

                <div class="col-12 col-sm-4">
<a href="cuenta-corriente.php?id_cliente=<?php echo $_GET['id_cliente']; ?>">
<!--a href="prepago.php?id_cliente=<?php echo $_GET['id_cliente']; ?>"!-->
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"><i class="fa-solid fa-hand-holding-dollar"></i>  Pre Pago</span>
                      <span class="info-box-number text-center text-muted mb-0"><h3>$0</h3></span>
                    </div>
                  </div>
</a>
                </div>

                <div class="col-12 col-sm-4">
<a href="cuenta-corriente.php?id_cliente=<?php echo $_GET['id_cliente']; ?>">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"><i class="fa-regular fa-closed-captioning"></i>  Cuenta Corriente</span>
                      <span class="info-box-number text-center text-muted mb-0"><h3><?php echo '$'.number_format($suma_cc, 0, ',', '.'); ?></h3></span>
                    </div>
                  </div>
                </div>
</a>

              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Actividad Reciente</h4>


                  <?php while ($file_histo = mysqli_fetch_assoc($rs_histo)) { 
                        $pedido_histo = $file_histo['pedido_histo'];
    
    // Verificar si el pedido no se ha encontrado previamente
    if (!in_array($pedido_histo, $pedidos_previos)) {
      $suma_monto_productos=0;
      $condicion='';

      $sql_pedidos="SELECT * FROM `histo` WHERE `pedido_histo` = '{$file_histo['pedido_histo']}'";
      $rs_pedidos=mysqli_query($link, $sql_pedidos);
     ?>


                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="dist/img/AdminLTELogo.png" alt="user image">
                        <span class="username">
                          <a href="#"><?php echo strtoupper($file_histo['reparte_histo']); ?></a>
                        </span>
                        <span class="description">Entrego el - <?php echo $file_histo['update_histo']; ?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <?php while ($file_pedidos=mysqli_fetch_assoc($rs_pedidos)) { 
                          echo $file_pedidos['cant_histo'].'  ';
                          echo str_replace('///', ' ', $file_pedidos['producto_histo']);  
                          echo '   $'.number_format($file_pedidos['monto_histo'], 0, ',', '.').'<br>';
                          $condicion = $file_pedidos['condicion_histo'];
                          $suma_monto_productos= $file_pedidos['monto_histo']+$suma_monto_productos;
                          $tipo_venta=$file_pedidos['venta_histo'];

                          ?>
                        <?php } 
//colorsito del tipo de venta
if ($condicion == 'Bar') { $estilo = 'badge bg-primary'; }
if ($condicion == 'Comercio') { $estilo = 'badge bg-warning'; }
if ($condicion == 'Eventual') { $estilo = 'badge bg-danger'; }
//colorsito del tipo de pago
if ($tipo_venta == 'CONTADO') { $estilo_venta = 'fa-solid fa-money-bill-1-wave'; }
if ($tipo_venta == 'PRE COMPRA') { $estilo_venta = 'fa-solid fa-hand-holding-dollar'; }
if ($tipo_venta == 'CUENTA CORRIENTE') { $estilo_venta = 'fa-regular fa-closed-captioning'; }

                        ?>
                      </p> 
                      <p>(Total:   <?php echo '$'.number_format($suma_monto_productos, 0, ',', '.').')'; ?>
                        <?php echo $tipo_venta; ?> <i class="<?php echo $estilo_venta; ?>"></i>
                      </p>
                        <span class="<?php echo $estilo; ?>"><?php echo $condicion; ?></span>

                    </div>


                    <?php         
       // Agregar el pedido actual al array de pedidos previos
        $pedidos_previos[] = $pedido_histo; }  }  ?>

                    
                </div>
              </div>
            </div>
            <!--class="text-primary"!-->
            <!--div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-danger"  ><i class="fas fa-dollar-sign"></i> AdminLTE v3</h3>
              <p class="text-muted">La información resaltada en rojo en la parte superior puede corresponder a las obligaciones pendientes del cliente. A continuación, se presentan las posibles observaciones que el cliente podría tener, ya que estamos en una etapa de desarrollo.</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Nombre de Cliente
                  <b class="d-block"><?php echo $file_cliente['nom_cliente']; ?></b>
                </p>
                <p class="text-sm">Project Leader
                  <b class="d-block">Tony Chicken</b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Project files</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                </li>
              </ul>
              <!-div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div!-->
            </div!--> 
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->


