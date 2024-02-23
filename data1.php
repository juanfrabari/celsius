
<table id="myTable" class="table table-striped projects">
    <thead>
        <tr>

            <th style="width: 20%">Nombre</th>
            <th style="width: 30%">Detalle</th>
            <th style="width: 20%"></th>
        </tr>
    </thead>
    <tbody>
        <?php while ($file_clientes = mysqli_fetch_assoc($rs_clientes)) {
            if (!empty($file_clientes['saldo_cliente'])) {
                $saldo = 'Muestra saldo';
            } else {
                $saldo = '';
            }
        ?>
        <tr>

            <td>
              <a><?php echo $file_clientes['nom_cliente']; ?></a>
                <br>
                <small><?php echo $file_clientes['dir_cliente']; ?></small>
            </td>
            <td>
                <ul class="list-inline">


          <?php if (!empty($file_clientes['hela_cliente'])) { 
$cadena = $file_clientes['hela_cliente'];
$elementos = explode('////', $cadena);
$resultado = array();

foreach ($elementos as $elemento) {
    if ($elemento !== '') {
        $resultado[] = $elemento; ?>
<li class="list-inline-item">

 <span class="right badge badge-success">
         <?php echo $elemento; ?>
        </span></li>
<?php 
    }
} ?>
          <?php } ?>

                </ul>
            </td>
            <td class="project-actions text-right">     
                <a class="btn btn-primary btn-sm" href="cuenta-corriente.php?id_cliente=<?php echo $file_clientes['id_cliente']; ?>">
                    <i class="fas fa-folder"></i>
                    Ver
                </a>
                <a class="btn btn-info btn-sm" href="form-clientes.php?id_cliente=<?php echo $file_clientes['id_cliente']; ?>">
                    <i class="fas fa-pencil-alt"></i>
                    Editar
                </a>
                <a class="btn btn-danger btn-sm" href="#" onclick="confirmarEliminacion(<?php echo $file_clientes['id_cliente']; ?>)">
                    <i class="fas fa-trash"></i>
                    Eliminar
                </a>
            </td>
        </tr>
        <?php } ?>
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

//Funcion Elimina
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

