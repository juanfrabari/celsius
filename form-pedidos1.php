<!DOCTYPE html>
<html lang="es">
  <?php
    include 'session.php';
    include 'conex.php';
    $sql_clientes = "SELECT * FROM `clientes`";
    $rs_clientes = mysqli_query($link, $sql_clientes);
    $sql_productos = "SELECT * FROM `productos`";
    $rs_productos = mysqli_query($link, $sql_productos);
  ?>
  <datalist id="lista-clientes">
    <?php while ($file_clientes = mysqli_fetch_assoc($rs_clientes)) { ?>
      <option value="<?php echo $file_clientes['nom_cliente']; ?>"><?php echo $file_clientes['nom_cliente']; ?></option>
    <?php } ?>
  </datalist>
  <datalist id="lista-productos">
    <?php while ($file_productos = mysqli_fetch_assoc($rs_productos)) { ?>
      <option data-val="<?php echo $file_productos['id_prod']; ?>"><?php echo $file_productos['pres_prod'] . '-' . $file_productos['nom_prod']; ?></option>
    <?php } ?>
  </datalist>
  <head>
    <?php include 'head.php'; ?>
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
                <h1 class="m-0">Nuevo Registro</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index-admin.php">Inicio</a></li>
                  <li class="breadcrumb-item active">Pedidos</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Pedidos</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="alta-pedido.php">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Cliente</label>
                        <input type="text" name="cliente" class="form-control" id="exampleInputEmail1" placeholder="Nombre de Cliente" list="lista-clientes" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Producto</label>
                        <input type="text" name="productos" class="form-control" id="producto" placeholder="Nombre de Producto" list="lista-productos" onchange="createHiddenInput()" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" id="exampleInputPassword1" placeholder="Cantidad" min="1" required>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                    <!-- /.card-body -->
                  </form>
                  
                </div>
                <!-- /.card -->
              </div>
              <!--/.col (left) -->
              <!-- right column -->
              <div class="col-md-6">


<div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Condensed Full Width Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-sm">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Task</th>
                            <th>Progress</th>
                            <th style="width: 40px">Label</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td>
                              <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                              </div>
                            </td>
                            <td><span class="badge bg-danger">55%</span></td>
                          </tr>
                          <tr>
                            <td>2.</td>
                            <td>Clean database</td>
                            <td>
                              <div class="progress progress-xs">
                                <div class="progress-bar bg-warning" style="width: 70%"></div>
                              </div>
                            </td>
                            <td><span class="badge bg-warning">70%</span></td>
                          </tr>
                          <tr>
                            <td>3.</td>
                            <td>Cron job running</td>
                            <td>
                              <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-primary" style="width: 30%"></div>
                              </div>
                            </td>
                            <td><span class="badge bg-primary">30%</span></td>
                          </tr>
                          <tr>
                            <td>4.</td>
                            <td>Fix and squish bugs</td>
                            <td>
                              <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-success" style="width: 90%"></div>
                              </div>
                            </td>
                            <td><span class="badge bg-success">90%</span></td>
                          </tr>
                        </tbody>
                      </table>
                      
                    </div>
                    <!-- /.card-body -->
                  </div>



              </div>
              <!--/.col (right) -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
</section>
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
        <strong>&copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>Todos los derechos reservados. Modificada por Mühlenpfordt Bariloche / Argentina
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
    <!--script src="dist/js/demo.js"></script!-->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <script>
      function createHiddenInput() {
        let elementoInput = document.getElementById('producto');
        let elementoDatalist = document.getElementById('lista-productos');
        let opcionSeleccionada = elementoDatalist.querySelector(`[value="${elementoInput.value}"]`);
        let seleccion = opcionSeleccionada.getAttribute('data-val');
        let hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'producto_hidden';
        hiddenInput.value = seleccion;
        let form = document.querySelector('form');
        form.appendChild(hiddenInput);
        // Puedes descomentar esta línea para enviar el formulario automáticamente después de crear el campo oculto
        // form.submit();
      }
    </script>

  </body>
</html>
