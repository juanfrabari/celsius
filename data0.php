
<table id="example" class="display" style="width:100%">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Cantidad</th>
      <th>Bar</th>
      <th>Comercio</th>
      <th>Eventual</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php while ($file_productos = mysqli_fetch_assoc($rs_productos)) { ?>
      <tr>
        <td><h5><?php echo $file_productos['nom_prod'] . '</h5>' . $file_productos['pres_prod']; ?></td>
        <td><h5><span class="right badge badge-info"><?php echo $file_productos['cant_prod']; ?></span></h5></td>
        <td><?php echo number_format($file_productos['bar_prod'], 0, ',', '.'); ?></td>
        <td><?php echo number_format($file_productos['comercio_prod'], 0, ',', '.'); ?></td>
        <td><?php echo number_format($file_productos['eventual_prod'], 0, ',', '.'); ?></td>
        <td><a href="form-productos.php?id_prod=<?php echo $file_productos['id_prod']; ?>"><button type="button" class="btn btn-block bg-gradient-info btn-xs">Info</button></a><button type="button" onclick="confirmarEliminacion(<?php echo $file_productos['id_prod']; ?>)" class="btn btn-block bg-gradient-danger btn-xs">Eliminar</button></td>
      </tr>
      <script>
        function confirmarEliminacion(id_prod) {
          Swal.fire({
            title: '¿Estás seguro de que deseas eliminar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              // Aquí puedes agregar la lógica para realizar la eliminación
              window.location.href = 'eliminar.php?id_prod=' + id_prod;
              //Swal.fire('Eliminado exitosamente!', '', 'success');
            } //else {
            // Aquí puedes agregar la lógica si el usuario cancela la eliminación
            //Swal.fire('Eliminación cancelada', '', 'info');
            //}
          });
        }
      </script>
    <?php } ?>
    <!-- Más filas... -->
  </tbody>
</table>