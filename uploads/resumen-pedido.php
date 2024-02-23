<!DOCTYPE html>
<html lang="es">
<?php
include 'session.php';
include 'conex.php';

// Verificar si 'estado' está definido en $_GET antes de usarlo
$estado = isset($_GET['estado']) ? $_GET['estado'] : '';


if ($estado == 'finalizada') {
     $sql_detalle_pedido = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$_GET['cod_pedido']}'";
     } 
else { $sql_detalle_pedido = "SELECT * FROM `pedidos` WHERE `cod_pedido` = '{$_GET['cod_pedido']}'";} 
$rs_detalle_pedido = mysqli_query($link, $sql_detalle_pedido);

if (!$rs_detalle_pedido || mysqli_num_rows($rs_detalle_pedido) == 0) {
    // No se encontraron resultados, redirigir a otro sitio
    header('Location: index-admin.php');
    exit; // Asegúrate de salir del script después de la redirección
}
function Producto($p) {
    include 'conex.php';
    $sql_producto = "SELECT * FROM `productos` WHERE `id_prod` = '$p'";
    $rs_producto = mysqli_query($link, $sql_producto);
    $file_producto=mysqli_fetch_assoc($rs_producto);
    return $file_producto['nom_prod'].' - '.$file_producto['pres_prod'];
    // Puedes hacer más cosas con $sql_producto aquí si es necesario
}

?>
<style type="text/css">
table {
  font-family: "Helvetica Neue", Helvetica, sans-serif
}

caption {
  text-align: left;
  color: silver;
  font-weight: bold;
  text-transform: uppercase;
  padding: 5px;
}

thead {
  background: SteelBlue;
  color: white;
}

th,
td {
  padding: 5px 10px;
}

tbody tr:nth-child(even) {
  background: WhiteSmoke;
}

tbody tr td:nth-child(2) {
  text-align:center;
}

tbody tr td:nth-child(3),
tbody tr td:nth-child(4) {
  text-align: right;
  font-family: monospace;
}

tfoot {
  background: SeaGreen;
  color: white;
  text-align: right;
}

tfoot tr th:last-child {
  font-family: monospace;
}
</style>



<head>
  <?php include 'head.php'; ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <?php include 'navbar.php'; ?>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <?php include 'sidebar.php'; ?>
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <?php include 'menu2.php'; ?>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          



<div class="container">
    <div class="row">
        <!--div class="col-md-12 table-bordered table-striped table-condensed cf" >
            <h4 class="text-center">
                Detalle de Pedido <?php echo $_GET['cod_pedido']; ?>
            </h4>
            <!--h3 class="text-center">
                Resize the browser screen to see how the table changes
            </h3!-->
        </div!-->
        <div id="no-more-tables">
            
<table>
  <caption><?php echo 'id: '.$_GET['cod_pedido']; ?></caption>
  <thead>
    <tr>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Precio U.</th>
      <th>Total</th>
    </tr>
  </thead>
 
<?php $stotal=0; if (isset($_GET['estado']) && $_GET['estado'] == 'finalizada') { ?>
  <tbody>
  <?php while ($file_detalle_pedido=mysqli_fetch_assoc($rs_detalle_pedido)) {?>
    <tr>
      <td><?php// Producto(3); /* str_replace("///", " - ", $file_detalle_pedido['producto_histo']);*/ ?></td>
      <td><?php //echo $file_detalle_pedido['cant_histo']; ?></td>
      <td><?php echo '$'. number_format($file_detalle_pedido['monto_histo'], 0, ',', '.'); ?></td>
      <td><?php $total=$file_detalle_pedido['cant_histo']*$file_detalle_pedido['monto_histo']; echo '$'. number_format($total, 0, ',', '.'); ?></td>
    </tr>
  <?php $stotal=$total+$stotal; } ?>  
  </tbody>
<?php }
else  ?><tbody>
  <?php $total=0; while ($file_detalle_pedido=mysqli_fetch_assoc($rs_detalle_pedido)) {?>
    <tr>
      <td><?php echo Producto($file_detalle_pedido['prod_pedido']);  ?></td>
      <td><?php echo $file_detalle_pedido['cant_pedido']; ?></td>
      <td><?php $Precio_unidad=$file_detalle_pedido['monto_pedido']/$file_detalle_pedido['cant_pedido']; echo '$'. number_format($Precio_unidad, 0, ',', '.'); ?></td>
      <td><?php echo '$'. number_format($file_detalle_pedido['monto_pedido'], 0, ',', '.'); ?></td>
    </tr>
  <?php $stotal=$file_detalle_pedido['monto_pedido']+$stotal; } ?>  
  </tbody>


  <tfoot>
    <tr>
      <th colspan="3">Total General</th>
      <th><?php echo '$'. number_format($stotal, 0, ',', '.'); ?></th>
    </tr>
  </tfoot>
</table>


        </div>
    </div>    
</div>



        </div>
        <!-- /.card-body -->
      </div>
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
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "responsive": true,
        "info": false,
        "autoWidth": false,
        "buttons": [
            {
                extend: 'pdf',
                footer: true // Incluir la fila del <tfoot> en la exportación a PDF
                //--------------------


            }
        ]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>
</html>
