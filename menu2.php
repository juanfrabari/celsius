<?php if ($_SESSION['privilegio']=='admin') { ?>            
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index-admin.php">Inicio</a></li>
              <li class="breadcrumb-item active"><a href="data-pedidos.php">Pedidos</a></li>
              <li class="breadcrumb-item active"><a href="data-clientes.php">Clientes</a></li>
              <li class="breadcrumb-item active"><a href="data-productos.php">Productos</a></li>
              <li class="breadcrumb-item active"><a href="salir.php">Salir</a></li>
            </ol>
<?php } ?>