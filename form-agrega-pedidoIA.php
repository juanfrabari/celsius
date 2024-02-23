<?php
include 'session.php';
include 'conex.php';

$input_cliente = '';
$campo_hidden_cliente = '';
$ruta_value = '';

if (isset($_GET['error']) && $_GET['error'] == 1) {
    echo '<script type="text/javascript">alert("El producto Seleccionado no existe");</script>';
}

if (empty($_SESSION['id_cadena'])) {
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
    $input_cliente = '<input type="text" name="cliente" class="form-control" id="cliente" placeholder="Nombre de Cliente" list="clientes" onchange="createHiddenInputCliente()" required>';
} else {
    if (isset($_SESSION['cliente_pedido'])) {
        $sql_cliente_en_curso = "SELECT * FROM `clientes` WHERE `id_cliente` = '{$_SESSION['cliente_pedido']}'";
        $rs_cliente_en_curso = mysqli_query($link, $sql_cliente_en_curso);
        $file_cliente_en_curso = mysqli_fetch_assoc($rs_cliente_en_curso);
        $cadenaAleatoria = $_SESSION['id_cadena'];

        $input_cliente = '<input type="text" name="cliente" class="form-control" id="cliente" value="'.$file_cliente_en_curso['nom_cliente'].'" disabled>';
        $campo_hidden_cliente = '<input type="hidden" name="cliente_hidden" value="'.$_SESSION['cliente_pedido'].'">';

        $sql_form_pedido = "SELECT * FROM `temp` WHERE `cadena_temp` = '{$cadenaAleatoria}'";
        $rs_form_pedido = mysqli_query($link, $sql_form_pedido);
        $rs_form_pedido_pago = mysqli_query($link, $sql_form_pedido);
    }
}

$sql_productos = "SELECT * FROM `productos`";
$rs_productos = mysqli_query($link, $sql_productos);
?>

<datalist id="productos">
    <?php while ($file_productos = mysqli_fetch_assoc($rs_productos)) { ?>
        <option value="<?php echo $file_productos['pres_prod'].'-'.$file_productos['nom_prod']; ?>" data-val="<?php echo $file_productos['id_prod']; ?>"></option>
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
                        <?php } elseif (!empty($_GET['ruta'])){ ?>
                            <h1 class="m-0">Agregar Pedido a Ruta: <?php echo $ruta = $_GET['ruta']; ?></h1>
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
                                <form action="alta-pedido-temporal.php" method="POST">

                                    <input type="hidden" name="ruta" value="<?php echo isset($_GET['ruta']) ? $_GET['ruta'] : '12345678'; ?>">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cliente</label>
                                        <?php echo $input_cliente;  echo $campo_hidden_cliente; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Productos</label>
                                        <input type="text" id="producto" class="form-control" list="productos" onchange="createHiddenInput()">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cantidad</label>
                                        <input type="number" name="cantidad" class="form-control" id="exampleInputPassword1" placeholder="Cantidad" min="1" required>
                                    </div>

                                    <?php if (isset($rs_form_pedido_pago)) {
                                        $file_form_pedido_pago = mysqli_fetch_assoc($rs_form_pedido_pago);
                                    } ?>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Precio</label>
                                        <select class="form-control" name="customRadio" required>
                                            <option value="">Seleccionar..</option>
                                            <option value="Bar" <?php if (isset($rs_form_pedido_pago) && $file_form_pedido_pago['condi_temp'] == 'Bar') echo 'selected'; ?>>Bar</option>
                                            <option value="Comercio" <?php if (isset($rs_form_pedido_pago) && $file_form_pedido_pago['condi_temp'] == 'Comercio') echo 'selected'; ?>>Comercio</option>
                                            <option value="Eventual" <?php if (isset($rs_form_pedido_pago) && $file_form_pedido_pago['condi_temp'] == 'Eventual') echo 'selected'; ?>>Eventual</option>
                                        </select>
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

                    <div class="col-md-6">
                        <?php if (!empty($_SESSION['id_cadena'])) { include 'form-pedido-previo.php'; } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <strong>
            &copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.
        </strong>
        Todos los derechos reservados. Modificada por Mühlenpfordt Bariloche / Argentina
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

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

    <script>
        function createHiddenInput() {
            let elementoInput = document.getElementById('producto');
            let elementoDatalist = document.getElementById('productos');
            let opcionSeleccionada = elementoDatalist.querySelector(`[value="${elementoInput.value}"]`);

            if (opcionSeleccionada) {
                let seleccion = opcionSeleccionada.getAttribute('data-val');

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
            } else {
                alert('El Producto ingresado no está en la Base. Primero debe darlo de alta o asegurarse de seleccionarlo de la lista desplegable');
                elementoInput.value = '';
            }
        }

        function createHiddenInputCliente() {
            let elementoInput = document.getElementById('cliente');
            let elementoDatalist = document.getElementById('clientes');
            let opcionSeleccionada = elementoDatalist.querySelector(`[value="${elementoInput.value}"]`);

            if (opcionSeleccionada) {
                let seleccion = opcionSeleccionada.getAttribute('data-val');

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
            } else {
                alert('El Cliente ingresado no está en la base, por favor primero debe darlo de alta.');
                elementoInput.value = '';
            }
        }
    </script>

</div>
</body>
