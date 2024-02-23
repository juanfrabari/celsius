<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
  <?php
// Recuperar el valor de la variable desde la URL (GET)
$id_cifrado_recibido = $_GET['id'];

// Decodificar el valor usando base64_decode
$id_decodificado = base64_decode($id_cifrado_recibido);

// Mostrar el valor decodificado
//echo "ID Decodificado: " . $id_decodificado;
include'../../conex.php';
$sql_us_inicial="SELECT * FROM `us` WHERE `id_us` = {$id_decodificado}"; 
$rs_us_inicial=mysqli_query($link, $sql_us_inicial);
$file_us_inicial=mysqli_fetch_assoc($rs_us_inicial);
?>
<div class="register-box">

  <div class="card">
    <div class="card-body register-card-body">
      <div class="card-header text-center">
        <img id="logo" src="celsius.png" alt="Logo" width="200">
      <!--a href="../../index2.html" class="h1"><b>Admin</b>LTE</a!-->
    </div>
      <p class="login-box-msg">Completar para Acceder</p>

      <form action="../../valida.php" method="post">
        <input type="hidden" name="id_us" value="<?php echo $file_us_inicial['id_us']; ?>">
        <div class="input-group mb-3">
          <input type="text" value="<?php echo $file_us_inicial['nom_us']; ?>"class="form-control" disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        


        <div class="input-group mb-3">
          <input id="repeat-password" name="pas1" type="password" class="form-control" placeholder="Repite password" required>
          <input id="password" name="pas2" type="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <!--div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div!-->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div!-->

      <a href="login.html" class="text-center">Ya tengo Usuario para Ingresar</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>



<script>
  // Agregar eventos de escucha a los campos de contraseña
  document.getElementById('password').addEventListener('input', validatePassword);
  document.getElementById('repeat-password').addEventListener('input', validatePassword);

  // Función para validar las contraseñas
  function validatePassword() {
    var password = document.getElementById('password').value;
    var repeatPassword = document.getElementById('repeat-password').value;

    // Verificar longitud mínima y si son iguales
    if (password.length >= 6 && repeatPassword.length >= 6 && password === repeatPassword) {
      // Contraseñas válidas
      document.getElementById('repeat-password').setCustomValidity('');
    } else {
      // Contraseñas no válidas
      document.getElementById('repeat-password').setCustomValidity('Las contraseñas deben tener al menos 6 caracteres y coincidir.');
    }
  }
</script>

