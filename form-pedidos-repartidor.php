<?php
include 'session.php';
include 'conex.php';
$input_cliente = '';
$campo_hidden_cliente = '';

if (isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
?>
        <script type="text/javascript">alert('El producto Seleccionado no existe');</script>
<?php
    }
}

// si id_cadena esta vacío es pedido nuevo
if (empty($_SESSION['id_cadena'])) {
    //include'fun.php';
    $longitudCadena = 10;
    $cadenaAleatoria = generarCadenaAleatoria($longitudCadena);

    $sql_clientes = "SELECT * FROM `clientes`";
    $rs_clientes = mysqli_query($link, $sql_clientes);
?>
    <datalist id="clientes">
        <?php while ($file_clientes = mysqli_fetch_assoc($rs_clientes)) { ?>
            <option value="<?php echo $file_clientes['nom_cliente'] . ' - ' . $file_clientes['dir_cliente']; ?>" data-val="<?php echo $file_clientes['id_cliente']; ?>"></option>
        <?php } ?>
    </datalist>
<?php

    $input_cliente = '<input type="text" name="cliente" class="form-control" id="cliente" placeholder="Nombre de Cliente" list="clientes"  onchange="createHiddenInputCliente()" required>';
}
// si id_cadena NO ESTA vacío el pedido esta en curso por lo tanto defino la variable $cadenaAleatoria
else {
    if (isset($_SESSION['cliente_pedido'])) {
        $sql_cliente_en_curso = "SELECT * FROM `clientes` WHERE `id_cliente` = '{$_SESSION['cliente_pedido']}'";
        $rs_cliente_en_curso = mysqli_query($link, $sql_cliente_en_curso);
        $file_cliente_en_curso = mysqli_fetch_assoc($rs_cliente_en_curso);
        $cadenaAleatoria = $_SESSION['id_cadena'];

        $input_cliente = '<input type="text" name="cliente" class="form-control" id="cliente" value="' . $file_cliente_en_curso['nom_cliente'] . '" disabled>';
        $campo_hidden_cliente = '<input type="hidden" name="cliente_hidden" value="' . $_SESSION['cliente_pedido'] . '">';

        // mostrar resultados del pedido que se está cargando
        $sql_form_pedido = "SELECT * FROM `temp` WHERE `cadena_temp` = '{$cadenaAleatoria}'";
        $rs_form_pedido = mysqli_query($link, $sql_form_pedido);
        // Consulta para luego usar en condición de pago, BAR EVENTUAL, etc.
        $rs_form_pedido_pago = mysqli_query($link, $sql_form_pedido);
    }
}

$sql_productos = "SELECT * FROM `productos`";
$rs_productos = mysqli_query($link, $sql_productos);
?>

<datalist id="productos">
    <?php while ($file_productos = mysqli_fetch_assoc($rs_productos)) { ?>
        <option value="<?php echo $file_productos['pres_prod'] . '-' . $file_productos['nom_prod']; ?>" data-val="<?php echo $file_productos['id_prod']; ?>"></option>
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

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?php include 'sidebar.php'; ?>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <?php if (!empty($_GET['id_pedido'])) { ?>
                                <script type="text/javascript">alert('Formulario En Desarrollo...');</script>
                                <h1 class="m-0">Modificar Pedido</h1>
                            <?php } else { ?>
                                <h1 class="m-0">Nuevo Pedido</h1>
                            <?php } ?>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <?php include 'menu2.php'; ?>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-danger">
                                <div class="card-header">
                                    <a href="data-pedidos.php">
                                        <h3 class="card-title">Pedidos</h3>
                                    </a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <?php if (!empty($_GET['id_pedido'])) { ?>
                                            <form>
                                            <?php } else { ?>
                                                <form action="alta-pedido-temporal-repartidor.php">
                                                <?php } ?>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Cliente</label>
                                                    <?php echo $input_cliente;
                                                    echo $campo_hidden_cliente;
                                                    ?>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Productos</label>
                                                    <input type="text" id="producto" class="form-control" list="productos" onchange="createHiddenInput()">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Cantidad</label>
                                                    <input type="number" name="cantidad" class="form-control" id="exampleInputPassword1" placeholder="Cantidad" min="1" required>
                                                </div>

                                                <?php
                                                if (isset($rs_form_pedido_pago)) {
                                                    $file_form_pedido_pago = mysqli_fetch_assoc($rs_form_pedido_pago);
                                                    //echo $file_form_pedido_pago['condi_temp'];
                                                }
                                                ?>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Precio</label>

                                                    <div class="custom-control custom-radio">
                                                        <input value="Bar" class="custom-control-input" type="radio" id="customRadio1" name="customRadio" <?php if (isset($rs_form_pedido_pago)) {
                                                                                                                                                    if ($file_form_pedido_pago['condi_temp'] == 'Bar') {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    }
                                                                                                                                                } ?> required>
                                                        <label for="customRadio1" class="custom-control-label">Bar</label>
                                                    </div>

                                                    <div class="custom-control custom-radio">
                                                        <input value="Comercio" class="custom-control-input" type="radio" id="customRadio2" name="customRadio" <?php if (isset($rs_form_pedido_pago)) {
                                                                                                                                                        if ($file_form_pedido_pago['condi_temp'] == 'Comercio') {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        }
                                                                                                                                                    } ?>>
                                                        <label for="customRadio2" class="custom-control-label">Comercio</label>
                                                    </div>

                                                    <div class="custom-control custom-radio">
                                                        <input value="Eventual" class="custom-control-input" type="radio" id="customRadio3" name="customRadio" <?php if (isset($rs_form_pedido_pago)) {
                                                                                                                                                            if ($file_form_pedido_pago['condi_temp'] == 'Eventual') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            }
                                                                                                                                                        } ?>>
                                                        <label for="customRadio3" class="custom-control-label">Eventual</label>
                                                    </div>
                                                    <input type="hidden" value="<?php echo $cadenaAleatoria; ?>" name="cadenaAleatoria">
                                                </div>

                                                <?php if (empty($_GET['id_pedido'])) { ?>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                                    </div>
                                                <?php } ?>

                                                </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <?php
                        if (!empty($_SESSION['id_cadena'])) {
                            include 'form-pedido-previo-repartidor.php';
                        }
                        ?>
                    </div>

                </div>
            </div>
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
            <strong>
                &copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.
            </strong>
            Todos los derechos reservados. Modificada por Mühlenpfordt Bariloche / Argentina
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

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
            /*  estas funciones las hizo IA se aseguran que los menus desplegables sean bien seleccionados antes de seguir. */

            function createHiddenInput() {
                let elementoInput = document.getElementById('producto');
                let elementoDatalist = document.getElementById('productos');
                let opcionSeleccionada = elementoDatalist.querySelector(`[value="${elementoInput.value}"]`);

                if (opcionSeleccionada) {
                    let seleccion = opcionSeleccionada.getAttribute('data-val');

                    // Eliminamos el campo oculto anterior si existe
                    let hiddenInputExistente = document.querySelector('input[name="producto_hidden"]');
                    if (hiddenInputExistente) {
                        hiddenInputExistente.remove();
                    }

                    let hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'producto_hidden';
                    hiddenInput.value = seleccion;

                    let form = document.querySelector('form');
                    form.appendChild(hiddenInput);

                    // Si todo está bien, puedes descomentar esta línea para enviar el formulario automáticamente después de crear el campo oculto
                    // form.submit();
                } else {
                    // Si el usuario ingresó un valor que no está en la lista, muestra un mensaje de error o realiza otra acción apropiada.
                    alert('El Producto ingresado no está en la Base. Primero debe darlo de alta. O asegurarse de seleccionarlo de la lista desplegable');
                    elementoInput.value = ''; // Limpiamos el valor del input
                }
            }

            function createHiddenInputCliente() {
                let elementoInput = document.getElementById('cliente');
                let elementoDatalist = document.getElementById('clientes');
                let opcionSeleccionada = elementoDatalist.querySelector(`[value="${elementoInput.value}"]`);

                if (opcionSeleccionada) {
                    let seleccion = opcionSeleccionada.getAttribute('data-val');

                    // Eliminamos el campo oculto anterior si existe
                    let hiddenInputExistente = document.querySelector('input[name="cliente_hidden"]');
                    if (hiddenInputExistente) {
                        hiddenInputExistente.remove();
                    }

                    let hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'cliente_hidden';
                    hiddenInput.value = seleccion;

                    let form = document.querySelector('form');
                    form.appendChild(hiddenInput);

                    // Si todo está bien, puedes descomentar esta línea para enviar el formulario automáticamente después de crear el campo oculto
                    // form.submit();
                } else {
                    // Si el usuario ingresó un valor que no está en la lista, puedes mostrar un mensaje de error o realizar otra acción apropiada.
                    alert('El Cliente ingresado no está en la base. Por favor, primero debe darlo de alta.');
                    elementoInput.value = ''; // Limpiamos el valor del input
                }
            }
        </script>
    </div>
</body>
