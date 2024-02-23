<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/table.css">
  </head>
  <body>
    




<div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0" id="myTable">
                    <thead>
                    <tr>
                      <th>Cod. Orden</th>
                      <th>Cliente</th>
                      <th>Estado</th>
                      <th>Dirección</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                       <?php
$compara_codigo=''; 
                       while ($file_pedidos = mysqli_fetch_assoc($rs_pedidos)) { 

$sql_producto="SELECT * FROM `productos` WHERE `id_prod` = '{$file_pedidos['prod_pedido']}'";
$rs_producto=mysqli_query($link, $sql_producto);
$file_producto=mysqli_fetch_assoc($rs_producto);

$sql_cliente="SELECT * FROM `clientes` WHERE `id_cliente` = '{$file_pedidos['cli_pedido']}'";
$rs_cliente=mysqli_query($link, $sql_cliente);
$file_cliente=mysqli_fetch_assoc($rs_cliente);



if ($compara_codigo==$file_pedidos['cod_pedido']) {}
else {      
          ?>
                    <tr>
                      <td><a href="pages/examples/invoice.html"><?php echo $file_pedidos['cod_pedido']; ?></a></td>
                      <td><?php echo $file_cliente['nom_cliente']; ?></td>
                      <td><span class="badge badge-warning">Pendiente</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $file_cliente['dir_cliente']; ?></div>
                      </td>
                      <td>
            <a href="form-pedidos.php?id_pedido=<?php echo $file_pedidos['id_pedido']; ?>">
              <button type="button" class="btn btn-block bg-gradient-info btn-xs">Info</button>
            </a>
            <button type="button" onclick="confirmarEliminacion(<?php echo $file_pedidos['id_pedido']; ?>)" class="btn btn-block bg-gradient-danger btn-xs">Eliminar</button>
          </td>
                    </tr>

                <?php 
}
$compara_codigo=$file_pedidos['cod_pedido'];

              }     ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
            
              <!-- /.card-footer -->
            </div>





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
          order: [[1, 'des']]
        });
      });
    </script>
    <script>
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
                window.location.href = 'eliminar.php?id_pedido=' + id_cliente;
              }
            });
          }
    </script>
  </body>
</html>
