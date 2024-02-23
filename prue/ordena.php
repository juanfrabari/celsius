<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
    table {
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 8px;
    }
  </style>
</head>
<body>
  <?php
  // Lista de elementos
  $elementos = array(
      array('id' => 1, 'nombre' => 'Elemento 1'),
      array('id' => 2, 'nombre' => 'Elemento 2'),
      array('id' => 3, 'nombre' => 'Elemento 3'),
      array('id' => 4, 'nombre' => 'Elemento 4'),
      array('id' => 5, 'nombre' => 'Elemento 5')
  );
  ?>

  <table id="tabla">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($elementos as $elemento) { ?>
        <tr>
          <td><?php echo $elemento['id']; ?></td>
          <td><?php echo $elemento['nombre']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $(document).ready(function() {
      $("#tabla tbody").sortable({
        axis: "y",
        update: function(event, ui) {
          // Obtener el nuevo orden de las filas
          var nuevoOrden = $(this).sortable("toArray");

          // Actualizar el orden en el servidor (puedes hacerlo con una solicitud AJAX)

          // Imprimir el nuevo orden en la consola
          console.log("Nuevo orden:", nuevoOrden);
        }
      });
      $("#tabla tbody").disableSelection();
    });
  </script>
</body>
</html>
