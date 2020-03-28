<?php
include 'conexion.php';

$query = "SELECT * FROM usuarios";
$resultado = mysqli_query($link, $query);
$cantidad = mysqli_num_rows($resultado);

$query2 = 'SELECT * FROM bingo';
$resultado2 = mysqli_query ($link, $query2);
while($row2 = mysqli_fetch_array($resultado2)){
	if ($row['activo'] == 1) {
		$entrada = $row['entrada'];
	}
}

$pozo_acumulado = 0;
if (is_numeric($entrada) && is_numeric($cantidad)) {
  $pozo_acumulado = $entrada*$cantidad;
}
?>
<div class="text-center jackpot">
 	<h3 class="jackpot__title">Pozo acumulado</h3>
 	<h1 class="jackpot__pozo">$<?php echo $pozo_acumulado; ?></h1>
 	<p>Hay <?php echo $cantidad; ?> personas que van a participar!</p>
</div>