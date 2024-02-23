<?php 
include'conex.php';
$sql_ruta="SELECT * FROM `histo` WHERE `ruta_histo` = '69042776'";
$rs_ruta=mysqli_query($link, $sql_ruta);
 ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 <form action="actualizo-base.php" method="POST" id="updateForm">
    <table border="1">
        <tr>
            <td>Orden</td>
            <td>Nombre</td>
            <td>Producto</td>
            <td>Dirección</td>
        </tr>
        <?php while ($file_ruta = mysqli_fetch_assoc($rs_ruta)) { ?>
            <tr id="<?php echo $file_ruta['id_histo']; ?>">
                <td class="order"><?php echo $file_ruta['id_histo']; ?></td>
                <td><?php echo $file_ruta['cli_histo']; ?></td>
                <td><?php echo $file_ruta['producto_histo']; ?></td>
                <td><?php echo $file_ruta['dir_histo']; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <input type="hidden" name="newOrder" id="newOrder" value="">
                <input type="submit" value="Actualizar">
            </td>
        </tr>
    </table>
</form>



<script>
$(document).ready(function () {
    // Hacer que las filas de la tabla sean arrastrables
    $("table tbody").sortable();

    // Actualizar el orden al hacer clic en el botón
    $("input[type='submit']").click(function () {
        var order = $("table tbody").sortable("toArray", { attribute: "id" });
        $("#newOrder").val(order.join(','));  // Actualizar el valor del campo oculto
        $("#updateForm").submit();  // Enviar el formulario
    });
});
</script>

