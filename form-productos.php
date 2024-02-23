<!DOCTYPE html>
<html lang="es">
    <?php include 'session.php'; 
if ($_SESSION['privilegio']!='admin') { header('location:salir.php'); }
    ?>
    <head>
        <?php include 'head.php'; ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
            </div>
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
                                <?php if (!empty($_GET['id_prod'])) {
include'conex.php';
$sql_producto="SELECT * FROM `productos` WHERE `id_prod` = '{$_GET['id_prod']}'";
$rs_producto=mysqli_query($link, $sql_producto);
$file_producto=mysqli_fetch_assoc($rs_producto);

                                 ?>
                                    <h1 class="m-0">Modificar Producto</h1>
                                <?php } else { ?>
                                    <h1 class="m-0">Nuevo Producto</h1>
                                <?php } ?>
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
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <a href="data-productos.php">
                                            <h3 class="card-title">Productos</h3>
                                        </a>
                                    </div>
                                    <form action="alta-producto.php">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nombre</label>
                                                <input type="text" name="producto" class="form-control" id="exampleInputEmail1" placeholder="Descripción del Producto" <?php if (!empty($_GET['id_prod'])) { echo 'value="'.$file_producto['nom_prod'].'"'; } ?>>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Presentación</label>
                                                <input type="text" name="presenta" class="form-control" id="exampleInputEmail1" placeholder="Ej 1kg, o 20 unidades" <?php if (!empty($_GET['id_prod'])) { echo 'value="'.$file_producto['pres_prod'].'"'; } ?>>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Cantidad</label>
                                                <input type="number" name="cant" class="form-control" id="exampleInputPassword1" placeholder="Cantidad en Stock" min="1" required <?php if (!empty($_GET['id_prod'])) { echo 'value="'.$file_producto['cant_prod'].'"'; } ?>>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Precio Bar</label>
                                                <input type="number" name="precioBar" class="form-control" id="exampleInputPassword1" placeholder="Ingresar Importe" <?php if (!empty($_GET['id_prod'])) { echo 'value="'.$file_producto['bar_prod'].'"'; } ?>>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Precio Comercio</label>
                                                <input type="number" name="precioComercio" class="form-control" id="exampleInputPassword1" placeholder="Ingresar Importe" <?php if (!empty($_GET['id_prod'])) { echo 'value="'.$file_producto['comercio_prod'].'"'; } ?>>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Precio Eventual</label>
                                                <input type="number" name="precioEventual" class="form-control" id="exampleInputPassword1" placeholder="Ingresar Importe" <?php if (!empty($_GET['id_prod'])) { echo 'value="'.$file_producto['eventual_prod'].'"'; } ?>>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <?php if (!empty($_GET['id_prod'])) { ?>
                                                <button type="submit" class="btn btn-primary">Actualizar</button> <input type="hidden" name="id_prod" value="<?php echo $file_producto['id_prod'] ?>">
                                            <?php } else { ?>
                                                <button type="submit" class="btn btn-primary">Enviar</button>
                                            <?php } ?>
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
                <strong>
                    Copyright &copy;
                    2014-2023
                    <a href="https://adminlte.io">AdminLTE.io</a>.
                </strong>
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
                toastr["success"]("Cargado a la Base", "Nuevo Producto");
            }
        </script>
    </body>
</html>
