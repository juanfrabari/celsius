<?php 
function obtenerUltimosDosDigitos($numero) {
    $numeroStr = (string)$numero;
    if (strlen($numeroStr) == 12) {
        $ultimosDosDigitos = substr($numeroStr, -2);
        return $ultimosDosDigitos;
    } else {
        return false;
    }
}
function obtenerNombreFormateado($cadena) {
    // Dividir la cadena usando "¦" como delimitador
    $parts = explode("¦", $cadena);

    // Tomar la primera parte
    $nombre = $parts[0];

    // Convertir a mayúsculas la primera letra y a minúsculas el resto del nombre
    $nombreFormateado = ucfirst(strtolower($nombre));

    return $nombreFormateado;
}
function obtenerIDFormateado($cadena) {
    // Dividir la cadena usando "¦" como delimitador
    $parts = explode("¦", $cadena);

    // Tomar la primera parte
    //$nombre = $parts[1];
    $nombre = isset($parts[1]) ? $parts[1] : 'Sin ID';

    // Convertir a mayúsculas la primera letra y a minúsculas el resto del nombre
    $nombreFormateado = ucfirst(strtolower($nombre));

    return $nombreFormateado;
}
function obtenerNombreCliente($idCliente, $conexion) {
    // Preparar la consulta SQL
    $consulta = "SELECT nom_cliente FROM clientes WHERE id_cliente = " . intval($idCliente);

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        // Obtener el nombre del cliente si hay resultados
        if ($fila = mysqli_fetch_assoc($resultado)) {
            $nombreCliente = $fila['nom_cliente'];
        } else {
            $nombreCliente = "Cliente no encontrado";
        }
    } else {
        $nombreCliente = "Error en la consulta: " . mysqli_error($conexion);
    }

    return $nombreCliente;
}
 ?>
<table id="myTable" class="table table-striped projects">
    <thead>
        <tr>
            <th style="width: 20%">Cliente</th>
            <th style="width: 30%">Monto</th>
            <th style="width: 20%">Factura / Recibo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Array para mantener un registro de los clientes ya mostrados
        $clientesMostrados = array();

        while ($file_cc = mysqli_fetch_assoc($rs_cc)) {
            $id_cliente=$file_cc['cli_histo'];
            $id_cliente = obtenerIDFormateado($file_cc['cli_histo']);
            $cliente = obtenerNombreCliente($id_cliente, $link);

            // Verificar si el cliente ya ha sido mostrado
            if (!in_array($cliente, $clientesMostrados)) {
                // Agregar el cliente al registro
                $clientesMostrados[] = $cliente;

/*calcula cuenta corriente*/                


if ($_SESSION['privilegio']!='admin') { header('location:salir.php'); }

$idCliente = $id_cliente;



$sql_id_cliente = "SELECT * FROM `clientes` WHERE `id_cliente` = '$idCliente' ";
$rs_id_cliente = mysqli_query($link, $sql_id_cliente);
$file_id_cliente=mysqli_fetch_assoc($rs_id_cliente);
$monto=0; $suma_cc=0;

$nombre = $file_id_cliente['nom_cliente'];
$sql_histo_cc = "SELECT * FROM `histo` WHERE SUBSTRING_INDEX(`cli_histo`, '¦', 1) = '$nombre' AND `venta_histo` = 'CUENTA CORRIENTE'";
$rs_histo_cc=mysqli_query($link, $sql_histo_cc);

while ($file_histo_cc=mysqli_fetch_assoc($rs_histo_cc)) {
    $monto=$file_histo_cc['monto_histo'];
    $descuento= obtenerUltimosDosDigitos($file_histo_cc['pedido_histo']);
    if (isset($descuento)&& !empty($descuento)) 
    { $monto=$monto-($monto*$descuento/100); }
    $suma_cc=$suma_cc+$monto;
}

$sql_pago = "SELECT * FROM `histo` WHERE SUBSTRING_INDEX(`cli_histo`, '¦', 1) = '$nombre' AND `venta_histo` = 'PAGO'";
$rs_pago=mysqli_query($link, $sql_pago);
while ($file_pago=mysqli_fetch_assoc($rs_pago)) 
{
    $suma_cc=$suma_cc-$file_pago['monto_histo'];
}


/*calcula cuenta corriente*/


        ?>
                <tr>
                    <td><a href="cuenta-corriente.php?id_cliente=<?php echo $id_cliente; ?>">  <?php echo $cliente; ?></a></td>
                    <td><?php echo '$' . number_format($suma_cc, 0, ',', '.'); ?></td>
                    <td></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            order: [[2, 'des']]
        });
    });

    // Funcion Elimina
    function confirmarEliminacion(id_cliente) {
        Swal.fire({
            title: '¿Estás seguro de que deseas eliminar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'eliminar.php?id_cliente=' + id_cliente;
            }
        });
    }
</script>
