<!DOCTYPE html>
<html lang="es">
<?php
include 'session.php';
if ($_SESSION['privilegio']!='admin') { header('location:salir.php'); }
include 'conex.php';
$idCliente = $_GET['id_cliente'];

function obtenerUltimosDosDigitos($numero) {
    // Convierte el número a una cadena para contar los dígitos
    $numeroStr = (string)$numero;

    // Verifica si la longitud de la cadena es 12
    if (strlen($numeroStr) == 12) {
        // Obtiene los últimos 2 dígitos de la cadena
        $ultimosDosDigitos = substr($numeroStr, -2);
        return $ultimosDosDigitos;
    } else {
        // Si la longitud no es 12, no hace nada y retorna false (o cualquier valor que desees)
        return false;
    }
}
// calculo el saldo de cuenta corriente
$sql_id_cliente = "SELECT * FROM `clientes` WHERE `id_cliente` = '$idCliente' ";
$rs_id_cliente = mysqli_query($link, $sql_id_cliente);
$file_id_cliente=mysqli_fetch_assoc($rs_id_cliente);
$monto=0; $suma_cc=0;

$nombre = $file_id_cliente['nom_cliente'];
$sql_histo_cc = "SELECT * FROM `histo` WHERE SUBSTRING_INDEX(`cli_histo`, '¦', 1) = '$nombre' AND `venta_histo` = 'CUENTA CORRIENTE'";
//$sql_histo_cc="SELECT * FROM `histo` WHERE `cli_histo` = '$nombre' AND `venta_histo` = 'CUENTA CORRIENTE'";
$rs_histo_cc=mysqli_query($link, $sql_histo_cc);

while ($file_histo_cc=mysqli_fetch_assoc($rs_histo_cc)) {
$monto=$file_histo_cc['monto_histo'];
$descuento= obtenerUltimosDosDigitos($file_histo_cc['pedido_histo']);
if (isset($descuento)&& !empty($descuento)) 
    { $monto=$monto-($monto*$descuento/100); }
$suma_cc=$suma_cc+$monto;
}
$sql_pago = "SELECT * FROM `histo` WHERE SUBSTRING_INDEX(`cli_histo`, '¦', 1) = '$nombre' AND `venta_histo` = 'PAGO'";
//$sql_pago="SELECT * FROM `histo` WHERE `cli_histo` = '$nombre' AND `venta_histo` = 'PAGO'";
$rs_pago=mysqli_query($link, $sql_pago);
while ($file_pago=mysqli_fetch_assoc($rs_pago)) 
{
    $suma_cc=$suma_cc-$file_pago['monto_histo'];
}
// calculo el saldo de cuenta corriente



// Consulta SQL
$consulta = "SELECT nom_cliente FROM clientes WHERE id_cliente = '$idCliente'";
// Ejecutar la consulta
$resultado = mysqli_query($link, $consulta);

if ($resultado) {
    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $nombreCliente = $fila['nom_cliente'];
        mysqli_free_result($resultado);
    } else {
        $nombreCliente = "Cliente no encontrado";
    }
} else {
    $nombreCliente = "Error en la consulta: " . mysqli_error($conexion);
}

// Consulto Pedidos únicos
$sql_monto = "SELECT DISTINCT pedido_histo, fecha_histo, update_histo
FROM histo
WHERE cli_histo = '$nombreCliente' AND venta_histo = 'CUENTA CORRIENTE'";
$rs_monto = mysqli_query($link, $sql_monto);

$total = 0;
$monto_pedido = 0;

while ($file_monto = mysqli_fetch_assoc($rs_monto)) {
    $sql_suma = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$file_monto['pedido_histo']}'";
    $rs_suma = mysqli_query($link, $sql_suma);

    while ($file_suma = mysqli_fetch_assoc($rs_suma)) {
        $monto_pedido = $file_suma['monto_histo'] + $monto_pedido;
    }
}

/*se calcula el saldo acumulado. antes ya intente con javascript, pero me da un error*/

/*se calcula el saldo acumulado. antes ya intente con javascript, pero me da un error*/
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted"><i class="fa-solid fa-money-bill-1-wave"></i> Contado</span>
                                                    <span class="info-box-number text-center text-muted mb-0"><h3>$0</h3></span>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <a href="#">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted"><i class="fa-solid fa-hand-holding-dollar"></i> Pre Pago</span>
                                                    <span class="info-box-number text-center text-muted mb-0"><h3>$0</h3></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        
                                                <a href="form-pagos.php?id_cli=<?php echo $_GET['id_cliente']; ?>">
                                            <div class="info-box bg-light">
                                                     <div class="info-box-content">
                                                         <span class="info-box-text text-center text-muted"><i class="fa-regular fa-closed-captioning"></i> Cuenta Corriente</span>
                                                         <span class="info-box-number text-center text-muted mb-0"><h3><span id="descuento"><?php echo '$' . number_format($suma_cc, 0, ',', '.'); ?></span></h3></span>
                                                     </div>
                                            </div>
                                                </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                  
                            <h2><?php echo $nombreCliente; ?>

                            </h2>
                            <table>
                                <tr>
                                    <td><button type="button" class="btn btn-block btn-primary">Reporte Para Cliente</button></td>
                                </tr>
                            </table>
                        </div><!-- /.col -->
                        
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <?php include 'data-ccc.php'; ?>
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
                    "order": [[6, "desc"]] // Ordenar por la segunda columna (índice 1) de forma descendente
                });
            });
        </script>
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
                toastr["success"]("Actualizado", "Cliente");
            }
        </script>
    </body>
</html>
