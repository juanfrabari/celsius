<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pedidos Pendientes</h3>
          </div>
          <div class="card-body">
            <table id="example" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>ID Pedido</th>
                  <th>Cliente</th>
                  <th>Dirección</th>
                  <th></th>
                  
                </tr>
              </thead>
              <tbody>
<?php
$compara_codigo=''; 
                       while ($file_pedidos = mysqli_fetch_assoc($rs_pedidos)) { 

$sql_cliente="SELECT * FROM `pedidos` WHERE `cod_pedido` = '{$file_pedidos['cod_pedido']}'";
$rs_cliente=mysqli_query($link, $sql_cliente);
$file_cliente=mysqli_fetch_assoc($rs_cliente);



$sql_nom_cliente="SELECT * FROM `clientes` WHERE `id_cliente` = '{$file_cliente['cli_pedido']}'";
$rs_nom_cliente=mysqli_query($link, $sql_nom_cliente);
$file_nom_cliente=mysqli_fetch_assoc($rs_nom_cliente);
 ?>
 <form action="ruta-temp.php">
                <tr>
                  <td style="width: 40px"><a href="resumen-pedido.php?cod_pedido=<?php echo $file_pedidos['cod_pedido']; ?>"><?php echo $file_pedidos['cod_pedido']; ?></a></td>
                  <td><?php echo $file_nom_cliente['nom_cliente']; ?></td>
                  <td><?php echo $file_nom_cliente['dir_cliente']; ?></td>
                  <td><a href="ruta-temp.php?cod=<?php echo $file_pedidos['cod_pedido']; ?>" id="miEnlace"><input type="submit" class="btn btn-block btn-primary btn-sm" value="Agregar"></a></td>
                  
                </tr>
    </form>
<?php 
 }     ?>
                <!-- Agrega más filas aquí -->
              </tbody>
            </table>
            <div class="card-footer clearfix">
            </div>
          </div>
        </div>
      </div>
      
      
      
<?php 

//consulta hoja de ruta
if (!empty($_SESSION['id_ruta']))
{
  $sql_hoja_ruta="SELECT * FROM `temp` WHERE `condi_temp` = '{$_SESSION['id_ruta']}'";
  $rs_hoja_ruta=mysqli_query($link, $sql_hoja_ruta);
  
?>
 
      <div class="col-md-6"> <!-- Esta es la modificación importante -->
        <div class="card">
          <div class="card-header">
           <h3 class="card-title">Hoja de Ruta #<?php echo $_SESSION['id_ruta']; ?></h3>
          </div>
          <div class="card-body">

<form action="confirma-ruta.php" method="POST">

            <table id="example1" class="display" style="width:100%">
            <thead>
              <tr>
                <th></th>
                <th>Orden</th>
                <th>Pedido</th>
                <th>Cliente</th>
                <th>Dirección</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

<?php 
$total_filas = mysqli_num_rows($rs_hoja_ruta);
while ($file_hoja_ruta=mysqli_fetch_assoc($rs_hoja_ruta)) { 


$sql_pedido_direc="SELECT * FROM `pedidos` WHERE `cod_pedido` = '{$file_hoja_ruta['cadena_temp']}'";
$rs_pedido_direc=mysqli_query($link, $sql_pedido_direc);
$file_pedido_direc=mysqli_fetch_assoc($rs_pedido_direc);
$cantidad_muestra=mysqli_num_rows($rs_pedido_direc);


//con el ID del Cliente Vuelvo hacer otra consulta :(
$sql_cliente_datos="SELECT * FROM `clientes` WHERE `id_cliente` = '{$file_pedido_direc['cli_pedido']}'";
$rs_cliente_datos=mysqli_query($link, $sql_cliente_datos);
$file_cliente_datos=mysqli_fetch_assoc($rs_cliente_datos);
  ?>
              <tr>

                <input type="hidden" name="id_temp[]" value="<?php echo $file_hoja_ruta['id_temp']; ?>">
                <td><?php echo $file_hoja_ruta['id_temp']; ?></td><?php // esta linea esta oculta hueva ?>
                <td><h3><?php // echo $total_filas;  ?></h3></td>
                <td><?php echo $file_hoja_ruta['cadena_temp']; ?></td>
                <td><?php echo $file_cliente_datos['nom_cliente']; ?></td>
                <td><?php echo $file_cliente_datos['dir_cliente']; ?></td>
<td><a href="elimina-hoja-ruta.php?hojaderuta=<?php echo $file_hoja_ruta['condi_temp']; ?>&pedido=<?php echo $file_hoja_ruta['cadena_temp']; ?>">  <span class="badge bg-danger">X</span></a></td>
              </tr>
<?php  $total_filas--; } ?>              <!-- Botón de envío -->


        <?php if (isset($cantidad_muestra)>0) {
$sql_repartidor="SELECT * FROM `us` WHERE `priv` = 'repartidor'";
$rs_repartidor=mysqli_query($link, $sql_repartidor);

         
          ?>
          <input ass="form-control datetimepicker-input" type="date" name="fecha" required><br>
           <div class="form-group">
          <select class="custom-select form-control-border" id="exampleSelectBorder" name="repartidor" required>
            <option value="" disabled selected>Selecciona un repartidor..</option>
            <?php while ($file_repartidor=mysqli_fetch_assoc($rs_repartidor)) { ?>
            <option value="<?php echo $file_repartidor['nom_us']; ?>"><?php echo $file_repartidor['nom_us']; ?></option>
            <?php } ?>
          </select>
                </div>
          <button type="submit"  class="btn btn-primary" >Confirmar Ruta</button>
          <?php } ?>    
              <!-- Agrega más filas aquí -->
            </tbody>
           
          </table>
</form>

            <div class="card-footer clearfix">
            </div>
          </div>
        </div>
      </div>

<?php }  ?>

    </div>
  </div>
</section>




<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>


<script>
        $(document).ready(function() {
            $('#example1').DataTable({
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                    },
                    "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                    },
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print' ],
                    //ordena el campo oculto
                    columnDefs: [{
                    targets: 0, // Índice de la columna (0 para la primera columna)
                    visible: false, // Ocultar la columna en la tabla
                    orderable: true // Permitir ordenar la columna
                    }],
                    //ordena el campo oculto
                    "order": [[0, "asc"]], // Ordenar por la segunda columna (índice 1) de forma descendente
                    pageLength: -1  // Mostrar todos los registros en una sola página
});
});
</script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                    },
                    "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                    },
                    dom: 'lBfrtip', // Agregar 'l' para habilitar la opción de cambiar la cantidad de resultados por página
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print' ],
                    "order": [[0, "desc"]], // Ordenar por la segunda columna (índice 1) de forma descendente
                    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]] // Definir las opciones de cantidad por página
});
});
</script>