<!DOCTYPE html>
<html lang="es">
<?php include'session.php'; 
include'conex.php';
if ($_SESSION['privilegio']!='admin') { header('location:salir.php'); }
$sql_productos="SELECT * FROM `productos`";
$rs_productos=mysqli_query($link, $sql_productos);
$cant=mysqli_num_rows($rs_productos);
?>
<head>
    <?php include 'head.php'; ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>

</head>

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
            <h1 class="m-0">Listado de Productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
<?php include'menu2.php'; ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->



    <!-- Main content -->



<?php include'data0.php'; ?>


  <!-- /.content-wrapper -->



<br><br>

  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

  </aside>

  <!-- /.control-sidebar -->



  <!-- Main Footer -->

  <footer class="main-footer">

    <strong>Copyright &copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>

   Todos los derechos reservados.  Modificada por Mühlenpfordt Bariloche / Argentina

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
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    language: {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    },
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'print'],
                    
                    dom: 'Bfrtip',
      buttons: [
        {
          extend: 'copy',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'csv',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'excel',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'pdf', // Cambia a 'pdf' para agregar el botón de exportar a PDF
          exportOptions: {
            columns: ':visible'
          },
          customize: function(doc) {
            // Agregar el logo en la esquina superior derecha
            var logo = 'AdminLTELogo.png'; // Reemplaza 'URL_DEL_LOGO.png' con la URL de tu logo
            doc.content.unshift(
              {
                text: '',
                alignment: 'right',
                margin: [0, 10],
                image: logo,
                width: 80 // Ajusta el ancho del logo según tus necesidades
              }
            );

            // Otros ajustes de estilo o contenido si los necesitas
          }
        },
        {
          extend: 'pdf', // Agrega otro botón de PDF sin logo para comparar
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'print',
          exportOptions: {
            columns: ':visible'
          }
        }
      ],
                    
                    
                    "order": [[0, "desc"]] // Ordenar por la segunda columna (índice 1) de forma descendente
                });
            });
        </script>

</body>

</html>

