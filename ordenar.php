<!DOCTYPE html>
<html lang="es">
<?php
include 'session.php';
include 'conex.php';
?>

<head>
  <?php include 'head.php'; ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
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
              <h1 class="m-0">Fijar Orden de Reparto</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <?php include 'menu2.php'; ?>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <?php
      //$sql_ruta="SELECT * FROM `histo` WHERE `ruta_histo` = '{$_GET['ruta']}'   AND `venta_histo` IS NOT NULL  AND `venta_histo` REGEXP '^[0-9]+$' ORDER BY CAST(`histo`.`venta_histo` AS SIGNED) ASC";
      $sql_ruta = "SELECT * FROM `histo` WHERE `ruta_histo` = '{$_GET['ruta']}' ORDER BY CAST(`histo`.`venta_histo` AS SIGNED) ASC";

      $rs_ruta = mysqli_query($link, $sql_ruta);
      ?>

      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Arrastrar y soltar para modificar el orden de la ruta</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <div class="input-group-append">
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <form action="actualizo-base.php" method="POST" id="updateForm">
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>Orden</th>
                <th>Nombre</th>
                <th>Producto</th>
                <th>Dirección</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $clientes_vistos = array();

            while ($file_ruta = mysqli_fetch_assoc($rs_ruta)) {
                // Verificar si el cliente ya ha sido visto
                if (!in_array($file_ruta['pedido_histo'], $clientes_vistos) && is_numeric($file_ruta['venta_histo'])) {
                    // Agregar el cliente actual al array de clientes vistos
                    $clientes_vistos[] = $file_ruta['cli_histo'];
            ?>
                    <tr id="<?php echo $file_ruta['id_histo']; ?>">
                        <td class="order"><h3><?php echo $file_ruta['venta_histo']; ?></h3></td>
                        <td><?php echo $file_ruta['cli_histo']; ?></td>
                        <td><?php echo str_replace("///", "<br>", $file_ruta['producto_histo']); ?></td>
                        <td><?php echo $file_ruta['dir_histo']; ?></td>
                        <td></td>
                    </tr>
            <?php }
            } ?>
        </tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="submit" class="btn btn-primary" value="Actualizar"></td>
            <td>
                <input type="hidden" name="newOrder" id="newOrder" value="">
            </td>
        </tr>
    </table>
    <input type="hidden" name="ruta" value="<?php echo $_GET['ruta']; ?>">
</form>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
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
        <strong>&copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> Todos los derechos reservados.
        Modificada por Mühlenpfordt Bariloche / Argentina
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.2.0
        </div>
      </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- jQuery UI -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- DataTables y Buttons -->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>


    <script>
      $(document).ready(function () {
        // Hacer que las filas de la tabla sean arrastrables
        $("table tbody").sortable();

        // Actualizar el orden al hacer clic en el botón
        $("input[type='submit']").click(function () {
          //var order = $("table tbody tr[id]").sortable("toArray", { attribute: "id" });
          var order = $("table tbody").sortable("toArray", { attribute: "id" });
          $("#newOrder").val(order.join(',')); // Actualizar el valor del campo oculto
          $("#updateForm").submit(); // Enviar el formulario
        });
      });
    </script>

  </body>
</html>
