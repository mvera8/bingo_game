<?php
include 'conexion.php';

$tieneX = 0;
$numerosElegidos = '';
$numeros = array(rand(0, 10), rand(11, 20), rand(21, 30), rand(31, 40), rand(41, 50), rand(51, 60));
$query = 'SELECT * FROM usuarios';
$resultado = mysqli_query ($link, $query);
$cantidad = mysqli_num_rows($resultado);
while($row = mysqli_fetch_array($resultado)){
	if ($row['cartonNumber1'] !== '') {
		$numerosElegidos = 1;
		$numeros = array($row['cartonNumber1'], $row['cartonNumber2'], $row['cartonNumber3'], $row['cartonNumber4'], $row['cartonNumber5'], $row['cartonNumber6']);
	}
}
?>

