<!DOCTYPE html>
<html lang="es">
<?php
include 'session.php';
include 'conex.php';

$sql_pedido_hi = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$_GET['pedido']}'";
$rs_pedido_hi = mysqli_query($link, $sql_pedido_hi);
$cant = mysqli_num_rows($rs_pedido_hi);

if (!$rs_pedido_hi || mysqli_num_rows($rs_pedido_hi) == 0) {
    header('Location: index-admin.php');
    exit;
}

$sql_info_cliente = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$_GET['pedido']}'";
$rs_info_cliente = mysqli_query($link, $sql_info_cliente);
$file_info_cliente = mysqli_fetch_assoc($rs_info_cliente);

$cadena = $file_info_cliente['cli_histo'];
$datos = explode("¦", $cadena);

// Obtener el primer elemento del array resultante
$nombre = $datos[0];

// Mostrar el resultado
//echo $nombre;


$sql_tabla_cliente = "SELECT * FROM `clientes` WHERE `nom_cliente` = '$nombre'";
$rs_tabla_cliente = mysqli_query($link, $sql_tabla_cliente);
$file_tabla_cliente = mysqli_fetch_assoc($rs_tabla_cliente);
?>

<head>
    <?php include 'head.php'; ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
                        <div class="col-sm-8">
                            <h1 class="m-0">Detalle de Pedido #<?php echo $_GET['pedido']; ?></h1>
                            <br><h4><?php 
$segmentos = explode('¦', $file_info_cliente['cli_histo']);

// Mostrar solo el primer segmento
echo $segmentos[0]; //$nombre; ?></h4>

                            <?php if (!empty($file_tabla_cliente['saldo_cliente'])) {
                                //$sql_cuenta_corriente = "SELECT * FROM `histo` WHERE `cli_histo` = '$nombre' ";
                                $sql_cuenta_corriente = "SELECT * FROM `histo` WHERE SUBSTRING_INDEX(`cli_histo`, '¦', 1) = '$nombre'";
                                $rs_cuenta_corriente = mysqli_query($link, $sql_cuenta_corriente);
                                $saldo = 0;
                                while ($file_cuenta_corriente = mysqli_fetch_assoc($rs_cuenta_corriente)) {
                                    if ($file_cuenta_corriente['venta_histo'] == 'CUENTA CORRIENTE') {
                                        $saldo = $saldo + $file_cuenta_corriente['monto_histo'];
                                    }
                                    if ($file_cuenta_corriente['venta_histo'] == 'PAGO') {
                                        $saldo = $saldo - $file_cuenta_corriente['monto_histo'];
                                    }
                                }
                               // if ($saldo > 0) { ?>
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fa-solid fa-money-check-dollar"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Saldo Anterior</span>
                                            <span class="info-box-number"><h3><?php echo '$' . number_format($saldo, 0, ',', '.'); ?></h3></span>
                                            <div class="row">
                                                <table>
                                                    <tr>
                                                        <td><a href="form-pagos.php?id_cli=<?php echo $file_tabla_cliente['id_cliente']; ?>"><span class="info-box-icon bg-info"><button type="submit" class="btn btn-block btn-success btn-sm">Pagar</button></span></a></td>
                                                        <td><a href="form-pagos.php?id_cli=<?php echo $file_tabla_cliente['id_cliente']; ?>"><span class="info-box-icon bg-info"><button type="submit" class="btn btn-block btn-info btn-sm">Detalle</button></span></a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php // }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <?php include 'tabla-detalle-pedido-histo.php'; ?>
            <!-- /.content-wrapper -->
            <br><br>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>
                    &copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.
                </strong>
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
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    "order": [
                        [5, "desc"]
                    ]
                });
            });
        </script>

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
                toastr["success"]("Usuario o Contraseña incorrectos", "Error");
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
                toastr["success"]("Pedido Finalizado", "Finalizado");
            }
        </script>
    </body>
</html>
