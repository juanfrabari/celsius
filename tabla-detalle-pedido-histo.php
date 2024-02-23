<div class="col-md-40">
<form action="finaliza-pedido-modificado.php" method="post">
    <input type="hidden" value="<?php echo $_GET['pedido'] ?>" name="n_pedido">

    <table id="example" class="table table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $suma = 0;
            while ($file_pedido_hi = mysqli_fetch_assoc($rs_pedido_hi)) {
                ?>
                <tr>
                    <td>
                        <?php if (!isset($_GET['id_histo'])) { ?>
                            <a href="actualiza-cant-pedido-generado.php?id_histo=<?php echo $file_pedido_hi['id_histo']; ?>&pedido=<?php echo $_GET['pedido']; ?>">
                                <button type="button" class="btn btn-default text-center">
                                    <span class="text-xl"><?php echo $file_pedido_hi['cant_histo']; ?></span>
                                </button>
                            </a>
                        <?php } else {
                            if ($file_pedido_hi['id_histo'] == $_GET['id_histo']) { ?>
                                <button type="button" class="btn btn-default text-center">
                                    <span class="text-xl">
                                        <input id="cantidad_modificada" name="cantidad_modificada" type="number" value="<?php echo $file_pedido_hi['cant_histo']; ?>" style="width: 50px;">
                                    </span>
                                </button>
                            <?php } else { ?>
                                <button type="button" class="btn btn-default text-center">
                                    <span class="text-xl"><?php echo $file_pedido_hi['cant_histo']; ?></span>
                                </button>
                            <?php } ?>
                        <?php } ?>
                    </td>
                    <td><?php echo str_replace("///", " ", $file_pedido_hi['producto_histo']); 
                    echo '<br>'.$condicion=$file_pedido_hi['condicion_histo']; ?></td>
                    <td><?php if ($file_pedido_hi['condicion_histo']!='Pre Compra') 
                    { echo '$' . number_format($file_pedido_hi['monto_histo'], 0, ',', '.'); } 
                      else { echo '$' . number_format(0, 0, ',', '.'); } ?></td>
                    <td></td>
                </tr>
                <?php
                if ($file_pedido_hi['condicion_histo']!='Pre Compra') 
                    { $suma = $suma + $file_pedido_hi['monto_histo']; }
            }

            if (strlen($_GET['pedido']) == 12) {
                $descuento = substr($_GET['pedido'], 10);
                $suma = $suma - ($suma * $descuento / 100);
            }

            ?>
            <tr>
                <td></td>
                <td>
                    <?php if (!isset($_GET['id_histo']) && $condicion!='Pre Compra') { ?>
                        <select class="form-control select2bs4 select2-hidden-accessible" name="forma_pago" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" required>
                            <option disabled selected value="" data-select2-id="18">Forma de pago</option>
                            <!--option value="PRE COMPRA" data-select2-id="33"><?php echo $condicion; ?></option!-->
                            <option value="CUENTA CORRIENTE" data-select2-id="34">CUENTA CORRIENTE</option>
                            <option value="CONTADO" data-select2-id="35">CONTADO</option>
                        </select>
                    <?php } else { ?><input type="hidden" name="forma_pago" value="Pre Compra"><?php } ?>
                </td>
                <td>
                    <div class="row">
                        <div class="col-md-6">
                            <h4><?php echo '$' . number_format($suma, 0, ',', '.') ?></h4>
                        </div>
                        <div class="col-md-6">
                            <?php if (isset($_GET['id_histo'])) { ?>
                                <br><a href="actualiza-cant-pedido-generado.php?pedido=<?php echo $_GET['pedido']; ?>&id_actualiza_histo=<?php echo $_GET['id_histo']; ?>&cantidad_modificada=<?php echo $file_pedido_hi['cant_histo']; ?>" id="actualizaLink"><button type="button" class="btn btn-block btn-primary btn-sm">Actualizar</button></a>
                            <?php } else { ?>
                                <br><button type="submit" class="btn btn-block btn-success btn-sm">Finalizar</button>
                            <?php } ?>
                        </div>
                    </div>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</form>
</div>


<script>
// cuando cambia el input de la caja de cantidad lo actualiza en el link, 
    document.addEventListener("DOMContentLoaded", function () {
    const cantidadModificadaInput = document.getElementById("cantidad_modificada");
    const actualizaLink = document.getElementById("actualizaLink");
    cantidadModificadaInput.addEventListener("input", function () {
    const nuevoValor = this.value;
    const url = `actualiza-cant-pedido-generado.php?pedido=<?php echo $_GET['pedido']; ?>&id_actualiza_histo=<?php echo $_GET['id_histo']; ?>&cantidad_modificada=${nuevoValor}`;
    actualizaLink.href = url;
    });
});

</script>
