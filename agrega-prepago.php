<?php 
//include'session.php';
include 'conex.php';

//session_start();
//$_SESSION['cliente_pedido'];
$idCliente=$_GET['id_cliente'];
    // Consulta SQL
    $consulta = "SELECT nom_cliente FROM clientes WHERE id_cliente = '$idCliente'";
    // Ejecutar la consulta
    $resultado = mysqli_query($link, $consulta);
    if ($resultado) {
        if (mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            $nombreCliente = $fila['nom_cliente'];
            mysqli_free_result($resultado);
        } else {
            $nombreCliente = "Cliente no encontrado";
        }
    } else {
        $nombreCliente = "Error en la consulta: " . mysqli_error($conexion);
    }

  header('location:session.php?cliente_hidden='.$nombreCliente) ; //return $nombreCliente;

 ?>