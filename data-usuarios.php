<!DOCTYPE html>
<html lang="es">
<?php include'session.php'; 


include'conex.php'; 
if ($_SESSION['privilegio']!='admin') 
  { header('location:salir.php'); }

$sql_us="SELECT * FROM `us` WHERE `nom_us` <> '{$_SESSION['user']}' AND `priv` !='eliminado'"; 
$rs_us=mysqli_query($link, $sql_us);
//echo $cant=mysqli_num_rows($rs_us);  ?>
<head><?php include'head.php'; ?><link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php include'navbar.php'; ?>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include'sidebar.php'; ?>
  </aside>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Listado de Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <?php include'menu2.php'; ?>
          </div>
        </div>
      </div>
    </div>
    <?php include'table-usuarios.php'; ?>
  </div>
  <br><br>
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    Todos los derechos reservados. Modificada por Mühlenpfordt Bariloche / Argentina
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
</body>
</html>
