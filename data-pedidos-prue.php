<!DOCTYPE html>
<html lang="es">
<?php
include 'session.php';
include 'conex.php';

// Obtén los pedidos ordenados por cliente
$sql_pedidos = "SELECT * FROM `pedidos` ORDER BY `pedidos`.`cli_pedido` ASC";
$rs_pedidos = mysqli_query($link, $sql_pedidos);
$cant = mysqli_num_rows($rs_pedidos);

// Variable para almacenar el nuevo orden de las filas
$nuevoOrden = array();

// Procesa el formulario si se envió el nuevo orden
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["orden"])) {
    $nuevoOrden = $_POST["orden"];
    echo $nuevoOrden;  die();
    // Aquí puedes actualizar el orden en tu base de datos si lo deseas
}

?>
<head>
    <?php include 'head.php'; ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<style>
    table {
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 8px;
    }
</style>

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
                            <h1 class="m-0">Listado de Pedidos</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <?php include 'menu2.php'; ?>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- /.content-header -->

            <!-- Main content -->
            <form id="formulario" method="POST" action="">
                <table id="tabla" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Pedido</th>
                            <th>Cliente</th>
                            <th>Estado</th>
                            <th>Dirección</th>    
                            <th></th>
                            <th>Actualizado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $compara_codigo = '';
                        while ($file_pedidos = mysqli_fetch_assoc($rs_pedidos)) { 

                            $sql_producto = "SELECT * FROM `productos` WHERE `id_prod` = '{$file_pedidos['prod_pedido']}'";
                            $rs_producto = mysqli_query($link, $sql_producto);
                            $file_producto = mysqli_fetch_assoc($rs_producto);

                            $sql_cliente = "SELECT * FROM `clientes` WHERE `id_cliente` = '{$file_pedidos['cli_pedido']}'";
                            $rs_cliente = mysqli_query($link, $sql_cliente);
                            $file_cliente = mysqli_fetch_assoc($rs_cliente);

                            if ($compara_codigo == $file_pedidos['cod_pedido']) {
                            } else {
                                // Verifica si hay un nuevo orden para esta fila
                                $nuevoOrdenIndex = array_search($file_pedidos['cod_pedido'], $nuevoOrden);
                                ?>
                                <tr data-id="<?php echo $file_pedidos['cod_pedido']; ?>">
                                    <td><a href="pages/examples/invoice.html"><?php echo $file_pedidos['cod_pedido']; ?></a></td>
                                    <td><?php echo $file_cliente['nom_cliente']; ?></td>
                                    <td><span class="badge badge-warning">Pendiente</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $file_cliente['dir_cliente']; ?></div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php 
                            }
                            $compara_codigo = $file_pedidos['cod_pedido'];
                        }     
                        ?>            
                        <!-- Agrega más filas aquí -->
                    </tbody>
                </table>
                <input type="hidden" name="orden" id="orden" value="">
                <button type="submit">Guardar Orden</button>
                <button type="button" onclick="generarPDF()">Guardar como PDF</button>
            </form>

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
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dompdf/0.8.5/dompdf.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#tabla').DataTable({
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
                    "order": [[5, "desc"]], // Ordenar por la segunda columna (índice 1) de forma descendente
                    "initComplete": function(settings, json) {
                        // Establecer el orden actual de las filas en el campo oculto
                        var currentOrder = $('#tabla tbody tr').map(function() {
                            return $(this).data('id');
                        }).get().join(',');
                        $('#orden').val(currentOrder);
                    }
                });

                $("#tabla tbody").sortable({
                    axis: "y",
                    update: function(event, ui) {
                        // Obtener el nuevo orden de las filas
                        var nuevoOrden = $(this).sortable("toArray");

                        // Establecer el nuevo orden en el campo oculto
                        $('#orden').val(nuevoOrden.join(','));

                        // Reinicializar el DataTable para reflejar el nuevo orden
                        $('#tabla').DataTable().order([]);
                    }
                }).disableSelection();
            });

            function generarPDF() {
                // Obtener el contenido HTML de la tabla
                var contenido = $("#tabla").html();

                // Crear un objeto dompdf
                var pdf = new window.jspdf.jsPDF();

                // Generar el PDF con el contenido de la tabla
                pdf.fromHTML(contenido, 10, 10, { 'width': 180 });

                // Guardar el PDF en el navegador
                pdf.save('tabla_pedidos.pdf');
            }
        </script>
    </body>
</html>
