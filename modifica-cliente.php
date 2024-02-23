<?php 
include'session.php';
include'conex.php';
//echo $_SESSION['user'];

//echo '<hr>'.$_GET['id_cliente'];
//echo '<hr>nombre = '.$_GET['nombre'];
//echo '<hr>contacto = '.$_GET['contacto'];
//echo '<hr>dir = '.$_GET['dir'];
//die();
$heladeras_sql='';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["heladera"]) && is_array($_GET["heladera"])) {
        // Procesar los valores seleccionados
        $heladerasSeleccionadas = $_GET["heladera"];
        foreach ($heladerasSeleccionadas as $heladera) {
            // $heladera contiene el valor de cada checkbox seleccionado
            //echo "Heladera seleccionada: " . $heladera . "<br>";
            $heladeras_sql=$heladeras_sql.'////'.$heladera;
        }
    } 
}

date_default_timezone_set('America/Argentina/Buenos_Aires');
// Obtener la fecha y hora actual en Argentina
$fechaHoraArgentina = date("Y-m-d H:i:s");

//die();
if (!empty($_GET['saldo'])) { $saldo = $_GET['saldo']; } else { $saldo='';}

//echo '<hr>heladera = '.$_GET['heladera'];
//echo '<hr>condicion = '.$_GET['condicion'];
//die();

//averiguo nombre actual
$sql_nom_actual="SELECT * FROM `clientes` WHERE `id_cliente` = {$_GET['id_cliente']}";
$rs_nom_actual=mysqli_query($link, $sql_nom_actual);
$file_nom_actual=mysqli_fetch_assoc($rs_nom_actual);
$nom_actual=$file_nom_actual['nom_cliente'];  
//actualizo todos los registros de la base con el nuevo nobre
$sql_nom_nuevo="UPDATE histo SET cli_histo = '{$_GET['nombre']}' WHERE cli_histo = '$nom_actual'";
//mysqli_query($link, $sql_nom_nuevo);



//echo "<br>nombre= '".$_GET['nombre'];
//echo "<br>contacto= '".$_GET['contacto'];
//echo "<br>dir= '".$_GET['dir'];
//echo "<br>saldo= ".$saldo;
//echo "<br>condicion= ".$_GET['condicion'];
//echo "<br>heladeras_sql= ".$heladeras_sql;
//echo "<br>fechaHoraArgentina=".$fechaHoraArgentina;
//echo "<br>user= ".$_SESSION['user'];
//echo "<br>id_cliente= ".$_GET['id_cliente'];







$sql_modifica_cliente="UPDATE `clientes` SET `nom_cliente` = '{$_GET['nombre']}',
 `contacto_cliente` = '{$_GET['contacto']}',
 `dir_cliente` = '{$_GET['dir']}',
 `saldo_cliente` = '$saldo',
 `venta_cliente` = '{$_GET['condicion']}',
 `hela_cliente` = '$heladeras_sql',
 `update_cliente` = '$fechaHoraArgentina',
 `us_cliente` = '{$_SESSION['user']}' WHERE `clientes`.`id_cliente` = '{$_GET['id_cliente']}'";
 mysqli_query($link, $sql_modifica_cliente);


header('location:form-clientes.php?id_cliente='.$_GET['id_cliente'].'&error=0');


 ?>