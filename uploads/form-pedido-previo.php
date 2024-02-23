<?php
$total = 0;
$cant = 1;

//obtener URL de donde vengo para luego mas abajo cuando se elimine el pedido, vuelva de donde vine. 
if (isset($_SERVER['HTTP_REFERER'])) {
    $referer = $_SERVER['HTTP_REFERER'];    
    $url_parts = parse_url($referer);
    
    // Obtener el nombre del archivo de la ruta
    $nom_archivo = basename($url_parts['path']);

    
}
if (isset($ruta)) {
$ruta_codificada = urlencode($ruta);
    # code...
}
else {$ruta_codificada='';} 
?>

<form action="pedido-previo.php">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cod. #<?php echo $cadenaAleatoria; ?></h3>
            <input type="hidden" name="cadenaAleatoria" value="<?php echo $cadenaAleatoria; ?>">

            <input type="hidden" name="ruta" value="<?php echo $ruta_codificada; ?>">
        </div>
        <div class="card-body p-0">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Producto</th>
                        <th style="width: 40px">Cantidad</th>
                        <th style="width: 40px">P.U</th>
                        <th style="width: 40px">S.T</th>
                        <th style="width: 40px">Condición</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($file_form_pedido = mysqli_fetch_assoc($rs_form_pedido)) { 
                        $pre='';
                        $sql_producto_seleccionado = "SELECT * FROM `productos` WHERE `id_prod` = '{$file_form_pedido['prod_temp']}'";
                        $rs_producto_seleccionado = mysqli_query($link, $sql_producto_seleccionado);
                        $file_producto_seleccionado = mysqli_fetch_assoc($rs_producto_seleccionado);
                        $nom_producto_seleccionado = $file_producto_seleccionado['nom_prod'];
                        $pres_producto_seleccionado = $file_producto_seleccionado['pres_prod'];
                        $precio_unitario = $file_form_pedido['monto_temp'] / $file_form_pedido['cant_temp'];
                        $subtotal = $file_form_pedido['monto_temp'];
                        if ($file_form_pedido['condi_temp'] == 'Bar') { $estilo = 'badge bg-primary'; }
                        if ($file_form_pedido['condi_temp'] == 'Comercio') { $estilo = 'badge bg-warning'; }
                        if ($file_form_pedido['condi_temp'] == 'Eventual') { $estilo = 'badge bg-danger'; }
                        if ($file_form_pedido['condi_temp'] == 'Pre Compra') { $estilo = 'badge bg-secondary'; }
                    ?>
                    <tr>
                        <td><?php echo $cant; ?>.</td>
                        <td><?php echo $nom_producto_seleccionado; ?><br><small><?php echo $pres_producto_seleccionado ?></small></td>
                        <td><?php echo $file_form_pedido['cant_temp']; ?></td>
                        <td>$<?php echo $precio_unitario; ?></td>
                        <td>$<?php echo $subtotal; ?></td>
                        <td><span class="<?php echo $estilo; ?>"><?php echo $file_form_pedido['condi_temp']; ?></span></td>
                <?php if ($nom_archivo=='form-agrega-pedido.php') {?>
                        <td><a href="elimina-item-pedido.php?id_item=<?php echo $file_form_pedido['id_temp']; ?>&nom_archivo=<?php echo $nom_archivo; ?>&ruta=<?php // echo $ruta; ?>">X</a></td>
                <?php } else { ?>
                        <td><a href="elimina-item-pedido.php?id_item=<?php echo $file_form_pedido['id_temp']; ?>">X</a></td><?php } ?>
                    </tr>
                    <?php  $total = $subtotal + $total; $cant++; }?>
                    <thead>
                        <tr>
                            <th style="width: 10px"></th>
                            <th><input type="number" value="0" name="descuento" class="form-control" placeholder="%" id="descuento" min="0" max="90" step="1">
</th>
                            <th style="width: 40px">Descuento</th>
                            <th style="width: 40px"></th>
                            <th></th>
                            <th style="width: 40px">Subtotal</th>
                            <th style="width: 40px"><?php echo '$'.$total; ?></th>
                        </tr>
                        <tr>
                            <th style="width: 10px"></th>
                            <th>
<?php 
// Verifica si 'id_cliente' está presente en la URL
if (isset($_GET['id_cliente']) && isset($_GET['id_cadena'])) {
    // Asigna los valores de 'id_cliente' e 'id_cadena' a variables
    $id_cliente = $_GET['id_cliente'];
    $id_cadena = $_GET['id_cadena'];

    // Construye la consulta SQL con el valor de 'id_cliente'
    $sql_pre = "SELECT * FROM `pedidos` WHERE `cli_pedido` = '{$id_cliente}' AND `prod_pedido` = '{$_GET['id_cadena']}'";

    // Ejecuta la consulta
    $rs_pre = mysqli_query($link, $sql_pre);

    // Obtiene el número de filas resultantes
    $hay_pedido_previo = mysqli_num_rows($rs_pre);

    // Muestra la cantidad de pedidos previos
    echo 'pedidos previos = ' . $hay_pedido_previo;

    // Verifica si hay pedidos previos y deshabilita según la condición
    if ($hay_pedido_previo > 0) {
        $pre = 'disabled';
    }
}
 ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pre" <?php echo $pre; ?>>
                                    <label class="form-check-label">Precompra</label>
                                </div>
                            </th>
                            <th style="width: 40px"><?php if (isset($_GET['id_cliente']) ) { echo $_GET['id_cliente']; }?></th>
                            <th style="width: 40px"><?php if (isset($_GET['id_cadena']) ) { echo $_GET['id_cadena']; }?></th>
                            <th></th>
                            <th style="width: 40px">Total</th>
                            <th style="width: 40px"><span id="total-span"><?php echo '$'.$total; ?></span></th>
                        </tr>
                    </thead>
                </tbody>
            </table>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
</form>

<script>
// Función para calcular el total
function calcularTotal() {
  var descuentoInput = document.getElementById('descuento');
  var totalSpan = document.getElementById('total-span');

  // Obtener el valor del descuento
  var descuento = parseFloat(descuentoInput.value) || 0;

  // Realizar el cálculo
  var nuevoTotal = <?php echo $total; ?> * (100 - descuento) / 100;

  // Mostrar el nuevo total
  totalSpan.textContent = '$' + nuevoTotal.toFixed(2);
}

// Agregar un escuchador de eventos para el campo de entrada
document.getElementById('descuento').addEventListener('input', calcularTotal);

// Llamar a la función para calcular el total inicial
calcularTotal();
</script>
