<?php $archivo = basename($_SERVER['PHP_SELF']); 
//https://fontawesome.com/
?>

<?php if ($_SESSION['privilegio']=='admin') { ?>
<a href="index-admin.php" class="brand-link">
<?php } ?>
<?php if ($_SESSION['privilegio']=='repartidor') { ?>
<a href="salir.php" class="brand-link">
<?php } ?>
  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">Celsius</span>
</a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
     <a href="#" class="d-block"><?php echo ucwords($_SESSION['user']); echo '<br>'.$_SESSION['privilegio'];?></a>
    </div>
  </div>


<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Primer desplegable -->
    <li class="nav-item">
      <a href="#" class="nav-link active">
        
        <!--i class="fas fa-user"></i!-->
        <i class="fa-solid fa-truck-fast"></i>
        <p>Gestión de Pedidos
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>


      <ul class="nav nav-treeview">
<?php if ($_SESSION['privilegio']=='admin') { ?>           
        <li class="nav-item">
          <a href="hoja-ruta.php" class="nav-link <?php if ($archivo=='hoja-ruta.php') { echo 'active';} ?>">
            <i class="fas fa-route"></i> 
            <p>Generar hoja de Ruta</p>
          </a>
        </li>
        
<?php } ?>
        <li class="nav-item">
          <a href="rutas.php" class="nav-link <?php if ($archivo=='rutas.php') { echo 'active';} ?>">
            <i class="fa-solid fa-road"></i>
            <p>Rutas Generadas</p>
          </a>
        </li>
<?php if ($_SESSION['privilegio']=='repartidor') { ?>  
         <li class="nav-item">
          <a href="form-pedidos.php" class="nav-link <?php if ($archivo=='form-pedidos.php') { echo 'active';} ?>">
            <i class="far fas fa-shopping-cart"></i>
            <p>Pedidos</p>
          </a>
        </li> 
<?php } ?>

<?php if ($_SESSION['privilegio']=='admin') { ?>     

        <li class="nav-item">
          <a href="data-pedidos.php" class="nav-link <?php if ($archivo=='data-pedidos.php') { echo 'active';} ?>">
            <i class="fa-solid fa-cube"></i>
            <p>Listado de Pedidos</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="data-productos.php" class="nav-link <?php if ($archivo=='data-productos.php') { echo 'active';} ?>">
            <i class="fa-solid fa-wine-bottle"></i>
            <p>Listado de Productos</p>
          </a>
        </li>
<?php } ?>


        <!-- Agrega aquí los elementos de este submenú -->
      </ul>
    </li>

        <!-- Segundo desplegable -->
<?php if ($_SESSION['privilegio']=='admin') { ?> 
    <li class="nav-item">
      <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Nuevos Registros
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="form-clientes.php" class="nav-link <?php if ($archivo=='form-clientes.php') { echo 'active';} ?>">
            <i class="fa-solid fa-user-tie"></i>
            <p>Clientes</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="form-productos.php" class="nav-link <?php if ($archivo=='form-productos.php') { echo 'active';} ?>">
            <i class="fa-regular fa-lemon"></i>
            <p>Productos</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="form-pedidos.php" class="nav-link <?php if ($archivo=='form-pedidos.php') { echo 'active';} ?>">
            <i class="far fas fa-shopping-cart"></i>
            <p>Pedidos</p>
          </a>
        </li>



        <li class="nav-item">
          <a href="form-pagos.php" class="nav-link <?php if ($archivo=='form-pagos.php') { echo 'active';} ?>">
            <i class="fa-solid fa-file-invoice-dollar"></i>
            <!--i class="far fas fa-shopping-cart"></i!-->
            <p>Pagos</p>
          </a>
        </li>
      </ul>
    </li>
    


<li class="nav-item">
      <a href="#" class="nav-link active">
        <i class="fa-solid fa-users"></i>
        <p>Usuarios
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        
        <li class="nav-item">
          <a href="form-usuarios.php" class="nav-link <?php if ($archivo=='form-usuarios.php') { echo 'active';} ?>">
            <i class="fa-solid fa-user-tie"></i>
            <p>Nuevo Usuario</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="data-usuarios.php" class="nav-link <?php if ($archivo=='usuarios.php') { echo 'active';} ?>">
            <i class="fa-solid fa-user-tie"></i>
            <p>Usuarios</p>
          </a>
        </li>
        
      </ul>
    </li>


<li class="nav-item">
      <a href="#" class="nav-link active">
        <i class="fa-solid fa-circle-user"></i>
        <p>Clientes
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        
        <li class="nav-item">
          <a href="cuentas-corrientes.php" class="nav-link <?php if ($archivo=='cuentas-corrientes.php') { echo 'active';} ?>">
            <i class="fa-regular fa-closed-captioning"></i>
            <p>Cuentas Corrientes</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="data-usuarios.php" class="nav-link <?php if ($archivo=='usuarios.php') { echo 'active';} ?>">
            <i class="fa-solid fa-hand-holding-dollar"></i>
            <p>Prepagos</p>
          </a>
        </li>
        
      </ul>
    </li>


<?php } ?>
    <!-- ... Más submenús ... -->
  </ul>
</nav>
<!-- /.sidebar-menu -->
