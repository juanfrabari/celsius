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
      <div class="preloader flex-column justify-content-center align-items-center"> <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> </div>
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
                <h1 class="m-0">Nuevo Registro</h1> </div>
              <div class="col-sm-6">
                <?php include'menu2.php'; ?>
              </div>
            </div>
          </div>
        </div>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-secondary">
                  <div class="card-header">
                    <a href="data-clientes.php">
                      <h3 class="card-title">Pagos</h3> </a>
                  </div>
                  <?php 
        $sql_clientes = "SELECT * FROM `clientes`";
        $rs_clientes = mysqli_query($link, $sql_clientes);

        ?>
                    <datalist id="clientes">
                      <?php while ($file_clientes = mysqli_fetch_assoc($rs_clientes)) { ?>
                        <option value="<?php echo $file_clientes['nom_cliente']; ?>" data-val="<?php echo $file_clientes['id_cliente']; ?>">
                          <?php echo $file_clientes['nom_cliente']; ?>
                        </option>
                        <?php } ?>
                    </datalist>


                    <form action="alta-pago.php" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group">
                          <input type="date" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required> </div>
                        <div class="form-group">
<?php if (empty($_GET['id_cli'])) { ?>                       
                          <input type="text" name="cliente" class="form-control" id="cliente" placeholder="Nombre de Cliente" list="clientes" onchange="createHiddenInputCliente()" required> 
<?php } else {
$sql_nom_cliente="SELECT * FROM `clientes` WHERE `id_cliente` = '{$_GET['id_cli']}'";
$rs_nom_cliente=mysqli_query($link, $sql_nom_cliente);
$file_nom_cliente=mysqli_fetch_assoc($rs_nom_cliente);
 ?><input type="text" name="cliente" value="<?php echo $file_nom_cliente['nom_cliente']; ?>" class="form-control" id="cliente" disabled> <input type="hidden" name="cliente" value="<?php echo $file_nom_cliente['nom_cliente']; ?>">  <?php } ?>


                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text">$</span> </div>
                            <input type="number" class="form-control" name="monto" placeholder="Monto">
                            <div class="input-group-append"> <span class="input-group-text">.00</span> </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <select name="condicion" class="form-control">
                            <option value="">Seleccionar Condición de Venta</option>
                            <option value="CONTADO">Contado</option>
                            <option value="TRANSFERENCIA">Transferencia</option>
                            <option value="TARJETA">Crédito/Débito</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Observaciones</label>
                          <textarea class="form-control" name="obs" rows="3" placeholder="Por ejemplo: Nro de comprobante ..."></textarea>
                        </div>
                        <!--div class="form-group">
            <input type="file" name="archivos[]" multiple>
        </div!-->
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
      <br>
      <br>
      <aside class="control-sidebar control-sidebar-dark"></aside>
      <footer class="main-footer"> <strong>&copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> Todos los derechos reservados. Modificada por Mühlenpfordt Bariloche / Argentina
        <div class="float-right d-none d-sm-inline-block"> <b>Versión</b> 3.2.0 </div>
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
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script!-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
    if(window.location.search.includes('error=1')) {
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
      toastr["warning"]("Hubo un error al subir el archivo ", "Error");
    }
    if(window.location.search.includes('error=0')) {
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
      toastr["success"]("Registrado", "Pago");
    }
    </script>
    <script type="text/javascript">
    function createHiddenInputCliente() {
      let elementoInput = document.getElementById('cliente');
      let elementoDatalist = document.getElementById('clientes');
      let opcionSeleccionada = elementoDatalist.querySelector(`[value="${elementoInput.value}"]`);
      if(opcionSeleccionada) {
        let seleccion = opcionSeleccionada.getAttribute('data-val');
        // Eliminamos el campo oculto anterior si existe
        let hiddenInputExistente = document.querySelector('input[name="cliente_hidden"]');
        if(hiddenInputExistente) {
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
        alert('Verificar el Cliente Ingresado');
        elementoInput.value = ''; // Limpiamos el valor del input
      }
    }
    </script>
    <?php 
if (!empty($_GET['cod_recibo'])) {
 ?>
      <script type="text/javascript">
      window.open("fa-pdf.php?cod_recibo=<?php echo $_GET['cod_recibo']; ?>", "_blank");
      </script>
      <?php } ?>
  </body>

</html>