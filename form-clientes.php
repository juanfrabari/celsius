<!DOCTYPE html>
<html lang="es">
  <?php include 'session.php';
if ($_SESSION['privilegio']!='admin') { header('location:salir.php'); }
   
    if (!empty($_GET['id_cliente'])) {
      include 'conex.php';
      $sql_cliente = "SELECT * FROM `clientes` WHERE `id_cliente` = '{$_GET['id_cliente']}'";
      $rs_cliente = mysqli_query($link, $sql_cliente);
      $file_cliente = mysqli_fetch_assoc($rs_cliente);
      $saldo = $file_cliente['saldo_cliente'];
      $condicion=$file_cliente['venta_cliente'];
    }
  ?>
  <head>
    <?php include 'head.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!--div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div!-->
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
                <?php if (!empty($_GET['id_cliente'])) { ?>
                  <h1 class="m-0">Modificar Registro</h1>
                <?php } else { ?>
                  <h1 class="m-0">Nuevo Registro</h1>
                <?php } ?>
              </div>
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
                <div class="card card-success">
                 
                  <div class="card-header">
                   <a href="data-clientes.php">
                   <h3 class="card-title">Clientes</h3>
                  </a>
                  </div>
                  

                  <?php if (!empty($_GET['id_cliente'])) { ?>
  <form action="modifica-cliente.php"> <input type="hidden" name="id_cliente" value="<?php echo $_GET['id_cliente']; ?>">
<?php } else { ?>
  <form action="alta-cliente.php" method="GET">
<?php } ?>

                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="nombre de Cliente" <?php if (!empty($_GET['id_cliente'])) { echo 'value="'.$file_cliente['nom_cliente'].'"';}?> readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Contacto</label>
                        <input type="text" name="contacto" class="form-control" id="exampleInputEmail1" placeholder="ej: 2944565530 o deliveryypc@gmail.com" <?php if (!empty($_GET['id_cliente'])) { echo 'value="'.$file_cliente['contacto_cliente'].'"';}?> required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Dirección</label>
                        <input type="text" name="dir" class="form-control" id="exampleInputPassword1" placeholder="ej: Villa manzano 654" <?php if (!empty($_GET['id_cliente'])) { echo 'value="'.$file_cliente['dir_cliente'].'"';}?> required>
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" name="saldo" class="custom-control-input" id="customSwitch1" <?php 
                          if (!empty($_GET['id_cliente'])) {
                          if ($saldo=='on') { echo'checked'; }
                          }
                           ?>>
                          <label class="custom-control-label" for="customSwitch1">Mostrar saldo a otros Usuarios</label>
                        </div>
                      </div>
                      <?php
                        // Obtener el valor deseado de mysqli_fetch_assoc
                        if (!empty($_GET['id_cliente'])) {
                          # code...
                        $valorDeseado = $file_cliente['hela_cliente'];
                        

                      ?>
                      <!--div class="form-group">
                        
                        <select name="heladera" class="form-control">
                          <option value="" >Seleccionar heladera ..</option>
                          <option value="Heladera1" <?php if ($valorDeseado=='Heladera1') { echo 'selected'; } ?>  >Heladera1</option>
                          <option value="Heladera2" <?php if ($valorDeseado=='Heladera2') { echo 'selected'; } ?>  >Heladera2</option>
                          <option value="Heladera3" <?php if ($valorDeseado=='Heladera3') { echo 'selected'; } ?>  >Heladera3</option>
                        </select>
                      </div!-->

<?php
$cadena = $file_cliente['hela_cliente'];
$elementos = explode('////', $cadena);

$elementosFiltrados = array_filter($elementos, function($elemento) {
    return trim($elemento) !== '';
});

//foreach ($elementosFiltrados as $elemento) {
//    echo $elemento . "<br>";
//}
?>



<div class="form-group">
  <label for="exampleInputPassword1">Heladeras</label>
    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="Frezzer Grande" name="heladera[]" <?php if (in_array('Frezzer Grande', $elementosFiltrados)) echo 'checked'; ?>>
        <label for="customCheckbox1" class="custom-control-label">Frezzer Grande</label>
    </div>

    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox2" value="Frezzer Mediano" name="heladera[]" <?php if (in_array('Frezzer Mediano', $elementosFiltrados)) echo 'checked'; ?>>
        <label for="customCheckbox2" class="custom-control-label">Frezzer Mediano</label>
    </div>

    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox3" value="Frezzer Chico" name="heladera[]" <?php if (in_array('Frezzer Chico', $elementosFiltrados)) echo 'checked'; ?>>
        <label for="customCheckbox3" class="custom-control-label">Frezzer Chico</label>
    </div>

    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox4" value="R 150" name="heladera[]" <?php if (in_array('R 150', $elementosFiltrados)) echo 'checked'; ?>>
        <label for="customCheckbox4" class="custom-control-label">R 150</label>
    </div>

    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox5" value="R 400" name="heladera[]" <?php if (in_array('R 400', $elementosFiltrados)) echo 'checked'; ?>>
        <label for="customCheckbox5" class="custom-control-label">R 400</label>
    </div>

    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox6" value="R 450" name="heladera[]" <?php if (in_array('R 450', $elementosFiltrados)) echo 'checked'; ?>>
        <label for="customCheckbox6" class="custom-control-label">R 450</label>
    </div>

    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox7" value="R 600" name="heladera[]" <?php if (in_array('R 600', $elementosFiltrados)) echo 'checked'; ?>>
        <label for="customCheckbox7" class="custom-control-label">R 600</label>
    </div>
</div>






                      <div class="form-group">
                        <label for="exampleInputPassword1">Condición de Venta</label>
                        <select name="condicion" class="form-control">
                          <option value="">Seleccionar Condición de Venta</option>
                          <option value="PRE COMPRA" <?php if ($condicion=='PRE COMPRA') { echo 'selected';  } ?> >PRE COMPRA</option>
                          <option value="CUENTA CORRIENTE" <?php if ($condicion=='CUENTA CORRIENTE') { echo 'selected';  } ?>>CUENTA CORRIENTE</option>
                          <option value="CONTADO " <?php if ($condicion=='CONTADO ') { echo 'selected';  } ?>>CONTADO </option>
                          <option value="CONSIGNACIÓN" <?php if ($condicion=='CONSIGNACIÓN') { echo 'selected';  } ?>>CONSIGNACIÓN</option>

                        </select>
                      </div>
                  
                        </select>
                      </div>
                <?php } else { ?>


                      <div class="form-group">
                        <label for="exampleInputPassword1">Condición de Venta</label>
                        <select name="condicion" class="form-control">
                          <option value="">Seleccionar Condición de Venta</option>
                          <option value="PRE COMPRA">PRE COMPRA</option>
                          <option value="CUENTA CORRIENTE">CUENTA CORRIENTE</option>
                          <option value="CONTADO ">CONTADO </option>
                          <option value="CONSIGNACIÓN">CONSIGNACIÓN</option>
                        </select>
                      </div>
                      <?php } ?>
                    </div>
                    <div class="card-footer">
                      <?php if (!empty($_GET['id_cliente'])) { ?>
  <button type="submit" class="btn btn-primary">Actualizar</button>
<?php } else { ?>



<div class="form-group">
  <label for="exampleInputPassword1">Heladeras</label>
    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="Frezzer Grande" name="heladera[]" >
        <label for="customCheckbox1" class="custom-control-label">Frezzer Grande</label>
    </div>

    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox2" value="Frezzer Mediano" name="heladera[]" >
        <label for="customCheckbox2" class="custom-control-label">Frezzer Mediano</label>
    </div>

    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox3" value="Frezzer Chico" name="heladera[]" >
        <label for="customCheckbox3" class="custom-control-label">Frezzer Chico</label>
    </div>

    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox4" value="R 150" name="heladera[]" >
        <label for="customCheckbox4" class="custom-control-label">R 150</label>
    </div>

    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox5" value="R 400" name="heladera[]" >
        <label for="customCheckbox5" class="custom-control-label">R 400</label>
    </div>

    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox6" value="R 450" name="heladera[]" >
        <label for="customCheckbox6" class="custom-control-label">R 450</label>
    </div>

    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox7" value="R 600" name="heladera[]" >
        <label for="customCheckbox7" class="custom-control-label">R 600</label>
    </div>
</div>




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
        <strong>&copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        Todos los derechos reservados. Modificada por Mühlenpfordt Bariloche / Argentina
        <div class="float-right d-none d-sm-inline-block">
          <b>Versión</b> 3.2.0
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
        toastr["success"]("Actualizado", "Cliente");
      }
    </script>
  </body>
</html>
