
<table id="myTable" class="table table-striped projects">
    <thead>
        <tr>
            <th style="width: 20%">Nombre</th>
            <th style="width: 30%"></th>
            <th style="width: 20%"></th>
        </tr>
    </thead>
    <tbody>
        <?php while ($file_us = mysqli_fetch_assoc($rs_us)) { 
            $id_us = $file_us['id_us'];
            $nombre_usuario = ucwords(strtolower($file_us['nom_us']));
            $privilegio_usuario = ucwords($file_us['priv']);
        ?>
        <tr>
            <td>
                <a href="data-repartidor.php?id_r=<?php echo $id_us;  ?>"><?php echo $nombre_usuario; ?></a>
                <br>
                <span class="badge bg-success"><?php echo $privilegio_usuario; ?></span>
            </td>
            <td class="project-actions text-right">
                <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar bg-primary" style="width: 12%"></div>
                </div>
                <span class="badge bg-success">15 %</span>
            </td>
            <td>
                <a class="btn btn-danger btn-sm" href="#" onclick="confirmarEliminacion(<?php echo $id_us; ?>)">
                    <i class="fas fa-trash"></i>
                    Eliminar
                </a>
                <!--a class="btn btn-info btn-sm" href="form-clientes.php?id_cliente=<?php echo $id_us; ?>">
                    <i class="fas fa-pencil-alt"></i>
                    Editar
                </a!-->
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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




    function confirmarEliminacion(id_us) {
        swal({
            title: "¿Estás seguro?",
            text: "No se puede deshacer",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Aquí puedes colocar la lógica para eliminar el archivo si el usuario confirma
                // Por ejemplo, podrías llamar a una función para realizar la eliminación.
                // eliminarArchivo();
                window.location.href = "eliminar_us.php?id=" + id_us;
               
            } 
        });
    }
</script>


