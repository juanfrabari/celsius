<?php 
include_once 'conex.php';
$sql_pedidos_pendientes = "SELECT * FROM `pedidos` ORDER BY `pedidos`.`cod_pedido` ASC";
$rs_pedidos_pendientes = mysqli_query($link, $sql_pedidos_pendientes);
$cod_pedido = '';
$cantidad_pedidos_pendientes=0;
while ($file_pedidos_pendientes = mysqli_fetch_assoc($rs_pedidos_pendientes)) {
 if ($cod_pedido != $file_pedidos_pendientes['cod_pedido'] && empty($file_pedidos_pendientes['estado_pedido'])) {
        //echo $file_pedidos_pendientes['cod_pedido'] . '<br>';
        $cod_pedido = $file_pedidos_pendientes['cod_pedido'];
        $cantidad_pedidos_pendientes=$cantidad_pedidos_pendientes+1;
        //echo $cantidad_pedidos_pendientes; 
    }
}
if ($cantidad_pedidos_pendientes<1) {
  $cantidad_pedidos_pendientes='';
}
 ?>
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="salir.php" class="nav-link">Salir</a>
      </li>
<?php if ($_SESSION['privilegio']=='admin') { ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index-admin.php" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="data-pedidos.php" class="nav-link"><span class="badge badge-danger right"><?php echo $cantidad_pedidos_pendientes; ?></span> Pedidos</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="data-clientes.php" class="nav-link">Clientes</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="data-productos.php" class="nav-link">Productos</a>
      </li>
<?php } ?>
    </ul>