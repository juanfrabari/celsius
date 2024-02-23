<!DOCTYPE html>
<html lang="es">
<?php 
include'session.php';
if ($_SESSION['privilegio']!='admin') { header('location:salir.php'); }
include'conex.php';
 
$cantidad_pedidos=0;
$sql_pedidos = "SELECT * FROM `pedidos` ORDER BY `pedidos`.`cod_pedido` ASC";
$rs_pedidos = mysqli_query($link, $sql_pedidos);
$cod_pedido = '';
while ($file_pedidos = mysqli_fetch_assoc($rs_pedidos)) {
    if ($cod_pedido != $file_pedidos['cod_pedido']) {
        //echo $file_pedidos['cod_pedido'] . '<br>';
        $cod_pedido = $file_pedidos['cod_pedido'];
        $cantidad_pedidos=$cantidad_pedidos+1;
        //echo $cantidad_pedidos; 
    }
}
?>
<head><?php include'head.php'; ?></head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <?php include'navbar.php'; ?>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <?php include'sidebar.php'; ?>
    </aside>
    

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Tablero V2 </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <?php include'menu2.php'; ?>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <!-- /.row -->
          <div class="row">
          
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-md-3 col-sm-6 col-12">
              <a href="data-pedidos.php">
              <div class="info-box bg-info">
                <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Nuevos Pedidos</span>
                  <span class="info-box-number"><?php echo $cantidad_pedidos; ?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    70% Incremento
                  </span>
                </div>
              </div>
            </a>
            </div>


<?php
$cantidad_clientes=0;
$sql_clientes = "SELECT * FROM `clientes`";
$rs_clientes = mysqli_query($link, $sql_clientes);
$cantidad_clientes=mysqli_num_rows($rs_clientes);

?>



            <div class="col-md-3 col-sm-6 col-12">
            <a href="data-clientes.php">
              <div class="info-box bg-success">
              <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Clientes</span>
                <span class="info-box-number"><?php echo $cantidad_clientes; ?></span>
                <div class="progress">
                  <div class="progress-bar" style="width: 10%"></div>
                </div>
                <span class="progress-description">
                  10% de incremento
                </span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>


<?php
$cantidad_productos=0;
$sql_productos = "SELECT * FROM `productos`";
$rs_productos = mysqli_query($link, $sql_productos);
$cantidad_productos=mysqli_num_rows($rs_productos);

?>


          <div class="col-md-3 col-sm-6 col-12">
            <a href="data-productos.php">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="fas fa-comments"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Productos</span>
                <span class="info-box-number"><?php echo $cantidad_productos; ?></span>
                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                  20% de la capacidad
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>


          <div class="col-md-3 col-sm-6 col-12">
              <a href="graficos.php">
              <div class="info-box bg-info">
                <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Estadísticas</span>
                  <span class="info-box-number">3</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    70% Incremento
                  </span>
                </div>
              </div>
            </a>
            </div>



            
            <!-- ./col -->
            
          </div>
          <!-- ./col -->
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <br><br>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2023
      <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    Todos los derechos reservados. Modificada por Mühlenpfordt Bariloche / Argentina
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!--script src="dist/js/demo.js"></script-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
