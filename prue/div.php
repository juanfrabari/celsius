<html>
<head>
	<title></title>
</head>
<body>
	<h3 id="totalValue"></h3>
<?php 
include 'conex.php';

// Renombra la variable para evitar conflictos
$totalSuma = 0;

$sql_cli = "SELECT * FROM `histo`";
$rs_cli = mysqli_query($link, $sql_cli);

while ($file_cli = mysqli_fetch_assoc($rs_cli)) {
    $totalSuma = $file_cli['monto_histo'] + $totalSuma;
}

// Ahora puedes mostrar el resultado en la parte superior
echo '<script>';
echo 'var total = ' . $totalSuma . ';'; // Crear una variable JavaScript con el valor PHP
echo 'document.getElementById("totalValue").textContent = "Total: $" + total;';
echo '</script>';
?>
</body>
</html>

