<!DOCTYPE html>
<html lang="es">
<?php 
include'session.php';
include'conex.php';

$sql_nom_cliente="SELECT * FROM `clientes` WHERE `id_cliente` = '{$_GET['id_cliente']}'";
$rs_nom_cliente=mysqli_query($link, $sql_nom_cliente);
$file_nom_cliente=mysqli_fetch_assoc($rs_nom_cliente);
$nom_cliente=$file_nom_cliente['nom_cliente'];
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
             <h1 class="m-0"><i class="fa-solid fa-right-left"></i>   Movimientos </h1>
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
        
        <!-- /.row -->
        
        
         <?php include'detalle-cliente.php'; ?>
        
        
        <!-- Main row -->
        <!-- /.row -->
    </section>
      </div><!--/. container-fluid -->
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
