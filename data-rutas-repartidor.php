<?php include 'conex.php'; 
//$sql_rutas = "SELECT ruta_histo, fecha_histo FROM histo ORDER BY ruta_histo ASC";
//$rs_rutas = mysqli_query($link, $sql_rutas);

$sql_rutas = "SELECT ruta_histo, fecha_histo FROM histo WHERE venta_histo <> 'PAGO' AND reparte_histo = '{$_SESSION['user']}'
 ORDER BY ruta_histo ASC";
$rs_rutas = mysqli_query($link, $sql_rutas);

?>
<div class="row">
<style type="text/css">
.resultado {
    margin-bottom: 0.5px; /* Puedes ajustar el valor según tu preferencia */
}
</style>
<?php 


$mostradas = array(); // Un array para rutas mostradas

while ($file_rutas = mysqli_fetch_assoc($rs_rutas)) {
            

    $ruta = $file_rutas['ruta_histo']; 
    $fecha = isset($file_rutas['fecha_histo']) ? $file_rutas['fecha_histo'] : 'Fecha no disponible';  // Verifica si 'fecha_histo' está definida
    
    if (!in_array($ruta, $mostradas)) {
        $mostradas[] = $ruta; // Agregar la ruta al array de rutas mostradas
        
        // Consulta para obtener registros con la misma ruta
        $sql_pedido = "SELECT * FROM `histo` WHERE `ruta_histo` = '$ruta'"; 
        $rs_pedido = mysqli_query($link, $sql_pedido);
        $cantidad_resultados = mysqli_num_rows($rs_pedido);
   

        // Variables para sumar cantidades por producto
        $productos = array();
        $totalCantidad = 0;

        while ($file_pedido = mysqli_fetch_assoc($rs_pedido)) {
            $producto = str_replace('///', ' ', $file_pedido['producto_histo']); // Reemplazar "///" por espacio
            $cantidad = $file_pedido['cant_histo'];

            // Si el producto ya existe en el array $productos, suma la cantidad
            if (isset($productos[$producto])) {
                $productos[$producto] += $cantidad;
            } else {
                $productos[$producto] = $cantidad;
            }

            // Suma la cantidad total
            $totalCantidad += $cantidad;
        }
//consulto si todos estan finalizados, mas abajo pregunto y no lo muestro.
$sql_pedido = "SELECT COUNT(*) AS total_registros, SUM(CASE WHEN estado_histo = 'finalizada' THEN 1 ELSE 0 END) AS total_finalizadas FROM histo WHERE ruta_histo = '$ruta'";
$rs_pedido = mysqli_query($link, $sql_pedido);
$resultado = mysqli_fetch_assoc($rs_pedido);


$totalRegistros = $resultado['total_registros'];
$totalFinalizadas = $resultado['total_finalizadas'];

if ($totalRegistros!=$totalFinalizadas ) {
        // Mostrar la información de la ruta y los productos agrupados
        ?>
<div class="col-lg-3 col-6">
                <div class="small-box bg-info">
           
                    <!-- Agregar el botón o icono para cerrar -->
            <a class="small-box-footer">
                    <div class="small-box-footer">
                        <?php 
                        $sql_reparte="SELECT * FROM `histo` WHERE `ruta_histo` = '$ruta'";
                        $rs_reparte=mysqli_query($link, $sql_reparte);
                        $file_reparte=mysqli_fetch_assoc($rs_reparte);
                         ?>
                        <h3><?php echo '<h4>'.strtoupper($file_reparte['reparte_histo']).'</h4>'; ?></h3>
                        
                        <?php
                        // Mostrar los productos agrupados
                        foreach ($productos as $producto => $cantidad) {
    echo '<p class="resultado"><small><strong>' . $cantidad . '</strong>... ' . $producto . '</small></p>';
}
                        ?>
                        <p><h5>Total Productos: <?php echo $totalCantidad; ?></h5></p>
                        <p><h5>Fecha Entrega: <?php echo date("d/m/Y", strtotime($fecha)) ; ?></h5></p>
                        <p><h5><?php echo 'Ruta: ' . $ruta; ?></h5></p>
                        <p><h5><?php if ($file_pedido !== null) { echo $file_pedido['venta_histo']; } ?> </h5></p>
                        <p></p>
                    </div>
            </a>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    
            <a href="form-agrega-pedido.php?ruta=<?php echo $ruta; ?>"><button type="button" class="btn btn-block bg-gradient-success">Agregar Productos</button></a>
            <a href="detalle-ruta.php?ruta=<?php echo $ruta; ?>">
            <button type="button" class="btn btn-block bg-gradient-success">Detalles</button>
            </a>
            <a href="detalle-ruta.php?ruta=<?php echo $ruta; ?>">
            <button type="button" class="btn btn-block bg-gradient-success">Orden</button>
            </a>
                     
                     <?php /* if ($_SESSION['privilegio']=='repartidor') { ?>
            <a href="detalle-ruta.php?ruta=<?php echo $ruta; ?>">
                <button type="button" class="btn btn-block bg-gradient-success">Detalles</button>
            </a>                     <?php } */?>
                </div>
        </div>
        <?php
  }  }
} 
?>
</div>
</div>