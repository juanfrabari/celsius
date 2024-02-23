<!DOCTYPE html>
<html>
<head>
  <style>
    .dropzone {
      width: 200px;
      height: 200px;
      border: 2px dashed #ccc;
      text-align: center;
      padding: 50px;
      font-size: 20px;
    }
    .dragitem {
      width: 100px;
      height: 100px;
      background-color: #f1f1f1;
      border: 1px solid #ccc;
      border-radius: 5px;
      display: inline-block;
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <div class="dropzone" ondrop="dropHandler(event)" ondragover="dragOverHandler(event)">
    Arrastra y suelta aquí
  </div>

  <div class="dragitem" draggable="true" ondragstart="dragStartHandler(event)">
    Elemento 1
  </div>

  <div class="dragitem" draggable="true" ondragstart="dragStartHandler(event)">
    Elemento 2
  </div>

  <div class="dragitem" draggable="true" ondragstart="dragStartHandler(event)">
    Elemento 3
  </div>

  <script>
    function dragStartHandler(event) {
      // Guarda el ID del elemento arrastrado
      event.dataTransfer.setData("text/plain", event.target.id);
    }

    function dragOverHandler(event) {
      // Previene el comportamiento predeterminado (por defecto no se permite soltar)
      event.preventDefault();
    }

    function dropHandler(event) {
      // Previene el comportamiento predeterminado (por defecto se abre el contenido arrastrado)
      event.preventDefault();

      // Obtiene el ID del elemento arrastrado
      var draggedItemId = event.dataTransfer.getData("text/plain");

      // Obtiene el elemento arrastrado por su ID
      var draggedItem = document.getElementById(draggedItemId);

      // Añade el elemento arrastrado a la zona de soltar
      event.target.appendChild(draggedItem);
    }
  </script>
</body>
</html>
