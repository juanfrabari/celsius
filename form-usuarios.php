<!DOCTYPE html>
<html lang="es">

<?php 
  include 'session.php';
  if ($_SESSION['privilegio'] != 'admin') { 
    header('location:salir.php'); 
  } 
?>

<head>
  <?php include 'head.php'; ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <?php include 'navbar.php'; ?>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <?php include 'sidebar.php'; ?>
    </aside>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Nuevo Registro</h1>
            </div>
            <div class="col-sm-6">
              <?php include 'menu2.php'; ?>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card card-success">
                <div class="card-header">
                  <a href="data-clientes.php">
                    <h3 class="card-title">Usuarios</h3>
                  </a>
                </div>

                <form action="alta-usuario.php" method="POST">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Nombre de Usuario" <?php if (!empty($_GET['id_cliente'])) { echo 'value="'.$file_cliente['nom_cliente'].'"';}?> required>
                    </div>
                    <!--div class="form-group">
                      <label for="exampleInputEmail1">Contacto</label>
                      <input type="text" name="contacto" class="form-control" id="exampleInputEmail1" placeholder="Ej: 2944565530 o deliveryypc@gmail.com" <?php if (!empty($_GET['id_cliente'])) { echo 'value="'.$file_cliente['contacto_cliente'].'"';}?> required>
                    </div!-->
                    <div class="form-group">
                      <label for="exampleInputPassword1">Permiso</label>
                      <select class="form-control" name="permiso" required>
                        <option value=""></option>
                        <option value="repartidor">Repartidor</option>
                        <option value="admin">Administrador</option>
                      </select>
                    </div>
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </form>
              </div>

              <div class="card card-primary"></div>
              <div class="card card-info"></div>
              <div class="card card-info"></div>
            </div>

            <div class="col-md-6"></div>
          </div>
        </div>
      </section>
    </div>

    <br><br>
    
    <aside class="control-sidebar control-sidebar-dark"></aside>
    
    <footer class="main-footer">
      <strong>&copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      Todos los derechos reservados. Modificada por Mühlenpfordt Bariloche / Argentina
      <div class="float-right d-none d-sm-inline-block">
        <b>Versión</b> 3.2.0
      </div>
    </footer>
  </div>

  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="dist/js/adminlte.js"></script>
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <script src="plugins/chart.js/Chart.min.js"></script>
  <script src="dist/js/pages/dashboard2.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script type="text/javascript">
    if (window.location.search.includes('error=1')) {
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "rtl": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };
      toastr["error"]("El Nombre de Usuario ya exite", "Duplicado");
    }
    if (window.location.search.includes('error=0')) {
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "rtl": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };
      toastr["success"]("Nuevo Registro", "Usuario");
    }
  </script>
</body>

</html>
