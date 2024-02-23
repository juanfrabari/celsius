<!DOCTYPE html>
<html lang="es">

<?php
include 'session.php';
include 'conex.php';

function NombreCliente($id_cliente)
{
    global $link;  // Declarar $link como global dentro de la función
    $sql_cliente="SELECT * FROM `clientes` WHERE `id_cliente` = '$id_cliente'";
    $rs_cliente=mysqli_query($link, $sql_cliente);
    $file_cliente=mysqli_fetch_assoc($rs_cliente);
    return $file_cliente['nom_cliente'];
}

if (isset($_GET['estado'])) { $estado = $_GET['estado']; } 
else { $estado = ''; }

if ($estado == 'finalizada') 
     {$sql_detalle_pedido = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$_GET['cod_pedido']}'"; 
      $sql_detalle_pedido1 = "SELECT * FROM `histo` WHERE `pedido_histo` = '{$_GET['cod_pedido']}'";   
}
else {$sql_detalle_pedido = "SELECT * FROM `pedidos` WHERE `cod_pedido` = '{$_GET['cod_pedido']}'";
      $sql_detalle_pedido1 = "SELECT * FROM `pedidos` WHERE `cod_pedido` = '{$_GET['cod_pedido']}'"; }

$rs_detalle_pedido = mysqli_query($link, $sql_detalle_pedido);

$rs_detalle_pedido1 = mysqli_query($link, $sql_detalle_pedido1);
$file_detalle_pedido1=mysqli_fetch_assoc($rs_detalle_pedido1);

//$file_detalle_pedido = mysqli_fetch_assoc($rs_detalle_pedido1);
//si no hay resultados en la consulta salgo. Escapo
if (!$rs_detalle_pedido || mysqli_num_rows($rs_detalle_pedido) == 0 ||  mysqli_num_rows($rs_detalle_pedido1) == 0 ) {
    header('Location: index-admin.php');
    exit;
}

function Producto($p)
{
    global $link;  // Declarar $link como global dentro de la función
    $sql_producto = "SELECT * FROM `productos` WHERE `id_prod` = '$p'";
    $rs_producto = mysqli_query($link, $sql_producto);
    $file_producto = mysqli_fetch_assoc($rs_producto);
    return $file_producto['nom_prod'] . ' - ' . $file_producto['pres_prod'];
}



// Función para obtener el nombre del cliente por ID
function obtenerNombreCliente($id_cliente) {
    global $link;

    // Consulta SQL
    $sql = "SELECT nom_cliente FROM clientes WHERE id_cliente = $id_cliente";

    // Ejecutar la consulta
    $result = $link->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Obtener la fila asociada al resultado
        $row = $result->fetch_assoc();

        // Obtener el valor de la columna nom_cliente
        $nom_cliente = $row['nom_cliente'];

        // Devolver el nombre del cliente
        return $nom_cliente;
    } else {
        // Si no se encontraron resultados, devolver un valor indicativo
        return "Cliente no encontrado";
    }
}

// Función para obtener el nombre del cliente por ID
function obtenerDireccionCliente($id_cliente) {
    global $link;

    // Consulta SQL
    $sql = "SELECT dir_cliente FROM clientes WHERE id_cliente = $id_cliente";

    // Ejecutar la consulta
    $result = $link->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Obtener la fila asociada al resultado
        $row = $result->fetch_assoc();

        // Obtener el valor de la columna dir_cliente
        $dir_cliente = $row['dir_cliente'];

        // Devolver la dirección del cliente
        return $dir_cliente;
    } else {
        // Si no se encontraron resultados, devolver un valor indicativo
        return "Dirección no encontrada";
    }
}


?>


<head>
    <?php include 'head.php'; ?>
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
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
                            <h1 class="m-0"></h1>
                        </div>
                        <div class="col-sm-6">
                            <?php include 'menu2.php'; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div id="no-more-tables">
                                <h3></h3>
                                <h4><?php 
                                  ?></h4>
                                <h6><?php  if ($estado == 'finalizada') {
                                    echo  '<h3>'.$file_detalle_pedido1['cli_histo'].'</h3>';
                                } else { echo '<h3>'.obtenerNombreCliente($file_detalle_pedido1['cli_pedido']).'</h3>'; } ?></h6>
                                <h5><?php if ($estado == 'finalizada') { echo  $file_detalle_pedido1['dir_histo']; } 
                                else { echo obtenerDireccionCliente($file_detalle_pedido1['cli_pedido']); } ?></h5>
                                <table>
                                    <caption><?php echo 'id: ' . $_GET['cod_pedido']; ?></caption>
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio U.</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <?php $stotal = 0;
                                    if (isset($_GET['estado']) && $_GET['estado'] == 'finalizada') { ?>
                                        <tbody>
                                            <?php while ($file_detalle_pedido = mysqli_fetch_assoc($rs_detalle_pedido)) { ?>
                                                <tr>
                                                    <td><?php echo str_replace("///", " - ", $file_detalle_pedido['producto_histo']); ?></td>
                                                    <td><?php echo $file_detalle_pedido['cant_histo']; ?></td>
                                                    <td><?php echo '$' . number_format($file_detalle_pedido['monto_histo'], 0, ',', '.'); ?></td>
                                                    <td><?php $total = $file_detalle_pedido['cant_histo'] * $file_detalle_pedido['monto_histo'];
                                                        echo '$' . number_format($total, 0, ',', '.'); ?></td>
                                                </tr>
                                            <?php $stotal = $total + $stotal;
                                            } ?>
                                        </tbody>
                                    <?php } else { ?>
                                        <tbody>
                                            <?php $total = 0;
                                            while ($file_detalle_pedido = mysqli_fetch_assoc($rs_detalle_pedido)) { ?>
                                                <tr>
                                                    <td><?php echo Producto($file_detalle_pedido['prod_pedido']);  ?></td>
                                                    <td><?php echo $file_detalle_pedido['cant_pedido']; ?></td>
                                                    <td><?php $Precio_unidad = $file_detalle_pedido['monto_pedido'] / $file_detalle_pedido['cant_pedido'];
                                                        echo '$' . number_format($Precio_unidad, 0, ',', '.'); ?></td>
                                                    <td><?php echo '$' . number_format($file_detalle_pedido['monto_pedido'], 0, ',', '.'); ?></td>
                                                </tr>
                                            <?php $stotal = $file_detalle_pedido['monto_pedido'] + $stotal;
                                            } ?>
                                        </tbody>
                                    <?php } ?>

                                    <tfoot>
                                        <tr>
                                            <th>
<?php if (strlen($_GET['cod_pedido']) > 12) {
    echo 'Descuento:  ';
    $descuento = substr($_GET['cod_pedido'], 10); // Obtener los caracteres desde la posición 12 en adelante
    $descuento = intval($descuento); // Convertir la subcadena en un entero
    $stotal -= $descuento; // Restar el descuento del subtotal
    echo $descuento;
    echo '<br>';
    echo 'Total con descuento: $' . number_format($stotal, 0, ',', '.');
}?></th>
                                            <th></th>
                                            <th>Total General</th>
                                            <th><?php echo '$' . number_format($stotal, 0, ',', '.'); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <aside class="control-sidebar control-sidebar-dark"></aside>
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2023
                <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            Todos los derechos reservados. Modificada por Mühlenpfordt Bariloche / Argentina
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
    <script src="dist/js/adminlte.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "responsive": true,
                "info": false,
                "autoWidth": false,
                "buttons": [{
                    extend: 'pdf',
                    footer: true
                }]
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
